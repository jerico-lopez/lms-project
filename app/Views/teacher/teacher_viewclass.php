<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Class</title>
<style>
    .card {
        margin-top: 30px;
        padding-top: 10px;
        width: 270px;
        min-height: 254px;
        background: rgb(236, 236, 236);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .board {
        margin-top: 30px;
        margin-left: 70px;
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

    .form-container {
        width: 900px;
        margin: auto;
        background: rgb(236, 236, 236);
        border: 2px solid transparent;
        padding: 32px 24px;
        font-size: 14px;
        font-family: inherit;
        color: white;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
        border-radius: 16px;
    }

    .form-container button:active {
        scale: 0.95;
    }

    .form-container .form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-container .form-group {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .form-container .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #717171;
        font-weight: 600;
        font-size: 12px;
    }

    .form-container .form-group input {
        width: 100%;
        padding: 12px 16px;
        border-radius: 8px;
        color: black;
        font-family: inherit;
        background-color: transparent;
        border: 1px solid #414141;
    }

    .form-container .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border-radius: 8px;
        resize: none;
        color: black;
        height: 96px;
        border: 1px solid black;
        background-color: transparent;
        font-family: inherit;
    }

    .form-container .form-group input::placeholder {
        opacity: 0.5;
    }

    .form-container .form-group input:focus {
        outline: none;
        border-color: #e81cff;
    }

    .form-container .form-group textarea:focus {
        outline: none;
        border-color: #e81cff;
    }

    .form-container .form-submit-btn {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        align-self: flex-start;
        font-family: inherit;
        color: white;
        font-weight: 600;
        width: 40%;
        background: #6EA8FE;
        border: 1px solid #6EA8FE;
        padding: 12px 16px;
        font-size: inherit;
        gap: 8px;
        margin-top: 8px;
        cursor: pointer;
        border-radius: 6px;
    }

    .form-container .form-submit-btn:hover {
        background-color: #313131;
        ;
        border-color: black;
    }
</style>
<?= $this->include('teacher/teacher_nav.php') ?>

<div class="container"">
    <div class=" row">
    <div class="col-2">
        <div class="card">
            <?php if (empty($enrolledStudents)) : ?>
                <p>No students enrolled in this course.</p>
            <?php else : ?>
                <ul>
                    <p>Students:</p>
                    <?php foreach ($enrolledStudents as $student) : ?>
                        <li>
                            <div class="dropdown">
                                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= base_url() ?>uploads/students/<?= $student->image ?>" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                    <?= $student->first_name ?> <?= $student->last_name ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="<? base_url() ?>/teacher/confirm/remove/student/<?= $student->student_id ?>">Remove</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="col">
        <div class="board">
            <div class="form-container">
                <form action="<?= base_url() ?>teacher_viewclass/<?= $course_id ?>" method="post" class="form">
                    <div class="form-group">
                        <label for="textarea" style="font-size: 15px; color:black;">Announcement:</label>
                        <textarea name="announcement" id="announcement" rows="10" cols="50" required="">          </textarea>
                    </div>
                    <button class="form-submit-btn" type="submit">Submit</button>
                </form>
            </div>
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
<?=session()->set('back', $course_id)?>
<?= $this->endSection('content') ?>