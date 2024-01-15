<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Student Enroll</title>
<div class="container">
    <h1>Enroll</h1>
    <form action="<?= base_url() ?>student_enroll" method="post">
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="class_code" class="form-label">Please enter class code.</label>
            <input type="text" class="form-control" id="class_code" name="class_code">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection('content') ?>