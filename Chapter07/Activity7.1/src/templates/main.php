<?php use Components\Auth; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= ($title ?? '(no title)'); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Contacts list</a>

    <div class="collapse navbar-collapse show">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
            <?php if (Auth::userIsAuthenticated()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/profile"><?= Auth::getUser()->getUsername() ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<main class="container">
    <?php if (isset($content)) {
        echo $content;
    } else {
        echo (new \Components\Template('home'))->render();
    } ?>
</main>
</body>
</html>
