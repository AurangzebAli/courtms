<?php

/*
Developed by : Aurangzeb Ali
Founder of : 57 Technology
Designation : Senior Software Engineer
Project : Court Management System
*/
require_once('dbConnection.php');


if(isset($_POST['accusedupdate']))
{
	
	$hearingdate = GetCurrentDate($_POST['txthearing']);
 $nexthearingdate = GetCurrentDate($_POST['txtnexthearingdate']);
 
	$query ="UPDATE `tbldetail` 
	SET `MES-ID`= '".$_POST['txtMesid'] ."',
	`caseofficer`= '".$_POST['caseofficer'] ."',
	`hearing`= '".$hearingdate ."',
	`commitment`='".$_POST['txtDOC'] ."',
	`nexthearing`='".$nexthearingdate ."',
	`title`= '".$_POST['txttitle'] ."',
	`hearingstatus`='".$_POST['hearingstatus'] ."'
	WHERE 1=1 and  `SerialNo`= '".$_POST['serialno'] ."'";
	mysql_query($query) or die(mysql_error()) ;
	
	$query1 ="UPDATE `tblcps` SET `cpvalue`='".$_POST['txtcps'] ."' WHERE `detailid`='".$_POST['serialno'] ."'";
	mysql_query($query1) or die(mysql_error()) ;
	
$query ="INSERT INTO `tblaccused`(`accusename`,`detailid`) VALUES ('".$_POST['accused']."','". $lastinsertId ."')";
	mysql_query($query);
	
	
//	echo  $query;
	$query1= "INSERT INTO `tblcps`(`cpvalue` , `detailid`) VALUES ('".$_POST['cps']."','". $lastinsertId ."')";
	mysql_query($query1);
	
	

	
	header('location:index.php');
	
}







