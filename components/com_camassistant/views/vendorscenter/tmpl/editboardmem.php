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
// Your custom code here
$details = $this->managerproperty;
//$prop = $this->propertyList;
//echo '<pre>';print_r($details);exit;
$db=&JFactory::getDBO();
$useremail = "SELECT id from #__users where username='".$details->email."' AND user_type=16";
$db->Setquery( $useremail );
$useremail = $db->loadResult();
$pid = JRequest::getVar('id','');

$bid = JRequest::getVar('bid',''); 
$account = JRequest::getVar('account',''); 
$phone = explode('-',$details->phone);
$altphone = explode('-',$details->altphone);
$fax = explode('-',$details->fax); 
$Itemid = JRequest::getVar('Itemid',''); 
?>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<style>

#maskcbd {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescbd .windowcbd {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescbd #submitcbd {width:556px;height:294px;padding:10px;background-color:#ffffff;}
#boxescbd #submitcbd a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;display:inline-block;}
#donecbd {border:0 none;cursor:pointer;height:30px;margin-right:150px;padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecbd {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}

.closeicons_popup {
  top: -31px !important;
  right:-22px !important;
}
#maskcbde {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescbde .windowcbde {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescbde #submitcbde {width:557px;height:204px;padding:10px;background-color:#ffffff;}
#boxescbde #submitcbde a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}
#donecbde {border:0 none;cursor:pointer;height:30px;margin-right:150px;padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecbde {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}

#maskvrecdoneee {  position:absolute;  left:0;  top:0;  z-index:9000;  background-color:#000;  display:none; }
#boxesvrecdoneee .windowvrecdoneee {  position:absolute;  left:0;  top:0;  width:1300px;  height:200px;  display:none;  z-index:9999;  padding:38px 10px 3px 10px;}
#boxesvrecdoneee #submitvrecdoneee {  width:515px;  height:215px;  padding:10px;  background-color:#ffffff;}
#boxesvrecdoneee #submitvrecdoneee a{ text-decoration:none; color:#000000; font-weight:bold; font-size:20px;}
#donevrecdoneee {border:0 none; cursor:pointer; height:30px; margin-left:-17px; margin-top:-29px; width:474px; float:left; }

