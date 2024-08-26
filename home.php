<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "db_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    .rounded{
        border-radius: 55%;
        width: 100px;
        height: 100px;
    }
    .vres{
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid beige;
}
.mres{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding-top: 0%;

}
iframe{
    width: 100%;
    height: 100%;
}
</style>
<body>
    <?php if ($user) { ?>
    <div class="mres d-flex justify-content-center align-items-center vh-100">
  	<div class="shadow w-350 p-3 text-center vres">
    		<img src="upload/<?=$user['pp']?>"
    		     class="img-fluid rounded-circle rounded">
            <h3 class="display-4 "><?=$user['fname']?></h3>
            <a href="edit.php" class="btn btn-primary">
            	Edit Profile
            </a>
             <a href="logout.php" class="btn btn-warning">
                Logout
            </a>
		</div>
    </div>
    <?php }else { 
     header("Location: login.php");
     exit;
    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>