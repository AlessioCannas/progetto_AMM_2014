<!DOCTYPE html>
<?php
include('visualizza.php');


?>

<?php
	//$conn= mysql_connect("localhost","root","");   
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
			<input type="submit" name="Nintendo wiiU" value="Nintendo wiiU"/>
			<input type="submit" name="Accessori" value="Accessori"/>
			<input type="submit" name="Offerte" value="Offerte"/>	
			<input type="submit" name="Cerca" value="Cerca"/>
			<input type="submit" name="Negozi" value="Negozi"/>
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
                                                         
                                                         break;
                                                         $loggato = TRUE;

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
				
	
			</form>

			<a id="registrati" href="file:///C:/Users/alessio/Desktop/sito_amm/registrazione.html">Registrati</a>
		</div>
                
                
                
            <?php
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
                            registrati_stampa(FALSE,FALSE,FALSE,FALSE);
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
                                               
                                               /*
                                               echo "<script type="."text/javascript".">

                                                           
                                                                $('iframe').css('display','none');
                                                           
                                                                $('iframe').css('display','block');

                                                            </script>";
                                               */
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
                                                    registrati (NULL,$nome,$cognome,$dataNascita,$email,$password);
                                               else 
                                                   registrati_stampa();
                        }
                        
                        if ( isset($_POST['logout']) )
                        {
                            session_destroy();
                            header ("Location: index.php");
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