#maskeb {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxeseb .windoweb {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#submiteb > p {padding-top: 7px;text-align: center;font-size:14px;}
#boxeseb #submiteb {width:467px;height:178px;padding:15px 13px 13px;background-color:#ffffff;}
#boxeseb #submiteb a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;
}
</style>
<script type="text/javascript">
G = jQuery.noConflict();
G(document).ready(function () {
G('.closeicons_popup').click(function (e) {

			e.preventDefault();
		    G('#maskcbde').hide();
			G('.windowcbde').hide();
		});
		
G('#firstname').keyup(function(){
if( G(this).val() == '' )
		G( this ).prev().addClass( 'active' );
		else
		G( this ).prev().removeClass( 'active' );
		
});
G('#lastname').keyup(function(){
if( G(this).val() == '' )
		G( this ).prev().addClass( 'active' );
		else
		G( this ).prev().removeClass( 'active' );
		
});
G('#email').keyup(function(){
if( G(this).val() == '' )
		G( this ).prev().addClass( 'active' );
		else
		G( this ).prev().removeClass( 'active' );
		
});

G('.geterrorpopup').click(function()
{
G('body,html').animate({
scrollTop: 250
},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskeb').css({'width':maskWidth,'height':maskHeight});
		G('#maskeb').fadeIn(100);
		G('#maskeb').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submiteb").css('top',  winH/2-G("#submiteb").height()/2);
		G("#submiteb").css('left', winW/2-G("#submiteb").width()/2);
		G("#submiteb").fadeIn(2000);
		
		G('.windoweb #closeeb').click(function (e) {
		e.preventDefault();
		G('#maskeb').hide();
		G('.windoweb').hide();
		});
});
});


</script>
<script type="text/javascript">
G = jQuery.noConflict();
function verifyuser(uname){	
	
var frm = document.VendorForm2;
	inputString=G('#email').val();
	inputString1=G('#property_name').val();
/*alert(uname);
alert(inputString);*/
if(uname!=inputString)
{
		G.post("index2.php?option=com_camassistant&controller=boardmembers&task=verfiryuser", {queryString: ""+inputString+"",queryString1: ""+inputString1+""},function(data){
		//alert(data);
		if(data==''){
		G('#user_email').css('display','none');
		G('#user_email').val('');
		}else{
	    G('#user_email').css('display','block');
		G('#user_email').val('This client name has already been assigned to this property');
		 /*alert('Please enter your email ID');
 		frm.email.focus();
  		return ;*/
		}
		});
	}		
	return;		
	}
function validate_data2(e)
{
e.preventDefault();
 var frm = document.VendorForm2;

  if(frm.property_name.value == '')
 {
 alert('Please Select Property');
 frm.property_name.focus();
 return false;
 } else if(frm.property_name.value == 'Select Propety')
 {
 alert('Please Select Property');
 frm.property_name.focus();
 return false;
 } else if(frm.firstname.value == '')
 {
 alert('Please enter your first name');
 frm.firstname.focus();
 return false;
 }  
 else if(frm.lastname.value == '')
 {
 alert('Please enter your last name');
 frm.lastname.focus();
 return false;
 }
 else if(frm.email.value !== '')
 {
 
var emails= frm.email.value;
G.post("index2.php?option=com_camassistant&controller=vendorscenter&task=checktoallemails", {mailid: ""+emails+""}, function(data){
		if(data == 1){
		alert("already email exists");
		return false;
		}
		else
		{
		
//		form.submit();
		 document.getElementById('VendorForm2').submit();
		}
 });
 } 
 else if(frm.email.value == '')
 {
 alert('Please enter your email ID');
 frm.email.focus();
 return false;
 }
 var mail=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
 if(mail.test(frm.email.value)==false)
 {
 alert("Please enter the valid email");
frm.email.focus();
 return false;
 } else if(frm.user_email.value != '')
 {
 alert(frm.user_email.value);
 frm.email.focus();
  return false;
 }
 
	 
 return;
}
 function moveOnMax(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
function cancel()
{
window.location="index.php?option=com_camassistant&controller=boardmembers&task=listboardmembers&Itemid=151";
}
function invite_vendor()
{

var propertyid = '<?php echo $pid;?>';
var bid = '<?php echo $bid;?>';
window.location="index.php?option=com_camassistant&controller=vendorscenter&task=invitationtoregister& bid="+bid+"&pid="+propertyid+"&Itemid=216";
}
function invite_link()
{
	property_id = G('select#property_name option:selected').val();
	var pid = '<?php echo $pid;?>';
	var bid = '<?php echo $bid;?>';
	G.post("index2.php?option=com_camassistant&controller=vendorscenter&task=checkpropertylink", {property_id: ""+property_id+""}, function(data){
		if(data == 1){
		alert("Alerady This Property Linked");
		return false;
		}
		else
		{
		/*
		
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=invitationpopup&pid='+property_id;
	var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 600, y:370}}"))
	SqueezeBox.fromElement(el,options);
*/
G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskcbd').css({'width':maskWidth,'height':maskHeight});
		G('#maskcbd').fadeIn(100);
		G('#maskcbd').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitcbd").css('top',  winH/2-G("#submitcbd").height()/2);
		G("#submitcbd").css('left', winW/2-G("#submitcbd").width()/2);
		G("#submitcbd").fadeIn(2000);
		G('.findnoclient').click(function (e) {
		e.preventDefault();
		G('#maskcbd').hide();
		G('.windowcbd').hide();
       /* el="<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=findnoclient";
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:300}}"))
		SqueezeBox.fromElement(el,options);*/
		getclientfindpopup(pid,bid);
		});
		G('.cancelnoclient').click(function (e) {
		e.preventDefault();
		G('#maskcbd').hide();
		G('.windowcbd').hide();
	});
	G('.invitenoclient').click(function (e) {
		var propertyid = '<?php echo $pid;?>';
        var bid = '<?php echo $bid;?>';
        window.location="index.php?option=com_camassistant&controller=vendorscenter&task=invitationtoregister& bid="+bid+"&pid="+propertyid+"&Itemid=216";

	});
	

}
});	

}


		
function getclientfindpopup(pid,bid)
{
G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskcbde').css({'width':maskWidth,'height':maskHeight});
		G('#maskcbde').fadeIn(100);
		G('#maskcbde').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitcbde").css('top',  winH/2-G("#submitcbde").height()/2);
		G("#submitcbde").css('left', winW/2-G("#submitcbde").width()/2);
		G("#submitcbde").fadeIn(2000);
		G('.check_email').click(function (e) {
		var email=G("#email11").val();
		
		if(!email)
		{
		alert("please enter email");
		form.email.focus();
		return false;
		 }
		if(email)
		{
		G.post("index2.php?option=com_camassistant&controller=vendorscenter&task=checkpropertyowneraccount", {mailid: ""+email+""}, function(data){
				if(data == 1){
			   e.preventDefault();
		       G('#maskcbde').hide();
		       G('.windowcbde').hide();
				acountclientpopup(pid,bid,email);
				
				}
				else
				{
				e.preventDefault();
		       G('#maskcbde').hide();
		       G('.windowcbde').hide();
		       noacountclientpopup(email,pid,bid);
				}
		});
		} 
		});
}

function acountclientpopup(pid,bid,email)
{

el="<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=findnoclient&pid="+pid+"&bid="+bid+"&email="+email+"";
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 580, y:330}}"))
		SqueezeBox.fromElement(el,options);
}

