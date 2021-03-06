<?php

function aggiungi ( $titolo, $prezzo, $quantita )
{
    $prova =  array('titolo'=>$titolo,'prezzo'=>$prezzo,'quantita'=>$quantita);
    
    if(!isset($_SESSION['carrello']))
        echo "<h1>non ti sei loggato</h1>";
    else 
    {
        $_SESSION['carrello'][] = $prova;

        echo "<h1>aggiunto al carrello</h1>";
    } 

}

function elimina ($pos)
{
    unset($_SESSION['carrello'][$pos]);
    stampa($_SESSION['carrello']);
}

function incrementa ($pos)
{
    $_SESSION['carrello'][$pos]['quantita'] ++;
    
    stampa($_SESSION['carrello'] );
}

function decrementa ($pos)
{
    if( $_SESSION['carrello'][$pos]['quantita'] > 0 )
        $_SESSION['carrello'][$pos]['quantita'] --;
    
    stampa($_SESSION['carrello'] );
}

function calcola_totale (array $a,$mod)
{
    $totale = 0;
    
    for($i=0;$i<count($a);$i++)
    {
        $totale += ($a[$i]['prezzo'] * $a[$i]['quantita']);  
    }
    
    if( $mod )
        echo "<div id='menubar4' >"
             ."<table>"
                ."<tr>"
                    ."<h4> spesa complessiva $totale $ + spese di spedizione </h4>"
                ."</tr>"
                ."<tr>"
                    ."<td>"
                        ."<h4>Inserisci il denaro</h4>"
                    ."</td>"
                    ."<td>"
                    ."<a id='svuota' href='index.php?cmd=s&id=0'>Svuota Carrello</a>"
                    ."</td>"
                ."</tr>"
                ."<tr>"
                    ."<td>"
                        ."<form id='soldi' action='index.php' method='post'>

                        <label for='Importo'>Importo in $ </label>
                        <input type='text' name='importo' value='importo'><br>

                        <input type='submit' name='paga' id='paga' value='paga'<input>
                        </form>"
                    ."</td>"
                    ."<td>"
                       
                    ."</td>"
                ."</tr>"
             ."</table>"
             ."</div>";
    
    return $totale;
}

/*
 * <input type="submit" name="Paga" id="paga" value="Termina e Paga"<input>
    ."<a id='paga' href='index.php?cmd=p&id=0'>termina e paga</a>"
 */
function stampa (array $a)
{
    if(count($a)==0)
    {
        echo "<h1>carrello vuoto</h1>";
    }
    else
    {
       for($i=0;$i<count($a);$i++)
        {
            $t = $a[$i]['titolo'];
            $p = $a[$i]['prezzo'];
            $q = $a[$i]['quantita'];
            
            $t = str_replace('-', ' ', $t);
           
            
            echo "<div id='menubar4' >"
                    . "<h4>$t </h4> "
                    . "<a class='infoCarrello' href='index.php?cmd=i&id=$i' >+</a> "
                    . "<h4>prezzo: $p $ </h4> "
                    . "<a class='infoCarrello' href='index.php?cmd=d&id=$i' >-</a>"
                    . "<h4>numero pezzi: $q</h4> "
                    . "<a class='infoCarrello' href='index.php?cmd=e&id=$i' >Elimina</a>"
                    . "</div>";
            
            
        } 
        
        calcola_totale($a,TRUE);
    }
    
    
}

