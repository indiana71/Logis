  
 <?php
 session_start();
 /*
if(!isset($_SESSION['admin'])) 
{
	echo '<br><br><br><br><div class="container">
		  <div class="alert alert-danger">
		   <h5>  <center><strong> Utente non autorizzato  </strong></h5>
		   <h5>  <center><strong> Area riservata </strong></h5>
		    <h5>  <center><strong> Accedere con le proprie credenziali </strong></h5>
		  </div>
		 
		</div><br><br><br>';
		echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 3000);";     
		echo"</script>"; 
}
else{

	*/

//include 'connessione.php';
		$sql = "CREATE TABLE utenti
	(   cod_fis      		    	CHAR(16) NOT NULL,
	    Username      	   	CHAR(30) NOT NULL,
	    Password    	                            CHAR(60) NOT NULL,
	    CognomeU        	              CHAR(30) NOT NULL,
	    NomeU      		 	CHAR(30) NOT NULL,
	    ViaU		 		CHAR(25) NOT NULL,
	    N_civico      			int NOT NULL,
    CittaU			CHAR(25) NOT NULL,
	    TelefonoU		 	CHAR(25) NOT NULL,
	    EmailU			CHAR(30) NOT NULL,
	   PRIMARY KEY  (cod_fis)
	) ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA Utenti già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Utenti è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}		
$sql = "CREATE TABLE autori
	(   idautore		INT NOT NULL AUTO_INCREMENT,
	     NomeA        		CHAR(30) NOT NULL,
	     CognomeA        	CHAR(30) NOT NULL,
	     DatanascitaA     	CHAR(30),
	     LuogoA  		CHAR(30),
	     BiografiaA  		CHAR(30),
	     PRIMARY KEY (idautore)
	)ENGINE=InnoDB";

		
		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
								<h5>  <center><strong>TABELLA Autori già esistente</strong></h5><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Autori è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}

$sql = "CREATE TABLE editori
	(   ideditore		INT NOT NULL AUTO_INCREMENT,
	    NomeE		CHAR(30) NOT NULL,
                  Indirizzoemail     	CHAR(30),
	    TelefonoE  		CHAR(30),
 	    PRIMARY KEY (ideditore)
	)ENGINE=InnoDB";

		
		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA Editori già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Editori è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}		
	
		$sql = "CREATE TABLE libri
	(  isbn			CHAR(13) NOT NULL,
	   Titolo     		CHAR(30) NOT NULL,
	   ideditore  		INT NOT NULL,
	   
	   Lingua  		CHAR(14),
	   Data_pub  		CHAR(30),
	   Sezione    		CHAR(3),
                 Quantita 		INT,
	   Prezzo		float,
	   PRIMARY KEY (isbn),
	   FOREIGN KEY (ideditore) REFERENCES editori (ideditore) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA Libro già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Libro è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}	
				
				$sql = "CREATE TABLE immagini
	(  id_img  		    INT NOT NULL AUTO_INCREMENT,
	    Img_url 		    CHAR(60) NOT NULL,
	    isbn 			     CHAR(16) NOT NULL,
	    PRIMARY KEY (id_img),
	    FOREIGN KEY (isbn) REFERENCES libri (isbn) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA immagini già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Immagini è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}					


$sql = "CREATE TABLE acquista
	(   isbn 		 	CHAR(16) NOT NULL,
	    cod_fis 	              CHAR(16) NOT NULL,
	    Quantita    		int,
	    DataAcquisto 	date,
	    DataConsegna 	date,
	    Evaso 		int,
                 FOREIGN KEY (isbn) REFERENCES libri (isbn) ON DELETE CASCADE ON UPDATE CASCADE,
	   FOREIGN KEY (cod_fis) REFERENCES utenti (cod_fis) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA Acquista già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA Acquista è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}




$sql = "CREATE TABLE scritto
	(    isbn  		CHAR(16) NOT NULL,
	     idautore  	  	INT NOT NULL,
                   FOREIGN KEY (isbn) REFERENCES libri (isbn) ON DELETE CASCADE ON UPDATE CASCADE,
	     FOREIGN KEY (idautore) REFERENCES autori (idautore) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA scritto già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA scritto è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}	
$sql = "CREATE TABLE storico
	(   isbn  			 CHAR(16) NOT NULL,
	    cod_fis                           CHAR(16) NOT NULL,
	    AnnoAcquisto               int,
	    FOREIGN KEY (isbn) REFERENCES libri (isbn) ON DELETE CASCADE ON UPDATE CASCADE,
	    FOREIGN KEY (cod_fis) REFERENCES utenti (cod_fis) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE=InnoDB";


		if (  !$mysqli->query($sql) )
				{	
					echo '
						<div class="container">
							<div class="alert alert-danger ">
							<h5>  <center><strong>TABELLA storico già esistente</strong></h5>
							<h4>  <center><strong>
							</div>
						</div>';
				}
				else // se non esiste, lo creo
				{	$mysqli->query($sql);
					echo '<div class="container">
							  <div class="alert alert-success ">
									<h5>  <center><strong>La TABELLA storico è stata creata con successo.</strong></h5>
							  </div>
						</div><br>';
				}
			

$mysqli->close();
	
		
?>