function noacountclientpopup(email,pid,bid)
{
	
H = jQuery.noConflict();
	H('body,html').animate({
	scrollTop: 250
	},800);
	var maskHeight = 1500;
	H('.pmanageremail').val(email);
	var maskWidth = H(window).width();
	H('#maskvrecdoneee').css({'width':maskWidth,'height':maskHeight});
	H('#maskvrecdoneee').fadeIn(100);
	H('#maskvrecdoneee').fadeTo("slow",0.8);
	var winH = H(window).height();
	var winW = H(window).width();
	H("#submitvrecdoneee").css('top',  winH/2-H("#submitvrecdoneee").height()/2);
	H("#submitvrecdoneee").css('left', winW/2-H("#submitvrecdoneee").width()/2);
	
	H("#submitvrecdoneee").fadeIn(2000);
	H('.gobacknoclientpopup').click(function (e) {
	  e.preventDefault();
		H('#maskvrecdoneee').hide();
		H('.windowvrecdoneee').hide();
		getclientfindpopup(pid,bid);
	});
	H('.invitetoclientemail').click(function (e) {
	window.location.href = "index.php?option=com_camassistant&controller=vendorscenter&task=sendnewproownerinvitation&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid="+pid+"&email="+email+"";
	});
}




</script>


<div class="acount_status">
<div class="ttl1">Account Status</div>
<div class="newtopborder1"></div>
<div class="property_linkask">
<div class="client_linkask">
<?php if($useremail) { ?>
<label><a><img src="templates/camassistant_left/images/active_client.png"></a>  </label>
<strong><span>This Client has an account</span></strong>
<?php } else {?>
<label><a href="javascript:void(0)" onclick="invite_vendor()"><img src="templates/camassistant_left/images/account_status.jpg"></a>  </label>
<strong><span>Click above to ask this Client to create an account</span></strong>

<?php } ?>
</div>
<div class="new_linkask">
<label><a href="javascript:void(0)" onclick="invite_link()"><img src="templates/camassistant_left/images/link_staus.jpg"></a> </label>
<strong><span>Click above to Link with your Client's account</span></strong>
</div>
</div>
 </div>
<div id="container_inner">
<div  style="margin-top:20px;"><br/>
 <div class="ttl1">Client Information</div>
 <div class="newtopborder1"></div>
</div>
<div class="clear"></div>
<?php //echo "<pre>"; print_r($this->details); ?>
<form enctype="multipart/form-data"  method="post" name="VendorForm2" id="VendorForm2">
<div id="signup-form">

<div class="signup">
<label  class="edit_propertyadd" style="margin-top:-5px;">Property:</label>
<span id="prop_list">
<select name="property_name"  id="property_name" disabled="disabled">
<option value="">Select Property</option>
  <?php
  for ($m=0; $m<count($this->propertyList); $m++){
$mans = $this->propertyList[$m];
//echo $mans;
if($mans->value == $pid)
	$selected = 'selected="selected"';
	else
	$selected = '';
?>
<option <?php echo $selected; ?>  value="<?php echo $mans->value; ?>" ><?php echo str_replace('_',' ', $mans->text) ;?></option>
<?php } ?>
</select>
</span>
</div>
<div class="signup">
<label>Title:</label>
<select name="board_position" >
<option value="Owner" <?PHP if($details->board_position == 'Owner'){?> selected="selected" <?PHP } ?>>Owner</option>
<option value="President" <?PHP if($details->board_position == 'President'){?> selected="selected" <?PHP } ?>>President</option>
<option value="Vice President" <?PHP if($details->board_position == 'Vice President') {?> selected="selected" <?PHP } ?>>Vice President</option>
<option value="Treasurer" <?PHP if($details->board_position == 'Treasurer') { ?> selected="selected" <?PHP } ?>>Treasurer</option>
<option value="Secretary" <?PHP if($details->board_position == 'Secretary') { ?> selected="selected" <?PHP } ?>>Secretary</option>
<option value="Director" <?PHP if($details->board_position == 'Director') { ?> selected="selected" <?PHP } ?>>Director</option>

