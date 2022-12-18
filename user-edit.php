<?php 
require_once("config.php");
include("includes/header.php");

$query = $connection->prepare("SELECT * FROM users Where id=:id");
$query->execute(['id' => (int)$_GET["id"]]);
$user = $query->fetch();
?>

        <div class="card-body d-flex flex-column align-items-center">
            <form class="text-center" method="post">
                <div class="mb-3">
                    <label>Kullanıcı Adı: </label>
                    <input class="form-control" type="text" name="username" value="<?= $user['username']?>">
                </div>
                <div class="mb-3">
                <label>Şifre: </label>
                <input class="form-control" type="password" name="password" placeholder="Şifre" value="">
                </div>
                <div class="mb-3">
                    <label>Rolü: </label>
                    <?php
                        if ($user['role'] == 1) {
                    ?>
                    <label class="radio-inline"><input type="radio" value="0" name="role">Admin</label>
                    <label class="radio-inline"><input type="radio" value="1" name="role" checked>User</label>
                    <?php
                       } else{
                    ?>
                    <label class="radio-inline"><input type="radio" value="0" name="role" checked>Admin</label>
                    <label class="radio-inline"><input type="radio" value="1" name="role">User</label>
                    <?php
                       }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                    if ($user['role'] == 1) {
                    ?>
                        <label>Dosya Yükleme Yetkisi: </label>
                        <?php
                            if ($user['role'] == 1) {
                        ?>
                        <label class="radio-inline"><input type="radio" value="1" name="upload_status">Evet</label>
                        <label class="radio-inline"><input type="radio" value="0" name="upload_status" checked>Hayır</label>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" style="margin-right:25px;" value="Kaydet">
                    <a href="index.php" class="btn btn-primary">Anasayfa</a></div>
            </form>
        </div>

<?php    

if ($_POST) {
    if ($_POST['password'] != null) {
        $id = (int)$_GET['id'];
        $query = $connection->prepare("UPDATE users SET username=?, password=?, role=?, upload_status=? WHERE id=?");
        $update = $query->execute(array($_POST['username'], md5($_POST['password']), $_POST['role'], $_POST['upload_status'], $id));

        if($query){
            header('location: index.php');
        }else{
            echo "<script>Swal.fire('', 'Güncelleme İşlemi Gerçekleşirken Hata İle Karşılandı.', 'error')</script>";
            header('location: index.php');
        } 
    }
    else{
        $id = (int)$_GET['id'];
        $query = $connection->prepare("UPDATE users SET username=?, role=?, upload_status=? WHERE id=?");
        $update = $query->execute(array($_POST['username'], $_POST['role'], $_POST['upload_status'], $id));

        if($query){
            header('location: index.php');
        }else{
            echo "<script>Swal.fire('', 'Güncelleme İşlemi Gerçekleşirken Hata İle Karşılandı.', 'error')</script>";
            header('location: index.php');
        } 
    }
}

include("includes/footer.php"); 
?>