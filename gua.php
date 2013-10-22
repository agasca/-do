<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "Acceso no permitido #gu1.";
	exit;
}else{
	echo "
	<html>
	<head>
		<!--style type='text/css'>		
		   	.Estilo7 {color: #999966}
			.Estilo8 {color: #7D9EC0}
		</style-->
		<script type='text/javascript'>
			//myWin=window.open('http://localhost/udemy/doasappelase_local/append.php','_blank','width=350,height=400');
			setTimeout('self.close()',5500);
		
			anado=[2,1,7,6,5,4,3];
			function saberSemana(d,m,a){
				fecha=new Date(a,0,1);
				primerDiaDelAno=anado[fecha.getDay()];
				fecha=new Date(a,0,primerDiaDelAno);
				fecha2=new Date(a,m,(d+primerDiaDelAno));
				tiempopasado=fecha2-fecha;
				semanas=Math.floor(tiempopasado/1000/60/60/24/7);
				if(semanas==0){semanas=52};
				alert(semanas);
			}
			//saberSemana(29,0,2013);
			var f = new Date();	

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
	<body>Notas:<br /></body>
	</html>
	";

	$_SESSION['capcha'] = $_POST['Variable'];
	mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
	mysql_select_db("doasappl_datos");

	$upLoading = 'X';
	
	$epoch = time(); 
	$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
	$a = $dt->format('Y-m-d');
	$weekNumber = date("W");

	$a01 = $_SESSION['name'].$_SESSION['capcha'];
	//$a

	$a03 = $_SESSION['tipoActividad'];
	$a04 = $_SESSION['name'];
	$a05 = $_SESSION['nombre_1'];
	$a06 = $_SESSION['nombreAlterno'];
	$a07 = $_SESSION['tipoCliente'];	//fecha
	$a08 = $_SESSION['empFactura'];		//fecha
	$a09 = $_SESSION['mRnMnR'];
	$a10 = str_replace(',', '', $_SESSION['nuevoMD']);
	
	if($a03=='I'){
		$a11 = $_SESSION['medio'];
		$a12 = str_replace(',', '', $_SESSION['especialidad']);
		$a13 = str_replace(',', '', $_SESSION['ciclo']);
		$a14 = str_replace(',', '', $_SESSION['mostroI']);
		$a15 = '';
	}else{
		$a11 = $_SESSION['otro'];
		$a12 = 0;
		$a13 = str_replace(',', '', $_SESSION['uVendidas']);
		$a14 = str_replace(',', '', $_SESSION['comentarios']);
		$a15 = $_SESSION['zfEdos'];
	};
	
	mysql_query("insert into movimientos (eName, phone, mobile, designation, department, po, inv, modifico, comentario, orden, nPedido, fechaPo, Guia,transporte,comentarioVts) values ('$a01'        ,'$a'          ,'$a03' , '$a04'       ,      '$a05' ,'$a06'      ,'$a07'  ,'$a08',  '$a09'  , $a10         , '$a11'   ,  $a12 ,$a13,$a14, '$a15')");
	echo "<span class='Estilo7'>1.- Esta venta se cierra automaticamente.<br />2.- Fecha de la transacci&oacute;n: " . $a . "<br />3.- Conserve # de  la transacci&oacute;n: </span>" . $_SESSION['name'] . $_SESSION['capcha'] . '<br />';
	echo "<span class='Estilo7'>5.- Utilice los filtros para confirmar su operaci&oacute;n.<br />6.-Para un nuevo registro, Clic en Men&uacute;.</span>"; 
	mysql_close();
}
?>