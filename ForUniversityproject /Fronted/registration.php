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

<?php
require('connect.php');

if (isset($_POST['username'])&& isset($_POST['password'])){
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 
	 $query="INSERT INTO users (username, password) VALUES ('$username', '$password')"; 
	 $result=mysqli_query($connection,$query);
	 
	 if($result){
	     $smsg="Регистрация прошла успешно"; 
	 } else{
	     $fsmsg="Ошибка";
	 }
}
?>	

<body>
		 <div class="header">
		     <a href="index.html"><img src="img/logo.png" alt="Логотип"></a>
		 </div>
		 
		 <div class="container">
			 <form class="form-signin" method="POST">
				 <h1>Регистрация</h1>		
				 <?php if(isset($smsg)){ ?><div class="alert alert-succes" role="alert"> <?php echo $smsg; ?> </div><?php }?>
		
				 <input type="text" name="username" class="form-control" placeholder="Ник" required>
				 <input type="password" name="password" class="form-control" placeholder="Пароль" required>
				 <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
				 <p>Если у вас есть аккаунт, вы можете <a href="login.php">войти</a></p>
			 </form>
			 
		 </div>
		 
		 <div class="footer">
		     <img src="img/line.png" alt="Линия">
			 <p>OVERLINE.ru, 2019-2020</p>
		 </div>
</body>
</html>