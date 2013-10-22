<html>
<head>
	<title>Registro</title>
	<script type='text/javascript'>
		function register(){
			var x = new Array();
			x[0] = document.getElementById('name').value;
			x[1] = document.getElementById('email').value;
			x[2] = document.getElementById('password').value;
			x[3] = document.getElementById('cpassword').value;			
			
			//Mensaje de error
			var h = new Array();
			h[0] = "<span style='color:red'>Digite su RFC por favor.</span>";
			h[1] = "<span style='color:red'>Digite una cuenta de correo electr&oacute;nico valida para envirle notificaciones</span>";
			h[2] = "<span style='color:red'>Digite un password!!!</span>";
			h[3] = "<span style='color:red'>Por favor, confirme el password!!!</span>";
			
			//checa capturados y no
			var divs = new Array("mname", "memail", "mpassword", "mcpassword");
			for(i in x){
				var error = h[i];
				var div = divs[i];
				if(x[i]==""){
					document.getElementById(div).innerHTML = error;
				}else{
					document.getElementById(div).innerHTML = "";
				}
			}
		}

		function pass(){
			var first = document.getElementById('password').value;
			var second = document.getElementById('cpassword').value;
			if (second == first){
				document.getElementById('mcpassword').innerHTML = "Ok";
			}else{
				document.getElementById('mcpassword').innerHTML = "<span style='color:red'>X</span>";
			}
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
	<h1><center>Formulario para registro de nuevo usuario</center></h1>
	<hr>
	<form ENCTYPE="multipart/form-data" method="post" action="insertU.php" />
		<table border="0" />
			<tr><td >Nombre</td><td><input type="text" name="name" maxlength="30" id="name" onKeyUp="register()" /></td><td><div id="mname"></div></td></tr>
			<tr><td>Email</td><td ><input type="text" name="email" maxlength="30" id="email" onKeyUp="register()" /></td><td><div id="memail"></div></td></tr>
			<tr><td>Password</td><td ><input type="password" name="password" maxlength="8" id="password" onKeyUp="register()" /><td><div id="mpassword"></div></td></td></tr>
			<tr><td>Confirme Password</td><td ><input type="password" name="cpassword" maxlength="8" id="cpassword" onKeyUp="pass()" /></td><td><div id="mcpassword"></div></td></tr>
		</table>
		<br/>
		<input type="submit" name="submit" value="Register" />
	</form>
</body>
</html>