

<?php
if (isset($_SESSION['admin'] )|| isset($_SESSION['utente'] )) 
	{	
    if(!isset($_GET['action']))
	{                
?>
<section class="contact-page-area section-gap">
    <div class="container">
    <form class="form-area contact-form text-left"  action="" method="post" enctype="multipart/form-data">
        <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
        ?>       

		    <?php 
/* ------Importante non cancella -----
		$result = $mysqli->query("SELECT distinct libri.*,autori.NomeA,scritto.isbn,editori.NomeE as nomeed, immagini.* FROM libri,scritto,autori,editori, immagini
		WHERE 
		(autori.idautore=scritto.idautore and scritto.isbn=libro.isbn) 
		and(editori.ideditore=libri.ideditore)and(immagini.isbn = libri.isbn)");
         //   $result = $mysqli->query("SELECT * FROM libro, immagini WHERE immagini.isbn = libro.isbn");
*/
$result = $mysqli->query("SELECT distinct libri.*,autori.*,scritto.isbn,editori.NomeE as nomeed, immagini.* 
								FROM libri,scritto,autori,editori, immagini 
								WHERE (autori.idautore=scritto.idautore and scritto.isbn=libri.isbn) 
								and(editori.ideditore=libri.ideditore)
								and(immagini.isbn = libri.isbn)  ORDER BY libri.Titolo");
$ris=$mysqli->affected_rows;

/*			echo "<div class='container'>
			<div class='row variable-gutters'>
				<div class='col-md-6 col-sm-6 col-xs-12 col-lg-3'>
					<div class='alert alert-danger '>
						<h5>  <center><strong>Record presenti $ris</strong></h5>
						<h4>  <center><strong>
					</div></div></div>
				</div>";*/
?>
<section class='module-list-archive clearboth padding-bottom mcp-have-2-column clearfix'>
<div class="container">
	<div class='row variable-gutters' > 

<?php 

            if ($result->num_rows > 0) 
		    {
			$conta=0;
  			    // output data of each row
  			    while($row = mysqli_fetch_assoc($result)) 
			    {   $conta++;
/*foreach ($row as $mese => $numero ) {
   print($mese." = ".$numero."<br/>");
}*/		 ?>
  <div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">
	<div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
		<div class="card-body">
			<div class="card-content"> 
				<article class="bcp-block-item-issue clearfix block-item-post list">
					 <div class="gcp-block-figure pull-left " >
						<?php  echo "<img src='libri/$row[Img_url]'  style='padding:0px 10px 0px 0px; width: 140px; height: 170px; '>" ?>
						
					 </div>	
						<h5  style="color : blue;"><?php echo  $row['Titolo'] ?></h5>
						<br><span class="block-info block-info--author">ISBN: <?php echo  $row['isbn'] ?></span>
						<br><span class="block-info block-info--author">Aut.: <?php echo  $row['CognomeA'].' '.$row['NomeA'] ?> </span>
						<br><span class="block-info block-info--author">Prezzo: <?php echo  $row['Prezzo'] ?></span>
						<br><span class="block-info block-info--author">Argomento: <?php echo  $row['Sezione'] ?></span>
						<br><span class="block-info block-info--author">Disponibili: <?php echo  $row['Quantita'] ?></span>
		</article>
			</div>
		</div>
	</div>
	<div class="py-4"></div>
</div>


<!--<a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/jan-henckens-ZQBpJZGwfKE-unsplash.jpg" alt="" />
                            </a>-->
	<?php					
                }
  		        }else
		        {
  			        echo "0 results";
		        }
                
	        ?>
</div>
</div>
</section>			

            </form>
    </div>	
</section>


<?php 
 }
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
			echo "setTimeout(\"location.href='index.php?inizio=db/visualizza/vis_libri_titolo.php';\", 1000);";     
			echo"</script>";

		}
        else
        {
            echo "Primo inserimento avvenuto ".$_GET['id']."   ".$idcf."   ".$_GET['idcf'];
			$sql = $mysqli->query("INSERT INTO acquista (isbn,cod_fis,Quantita,DataAcquisto,DataConsegna,Evaso) VALUES ('$_GET[id]','$_GET[idcf] ', 1, 0)");
			//$controllo = $mysqli->query("UPDATE libro SET quant = quant-1 WHERE isbn = $id ") ;

			echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=db/visualizza/vis_libri_titolo.php';\", 1000);";     
			echo"</script>";

        }

    }
//fine parte vera if (isset($_SESSION['admin'] )) 
}
else
{
    echo '
    <div class="container">
          <div class="alert alert-success ">
            <h5>  <center><strong>Utente non autorizzato</strong></h5>
            <h5>  <center><strong>Effettuare accesso</strong></h5>
        </div>
    </div><br>';		
    echo"<script type='text/javascript'>";   
    echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 1000);";     
    echo"</script>";
}
    
?>