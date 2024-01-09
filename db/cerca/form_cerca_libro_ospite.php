
<?php 

echo "<br><br><br>";	
	
$result = $mysqli->query("SELECT distinct libro.*,autore.nome as aunome,scritto.isbn,editore.nome as nomeed, immagini.* FROM libro,scritto,autore,editore, immagini
		WHERE 
		(autore.idautore=scritto.idautore and scritto.isbn=libro.isbn) 
		and(editore.ideditore=libro.ideditore)
		and(immagini.isbn = libro.isbn)
		and (libro.titolo LIKE '%$_POST[titolo]%' or libro.isbn LIKE '%$_POST[titolo]%')
		order by libro.titolo
		");

?>
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
  <h2>Ricerca con filtro</h2><br>
 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
	<div class='row '> 
<th> </th><th> ISBN</th><th> Titolo</th><th>Autore</th><th>Editore</th><th>Sezione</th><th>Disponibili</th><th>Prezzo</th>
<?php 	
	if ($mysqli->affected_rows != 0)
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>
<tbody id="myTable">	
      <tr>
		<th><?php  echo "<img src='libri/$row[img_url]' style=' width:54px; height: 47px; '>" ?>
</th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['isbn'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['titolo'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['aunome'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['nomeed'] ?></h5></th>

		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['sezione'] ?></h5></th>
 		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['quant'] ?></h5></th>
				<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['prezzo'] ?></h5></th>
		
     
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