<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Upload Profile Picture</title>
<style>
    .container {
        max-width: 350px;
        background: #F8F9FD;
        background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
        border-radius: 40px;
        padding: 25px 35px;
        border: 5px solid rgb(255, 255, 255);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
        margin: 20px;
    }

    .heading {
        text-align: center;
        font-weight: 900;
        font-size: 30px;
        color: #6EA8FE;
    }

    .form {
        margin-top: 20px;
    }

    .form .button {
        display: block;
        width: 100%;
        font-weight: bold;
        background: linear-gradient(45deg, #4970A9 0%, #6EA8FE 100%);
        color: white;
        padding-block: 15px;
        margin: 20px auto;
        border-radius: 20px;
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
        border: none;
        transition: all 0.2s ease-in-out;
    }

    .form .button:hover {
        transform: scale(1.03);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
    }

    .form .button:active {
        transform: scale(0.95);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
    }
</style>

<div class="d-flex justify-content-center" style="margin-top: 10%;">
    <div class="container">
        <div class="heading">Upload</div>
        <form action="<?= base_url() ?>teacher/upload/profilepicture" method="post" class="form" enctype="multipart/form-data">
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" required>
            <input class="button" type="submit" value="Upload">
            <a class="button" style="text-align: center; text-decoration: none;" href="<?= base_url("teacher_home") ?>">No</a>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>