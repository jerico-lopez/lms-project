<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<title>Teacher Login</title>
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

<div class="d-flex justify-content-center" style="margin-top: 10%;">
    <div class="container">
        <div class="heading">Sign In</div>
        <form action="<?= base_url() ?>teacher_login" method="post" class="form">
            <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
            <input class="login-button" type="submit" value="Sign In">
            <span>No account yet? <a href="teacher_signup">Sign up</a></span>
            <!--returns acc added successfully alert -->
            <?php if (session()->get('success-add-teacher')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->get('success-add-teacher'); ?>
                </div>
            <?php endif; ?>
            <!--returns error if no email or username found in database-->
            <?php if (session()->get('invalid')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->get('invalid'); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>