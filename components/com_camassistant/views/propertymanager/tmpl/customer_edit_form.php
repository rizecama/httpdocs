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
JHTML::_('behavior.modal');
//exit;
// Your custom code here
//echo "<pre>"; print_r($this->details);
$phone = explode('-',$this->details->phone);  
$cellphone = explode('-',$this->details->cellphone);
$Itemid = JRequest::getVar("Itemid",0);
$comp_id = JRequest::getVar("comp_id",0);
$pmanager_id = JRequest::getVar("pmanager_id",0);
$properties=$this->properties;
/*echo "<pre>";
print_r($properties);exit;*/
?>
<style>
#question{
width:305px;
}
</style>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript">
G = jQuery.noConflict();

function validate1(){
var frm = document.adminForm;
email = frm.email.value;
 if(email == '')
 {
 alert('Please enter your email');
 frm.email.focus();
 return false;
 }
 
 var mail=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
 if(mail.test(frm.email.value)==false)
 {
 alert("Please enter the valid email");
 frm.email.focus();
 return false;
 }
 if( email )
 {

 G.post("index2.php?option=com_camassistant&controller=propertymanager&task=checktoallemails", {mailid: ""+email+""}, function(data){
		if(data == 1){
		alert("Already user exists with this email");
		return false;
		}
		else
		frm.submit();
 });
 }
/* if(frm.comp_name.value == '')
 {
 alert('Please enter company name');
 frm.comp_name.focus();
 return;
 } else if(frm.mailaddress.value == '')
 {
 alert('Please enter your company mail address');
 frm.mailaddress.focus();
 return;
 } else if(frm.city.value == '')
 {
 alert('Please enter your city');
 frm.city.focus();
 return;
 } else if(frm.state.value == '')
 {
 alert('Please enter your state');
 frm.state.focus();
 return;
 } else if(frm.zipcode.value == '')
 {
 alert('Please enter your zipcode');
 frm.zipcode.focus();
 return;
 } else if(frm.cphone.value == '')
 {
 alert('Please enter your company phone number');
 frm.cphone.focus();
 return;
 } else if(frm.email.value == '')
 {
 alert('Please enter your email ID');
 frm.email.focus();
 return;
 }

 else if(frm.password.value == '')
 {
 alert('Please enter password');
 frm.password.focus();
 return;
 }
 else if(frm.password2.value == '')
 {
 alert('Please re-enter password');
 frm.password2.focus();
 return;
 }
 else if(frm.password.value != frm.password2.value)
 {
 alert('Incorrect passwords');
 frm.password2.value = '';
 frm.password2.focus();
 return;
 }
 else if(frm.fname.value == '')
 {
 alert('Please enter your first name');
 frm.fname.focus();
 return;
 }
 else if(frm.lname.value == '')
 {
 alert('Please enter your Last name');
 frm.lname.focus();
 return;
 }
 else if(frm.phone1.value == '000' || frm.phone2.value == '000' || frm.phone3.value == '0000')
 {
     alert('Please enter alternate phone number');
     if(frm.phone1.value == '000')
	 {
	 frm.phone1.value = '';
	 frm.phone1.focus();
	 return;
	 }
	 else if(frm.phone2.value == '000')
	 {
	 frm.phone2.value = '';
	 frm.phone2.focus();
	 return;
	 }
	 else if(frm.phone3.value == '0000')
	 {
	 frm.phone3.value = '';
	 frm.phone3.focus();
	 return;
	 }
 }

	 else {*/

   //frm.submit();
/* }*/
}
//Fun. to send for showing a page of view/edit property form 
function fun_editproperty()
{
	var Frm=document.adminForm;
	var cnt=0;
	var FldLen	= Frm.elements['cid[]'].length;
	if(FldLen) 
	{
		for(i=0;i<FldLen;i++)
		{
			if(Frm.elements['cid[]'][i].checked==true)
			{
				var val=Frm.elements['cid[]'][i].value;
				break;
			}
		}
	}
	else 
	{
		if(document.getElementById('cb0').checked==true)
		var val=document.getElementById('cb0').value;
	}
	if(!val)
	{
		alert("Please make a selection from the list to view/edit a property");
		return;
	} else {
		Frm.controller.value="propertymanager";
		Frm.task.value="property_edit_form";
		Frm.option.value="com_camassistant";
		Frm.property_id.value=val;
		Frm.Itemid.value=<?php echo $Itemid;?>;
		Frm.submit();
	}
}//


