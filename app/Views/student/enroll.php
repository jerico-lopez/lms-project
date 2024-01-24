<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Student Enroll</title>
<style>
    h1{
        color: white;
        font-weight: bold;
        margin-top: 70px;
    }
    label{
        color: white;
    }
</style>

<?=$this->include('student/nav.php')?>
<div class="container">
    <h1>Enroll</h1>
    <form action="<?= base_url() ?>student/enroll" method="post">
        <div class="mb-3">
            <label for="class_code" class="form-label">Please enter class code.</label>
            <input type="text" class="form-control" id="class_code" name="class_code">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->get('enroll-status')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->get('enroll-status'); ?>
                </div>
            <?php endif; ?>
    </form>
</div>
<?= $this->endSection('content') ?>