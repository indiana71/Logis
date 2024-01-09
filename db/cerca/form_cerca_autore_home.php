

<?php 
/*if((isset($_POST['log'])))  
	{ */


$result = $mysqli->query("SELECT *
							FROM autori
							WHERE 
							(autori.NomeA LIKE '%$_POST[nome]%') or (autori.CognomeA LIKE '%$_POST[nome]%')
							order by autori.NomeA	
							");
	
	
	if ($mysqli->affected_rows != 0)
	{
	echo ("<h6><center><div class='table-responsive table-bordered'>");
	

	echo ("<table class='table table-striped' cellspacing='1'  border = '1' width='90%'>
			<tr align='center'>
		<th><h5 class='block-sub-title' style='color : blue;'>Id</h5></th>
		<th><h5 class='block-sub-title' style='color : blue;'>Nome</h5></th>
		<th><h5 class='block-sub-title' style='color : blue;'>Cognome</h5></th>
		<th><h5 class='block-sub-title' style='color : blue;'>Nato a</h5></th>
		
		<th><h5 class='block-sub-title' style='color : blue;'>Il</h5></th>
		<th><h5 class='block-sub-title' style='color : blue;'>Recensione</h5></th>
	</tr>");
	echo "<br>";

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{

		echo("<tr align='center'>");
			echo "<td>". $row['idautore'].'</td>
				  <td>'. $row['NomeA']. '</td>
				  <td>'. $row['CognomeA']. '</td>
				  <td > '. $row['DatanascitaA'].'</td>
				  <td > '. $row['LuogoA'].'</td>
				  <td > '. $row['BiografiaA'].'</td>';
    }
		print '</table></div></h6>';
		echo ("</center><br><br>");	
	}
	else{					
	echo '<div class="container">
			<div class="alert alert-danger ">
			<h5>  <center><strong>Nessun Autore trovato</strong></h5>
			<h4>  <center><strong>
			</div>
		</div>';
		}
	$mysqli->close(); 


	
?>

