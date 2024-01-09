
<?php 

//echo "<br><br>";	
$result = $mysqli->query("SELECT distinct libri.*,autori.*,scritto.isbn,editori.NomeE as nomeed  FROM libri,scritto,autori,editori
		WHERE 
		(autori.idautore=scritto.idautore and scritto.isbn=libri.isbn) 
		and(editori.ideditore=libri.ideditore)
		
		and (libri.Titolo LIKE '%$_POST[titolo]%' or libri.isbn LIKE '%$_POST[titolo]%'or autori.CognomeA LIKE '%$_POST[titolo]%')
		order by libri.titolo
		");//and(immagini.isbn = libri.isbn)

?>
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
<!--  <h2>Ricerca con filtro</h2><br>
  <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
  <br>
  <table class="table table-bordered table-striped">
	<div class='row '> 
<th> ISBN</th><th> Titolo</th><th>Autore</th><th></th><th>Editore</th><th>Sezione</th><th>Disponibili</th><th>Prezzo</th>
<?php 	
	if ($mysqli->affected_rows != 0)
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>

      <tr>
<!--		<th><?php  echo "<img src='libri/$row[img_url]' style=' width:54px; height: 47px; '>" ?>
</th>-->
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['isbn'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Titolo'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['CognomeA'] ?></h5></th>
		        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['NomeA'] ?></h5></th>
        <th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['nomeed'] ?></h5></th>

		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Sezione'] ?></h5></th>
 		<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Quantita'] ?></h5></th>
				<th><h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Prezzo'] ?></h5></th>
<!--    <th><span class="block-info block-info--date">  <?php if ($row['quant']>0) { echo " <a href='index.php?inizio=db/cerca/form_cerca_libro.php&action=add&id=$row[isbn]&idcf=$_SESSION[utente]'><i class='fa fa-shopping-cart' style='font-size:23px;'></i></a>"; }?>
	</th>		-->
     
	  </tr>	
	

        <?php } ?>
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
