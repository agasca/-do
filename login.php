<?php
session_start();
echo "<script type='text/javascript'>
	//ini.Incluir debajo	-----------
	// examines browser mouse click events
	function click(evt){
		// rationalise event syntax 
		var e=(evt)?evt :window.event;
		var message='Sitio protegido por pegoga.com';
		//  test for IE         
		if(typeof e.which=='undefined'){
			// right click event
			if(e.button==2){
				alert(message+' IE->2= '+e.button);    
				return false;
				// ---------                
			}
		}else{
			// for other browsers
			if(e.which==3){
				alert(message+' <3='+e.which); 
				e.preventDefault();
				e.stopPropagation();               
				return false;
				// ----------- 
			}
		}                  
	} 
	window.onload=function (){
		document.onmousedown=click; document.oncontextmenu=new Function('return false');  
	}
	//fin.Incluir			-----------
</script>";
if($_POST){
	mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
	mysql_select_db("doasappl_usuarios");
	$_SESSION['name'] = mysql_real_escape_string($_POST['name']);
	$_SESSION['password'] = mysql_real_escape_string(md5($_POST['password']));	
	if($_SESSION['name'] && $_SESSION['password']){
		$query = mysql_query("select * from usuarios where usuario = '".$_SESSION['name']."'");
		$numrows = mysql_num_rows($query);
		if($numrows!=0){
			while($row = mysql_fetch_assoc($query)){
				$dbname = $row['usuario'];
				$dbpassword = $row['password'];
				$_SESSION['usuario'] = $row['nombre'];
				$_SESSION['param'] = $row['param'];
			}
			if($_SESSION['name']==$dbname){
				if($_SESSION['password']==$dbpassword){
					//echo "Welcome.";
					//header("location: users.php");	//session
					if(($_POST['remember']) == 'on'){
						$expire = time() + 86400;	//24 hrs
						setcookie('testsite', $_POST['name'], $expire);	//create cookie with the user name
					}
					//header("location: enter.php");	
					sleep(2);
					{
					printf("<script>location.href='enter.php'</script>");
					}					
				}else{
					echo "Confirme password.";
				}
			}else{
				echo "Confirme usuario";
			}
		}else{
			echo "Usuario no registrado.";
		}
	}else{
		echo "Por favor registrar:<br/>Usuario y Password.";
	}
	mysql_close();
}else{	
	echo "Acceso no permitido #a1.";
	exit;
}
?>