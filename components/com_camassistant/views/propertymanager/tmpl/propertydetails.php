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
$property_id = JRequest::getVar("property_id",0);
$Itemid = JRequest::getVar("Itemid",0);
?>

<div id="container_inner" >
<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php">Home</a> </li>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=company_edit_form&Itemid=87">Firm Admin Home</a> </li>
<?php if($property_id) {?>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=manage_properties&Itemid=<?php echo $Itemid;?>">My Managers & Properties</a></li>
<li>Property Details</li>
<?php } else { ?>
<li>My Firm Admin Info</li>
<?php } ?>
</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<div id="dotshead_blue"> Property Details</div>
<!-- eof dotshead -->

<!--<h3> Update your Admin Info</h3>-->
<div id="signup-form">

<div class="signup">
<label><strong>Property Association Name:</strong> <?php echo ucfirst($this->pdetails[0]->property_name); ?></label>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname"><strong>Association Tax ID Number:</strong> <?php echo ucfirst($this->pdetails[0]->tax_id); ?></label>
<label id="first-name"></label></div>
</div>

<div class="signup">
<label style="color:#009900;font-size:14px"><strong>Property Association Information</strong> </label>
</div>

<div class="signup">
<label id="unmsg" for="fname" style="color:#FF0000"><strong>Mailing Address for Property:</strong> </label>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname"><strong>Street:</strong> <?php echo ucfirst($this->pdetails[0]->street); ?></label>
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname"><strong>City:</strong> <?php echo ucfirst($this->pdetails[0]->city); ?></label>
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname"><strong>State:</strong> <?php echo ucfirst($this->pdetails[0]->state); ?></label>
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname"><strong>Zip Code:</strong> <?php echo ucfirst($this->pdetails[0]->zip); ?></label>
<label id="first-name"></label></div>
</div>

<div class="signup">
<label id="emailmsg" for="email" style="width:650px;"><strong>I do not want to share the high, low and awarded proposal dollar amounts to the un-awarded vendors for this property: </strong> <?php if($this->pdetails[0]->share==1) echo 'Yes'; else echo 'No'; ?></label>
<label id="user-email"></label></div>
<br/>

</div>
<div class="clear"></div>
</div>