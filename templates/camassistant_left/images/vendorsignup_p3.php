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
$statelist = $this->statelist; 
$countylist = $this->county; 
for($i=0;$i<count($countylist);$i++)
{
	$countylistarr[$i]['id'] = $countylist[$i]->id;
	$countylistarr[$i]['county_name'] = $countylist[$i]->county_name;
}
?>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript">

//function to validate user mail id
G = jQuery.noConflict();
function verifyuser(){	
	inputString=G('#email').val();
	//alert(inputString);
		G.post("index2.php?option=com_camassistant&controller=propertymanager&task=verfiryuser", {queryString: ""+inputString+""}, function(data){
		//alert(data);
		if(data==''){
		G('#user-email').css('display','none');
		}else{
	    G('#user-email').html('<font color="#FF0000">Email Already Existed</font>');
		}
		});
	}
var globvariable = '';
function validate_data2()
{
 var frm = document.VendorForm3;
 
 var fup = document.getElementById('image'); 
var fileName = fup.value; 
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	 if(fileName != '')
    {
	 if(ext != 'jpg' && ext != 'gif' && ext != 'jpeg' && ext !='bmp' && ext != 'png' )
	  { 
	  alert("Invalid filename, please select another file");
	  return false;
	  }
	  }

 
 
if(frm.password.value == '')
 {
 alert('Please enter password');
 frm.password.focus();
 return false;
 }
 else if(frm.password2.value == '')
 {
 alert('Please re-enter password');
 frm.password2.focus();
 return false;
 }
 else if(frm.password.value != frm.password2.value)
 {
 alert('Incorrect passwords');
 frm.password2.value = '';
 frm.password2.focus();
 return false;
 }
  else if(frm.tax_id2.value == '' || frm.tax_id3.value == '')
 {
	 alert('Please enter Federal Tax ID Number');
	
	 if(frm.tax_id2.value == '')
	 {
	 frm.tax_id2.value = '';
	 frm.tax_id2.focus();
	 return false;
	 }
	 if(frm.tax_id3.value == '')
	 {
	 frm.tax_id3.value = '';
	 frm.tax_id3.focus();
	 return false;
	 }
 }
  else if(frm.established_year.value == '')
 {
 alert('Please enter established year');
 frm.established_year.focus();
 return false;
 }
 else if(document.getElementById('in_house_vendor').checked == true)
 {
	 if(frm.in_house_parent_company.value == '')
	 {
	 alert('Please enter parent company name');
	 frm.in_house_parent_company.focus();
	 return false;
	 }
	 else if(frm.IH_FED2.value == '' || frm.IH_FED3.value == '')
	 {
		 alert('Please enter parent company Federal Tax ID number');
		
		 if(frm.IH_FED2.value == '')
		 {
		 frm.IH_FED2.value = '';
		 frm.IH_FED2.focus();
		 return false;
		 }
		 else if(frm.IH_FED3.value == '')
		 {
		 frm.IH_FED3.value = '';
		 frm.IH_FED3.focus();
		 return false;
		 }
	 }
  }	
 else if(frm.stateid.value == '0')
 {
 alert('Please Select state');
 frm.stateid.focus();
 return false;
 }
 else if(document.getElementById('county_ID').value == '')
 {
 alert('Please Select County ');
 return false;
 }
 else if(frm.industries.value == '')
 {
 
 alert('Please select industries');
 frm.industries.focus();
 return false;
 }

 return;
}