foreach ($_POST as $key => $value)
{
	
	if($value == "dashboard")
	{
	if($_POST['name'] == "dashboard")
	{
	 
$requestData= $_REQUEST;


$sql = "SELECT t.`SerialNo`, t.`MES-ID`, t.`noofcps`, t.`noofaccused`, t.`caseofficer`, CONCAT(t.`hearingstatus`, ', ' ,date(t.`hearing`))  as hearing, t.`commitment`, date(t.`nexthearing`) as nexthearing, t.`title`  
 ,(SELECT GROUP_CONCAT(cpvalue ORDER BY cpvalue ASC SEPARATOR ', ') from tblcps WHERE detailid = t.serialno ) as cps,
 (SELECT GROUP_CONCAT(accusename ORDER BY accusename ASC SEPARATOR ', ') from tblaccused WHERE detailid = t.serialno ) as accused FROM `tbldetail` t  order by t.`SerialNo` desc";
$query=mysql_query($sql); //or die("employee-grid-data.php: get employees");
$totalData = mysql_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT t.`SerialNo`, t.`MES-ID`, t.`noofcps`, t.`noofaccused`, t.`caseofficer`, CONCAT(t.`hearingstatus`, ', ' ,date(t.`hearing`))  as hearing, t.`commitment`, date(t.`nexthearing`) as nexthearing, t.`title`  
 ,(SELECT GROUP_CONCAT(cpvalue ORDER BY cpvalue ASC SEPARATOR ', ') from tblcps WHERE detailid = t.serialno ) as cps,
 (SELECT GROUP_CONCAT(accusename ORDER BY accusename ASC SEPARATOR ', ') from tblaccused WHERE detailid = t.serialno ) as accused FROM `tbldetail` t ";
$sql.=" WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND   t.title LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR t.caseofficer LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR t.`MES-ID` LIKE '".$requestData['search']['value']."%' ";
}
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");
$totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");

$data = array();


while( $row=mysql_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["SerialNo"];
	$nestedData[] = $row["MES-ID"];
	$nestedData[] = $row["caseofficer"];
	$nestedData[] = $row["title"];
	$nestedData[] = $row["cps"];
	$nestedData[] = $row["accused"];
	
	$nestedData[] = $row["hearing"];
	$nestedData[] = $row["commitment"];
	$nestedData[] = $row["nexthearing"];
	

	$data[] = $nestedData;


}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format



	 
 }

		
	}
	if($value == "accusedform")
	{
		
	if($_POST['name'] == "accusedform")
	{
	
	
$requestData= $_REQUEST;

$clause  ="";
if(!empty($_POST['selectedaccuse']))
{
	
	$clause ="and t.`SerialNo` =".$_POST['selectedaccuse'];"";
}
else
{
	$clause ="and 1=1";
}

$sql = "SELECT t.`SerialNo`, t.`MES-ID`,  t.`title`  ,
 (SELECT GROUP_CONCAT(accusename ORDER BY accusename ASC SEPARATOR ', ') from tblaccused WHERE MESID = t.`MES-ID` ) as accused FROM `tbldetail` t  order by t.`MES-ID` desc";
$query=mysql_query($sql); //or die("employee-grid-data.php: get employees");
$totalData = mysql_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT t.`SerialNo`, t.`MES-ID`,  t.`title`  ,
 
 (SELECT GROUP_CONCAT(accusename ORDER BY accusename ASC SEPARATOR ', ') from tblaccused WHERE MESID = t.`MES-ID` ) as accused FROM `tbldetail` t ";
$sql.=" WHERE 1=1 " .$clause;
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND (  t.title LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR t.caseofficer LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR t.MES-ID LIKE '".$requestData['search']['value']."%' )";
}
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");
$totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");

$data = array();


while( $row=mysql_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["SerialNo"];
	$nestedData[] = $row["MES-ID"];
	$nestedData[] = $row["title"];
	$nestedData[] = $row["accused"];
	
	$data[] = $nestedData;


}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format






}

	}
	
		if($_POST['name'] == "accusedUpdate")
		{
		
			$query2 ="UPDATE `tblaccused`
			SET 
			`accusename`='".$_POST['accused']."',
			`cnic`='".$_POST['cnic']."',
			`fathername`='".$_POST['fathername']."',
			`organization`='".$_POST['organization']."',
			`status`='".$_POST['status']."' WHERE `accuseid`='".$_POST['serialno']."'";	
		
			mysql_query($query2) or die(mysql_error()) ;
	
			echo "Accused Saved";
			
		break;
		}

	if($_POST['name'] == "accusesave")
	{
		
	$sql = "INSERT INTO `tblaccused`(`accusename`, `MESID`,`cnic`, `fathername`, `organization`, `status`) VALUES ('".$_POST['accused1']."','".$_POST['messid1']."','".$_POST['cnic']."','".$_POST['fathername']."','".$_POST['organization']."','".$_POST['status']."')";
	$query=mysql_query($sql); 	
	
		echo "Accuse Saved";

		break;
	}
	
	if($value == "accuseddetailform")
	{
		
		if($_POST['name'] == "accuseddetailform")
		{
			
			$requestData= $_REQUEST;
$sql = "SELECT t.`accuseid`, t.`accusename`,  t.`MESID`  , t.`cnic`, t.`fathername`, t.`organization`, t.`status`  FROM tblaccused t WHERE t.`MESID` = '" .$_POST['selectedaccused']."'";
$query=mysql_query($sql); //or die("employee-grid-data.php: get employees");
$totalData = mysql_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT t.`accuseid`, t.`accusename`,  t.`MESID` , t.`cnic`, t.`fathername`, t.`organization`, t.`status`     FROM tblaccused t WHERE  t.`MESID` = '" .$_POST['selectedaccused']."'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter

	$sql.=" AND  t.title LIKE '".$requestData['search']['value']."%' ";    
	//$sql.=" OR t.caseofficer LIKE '".$requestData['search']['value']."%' ";

	//$sql.=" OR t.MES-ID LIKE '".$requestData['search']['value']."%' )";
}
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");
$totalFiltered = mysql_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysql_query($sql);// or die("employee-grid-data.php: get employees");

$data = array();


while( $row=mysql_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["accuseid"];
	$nestedData[] = $row["accusename"];
	$nestedData[] = $row["MESID"];
	$nestedData[] = $row["cnic"];
	$nestedData[] = $row["fathername"];
	$nestedData[] = $row["organization"];
	$nestedData[] = $row["status"];
	
	
	$data[] = $nestedData;


}


$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

		}
    
	}
	
	
	
	
	
	

}/***** loop end*****/






if(isset($_POST['save']))
{
	$hearingdate = GetCurrentDate($_POST['hearing']);
 $nexthearingdate = GetCurrentDate($_POST['nexthearing']);
 
	$query2 ="INSERT INTO `tbldetail`(`MES-ID`, `caseofficer`, `hearing`, `commitment`, `nexthearing`, `title`,`hearingstatus`) VALUES ('".$_POST['mesid']."','".$_POST['io']."','".$hearingdate."','".$_POST['commitment']."','".$nexthearingdate ."','".$_POST['title']."','".$_POST['hearingstatus']."')";
	echo $query2 ;
	
	mysql_query($query2) or die(mysql_error()) ;
	$lastinsertId = mysql_insert_id();
	
	$query ="INSERT INTO `tblaccused`(`accusename`,`detailid`, `MESID`) VALUES ('".$_POST['accused']."','". $lastinsertId ."','".$_POST['mesid']."')";
	
	mysql_query($query);
	
	$query1= "INSERT INTO `tblcps`(`cpvalue` , `detailid`) VALUES ('".$_POST['cps']."','". $lastinsertId ."')";
	mysql_query($query1);
	
	
	
		header('location:index.php');
//	echo $query1;

 	
	
}






/********* Get Current Date According to mysql *************/
function GetCurrentDate($date)
{
	$arr = (explode("/",$date));
	$currentdate = $arr[2]."-".$arr[0]."-".$arr[1];
	return $currentdate;
}



/*
Developed by : Aurangzeb Ali
Founder of : 57 Technology
Designation : Senior Software Engineer

*/

?>