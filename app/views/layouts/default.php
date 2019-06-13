<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Marcin Test</title>
        <link rel="stylesheet" href="<?= SERVER_DIRECTORY ?>public/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="<?= SERVER_DIRECTORY ?>public/css/jquery.dataTables.min.css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="<?= SERVER_DIRECTORY ?>public/css/custom.css" media="screen" title="no title" charset="utf-8">
        <script src="<?= SERVER_DIRECTORY ?>public/js/jQuery-3.4.1.min.js"></script>
        <script src="<?= SERVER_DIRECTORY ?>public/js/bootstrap.min.js"></script>
        <script src="<?= SERVER_DIRECTORY ?>public/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <?php include 'menu.php' ?>
        <div class="container-fluid">
            <?= $this->content('body'); ?>
        </div>
    </body>
</html>