</select>
</div>
<div class="signup">
<label>Salutation:</label>
<select name="salutation">
<option <?PHP if($details->salutation == 'Mr.'){?> selected="selected" <?PHP } ?>>Mr.</option>
<option <?PHP if($details->salutation == 'Mrs.') {?> selected="selected" <?PHP } ?>>Mrs.</option>
<option <?PHP if($details->salutation == 'Ms.') { ?> selected="selected" <?PHP } ?>>Ms.</option>
</select>
</div>

<div class="signup col_2">
<div class="state">
<label class="edit_firstnameadd">First Name: </label>
<input name="firstname" type="text" id="firstname" value="<?PHP echo $details->firstname?>"/>
</div>
<div class="zip">
<label class="edit_lastnameadd">Last Name:</label>
<input id="lastname"   type="text" name="lastname"  value="<?PHP echo $details->lastname?>"/>
</div>
</div>
<div class="signup">
<label>Street Address:  </label>
<input name="streeaddress" type="text"  value="<?PHP echo $details->streeaddress?>"/>
</div>
<div class="signup col_2">
<div class="state">
<label>State: </label>
<select name="state"  id="stateid" onchange="javascript:county();" >
<option value="">Please Select State</option>
  <?php 

for ($i=0; $i<count($this->states); $i++){
$states = $this->states[$i];
?>

<option value="<?php echo $states->state_id?>" <?php if($states->state_id== $details->state) echo "selected";?>><?php echo $states->state_name?></option>
<?php } ?>
</select>
</div>
<div class="zip">
<label>Zip Code:</label>
<input name="zipcode" type="text" maxlength="5"  value="<?PHP echo $details->zipcode?>"/>
</div>
</div>

<div class="signup">
<label class="edit_propertyadd">Email: </label>

<input name="email" type="text" id="email"  value="<?PHP echo $details->email ?>" onkeydown="if((this.value)!='<?php echo $this->details->email ?>'){ javascript: verifyuser('<?php echo $this->details->email ?>');}" onmousedown="if((this.value)!='<?php echo $this->details->email ?>'){ javascript: verifyuser('<?php echo $this->details->email ?>');}" onblur="if((this.value)!='<?php echo $this->details->email ?>'){ javascript: verifyuser('<?php echo $this->details->email ?>');}"/>
<input style="color:#FF0000;display:none; background:#ffffff; border-color:#ffffff; padding-top:22px;" type="hidden" name="user_email" id="user_email" value="" readonly=""/>

</div>
<div class="signup">
<label>Alt. Email:  </label>

<input name="altemail" type="text" id="altemail" value="<?PHP echo $details->altemail ?>" />

</div>

<div class="signup">
<div class="cp">
<label>Phone: </label>
<input id="phone_1" class="sm-input" name="phone_1" type="text" value="<?PHP echo $phone[0]; ?>" maxLength="3" onkeyup="moveOnMax(this,'phone_2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " />
 <input id="phone_2" class="sm-input" name="phone_2" type="text"  value="<?PHP echo $phone[1]; ?>" maxLength="3"  onkeyup="moveOnMax(this,'phone_3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/> - 
 <input id="phone_3" name="phone_3" class="sm-input" type="text"  value="<?PHP echo $phone[2]; ?>" maxLength="4" onkeyup="moveOnMax(this,'')"  onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
</div>

<div class="ext">
<label>Ext:</label>
<input name="extension" type="text" class="sm-input" maxlength="4" value="<?PHP echo $details->extension ?>"  onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " /></div>
<div class="clear"></div>
</div>																			
<div class="signup">
<div class="cp">
<label>Alt. Phone: </label>
<input id="altphone_1" name="altphone_1" type="text" class="sm-input" value="<?PHP echo $altphone[0]; ?>" maxLength="3" onkeyup="moveOnMax(this,'altphone_2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " />
 <input id="altphone_2" name="altphone_2" type="text"  class="sm-input" value="<?PHP echo $altphone[1]; ?>" maxLength="3"  onkeyup="moveOnMax(this,'altphone_3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/> - 
 <input id="altphone_3" name="altphone_3" type="text" class="sm-input" value="<?PHP echo $altphone[2]; ?>" maxLength="4" onkeyup="moveOnMax(this,'')"  onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
