<?php
error_reporting(0);
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
//echo "<pre>"; print_r($this->details1);
$comp_phno = explode('-',$this->details1->comp_phno);  
$comp_alt_phno = explode('-',$this->details1->comp_alt_phno);
?>

<script language="javascript" type="text/javascript">
LH = jQuery.noConflict();
LH('.proposal_opener').live('click',function(){
	        if(!LH(this).hasClass('active')){
			if( LH(this).attr('id') == 'personal' ) 
			{
				LH('.proposal_opener').removeClass('active');
	            LH('.table_blue_rowdots_submitted').removeClass('active'); 
			    LH(this).addClass('active');
                LH(this).parent().parent().addClass('active'); 	
				LH('.companyinfo_data').slideUp('slow');
				LH('.personal_info').slideDown('slow');				
			}
			else{	
			LH('.proposal_opener').removeClass('active');
	        LH('.table_blue_rowdots_submitted').removeClass('active'); 	
			LH(this).addClass('active');
            LH(this).parent().parent().addClass('active'); 	
			LH('.personal_info').slideUp('slow');
			LH('.companyinfo_data').slideDown('slow');
			}
		}else{	    
		   LH('.proposal_opener').removeClass('active');
           LH('.table_blue_rowdots_submitted').removeClass('active'); 
		   LH('.personal_info').slideUp('slow');
		   LH('.companyinfo_data').slideUp('slow');
		}

	});
	</script>
