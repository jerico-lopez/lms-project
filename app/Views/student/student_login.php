<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Student Login</title>
<div class="container">
    <h1>Please login</h1>
    <form action="<?= base_url() ?>student_login" method="post">
        <!--returns student added successfully alert -->
        <?php if (session()->get('success-add-student')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo session()->get('success-add-student'); ?>
            </div>
        <?php endif; ?>
        <!--returns student added failed alert -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <div id="emailHelp" class="form-text">No account yet? <a href="student_signup">Sign up</a></div>
    </form>
</div>
<?= $this->endSection('content') ?>