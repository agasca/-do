<?php
echo"<script type='text/javascript'>
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
mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
mysql_select_db("doasappl_usuarios");
$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$cpassword = mysql_real_escape_string($_POST['cpassword']);
if($name && $email && $password && $cpassword){
	if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
		if(strlen($password)>3){
			if ($password == $cpassword){
				$username = mysql_query("select usuario from usuarios where usuario = '$name'");	//confirm exist only one
				$count = mysql_num_rows($username); //confirm exist only one
				$remail = mysql_query("select email from usuarios where email = '$email'");
				$checkemail = mysql_num_rows($remail);
				if($checkemail!=0){
					echo "This email is already registered";
				}else{
					if($count!=0){	//confirm exist only one
						echo "Username already Exists!";
					}else{
						$passwordmd5 = md5($password);
						mysql_query("insert into usuarios (usuario,email,password) values ('$name','$email','$passwordmd5')");
						$registered = mysql_affected_rows();
						echo "Done, you are registered!<br/>Affected rows: ".$registered."<br/><a href='home.php'>Login now</a>";
					}
				}
			}else{
				echo "Password do not match.";
			}
		}else{
			echo "Password length between 4 and 8 characters.";
		}
	}else{
		echo "Please, type a valid Email";
	}
}else{
	echo "Go back and please fill the blanks.";
}
mysql_close();
?>