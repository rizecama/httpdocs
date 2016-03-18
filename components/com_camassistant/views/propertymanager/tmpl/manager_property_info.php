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
$user_email = $this->getmanagerpropertyinfo;
//echo '<pre>';print_r($user_email);exit;
?>


<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/jquery1.css" />		
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
H = jQuery.noConflict();
H(document).ready(function(){
H('#location').on('change',function(){
    if(this.checked)
      {
	   H('#address2').val(H('#address1').val());
	   H('#city2').val(H('#city1').val());
	   H('#zipcode2').val(H('#zipcode1').val());
	   H('#pro_stateid').val(H('#stateid').val());
	   county = H('#stateid').val();
	   county_above(county);
	   }
else
{
    H('#address2').val('');
	H('#city2').val('');
	H('#zipcode2').val('');
	H('#pro_stateid').val('');
}	
});
});


function moveOnMax(field,nextFieldID){

  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
function validate_fields()
{
 var frm = document.VendorForm2;
 re = /[0-9]/; 
 if(frm.fname.value == '')
 {
 alert('Please enter your first name');
 frm.fname.focus();
 return;
 }
 else if(frm.lname.value == '')
 {
 alert('Please enter your last name');
 frm.lname.focus();
 return;
 }
  else if(frm.city.value == '')
 {
 alert('Please enter your city');
 frm.city.focus();
 return;
 } 
 else if(frm.state.value == '')
 {
 alert('Please select your state');
 frm.state.focus();
 return;
 } 
 else if(frm.zipcode.value == '')
 {
 alert('Please enter zipcode');
 frm.zipcode.focus();
 return ;
 }
 else if(frm.zipcode.value.length !=5)
 {
 alert('Please enter valid zipcode ');
 frm.zipcode.focus();
 return ;
 }
 else if(frm.password.value == '')
 {
 alert('Please enter password');
 frm.password.focus();
 return;
 }
 else if(frm.password.value.length < '7')
 {
 alert('Please enter password with atleast 7 characters');
 frm.password.focus();
 return false;
 }
else if(!re.test(frm.password.value)) { 
alert("password must contain at least one number (0-9)"); 
frm.password.focus();
return false; 
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
 else if(((isNaN(frm.phone1.value)||frm.phone1.value.indexOf(" ")!=-1)||(frm.phone1.value==''))||((isNaN(frm.phone2.value)||frm.phone2.value.indexOf(" ")!=-1)||(frm.phone2.value==''))||((isNaN(frm.phone3.value)||frm.phone3.value.indexOf(" ")!=-1)||(frm.phone3.value=='')))
 {
 alert('Please enter your phone number');
 frm.phone1.focus();
 return;
 }
 <?php if($user_email->accept == '' ){?>
 else if(frm.property_name1.value == '')
 {
 alert('Please enter property name');
 frm.property_name1.focus();
 return;
 }
 <?php } ?>

 else if(frm.property_street.value == '')
 {
 alert('Please enter property address');
 frm.property_street.focus();
 return;
 }
 else if(frm.property_city.value == '')
 {
 alert('Please enter property city');
 frm.property_city.focus();
 return;
 }
 else if(frm.property_state.value == '')
 {
 alert('Please select property state');
 frm.property_state.focus();
 return;
 }
 else if(frm.divcounty.value == '')
 {
 alert('Please select county');
 frm.divcounty.focus();
 return;
 }
 else if(frm.property_zip.value == '')
 {
 alert('Please enter property zip');
 frm.property_zip.focus();
 return;
 }
 else if(frm.units.value == '')
 {
 alert('Please enter property units');
 frm.units.focus();
 return;
 }

 frm.submit();
}
</script>
<script type="text/javascript">
H = jQuery.noConflict();
function county(){
var state = H("#pro_stateid").val();  
H.post("index2.php?option=com_camassistant&controller=propertymanager&task=ajaxcounty", {State: ""+state+""}, function(data){
if(data.length >0) {
H("#divcounty").html(data);

}
});

}
function county_above(state){

H.post("index2.php?option=com_camassistant&controller=propertymanager&task=ajaxcounty", {State: ""+state+""}, function(data){
if(data.length >0) {
H("#divcounty").html(data);

}
});

}

</script>
<?php //echo "<pre>"; print_r($_REQUEST); ?>


<form enctype="multipart/form-data" method="post" name="VendorForm2"  class="form-validate" autocomplete="off">
<div id="vender_right22">
<?php //echo "<pre>"; print_r($_SESSION); ?>
<?php if ($_REQUEST['email']=='exits') { ?>
<div><ul><li>
<strong><a href="index.php?option=com_user&view=login&Itemid=<?php echo $_REQUEST['Itemid']; ?>" style="color:red;" >Log in</a></strong></li>
<li>
<strong>Go to the " <a href="index.php?option=com_user&view=reset&Itemid=<?php echo $_REQUEST['Itemid']; ?>" style="color:red;" >Forgot my Password</a> " screen, or </strong></li><li><strong>Input a different email address and re-validate.</strong> </li></ul></div>
<?php } ?>

<!-- sof dotshead -->
<?php /*?><div id="dotshead">PAY MY ONE - TIME REGISTRATION AND PRE - SCREENING FEE</div><?php */?>
<!-- eof dotshead -->


<br />
<!-- sof table pan -->
<div class="table_pannel">

<div class="table_panneldiv2">

  <table width="100%" cellspacing="0">
  <tr><td colspan="2" class="heading">
	<div id="i_bar_terms">
<div id="i_bar_txt_terms">
<span> <font style="font-weight:bold; color:#FFF;">PERSONAL INFO </font></span>
</div></div>	
</td>
</tr>
    <tr>
      <td width="24%" height="35" align="left" bgcolor="#ebebeb">First Name:<span class="redstar"> *</span></td>
      <td width="76%" bgcolor="#ebebeb">
	  
         <input type="text" name="fname" id="test1"  value="" />
         
      	
            <?php unset($_SESSION['fname']); ?>	
        </td>
    </tr>
	
    <tr>
      <td width="24%" height="35" align="left" bgcolor="#ebebeb">Last Name:<span class="redstar"> *</span></td>
      <td width="76%" bgcolor="#ebebeb">
	  
         <input type="text" name="lname" id="lname"  value="" />
         
      	
            <?php unset($_SESSION['lname']); ?>	
        </td>
    </tr>
	<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Street Address:</td>
	  <td bgcolor="#ebebeb"> 
	    
          <input type="text" name="streeaddress1" id="address1"  value="<?PHP echo $this->company_address; ?>" />
        

	  </td>
    </tr>
    <tr>
      <td height="35" align="left" bgcolor="#ebebeb">&nbsp;</td>
      <td bgcolor="#ebebeb"> 
	 
          <input type="text" name="streeaddress2" id="address1"  value="<?PHP echo $this->company_addresss; ?>" />
     
	   
	  </td>
    </tr>
    <tr>
      <td height="35" align="left" bgcolor="#ebebeb">City: <span class="redstar">*</span></td>
      <td bgcolor="#ebebeb"> 
	   
          <input type="text" name="city" id="city1"  value="" />
       
	  </td>
    </tr>
   <tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>State: <span class="redstar">*</span></p>
       </td>
<td bgcolor="#ebebeb"><select name="state" style="width:282px;" id="stateid" onchange="javascript:county();" >
<option value="">Please Select State</option>
  <?php 

for ($i=0; $i<count($this->states); $i++){
$states = $this->states[$i];
?>

<option value="<?php echo $states->state_id?>" <?php if($states->state_id==$details->state) echo "selected";?>><?php echo $states->state_name?></option>
<?php } ?>
</select>
</td></tr>

    <tr>
      <td height="35" align="left" bgcolor="#ebebeb">Zip Code: <span class="redstar">*</span></td>
      <td bgcolor="#ebebeb">
	     
          <input type="text" name="zipcode" id="zipcode1" maxlength="5" value="<?PHP echo $this->zipcode; ?>" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/>
        
	</td>
    </tr>
    <tr>
      <td height="35" align="left" bgcolor="#ebebeb"><label id="emailmsg" for="email">
      <p>E-mail Address: <span class="redstar">*</span></p>
      </label><!--onblur="verifyuser();"-->
        <p class="name" >(Your Username)</p></td>
      <td bgcolor="#ebebeb"> <input type="text" name="email" id="email"  readonly="readonly" onblur="verifyuser();"  value="<?php echo $_REQUEST['email'];?>"  class="inputbox required validate-email" /><label id="user-email"></label></td>
    </tr>
	
	<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Alt E-mail: </p>
       </td>
      <td bgcolor="#ebebeb"> <input type="text" name="p_altemail" id="altemail" value="" onblur="verifyuser(this);" /><label id="user-email"></label></td>
    </tr>
	<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Password: <span class="redstar">*</span></td>
<td bgcolor="#ebebeb"><input name="password" type="password" style="width:275px;" class="inputbox required validate-password" value="" onclick="this.value=''" onfocus="this.value=''" />
</td></tr>

<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Confirm Password: <span class="redstar">*</span></td>
<td bgcolor="#ebebeb"><input name="password2" type="password" style="width:275px;" value="" onclick="this.value=''" onfocus="this.value=''"/></td>
</tr>

	
    
	
<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Phone: <span class="redstar">*</span></td>
      <td bgcolor="#ebebeb">
   		 <input name="phone1" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="phone1" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'phone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" >&nbsp;-&nbsp;
		 <input name="phone2" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="phone2" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'phone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">&nbsp;-&nbsp;
		 <input name="phone3" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="phone3" style="width:32px; color:#636363;" maxlength="4"  onkeyup="moveOnMax(this,'phone_ext')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">
        Ext.
          <input name="phone_ext" type="text" id="phone_ext" maxlength="4" value="" style="width:67px;" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /></td>
		 
    </tr>
<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Alt.Phone: </td>
      <td bgcolor="#ebebeb">
   		 <input name="altphone1" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="altphone1" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'altphone2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">&nbsp;-&nbsp;
		 <input name="altphone2" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="altphone2" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'altphone3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">&nbsp;-&nbsp;
		 <input name="altphone3" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="altphone3" style="width:32px; color:#636363;" maxlength="4"  onkeyup="moveOnMax(this,'altphone_ext')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">
        Ext.
          <input name="altphone_ext" type="text" id="altphone_ext" maxlength="4" value="" style="width:67px;" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/></td>
		 
    </tr>
	
<tr>
      <td height="35" align="left" bgcolor="#ebebeb">Fax Number: </td>
      <td bgcolor="#ebebeb">
   		 <input name="fax_1" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="fax_1" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'fax_2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" >&nbsp;-&nbsp;
		 <input name="fax_2" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="fax_2" style="width:25px; color:#636363;" maxlength="3" onkeyup="moveOnMax(this,'fax_3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');">&nbsp;-&nbsp;
		 <input name="fax_3" type="text" value="" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="fax_3" style="width:32px; color:#636363;" maxlength="4" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" >
        </td>
		 
    </tr>
	<?php 
	$details = $this->getmanagerpropertyinfo;
	$user = $details->user_id;
   //echo '<pre>'; print_r($details);exit;
	$propertyname =str_replace('_',' ', $details->propertyname);
	$managername = $details->managerfirst.$details->managerlast;
	
	?>
	
	<tr><td colspan="2" class="heading">
	<div id="i_bar_terms">
<div id="i_bar_txt_terms">
<span> <font style="font-weight:bold; color:#FFF;">PROPERTY INFO </font></span>
</div></div>	
</td>
</tr>
		<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Property Name: <span class="redstar">*</span></p>
       </td>
  <td bgcolor="#ebebeb"><input  name="property_name1" type="text" style="width:275px;" value=""  /></td>
    </tr>
	
	
<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Title: <span class="redstar">*</span></p>
       </td>
	   
<td bgcolor="#ebebeb"><select name="property_state1"  style="width:282px;" id="stateid"  >
<option value="Owner" >Owner</option>
<option value="President" >President</option>
<option value="Vice President" >Vice President</option>
<option value="Treasurer" >Treasurer</option>
<option value="Secretary" > Secretary</option>
<option value="Director" >Director</option>
</select>
</td>

<tr>
  <td bgcolor="#ebebeb"></td>
<td bgcolor="#ebebeb"><input type="checkbox"  id="location"> <span class="same">Same as above</span></td></tr>

<tr>	
    <tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Property Address: <span class="redstar">*</span></p>
       </td>
      <td bgcolor="#ebebeb"><input name="property_street" type="text" id ="address2" style="width:275px;" value=""/></td>
    </tr>
	
	<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>City: <span class="redstar">*</span></p>
       </td>
      <td bgcolor="#ebebeb"><input name="property_city" type="text" id="city2" style="width:275px;" value="" /></td>
    </tr>
<tr>
      
	<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>State: <span class="redstar">*</span></p>
       </td>
<td bgcolor="#ebebeb"><select name="property_state" style="width:282px;" id="pro_stateid" onchange="javascript:county();" >
<option value="">Please Select State</option>
  <?php 

for ($i=0; $i<count($this->states); $i++){
$states = $this->states[$i];
?>

<option value="<?php echo $states->state_id?>" ><?php echo $states->state_name?></option>
<?php } ?>
</select>

</td></tr>
<tr>
     <td height="35" align="left" bgcolor="#ebebeb"><p>Select County: <span class="redstar">*</span></p>
       </td>

<td bgcolor="#ebebeb"><select style="width: 282px;" name="divcounty" id="divcounty" >
<option value="">Please Select County</option>
</select></td></tr>


<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Zip Code: <span class="redstar">*</span></p> </td><td bgcolor="#ebebeb">
	  
<input name="property_zip" type="text" style="width:275px;" id="zipcode2" value="" maxlength="5" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/>
</td>
</tr>
<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Time zone: <span class="redstar">*</span></p> </td><td bgcolor="#ebebeb">

<select style="width: 340px;" name="timezone" id="timezone" >
<option <?php if( $details->timezone == 'eat'){ echo "selected='selected'"; } ?> value="est">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
<option <?php if( $details->timezone == 'cen'){ echo "selected='selected'"; } ?> value="cen">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
<option <?php if( $details->timezone == 'mou'){ echo "selected='selected'"; } ?> value="mou">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
<option <?php if( $details->timezone == 'pac'){ echo "selected='selected'"; } ?> value="pac">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
<option <?php if( $details->timezone == 'ala'){ echo "selected='selected'"; } ?> value="ala">(GMT -9:00) Alaska</option>
<option <?php if( $details->timezone == 'haw'){ echo "selected='selected'"; } ?> value="haw">(GMT -10:00) Hawaii</option>
</select>
</td>
</tr>
<tr>
  <td bgcolor="#ebebeb"></td>
<td bgcolor="#ebebeb"><input type="checkbox" checked="checked" value="loc" name="location" id="location"> <span class="same">Location observes Daylight Savings</span> </td></tr>

<tr>
      <td height="35" align="left" bgcolor="#ebebeb"><p>No. of Units: <span class="redstar">*</span></p> </td><td bgcolor="#ebebeb">


<input id="units" name="units" type="text" style="width:100px;" value="<?php echo $details->units; ?>" onblur="unitsno()"/>
</td></tr>
<!--<tr>
    <?php if($details->accept=='no' || $details->accept=='yes') {?>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Property Manager: </p>
       </td>
	   
      <td bgcolor="#ebebeb"><input name="property_managername" type="text" style="width:275px;" value="<?php  echo $managername ; ?>" disabled="disabled" /></td><?php }?>
	  </tr>
<tr>
    <?php if($details->accept=='no' || $details->accept=='yes') {?>
      <td height="35" align="left" bgcolor="#ebebeb"><p>Property Management Company: </p>
       </td>
	   
      <td bgcolor="#ebebeb"><input name="propertymanagement_firm" type="text" style="width:275px;" value="<?php  echo $details->managercompanyname ; ?>" disabled="disabled" /></td><?php }?>
	  </tr>-->
	  

	  
  </table>
  <div class="clear"></div>
</div>
</div>

<tr>
<td colspan="3" align="left" valign="top">
<div class="contin-btn" >
<a onclick="javascript: return validate_fields();" class="propertyowner_registerfinal"></a>

</div>    </td>
    </tr>
</table>

</div>
<input type="hidden" name="option" value="com_camassistant" />
<input type="hidden" name="controller" value="propertymanager" />
<input type="hidden" name="property_id" value="<?php echo $details->property_name; ?> " />
<input type="hidden" name="boardposition" value="<?php echo $details->board_position; ?> " />
<input type="hidden" name="property_name" value="<?php echo $details->propertyname; ?> " />
<input type="hidden" name="property_manager_id" value="<?php echo $user ; ?> " />
<input type="hidden" name="accept" value="<?php echo $details->accept ; ?> " />
<input type="hidden" name="task" value="save_propertyowner_info" /> 
<input type="hidden" name="Itemid" value="140" /> 

</form>

<!-- eof container -->
