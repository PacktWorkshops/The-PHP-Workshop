<?php declare(strict_types=1);

use Components\Router;
use Components\Template;

const WWW_PATH = __DIR__;

require_once __DIR__ . '/../src/components/Auth.php';
require_once __DIR__ . '/../src/components/Database.php';
require_once __DIR__ . '/../src/components/Template.php';
require_once __DIR__ . '/../src/components/Router.php';
require_once __DIR__ . '/../src/handlers/Handler.php';
require_once __DIR__ . '/../src/handlers/Login.php';
require_once __DIR__ . '/../src/handlers/Logout.php';
require_once __DIR__ . '/../src/handlers/Profile.php';
require_once __DIR__ . '/../src/handlers/Signup.php';
require_once __DIR__ . '/../src/handlers/Contacts.php';
require_once __DIR__ . '/../src/models/User.php';

session_start();

$mainTemplate = new Template('main');
$templateData = [
    'title' => 'My main template',
];

$router = new Router();
if ($handler = $router->getHandler()) {
    $content = $handler->handle();
    if ($handler->willRedirect()) {
        return;
    }
    $templateData['content'] = $content;
    $templateData['title'] = $handler->getTitle();
}

echo $mainTemplate->render($templateData);
