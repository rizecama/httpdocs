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
if($filename)
{
	$path2 = $siteURL."components/com_camassistant/assets/images/property_pictures/";
		$path1 = $filename;
		$image = $path2.$path1;	
		$image = str_replace(' ','%20',$image);
		$apath= getimagesize($image);
		$height_orig=$apath[1];
		$width_orig=$apath[0];
		$aspect_ratio = (float) $height_orig / $width_orig;
		$thumb_width =438;
		$thumb_height = round($thumb_width * $aspect_ratio) ;
		if($thumb_height == 0){
		$thumb_height = '307';
		}		
		//$image = "<img  width=".$thumb_width." height=".$thumb_height." src='components/com_camassistant/assets/images/property_pictures/".$filename."'>";
		}	
else{
$image = '<div style="margin-left: 2px;"><div style="margin-top:-10px; display:table-cell; text-align:center; vertical-align:middle; width:226px; height:226px; box-shadow:1px 1px 2px 1px #808080;"><a class="uploadimagetext" href="javascript:void(0);" onclick="getpopuppics('. $rfpinfo->property_id .');" >UPLOAD PROPERTY IMAGE</a></div></div>';
}		
$Itemid = JRequest::getVar('Itemid',''); 
?>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
G = jQuery.noConflict();
function validate_data2()
{
var frm = document.property_edit;
if(frm.property_name.value == '')
    {
    alert('Please enter property name');
    frm.property_name.focus();
    return ;
    }
    else if(frm.ein1.value == '')
    {
    alert('Please enter ein number');
    frm.ein1.focus();
    return ;
    }
	else if(frm.ein2.value == '')
    {
    alert('Please enter ein number');
    frm.ein2.focus();
    return ;
    }
    else if(frm.board_position.value == '')
    {
    alert('Please select your relation ship');
    frm.board_position.focus();
    return ;
    }
    else if(frm.streeaddress.value == '')
    {
    alert('Please enter property address');
    frm.streeaddress.focus();
    return ;
    }
    else if(frm.state.value == '0'||frm.state.value == '')
    {

    alert('Please select state');
    frm.state.focus();
    return ;
    }
    else if(frm.zipcode.value == '')
    {
    alert('Please enter zipcode');
    frm.zipcode.focus();
    return ;
    }
    
    else if(frm.divcounty.value == '0'||frm.divcounty.value == '')
    {

    alert('Please select County');
    frm.divcounty.focus();
    return ;
    }
    
	else{
	frm.submit();
	}
}
function county(){
var state = G("#stateid").val();
G.post("index2.php?option=com_camassistant&controller=addproperty&task=ajaxcounty", {State: ""+state+""}, function(data){
if(data.length >0) {
G("#divcounty").html(data);
}
});

}
function moveOnMax(field,nextFieldID){

  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}

function getpopuppics(pid){
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=addproperty&task=uploadpropertypic&pid='+pid;
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 500, y:350}}"))
SqueezeBox.fromElement(el,options);
}
function cancel()
{
window.location="index.php?option=com_camassistant&controller=addproperty&Itemid=75";
}
</script>
<div id="bedcrumb" style="display:none">
<ul>
<br/>
<li class="home"><a href="index.php?option=com_camassistant&controller=vendors&task=vendor_dashboard&Itemid=112">Home</a></li>
<li><a href="index.php?option=com_camassistant&controller=boardmembers&task=listboardmembers&Itemid=151">List Of Board Members</a></li>
<li>Add Board Member</li>
</ul>
</div>
<div class="acount_status">
 <div class="ttl1">Property Status</div>
 <div class="property_linkask">
<div class="client_linkask">
<label><img src="templates/camassistant_left/images/active_linked.png"> </label>
<strong><span>Your property is linked to:</span></strong>
</div>
</div>
 </div>
<div id="container_inner" class="property_status">
<div  style="margin-top:20px;">
 <div class="ttl1">Property Information</div>
</div>
<form enctype="multipart/form-data"  method="post" name="property_edit" id="property_edit">
<div class="clear"></div>
<?php //echo "<pre>"; print_r($this->details); ?>
<div id="signup-form">
<div class="signUp-left">
<div class="signup">
<span id="prop_list">
<input type="file" class="file_class" name ="property_image"/>
<div id = "uplaod_pimage"><span><a class="uploadimagetext" href="javascript:void(0);" onclick="getpopuppics(<?php echo $pid;?>)" >Click here to upload an image of your property</span></a> </div>
</span>
</div>


