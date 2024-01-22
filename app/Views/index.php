<!-- Jerico Lopez BSIT 3C-->
<?= $this->extend("layout/bg") ?>
<?= $this->section('content') ?>
<title>Index</title>
<style>
    a {
        --color: white;
        text-decoration: none;
        text-align: center;
        font-family: inherit;
        display: inline-block;
        width: 10em;
        height: 2.6em;
        line-height: 2.5em;
        margin: 20px;
        position: relative;
        overflow: hidden;
        transition: color .5s;
        z-index: 1;
        font-size: 19px;
        border-radius: 20px;
        font-weight: 500;
        color: var(--color);
        background: linear-gradient(45deg, #4970A9 0%, #6EA8FE 100%);
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.5);
    }

    a:before {
        content: "";
        position: absolute;
        z-index: -1;
        background: var(--color);
        height: 150px;
        width: 200px;
        border-radius: 50%;
    }

    a:hover {
        border: 2px solid #6EA8FE;
        color: #6EA8FE;
    }

    a:before {
        top: 100%;
        left: 100%;
        transition: all .7s;
    }

    a:hover:before {
        top: -30px;
        left: -30px;
    }

    a:active:before {
        background: #6EA8FE;
        transition: background 0s;
    }
</style>
<nav class="navbar navbar-light" style="background: linear-gradient(45deg, #4970A9 0%, #6EA8FE 100%); box-shadow: 0 10px 10px rgba(0, 0, 0, 0.5); height:100px;">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1" style="font-size: 30px; color: white; margin-left: 10px;">Learning Management System</span>
    </div>
</nav>
<div class="d-flex justify-content-center" style="margin: 27%;">
    <a href="teacher_login" style="margin-right: 30px;">Teacher<span></span></a>
    <a href="student/login">Student<span></span></a>
</div>
<?= $this->endSection('content') ?>