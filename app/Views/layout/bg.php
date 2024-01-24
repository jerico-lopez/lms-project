<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <style>
        body {
            background-image: url('public/img/lms_bg.jpg');
            background-color: white;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <?= $this->renderSection('content') ?>

    <script src="public/js/bootstrap.bundle.js"></script>
    <script defer src="public/js/all.js"></script>

</body>

</html>