<?php

use Components\Auth;

$user = Auth::getUser();
?>

<section class="my-5">
    <h3>Welcome, <?= $user->getUsername() ?>!</h3>
</section>
<h4 class="mb-3">Your profile:</h4>
<table class="table">
    <tbody>
    <tr>
        <th>Username:</th>
        <td><?= $user->getUsername() ?></td>
    </tr>
    <tr>
        <th>Signup date:</th>
        <td><?= $user->getSignupTime()->format(DATE_RSS) ?></td>
    </tr>
    <tr>
        <th>Last login:</th>
        <td><?= Auth::getLastLogin()->format(DATE_RSS) ?></td>
    </tr>
    </tbody>
</table>
<hr class="my-5">
