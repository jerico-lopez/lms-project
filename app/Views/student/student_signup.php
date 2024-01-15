<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>New Student</title>
<div class="container">
    <h1>Sign up</h1>
    <form action="<?= base_url() ?>student_signup" method="post">
        <!--returns user added successfully alert -->
        <?php if (session()->get('success-add-student')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo session()->get('success-add-student'); ?>
            </div>
        <?php endif; ?>
        <!--returns user added failed alert -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" class="form-control" id="year" name="year">
        </div>
        <div class="mb-3">
            <label for="section" class="form-label">Section</label>
            <input type="text" class="form-control" id="section" name="section">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection('content') ?>