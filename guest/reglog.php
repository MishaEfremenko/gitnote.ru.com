<?php
	$server="localhost";
	$user="u0847564_default";
	$pass="*******";
	$db="u0847564_textusers";

	$mysqli = new mysqli($server, $user, $pass, $db);

	if($_POST['form_f']==1){
		if(!isset($_SESSION['email'])&&isset($_POST['pass'])&&isset($_POST['email'])){
			$_SESSION['email']=$_POST['email'];
			$_SESSION['pass']=$_POST['pass'];
			$_SESSION['code']=rand (1000,9999);
			$a = "Ваш код - ".(string)$_SESSION['code'];
			mail($_POST['email'],"Код для регистрации",$a);
			echo "code";
		}
		elseif(isset($_SESSION['email'])&&isset($_SESSION['pass'])&&isset($_POST['code'])){
			if($_POST['code']==$_SESSION['code']){
				if ($mysqli->connect_errno) {
					echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
				$e=$_SESSION['email'];
				$p=$_SESSION['pass'];
				if (!$mysqli->query("DELETE FROM `u0847564_textusers`.`users` WHERE `users`.`email` = '$e'"))
					echo "Не удалось удалить пользователя (" . $mysqli->errno . ") " . $mysqli->error;

				if (!$mysqli->query("INSERT INTO `u0847564_textusers`.`users` (`id`, `email`, `pass`, `isactive`, `code`) VALUES (NULL, '$e','$p', '', '')"))
					echo "Не удалось добавить пользователя: (" . $mysqli->errno . ") " . $mysqli->error;

				setcookie("email", $_SESSION['email'],time()+360000);
				setcookie("pass", $_SESSION['pass'],time()+360000);
				echo"ok";
			}
		}
	}
	elseif($_POST['form_f']==2&&isset($_POST['pass'])&&isset($_POST['email'])){
		$a=checkid($_POST['email'],$_POST['pass']);
		if($a){
			setcookie("email", $_POST['email'],time()+360000);
			setcookie("pass", $_POST['pass'],time()+360000);
			$_SESSION['ulogin']=$a;
			echo $a;
		}
	}

	// unset($_SESSION["code"]);
	// echo $_SESSION['code'];
	// unset($_SESSION["email"]);
	// echo $_SESSION['email'];
	// unset($_SESSION["pass"]);
	// echo $_SESSION['pass'];
?>