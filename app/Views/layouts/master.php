<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4 Login & Registation </title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom Style -->
    <link href="<?= base_url('assets/css/materialize.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/customstyles.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
</head>

<body>
    <!-- Header -->
    <?= $this->include("components/header") ?>

    <div class="row">
        <div class="col s2">
            <!-- Sidebar -->
            <?= $this->include("components/sidebar") ?>
        </div>
        <div class="col s10">
            <!-- Content Area / Dashboard -->
            <?= $this->renderSection("content") ?>
        </div>
    </div>

    <!-- Compiled and minified Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <!-- Compiled and minified Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Custom Script -->
    <script type="text/javascript" src="<?= base_url('assets/js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/customscripts.js'); ?>"></script>


</body>

</html>