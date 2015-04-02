<!DOCTYPE html>

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

	

		<style>
		
		


		body{ background:#000; margin:0px; }
			
			/* posizione logo */
			#logo {
					position:relative;
					left: 400px;
						
			      }


			/* posizione barra di navigazione */
			div#menubar1{ 
					padding: 24px; 
					border:#FFF 1px dashed; 
					background:#333; 
					border-radius: 10px 10px 10px 10px;
					border-color: #1C1C1C;
					border-style: solid; 

					margin-right: 300px;
				    }
	
			div#menubar1 > a {
    						font-family:Arial, Helvetica, sans-serif;
    						font-size:17px;
    						background: #333;
    						padding: 12px 24px;
    						color:#FFF;
    						margin-right: 10px;
    						text-decoration:none;
    						border-radius: 3px;
    						transition: background 0.3s linear 0s, color 0.3s linear 0s;
					}
		
			div#menubar1 > a:hover	{
    							background: #6F8A00;
    							color:#FFF;
						}


			/* posizione del login */
			div#menubar2{ 
					padding:20px 90px; 
					border:#999 1px dashed; 
					border-radius: 50px 50px 50px 50px;
					border-color: #228B22;
					border-style: solid; 

					margin-left: 1300px;
				    }
	
			div#menubar2 > a{
    						font-family:Arial, Helvetica, sans-serif;
    						font-size:17px;
    						background: #333;
    						padding: 12px 40px;
    						color:#999;
    						margin-right: 10px;
    						text-decoration:none;
    						border-radius: 3px;
    						transition: background 0.3s linear 0s, color 0.3s linear 0s;
					}
		
			div#menubar2 > a:hover	{
    							background: #6F8A00;
    							color:#FFF;
						}

			div#menubar2 {
						position:absolute;
						right: 10px;
						top: 320px;

						
    						background: #222;
						border-width: 100px;
    						
    						overflow: hidden;
 
    						-moz-border-radius: 20px;
    						-webkit-border-radius: 20px;
    						

						background: #1C1C1C; /* Colore di sfondo */
    						border: 1px solid #323232; /* Bordo */
    						color: #fff; /* Colore del testo */
   
						
				     }
			
			form#tb_login > input {
							width: 100px;

							position:relative;
							left: 130px;
							top: -30px;	
					      }
			
			#login {
					position:relative;
					
					top: 10px;

					width: 50px;
					height: 50px;
					      }
			

			/* posizione inserimento dati*/
			div#menubar4{ 
						position: relative;
						
						margin-left: 100px;
						margin-right: 100px;

						padding: 24px; 
 
						background: #222;
						border-width: 100px;
    						
    						overflow: hidden;
 
    						-moz-border-radius: 20px;
    						-webkit-border-radius: 20px;
    						

						background: #1C1C1C; /* Colore di sfondo */
    						
    						color: #fff; /* Colore del testo */
				    }
	
			div#menubar4 > a{
						position: relative;
						margin-top: 100px;
						margin-left: 550px;
						

    						font-family:Arial, Helvetica, sans-serif;
    						font-size:17px;
    						background: #333;
    						padding: 12px 24px;
    						color:#FFF;
    						margin-right: 10px;
    						text-decoration:none;
    						border-radius: 3px;
    						transition: background 0.3s linear 0s, color 0.3s linear 0s;
					}
		
			div#menubar4 > a:hover	{
    							background: #6F8A00;
    							color:#FFF;
						}

			h1 {
						position:relative;
						margin-bottom: 150px;

					  	text-indent:50px;
						
					  }

			
			h3 {
					position:relative;
					margin-left: 50px;
					margin-top: -150px;
			   }

			
			div#logo1 {
					position:relative;
					left: 100px;
						
			      	}
			
			iframe#id_trailer {
						position:relative;
						margin-left: 50px;

						display: none;
			      		  }
			
			h1 { color: #FFFFFF; }


			
    			
 			

		</style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>

	<body>
		<img id="logo" src="GameStop-Logo.jpg" alt="testo" />
		
		

		<div id="menubar1">
  			<a id="PC" href="#">		PC</a>
			<a id="Ps3 "href="#">		Ps3</a>
			<a id="Ps4" href="#">		Ps4</a>
			<a id="Xbox360" href="#">	Xbox360</a>
			<a id="XboxOne" href="#">	XboxOne</a>
			<a id="Nintendo wiiU" href="#">	Nintendo wiiU</a>
			<a id="Accessori" href="#">	Accessori</a>
			<a id="Offerte" href="#">	Offerte</a>	
			<a id="Cerca" href="#">		Cerca</a>
			<a id="Negozi" href="#">	Negozi</a>

		</div>

		


		<div id="menubar2">
	
  			<a class ="#" id="login">login</a>
			

			<form id="tb_login"action="demo_form.asp" method="get">

				<input type="text" name="corto" id="tb_nomeUtente" value="nome utente" />
				<br></br>
				<input type="password" name="pswd” "id="tb_pswd" value="oscurato" />

			</form>
			
			<a id="#" href="file:///C:/Users/alessio/Desktop/sito_amm/registrazione.html">Registrati</a>
		</div>

		<?php 
	
			$piattaforma = "'Ps3'";			

			/* ID */
			$id="menubar4";
			$id_prezzo ="id_prezzo";
			$id_trailer ="id_trailer";
			$id_vedi ="id_vedi";

			/* CONTENUTO */
			$titolo = "titolo gioco";
			$foto="GameStop-Logo.jpg";
			$prezzo ="prezzo";
			$descrizione = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
					aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
					aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

			/* PARAMETRI */
			$width= "200";
			$height = "250";

			$width1= "700";
			$height1 = "500";

			$border ="0";

			$Risultato= mysql_query ("SELECT * from giochi where piattaforma = ".$piattaforma." ", $conn );

			while($riga= mysql_fetch_array ($Risultato) )
			{
				$titolo = $riga[titolo]; 
				$prezzo = $riga[prezzo];
				$prezzo = (string)$prezzo;
				$foto = "copertinePs3/".$riga[foto];
				$trailer = $riga[trailer];
				
				echo "<div id=$id >
					
					<table border=$border >
    						<tr>
       							<td>
								<img id=$id src=$foto alt=$foto width=$width height=$height  />
							</td>
       							<td>	
								<table border=$border >
    									<tr>
       								
											<h1>$titolo</h1>
									</tr>	
       									<tr>		
											<h3>$descrizione</h2>
											<iframe id=$id_trailer width=$width1 height=$height1 src=$trailer frameborder=$border allowfullscreen></iframe>
   									

									</tr>
								</table>
							</td>
							<td>	
								<h1 id=$id_prezzo >$prezzo</h1>
							</td>
   						</tr>
					</table>
					
					<a id=$id_vedi>Vedi</a>
					
				      </div>";		
			}
					
		?>

		<script type="text/javascript">
    
				
			$(function(){
        			$('#id_vedi').click(function()
				{

          				if( $('iframe#id_trailer').css('display') == 'block' )
            					$('iframe#id_trailer').css('display','none');
         				 else
            					$('iframe#id_trailer').css('display','block');


          				return false;
        			});
   			});
  
		</script>
		

		<footer>
		</footer>

	</body>
</html>
