<!-- Jerico Lopez BSIT 3C-->
<?= $this->extend("layout/bg") ?>
<?= $this->section('content') ?>
<title>Index</title>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LMS</a>
    </div>
</nav>
<div class="container">
    <div class="position-relative">
        <div class="position-absolute top-50 start-50 translate-middle">
            <button type="button" class="btn btn-light position-relative"><i style="font-size: 30px;" class="fa-solid fa-burger"></i></button>
            <button type="button" class="btn btn-light position-relative"><i style="font-size: 30px;" class="fa-solid fa-cash-register"></i></button>
        </div>
    </div>
</div> -->

<div class="container">
    <a href="admin_login">Admin</a>
    <a href="teacher_login">Teacher</a>
    <a href="student_login">Student</a>
</div>

<?= $this->endSection('content') ?>