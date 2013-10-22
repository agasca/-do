<?php
	/*
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
		document.onmousedown=click; 
		document.oncontextmenu=new Function('return false');
		expandir_formulario();
	}
	//fin.Incluir			-----------
</script>";
	*/
	$epoch = time(); 
	$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
	

	$src_dt = $dt->format('Y-m-d H:i:s');
	$src_tz =  new DateTimeZone('UTC');
	$dest_tz = new DateTimeZone('America/Mexico_City');

	$dt = new DateTime($src_dt, $src_tz);
	$dt->setTimeZone($dest_tz);
	//$dest_dt = $dt->format('Y-m-d H:i:s');
	$dest_dt = $dt->format('Y-m-d');


	if(!isset($_SESSION['name']) && isset($_COOKIE['testsite'])){ //no session name but have a cookie then set a session name
		$_SESSION['name'] = $_COOKIE['testsite']; //session with name of user 
		echo "Not a session, but re-assigned<br/>";
		//echo $_SESSION['name'];
		//header("Refresh: 2; url=logout.php");
	}
	
	if(isset($_SESSION['name'])){
		echo "<h3>Fecha: ".$dest_dt." <a href='logout.php'>Salir </a><br />Cuenta del usuario:</h3>".$_SESSION['usuario'];
		//echo "Cuenta: ".$_SESSION['name'].','.$_SESSION['param'];
		//echo "UTC: ".$dt->format('Y-m-d H:i:s')."<br/><a href='logout.php'>Logout</a>";
		$a = $_SESSION['param'];
		if($a == 'm'){
			include('linksM.php');
		}else{
			include('links.php');
		}
	}else{
		//header("Refresh: 2; url=logout.php");
		sleep(2);
		{
		printf("<script>location.href='logout.php'</script>");
		}		
	}
?>