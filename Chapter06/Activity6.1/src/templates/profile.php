<div class="row">
    <div class="my-5 alert alert-secondary w-100">
        <h3>Welcome, <?= $username ?>!</h3>
        <p class="mb-0"><a href="/logout">Logout</a></p>
    </div>
</div>
<h4>Support area</h4>
<div class="row">
    <div class="col-sm-6 mb-5">
        <h5>Contact form</h5>
        <form action="/profile" method="post" enctype="application/x-www-form-urlencoded">
            <?php if (isset($formErrors['form'])) { ?>
                <div class="alert alert-danger"><?= $formErrors['form']; ?></div>
            <?php } ?>
            <div class="form-label-group mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name"
                       class="form-control <?= isset($formErrors['name']) ? 'is-invalid' : ''; ?>"
                       value="<?= htmlentities($_POST['name'] ?? ''); ?>">
                <?php if (isset($formErrors['name'])) {
                    echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formErrors['name']));
                } ?>
            </div>
            <div class="form-label-group mb-3">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email"
                       class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : ''; ?>"
                       value="<?= htmlentities($_POST['email'] ?? ''); ?>">
                <?php if (isset($formErrors['email'])) {
                    echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formErrors['email']));
                } ?>
            </div>
            <div class="form-label-group mb-3">
                <label for="message">Message:</label>
                <textarea name="message" id="message" cols="30" rows="4"
                          class="form-control <?= isset($formErrors['message']) ? 'is-invalid' : ''; ?>"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
                <?php if (isset($formErrors['message'])) {
                    echo sprintf('<div class="invalid-feedback">%s</div>', htmlentities($formErrors['message']));
                } ?>
            </div>
            <input type="hidden" name="csrf-token" value="<?= $formCsrfToken ?>">
            <button type="submit" name="do" value="get-support" class="btn btn-lg btn-primary">Send</button>
        </form>
    </div>
    <div class="col-sm-6">
        <h5>Last sent messages:</h5>
        <?php if (empty($sentForms)) {
            echo '<p>No messages are found.</p>';
        } else {
            foreach ($sentForms as $item) { ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-text"><?= htmlentities($item['form']['message']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <strong>Added:</strong> <?= htmlentities($item['timeAdded']) ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <strong>Reply-to:</strong> <?= sprintf('%s &lt;%s&gt;', htmlentities($item['form']['name']), htmlentities($item['form']['email'])) ?>
                        </h6>
                    </div>
                </div>
            <?php }
        } ?>

    </div>
</div>
