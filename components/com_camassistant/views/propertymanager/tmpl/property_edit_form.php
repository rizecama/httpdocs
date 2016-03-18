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

<script type="text/javascript">
<!--
	function submitProperty() {
		frm=document.propertyform;
		if(frm.property_name.value=='')
		{
			alert("Please enter Property Name");
			frm.property_name.focus();
			return;
		} else if(frm.tax_id.value=='') {
			alert("Please enter Property Federal Tax ID");
			frm.tax_id.focus();
			return;
		} else {
		frm.submit();
		}
	}
// -->
</script>

<div id="container_inner" >
<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php">Home</a> </li>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=company_edit_form&Itemid=87">Firm Admin Home</a> </li>
<?php if($property_id) { ?>
<li><a href="index.php?option=com_camassistant&controller=propertymanager&task=manage_properties&Itemid=<?php echo $Itemid;?>">My Managers & Properties</a></li>
<li>Property Edit Form</li>
<?php } else { ?>
<li>My Firm Admin Info</li>
<?php } ?>
</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<div id="dotshead_blue"> Update your Property Info</div>
<!-- eof dotshead -->

<!--<h3> Update your Admin Info</h3>-->

<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="propertyform" id="propertyform" class="form-validate">
<div id="signup-form">

<div class="signup">
<label>Property Association Name: <span>*</span></label>
<input type="text" name="property_name" style="width:157px;"  value="<?php echo $this->pdetails[0]->property_name; ?>"/>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname">Association Tax ID Number: <span>*</span></label>
<input name="tax_id" type="text" style="width:157px;" value="<?php echo $this->pdetails[0]->tax_id; ?>"  />
<label id="first-name"></label></div>
</div>
<!--<div class="signup">
<div class="state">
&nbsp;</div></div>-->
<div class="signup">
<label style="color:#009900;font-size:14px"><strong>Property Association Information</strong> </label>
</div>

<div class="signup">
<label id="unmsg" for="fname" style="color:#FF0000"><strong>Mailing Address for Property:</strong> </label>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname">Street: </label>
<input name="street" type="text" style="width:157px;" value="<?php echo $this->pdetails[0]->street; ?>"  />
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname">City: </label>
<input name="city" type="text" style="width:157px;" value="<?php echo $this->pdetails[0]->city; ?>" />
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname">State: </label>
<input name="state" type="text" style="width:157px;" value="<?php echo $this->pdetails[0]->state; ?>" />
<label id="first-name"></label></div>
</div>
<div class="signup">
<div class="state">
<label id="unmsg" for="fname">Zip Code: </label>
<input name="zip" type="text" style="width:157px;" value="<?php echo $this->pdetails[0]->zip; ?>" />
<label id="first-name"></label></div>
</div>

<div class="signup">
<label id="emailmsg" for="email"><input type="checkbox" name="share" value="1" <?php if($this->pdetails[0]->share==1) echo 'checked'; else echo 'unchecked'; ?>/>&nbsp;I do not want to share the high, low and awarded proposal dollar amounts to the un-awarded vendors for this property</label>
<label id="user-email"></label></div>
<br/>
<div class="form_checkbox" style="width:0px;">
<div class="check"></div>
	<div class="checktext">
	<img src="templates/camassistant/images/save.png" name="booknowbtn"   onClick="javascript:submitProperty();"/>
	<input type="hidden" name="option" value="com_camassistant" />
	<input type="hidden" name="controller" value="propertymanager" />
	<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
	<input type="hidden" name="task" value="submit_property" />
	<input type="hidden" name="id" value="<?php echo $this->pdetails[0]->id;?>" />
	
</div>

</div>
</div>
</form>
<div class="clear"></div>
</div>