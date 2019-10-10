<?php

if (array_key_exists('refcode', $_GET)) {
    setcookie('ref', $_GET['refcode'], time() + 60 * 60 * 24 * 30); // store for 30 days
    echo sprintf('<p>The referral code [%s] was stored in a cookie. ' .
        'Reload the page to see the cookie value above. ' .
        '<a href="super-cookie.php">Clear the query string</a>.</p>', $_GET['refcode']);
} else {
    echo sprintf('<p>No referral code was set in query string.</p>');
}

echo sprintf(
    '<p>Referral code (sent by browser as cookie): [%s]</p>',
    array_key_exists('ref', $_COOKIE) ? $_COOKIE['ref'] : '-None-'
);

?>

<form action="super-cookie.php" method="get">
    <input type="text" name="refcode" placeholder="EVENT19" value="EVENT19">
    <input type="submit" value="Apply referral code">
</form>
