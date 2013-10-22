<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Acceso no permitido #fo1.";
	exit;
}else{
	include("session.php");
	echo 
	"<html>
	<head>
		<title>Welcome</title>
		<script type='text/javascript'>
			function register(){
				var x = new Array();
				x[0] = document.getElementById('name').value;
				x[1] = document.getElementById('nombre').value;
				x[2] = document.getElementById('aPaterno').value;
				x[3] = document.getElementById('aMaterno').value;
				x[4] = document.getElementById('password').value;

				
				//Mensaje de error
				var h = new Array();
				h[0] = \"<span style='color:red'>Por favor, registre el Usuario!!!</span>\";
				h[1] = \"<span style='color:red'>Por favor, registre el Nombre!!!</span>\";
				h[2] = \"<span style='color:red'>Por favor, registre el Apellido Paterno!!!</span>\";
				h[3] = \"<span style='color:red'>Por favor, registre el Apellido Materno!!!</span>\";
				h[4] = \"<span style='color:red'>Por favor, registre el Password!!!</span>\";

				
				//checa capturados y no
				var divs = new Array('mname', 'mnombre', 'maPaterno', 'maMaterno' ,'mpassword');
				for(i in x){
					var error = h[i];
					var div = divs[i];
					if(x[i]==''){
						document.getElementById(div).innerHTML = error;
					}else{
						document.getElementById(div).innerHTML = '';
					}
				}
			}

			function pass(){
				var first = document.getElementById('password').value;
				var second = document.getElementById('cPassword').value;
				if (second == first){
					document.getElementById('mcPassword').innerHTML = '=';
				}else{
					document.getElementById('mcPassword').innerHTML = '<span style='color:red'>X</span>';
				}
			}



		</script>
	</head>
	<body>
		<h1><center>Formulario para Registro</center></h1>
		<hr>
		<form ENCTYPE='multipart/form-data' method='post' action='insert.php' />
			<table border='0' />
				<tr><td >Usuario</td><td ><input type='text' name='name' maxlength='30' id='name' onKeyUp='register()' /></td><td><div id='mname'></div></td></tr>
				<tr><td >Nombre</td><td ><input type='text' name='nombre' maxlength='30' id='nombre' onKeyUp='register()' /></td><td><div id='mnombre'></div></td></tr>
				<tr><td >Apellido Paterno</td><td ><input type='text' name='aPaterno' maxlength='30' id='aPaterno' onKeyUp='register()' /></td><td><div id='maPaterno'></div></td></tr>
				<tr><td >Apellido Materno</td><td ><input type='text' name='aMaterno' maxlength='30' id='aMaterno' onKeyUp='register()' /></td><td><div id='maMaterno'></div></td></tr>			
				<tr><td >Password</td><td ><input type='password' name='password' maxlength='8' id='password' onKeyUp='register()' /></td><td><div id='mpassword'></div></td></tr>
				<tr><td >Jerarqu&iacute;a</td>
					<td ><select name='jerarquia'>
						<option value='b'>Vendedor</option>
						<option value='r'>Jefatura</option>
						<option value='m'>Mantenimiento</option>
						<option value='s'>Administrador</option>
						</select>
					</td>
					</td>
				</tr>			
			</table>
			<br/>
			<input type='submit' name='submit' value='Registrar' />
		</form>
	</body>
	</html>
	";
}
?>