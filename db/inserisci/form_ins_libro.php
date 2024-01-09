<?php
   if (isset($_SESSION['admin'] )) 
	    {
		
  if(!isset($_POST['log']))
		{
?>
<!-- Start contact-page Area --><br><br><br>
           <section class="contact-page-area section-gap">
				<div class="container"><br>
					<div class="row"><br><br>
						<div class="col-lg-12 ">
							<form class="form-area contact-form text-right"  action="" method="post" enctype="multipart/form-data">
								<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-12">
							<div class="title text-center">
								<h3 class="mb-10">Accesso Area Riservata<br>Inserimento Libri</h3>	
							</div>
						</div>
					</div>				
						<div class="row">
						
							<div class="col-lg-3 form-group">
								<input name="isbn" placeholder="isbn" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Isbn'" class="common-input mb-20 form-control" required="" type="text">
							</div>

							<div class="col-lg-3 form-group">
								<input name="titolo" placeholder="Titolo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserisci Titolo'" class="common-input mb-20 form-control" required="" type="text">
							</div>

                            <div class="col-lg-3 form-group">
								<input name="lingua" placeholder="Lingua" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lingua'" class="common-input mb-20 form-control" required="" type="text">
							</div>
                            
                            <div class="col-lg-3 form-group">
								<input name="data_pub" placeholder="Data pubblicazione" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data di pubblicazione'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							
						</div>
						<div class="row">
						

							<div class="col-lg-3 form-group">
<select placeholder="  Sezione" name = "sezione" class="common-input mb-20 form-control" >
													  <optgroup label="Seleziona la sezione">
														  <option value="Biotecnologia">Biotecnolgia</option>
														  <option value="Informatica">Informatica</option>
														  <option value="Telecomunicazione">Telecomunicazione</option>
														  <option value="Elettrotecnica">Elettrotecnica</option>
													  	  <option value="Grafica">Grafica</option>
														  <option value="Automazione">Automazione</option>

													  </optgroup>

												</select>							</div>

                            <div class="col-lg-3 form-group">
								<input name="num_scaffale" placeholder="Num_scaffale" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numero scaffale'" class="common-input mb-20 form-control" required="" type="text">
							</div>

                            <div class="col-lg-3 form-group">
								<input name="num_armadio" placeholder="Num_armadio" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numero armadio'" class="common-input mb-20 form-control" required="" type="text">
							</div>
                            
                            <div class="col-lg-3 form-group">
								<input name="quant" placeholder="Quantita" onfocus="this.placeholder = ''" onblur="this.placeholder = 'quantità'" class="common-input mb-20 form-control" required="" type="text">
							</div>
							
						</div>
                         
						<div class="row">	
							<div class="col-lg-3 form-group">
<input name="prezzo" placeholder="Prezzo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prezzo'" class="common-input mb-20 form-control" required="" type="text">
							
							</div>
							
                            <div class="col-lg-3 form-group">
                                 
							     <select name="idautore">
                                 <option value="">Seleziona Autore</option>
							

                        <!-- script php per la select degli autori -->
                        
                        <?php
                        
                               // query per vis gli autori 
                               $sql = "SELECT idautore, NomeA, DatanascitaA FROM autori";
                               // esecuzione query 
                               $result = $mysqli->query($sql);
                               // ciclo di visualizzazzione dei record all interno degli option value 
                               while($riga = mysqli_fetch_assoc($result))
                                 {

                                    echo "<option value='$riga[idautore]'> $riga[idautore] -- $riga[NomeA] -- $riga[DatanascitaA] </option>" ;

                                 }

                            echo "</select>" ;
                          ?>  
                        </div>
                              
                            <div class="col-lg-3 form-group">
							     <select name="ideditore">
                                 <option value="">Seleziona editore</option>
							
                            <!-- script php per la select degli editori -->
   
                            <?php

                               // query per vis gli editori 
                               $sql = "SELECT ideditore, NomeE, TelefonoE FROM editori";
                               // esecuzione query 
                               $result = $mysqli->query($sql);
                               // ciclo di visualizzazzione dei record all interno degli option value 
                               while($riga = mysqli_fetch_assoc($result))
                               {

                                  echo "<option value='$riga[ideditore]'> $riga[ideditore] -- $riga[NomeE] -- $riga[TelefonoE] </option>" ;

                               }

                          echo "</select>" ;
                             ?>  
                         </div>

                         <div class="col-lg-3 form-group">

                         <input type="file" name="my_image">

                         </div>

                            <div class="col-lg-3 form-group"></div>
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

            	
      $controllo = $mysqli->query("SELECT * FROM libri WHERE isbn = '$_POST[isbn]'") ;
	  
	  if($risultato = mysqli_num_rows($controllo) > 0)
		   {
			echo '<div class="container">
			<div class="alert alert-danger ">
			 <h5>  <center><strong>Libro già esistente.</strong></h5>
			</div>
		    </div>';
		   }
		else
		 {

           $sql = $mysqli->query("INSERT INTO libri (isbn,Titolo,ideditore,Lingua,Data_pub,Sezione,Quantita,prezzo)
						          VALUES ('$_POST[isbn]','$_POST[titolo]','$_POST[ideditore]',
                                          '$_POST[lingua]','$_POST[data_pub]','$_POST[sezione]',
                                          '$_POST[quant]','$_POST[prezzo]')");	
                        
                
		    if ($mysqli->query($sql))
		         {
			      echo '<div class="container">
						  <div class="alert alert-danger ">
						   <h5>  <center><strong>inserimento non eseguito.</strong></h5>
						  </div>
					    </div>';
		        }
			   else
			    {
		         echo '<div class="container">
				       <div class="alert alert-success ">
					   <h5>  <center><strong>inserimento eseguito.</strong></h5>
				       </div>
                      </div><br>';
                      
                             $pippo = $mysqli->query("INSERT INTO scritto (isbn,idautore)
                                                      VALUES ('$_POST[isbn]','$_POST[idautore]')");  
                                                      
                                         // upload immagine 
							 
										 
										 
										 
										 
										 
                                       echo "<pre>";
                                       print_r($_FILES['my_image']);
                                       echo "</pre>";
  
                                  $img_name = $_FILES['my_image']['name'];
                                  $img_size = $_FILES['my_image']['size'];
                                  $tmp_name = $_FILES['my_image']['tmp_name'];
                                  $error = $_FILES['my_image']['error'];
  
                if ($error === 0)
                 {
                    if ($img_size > 10000000)
                     {
                        $em = "file troppo grande.";
                        header("Location: index.php?error=$em");
                    }
                    else
                     {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);/*La funzione pathinfo restituisce alcune informazioni sul percorso 
						di file specificato in argomento. Le informazioni raccolte vengono restituite sotto forma di array composta da tre elementi:

								dirname
								basename
								extension
						echo $img_ex['dirname'] . "<br/>";
						echo $img_ex['basename'] . "<br/>";
						echo $img_ex['extension'] . "<br/>";
						La funzione in oggetto ammette anche un secondo parametro opzionale options che può essere valorizzato con:
								PATHINFO_DIRNAME
								PATHINFO_BASENAME
								PATHINFO_EXTENSION
								in tal caso verrà restituita solo l'informazione specificatamente richiesta.
						*/
                        $img_ex_lc = strtolower($img_ex);//restituire in minuscolo la stringa passata
  
                        $allowed_exs = array("jpg", "jpeg", "png"); 
  
                   if (in_array($img_ex_lc, $allowed_exs))//se l'immagine ha la giusta estensione
                        {
                          $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;//uniqid() funzione genera un ID univoco basato sul microtime (ora corrente in microsecondi).
                           $img_upload_path = 'libri/'.$new_img_name;
                          move_uploaded_file($tmp_name, $img_upload_path);//Il move_uploaded_file() funzione sposta un file caricato in una nuova posizione.

                             // Inserimento nel Database
                             $imgqry = $mysqli->query("INSERT INTO immagini (id_img,img_url,isbn) 
                             VALUES(null,'$new_img_name','$_POST[isbn]')");
                             echo $img_upload_path;
                             
                             if ($mysqli->query($imgqry))
                             {
                             echo '<div class="container">
                             <div class="alert alert-danger ">
                             <h5>  <center><strong>immagine non caricata.</strong></h5>
                             </div>
                             </div>';
                             }
                             
                         }
                        else
                         {
                           $er = "non puoi caricare file di questo tipo";
                            header("Location: index.php?error=$er");
                         }
                        }
                          }
                              else 
                                {
                                $er = "errore sconosciuto";
                                header("Location: index.php?error=$er");
                                }
                            // fine upload      
              
             }
            }
         }
   
      }
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

                  
              
		
?>