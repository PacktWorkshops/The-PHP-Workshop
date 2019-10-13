<?php

use PHPUnit\Framework\TestCase;

class PagesTest extends TestCase
{
    protected $pages;

    protected function setUp(): void
    {
        $this->pages = new App\Pages();
    }

    /** @test */
    public function homePageReturnsHello()
    {
        $expected = 'Hello';
        $actual = $this->pages->getPage('1');
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function aboutPageReturnsAbout()
    {
        $expected = 'About';
        $actual = $this->pages->getPage('2');
        $this->assertEquals($expected, $actual);
    }

}
