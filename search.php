<?php 
	session_start(); 
	include("session.php");
?>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<center>
		<form method="GET" action="search.php">
			<input type="text" name="search">
			<input type="submit" name="submit" value="Encontrar">
		</form>
	</center>
	<hr>
	<u>Resultado:</u>
</body>
</html>
<?php
	if(!isset($_SESSION['name'])){
		echo "Acceso no permitido #b1.";
		exit;
	}else{
		if(isset($_REQUEST['submit'])){	//the buttom was click
			mysql_connect("Localhost","doasappl_root","mexico1") or die("Can not connect rigth now. Try it later!!!");
			mysql_select_db("doasappl_datos");			
			$search = mysql_real_escape_string($_GET['search']);	
			$terms = explode(" ", $search);	//makes an Array with words delimited
			$query = "select * from movimientos where ";
			$i = 0;
			//debajo utilizar el usuario para acotar las consultas
			foreach ($terms as $each) {
				$i++;
				if($i==1){
					$query .= "ename like '%$each%' or designation like '%$each%' or mobile like '%$each%' or fechaLog like '%$each%'";
				}else{
					$query .= "or ename like '%$each%' or designation like '%$each%' or mobile like '%$each%' or fechaLog like '%$each%'";
				}
			}
			$query = mysql_query($query);
			$num = mysql_num_rows($query);
			if($num>0 && $search !=""){
				echo "$num record(s) found for <b>$search</b>!";
				while($row = mysql_fetch_assoc($query)){
					$id = $row['id'];
					$campo01 = $row['ename'];
					$campo02 = $row['phone'];
					$campo03 = $row['designation'];
					echo "<h3>Name: $campo01 (id: $id)</h3>Email: $campo02 Datos: $campo03<hr width='3%' align='left'><br/>";
				}
				mysql_close();
			}else{
				echo "No results found";
			}	
		}else{
			echo "Digite letra o palabra para buscar el folio";
		}
	}
?>