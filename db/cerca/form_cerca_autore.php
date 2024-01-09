<?php 
if((isset($_POST['log'])))  
	{ 
echo "<br><br><br>";	

$result = $mysqli->query("SELECT *
							FROM autori
							WHERE 
							(autori.NomeA LIKE '%$_POST[nome]%') or (autori.CognomeA LIKE '%$_POST[nome]%')
							order by autori.CognomeA
							
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
				  <td > '. $row['LuogoA'].'</td>

				  <td > '. $row['DatanascitaA'].'</td>
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
} else { 
?>
<br><br>
<form name="FORM"  method="post" action="" enctype="text" /> 

	<div class="row">	
	<!--	<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
			<input name="Nome" placeholder="Inserisci sequenza Username da cercare" onfocus="this.placeholder = 'Ricorda...sequenza di caratteri'" onblur="this.placeholder = 'Inserisci sequenza Username da cercare'" class="common-input mb-20 form-control" required="" type="text">
		</div>
		<div class="col-lg-4 form-group"></div> -->
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
			<input name="nome" placeholder="Inserisci nome da cercare" onfocus="this.placeholder = 'Ricorda...sequenza di caratteri'" onblur="this.placeholder = 'Inserisci NOME da cercare'" class="common-input mb-20 form-control"  type="text">
		</div>
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
		</div>
		<div class="col-lg-4 form-group"></div>
		
		<div class="col-lg-4 form-group"></div>
		<div class="col-lg-4 form-group">
			<input type="submit" name="log" class="common-input mb-20 form-control" >
		</div>
		<div class="col-lg-4 form-group"></div>
		
		<br><br><br><br>
		
	</div>

</form>

<?php 
} 
	
?>

