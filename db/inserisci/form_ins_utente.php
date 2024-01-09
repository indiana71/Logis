<?php
//if (isset($_SESSION['admin'] )) 
//	{
	IF(!isset($_POST['log']))
		{
?>
<!-- Start  -->
<html>
<br><br><br>
			<section class="contact-page-area section-gap">
				<div class="container"><br>
					<div class="row"><br><br>
						<div class="col-lg-12 ">
							<form class="form-area contact-form text-right"  action="" method="post">
								<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-12">
							<div class="title text-center">
								<h3 class="mb-10">Registrazione Area Riservata<br>Inserimento Utenti</h3>	

							</div>
						</div>
					</div>	
                        <div class="row">
							<div class="col-lg-3 form-group">
							<input name="cod_fis" placeholder="Codice Fiscale" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Username'" class="common-input mb-20 form-control" required="" type="text">
							</div>
						</div>	
						<div class="row">
							<div class="col-lg-3 form-group">
							<input name="NomeUtente" placeholder="Nome Utente" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Username'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group">
							<input name="Password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Password'" class="common-input mb-20 form-control" required="" type="password">
							</div>
							<div class="col-lg-3 form-group">
							<input name="Cognome" placeholder="Cognome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group">
							<input name="Nome" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
						</div>
						<div class="row">	
							<div class="col-lg-3 form-group">
							<input name="Indirizzo" placeholder="Indirizzo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
                            <div class="col-lg-3 form-group">
							<input name="Citta" placeholder="Citta" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>							
							<div class="col-lg-3 form-group">
						    <input name="Telefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group">
							<input name="Email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-12"></div>
							<div class="col-lg-4"></div>
							<div class="col-lg-4">
								      <div class="col-sm-offset-2 col-sm-10">
									  <input type="submit" name="log" class="common-input mb-20 form-control" >
                        </div>
						</div>
							</form>	
							
						</div>
					</div>
				</div>	<br><br><br>
			</section>
</html>
	<!-- End -->
<?php

	}
	else {	

//include 'connessione.php';
$password1 = $_POST[Password];   
$duplicati = $mysqli->query("SELECT * FROM utenti WHERE '$_POST[cod_fis]' = cod_fis");
if(mysqli_num_rows($duplicati) > 0)
{
	echo '<div class="container">
		<div class="alert alert-danger">
			<h5><center><strong>Utente già esistente.</strong></h5>
		</div>
	</div>';
}
else if(
       strlen($password1)>4      
/*da reinserire
 strlen($password1)>4 // minimo 8 caratteri
&& strlen($password1)<17 // massimo 17 caratteri
&& preg_match('`[A-Z]`',$password1) // minimo un carattere maiuscolo
&& preg_match('`[a-z]`',$password1) // minimo un carattere minuscolo
&& preg_match('`[0-9]`',$password1) // minimo un numero
*/){
 
// valido



$hash=md5($password1);



      $sql =$mysqli->query("INSERT INTO utenti (cod_fis,Username,Password,CognomeU,NomeU,ViaU,N_civico,CittaU,TelefonoU,EmailU) 
					VALUES ('$_POST[cod_fis]','$_POST[NomeUtente]','$hash','$_POST[Cognome]','$_POST[Nome]','$_POST[Indirizzo]','$_POST[Indirizzo]','$_POST[Citta]','$_POST[Telefono]','$_POST[Email]')");	
						
						
	if ($mysqli->query($sql)) {
			echo '	<div class="container">
						<div class="alert alert-danger ">
						   <h5>  <center><strong>inserimento non eseguito.</strong></h5>
						</div>
					</div>';
		}
		else {
		echo '<div class="container">
				  <div class="alert alert-success ">
						<h5>  <center><strong>inserimento eseguito.</strong></h5>
				  </div>
				</div><br>';		

		}
		
	}

	
	
	else{ 

 echo'<div class="container">
		<div class="alert alert-danger">
			<h5><center><strong>Rispettare i parametri.</strong></h5>
			<br><h5><center><strong>Minimo 8 caratteri e massimo 17  </strong></h5>
			<br><h5><center><strong>Contere un carattere maiuscolo,uno minuscolo e un numero </strong></h5>
		</div>
	</div>
	<form>
		<input type="button" value="Torna indietro" 
		onClick="history.go(-1);return true;" 
		name="button">
	</form>
	
	';
	
	//echo '<script language="JavaScript">
	//			javascript:window.history.go(-1),1000;
	//		</script>';
	
}

}
/*	}
else
{
echo '<div class="container">
		  <div class="alert alert-success ">
				<h5>  <center><strong>Utente non autorizzato</strong></h5>
				<h5>  <center><strong>Effettuare accesso</strong></h5>
		  </div>
		</div><br>';		
	echo"<script type='text/javascript'>";   
			echo "setTimeout(\"location.href='index.php?inizio=include/accedi.php';\", 3000);";     
		echo"</script>";

	
	
}
*/
?>