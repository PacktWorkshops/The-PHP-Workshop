<?php declare(strict_types=1);

if (isset($_GET['s'])) {
    echo sprintf('<p>You have searched for: <strong>%s</strong></p>', htmlentities($_GET['s']));
} else {
    echo "Use the form to start searching.";
}
?>

<form action="output-escape-reflected.php" method="get">
    <label for="search">Search term:</label>
    <input type="text" id="search" name="s" value="<?= htmlentities($_GET['s'] ?? '', ENT_QUOTES); ?>">
    <input type="submit" value="Search">
</form>
