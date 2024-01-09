<div class="content">
<?php
if (isset ($_SESSION['admin'] )) 
{	 
				$result = $mysqli->query("SELECT * FROM utenti ORDER BY CognomeU");
			$ris=$mysqli->affected_rows;
			echo '<div class="container">
					<div class="alert alert-success ">
						<h5>  <center><strong>Elenco utenti - Record presenti '.$ris.'</strong></h5>
					</div>
				</div>';
			echo "<br>";
?>
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
	<div class='row variable-gutters'> 

<?php 
while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	?>
<div class="col-md-6 col-sm-6 col-xs-12 col-lg-3">
        <div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
            <div class="card-body">
                <div class="card-content"> 
					<article class="bcp-block-item-issue clearfix block-item-post list">
						 <div class="gcp-block-figure pull-left">
						<?php // echo "<img src='libri/$row[img_url]' style='padding:0px 10px 0px 0px; width: 140px; height: 170px; '>" ?>
						 </div>
						<h6 class="block-sub-title" style="color : blue;"><?php echo  $row['CognomeU']." ". $row['NomeU'] ?></h6>

						<h6 class="block-sub-title" style="color : blue;">Cod_fis: <?php echo  $row['cod_fis'] ?></h6>

						<h6 class="block-sub-title" style="color : blue;">User: <?php echo  $row['Username'] ?></h6>

						<h6 class="block-sub-title" style="color : blue;">Ind: <?php echo  $row['ViaU'] ?></h6>
						<h6 class="block-sub-title" style="color : blue;">Città: <?php echo  $row['CittaU'] ?></h6>
						<h6 class="block-sub-title" style="color : blue;">Tel: <?php echo  $row['TelefonoU'] ?></h6>
						<h6 class="block-sub-title" style="color : blue;">PEO: <?php echo  $row['EmailU'] ?></h6>

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
				
 <?php
$mysqli->close();






















	}
else
	{echo '<br><br><br><br>';
	echo '<div class="container">
		<div class="alert alert-danger ">
			<h5><center><strong>Area Elenco utenti</strong></h5>
			<h5><center><strong>Accedi per visualizzare</strong></h5>
			<h5><center><strong>Riservata Amministratore</strong></h5>
		</div>
	</div>';
	echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 3000);";     
		echo"</script>"; 
	}
?>
</div>

