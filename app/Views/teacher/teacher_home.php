<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Home</title>
<style>
    .card {
        padding: 20px;
        width: 230px;
        min-height: 170px;
        border-radius: 20px;
        box-shadow: 5px 5px 8px #EEC794;
        transition: 0.4s;
    }

    .card:hover {
        translate: 0 -10px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: white;
        margin: 15px 0 0 10px;
    }

    .card-image {
        min-height: 100px;
        background-color: #313131;
        border-radius: 15px;
        background: #313131;
        box-shadow: inset 5px 5px 3px #2f2f2f,
            inset -5px -5px 3px #333333;
    }

    .card-body {
        margin: 0px 0 0 10px;
        color: white;
        font-size: 15px;
    }

    .footer {
        float: right;
        margin: 28px 0 0 18px;
        font-size: 13px;
        color: white;
    }

    .by-name {
        font-weight: 700;
    }

    .card-link {
        text-decoration: none;
    }

    .button {
        font-size: medium;
        display: block;
        width: 50%;
        background: linear-gradient(45deg, #AA0000 0%, #F61C01 100%);
        color: white;
        padding-block: 15px;
        border-radius: 20px;
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
        border: none;
        transition: all 0.2s ease-in-out;
    }

    .button:hover {
        transform: scale(1.03);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
    }

    .button:active {
        transform: scale(0.95);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
    }
</style><?= $this->include('teacher/teacher_nav.php') ?>


<div class="container">
    <h2>Class</h2>
    <div class="row">
        <?php if (empty($courses)) : ?>
            <p>No courses available.</p>
        <?php else : ?>
            <?php foreach ($courses as $course) : ?>
                <div class="col-md-3" style="margin-top: 30px;">
                    <a href="<?= base_url() ?>teacher_viewclass/<?= $course->course_id ?>" class="card-link">
                        <div class="card" style="background-color: #4970A9;">
                            <div class="card-image"><img src="public\img\lms_bg.jpg" class="card-img-top" alt="Course Image"></div>
                            <p class="card-title"><?= $course->course_name ?></p>
                            <p class="card-body">
                                Code: <?= $course->class_code ?>
                            </p>
                            <form action="<?= base_url() ?>teacher/delete/class/<?= $course->course_id ?>" method="get">
                            <button type="submit" class="button">Delete</button>
                            </form>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection('content') ?>