</div>
<div class="signUp-right">
<div class="signup">
<label>Property Name:</label>
<span id="prop_list">
<input name="property_name" type="text"  value=""/>
</span>
</div>
<div class="signup einumber">
<div class="signup">
<label>EIN Number: </label>
<input name="ein1" class="EIN-l" type="text" maxlength="2"  name="ein1" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="ein1" onkeyup="moveOnMax(this,'ein2')"value=""/> &nbsp; - 
<input name="ein2" class="EIN-r" type="text" id= "ein2" name="ein2" maxlength="7"  value=""/>
</div>

</div>
<div class="signup">
<label>Title (your relation to this property):</label>
<select name="board_position">
<option value="owner" <?PHP if($property->board_position == 'owner'){?> selected="selected" <?PHP } ?>>Owner</option>
<option value="President" <?PHP if($property->board_position == 'President'){?> selected="selected" <?PHP } ?>>President</option>
<option value="Vice President" <?PHP if($property->board_position == 'Vice President') {?> selected="selected" <?PHP } ?>>Vice President</option>
<option value="Treasurer" <?PHP if($property->board_position == 'Treasurer') { ?> selected="selected" <?PHP } ?>>Treasurer</option>
<option value="Secretary" <?PHP if($property->board_position == 'Secretary') { ?> selected="selected" <?PHP } ?>>Secretary</option>
<option value="Director" <?PHP if($property->board_position == 'Director') { ?> selected="selected" <?PHP } ?>>Director</option>

</select>
</div>

</div>

<div class="signup">
<label>Street Address:  </label>
<input name="streeaddress" type="text"  value=""/>
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

<option value="<?php echo $states->state_id?>" <?php if($states->state_id== $property->state) echo "selected";?>><?php echo $states->state_name?></option>
<?php } ?>
</select>
</div>
<div class="zip">
<label>Zip Code:</label>
<input name="zipcode" type="text" maxlength="5"  value="<?PHP echo $property->zip?>"/>
</div>
</div>
<div class="signup">

<label>County: </label>
<select name="divcounty" id="divcounty" >
<option value="">Please Select County</option>
</select>

</div>
<div class="signup">
<label>Time Zone:  </label>
<select  name="timezone"  id="timezone" >
<option <?php if( $property->timezone == 'eat'){ echo "selected='selected'"; } ?> value="est">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
<option <?php if( $property->timezone == 'cen'){ echo "selected='selected'"; } ?> value="cen">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
<option <?php if( $property->timezone == 'mou'){ echo "selected='selected'"; } ?> value="mou">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
<option <?php if( $property->timezone == 'pac'){ echo "selected='selected'"; } ?> value="pac">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
<option <?php if( $property->timezone == 'ala'){ echo "selected='selected'"; } ?> value="ala">(GMT -9:00) Alaska</option>
<option <?php if( $property->timezone == 'haw'){ echo "selected='selected'"; } ?> value="haw">(GMT -10:00) Hawaii</option>
</select>
</div>
<div class="signup checkBox" >
<input type="checkbox" checked="checked" value="loc" name="location" id="location"> Location observes Daylight Savings
</div>
<div class="signup units">
<label>No. of Units (if applicable):  </label>
<input name="units" type="text"  value=""/>
</div>
<div class="signup">
<div class="cp">
<label>Phone: </label>
<input name="phone_1" type="text" class="sm-input" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id= "phone1" maxlength="3" onkeyup="moveOnMax(this,'phone2')" value="<?PHP echo $phone[0]; ?>"  />
 <input  name="phone_2" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="phone2"  maxlength="3" onkeyup="moveOnMax(this,'phone3')" class="sm-input" value="<?PHP echo $phone[1]; ?>" ); "/> - 
 <input name="phone_3" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';"  id="phone3"  maxlength="4"  onkeyup="moveOnMax(this,'phone_ext')" class="sm-input" value="<?PHP echo $phone[2]; ?>" "/>
</div>

<div class="ext">
<label>Ext:</label>
<input name="extension" id="phone_ext" type="text" maxlength="4"  class="sm-input" value=""   /></div>
<div class="clear"></div>
</div>																			
<div class="signup">
<div class="cp">
<label>Alt. Phone: </label>
<input id="altphone_1" name="altphone_1" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="3" onkeyup="moveOnMax(this,'altphone_2')" class="sm-input" value="<?PHP echo $altphone[0]; ?>" />
 <input id="altphone_2" name="altphone_2" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="3" onkeyup="moveOnMax(this,'altphone_3')" class="sm-input" value="<?PHP echo $altphone[1]; ?>" "/> - 
 <input id="altphone_3" name="altphone_3" type="text"  onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="4" onkeyup="moveOnMax(this,'altextension')" class="sm-input" value="<?PHP echo $altphone[2]; ?>"  "/>