//Fun. for onchange country to get state//
var site='<?php echo JURI::root();?>';
var path='<?php echo addslashes(JPATH_SITE);?>';
var xhReq = createXMLHttpRequest();
function createXMLHttpRequest() 
{
	try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {}
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {}
	try { return new XMLHttpRequest(); } catch(e) {}
	alert("XMLHttpRequest not supported");
	return null;
}
var xhReq = createXMLHttpRequest();
function getCounty(id,fieldcnt,responseinDiv,hidcountyfieldscnt,countid)
{
	var county_ids = document.getElementsByName('county[]');
	var county_values;
	for (var i = 0; i < county_ids.length; i++)
         {   
		 	 if(county_ids[i].value != '')
			 {
			 if(i == 0)	
		 	 county_values = county_ids[i].value;
			 else
			 county_values = county_values.concat(',').concat(county_ids[i].value);
			 }
         }
	//alert(county_values);
	if(responseinDiv == '') 
	{
		responseinDiv = 'divStates';
	}
	//to make display content Div Dynamic
	globvariable = responseinDiv;
	/*alert(id);
	alert(fieldcnt)*/
	var fieldcntvar = document.getElementById(hidcountyfieldscnt).value;
	if(fieldcnt != '')
	{
		fieldcntvar = parseInt(fieldcntvar)+1;
		document.getElementById(hidcountyfieldscnt).value = fieldcntvar;
	}
	xhReq.open("GET", site+"components/com_camassistant/helpers/common.php?id="+id+"&fieldcnt="+fieldcntvar+"&type=states&path="+path+"&countids="+county_values, true);
	xhReq.onreadystatechange = onSumResult;
	xhReq.send(null);
}
function onSumResult() 
{
	if (xhReq.readyState != 0 && xhReq.readyState != 4)  { return; }
	var serverResponse = xhReq.responseText;
	//alert(serverResponse)
	document.getElementById(globvariable).innerHTML = serverResponse;
	//alert('dfg')
}

//function to get more state fields

function getMoreStateFields(id,fieldcnt)
{ 
	/*
	alert(id);
	alert(fieldcnt)*/
	var fieldcntvar = document.getElementById("statefield_cnt").value;
	if(fieldcnt != '')
	{
		fieldcntvar = parseInt(fieldcntvar)+1;
		document.getElementById("statefield_cnt").value = fieldcntvar;
	}
	xhReq.open("GET", site+"components/com_camassistant/helpers/common.php?id="+id+"&fieldcnt="+fieldcntvar+"&type=morestates&path="+path, true);
	xhReq.onreadystatechange = MoreStateFieldsResult;
	xhReq.send(null);
}
function MoreStateFieldsResult() 
{
	if (xhReq.readyState != 0 && xhReq.readyState != 4)  { return; }
	var serverResponse = xhReq.responseText;
	//alert(serverResponse)
	document.getElementById('morestatesDiv').innerHTML = serverResponse;
	//alert('dfg')
}




// remove the client phone number
function removeSpecificDiv(divid,divname,fieldcount_var)
{
	var d = document.getElementById(divname);	
	var olddiv = document.getElementById(divid);
	d.removeChild(olddiv);
	var num = parseInt(document.getElementById(fieldcount_var).value)-parseInt('1');
	document.getElementById(fieldcount_var).value = num; 
	return ;
}