</div>

<div class="ext">
<label>Ext:</label>
<input name="altextension" type="text" maxlength="4" class="sm-input"  value="<?PHP echo $details->altextension ?>"  onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " /></div>
<div class="clear"></div>
</div>																			
<div class="signup">

<label>Fax:</label>
<input id="fax_1" name="fax_1" type="text" class="sm-input" value="<?PHP echo $fax[0]; ?>" maxLength="3" onkeyup="moveOnMax(this,'fax_2')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); " />
 <input id="fax_2" name="fax_2" type="text"  class="sm-input" value="<?PHP echo $fax[1]; ?>" maxLength="3"  onkeyup="moveOnMax(this,'fax_3')" onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/> - 
 <input id="fax_3" name="fax_3" type="text"  class="sm-input" value="<?PHP echo $fax[2]; ?>" maxLength="4" onkeyup="moveOnMax(this,'')"  onkeydown="if(isNaN(this.value)) alert('Please enter valid number'); "/>
</div>


<div class="clear"></div>
<div class="client_permissions">
<div class="inner_client-heading">
        <div class="ttl1">Client Permissions</div>
		<div class="newtopborderper"></div>
      </div><!-- inner_client-heading -->
 
          <div class="client_permission_block">
            <div><strong>Copied on Vendor proposals?</strong></div>
            <div>When you end a request, your client will receive an automatic email notification with a link to download a copy of the proposal report, which will contain every Vendor's submitted proposal.</div>
            <div><input type="radio" name="radio1" class="geterrorpopup" onclick="return false;"> <label>Yes</label> 
            <input type="radio" name="radio1" checked="checked" > <label>No</label></div>
          </div><br/><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Access to "My Vendor" list?</strong></div>
            <div>Your client will have "read-only" access to your "My Vendors" list or "Corporate Preferred Vendors" list (Master Account holders only). This allows them the ability to view contact information, compliance statuses, and more.  Note:  They will not be able to remove, add, or edit your list.</div>
            <div><input type="radio" name="radio2" class="geterrorpopup" onclick="return false;"> <label>Yes</label> 
            <input type="radio" name="radio2" checked="checked"> <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Ability to invite Vendors to requests?</strong></div>
            <div>Your Client will be able to invite Vendors to participate in requests that you submitted for this property only.  Note: They will not be able to uninvite vendors, send reminders, or end bidding.</div>
            <div><input type="radio" name="radio3" class="geterrorpopup"  onclick="return false;"> <label>Yes</label> 
            <input type="radio" name="radio3" checked="checked"> <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Requires approval before submitting requests?</strong></div>
            <div>Your Client will be required to approve the submission of a request before it is delivered to Vendors. If a project is not approved, the Client will be able to submit feedback so your request may be revised and then resubmitted for approval.</div>
            <div><input type="radio" name="radio4" class="geterrorpopup" onclick="return false;"> <label>Yes</label> 
            <input type="radio" name="radio4" checked="checked"> <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Requires approval before awarding requests?</strong></div>
            <div>Your Client will be required to approve the awarding of a request to a Vendor before notifications are delivered to all participating Vendors.  If an award is not approved, the Client will be able to submit feedback so the awarding may be revised and then resubmitted for approval.</div>
            <div><input type="radio" name="radio5" class="geterrorpopup" onclick="return false;"> <label>Yes</label> 
            <input type="radio" name="radio5" checked="checked" > <label>No</label></div><br/>
          </div><!-- client_permission_block -->
  

<div align="right" id="topborder_row1"></div>
<div>
<input type="hidden" name="user_id" value="<?PHP  echo $this->user_id; ?>" />
<a  href="javascript:void(0)" class="manager_cancel" onclick="cancel()"></a>
<a  href="javascript:void(0)" class="manager_submit" onclick="javascript: return validate_data2(event);"></a>
 </div>
</div>




