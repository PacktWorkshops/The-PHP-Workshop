<?php
/** @var array $formError */
/** @var string $formUsername */
?>
<div class="d-flex justify-content-center">
    <form action="/signup" method="post" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 mt-5 font-weight-normal">Sign up</h1>
        </div>

        <div class="form-label-group mb-3">
            <label for="inputUser">Username</label>
            <input type="text" name="username" id="inputUser" placeholder="Username"
                   class="form-control <?= isset($formError['username']) ? 'is-invalid' : ''; ?>"
                   value="<?= htmlentities($formUsername) ?>">
            <?php if (isset($formError['username'])) {
                echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formError['username']));
            } ?>
        </div>

        <div class="form-label-group mb-3">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" placeholder="Password"
                   class="form-control <?= isset($formError['password']) ? 'is-invalid' : ''; ?>">
            <?php if (isset($formError['password'])) {
                echo sprintf('<div class="invalid-feedback show">%s</div>', htmlentities($formError['password']));
            } ?>
        </div>

        <div class="form-label-group mb-3">
            <label for="inputPasswordVerify">Password verify</label>
            <input type="password" name="passwordVerify" id="inputPasswordVerify" placeholder="Password verify"
                   class="form-control <?= isset($formError['passwordVerify']) ? 'is-invalid' : ''; ?>">
            <?php if (isset($formError['passwordVerify'])) {
                echo sprintf('<div class="invalid-feedback show">%s</div>', htmlentities($formError['passwordVerify']));
            } ?>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

        <div class="mt-4">
            <p>Already have an account? <a href="/login">Login</a> here.</p>
        </div>
    </form>
</div>
