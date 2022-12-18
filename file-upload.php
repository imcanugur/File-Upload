<?php 
require_once("config.php");
include("includes/header.php");
?>

    <center>
        <form action="" method="POST" style="margin: 50px;" enctype="multipart/form-data">
                <input class="form-control custom-file-input" type="file" id="file" name="file" required>
                <a href="index.php" class="btn btn-primary" style="margin-top: 25px; width: 48%;">Yüklenenler</a>
                <input class="btn btn-success" type="submit" value="Yükle" name="submit" style="margin-top: 25px; width: 48%;">
        </form>
    </center>

<?php    
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileExtArray = explode('.', $fileName);
    $fileExt = strtolower(end($fileExtArray));
    if ($_FILES['file']['error'] == 0) {
        if ($_FILES['file']['size'] < 50000) {
            $fileNameNew = rand(100, 1000).'_'.$fileName;
            $file_path = 'assets/upload/'.$fileNameNew;
            move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
        } else {
            echo "<script>Swal.fire('', 'Dosya Boyutu 50mb Fazla Olamaz., 'error')</script>";
        }
    } else {
        echo "<script>Swal.fire('', 'Dosya Alınırken Hata İle Karşılandı., 'error')</script>";
    }


    $file_post = $connection->prepare('INSERT INTO files SET username=:username, file_path=:file_path');
    $insert = $file_post->execute(array(
        'username' => $_SESSION['sess_username'],
        'file_path' => $fileNameNew,
    ));
    if ($insert) {
        echo "<script>Swal.fire('Dosya başarıyla eklendi.', '<a href=\"index.php\" style=\"text-decoration: none;\">Anasayfa</a>', 'success')</script>";
        //header('location: index.php');
    } else {
        echo "<script>Swal.fire('', 'Dosya eklenirken hata ile karşılaşıldı.', 'error')</script>";
    }
} 





include("includes/footer.php"); 
?>