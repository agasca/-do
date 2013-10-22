<?php
session_start();
	if(!isset($_SESSION['name'])){
		echo "Acceso no permitido #co1.";
		exit;
	}else{
		echo 'Tipo de actividad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION['tipoActividad'] . '<br />';
		echo 'Razon Social:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION['nombre_1'] .'<br />';
		echo 'RFC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['mRnMnR']) . '<br />';
		echo 'Numero de Factura:&nbsp;&nbsp;&nbsp;' . ($_SESSION['nombreAlterno']) . '<br />';
		echo 'Fecha expedici&oacute;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['tipoCliente']) . '<br />';
		echo 'Fecha cobro:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['empFactura']) . '<br />';
		echo 'Importe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['nuevoMD']) . '<br />';		
		if(($_SESSION['tipoActividad'])=='I'){
			echo 'IVA i:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['mostroI']) . '<br />';
			echo 'Tipo de IVA Ingreso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['medio']) . '<br />';
			echo 'Ret ISR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['especialidad']) . '<br/>';
			echo 'Ret IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION['ciclo'] . '<br />';
		}else{
			echo 'IVA e:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['comentarios']) . '<br />';
			echo 'Tipo de IVA Deducci&oacute;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . ($_SESSION['otro']) . '<br />';			
			echo 'ISR retenido al contribuyente Egreso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION['uVendidas'] . '<br />';
			echo 'Tipo de Deducci&oacute;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION['zfEdos']  . '<br />';			
		}
	}
?>

<html>
<head>
<title>Confirmar</title>
<script type='text/javascript'>
	var dato = "";		//puennte entre Js y Asp		
	//Created / Generates the captcha function    
	function DrawCaptcha(){
		var a = Math.ceil(Math.random() * 10)+ '';
		var b = Math.ceil(Math.random() * 10)+ '';       
		var c = Math.ceil(Math.random() * 10)+ '';  
		var d = Math.ceil(Math.random() * 10)+ '';  
		var e = Math.ceil(Math.random() * 10)+ '';  
		var f = Math.ceil(Math.random() * 10)+ '';  
		var g = Math.ceil(Math.random() * 10)+ '';  
		var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
		//document.getElementById("txtCaptcha").value = code;
		dato = a+b+c+d+e+f+g;
		document.f1.Variable.value = dato;
		document.f1.submit();			
		//alert(dato);			
	}		
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
</script>
</head>
<body>
<br>
<br>
<form name="f1" action="gua.php" method="POST">
	<input type="hidden" name="Variable" >
</form>




<hr/>
<a onClick="DrawCaptcha();" href="#">Clic aqu&iacute; para confirmar y guardar en base de datos</a>
</body>
</html>
