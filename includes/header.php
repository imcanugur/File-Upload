<?php
    session_start();
    if(!(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "")) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File Upload - Uğur CAN</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/Custom-File-Upload.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css">
        <link rel="stylesheet" href="assets/css/Toggle-Switch-toggle-switch.css">
        <link rel="stylesheet" href="assets/css/Toggle-Switch.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <div class="container-fluid">
        <div class="card" id="TableSorterCard">
            <div class="card-header py-3">
                <div class="row table-topper align-items-center">
                    <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                        <p class="text-primary m-0 fw-bold">File Upload</p>
                    </div>
                    <div class="col-12 col-sm-7 col-md-6 text-end" style="margin: 0px;padding: 5px 15px;">
                    <?php
                        if($_SESSION['sess_role'] == 0){
                    ?>
                    <a href="user-add.php" class="btn btn-primary btn-sm reset" style="margin: 2px;">Yeni Kullanıcı Ekle</a>
                    <?php
                        }
                        if($_SESSION['sess_upload_status'] == 1){
                    ?>
                    <a href="file-upload.php" class="btn btn-primary btn-sm reset" style="margin: 2px;">Yeni Dosya Yükle</a>
                    <?php
                        }
                    ?>
                    <a href="logout.php" class="btn btn-danger btn-sm reset" style="margin: 2px;">Çıkış Yap</a></div>
                </div>
            </div>