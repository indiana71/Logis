
 <?php		 
			$result = $mysqli->query("SELECT * FROM editori ORDER BY NomeE");
			$ris=$mysqli->affected_rows;
			echo "<div class='container'>
			<div class='row variable-gutters'>
				<div class='col-md-6 col-sm-6 col-xs-12 col-lg-3'>
					<div class='alert alert-danger '>
						<h5>  <center><strong>Record presenti $ris</strong></h5>
						<h4>  <center><strong>
					</div></div></div>
				</div>";
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

						<h1 class="block-title"><a href="https://www.zanichelli.it/ricerca/prodotti/biologia-001?hl=la%20fattoria%20degli%20animali" title="Biologia"></a></h1>
						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['NomeE'] ?></h5>

						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['Indirizzoemail'] ?></h5>

						<h5 class="block-sub-title" style="color : blue;"><?php echo  $row['TelefonoE'] ?></h5>
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
?>