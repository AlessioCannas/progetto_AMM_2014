<!DOCTYPE html>
<?php
include('visualizza.php');
include('carrello.php');


?>

<?php
	   
        $conn= mysql_connect("localhost","cannasAlessio","volpe795");
	if(!$conn)
	{
		die("connessione FALLITA".mysql_error());
	}
	

	//$db= mysql_select_db("amm_alessio",$conn); 
        $db= mysql_select_db("amm14_cannasAlessio",$conn);
	if(!$conn)
	{
		die("connessione FALLITA ad amm_alessio".mysql_error());
	}
?>

<html>
	<head>
            <link   rel="stylesheet"    type="text/css" href="sito_css.css" media="screen">
                
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>

	<body>
		<img id="logo" src="http://www.leviathyn.com/wp-content/uploads/2012/09/GameStop-Logo.jpg" alt="testo" />
		
		<?php
                    session_start(); 
                ?>

		<div id="menubar1">
                    <form id="menu1" action="index.php" method="post">
                        <input  type="submit" name="PC" value="PC"/>
                        <input type="submit" name="Ps3" value="Ps3"/>
                        <input type="submit" name="Ps4" value="Ps4"/>
                        <input type="submit" name="Xbox360" value="Xbox360"/>
			<input type="submit" name="XboxOne" value="XboxOne"/>
			<input type="submit" name="Nintendo" value="Nintendo"/>
			
			
			<input type="submit" name="Cerca" value="Cerca"/>
			<input type="submit" name="Progetto" value="Progetto"/>
			<input type="submit" name="Carrello" value="Carrello"/>
			<input type="submit" name="Area" value="Area Personale"/>
                    </form>
		</div>

		
                

		<div id="menubar2">
			
                       <?php
                        
                       
                       
                                         if( !isset( $_SESSION['id']) )
                                         {
                                             $nome = ",esegui il login";
                                         }   
                                         else 
                                         {
                                             $nome = $_SESSION['nome'];
                                         }
                                         
                                         echo "<h4>Benvenuto ".$nome."! </h4>";
                                         
                       
                                       
                       
                                        if( isset($_POST['login']))
                                         {
                                             
                                                     
                                             $nome = $_POST['user'];
                                             $pass = $_POST['password'];
                                                
                                             $nome_d = "utente";
                                             $pass_d = "password";
                                             
                                             if( $nome=="Admin" && $pass=="volpe" )
                                             {
                                                 if ( !isset( $_SESSION['id']) )
                                                                $_SESSION['id'] = 0;
                                                         if ( !isset( $_SESSION['logged']) )
                                                                $_SESSION['logged'] = TRUE;
                                                         if ( !isset( $_SESSION['nome']) )
                                                                $_SESSION['nome'] = "Amministratore";
                                                         if ( !isset( $_SESSION['carrello']) )
                                                                $_SESSION['carrello'] = array();
                                                         if ( !isset( $_SESSION['admin']) )
                                                                $_SESSION['admin'] = TRUE;
                                                         
                                                         $loggato = TRUE;
                                             }
                                             else
                                             {
                                                 $Risultato= mysql_query ("SELECT * from utenti ", $conn );
                                                
                                               while($riga= mysql_fetch_array ($Risultato) )
                                               {
                                                   $utente_id = $riga['id'];
                                                   $nome_d = $riga['nome'];
                                                   $pass_d = $riga['password'];
                                                   
                                                    if( $nome==$nome_d && $pass==$pass_d )
                                                    {
                                                         if ( !isset( $_SESSION['id']) )
                                                                $_SESSION['id'] = $utente_id;
                                                         if ( !isset( $_SESSION['logged']) )
                                                                $_SESSION['logged'] = TRUE;
                                                         if ( !isset( $_SESSION['nome']) )
                                                                $_SESSION['nome'] = $nome;
                                                         if ( !isset( $_SESSION['carrello']) )
                                                                $_SESSION['carrello'] = array();
                                                         if ( !isset( $_SESSION['admin']) )
                                                                $_SESSION['admin'] = FALSE;
                                                         
                                                         break;
                                                         $loggato = TRUE;
                                                    }
                                               }
                                               
                                             }
                                             
                                             
                                               header ("Location: index.php");
                                         }
                                         
                                       
                                ?>	

                    <form id="tb_login" action="index.php" method="post">
                                
                            <table>
                                <tr>
                                    <td>
                                        <input type="submit" name="login" id="login" value="login"<input>
                                        <input type="submit" name="logout" id="logout" value="logout"<input>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="user" id="user" value="user" />
                                        <br></br>
                                        <input type="password" name="password" id="password" value="password" />
                                    </td>
                                </tr>
                            </table>
				
				<input type="submit" name="registrati" id="registrati" value="Registrati"<input>
			</form>

			
		</div>
                
                
                
            <?php
            		if ( isset($_POST['PC']) )
                        {
                            vedi("'PC'");
                            
                        }
                        
                        if ( isset($_POST['Ps3']) )
                        {
                            vedi("'Ps3'");
                            
                        }
                        
                        
                        if ( isset($_POST['Xbox360']) )
                        {
                            vedi("'Xbox360'");
                            
                        }
                        
                        if ( isset($_POST['XboxOne']) )
                        {
                            vedi("'XboxOne'");
                            
                        }
                        
                        if ( isset($_POST['Ps4']) )
                        {
                            vedi("'Ps4'");
                            
                        }
                        
                        if ( isset($_POST['Nintendo']) )
                        {
                            vedi("'Nintendo'");
                            
                        }
                        
                        if ( isset($_POST['Cerca']) )
                        {
                            cerca();
                            
                        }
                        
                        if ( isset($_POST['Invia']) )
                        {
                            cerca();
                            
                            $titolo = $_POST['titolo'];
                            $piattaf = $_POST['piattaforma'];
                                                
                            if( $piattaf=='empty' )
                                $piattaf =" " ;
                            else 
                                $piattaforma = " and piattaforma = '".$piattaf."'";
                                                                  
				$titolo = "'".$titolo."%' ";
                                
                                vedi_cerca($titolo,$piattaforma);
                        }
                        
                        //REGISTRAZIONE
                        if ( isset($_POST['registrati']) )
                        {
                            registrati_stampa();
                        }
                        
                        if ( isset($_POST['conferma']) )
                        {
                            $insert = FALSE;
                            
                                               $id = "NULL";
                                               $nome = $_POST['nome_register'];
                                               $cognome = $_POST['cogn_register'];
                                               $dataNascita = "".$_POST['anno']."-".$_POST['mese']."-".$_POST['giorno']."";
                                               $email = $_POST['email_register'];
                                               $password = $_POST['pass_register'];
                                               
                                         
                                               
                                               if( empty($nome) || empty($cognome) )
                                               {
                                                   $nome_error = TRUE;
                                               }
                                               else 
                                               {
                                                   $nome_error = FALSE;
                                               }
                                               
                                             
                                               if( $_POST['anno']=="empty" || $_POST['mese']=="empty" || $_POST['giorno']=="empty" )
                                               {  
                                                   $data_error = TRUE;
                                               }
                                               else 
                                               { 
                                                   $data_error = FALSE;
                                               }
                                               
                                               if( empty($email)  )
                                               {  
                                                   $email_error = TRUE;
                                               }
                                               else 
                                               { 
                                                   $email_error = FALSE;
                                               }
                                               
                                               if( empty($password)  )
                                               {  
                                                   $password_error = TRUE;
                                               }
                                               else 
                                               { 
                                                   $password_error = FALSE;
                                               }
                                               
                                               if( empty($nome) || empty($cognome) ||
                                                   $_POST['anno']=="empty" || $_POST['mese']=="empty" || $_POST['giorno']=="empty" ||
                                                   empty($email) || empty($password)  )
                                               {  
                                                   $insert = FALSE;
                                               }
                                               else 
                                               { 
                                                   $insert = TRUE;
                                               }
                                               
                                               if($insert)
                                               {
                                               	    registrati (NULL,$nome,$cognome,$dataNascita,$email,$password);
                                               	    echo "<script type="."text/javascript".">
                                               	    		alert('ti sei registrato correttamente');	
                                               	    	  </script>";
                                               }
                                               else 
                                               {
                                               	    echo "<script type="."text/javascript".">
                                               	    		alert('non hai inserito tutti i dati');	
                                               	    	  </script>";
                                               	    registrati_stampa();
                                               }
                                                   
                        }
                        
                        if ( isset($_POST['Progetto']) )
                        {
                       	    echo "
                            	  <h1>Progetto AMM 2014 Cannas Alessio 48188</h1> </br>
                            	  
                                  <h1>Funzioni implementate:</h1> 
                            	
                            	<div id='menubar4' >	
                            	  <h1>-Dati di accesso</h1>
                            	  	<h4>-Implementazione di 2 ruoli: User/Admin</h4> 
                            		<h4>-User: marco Password:pass1</h4> 
                            		<h4>-Amministratore: Admin Password:volpe</h4> 
                            	</div >
                            	
                            	<div id='menubar4' >	
                            	  <h1>-Uso di html</h1> 
                            		<h4>-Sistema menuBar per la ricerca dei prodotti per categoria</h4> 
                            		<h4>-Sistema visualizzazione Login</h4> </br>
                            	</div >
                            	
                            	<div id='menubar4' >
	                          <h1>-Uso di Php/MySQL</h1> 
	                            	<h4>-Sistema Login, Basato sull'uso delle sessioni tramite Php e recupero degli utenti da database tramite Php/mySQL</h4> 
	                            	<h4>-Sistema di registrazione, recupero dell'input utente tramite Php e salvataggio su database con MySQL</h4> 
	    				<h4>-Sistema di acquisto online basato sull'uso delle sessioni Php ed MySql (la trasazione è fasulla)</h4> 
	    				<h4>-Sistema di visualizzazione dei giochi per categoria, recuperati da database</h4> 
	    				<h4>-Sistema di visualizzazione degli ordini per utente (nel caso loggati come user), recuperati da database</h4>
	    				<h4>-Sistema di ricerca e di visualizzazione in base al nome e alla categoria</h4> 
    				</div >
    				
    				<div id='menubar4' >
                           	  <h1>-Uso di jQuery (anche se in minima parte)</h1>
                           		<h4>-Sistema di comparsa e scomparsa dei trailer dei giochi sul tasto 'vedi'</h4> 
                           	</div >
                           	
                           	
                           	
                           	</div >";
                            
                        }
                        
                        if ( isset($_POST['Carrello']) )
                        {
                        	
                            		stampa($_SESSION['carrello']);
                            
                            	
                        }
                        
                        if ( isset($_POST['paga']) )
                        {
                            $soldi = $_POST['importo'];
                            pagamento ($_SESSION['carrello'],$soldi);
                        }
                        
                        if ( isset($_POST['Area']) )
                        {
                        	
                            		stampa_ordine ();
                            	
                        }
                        
                        if ( isset($_POST['logout']) )
                        {
                            session_destroy();
                            header ("Location: index.php");
                        }
                              
             
                ?>
                
                <?php
                     
                    
                    $cmd = $_GET['cmd'];
                    $id = $_GET['id'];
                    $prez = $_GET['prez'];
                    
                    if(!isset($cmd) || !isset($id))
                    {
                        $cmd = 'no-op';
                    }
                    
                    if (isset($cmd))
                    {
                            switch ($cmd)
                            {
                                case 'a':
                                if (isset($id)) 
                                {
                                   $id_corretto = str_replace('-', ' ', $id);
                                  
                                   aggiungi ( $id_corretto, $prez, 1 ); 
                                }
                                    break;
                                                
                                case 'i':
                                    incrementa($id);
                                    break;
                                
                                case 'd':
                                    decrementa($id);
                                    break;
                                
                                case 'e':
                                    elimina($id);
                                    break;
                                case 's':
                                    svuota($_SESSION['carrello']);
                                    break;
                                case 'sped':
                                    stato_ordine($id,'In spedizione');
                                    break;
                                case 'cons':
                                    stato_ordine($id,'In consegna');
                                    break;
                                case 'comp':
                                    stato_ordine($id,'Ordine COMPLETATO');
                                    break;
                                
                                case 'no-op':
                                    // nessuna operazione
                                    break;
                            }
                    }
                    
                ?>
                
                <script type="text/javascript">
    
				
			$(function(){
        			$('#id_vedi').click(function()
				{

          				if( $('iframe').css('display') == 'block' )
            					$('iframe').css('display','none');
         				 else
            					$('iframe').css('display','block');


          				return false;
        			});
   			});
  
		</script>

	</body>
</html>