function moveOnMax(field,nextFieldID){

  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
function industries(){
alert("can");

G(".signup_check").html('<img src="templates/camassistant_left/images/final_loading_promo.gif" />'); 
}

</script>
 <script type="text/javascript">
function closecounty(county){
//alert("can");
G('#countydiv'+county).html('');
}
    </script>
<form enctype="multipart/form-data" action="index.php?option=com_camassistant&amp;controller=vendorsignup&amp;Itemid=145&amp;task=save_signup" method="post" name="VendorForm3" >
<input name="field_cnt" id="field_cnt" type="hidden" value="1"/>
<input name="statefield_cnt" id="statefield_cnt" type="hidden" value="0"/>
<div id="vender_right2">

<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home">Home</li>
<li>Registration Fee</li>
<li>Set Up My Account </li>

</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<div id="dotshead">SET UP MY ACCOUNT</div>
<p>
  <!-- eof dotshead -->
  
  <span class="notice_txt11">Thank you!</span></p>
<p><br />
</p>
<p>Your payment has been approved and a receipt has been emailed to the address you provided.</p>
<p><strong>Please complete the Sign-Up by providing the information below:</strong><br />
  <br />
  <!-- sof table pan -->
</p>
<div class="table_pannel">
  <div class="head_greenbg">COMPANY INFORMATION </div>
  <div id="log_txt">Your Login name is the e-mail address you provided.  Now, please create your password:</div>
<div class="table_panneldiv">
  <div id="container_right_camp1" >
<div style=" width:274px;">
</div>


<div id="signup-form">

	<div class="signup">
		<label><strong>Password:</strong> <span class="redstar">*</span></label>
		<input type="password" style="width:150px;" name="password" />
	</div>

	<div class="signup">
		<label><strong>Confirm Password: </strong> <span class="redstar">*</span></label>
		<input type="password" style="width:150px;" name="password2" />
	</div>

	<div class="signup">
		<label><strong>Company Federal Tax ID Number#: </strong><span class="redstar">*</span></label>
		<!--<input name="tax_id1" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" /> --->
		<input name="tax_id2" type="text" style="width:20px; text-align:center;" value="" maxlength="2" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" /> - 
		<input name="tax_id3" type="text" style="width:61px; text-align:center;" value="" maxlength="7" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" />
	</div>

	<div class="signup">
		<label><strong>Year Your Company Was Established:</strong>  <span class="redstar">*</span></label>
		<input name="established_year" type="text" style="width:275px;"  onclick="this.value='';"/>
	</div>


	<div class="signup">
		<label><strong>Company FAX Number:</strong></label>
		<span class="form_braket">(</span>
<input name="fax_id" id="fax_id" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'fax_id1')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /> 

<span class="form_braket">)</span>
<input name="fax_id1" id="fax_id1" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'fax_id2')"  onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /> - 
<input name="fax_id2" id="fax_id2" type="text" style="width:45px; text-align:center;" value="" maxlength="4"  onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" />
	</div>


	<div class="signup">
	<label><strong>Alternate Phone Number:</strong></label>
	<span class="form_braket">(</span>
<input name="alt_phone1" id="alt_phone1" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'alt_phone2')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');"/>
 <span class="form_braket">)</span>
<input name="alt_phone2" id="alt_phone2" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'alt_phone3')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number');" /> - 
<input name="alt_phone3" id="alt_phone3" type="text" style="width:45px; text-align:center;" value="" maxlength="4" onkeyup="moveOnMax(this,'alt_phone_ext')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
	 Ext.
	 <input name="alt_phone_ext" id="alt_phone_ext" type="text" style="width:45px; text-align:center;" value="" maxlength="4" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
	 </div>

<div class="signup">
<label><strong>Mobile Phone Contact:</strong></label>
<span class="form_braket">(</span>
<input name="phone1" id="phone1" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'phone2')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
 <span class="form_braket">)</span>
<input name="phone2" id="phone2" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeyup="moveOnMax(this,'phone3')" onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/> - 
<input name="phone3" id="phone3" type="text" style="width:45px; text-align:center;" value="" maxlength="4"  onclick="this.value='';" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
 </div>
<div class="signup">
<label><strong>Company Website:</strong></label>
<input name="company_web_url" type="text" style="width:275px;" onclick="this.value='';"  />
</div>

<div class="signup2">
<label><strong>Upload your Company logo:</strong></label><input style="vertical-align:top" type="text" readonly="readonly" class="file_input_textbox" id="image" ><div class="file_input_div2" style="float:left;"><input type="button" class="file_input_button2"><input title="Company Logo" type="file" class="file_input_hidden"  name="hidden_image" onChange="javascript: document.getElementById('image').value = this.value" /></div>
<!--<input name="image" type="file" style="width:275px;" value="Browse..."/> --> <br />
<div style="clear:left">(image file must be a .gif, .jpg, .bmp or .png)</div>
</div>


	<div class="signup_check1">
	  <label><strong>Are you an in-house vendor for a management company?</strong> <span class="redstar">*</span></label>
	  <p style=" padding:0px; margin:0px; padding-bottom:5px;"></p>
	  <div class="clear"></div>
	Yes<input name="in_house_vendor" id="in_house_vendor" type="radio" value="Yes" style="padding:0px; margin:0px; border:0px; width:20px;" onclick="javascript: if(this.checked == true) document.getElementById('show_content').style.display = 'block'; else document.getElementById('show_content').style.display = 'none';"/>
	No<input name="in_house_vendor" id="in_house_vendor" type="radio" value="No" style="padding:0px; margin:0px; border:0px; width:20px;" onclick="javascript: if(document.getElementById('in_house_vendor').checked == false)document.getElementById('show_content').style.display = 'none';" checked="checked" />
	<div class="clear"></div>
	</div>