function stampa_ordine ()
{
    $conn = connetti();
    //$conn = mysqli_connect("localhost","root","","amm_alessio");
    
    
        $admin = $_SESSION['admin'];
        
        if( $admin )
            $query = "SELECT * FROM ordini ";
        else 
            $query = "SELECT * FROM ordini WHERE id_utente = ".$_SESSION['id']." ";
        
    
    
    $risultato = mysql_query($query, $conn );
    
    while( $riga = mysql_fetch_array($risultato) )
    {
        $n_ordine = $riga['id_ordine'];
        $imp = $riga['importo_ordine'];
        $s_ordine = $riga['stato_ordine'];
        $d_ordine = $riga['data_ordine'];
        
        echo "<div id='menubar4' >";
        echo "<table>"
        . "<td>"
                . "<h4>numero ordine: $n_ordine </h4>"
                . "<h4>importo: $imp $</h4>"
                . "<h4>data: $d_ordine</h4>"
                . "<h4>  stato attuale: $s_ordine </h4>"
        . "</td>";
           
        $query = "SELECT * FROM ordine_prodotto WHERE num_ordine = ".$n_ordine." ";
    
        $risultato_1 = mysql_query($query, $conn );
        
        echo "<td>"
                . "</br></br></br></br></br></br></br></br></br></br><h3 class="."prodottoOrdine".">Elenco prodotti:</h3>";
        while( $riga1 = mysql_fetch_array($risultato_1) )
        {
            $tit = $riga1['nome_prodotto'];
            $quant = $riga1['quantita'];
            
            echo "<h4 class="."prodottoOrdine".">-$tit x$quant</h4>";
        }
        
        if( $_SESSION['admin'] )
        {
            echo "</td>"
            . "<td>"
                    . "<a class='gestioneOrdine' href='index.php?cmd=sped&id=$n_ordine&prez=0'>Spedisci</a></br></br></br>"
                    . "<a class='gestioneOrdine' href='index.php?cmd=cons&id=$n_ordine&prez=0'>In consegna</a></br></br></br>"
                    . "<a class='gestioneOrdine' href='index.php?cmd=comp&id=$n_ordine&prez=0'>COMPLETATO</a>";     
            
        }
        
        echo "</td>"
        . "</table>"
        . "</div>";
        
    }
}

function ordina ()
{
    
    $conn= mysqli_connect("localhost","cannasAlessio","volpe795","amm14_cannasAlessio");  
    
    if(!isset($_SESSION['carrello']))
        echo 'non ti sei loggato';
    else 
    {
            for($i=0;$i<count($_SESSION['carrello']);$i++)
            {
                $titolo = "'".$_SESSION['carrello'][$i]['titolo']."'";
                $dispon = $_SESSION['carrello'][$i]['quantita'];
                
                $titolo = str_replace('-', ' ', $titolo);
                 
                $sql = "UPDATE giochi SET dispon = dispon - $dispon WHERE titolo = $titolo ";

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
            

            $conn = connetti();
            $imp = calcola_totale($_SESSION['carrello'],FALSE);
            $data = date ("Y-m-d");
            
            
            $query_insert = "INSERT INTO `ordini`(`id_ordine`, `id_utente`, `importo_ordine`, `stato_ordine`, `data_ordine`) VALUES ( NULL,'".$_SESSION['id']."',".$imp.",'pagamento effettuato', '".$data."' )";
                                               
            $risultato = mysql_query($query_insert, $conn );
            
            
            $query = "SELECT * FROM `ordini` ";
                
            $risultato = mysql_query($query, $conn );
            
            while ($riga = mysql_fetch_array($risultato))
            {
                $ordine = $riga['id_ordine']; 
            }
            /////////////////////////////////////////////////////////////////
            
            for($i=0;$i<count($_SESSION['carrello']);$i++)
            {
                $t = "'".$_SESSION['carrello'][$i]['titolo']."'";
                $q = $_SESSION['carrello'][$i]['quantita'];
                 
                $query_insert = "INSERT INTO ordine_prodotto (`num_ordine`, `nome_prodotto`, `quantita`) VALUES ( $ordine , $t , $q )";
                                               
                $risultato = mysql_query($query_insert, $conn );
            }
            

            
    }
                        
    
}

function stato_ordine ($ordine,$mod)
{
    //$conn = mysqli_connect("localhost","root","","amm_alessio"); 
    $conn = connetti();
    
    $query = "UPDATE `ordini` SET `stato_ordine`= '$mod'  WHERE  `id_ordine` = $ordine ";
    //UPDATE `ordini` SET `stato_ordine`= 'prova2'  WHERE `id_utente` = 1
    
    $result = mysql_query( $query, $conn);
    
     stampa_ordine();
     
    if($result)
    {

        echo "<script type="."text/javascript".">
                 alert('operazione completata');	
        </script>";
    }
    else
    {
        echo "<script type="."text/javascript".">
               alert('ERRORE');	
        </script>";
    }
        
}

function svuota ()
{
    unset($_SESSION['carrello']);
    $_SESSION['carrello'] = array();
}



function pagamento (array $a, $importo)
{
    if( $importo >= calcola_totale($a,FALSE) )
    {
        ordina();
        svuota();
       echo "<h1>Pagamento completato</h1>";
    }
    else
    {
       
        echo "<h1>Denaro insufficente</h1>";
        termina();
    }
    
}


?>
