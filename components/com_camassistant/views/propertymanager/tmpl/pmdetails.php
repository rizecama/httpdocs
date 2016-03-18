<?php
/**
 * @version		1.0.0 camassistant $
 * @package		camassistant
 * @copyright	Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
// Your custom code here
//echo "<pre>"; print_r($this->details);
$phone = explode('-',$this->details->phone);  
$cellphone = explode('-',$this->details->cellphone);
$Itemid = JRequest::getVar("Itemid",0);
$pmanager_id = JRequest::getVar("pmanager_id",0);
?>


<div id="container_inner" >
<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php">Home</a> </li>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=company_edit_form&Itemid=87">Firm Admin Home</a> </li>
<?php if($pmanager_id) { $pmName='Property Manager';?>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=manage_properties&Itemid=<?php echo $Itemid;?>">My Managers & Properties</a></li>
<li>Property Manager Edit Form</li>
<?php } else { $pmName='Admin';?>
<li>My Firm Admin Info</li>
<?php } ?>
</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<div id="dotshead_blue"> <?php echo ucwords($pmName);?> Details</div>
<!-- eof dotshead -->

<!--<h3> Update your Admin Info</h3>-->

<div id="signup-form">
<div class="signup">
<label><strong>Salutation:</strong> <?php echo ucfirst($this->details->salutation); ?></label>
</div>
<div class="signup">
<label><strong>Name:</strong> <?php echo ucfirst($this->details->name).' '.ucfirst($this->details->lastname); ?></label>
</div>
<div class="signup">
<div class="cp">
<label id="unmsg1" for="phone">Phone #: </label>
( <?php echo $phone[0].' ) -'.$phone[1].'-'.$phone[2]; ?> 
<label id="phone-number"></label></div>

<div class="ext">
<label>Ext:</label>
<?php echo $this->details->extension; ?></div>
<div class="clear"></div>
</div>

<div class="signup">
<div class="cp">
<label>Your Cell Phone #: </label>
(<?PHP echo $cellphone[0].' ) -'.$phone[1].'-'.$phone[2];?>
</div>
</div>
<div class="signup">
<label><strong>Email Address :</strong> <?php echo ucfirst($this->details->email); ?></label>
</div>

<br/>

</div>

</div> 
<div class="clear"></div>
</div>