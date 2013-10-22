<?php
	session_start();
	$expire = time()-86400;
	if(!(isset($_SESSION['name']))){
		session_destroy();
		echo "Session has been destroyed.<br/>Please wait a moment #a30.";			
	}else{
		setcookie('testsite', $_SESSION['name'], $expire);
		session_destroy();
		echo "Session and Cookies are destroyed.<br/>Please wait a moment #a31.";			
		}
	//header("Refresh: 2; url=home.php");	
	sleep(2);
	{
	printf("<script>location.href='home.php'</script>");
	}
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
?>