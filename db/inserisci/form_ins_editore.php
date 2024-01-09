<?php
if (isset($_SESSION['admin'] )) 
	{
	IF(!isset($_POST['log']))
		{
?>
<!-- Start contact-page Area --><br><br><br><br><br><br>
			<section class="contact-page-area section-gap">
				<div class="container"><br>
					<div class="row"><br><br>
						<div class="col-lg-12 ">
							<div class="title text-center">
								<h3 class="mb-10">Accesso Area Riservata<br>Inserimento Editore</h3>	
							<form class="form-area contact-form text-right"  action="" method="post">
								<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-12">


							</div>
						</div>
					</div>				
						<div class="row">
						<div class="col-lg-3 form-group"></div>
							<div class="col-lg-3 form-group">
								<input name="nome" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Username'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group">
								<input name="indirizzo" placeholder="Data di Nascita" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Password'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group"></div>
						</div>
						<div class="row">	
							<div class="col-lg-3 form-group"></div>
							<div class="col-lg-3 form-group">
								<input name="telefono" placeholder="Luogo di nascita" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Cognome'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-3 form-group">
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

	<!-- End contact-page Area 
<?php

	}
	else {
		$sql =$mysqli->query("INSERT INTO editori (ideditore,NomeE,Indirizzoemail,TelefonoE)
				VALUES
				(null,'$_POST[nome]','$_POST[indirizzo]','$_POST[telefono]')");	
		if ($sql) {
			echo '	<div class="container">
						<div class="alert alert-danger ">
						   <h5>  <center><strong>inserimento NON eseguito.</strong></h5>
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
	}
else {
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
?>