<script language="javascript" type="text/javascript">
function validate1(){
 var frm = document.adminForm;
   frm.submit();
}
function validate2(){
 var frm = document.reg_form3;

 var fileName = frm.image.value; 
 var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
 if(ext == 'bmp'){
  alert("Invalid filename, please select another file");
  return false;
 }
 if(fileName != '')
    {
		 if(ext != 'jpg' && ext != 'gif' && ext != 'jpeg' && ext != 'png' && ext != 'PNG' && ext != 'JPG' && ext != 'JPEG' && ext != 'GIF' )
		 { 
		 	alert("Image file must be a .gif, .jpg, or .png.");
		 	return false;
		 }
		 if(fileName.split(".").length - 1 > 1){
		 	alert("Please remove the dots from image file name and upload.");
		 	return false;
		 }
		 else{
		 	frm.submit();
		 } 
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

   frm.submit();
/* }*/
}

function moveOnMax(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
function resetForm(){
	
   document.getElementById("reg_form3").reset();
 } 
</script>

</script>
<?php

$user = JFactory::getUser();  
if($user->user_type == 11)
{ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else { ?>
<div id="vender_right2">
<p style="height:20px;"></p>
<div id="i_bar">
<div id="i_bar_txt" style="text-align:center; padding-left:30px;">
<span><strong>ACCOUNT DETAILS</strong></span>
</div>
<div id="i_icon"><a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&view=article&id=71&Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a></div>
</div>

<div class="clear"></div>

<table width="100%" cellspacing="0" cellpadding="0" style="margin:6px 4px 6px 0;">
<tbody><tr id="table_blue_rowdots" class="table_blue_rowdots_submitted">
<td width="15" valign="middle" align="left" style="font-size:15px; font-weight:bold;">
<a style="float:left;" href="javascript:void(0);" class="proposal_opener" id="personal"></a>&nbsp;&nbsp;&nbsp;PERSONAL DETAILS
</td>
</tr>
</tbody>
</table>




<div class="clear"></div>



<?php
$phone = explode('-',$this->details->phone);  
$cellphone = explode('-',$this->details->cellphone);
?>
<div class="personal_info" style="display:none;">
<form enctype="multipart/form-data" action="<?php echo $this->request_url; ?>" method="post" name="adminForm" >
<!-- sof table pan -->
<div class="table_pannel">
  <div id="signup-form">
<div class="signup" style=" width:400px;">
<table width="350" border="0" cellspacing="0">
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

<div class="signup" style=" width:400px; padding-top:5px;">
User Name/e-mail Address:
  <input name="username" type="text" style="width:183px; background-color: rgb(102, 102, 102); color: rgb(255, 255, 255);" value="<?php echo $this->details->username; ?>" readonly=""/>

  </div>  
  <div class="signup" style=" width:400px; padding-top:5px;">
Notification email address: &nbsp;&nbsp;<input name="email" type="text" style="width:183px;" value="<?php echo $this->details->email; ?>" />

  </div>
  <div class="signup">
<label><a href="#" id="passwordchanges">Change Current Password</a></label>
</div>
    <div class="signup">
	<label>Question: </label>
<?php echo JHTML::_('select.genericlist', $this->questions, 'question', null, 'value', 'text', $this->details->question); ?>
	</div>
    <div class="signup">
	<label>Answer: </label>
	<input name="answer" type="text" style="width:275px;" value="<?php echo $this->details->answer; ?>" />
	</div>
	
	 <?php 
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
    <div id="topborder_row" align="right">
	</div>
<div class="signup_editform" style="width:155px;">
<a href="javascript:void(0);" class="save_infodata" onClick="validate1()"></a>
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
<input type="hidden" name="pagefrom" value="adminside" />
</div>
<div class="clear"></div>
</div>

</form>
</div>
<div class="clear"></div>
<table width="100%" cellspacing="0" cellpadding="0" style="margin:6px 4px 6px 0">
<tbody>
<tr id="table_blue_rowdotsmarket" class="table_blue_rowdots_submitted">
<td width="15" valign="middle" align="left" style="font-size:15px; font-weight:bold;">
<a style="float:left;" href="javascript:void(0);" class="proposal_opener" id="company"></a>&nbsp;&nbsp;&nbsp;COMPANY DETAILS
</td>
</tr>
</tbody></table>

<div class="companyinfo_data" style="display:none;">
<form enctype="multipart/form-data" action="" method="post" name="reg_form3" id="reg_form3">


<!-- eof dotshead -->

<!-- sof table pan -->
<div class="table_pannel">

 <div id="signup-form">

		<div class="signup">
		<label>Management Firm Company Name: </label>
		<input name="comp_name" id="comp_name" type="text" style="width:275px; background-color:#666666; color:#ffffff;" value="<?php echo $this->details1->comp_name; ?>" readonly=""/>
		<!--<input name="" type="text" style="width:275px;" value="Legal Business Name"/>-->
		</div>
		
		<?php /*?><div class="signup">
		<label>Property Management Firm/CAM Firm License #:</label>
		<input name="tax_id" type="text" style="width:275px; background-color:#666666; color:#ffffff;" value="<?php echo $this->details1->tax_id; ?>" readonly="" />
		<!--<input name="" type="text" style="width:275px;" value="CAB123"/>-->
		</div>
		<?php */?>
		<div class="signup">
		<label>Federal Tax ID #:</label>
		<input name="tax_id1" type="text" style="width:275px;background-color:#666666; color:#ffffff;" value="<?php echo $this->details1->camfirm_license_no; ?>" readonly=""/>
		<!--<input name="" type="text" style="width:275px;" value="123-45-6789"/>-->
		</div>
		
		
		<div class="signup">
		<label>Management Firm Mailing Address:<span class="redstar">*</span> </label>
		<input name="mailaddress" type="text" style="width:275px;" value="<?php echo $this->details1->mailaddress; ?>" />
		<!--<input name="" type="text" style="width:275px;" value="Street Address"/>-->
		</div>


		<div class="signup">
		<label>City:<span class="redstar">*</span> </label>
		<input name="city" type="text" style="width:275px;" value="<?php echo $this->details1->comp_city; ?>" />
		<!--<input name="" type="text" style="width:275px;" value="City Name"/>-->
		</div>
		
		
		<div class="signup">
		<label>State:<span class="redstar">*</span> </label>
		<!--<input name="state" type="text" style="width:275px;" value="<?php echo $this->details1->comp_state; ?>" />-->
		
		<?php //echo "<pre>"; print_r($this->states);?>
		<?php echo JHTML::_('select.genericlist', $this->states, 'state_name',  'size="1" '.$disabled.' class="inputbox " ', 'value', 'text', $this->details1->comp_state);?>
		<!--<select name="" style="width:282px;">
		<option>Select</option>
		</select>-->
		</div>
		
		<div class="signup">
		<label>Zip Code:<span class="redstar">*</span> </label>
		<input name="zipcode" type="text" style="width:275px;" value="<?php echo $this->details1->comp_zip; ?>" maxlength="5" />
		<!--<input name="" type="text" style="width:275px;" value="Zip Code:"/>-->
		</div>

		<div class="signup">
		<div class="cp">
		<label>Main Company Phone Number: <span class="redstar">*</span></label>
		<span class="form_braket" style="float:left">(</span><input id="cphone1" name="cphone1" type="text" style="width:29px; float:left; text-align: center" value="<?php echo $comp_phno[0]; ?>"  maxlength="3" class="inputbox required validate-phone" onkeyup="moveOnMax(this,'cphone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/><span class="form_braket" style="float:left">)</span>
		 <input id="cphone2" name="cphone2" type="text" style="width:30px; float:left; text-align: center" value="<?php echo $comp_phno[1]; ?>" maxlength="3" onkeyup="moveOnMax(this,'cphone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/> <span style="float:left; margin-left:3px; margin-right:3px;"> - </span> 
		 <input id="cphone3" name="cphone3" type="text" style="width:45px; float:left; text-align: center" value="<?php echo $comp_phno[2]; ?>" maxlength="4" onkeyup="moveOnMax(this,'cext')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" />
 		 <!--<input name="" type="text" style="width:30px;" value="123"/> - 
		 <input name="" type="text" style="width:45px; text-align: center" value="4567" onclick="this.value=''"/>-->
		</div>
		
		<div class="ext">
		<label>Extension (opt.):</label>
		<input id="cext" name="cext" type="text" style="width:70px;" value="<?php echo $this->details1->comp_extnno; ?>" maxlength="4" />
		<!--<input name="" type="text" style="width:82px;" value="" />-->
		</div>
		<div class="clear"></div>
		</div>

		<div class="signup">
		<div class="cp">
		<label>Alternate Phone Number (opt.):	</label>
		<span class="form_braket" style="float:left">(</span><input id="caphone1" name="caphone1" type="text" style="width:30px; float:left; text-align: center" value="<?php echo $comp_alt_phno[0]; ?>"  class="inputbox required validate-phone" maxlength="3" onkeyup="moveOnMax(this,'caphone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/><span class="form_braket" style="float:left">)</span>
		<input id="caphone2" name="caphone2" type="text" style="width:30px; float:left; text-align: center" value="<?php echo $comp_alt_phno[1]; ?>" maxlength="3" onkeyup="moveOnMax(this,'caphone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/><span style="float:left; margin-left:3px; margin-right:3px;"> - </span>
		<input id="caphone3" name="caphone3" type="text" style="width:45px; float:left; text-align: center" value="<?php echo $comp_alt_phno[2]; ?>" maxlength="4" onkeyup="moveOnMax(this,'caext')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/>
		 <!--<input name="" type="text" style="width:30px;" value="123"/> - 
		 <input name="" type="text" style="width:45px; text-align: center" value="4567" onclick="this.value=''"/>-->
		</div>
		
		<div class="ext">
		<label>Extension (opt.):</label>
		<input id="caext" name="caext" type="text" style="width:70px;" value="<?php echo $this->details1->comp_alt_extnno; ?>" maxlength="4" />
		<!--<input name="" type="text" style="width:82px;" value="" />-->
		</div>
		<div class="clear"></div>
		</div>
		
		<div class="signup">
		<label>Company Website (optional):</label>
		<input name="website" type="text" style="width:275px;" value="<?php echo $this->details1->comp_website; ?>" />
		<!--<input name="" type="text" style="width:275px;" value="www.website.com"/>-->
		</div>
		
		<div class="signup">
		<label>Upload Your Company Logo (optional)<br />
		(image file must be .jpg, .gif or .png)</label>
	<?php 	$path2= "components/com_camassistant/assets/images/properymanager/";
			if($this->details1->comp_logopath==''){
			$path1='noimage.gif';
			} else {
				$path1=$this->details1->comp_logopath; 
			}
			$image=$path2.$path1;

		    $apath=getimagesize($image);
		  	$height_orig=$apath[1];
			$width_orig=$apath[0];
			$aspect_ratio = (float) $height_orig / $width_orig;
			$thumb_width =100;
			$thumb_height = round($thumb_width * $aspect_ratio);
		  //print_r($thumb_width);
		?>
		<input name="image" type="file" style="width:275px;" value="<?php echo $this->details1->comp_logopath; ?>"/>
		<input type="hidden" name="hidden_image" value="<?php echo $this->details1->comp_logopath; ?>"
		<?php /*?><input name="" type="file" style="width:275px;" value="www.website.com"/><?php */?>
		<br/><br/><?php if ($this->details1->comp_logopath==''){ ?>
		<span><img width="50" height="50" src="components/com_camassistant/assets/images/properymanager/noimage.gif" /></span><?php } else { ?>
		<span><img width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" src="components/com_camassistant/assets/images/properymanager/<?php echo $this->details1->comp_logopath ; ?>" /></span>
		<?php } ?>
		</div>
		
		
<!--<div class="clear"></div>
<div class="form_checkbox">
<div class="check"><input name="" type="checkbox" value="" /></div>
<p style="padding-left:25px; text-align:left;">  Our Company is also interested in providing proposals to Associations looking for Property Management services.</p>
</div>-->

<div class="clear"></div>
<!--<div class="form_checkbox">
<div class="check"><input name="" type="checkbox" value="" /></div>
<p style="padding-left:25px; text-align:left;">Our Company also manages commercial properties.</p>
</div>-->

<div class="clear"></div><br />

<div id="topborder_row" align="center">

<a href="javascript:void(0);" class="save_infodata" onclick="validate2();"></a>
	<input type="hidden" name="id" value="<?php echo $this->details1->id;?>" />
	<input type="hidden" name="option" value="com_camassistant" />
	<input type="hidden" name="controller" value="propertymanager" />
	<input type="hidden" name="task" value="save_edit_companyinfo" />
</div>

<div class="form_checkbox">
<div class="check"></div>
	<div class="checktext">
	<!--<img src="templates/camassistant/images/save.png" name="booknowbtn"   onClick="validate2()"/>-->
	
</div>	
</div>
</form>

</div></div></div>

<div class="clear"></div>

</div>
<?php } ?>
<!-- eof right -->
