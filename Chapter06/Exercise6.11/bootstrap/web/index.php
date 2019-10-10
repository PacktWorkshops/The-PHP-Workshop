<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/components/Template.php';
require_once __DIR__ . '/../src/components/Router.php';
require_once __DIR__ . '/../src/handlers/Handler.php';
require_once __DIR__ . '/../src/handlers/Login.php';
require_once __DIR__ . '/../src/handlers/Logout.php';
require_once __DIR__ . '/../src/handlers/Profile.php';

session_start();

$mainTemplate = new \Components\Template('main');
$templateData = [
    'title' => 'My main template',
];

$router = new \Components\Router();
if ($handler = $router->getHandler()) {
    $content = $handler->handle();
    if ($handler->willRedirect()) {
        return;
    }
    $templateData['content'] = $content;
    $templateData['title'] = $handler->getTitle();
}

echo $mainTemplate->render($templateData);