</div>

<div class="ext">
<label>Ext:</label>
<input name="altextension" id="altextension" type="text" maxlength="4"  class="sm-input" value=""  /></div>
<div class="clear"></div>
</div>																			
<div class="signup">

<label>Fax:</label>
<input id="fax_1" name="fax_1" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="3" onkeyup="moveOnMax(this,'fax_2')" class="sm-input" value="<?PHP echo $fax[0]; ?>" />
 <input id="fax_2" name="fax_2" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="3" onkeyup="moveOnMax(this,'fax_3')" class="sm-input" value="<?PHP echo $fax[1]; ?>"  "/> - 
 <input id="fax_3" name="fax_3" type="text" onclick="if(this.value == 'without spaces or dashes') this.value='';" maxlength="4" class="sm-input" value="<?PHP echo $fax[2]; ?>"  "/>
</div>




<div class="clear"></div>
<div class="client_permissions">
<div class="inner_client-heading">
        <div class="ttl1">Your Permissions</div>
        <p>Note: When your Property is linked, permissions are controlled by the Manager. Please contact your Manager directly to request any revisions.</p>
      </div><!-- inner_client-heading -->
 
          <div class="client_permission_block">
            <div><strong>Copied on Vendor proposals?</strong></div>
            <div>When you end a request, your client will receive an automatic email notification with a link to download a copy of the proposal report, which will contain every Vendor's submitted proposal.</div>
            <div><input type="radio" name="vendor_proposals" onclick="return false;"  value="1" > <label>Yes</label> 
            <input type="radio" name="vendor_proposals" checked="checked"  value="0"> <label>No</label></div>
          </div><br/><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Access to "My Vendor" list?</strong></div>
            <div >Your client will have "read-only" access to your "My Vendors" list or "Corporate Preferred Vendors" list (Master Account holders only). This allows them the ability to view contact information, compliance statuses, and more.  Note:  They will not be able to remove, add, or edit your list.</div>
            <div><input type="radio" name="myvendor_list"  value="1" onclick="return false"; > <label>Yes</label> 
            <input type="radio" name="myvendor_list" value="0" checked="checked"> <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Ability to invite Vendors to requests?</strong></div>
            <div >Your Client will be able to invite Vendors to participate in requests that you submitted for this property only.  Note: They will not be able to uninvite vendors, send reminders, or end bidding.</div>
            <div><input type="radio" name="invite_vendors" onclick ="return false;"  value="1"> <label>Yes</label> 
            <input type="radio" name="invite_vendors" value="0" checked="checked" > <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Requires approval before submitting requests?</strong></div>
            <div >Your Client will be required to approve the submission of a request before it is delivered to Vendors. If a project is not approved, the Client will be able to submit feedback so your request may be revised and then resubmitted for approval.</div>
            <div><input type="radio" name="approval_request" onclick="return false"  value="1" > <label>Yes</label> 
            <input type="radio" name="approval_request" checked="checked" value="0" > <label>No</label></div><br/>
          </div><!-- client_permission_block -->
          
          <div class="client_permission_block">
            <div><strong>Requires approval before awarding requests?</strong></div>
            <div>Your Client will be required to approve the awarding of a request to a Vendor before notifications are delivered to all participating Vendors.  If an award is not approved, the Client will be able to submit feedback so the awarding may be revised and then resubmitted for approval.</div>
            <div><input type="radio"  name="approval_awarding" onclick="return false;" value="1"> <label>Yes</label> 
            <input type="radio" name="approval_awarding" value="0" checked="checked" > <label>No</label></div><br/>
          </div><!-- client_permission_block -->
  


<div class="checktext">
<input type="hidden" name="user_id" value="<?PHP  echo $this->user_id; ?>" />
<a  href="javascript:void(0)" class="manager_cancel" onclick="cancel()"></a>
<a  href="javascript:void(0)" class="manager_submit" onclick="javascript: return validate_data2();"></a>
 </div>
</div>

<input type="hidden" value="com_camassistant" name="option" />
<input type="hidden" value="addproperty" name="controller" />
<input type="hidden" value="savepropertydetails" name="task" />
<div class="clear"></div>
</div>

</form>
</div> 
<div class="clear"></div>
</div>