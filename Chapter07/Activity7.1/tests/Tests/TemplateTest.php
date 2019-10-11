<?php declare(strict_types=1);

namespace Tests;

use Components\Template;
use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    public function testFilepath()
    {
        $template = new Template('main');
        $closure = \Closure::fromCallable(function () {
            /** @var Template $this */
            return $this->getFilepath();
        });
        $filepath = $closure->call($template);
        $this->assertSame(sprintf('%s%s%s', $template::$viewsPath, DIRECTORY_SEPARATOR, 'main.php'), $filepath);
    }

    public function testRender()
    {
        Template::$viewsPath = __DIR__ . '/../views';
        $template = new Template('testView');

        $output = $template->render();
        $this->assertSame('<p>Name is Unknown</p>', trim($output));

        $output = $template->render(['name' => 'A-Bomb (HAS)']);
        $this->assertSame('<p>Name is A-Bomb (HAS)</p>', trim($output));
    }
}