<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Teacher SignUp</title>
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

    .form .input {
        width: 100%;
        background: white;
        border: none;
        padding: 15px 20px;
        border-radius: 20px;
        margin-top: 15px;
        box-shadow: #cff0ff 0px 10px 10px -5px;
        border-inline: 2px solid transparent;
    }

    .form .input::-moz-placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input::placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input:focus {
        outline: none;
        border-inline: 2px solid #12B1D1;
    }

    .form .login-button {
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

    .form .login-button:hover {
        transform: scale(1.03);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
    }

    .form .login-button:active {
        transform: scale(0.95);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
    }
</style>
<div class="d-flex justify-content-center">
    <div class="container">
        <div class="heading">Sign Up</div>
        <!--returns student added failed alert -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url() ?>teacher_signup" method="post" class="form">
            <input class="input" type="first_name" name="first_name" id="first_name" placeholder="Firstname">
            <input class="input" type="middle_name" name="middle_name" id="middle_name" placeholder="Middle Name">
            <input class="input" type="last_name" name="last_name" id="last_name" placeholder="Lastname">
            <input class="input" type="age" name="age" id="age" placeholder="age">
            <input class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input class="input" type="password" name="password" id="password" placeholder="Password">
            <input class="input" type="confirm_password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
            <input class="login-button" type="submit" value="Sign In">
            <span>Go to <a href="teacher_login">login page</a></span>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>