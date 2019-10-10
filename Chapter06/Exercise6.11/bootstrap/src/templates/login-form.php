<div class="d-flex justify-content-center">
    <form method="post" action="/login" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Authenticate</h1>
            <p>Use <code>admin</code> for both username and password.</p>
        </div>

        <div class="form-label-group mb-3">
            <label for="inputUser">Username</label>
            <input type="text" name="username" id="inputUser" placeholder="Username"
                   class="form-control <?= isset($formError['username']) ? 'is-invalid' : ''; ?>"
                   value="<?= htmlentities($formUsername ?? '') ?>">
            <?php if (isset($formError['username'])) {
                echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formError['username']));
            } ?>
        </div>

        <div class="form-label-group mb-3">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" placeholder="Password"
                   class="form-control <?= isset($formError['password']) ? 'is-invalid' : ''; ?>">
            <?php if (isset($formError['password'])) {
                echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formError['password']));
            } ?>
        </div>

        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
    </form>
</div>
