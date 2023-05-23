

<?php

/** Accuse Popup Save **/

foreach ($_POST as $key => $value)
{
	echo "".strpos($key, 'name');
	

	return;
  if (strpos($key, 'name') == true)  // note triple = is needed because strpos could return 0 which would be false
  {
	  echo "true";
	
	$sql = "INSERT INTO `tblaccused`(`accusename`, `MESID`) VALUES ('".$_POST['accused']."','".$_POST['mesid']."')";
	$query=mysql_query($sql); 	
	
		echo "DataSaved";

		die;
    // do stuff with $value 
  }
  
  
	

  
    // do stuff with $value 
  
  
  
  
  
  
  
}