<div class="clear"></div>
</div>
<input type="hidden" value="com_camassistant" name="option" />
<input type="hidden" value="vendorscenter" name="controller" />
<input type="hidden" value="editpropertyinfo" name="task" />
<input type="hidden" name="bid" value="<?PHP echo $bid; ?>"  />
<input type="hidden" class="invitation" name="invitation"  />
<input type="hidden" name="propertyid" value="<?PHP echo $pid; ?>"  />

</form>
</div> 
<div class="clear"></div>
</div>
<div id="boxescbd" style="top:576px; left:582px;">
<div id="submitcbd" class="windowcbd" style="top:300px; left:582px; border:6px solid rgb(143, 216, 0); position:fixed">
<div id="i_bar_terms"  style="margin: 8px; background:#77b800; ">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:800; color:#FFF;">LINK WITH YOUR CLIENT</font></span>
</div></div>
<div style="padding: 19px 15px 2px 18px; text-align:center; font-size:15px; font-weight:normal; color:#4d4d4d;  margin: 0 auto 27px; max-width: 496px;width:100%;" >
According to the Email Address you have listed for this client, our records show they are <strong>not</strong> currently registered with MyVendorCenter. You may click the INVITE button to send them a personal invitation to create a free account or click FIND to try and locate them under different email address
</div>
<div id="noclienttopborder"></div>

<div style="margin-top:38px; text-align:center; padding-right:17px; margin-left:34px;">
<table><tr>
<td>
<a class="cancelnoclient" href="javascript:void(0)"></a>
<a class="findnoclient" href="javascript:void(0)"></a>
<a class="invitenoclient" href="javascript:void(0)"></a>
</td></tr>
</table>
</div>
</div>
  <div id="maskcbd"></div>
</div>

<div id="boxescbde" style="top:576px; left:582px;">
<div id="submitcbde" class="windowcbde" style="top:300px; left:582px; border:6px solid #a1a1a1; position:fixed">
<a id="sbox-btn-close" href="#" class="closeicons_popup" style="right:-32px; top:-20px;"></a>
<div id="i_bar_terms"  style="margin: 8px; background:#a1a1a1; ">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">FIND YOUR CLIENT</font></span>
</div></div>
<div style="padding: 19px 15px 2px 18px; text-align:center; font-size:15px; font-weight:normal; color:#4d4d4d;" >To see if your Client is registered, please enter the primary email address associated with your Client's MYVendorCenter (Property Owner) Account
</div>
<div class="buttons_uninvite"  style="max-width: 365px; width: 100%; overflow: auto; margin: 10px auto 0px;">
<form action=""  method="post" name="reg_form" id='reg_form' enctype="multipart/form-data" style="padding:0; margin:0;">
<div class="check_clientemail">

<input type ="text" name ="email" id= "email11" id="email" />
<input type="hidden" name="option" value="com_camassistant" />
     </div>
		

</form>
<input type ="submit" class="check_email" value="ENTER" >
</div>

<div style="padding-top:20px; text-align:center; padding-right:17px;">

</div>
</div>
  <div id="maskcbde"></div>
</div>

<div id="boxesvrecdoneee" class="boxesvrecdoneee">
<div id="submitvrecdoneee" class="windowvrecdoneee" style="top:300px; left:60px; border:6px solid red; position:fixed;">
<div id="i_bar_terms"  style="background:#ff0000; margin-bottom:26px; margin-top:9px;">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:800; color:#FFF;">ERROR</font></span>
</div></div>
<p align="center" style="color:#4d4d4d; font-size:14px;margin: 0 auto; max-width: 456px;width: 100%;">The Email you entered is not associated with any existing Property Owner account. You can click INVITE to ask your client to join or click BACK to try again.</p>
<div class="noclienterror">
 <div class="gobacknoclientpopup"></div>
<div class="invitetoclientemail"></div>
</div>
</div>
		
<div id="maskvrecdoneee"></div>
</div>


<div id="boxeseb" style="top:576px; left:582px;">
<div id="submiteb" class="windoweb" style="top:300px; left:582px; border:6px solid red; position:fixed">
<div id="i_bar_terms" style="background:none repeat scroll 0 0 red;">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">ERROR</font></span>
</div></div>

<div class="clientper_text"><font color="gray"> Your Client must be registered with MyVendorCenter and LINKED with one of your properties before you can change Client Permissions.</font>
</div>
<div style="text-align:center; width:250px; margin-left:170px; padding-top:24px;">

<div id="closeeb" name="closeeb" value="Cancel" class="client_linkedno"></div>

</div>
</div>
  <div id="maskeb"></div>
</div>

