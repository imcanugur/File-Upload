<?php 
    $id = $_GET['id'];
    require_once("config.php");
    include_once("api/config.php");
    include("includes/header.php");
    include_once("api/movie_detail.php");
    $user_id = 10;
    
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    header("Location: ".$url);


    if ($_POST){

        $id = $_POST['rate'];
        $rate_post = $connection->prepare('INSERT INTO movies_rate SET movie_id=:movie_id, user_id=:user_id, rate=:rate');
        $insert = $rate_post->execute(array(
            'movie_id' => htmlspecialchars($_POST['movie_id']),
            'user_id' => htmlspecialchars($_POST['user_id']),
            'rate' => htmlspecialchars($_POST['rate']),
        ));
      
        if ($insert) {
            session_start();
 
            $_SESSION['veri'] = $_POST['veri'];


            echo "<script>Swal.fire('wfsc', 'dc', 'success')</script>";
        }
        else
        {
            echo 'no';
        }
      
      
      }
?>