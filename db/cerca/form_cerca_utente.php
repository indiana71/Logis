
<?php 

echo "<br><br><br>";	
	
$result = $mysqli->query("SELECT distinct * FROM utenti");

?>
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
  <h2>Ricerca con filtro</h2><br>
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
	<div class='row '> 
<th> cod_fis</th><th>Cognome</th><th>Nome</th><th>Indirizzo</th><th>Città</th><th>Telefono</th><th>Mail</th>
<?php 	
	if ($mysqli->affected_rows != 0)
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>
<tbody id="myTable">	
      <tr>
		
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['cod_fis'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Cognome'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Nome'] ?></h5></th>

		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Indirizzo'] ?></h5></th>
 		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Citta'] ?></h5></th>
				
				 		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Telefono'] ?></h5></th>
<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Email'] ?></h5></th>
			
     
	  </tr>	
	

        <?php } ?></tbody>
  </table>

</div>


<?php 

	}
	else{					
	echo '<div class="container">
			<div class="alert alert-danger ">
			<h5>  <center><strong>Nessun libro trovato</strong></h5>
			<h4>  <center><strong>
			</div>
		</div></section>';
		}
	//$mysqli->close(); 

    if(isset($_GET['action'])&&($_GET['action']=="add"))
    {           

        $id=intval($_GET['id']); 
		$idcf=($_GET['idcf']);
        $controllo = $mysqli->query("SELECT * FROM acquista WHERE cod_fis = '$_GET[idcf]' and isbn= '$_GET[id]'") ;
    
		
		if(mysqli_num_rows($controllo) > 0)
	    {echo "isbn = ---> ".$_GET['id']."Codice fiscale ---> ".$_GET['idcf'];
           echo '<div class="container">
                   <div class="alert alert-success ">
                       <h5>  <center><strong>Libro inserito nel carrello</strong></h5>
                   </div>
                 </div><br>';
			$sql = $mysqli->query("UPDATE acquista SET quant = quant+1 WHERE cod_fis = '$_GET[idcf]' and isbn= '$_GET[id]' ");
			//$controllo = $mysqli->query("UPDATE libro SET quant = quant-1 WHERE isbn= '$_GET[id]'  ") ;
			echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=db/cerca/form_cerca_libro.php';\", 1000);";     
			echo"</script>";

		}
        else
        {
            echo "Primo inserimento avvenuto ".$_GET['id']."   ".$idcf."   ".$_GET['idcf'];
			$sql = $mysqli->query("INSERT INTO acquista (isbn,cod_fis,quant,acquistato) VALUES ('$_GET[id]','$_GET[idcf] ', 1, 0)");
			//$controllo = $mysqli->query("UPDATE libro SET quant = quant-1 WHERE isbn = $id ") ;

			echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=db/cerca/form_cerca_libro.php';\", 1000);";     
			echo"</script>";

        }
	 }
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>