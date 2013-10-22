<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Acceso no permitido #x1.";
	exit;
}else{
	include("session.php");
	$mypic = $_FILES['upload']['name'];
	$temp = $_FILES['upload']['tmp_name'];
	$type = $_FILES['upload']['type'];
	$name = $_SESSION['name'];
	if(($type=="text/xml")){
		$directory =  "./profiles/$name/xml/";
		if (!file_exists($directory)){
			mkdir($directory, 0777, true);
		}			
		move_uploaded_file($temp, "profiles/$name/xml/$mypic");				
		echo "Xml registrado.<br/>";//<a href='home.php'>Login now</a>";
		//despliega contenido
		$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
		while($it->valid()) {
		    if (!$it->isDot()) {
		        echo 'Archivo: ' . $it->getSubPathName() . "\n" . "<br />";
		        //echo 'SubPath:     ' . $it->getSubPath() . "\n";
		        //echo 'Key:         ' . $it->key() . "\n\n";
		    }
		    $it->next();
		}
	}else{
		echo "El archivo no es un formato no XML";
	}
}
?>