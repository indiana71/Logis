 <?php		 
 if (isset($_SESSION['utente']))
 {
$result = $mysqli->query("SELECT * FROM acquista where cod_fis='$_SESSION[utente]'");
 $ris=$mysqli->affected_rows;
			echo '<div class="container">
					<div class="alert alert-danger ">
						<h5>  <center><strong>Record presenti '.$ris.'</strong></h5>
						<h4>  <center><strong>
					</div>
				</div>';
 
 echo ("<h6><center><div class='table-responsive table-bordered'>");
			echo ("<table class='table table-striped' cellspacing='1'  border = '1' width='90%'><tr align='center'><td>isbn</td><td>Cod. Fis.</td><td>Quantità</td><td>Pagato</td>");
			echo "<br>";

			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				echo("<tr align='center'>");
				echo '<td > '. $row['isbn']."</td><td>". $row['cod_fis'].'</td><td>'. $row['quant']. '</td><td>'. $row['pagato']. '</td>';
			}
				print '</table></div></h6>';
				echo ("</center><br><br>");
 
 }else{			echo '<div class="container">
					<div class="alert alert-danger ">
						<h5>  <center><strong>Nessun Record presente '.$ris.'</strong></h5>
						<h4>  <center><strong>
					</div>
				</div>';	
	 }		
				

$mysqli->close();
?>