<!-- parent tax id  starts here -->
	<div style="display: none;" id="show_content">
		<div class="signup">
			<label><strong>Parent Company Name: </strong><span class="redstar">*</span></label>
			<input name="in_house_parent_company" type="text" style="width:275px;" value="Parent Company Name"/>
		</div>
	
		<div class="signup">
			<label><strong>Parent Company Federal Tax ID#:</strong> <span class="redstar">*</span></label>
			<!--<input name="IH_FED1" type="text" style="width:30px; text-align:center;" value="" maxlength="3" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" /> - -->
			<input name="IH_FED2" type="text" style="width:20px; text-align:center;" value="" maxlength="2" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" /> - 
			<input name="IH_FED3" type="text" style="width:61px; text-align:center;" value="" maxlength="7" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " onclick="this.value = '';" />
		</div>
	</div>

<!-- parent tax id ends here -->

<div class="signup">
  <label>In what State are you licensed to do business? <span class="redstar">*</span></label>
 <!-- <select name="select2" id="select2" style=" width:252px;"> -->
 <select style="width:252px;" name="stateid[]" id="stateid" onchange="javascript:getCounty(this.value,'','','field_cnt','');">
<option value="0">Please Select State</option>
<?php  foreach($statelist as $slist) {  ?>
<option value="<?php echo $slist->state_id; ?>"><?php echo $slist->state_name; ?></option>
<?php } ?>
</select>
</div>

<div class="signup">
<label> Specify County/Counties: <span class="redstar">*</span> </label>
<div id="divStates" style="display:block">
  <br />
   <select style="width: 252px;" name="county[]" id="county_ID" >
<option value="">Please Select County</option>
<?php /*?><?php  foreach($countylist as $clist) {  ?>
<option value="document.getElementById('stateid').value<?php echo "_".$clist->id; ?>"> <?php echo $clist->County; ?></option>
<?php } ?><?php */?>
</select>

</div>
<p style="padding-top:15px;"></p><a href="javascript:void(0);" onclick="javascript: getCounty(document.getElementById('stateid').value,'1','','field_cnt',document.getElementById('county_ID').value);" class="orange-links"><img src="templates/camassistant_left/images/addanothercountry.gif" alt="add country"  width="131" height="23" style="padding-top:10px;"/></a>
  <!--<a href="#"><img src="templates/camassistant_left/images/addanothercountry.gif" alt="Continue sign up!" /></a> -->
<div class="clear"></div>
</div>
</div>
  <div class="clear"></div>
</div>
</div>
<!-- eof table pan -->
<br /> 
<div class="lineitem_pan2"><!--<a href="#"><a href="#"><img src="templates/camassistant_left/images/select-my-industries.gif" alt="select My Industries" align="middle" /></a>--> 
<?php echo $this->industries_link; ?><span class="redstar">*</span>
<div class="clear"></div>
<textarea name="industries" id="industries" readonly="yes" style="width:630px; height:45px; font-family:arial; font-size:12px; color:#7D7D7D; border:1px solid #D7D7D7; padding:5px; background:#f7f7f7; border-top: solid 2px #b2b2b2; border-left: solid 2px #b2b2b2; background:#FFF;"></textarea>
</div>
  
<br />
<p style=" padding-bottom:25px;"></p><input type="image" src="templates/camassistant_left/images/save&amp;continue.gif" onclick="javascript: return validate_data2();" alt="Continue sign up!" />
<!--<a href="#"><img src="templates/camassistant_left/images/save&amp;continue.gif"  width="145" height="25" alt="save &amp; Continue" /></a> -->

</div>
</form></div><div class="clear"></div>
<!-- eof container -->