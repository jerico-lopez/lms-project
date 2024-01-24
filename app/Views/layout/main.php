<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= base_url("public/css/bootstrap.css") ?>>
</head>
<style>
    body {
        
        background-color: #6EA8FE;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>

<body>

    <?= $this->renderSection('content') ?>

    <script src=<?= base_url("public/js/bootstrap.bundle.js") ?>></script>
    <script src=<?= base_url("public/js/all.js") ?>></script>

</body>

</html>