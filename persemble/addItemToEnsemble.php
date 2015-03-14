<?php
require_once("database/database.php");

		// Fetching Values from URL 
	   $idensembles=$_POST['idensembles'];
	   $iditems=$_POST['iditems'];
	   
// check idensembles to see if this page opened by the proper webpage, if not return to index.php
if ($idensembles=="") {
	header('Location: index.php');
}
	
		if ($idensembles!="") {
      	$iduser = $_SESSION['iduser'];
      
   		$query = persembleDB::getInstance()->add_item_to_ensemble($idensembles, $iditems);
   		
   		// Set the session variable so that items.php can show add to ensembles
   		   		
   		$_SESSION['ensembleId'] = $idensembles;	
   		
   	} else {
			// reset the session variable
			
			$_SESSION['ensembleId'] = "";   	
   	}
   	
   	// reload the items.php page  
   	header('Location: items.php');
?>