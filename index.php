<?php 
require_once("config.php");
include("includes/header.php");

//echo $_SESSION['sess_user_id']." - ".$_SESSION['sess_username']." - ".$_SESSION['sess_role']." - ".$_SESSION['sess_upload_status'];

if($_SESSION['sess_role'] == 0){
?>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kullanıcı Adı</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Dosya Yükleme Durumu</th>
                                    <th class="text-center">Tarih</th>
                                    <th class="text-center filter-false sorter-false">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                                $query = $connection->prepare("SELECT * FROM users WHERE status=1");
                                $query->execute();
                                while($user=$query->fetch())
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?= $user['id']?></th>  
                                        <td><?= $user['username']?></td>
                                        <td>
                                            <?php 
                                            if ($user['role'] == 0) {
                                                echo'Admin';
                                            }
                                            else{
                                                echo'User';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php 
                                            if ($user['upload_status'] == 0) {
                                                echo'<label class="switch"><input type="checkbox" onclick="return false;"><span class="slider round"></span></label>';
                                            }
                                            else{
                                                echo'<label class="switch"><input type="checkbox" onclick="return false;" checked><span class="slider round"></span></label>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $user['created_at']?></td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-primary" href="user-edit.php?id=<?= $user["id"] ?>"><i class="fas fa-pen"></i></a>
                                            <a class="btn btn-danger" href="user-delete.php?id=<?= $user["id"] ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} 
?>

    <div class="container-fluid">
        <div class="card" id="TableSorterCard">
            <div class="row table-topper align-items-center">
                    <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                        <p class="text-primary m-0 fw-bold">Yüklenmiş Dosyalar</p>
                    </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <!--<th class="text-center">#</th>-->
                                    <th class="text-center">Yükleyen</th>
                                    <th class="text-center">Dosya Adı</th>
                                    <th class="text-center">Yükleme Tarih</th>
                                    <th class="text-center">İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                                $query = $connection->prepare("SELECT * FROM files WHERE status=1");
                                $query->execute();
                                while($file=$query->fetch())
                                {
                                ?>
                                <tr>
                                    <!--<th scope="row"><?= $file['id']?></th>  -->
                                    <td><?= $file['username']?></td>
                                    <td><?= $file['file_path']?></td>
                                    <td><?= $file['created_at']?></td>
                                    <td>
                                        <a href="assets/upload/<?= $file['file_path']?>" target="_blank" class="btn btn-success btn-sm reset" style="margin: 2px;"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        <?php
                                            if($_SESSION['sess_role'] == 0){
                                        ?>
                                        <a class="btn btn-danger btn-sm reset" style="margin-left: 5px;" href="file-delete.php?id=<?= $file["id"] ?>"><i class="fa fa-trash"></i></a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php    
include("includes/footer.php"); 
?>
