
<?php  		
$result = $mysqli->query("SELECT libri.*,autori.*,scritto.isbn,editori.NomeE as nomeed, immagini.* FROM libri,scritto,autori,editori, immagini
		WHERE 
		(autori.idautore=scritto.idautore and scritto.isbn=libri.isbn) 
		and(editori.ideditore=libri.ideditore)and(immagini.isbn = libri.isbn)ORDER BY autori.CognomeA");

$result = $mysqli->query("SELECT distinct libri.*,autori.*,scritto.isbn,editori.NomeE as nomeed, immagini.* 
								FROM libri,scritto,autori,editori, immagini 
								WHERE (autori.idautore=scritto.idautore and scritto.isbn=libri.isbn) 
								and(editori.ideditore=libri.ideditore)
								and(immagini.isbn = libri.isbn)  ORDER BY libri.Titolo");


$ris=$mysqli->affected_rows;
			echo "<div class='container'>
			<div class='row variable-gutters'>
				<div class='col-md-6 col-sm-6 col-xs-12 col-lg-3'>
					<div class='alert alert-danger '>
						<h5>  <center><strong>Trovati: $ris risultati</strong></h5>
						<h4>  <center><strong>
					</div></div></div>
				</div>";
?>	
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
	<div class='row variable-gutters'> 
 

<?php	

		while($row = $result->fetch_array(MYSQLI_ASSOC))
	{  //time_sleep_until(time()+10);
//time_nanosleep(3,500000000);

	?>

  
      <div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">
        <div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
            <div class="card-body">
                <div class="card-content"> 
					<article class="bcp-block-item-issue clearfix block-item-post list">
						 <div class="gcp-block-figure pull-left">
						
						<?php  echo "<img src='libri/$row[Img_url]'  style='padding:0px 10px 0px 0px; width: 140px; height: 170px; '>" ?>
						 </div>
						

						<h1 class="block-title"><a href="https://www.zanichelli.it/ricerca/prodotti/biologia-001?hl=la%20fattoria%20degli%20animali" title="Biologia"></a></h1>
						<h5 style="color : blue;" class="block-sub-title"><?php echo  $row['Titolo'] ?></h5>
						<br><span class="block-info block-info--author">ISBN: <?php echo  $row['isbn'] ?></span>

						<br><span class="block-info block-info--author" style="color : blue;">Autore: <?php echo  $row['CognomeA'].' '.$row['NomeA'] ?></span>
						<br><span class="block-info block-info--author">Editore: <?php echo  $row['nomeed'] ?></span>

						<br><span class="block-info block-info--date">Disponibili: <?php echo  $row['Quantita'] ?></span>
					</article>
				</div>
			</div>
		</div>
		<div class="py-4"></div>
	</div>
        <?php } ?>
    </div>
</div>
</section>