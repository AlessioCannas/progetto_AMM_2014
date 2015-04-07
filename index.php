<!DOCTYPE html>
<?php
require('http://spano.sc.unica.it/amm2014/cannasAlessio/visualizza.php');


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
                        
                        if ( isset($_POST['Cerca']) )
                        {
                            stampa_cerca();
                            
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
