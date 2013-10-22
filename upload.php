<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Acceso no permitido #.";
	exit;
}else{
	include("session.php");
	echo "
	<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>
		<h3>Administrador archivo XML max 9kb</h3>
		<br />
		<form ENCTYPE='multipart/form-data' method='post' action='insertUxml.php' />
		<div id='div3'>
			<table />
				<input type='hidden' name='MAX_FILE_SIZE' value='100000'>
				<td>
					<input type='file' name='upload'><p>
					<input type='submit' name='submit' value='Subir' style ='border: 1px solid #006; background: #9cf;'/>
				</td>
			</table>
		</div><!---end of div-->
		</form>
	</body>
	</html>
	";
	}
?>