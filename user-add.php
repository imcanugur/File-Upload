<?php 
require_once("config.php");
include("includes/header.php");
?>

        <div class="card-body d-flex flex-column align-items-center">
            <form class="text-center" method="post">
                <div class="mb-3">
                    <input class="form-control" type="text" name="username" placeholder="Kullanıcı Adı">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Şifre">
                </div>
                <div class="mb-3">
                    <label class="radio-inline"><input type="radio" value="0" name="role">Admin</label>
                    <label class="radio-inline"><input type="radio" value="1" name="role" checked>User</label>
                </div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Kaydet</button></div>
            </form>
        </div>

<?php    

if ($_POST){
    $upload_status = 0;
    if ($role = $_POST['role'] == 0) {
        $upload_status = 1;
    }

    $new_user = $connection->prepare('INSERT INTO users SET username=:username, password=:password, role=:role, upload_status=:upload_status');
    $insert = $new_user->execute(array(
        'username' => htmlspecialchars($_POST['username']),
        'password' => htmlspecialchars(md5($_POST['password'])),
        'role' => htmlspecialchars($_POST['role']),
        'upload_status' => $upload_status,
    ));
  
    if ($insert) {
        echo "<script>Swal.fire('', 'Kayıt başarıyla eklendi', 'success')</script>";
    }
    else
    {
        echo "<script>Swal.fire('', 'Kayıt eklenirken hata ile karşılaşıldı.', 'error')</script>";
    }
}

include("includes/footer.php"); 
?>