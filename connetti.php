<?php

function connetti ()
{
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
        
        return $conn;
}

?>
