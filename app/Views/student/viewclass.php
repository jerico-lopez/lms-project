<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Class</title>
<style>
    .card {
        margin-top: 30px;
        padding-top: 10px;
        width: 190px;
        min-height: 254px;
        background: rgb(236, 236, 236);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .board {
        margin-top: 30px;
        padding-top: 10px;
        padding-bottom: 30px;
        width: 1000px;
        min-height: 500px;
        background: rgb(236, 236, 236);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .ann {
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
        width: 900px;
        min-height: 80px;
        background: rgb(236, 236, 236);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }
</style>
<?= $this->include('student/nav.php') ?>

<div class="container">
    <div class="row">
        <div class="col-2">
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
        </div>
        <div class="col">
            <div class="board">
                <?php if (empty($announcements)) : ?>
                    <p style="margin-left: 30px;">No Announcements.</p>
                <?php else : ?>
                    <?php foreach ($announcements as $announcement) : ?>
                        <div class="ann">
                            Announcement:
                            <div class="alert alert-primary">
                                <?= $announcement->announcement ?>
                            </div>
                            <form action="<?= base_url() ?>teacher/delete/announcement/<?= $announcement->announcement_id ?>" method="post">
                                <div>
                                    <button type="submit" style="border-style: none;">
                                    <i class="fa-solid fa-trash-can" style="color: red;"></i>
                                    </button>
                                </div>
                            </form>
                            <?= date('F j, Y H:i a', strtotime($announcement->created_at)) ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>