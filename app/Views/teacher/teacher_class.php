<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Class</title>
<style>
    .card {
        margin-top: 100px;
        padding-top: 10px;
        width: 190px;
        height: 254px;
        background: rgb(236, 236, 236);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }
</style>
<?= $this->include('teacher/teacher_nav.php') ?>
<div class="card">
    <?php if (empty($enrolledStudents)) : ?>
        <p>No students enrolled in this course.</p>
    <?php else : ?>
        <ul>
            <p>Students:</p>
            <?php foreach ($enrolledStudents as $student) : ?>
                <li><?= $student->first_name ?> <?= $student->last_name ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>


<?= $this->endSection('content') ?>