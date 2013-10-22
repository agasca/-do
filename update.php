<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "Acceso no permitido #v1.";
		exit;
	}else{
		include("session.php");
		echo "<h3>Actividades registradas:</h3><br/>";
		mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
		mysql_select_db("doasappl_datos");		
		//pagination
		$per_page = 6;	

		//$pages_query = mysql_query("select count('id') from movimientos");
		if (($_SESSION['param'])=='m'){
		$pages_query = mysql_query("select count('id') from movimientos");
		}else{
			$filtrarU = $_SESSION['name'];
			$pages_query = mysql_query("select count('id') from movimientos WHERE designation = '$filtrarU'");
		}

		$pages = ceil(mysql_result($pages_query, 0) / $per_page);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page - 1) * $per_page;
		
		//$query = mysql_query("select * from movimientos LIMIT $start, $per_page");
		if (($_SESSION['param'])=='m'){
		$query = mysql_query("select * from movimientos  LIMIT $start, $per_page");
		}else{
			$query = mysql_query("select * from movimientos WHERE designation = '$filtrarU' LIMIT $start, $per_page");
		}
		
		//pagination
		//$result = mysql_query("select * from users");	CHG00
		echo "<div id='div2'><table />";
		echo "<tr>    
				<td align=\"center\" bgcolor=\"#7D9EC0\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>ID</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Folio</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>.</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Fecha de captura</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>(I)ngreso / (E)greso </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Usuario</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Razon Social </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Numero factura</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Fecha expedici&oacute;n</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Fecha cobro </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>RFC</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Importe</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Tipo IVA </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>I V A</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Retencion IVA </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Retencion ISR </b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Tipo de deducci&oacute;n</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b> Observacion B</b></font></td>
				<td bgcolor=\"#7D9EC0\" align=\"center\"><font face=\"verdana\" size=\"1\"
				color=\"#FFFFFF\"><b>Dato encriptado&nbsp;</b></font></td>
	</tr></div><!---end of div2-->";
		//while($row=mysql_fetch_array($result)){	//CHG00
		while($row=mysql_fetch_assoc($query)){	//pagination
			$id=$row['id'];
			$campo01=$row['ename'];
			$campo02=$row['uploading'];
			$campo03=$row['phone'];			
			$campo04=$row['mobile'];
			$campo05=$row['designation'];
			$campo06=$row['department'];
			$campo07=$row['transporte'];	//IVA
			$campo08=$row['po'];
			$campo09=$row['inv'];
			$campo10=$row['modifico'];
			$campo11=$row['comentario'];
			$campo12=$row['orden'];
			$campo13=$row['nPedido'];
			$campo14=$row['fechaPo'];
			$campo15=$row['guia'];
			$campo16=$row['transporte'];
			$campo17=$row['comentarioVts'];
			/*
			
			
			$campo18=$row['comentarioLog'];
			$campo19=$row['numSalida'];
			$campo20=$row['fechaCapt'];
			$campo21=$row['tAct'];
			$campo22=$row['logComentario'];
			$campo23=$row['congNombre'];
			$campo24=$row['congLugar'];
			*/
			echo "
			<td align=center>$id</td>
			<td>$campo01</td>
			<td>$campo02</td>
			<td>$campo03</td>
			<td>$campo04</td>	
			<td>$campo05</td>
			<td>$campo06</td>
			<td>$campo08</td>
			<td>$campo09</td>	
			<td>$campo10</td>
			<td>$campo11</td>
			<td>$campo12</td>
			<td>$campo13</td>
			<td>";
			if($campo04=='I'){
				echo $campo07;
			}else{
				echo $campo16;
			};
			echo "</td>
			<td>$campo14</td>
			<td>$campo15</td>
			<td>$campo17</td>
			<td>N/A&nbsp;</td>
			<td>N/A&nbsp;</td>
		</tr>
			";
		}
		echo "</table>";
		//pagination
		$prev = $page - 1;
		$next = $page + 1;
		echo "<center>";
		if(!($page<=1)){
			echo "<a href='update.php?page=$prev'>Previo</a> ";	
		}
		if($pages>=1){
			for($x=1;$x<=$pages;$x++){
				//echo '<a href="?page='.$x.'">'.$x.'</a> ';
				echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
			}
		}
		if(!($page>=$pages)){
			echo "<a href='update.php?page=$next'>Siguiente</a> ";
		}	
		echo "</center>";
		//pagination
		mysql_close();
	}
?>