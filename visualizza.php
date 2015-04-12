<?php

include('connetti.php');


function vedi ($piattaforma)
{
        
        $conn = connetti();
        
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

                                    $foto = $riga[foto];
                                    $trailer = $riga[trailer];

                                    echo "<div id=$id >

                                            <table border=$border >
                                                    <tr>
                                                            <td>
                                                                    <img id=$id src=".$foto." alt=$foto width=$width height=$height  />
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
                        
}

function vedi_cerca ($titolo,$piattaforma)
{
			$conn = connetti();		

			/* ID */
			$id="menubar4";
			$id_prezzo ="id_prezzo";
			$id_trailer ="id_trailer";
			$id_vedi ="id_vedi";

			/* CONTENUTO */
			
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
                        
                        
                            $Risultato= mysql_query ("SELECT * from giochi WHERE titolo LIKE ".$titolo." ".$piattaforma." ", $conn );
                        
			while($riga= mysql_fetch_array ($Risultato) )
			{
				$titolo = $riga[titolo]; 
				$prezzo = $riga[prezzo];
				$prezzo = (string)$prezzo;
				$foto = "copertine".$riga[piattaforma]."/".$riga[foto]."";
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
                                                
                                              
					
}

function cerca()
{
    $id = "menubar5";
    $method = "post";
    $action = "index.php";
    $label_nome = "nome";
    $titolo = "titolo";
    $type_text = "text";
    

    echo "	<div id=$id>
			<h3>Filtro</h3>
                        <form method=$method action=$action>

				<label for=$label_nome>Nome</label>
                                <input name=$titolo  type=$type_text/>


				<label for="."piattaforma".">Piattaforma</label>
				
					<select name="."piattaforma".">
                                                <option value="."empty".">   </option>
						<option value="."pc".">pc</option>
						<option value="."ps3".">ps3</option>
						<option value="."ps4".">ps4</option>
						<option value="."xbox360".">xbox360</option>
						<option value="."xboxOne".">xboxOne</option>
						<option value="."NintendoWiiU".">NintendoWiiU</option>
						<option value="."Accessori".">Accessori</option>
						
					</select>
				
					
                                        <input id=$id  type="."submit"." name="."Invia"." /> 
                     
			</form>
				
		</div>";
}

function registrati_stampa($nome,$data_nascita,$email,$password)
{
    echo "<div>
			<div id="."menubar6".">
			<h3>Filtro</h3>
                        <form method="."post"." id="."registrazione_f"." action="."index.php".">

				<label for="."nome".">Nome</label>
				<input name="."nome_register"." id="."nome_r"." type="."text"."/>

				<label for="."cognome".">Cognome</label>
				<input name="."cogn_register"." id="."cogn_r"." type="."text"."/>";
          if($nome)
              echo "<label for="."cognome"." id="."nome_mancante"." class="."errore"." > Nome o Cognome mancanti</label>";                  
                                
    echo "                           
    			<br><br/>
				<label for="."dataNascita".">Data di nascita</label>
				
					<select name="."giorno".">
                                                <option value="."empty"."> </option>
						<option value="."1".">1</option>
						<option value="."2".">2</option>
						<option value="."3".">3</option>
						<option value="."4".">4</option>
						<option value="."5".">5</option>
						<option value="."6".">6</option>
						<option value="."7".">7</option>
						<option value="."8".">8</option>
						<option value="."9".">9</option>
						<option value="."10".">10</option>
						<option value="."11".">11</option>
						<option value="."12".">12</option>
						<option value="."13".">13</option>
						<option value="."14".">14</option>
						<option value="."15".">15</option>
						<option value="."16".">16</option>
						<option value="."17".">17</option>
						<option value="."18".">18</option>
						<option value="."19".">19</option>
						<option value="."20".">20</option>
						<option value="."21".">21</option>
						<option value="."22".">22</option>
						<option value="."23".">23</option>
						<option value="."24".">24</option>
						<option value="."25".">25</option>
						<option value="."26".">26</option>
						<option value="."27".">27</option>
						<option value="."28".">28</option>
						<option value="."29".">29</option>
						<option value="."30".">30</option>
						<option value="."31".">31</option>
					</select>
				
					<select name="."mese".">
                                                <option value="."empty"."> </option>
						<option value="."01".">gennaio</option>
						<option value="."02".">febbraio</option>
						<option value="."03".">marzo</option>
						<option value="."04".">aprile</option>
						<option value="."05".">maggio</option>
						<option value="."06".">giugno</option>
						<option value="."07".">luglio</option>
						<option value="."08".">agosto</option>
						<option value="."09".">settembre</option>
						<option value="."10".">ottobre</option>
						<option value="."11".">novembre</option>
						<option value="."12".">dicembre</option>
					</select>
				
					<select name="."anno".">
                                                <option value="."empty"."> </option>
						<option value="."1990".">1990</option>
						<option value="."1991".">1991</option>
						<option value="."1992".">1992</option>
						<option value="."1993".">1993</option>
						<option value="."1994".">1994</option>
						<option value="."1995".">1995</option>
						<option value="."1996".">1996</option>
						<option value="."1997".">1997</option>
						<option value="."1998".">1998</option>
						<option value="."1999".">1999</option>
						<option value="."2000".">2000</option>
						<option value="."2001".">2001</option>
					</select>";
				
     if($data)                                   
        echo "<label for="."cognome"." id="."data_mancante"." class="."errore"." > Data di nascita mancante </label>";


				
				echo "
				<br><br/>
				<label for="."email".">Indirizzo e-mail</label>
				<input name="."email_register"." id="."email"." type="."text"."/>";

                                 if($email)
                                    echo "<label for="."cognome"." id="."email_error"." class="."errore"." > email non valida </label>";
                                
                                    echo "<br><br/>
				<label for="."pass"."> Password </label>
				<input name="."pass_register"." id="."pswd"." type="."text"."/>";
				
 
                                if($password)
                                    echo "<label for="."cognome"." id="."pass_error"." class="."errore"." > Password non valida </label>";
                                
                                    echo "<br><br/>
				password (La password deve avere almeno 8 caratteri di cui almeno: un numero (da 0 a 9) , una lettera minuscola ed una lettera maiuscola. )

				<br><br/>
				
				<input id="."menubar4"."  name="."conferma"." type="."submit"." value="."Conferma".">

				<div id="."menubar4".">";
				
}

function registrati($id,$nome,$cognome,$dataNascita,$email,$password)
{
    $conn = connetti();
    
    $query_insert = "INSERT INTO `utenti`(`id`, `nome`, `cognome`, `dataNascita`, `email`, `password`) ". "VALUES ('".$id."','".$nome."','".$cognome."','".$dataNascita."','".$email."','".$password."')";
                                               
    $risultato = mysql_query($query_insert, $conn );
                                               
}

function aggiungi ( $titolo, $prezzo, $quantita )
{
    $prova =  array('titolo'=>$titolo,'prezzo'=>$prezzo,'quantita'=>$quantita);
    
    if(!isset($_SESSION['carrello']))
        echo "<h1>non ti sei loggato</h1>";
    else {
        $_SESSION['carrello'][] = $prova;
        //echo "<h1>ho fatto le opererazioni richieste</h1>";
    }
    
    

}

function calcola_totale (array $a)
{
    $totale = 0;
    
    for($i=0;$i<count($a);$i++)
    {
        $totale += $a[$i]['prezzo'];  
    }
    
    echo $totale;
}

function stampa (array $a)
{
    if(count($a)==0)
    {
        echo "<h1>il carrello è vuoto</h1>";
    }
    else
    {
       for($i=0;$i<count($a);$i++)
        {
            $b = $a[$i]['titolo'];
            echo "<h1>$b</h1>";
            echo "<br></br>";
        } 
    }
    
}

function ordina ()
{
    $conn= mysqli_connect("localhost","root","","amm_alessio");  
    
    if(!isset($_SESSION['carrello']))
        echo 'non ti sei loggato';
    else 
    {
            for($i=0;$i<count($_SESSION['carrello']);$i++)
            {
                $titolo = $_SESSION['carrello'][$i]['titolo'];
                $dispon = $_SESSION['carrello'][$i]['quantita'];
                        
                $sql = "UPDATE giochi SET dispon = dispon - $dispon WHERE titolo = '$titolo' ";

                if (mysqli_query($conn, $sql)) 
                {
                    echo "<br></br>";
                    echo "Record updated successfully";
                    
                } 
                else 
                {
                    echo "Error  ";
                }
            }       
    }
                        
    
}

?>
