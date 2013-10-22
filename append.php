<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo ".Access denied #ap1.";
		exit;
	}else{
		include("session.php");
		echo "
		<html>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />		
			<title>Welcome</title>
			<link rel='stylesheet' type='text/css' media='all' href='jsDatePick_ltr.min.css' />			
			<script type='text/javascript' src='jsDatePick.min.1.3.js'></script>							
			<script type='text/javascript' src='formexp.js'></script>
			<!--style type='text/css'>		
				#capaexpansion{
					position:relative;
					display:none;
				}		
		    	.Estilo7 {color: #999966}
				.Estilo8 {color: #7D9EC0}
		  	</style-->

		  	<script type='text/javascript'>
				function formatCurrency(num) {
					num = num.toString().replace(/\$|\,/g,'');
					if(isNaN(num))
						num = '0';
						sign = (num == (num = Math.abs(num)));
						num = Math.floor(num*100+0.50000000001);
						cents = num%100;
						num = Math.floor(num/100).toString();
					if(cents<10)
						cents = '0' + cents;
						for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
							num = num.substring(0,num.length-(4*i+3))+','+
							num.substring(num.length-(4*i+3));
						//return (((sign)?'':'-') + '$' + num + '.' + cents);
						return (((sign)?'':'-') + num + '.' + cents);
				}

				function expandir_formulario(){
					//xDisplay('capaexpansion2', 'block');
					if (document.formulario.catalogo09.value == ''){
						xDisplay('capaexpansion0', 'none');
						xDisplay('capaexpansion1', 'none');
						xDisplay('capaexpansion01', 'none');
						xDisplay('capaexpansion02', 'none');
						
						//campos
						document.formulario.tipoIva.style.display='none';
						document.formulario.txtCampo6.style.display='none';
						document.formulario.txtCampo7.style.display='none';
						document.formulario.tipoIvaE.style.display='none';

					}else if(document.formulario.catalogo09.value == 'I'){
						xDisplay('capaexpansion0', 'block');
						xDisplay('capaexpansion01', 'block');
						xDisplay('capaexpansion02', 'none');
						document.formulario.tipoIva.style.display='block';
						document.formulario.tipoIvaE.style.display='none';	
						document.getElementById('mtxtFecha').innerHTML = 'Cobro';
						document.getElementById('mtxtTlIva').innerHTML = 'acreditable pagado';												
						new JsDatePick({
							useMode:2,
							target:'inputField',
							dateFormat:'%Y-%m-%d'
						});	
						new JsDatePick({
							useMode:2,
							target:'inputField1',
							dateFormat:'%Y-%m-%d'
						});
					}else{
						xDisplay('capaexpansion0', 'block');
						xDisplay('capaexpansion01', 'none');
						xDisplay('capaexpansion02', 'block');						
						document.formulario.tipoIva.style.display='none';
						document.formulario.tipoIvaE.style.display='block';						
						document.getElementById('mtxtFecha').innerHTML = 'Pago';
						document.getElementById('mtxtTlIva').innerHTML = 'trasladado cobrado';																		
						new JsDatePick({
							useMode:2,
							target:'inputField',
							dateFormat:'%Y-%m-%d'
						});	
						new JsDatePick({
							useMode:2,
							target:'inputField1',
							dateFormat:'%Y-%m-%d'
						});	
					}
				};		
				
				function activa(){
					if((document.formulario.catalogo09.value=='I')){
						if (document.formulario.tipoIva.value == ''){
							xDisplay('capaexpansion1', 'none');
						}else{
							xDisplay('capaexpansion1', 'block');				
						}
						if (document.formulario.rb[0].checked == true){
							//xDisplay('capaexpansion1', 'block');				
							document.formulario.checkbox.style.display='block';		
							document.formulario.txtCampo6.style.display='block';
							document.formulario.txtCampo7.style.display='block';
			 				document.formulario.boton.style.display='none';	
			 			/*
						}else if (document.formulario.rb[0].checked == false){
							//xDisplay('capaexpansion1', 'none');			
							document.formulario.txtCampo6.style.display='none';
							document.formulario.txtCampo7.style.display='none';
							document.formulario.boton.style.display='none';	
						*/
					}else{
							//xDisplay('capaexpansion1', 'block');			
							document.formulario.txtCampo6.style.display='none';
							document.formulario.txtCampo7.style.display='none';
							document.formulario.boton.style.display='none';	
			 			}
			 		}else{//tipoIvaE
			 			if (document.formulario.tipoIvaE.value == ''){
							xDisplay('capaexpansion1', 'none');			
							document.formulario.txtCampo6.style.display='none';
							document.formulario.txtCampo7.style.display='none';			 				
							document.formulario.boton.style.display='none';	
						}else{
							xDisplay('capaexpansion1', 'block');												
							document.formulario.checkbox.style.display='block';				
							document.formulario.txtCampo6.style.display='none';
							document.formulario.txtCampo7.style.display='none';				
			 				document.formulario.boton.style.display='none';				
					}
			 		}

					if (document.formulario.checkbox.checked){
						var answer = confirm ('Presione ACEPTAR para confirmar los datos. Presione CANCELAR para revisar.');
						if (answer){			
			 				document.formulario.boton.style.display='block';					
						}else{
							document.formulario.checkbox.checked = false;
						}
					}
				};						

				function register(){
					var x = new Array();
					x[0] = document.getElementById('txtCampo0').value;
					x[1] = document.getElementById('txtCampo1').value;					
					x[2] = document.getElementById('txtCampo4').value;
					x[3] = document.getElementById('txtCampo5').value;
				
					//Mensaje de error
					var h = new Array();
					h[0] = \"<span style='color:red'>Digite la razon social</span>\";
					h[1] = \"<span style='color:red'>Digite el numero de factura</span>\";					
					h[2] = \"<span style='color:red'>Digite 13 o 14 caracteres del RFC</span>\";
					h[3] = \"<span style='color:red'>Cifras sin coma, solo decimal</span>\";
					
					//checa capturados y no
					var divs = new Array('mtxtCampo0','mtxtCampo1', 'mtxtCampo4', 'mtxtCampo5');
					for(i in x){
						var error = h[i];
						var div = divs[i];
						if(x[i]==''){
							document.getElementById(div).innerHTML = error;
						}else{
							document.getElementById(div).innerHTML = '';
						}
					}
				};
			</script>	
		</head>
		<body >
			<div id='div4'>
			<form name='formulario'  method='POST' action='appForm.php'>

				<table width='900' >
					<tr>
					<td >
					<select name='catalogo09' style='background:#7D9EC0; color:white' onChange='expandir_formulario()'>
						<option value=''>Tipo de Actividad</option>
						<option value='I'>Ingreso</option>
						<option value='E'>Egreso</option>
					</select></td>
					<td>&nbsp;</td>
					<td  ><div align='right'><span class='Estilo8'>Raz&oacute;n social o Nombre del Cliente </span></div></td>
					<td>&nbsp;</td>
					<td ><input type='text' name='txtCampo0' style='background:#7D9EC0; color:white;' id='txtCampo0' onKeyUp='register()' /></td>
					</tr>
					<tr>
					<td>&nbsp;</td>
					<td >&nbsp;</td>
					<td >&nbsp;</td>
					<td >&nbsp;</td>
					<td  ><div id='mtxtCampo0'></div></td>
					</tr>
					</table>





				<!-- Capa 0 -->
				<div id='capaexpansion0'>
					<table width='900' >
						<tr>
						<td width='270' height='26'><div >N&uacute;mero de Factura </div></td>
						<td width='5'>&nbsp;</td>
						<td width='173'><p >Fecha de Expedici&oacute;n</p></td>
						<td width='1'>&nbsp;</td>
						<td width='105'><div >Fecha de</div></td>
						<TD width='22'>
						<TD colspan='3'><div align='left'>RFC</div></TD>
						</tr>		
						
								
						<tr>
						<td height='26' ><div >o Folio fiscal </div></td>
						<td >&nbsp;</td>
						<td valign='top'> <div >(Informativo)</div></td>
						<td >&nbsp;</td>
						<td valign='top'><div id='mtxtFecha'></div></td>
						<TD >&nbsp;</Td>          
						<Td colspan='3' valign='top'><div id='mtxtCampo4'></div></Td>
						</tr>
						
						<tr>
						  <td height='26'><input type='text' name='txtCampo1' id='txtCampo1' onKeyUp='register()' /></td>
						<td>&nbsp;</td>
						<td><input type='text' name ='fec01' size='12' id='inputField' /></td>
						<td>&nbsp;</td>
						<td><input type='text' name ='fec02' size='12' id='inputField1' />						</td>
						  <Td >&nbsp;</TD>
						  <Td colspan='3'><input type='text' name='txtCampo4' id='txtCampo4' maxlength='14' onKeyUp='register()' /></TD>
						</tr>

						<tr>
						  <td height='26'  ><div id='mtxtCampo1'></div></td>
						  <td  >&nbsp;</td>
						  <td  >&nbsp;</td>
						  <td  >&nbsp;</td>
						  <td  >&nbsp;</td>
						  <Td  >&nbsp;</TD>
						  <Td colspan='2' valign='top'  ><div align='left'>Importe sin IVA</div></TD>
					  <Td width='182'  >&nbsp;</TD>
						</tr>
						<tr>
						  <td rowspan='6'  ></td>
						  <td rowspan='6'  ></td>
						  <td rowspan='6'  ></td>
						  <td rowspan='6'  ></td>
						  <td rowspan='6'  ></td>
						  <Td height='26'  >&nbsp;</TD>
						  <Td colspan='3'  ><input type='text' name='txtCampo5' id='txtCampo5' onKeyUp='register()' onBlur='this.value=formatCurrency(this.value);' /></TD>
					  </tr>
						<tr>
						  <Td height='26'  >&nbsp;</TD>
						  <Td colspan='3'  ><div id='mtxtCampo5'></div></TD>
					  </tr>
						<tr>
						  <Td height='21'>&nbsp;</TD>
						  <Td width='36' valign='top'> IVA</TD>
					    <Td colspan='2' valign='top'><div id='mtxtTlIva'></div></TD>
						</tr>
						<tr>
						  <td height='0' ></td>
						  <td></td>
						  <td width='66'></td>
						  <td></td>
						</tr>
					</table>
				</div>	  
				<!-- Capa 0 -->







				<!-- Capa 01 anexo -->
				<div id='capaexpansion01'>
					<table width='900' >
						
						<tr>
						  <td width='351' height='26' valign='top'></td>
						  <td width='210'><select name='tipoIva' style='background:#7D9EC0; color:white' onChange='activa()'>
                <option value=''>Indique tasa de IVA</option>
								<option value='16'>IVA al 16%</option>
								<option value='11'>IVA al 11%</option>
								<option value='0'>IVA al 0%</option>
								<option value='Exento'>IVA Exento (Doctores)</option>
              </select></td>
						  <td width='17' >&nbsp;</td>
				      <td width='292' valign='top'><input type='text' name='txtCampo8' value='0.00' onBlur='this.value=formatCurrency(this.value);' /></td>
						</tr>
						
						<tr>
						  <td height='26'>&nbsp;</td>
						  <td valign='top'>Indique s&iacute; le retuvieron impuestos</td>
						  <td>&nbsp;</td>
						  <td valign='top'><input name='rb' type='radio' value='S' onChange='activa()'>
Si
<input name='rb' type='radio' value='N' onChange='activa()'>
No </td>
						</tr>
						<tr>
						  <td height='26'></td>
						  <td valign='top'>IVA retenido al contribuyente</td>          
						<td  >&nbsp;</td>
						<td valign='top'><input type='text' name='txtCampo6' value='0.00' onBlur='this.value=formatCurrency(this.value);' /></td>
						</tr>
						<tr>
						  <td height='26'></td>
						  <td valign='top'>ISR retenido al contribuyente</td>          
							<td  >&nbsp;</td>          
						  <td valign='top'><input type='text' name='txtCampo7' value='0.00' onBlur='this.value=formatCurrency(this.value);' /></td>          
						</tr>
					</table>
				</div>	  
				<!-- Capa 01 anexo -->


				
				<!-- Capa 02 anexo -->
				<div id='capaexpansion02'>
					<table width='900' >
						<tr>
						  <td width='1' valign='top' ><!---->&nbsp;</td>
						  <td width='1' valign='top' ><!---->&nbsp;</td>
						  <td width='350' height='24' ></td>
						  <td width='207' valign='top' ><select name='tipoIvaE' style='background:#7D9EC0; color:white' onChange='activa()'>
			                <option value=''>Tipo IVA</option>
			                <option value='16'>IVA al 16%</option>
			                <option value='11'>IVA al 11%</option>
			                <option value='0'>IVA al 0%</option>
			                <option value='Exento'>IVA Exento (Doctores)</option>
              </select></td>
				    <td width='17' >&nbsp;</td>
				      <td width='292' ><input type='text' name='txtCampo81' value='0.00' onBlur='this.value=formatCurrency(this.value);' /></td>
					  </tr>
						<tr>
						  <td valign='top' ><!---->&nbsp;</td>
						  <td valign='top' ><!---->&nbsp;</td>
						  <td height='24' ></td>
						  <td valign='top' ><label>
						    <select name='tipoD' style='background:#7D9EC0; color:white' onChange='activa()'>
						      <option value=''>Tipo de deducciones</option>
						      <option value='H'>Honorarios</option>
						      <option value='A'>Arrendamiento</option>
						      <option value='F'>Fletes</option>
						      <option value='C'>Celular y telefono</option>
						      <option value='G'>Gasolina</option>
						      <option value='P'>Primas por seguros</option>
						      <option value='I'>Impuesto estatal pagado en el mes (RTP Doctores)</option>
						      <option value='B'>Biaticos y gastos de viaje</option>
				        </select>
						  </label></td>
						  <td >&nbsp;</td>
						  <td ><!---->&nbsp;</td>
						</tr>
						<tr>
						  <td valign='top' ><!---->&nbsp;</td>
						  <td valign='top' ><!---->&nbsp;</td>
						  <td height='24' ></td>
						  <td valign='top' >ISR retenido al contribuyente</td>
						  <td >&nbsp;</td>
						  <td ><input name='txtCampo9' type='text' id='txtCampo9' onBlur='this.value=formatCurrency(this.value);' value='0.00' /></td>
					  </tr>
					</table>
				</div>	  
				<!-- Capa 02 anexo-->				
				
				
				
				
				
				<!-- Capa 1 -->
				<div id='capaexpansion1'>	
					<table width='285' height='101' >
						<tr>
						  <TD height='39' colspan='3' >&nbsp;</TD>
			      </TR>
						<tr>
						  <TD width='99' height='44' >Confirmar datos</TD>
						  <TD width='20' ><input type='checkbox' name='checkbox' value='checkbox' onClick='activa();'></TD>
						  <TD width='84' ><input name='boton' type='submit' id='boton' value='Guardar' style ='border: 1px solid #006; background: #9cf;'></TD>
					  </TR>
					</table>
				</div>	
				<!-- Capa 1 -->
				
				
				
				
				
				
				
				
				
				
				<!-- Capa 2 -->
				<div id='capaexpansion2'>
					<center>
					<p ><span class='Estilo7'>Nota:<br />Permita ventanas emergentes o pop-ups</span></p>
					<span class='Estilo7'>Proporcione la mayor cantidad de datos para realizar correctamente el </span>
					<span class='Estilo8'>registro contable</span>.<br />
					<span class='Estilo7'>Durante el registro de los datos, el sitio no realizar&aacute; c&aacute;lculos aritm&eacute;ticos para evitar situaciones de redondeo.</span>
					</center>					
				</div>
				<!-- Capa 2 -->
			</form>
		</div><!---end of div2-->
		</body>
		</html>


		";
		}
?>