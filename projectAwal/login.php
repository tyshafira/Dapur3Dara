<?php

	session_start();

	include ('connection.php');
	if(!empty($_POST)){
	
		$nama = htmlentities(strip_tags($_POST["Nama"]));	
		$password = htmlentities(strip_tags(hash('sha256', $_POST["password"])));

		$syntax= "select * from akun where Nama = '$nama' and Password = '$password' ";
		$login= mysqli_query($link,$syntax);
		if ($login){

			if(mysqli_num_rows($login) == 1){

			$_SESSION['Nama'] = "$nama";
			header("HTTP/1.1 302 Moved Temporarily");
			header("location: index.php");
			exit();

			} else {

			/*$error = "Username/ password combination incorrect";
			header("HTTP/1.1 302 Moved Temporarily");
			header("location: index.php");
			exit();*/
			//$_SESSION['message'] = "Username/ password combination incorrect";
			header("HTTP/1.1 302 Moved Temporarily");
			header("location : index.php?gagalregister");
			exit();
				/*echo "<html>";
				echo "<head>";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?gagalregister\" />";
				echo "</head>";
				echo "<body>";
				echo "<p>gagal register ke website. <a href=\"index.php?gagalregister\">klik disini jika tidak teredirech...</a></p>";
				echo "</body>";
				echo "</html>";*/
			}
		} else {
			die(mysqli_error($link));
		}

	}

?>

<!--<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link href="css.css" rel="stylesheet" media="all" type="text/css">	
</head>

<body>
	<div id="kotak-login">
		<p>
			<?php 
			if(isset($error)){
				echo $error;
			}
			?>
		</p>
		<div class="judul-login">
			Login
		</div> 
			<div class=" " align="center">
				<form action = "login.php" method = "post">
					<input type="text" name="Nama" placeholder="name" class="text-login">
					<input type="password" name="password" placeholder="password" class="text-login">
					<input type="submit" name="login" value="login" class="btn-create">
						<p> 
							Not yet a member?<a href="register.php">Sign Up</a>
						</p>
				</form>
			</div>
		</div>

	</body>
</html>-->