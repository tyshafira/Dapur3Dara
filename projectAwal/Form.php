<?php
	session_start();

include('connection.php');
	if(!empty($_POST)){
		$id = " ";
		$nama = htmlentities(strip_tags($_POST["Nama"]));
		$no_hp = htmlentities (Strip_tags($_POST["No_Hp"]));
		$email = htmlentities(Strip_tags($_POST["Email"]));
		$alamat = htmlentities(Strip_tags($_POST["Alamat"]));
		$password = htmlentities(strip_tags(hash('sha256', $_POST["Password"]))); 
		$confirm_password = htmlentities(strip_tags(hash('sha256', $_POST["konfirmasi_password"])));
		
		if($password == $confirm_password){
			$password = htmlentities(strip_tags(hash('sha256', $_POST["Password"])));

			$syntax= "insert into akun values ('$id','$nama','$no_hp','$email','$alamat','$password')";
			$syntax_inpel = "INSERT INTO VALUES ('$email','$password')";
			$SignUp= mysqli_query($link,$syntax);
			$insert_pel = mysqli_query($link,$syntax_inpel);

			if($SignUp){
				$_SESSION ['Nama']= $nama;
				//header("HTTP/1.1 302 Moved Temporarily");
				//header("location : index.php#section-offer");
				//exit();
				echo "<html>";
				echo "<head>";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php#section-offer\" />";
				echo "</head>";
				echo "<body>";
				echo "<p>berhasil login ke website. <a href=\"index.php#section-offer\">klik disini jika tidak teredirech...</a></p>";
				echo "</body>";
				echo "</html>";

			}else{
				//header("HTTP/1.1 302 Moved Temporarily");
				//header("location : index.php?gagalregister");
				//exit();
				//$error = "Username / password combination incorrect";
				echo "<html>";
				echo "<head>";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?gagalregister\" />";
				echo "</head>";
				echo "<body>";
				echo "<p>gagal register ke website. <a href=\"index.php?gagalregister\">klik disini jika tidak teredirech...</a></p>";
				echo "</body>";
				echo "</html>";
			}

		} else{
			//header("HTTP/1.1 302 Moved Temporarily");
			//header("location : index.php?gagalregister");
			//exit();
			//$error = "Username / password combination incorrect";

			//$_SESSION ['message'] = "the password do not match";
				echo "<html>";
				echo "<head>";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?gagalregister\" />";
				echo "</head>";
				echo "<body>";
				echo "<p>gagal login ke website. <a href=\"index.php?gagalregister\">klik disini jika tidak teredirech...</a></p>";
				echo "</body>";
				echo "</html>";
		} 
	}else {
		die(mysqli_error($link));
	}	
	
?>

