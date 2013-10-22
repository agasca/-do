<head>
	<link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type='text/javascript'>
		//down always when using jquery
		$(document).ready(function(){
			$('#link').click(function(){
				$('#div1').toggle(500);
			});
		});

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
	</script>
</head>

<center>
	<hr class="style-two" />
	<a href="#" id="link" class="undln">Men&uacute;</a><p>
	<div id="div1" style="display:none">
		<h2>
		<a href="update.php">Mi informaci&oacute;n</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="upload.php">Subir XML</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="append.php">Formulario sin XML</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="filtro.php">Filtrar mi informaci&oacute;n</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="search.php">Buscador</a>&nbsp;	
		</h2>
	</div><!---end of div1-->
</center><br />
	