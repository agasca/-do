<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Acceso no permitido #af1.";
	exit;
}else{
	include("session.php");
	mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
	mysql_select_db("doasappl_datos");		  
    $_SESSION['tipoActividad'] = null;				//mandatorio catalogo
	$_SESSION['nombre_1'] = null;					//Razon Social
	$_SESSION['nombreAlterno'] = null;				//folio
	$_SESSION['tipoCliente'] = null;				//fecha expedicion
	$_SESSION['empFactura'] = null;					//fecha cobor/pago
	$_SESSION['mRnMnR'] = null;						//RFC
	$_SESSION['nuevoMD'] = null;					//importe IVA default 0
	$_SESSION['medio'] = null;						//tipoIva ingreso
	$_SESSION['especialidad']  = null;				//Iva ret default 0
	$_SESSION['ciclo'] = null;						//Isr ret default 0
	$_SESSION['mostroI'] = null;					//total IVA ingreso default 0 valor 
	$_SESSION['otro'] = null;						//tipoIvaE egreso
	$_SESSION['comentarios'] = null;				//total IVA Egreso default 0 valor 
	$_SESSION['uVendidas'] = null;					//Isr ret egreso default 0
	$_SESSION['zfEdos'] = null;						//tipoD egreso

	echo "#2";
	$buttonName = $_POST['boton'];
	echo "#3";
	if ( isset($_POST['txtCampo0'])  && !empty($_POST['txtCampo0']) ){
		$_SESSION['tipoActividad'] = $_POST['catalogo09']; //mandatorio
		$_SESSION['nombre_1'] = strtoupper(mysql_real_escape_string($_POST['txtCampo0']));		//Razon Social
		$_SESSION['nombreAlterno'] = mysql_real_escape_string($_POST['txtCampo1']);				//
		$_SESSION['tipoCliente'] = mysql_real_escape_string($_POST['fec01']);					//
		$_SESSION['empFactura'] = mysql_real_escape_string($_POST['fec02']);					//
		$_SESSION['mRnMnR'] = strtoupper(mysql_real_escape_string($_POST['txtCampo4']));		//ahora a quien factura
		$_SESSION['nuevoMD'] = mysql_real_escape_string($_POST['txtCampo5']);					//
		$_SESSION['medio'] = mysql_real_escape_string($_POST['tipoIva']);						//
		$_SESSION['especialidad'] = mysql_real_escape_string($_POST['txtCampo6']);				//
		$_SESSION['ciclo'] = mysql_real_escape_string($_POST['txtCampo7']);						//
		$_SESSION['mostroI'] = mysql_real_escape_string($_POST['txtCampo8']);					//Total IVA ingreso
		$_SESSION['otro'] = mysql_real_escape_string($_POST['tipoIvaE']);						//
		$_SESSION['comentarios'] = mysql_real_escape_string($_POST['txtCampo81']);				//Total IVA egreso
		$_SESSION['uVendidas'] = mysql_real_escape_string($_POST['txtCampo9']);					//
		$_SESSION['zfEdos'] = mysql_real_escape_string($_POST['tipoD']);						//

		echo "<script type=\"\"text/javascript\"\">myWin=window.open('http://doasapplease.com/do/confirma.php','_blank','width=350,height=400');setTimeout('self.close()',3000);</script>";
	}else{
		echo "La Raz&oacute;n social es necesario";
	}
	echo ".e.";
	mysql_close();
}
?>