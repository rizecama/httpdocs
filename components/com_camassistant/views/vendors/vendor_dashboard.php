<?php
/**
 * @version		1.0.0 camassistant $
 * @package		camassistant
 * @copyright	Copyright � 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal');
// Your custom code here
$vendor_GLI_compliance_alert = $this->vendor_GLI_compliance_alert;
//echo "<pre>"; print_r($vendor_GLI_compliance_alert);
?>
<body class="Body_vender">
<div id="container_inner">


<div id="vender_right">

<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="#">Home</a> </li>
<li><a href="#">My Dashboard</a> </li>

</ul>
</div>
  <!-- eof bedcrumb -->
  <?php $user =& JFactory::getUser(); 
 	$name = $user->get('name');
	$lname = $user->get('lastname');
	$username = $name.'&nbsp;'.$lname;

?>
<?PHP if($vendor_GLI_compliance_alert[1] == 0 || $vendor_GLI_compliance_alert[0] == 0) { ?>
<p class="alert" style="color:#FF0000">“ALERT! - You must Upload your W9 in the Compliance Documentation Section to be eligible for RFPs.”&nbsp;&nbsp;Please <a href="index.php?option=com_camassistant&controller=vendors&task=vendor_compliance_docs&Itemid=115">Click here</a> to upload your “Compliance Documents”.<br/>

“ALERT! - You must Upload your current Liability Insurance Information in the Compliance Documentation Section to be eligible for RFPs.”&nbsp;&nbsp;Please <a href="index.php?option=com_camassistant&controller=vendors&task=vendor_compliance_docs&Itemid=115">Click here</a> to upload your “Compliance Documents”.</p><br/>
<?PHP } else if($vendor_GLI_compliance_alert[2] != 0 ||  $vendor_GLI_compliance_alert[3] != 0) { ?>
"Thank you for uploading your Compliance Documents!  
You will be notified via email once our team verifies your documents. You will then be able to respond to RFPs. "
<?PHP }?>
  <p class="blueheads">Hi <?php echo $username; ?>! </p><br />
  
<!-- sof dotshead -->
<?php echo $this->announcement[0]->announcement; ?>
<!-- eof dotshead -->
<br />
<!-- sof table pan -->

<?php if($this->openjobs && $vendor_GLI_compliance_alert[1] != 0 && $vendor_GLI_compliance_alert[0] != 0){ ?>
<div class="head_greenbg">BROWSE OPEN JOBS!</div>


<div class="table_blue_rowdots2">
<table width="100%" cellspacing="4">
  <tr class="table_blue_row">
    <td width="373" align="left" valign="top">&nbsp;JOB TITLE</td>
    <td width="196" align="left" valign="top">&nbsp;CITY</td>
    <td width="95" align="left" valign="top">TIME LEFT</td>
  </tr>
  <?php 
  	$k = 0;
	 foreach ($this->openjobs as $row) :
	//echo "<pre>"; print_r($row); 
		$row->endDate; 
		$first_date = strtotime($row->endDate);
		$today =  date("m/d/Y");
		$second_date = strtotime($today ); 
	//$second_date = mktime($today);
	  $offset = $first_date - $second_date;

?>
 <tr class="table_blue_rowdots">
    <td align="left" valign="top"><?php echo $row->projectName; ?></td>
    <td align="left" valign="top"><?php echo $row->city; ?></td>
    <td align="left" valign="top"><?php echo  $row->time_left; ?></td>
    </tr>
 <?php
		$k = 1 - $k;
		endforeach;

	//}
	?>
     
     
</table>


<div class="clear"></div>
</div>
<!-- eof table pan -->
<?php }  ?>
</div>
<!-- eof right -->

<div class="clear"></div>
</div>



