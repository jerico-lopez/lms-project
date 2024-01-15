<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Admin Login</title>

<div class="container">
    <h3 class="mt-5">User Authentication</h3>
    <!--returns error if no email or username found in database-->
    <?php if (session()->get('invalid')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo session()->get('invalid'); ?>
        </div>
    <?php endif; ?>
    <!--returns error alert if input data is not  following the rules-->
    <?php if (isset($loginValidation)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $loginValidation->listErrors(); ?>
        </div>
    <?php endif; ?>
    <!-- labels, textfields, and buttons -->
    <form action="<?= base_url() ?>admin_login" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?= $this->endSection('content') ?>