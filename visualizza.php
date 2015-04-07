<?php

@require('http://spano.sc.unica.it/amm2014/cannasAlessio/connessione.php');


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

                                    $foto = "copertine".$riga[piattaforma]."/".$riga[foto];
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

?>
