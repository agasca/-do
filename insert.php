<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "Acceso no permitido #i1.";
		exit;
	}else{
		include("session.php");
		$name = mysql_real_escape_string($_POST['name']);
		$nombre = mysql_real_escape_string($_POST['nombre']);
		$aPaterno = mysql_real_escape_string($_POST['aPaterno']);
		$aMaterno = mysql_real_escape_string($_POST['aMaterno']);
		$password = mysql_real_escape_string($_POST['password']);
		$jerarquia = mysql_real_escape_string($_POST['jerarquia']);
		if($name && $password){
			if(strlen($password)>3){
				mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
				mysql_select_db("doasappl_usuarios");
				$username = mysql_query("select usuario from usuarios where usuario = '$name'");	//confirm exist only one
				$count = mysql_num_rows($username); //confirm exist only one
				if($count!=0){	//confirm exist only one
					//include("links.php"); //confirm exist only one
					//die("ERROR: Duplicates are not allowed!"); //confirm exist only one
					echo "Usuario ya existe!";
				}else{
					$passwordmd5 = md5($password);
					mysql_query("insert into usuarios (usuario,nombre,paterno,materno,password,dato,param) values ('$name','$nombre','$aPaterno','$aMaterno','$passwordmd5','0000','$jerarquia')");
					$registered = mysql_affected_rows();
					mysql_close();
					echo "Listo, usuario registrado!<br/>Estado: Filas a&ntilde;adidas: ".$registered."<br/><a href='home.php'>Login?</a>";
				}	
			}else{
				echo "Password entre 4 y 8 caract&eacute;res.";
			}
		}else{
			echo "Intente nuevamente agregando el usuario y llenando los campos vacios.";
		}
	}
?>