<?php
//select empno,Salary FROM jos_employe where empno != (select empno from jos_employe order by salary desc limit 0,1) order by salary desc limit 0,1

$c1		=0;
$c2		=$_REQUEST['c2'];
$path	=$_REQUEST['path'];
require_once($path."/configuration.php");
$obj= new JConfig;
$host = $obj->host;
$username = $obj->user;
$password = $obj->password;
$database = $obj->db;
$con = mysql_connect( $host, $username, $password) or die('Could not connect to server.' );
mysql_select_db($database, $con) or die('Could not select database.');
$c2 = doubleval(str_replace(",","",$c2));
if($c1 == 0 && $c2 !=0) //code to combined calculation
{
	if($c2 < 4400000)
	{
		$formula = (-0.00869*log($c2))+0.15;
		$percent = round($formula,5); 
	}
	else if($c2 >= 4400000 && $c2 < 6500000)
	{
		$formula	=  (-0.00000000000000000000004033*pow($c2,3))+((0.0000000000000010088)*pow($c2,2))-(0.0000000083137)*$c2 + 0.037557; 
		$percent = round($formula,5); 
	}
	else if($c2 >= 6500000)
	{
		$percent = 0.015;
	}
	$comm_amnt = $percent*$c2;
	$comm_amnt = round($comm_amnt,2);
	$comm_amnt = round($comm_amnt);
}

$comm_amnt = doubleval(str_replace(",","",$comm_amnt));
$comm_amnt = number_format($comm_amnt,2);

echo $comm_amnt;
mysql_close($con);
?>