function fun_delproprty()
{
	var Frm=document.adminForm;
	var cnt=0;
	//alert(Frm.elements['cid[]'].length);
	var FldLen	= Frm.elements['cid[]'].length;
	if(FldLen) 
	{
		for(i=0;i<FldLen;i++)
		{
			if(Frm.elements['cid[]'][i].checked==true)
			{
			//alert(Frm.elements['cid[]'][i].value);
				var val=Frm.elements['cid[]'][i].value;
				break;
			}
		}
	} 
	else 
	{
		if(document.getElementById('cb0').checked==true)
		var val=document.getElementById('cb0').value;
	}
	if(!val)
	{
		alert("Please make a selection from the list to Delete a property");
		return;
	} else {
		Frm.controller.value="propertymanager";
		Frm.task.value="delproperty";
		Frm.option.value="com_camassistant";
		Frm.property_id.value=val;
		Frm.Itemid.value=<?php echo $Itemid;?>;
		Frm.submit();
	}
}
function moveOnMax(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}

G = jQuery.noConflict();
G(document).ready(function(){
	G('#passwordchanges').click(function(){
		el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendors&task=resetpassword';
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 600, y:450}}"))
		SqueezeBox.fromElement(el,options);
	});
});	
</script>
<?php

$user = JFactory::getUser();  
if($user->user_type == 11)
{ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else { ?>
<div id="container_inner" >

<!-- sof bedcrumb -->
<div id="bedcrumb" style="display:none">
<ul>
<li class="home">
<?php if($this->details->user_type=='13'){ ?>
<a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125">Home</a> 
<?php } else { ?>
<a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=128">Home</a> 
<?php } ?>
</li>
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
<div id="dotshead_blue" style="display:none"><?php echo strtoupper($this->details->name.' '.$this->details->lastname); ?></div>
<!-- eof dotshead -->
<p style="height:23px;"></p>
<div id="i_bar">
<div id="i_bar_txt" style="padding-top:9px; text-align:center; padding-left:35px;">
<span><strong>ACCOUNT DETAILS</strong>    </span>
</div>
<div id="i_icon"><?php 
 $user = JFactory::getUser();  
if ($user->user_type=='12') { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=61&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } else { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=65&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } ?></div>
</div>
<form enctype="multipart/form-data" action="<?php echo $this->request_url; ?>" method="post" name="adminForm" >
<!-- sof table pan -->
<div class="table_pannel">



  <div id="signup-form">


<div class="signup" style=" width:400px;">


<table width="350" border="0" cellspacing="0">
  <!--<tr><?php //echo "<pre>"; print_r($this->details->salutation); ?>
    <td width="100" height="35" align="left" valign="middle">Salutation:</td>
    <td width="200" align="left" valign="middle"> 
	<select name="salutation" style="width:270px;">
<option <?PHP //if($this->details->salutation == 'Mr'){?> selected="selected" <?PHP //} ?>>Mr.</option>
<option <?PHP //if($this->details->salutation == 'Mrs') {?> selected="selected" <?PHP //} ?>>Mrs.</option>
<option <?PHP //if($this->details->salutation == 'Ms') { ?> selected="selected" <?PHP //} ?>>Ms.</option>
</select>
</td>
  </tr>-->
  <tr>
    <td height="35" align="left" valign="middle">Name:</td>
    <td align="left" valign="middle"> <input name="fname" type="text" style="width:120px;" value="<?php echo $this->details->name; ?>" /> <input name="lname" type="text" style="width:120px; margin-left:10px" value="<?php echo $this->details->lastname; ?>" /></td>
  </tr>
  <tr>
    <td height="35" align="left" valign="middle">Phone#:</td>
    <td align="left" valign="middle">
 <span class="form_braket">(</span><input id="phone1" name="phone1" type="text" style="width:30px;text-align: center" value="<?PHP echo $phone[0]; ?>" maxlength="3" onkeyup="moveOnMax(this,'phone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/><span class="form_braket">)</span>
 <input id="phone2" name="phone2" type="text" style="width:30px; text-align: center" value="<?PHP echo $phone[1]; ?>" maxlength="3" onkeyup="moveOnMax(this,'phone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/> - 
 <input id="phone3" name="phone3" type="text" style="width:45px; text-align: center" value="<?PHP echo $phone[2]; ?>" maxlength="4" onkeyup="moveOnMax(this,'ext')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/>
 <p style=" float:right;">Ext: <input id="ext" name="ext" type="text" style="width:55px;" value="<?php echo $this->details->extension; ?>" /></p> 
 </td>
  </tr>
  <tr>
    <td height="35" align="left" valign="middle">Cell#:</td>
    <td align="left" valign="middle"><span class="form_braket">(</span><input id="cphone1" name="cphone1" type="text" style="width:30px; text-align: center" value="<?PHP echo $cellphone[0]; ?>" maxlength="3" onkeyup="moveOnMax(this,'cphone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" / ><span class="form_braket">)</span>
 <input id="cphone2" name="cphone2" type="text" style="width:30px;" value="<?PHP echo $cellphone[1]; ?>" maxlength="3" onkeyup="moveOnMax(this,'cphone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /> - 
 <input id="cphone3" name="cphone3" type="text" style="width:45px; text-align: center" value="<?PHP echo $cellphone[2]; ?>" maxlength="4" onkeyup="moveOnMax(this,'cphone1')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /></td>
  </tr>
</table>
</div>

  <div class="signup" style=" width:400px; padding-top:5px; text-align:left">
Primary Email Address (Username): &nbsp;&nbsp;<input name="email" type="text" style="width:220px;" value="<?php echo $this->details->username; ?>" />

  </div>
  <div class="signup">
<label><a href="#" id="passwordchanges">Change Current Password</a></label>
</div>

	<?php if($user->user_type != 16) {?>
    <div class="signup">
	<label>Question: </label>
<?php echo JHTML::_('select.genericlist', $this->questions, 'question', null, 'value', 'text', $this->details->question); ?>
	</div>
    <div class="signup">
	<label>Answer: </label>
	<input name="answer" type="text" style="width:275px;" value="<?php echo $this->details->answer; ?>" />
	</div>
	<?php }
	 $user = JFactory::getUser();
	 $managerid = JRequest::getVar("pmanager_id",'');
	 $mgrtype = JRequest::getVar("mgrtype",'');
	 $dmanagers = $this->dms;
	 $db =& JFactory::getDBO();
	 if($user->user_type == 13 && $mgrtype == 'normal' ){
	 ?>
	 <div class="signup">
	<label>Reports to: </label>
		<select name="dmanager" id="dmanager">
          <?php 
		for($d=0; $d<count($dmanagers); $d++){ 
	 	$sql_dmanagerdet = "SELECT name,lastname,id FROM #__users where id=".$dmanagers[$d]."";
		$db->Setquery($sql_dmanagerdet);
		$ddetails = $db->loadObject();
		
		// To get selected element
		$dman = "SELECT dmanager FROM #__cam_invitemanagers where managerid=".$_REQUEST['pmanager_id']."";
		$db->Setquery($dman);
		$dmans = $db->loadResult();
		if($ddetails->id == $dmans){
			$selected = 'selected="selected"';
		}
		else
			$selected = '';
			
		if($ddetails->id){ ?>
		<option <?php echo $selected; ?> value="<?php echo $ddetails->id; ?>" ><?php echo $ddetails->name.'&nbsp;'.$ddetails->lastname; ?></option>
		<?php 	}	}
		?>
        </select> 

    </div>
	<?php } 
	else if($mgrtype == 'dm'){ ?>
	<div class="signup">
	<label>Reports to: </label>
	<font color="#FF0000">District Manager reporting to ADMIN</font>
	</div>
	<?php }
	else{
	
	}
	?>
	<br />
	<?php if ($user->user_type == 16) {?>
    <div id="topborder_row123" align="right">
	<?php }else{ ?>
	<div id="topborder_row" align="right">
	<?php }?>
	</div>

<div class="signup_editform">
<a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125"><img src="templates/camassistant_left/images/goback.gif" alt="save" /></a>
<a href="#" onClick="validate1()"><img src="templates/camassistant_left/images/save.gif" alt="save" /></a>
<div class="clear"></div>
</div>


<input type="hidden" name="id" value="<?php echo $this->details->id;?>" />
<input type="hidden" name="user_type" value="<?php echo $this->details->user_type; ?>" />
<input type="hidden" name="option" value="com_camassistant" />
<input type="hidden" name="controller" value="propertymanager" />
<input type="hidden" name="task" value="save_edit_form" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="property_id" value="" />
<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
<input type="hidden" name="comp_id" value="<?php echo $comp_id;?>" />

<!-- sof table pan -->
<?php /*?><div class="table_pannel">
<!-- eof dotshead -->
<div id="i_bar">
<div id="i_bar_txt">
<span>PROPERTIES MANAGED BY <?php echo strtoupper($this->details->name.' '.$this->details->lastname); ?>   </span>
</div>
<div id="i_icon"><a href="#"><img src="templates/camassistant_left/images/info_icon2.png" alt="info" /></a></div>
</div>

<!-- sof table pan -->
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="70" align="center" valign="top">SELECT</td>
    <td width="157" align="center" valign="top">PROPERTY NAME</td>
    <td width="231" align="center" valign="top">Address</td>
    <td width="76" align="center" valign="top">City</td>
    </tr>
  
  <?php if(count($properties)>0) { 
  for($i=0;$i<count($properties);$i++) { 
  $row = &$this->properties[$i];
  $checked 	= JHTML::_('grid.checkedout',   $row, $i );
  ?>
  
  <tr class="table_blue_rowdots">
    <td align="center" valign="top"><?php echo $checked; ?></td>
    <td align="left" valign="middle"><?php echo ucwords($properties[$i]->property_name);?></td>
    <td align="left" valign="top"><?php echo ucfirst($properties[$i]->street).', '.ucfirst($properties[$i]->city).', '.ucfirst($properties[$i]->state).'';?></td>
    <td align="left" valign="top"><?php echo ucfirst($properties[$i]->city);?></td>
    </tr>
	<?php } } else {?>
 <tr class="table_blue_rowdots">
    <td align="center" valign="top" colspan="4">No Records Found</td>
  </tr><?php } ?>
  
 <tr class="table_blue_rowdots">
   <td align="center" valign="top">&nbsp;</td>
   <td align="left" valign="middle">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>
</table>
<div class="table_bottomlinks">
<ul>
<li  style=" background:none;"><a href="javascript:void(0);" onclick="javascript:fun_editproperty();">View/Edit Property or Board info</a></li>
<li><a href="#">Reassign Property  </a></li> 
<li><a href="javascript:void(0);" onclick="javascript:fun_delproprty();">Remove Property</a></li> 
</ul>
</div>

<div class="clear"></div>
</div>
</div>

<!-- eof table pan -->
<div id="topborder_row" align="right">
<a class="modal" title="Click here to add New Property" href="index.php?option=com_camassistant&amp;controller=rfp&amp;task=addproperty" rel="{handler: 'iframe', size: {x: 600, y: 500 }}"><img src="templates/camassistant_left/images/addaproperty.gif" alt="save changes" /><!--<input type="button" value="Add Property">-->
</a>
</div><?php */?>
<!--<div id="topborder_row" align="right"><a href="#"><img src="templates/camassistant_left/images/addaproperty.gif" alt="save changes" /></a></div>-->

</div>


<div class="clear"></div>
</div>
</div>

</form>
<?php } ?>
<!-- eof table pan -->
