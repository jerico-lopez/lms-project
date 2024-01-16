<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Add Course</title>
<?=$this->include('teacher/teacher_nav.php')?>
<div class="container">
    <h1>Add Course</h1>
    <form action="<?= base_url() ?>teacher_addcourse" method="post">
        <!--returns course added successfully alert -->
        <?php if (session()->get('success-add-course')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo session()->get('success-add-course'); ?>
            </div>
        <?php endif; ?>
        <!--returns course added failed alert -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection('content') ?>