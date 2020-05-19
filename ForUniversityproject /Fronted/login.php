<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head> 
	 <meta charset="UTF-8">
     <meta name="viewport"
		 content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
     <title>Регистрация</title>
</head>


<body>
		 <div class="header">
		     <a href="index.html"><img src="img/logo.png" alt="Логотип"></a>
		 </div>
		 
		 <div class="container">
			 <form class="form-signin" method="POST">
				 <h1>Вход</h1>		 				 
				 <input type="text" name="username" class="form-control" placeholder="Ник" required>
				 <input type="password" name="password" class="form-control" placeholder="Пароль" required>
				 <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
				 <p>Если у вас нет аккаунта, <a href="registration.php">зарегистрируйтесь</a></p>
			 </form>
			 
		 </div>
		 
		 <div class="footer">
		     <img src="img/line.png" alt="Линия">
			 <p>OVERLINE.ru, 2019-2020</p>
		 </div>
		 
<?php
require('connect.php');

if (isset($_POST['username']) and isset($_POST['password'])){
	 $username = $_POST['username'];
	 $password = $_POST['password'];	

	 $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
	 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	 $count = mysqli_num_rows($result);
	 
	 if($count == 1){
		 $_SESSION['username']=$username;
	 }else{
		 $fmsg = "Ошибка";
	 }
}

if (isset($_SESSION['username'])){
	 $username = $_SESSION['username'];
	 echo "Вы вошли в аккаунт,".$username."";
	 echo "<a href='logout.php' class='btn btn-lg btn-primary'> Logout </a>";
}
	 
?>		 
		
</body>
</html>