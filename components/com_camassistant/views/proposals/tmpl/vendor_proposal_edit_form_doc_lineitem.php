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
$toolTipArray = array('className'=>'tool');
JHTML::_('behavior.tooltip', '.hasTip2', $toolTipArray);
JHTML::_('behavior.modal');
$user = JFactory::getUser();
//echo '<pre>'; print_r($this->TASKS_details);
$rebid = JRequest::getVar('rebid','');
$Alt_Prp = JRequest::getVar('Alt_Prp','');
$Alt_bid = JRequest::getVar('Alt_bid','');
if($Alt_bid != '')
$is_Alt =  $Alt_bid;
else
$is_Alt =  $Alt_Prp;
$act = JRequest::getVar('act','');
$Proposal_id = JRequest::getVar('Proposal_id','');  
$RFP = $this->RFP_details;
$TASKS = $this->TASKS_details;
$DOCS = $this->DOCS_details;
$PRICE = $this->Proposal_price_details;
$SPL_REQ_DETAILS = $this->SPLRequirements_details;
$SPL_REQ_DETAILS = $this->SPLRequirements_details;
$SPL_REQ_TABS = $this->SPL_REQ_tabs;
$Review_reqCatList = $this->SPLRequirements_details;
//$cat = $this->SPLReq_Category;
$cat = $Review_reqCatList['main'];
$main = $Review_reqCatList['main'];
$sub = $Review_reqCatList['sub'];
$child = $Review_reqCatList['child'];
$child_price=array();
$Form_status = $this->Form_status;
if($Form_status == 'ITB')
$Form_status = "Unsubmitted";
$Form_bidded_date = $this->Form_bidded_date;
$price_cnt=0;
 for($i=0; $i<count($TASKS); $i++)
 {
 if($TASKS[$i]->is_req_taskvendors == 1)  $price_cnt = $price_cnt+1;
 }
$SPLreq_amount = $this->SPLreq_amount; 
//echo  '<pre>'; print_r($TASKS);
?>

<?PHP /************************************************popup code*************************************************/?>

<script type="text/javascript" src="components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript">
L = jQuery.noConflict();
function fun_POPUP_box(act) { 


		//Cancel the link behavior
		//Get the A tag
		//Get the screen height and width
		var maskHeight = L(document).height();
		var maskWidth = L(window).width();
		//Set heigth and width to mask to fill up the whole screen
		L('#mask1').css({'width':maskWidth,'height':maskHeight});
		//transition effect		
		L('#mask1').fadeIn(100);	
		L('#mask1').fadeTo("slow",0.8);	
		//Get the window height and width
		var winH = L(window).height();
		var winW = L(window).width();
		//Set the popup window to center
		L("#submit1").css('top',  '300');
		L("#submit1").css('left', '582');
		L("#submit1").fadeIn(2000);

		L('.window1 #done1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		L('#mask1').hide();
		L('.window1').hide();
		fun_saveasdraft(act);
		
	});	
}
function Alt_POPUP_box(act) { 


		//Cancel the link behavior
		//Get the A tag
		//Get the screen height and width
		var maskHeight = L(document).height();
		var maskWidth = L(window).width();
		//Set heigth and width to mask to fill up the whole screen
		L('#mask1').css({'width':maskWidth,'height':maskHeight});
		//transition effect		
		L('#mask1').fadeIn(100);	
		L('#mask1').fadeTo("slow",0.8);	
		//Get the window height and width
		var winH = L(window).height();
		var winW = L(window).width();
		//Set the popup window to center
		L("#submit1").css('top',  '300');
		L("#submit1").css('left', '582');
		L("#submit1").fadeIn(2000);

		L('.window1 #done1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		L('#mask1').hide();
		L('.window1').hide();
		Alt_saveasdraft(act);
		
	});	
}


L(document).ready(function() {	

	
	//if close button is clicked
	L('.window1 #close1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		L('#mask1').hide();
		L('.window1').hide();
		
	});	
	
	//if done button is clicked
	L('.window1 #done1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		L('#mask1').hide();
		L('.window1').hide();
		
	});		
	
			
	
});

</script>
<style>
#mask1 {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes1 .window1 {
  position:absolute;
  left:0;
  top:0;
  width:1300px;
  height:150px;
  display:none;
  z-index:9999;
  padding:38px 10px 3px 10px;
}


#boxes1 #submit1 {
  width:330px; 
  height:233px;
  padding:10px;
  background-color:#ffffff;
}
#boxes1 #submit1 a{
 text-decoration:none;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}
#done1 {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding-left:83px;
float:left;
/*background:url(templates/camassistant/images/yes.gif) no-repeat;
*/
}
#close1 {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding-right:107px;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}

</style>
<div id="boxes1" style="top:576px; left:582px;">		
<div id="submit1" class="window1" style="top:1300px; left:582px;">	
<div class="head_greenbg2" style="padding-left:70px">Submission Confirmation</div><br/>	
<font color="#0000ce">Are you sure you want to unsubmit this proposal and move your revised version to your "Unsubmitted (Draft) Proposals"?</font>
<div style="padding-top:10px; text-align:center;">
<form name="edit" id="edit" method="post">
<div id="done1"  name="done1" value="Ok"><img src="templates/camassistant_left/images/yes.gif" /></div>
<div id="close1" name="close1" value="Cancel"><img src="templates/camassistant_left/images/no.gif" /></div></div>
</form>
<div style="padding-top:10px; text-align:center"><font color="#0000ce"><font color="#FF0000">Note:</font> moving this submitted proposal to the "Draft" status does NOT relinquish your Intent To Bid reservation or responsibility to provide a proposal before the close date of the RFP.</font>
</div>
</div>
  <div id="mask1"></div>
</div>

<?PHP /************************************************popup code*************************************************/ ?>


<script type="text/javascript" >
E = jQuery.noConflict();
function format_val(id,fieldname,fieldvalue){	
E.post("index2.php?option=com_camassistant&controller=proposals&task=vendor_proposal_edit_format_val", {id: ""+id+"",fieldname: ""+fieldname+"",fieldvalue:""+fieldvalue+""}, function(data){
if(data.length >0) {
var x= fieldname+id;
E("#"+fieldname+id).val(data);
//E("#task_price1").val(data); 
}
});
}

function getcommission_2()
{
var site='<?php echo JURI::root();?>';
var path='<?php echo addslashes(JPATH_SITE);?>';
var is_task_price='<?php echo $price_cnt;?>';
	if(is_task_price != 0)
	{
	var notcomma_added = document.getElementById('total_lineitem_pricing').value.replace(/,/g, '');
	var notcomma_other = document.getElementById('other_items_price').value.replace(/,/g, '');
	document.getElementById('total_price').value = parseInt(notcomma_added) + parseFloat(notcomma_other);
	var amnt = document.getElementById('total_price').value;
	var added  =document.getElementById('total_lineitem_pricing').value;
	}
	else
	{
	var amnt = document.getElementById('other_items_price').value;
	}
	var other  =document.getElementById('other_items_price').value;
E.post("index2.php?option=com_camassistant&controller=proposals&task=vendor_proposal_get_commission", {other: ""+other+"",added: ""+added+"",c2:""+amnt+""}, function(data){
	var splitIt = data.split('AND');
		/*alert(splitIt[3]);
		alert(splitIt[1]);
		alert(splitIt[0]);*/
	if(data.length >0) {
	if(splitIt[0] < 35)
		{splitIt[0] = '35.00';}
	E("#commisions").val(splitIt[0]);
	E("#total_price").val(splitIt[1]);
	E("#total_lineitem_pricing").val(splitIt[2]);
	E("#other_items_price").val(splitIt[3]);
	setTimeout("document.vendor_Edit_proposal_form.submit()",1000);
	//frm.submit();
}
});
	
}


//squeeze box function edit exception.
function edit_popup(href,width,height) {
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: "+width+", y:"+height+"}}"))
SqueezeBox.fromElement(href,options);
}


//End Of squeeze..


//Ajax function to calculate commission on vendor bidding amount
function createXMLHttpRequest() 
{
	try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {}
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {}
	try { return new XMLHttpRequest(); } catch(e) {}
	alert("XMLHttpRequest not supported");
	return null;
}
var xhReq = createXMLHttpRequest();

function getcommission()
{ 

	var site='<?php echo JURI::root();?>';
	var path='<?php echo addslashes(JPATH_SITE);?>';
	var is_task_price='<?php echo $price_cnt;?>';
	if(is_task_price != 0)
	{
	/*if(document.getElementById('total_lineitem_pricing').value == '')
	document.getElementById('total_lineitem_pricing').value = 0.00;
	if(document.getElementById('other_items_price').value == '')
	document.getElementById('other_items_price').value = '';*/
	var notcomma_added = document.getElementById('total_lineitem_pricing').value.replace(/,/g, '');
	var notcomma_other = document.getElementById('other_items_price').value.replace(/,/g, '');
	document.getElementById('total_price').value = parseInt(notcomma_added) + parseFloat(notcomma_other);
	var amnt = document.getElementById('total_price').value;
	var added  =document.getElementById('total_lineitem_pricing').value;
	}
	else
	{
	/*if(document.getElementById('other_items_price').value == '')
	document.getElementById('other_items_price').value = 0.00;*/
	var amnt = document.getElementById('other_items_price').value;
	}
	var other  =document.getElementById('other_items_price').value;
	xhReq.open("GET", site+"components/com_camassistant/helpers/ajax_commision.php?other="+other+"&added="+added+"&c2="+amnt+"&path="+path, true);
	xhReq.onreadystatechange = onSumcommision;
	xhReq.send(null);
}
function onSumcommision() 
{
	if (xhReq.readyState != 0 && xhReq.readyState != 4)  { return; }
	var serverResponse = xhReq.responseText;
	var is_task_price='<?php echo $price_cnt;?>';
	var splitIt = serverResponse.split("AND");
	if(splitIt[0] < 35)
	splitIt[0] = '35.00';
	document.getElementById('commisions').value = splitIt[0];
	document.getElementById('other_items_price').value = splitIt[3];
	if(is_task_price != 0)
	{
	document.getElementById('total_price').value = splitIt[1];
	document.getElementById('total_lineitem_pricing').value = splitIt[2];
	}
	//alert(document.getElementById('commisions').value)
}

function update_price(val)
{
    var frm = document.vendor_Edit_proposal_form;
	var tasks_chks = document.getElementsByName('task_price[]');
	var downloads_chks = document.getElementsByName('downloads_price[]');	
	//(downloads_chks.length); 
	//alert(tasks_chks.length);
	var other_price = document.getElementById('other_items_price');
	var line_item_price = document.getElementById('total_lineitem_pricing');
	var total_price = document.getElementById('total_price');
	var tasks_total = 0;
         for (var i = 0; i < tasks_chks.length; i++)
         {   
		 	 var comma_val = tasks_chks[i].value;
		     tasks_chks[i].value = tasks_chks[i].value.replace(/,/g, '');
		 	 if(tasks_chks[i].value != '')	
		 	 tasks_total = parseFloat(tasks_total) + parseFloat(tasks_chks[i].value);
			 tasks_chks[i].value = comma_val;
         }
	var downloads_total = 0;
	if(downloads_chks.length>0)
	{
		 for (var i = 0; i < downloads_chks.length; i++)
         {   
		 	 var comma_val = downloads_chks[i].value;
		     downloads_chks[i].value = downloads_chks[i].value.replace(/,/g, '');
		 	 if(downloads_chks[i].value != '')	
		 	 downloads_total = parseFloat(downloads_total) + parseFloat(downloads_chks[i].value);	
			 downloads_chks[i].value = comma_val;
         }
	}	
	//alert(tasks_total); 
	line_item_price.value = parseFloat(tasks_total) + parseFloat(downloads_total);
	getcommission();
}
function fun_saveasdraft(act)
{
var frm = document.vendor_Edit_proposal_form;
var tasks_chks = document.getElementsByName('task_price[]');
	 for (var i = 0; i < tasks_chks.length; i++)
         {   
		 	 if(tasks_chks[i].value == '')	
			 {
		 	 alert('Please enter price for tasks');
			 tasks_chks[i].focus();
			 return ;
			 }
         }
var downloads_chks = document.getElementsByName('downloads_price[]');
	  for (var i = 0; i < downloads_chks.length; i++)
         {   
		 	if(downloads_chks[i].value == '')	
		 	 {
		 	 alert('Please enter price for Additional documents');
			 tasks_chks[i].focus();
			 return ;
			 }
         }	

	if(frm.i_agree.checked == false)
	{
		alert('Please check the required fields');
		frm.i_agree.focus();
		return; 
	}
frm.submit_type.value = act;
getcommission_2();
}

function fun_saveassubmit(act)
{
var frm = document.vendor_Edit_proposal_form;
var tasks_chks = document.getElementsByName('task_price[]');
	 for (var i = 0; i < tasks_chks.length; i++)
         {   
		 	 if(tasks_chks[i].value == '')	
			 {
		 	 alert('Please enter price for tasks');
			 tasks_chks[i].focus();
			 return ;
			 }
         }
var downloads_chks = document.getElementsByName('downloads_price[]');
	  for (var i = 0; i < downloads_chks.length; i++)
         {   
		 	 if(downloads_chks[i].value == '')	
		 	 {
		 	 alert('Please enter price for Additional documents');
			 tasks_chks[i].focus();
			 return ;
			 }
         }	

  if(frm.i_agree.checked == false)
	{
		alert('Please check the required fields');
		frm.i_agree.focus();
		return;
	}
//frm.submit_type.value = 'Submit';
frm.submit_type.value = act;
getcommission_2();
//alert(document.getElementById('commisions').value);
//frm.submit();	
}
function Alt_saveasdraft(act)
{
var frm = document.vendor_Edit_proposal_form;
var tasks_chks = document.getElementsByName('task_price[]');
	 for (var i = 0; i < tasks_chks.length; i++)
         {   
		 	 if(tasks_chks[i].value == '')	
			 {
		 	 alert('Please enter price for tasks');
			 tasks_chks[i].focus();
			 return ;
			 }
         }
var downloads_chks = document.getElementsByName('downloads_price[]');
	  for (var i = 0; i < downloads_chks.length; i++)
         {   
		 	 if(downloads_chks[i].value == '')	
		 	 {
		 	 alert('Please enter price for Additional documents');
			 tasks_chks[i].focus();
			 return ;
			 }
         }	

	if(frm.i_agree.checked == false)
	{
		alert('Please check the required fields');
		frm.i_agree.focus();
		return; 
	}
frm.submit_type.value = act;
frm.Alt_Prp.value = 'yes';
getcommission_2();
}

function Alt_saveassubmit(act)
{
var frm = document.vendor_Edit_proposal_form;
var tasks_chks = document.getElementsByName('task_price[]');
	 for (var i = 0; i < tasks_chks.length; i++)
         {   
		 	 if(tasks_chks[i].value == '')	
			 {
		 	 alert('Please enter price for tasks');
			 tasks_chks[i].focus();
			 return ;
			 }
         }
var downloads_chks = document.getElementsByName('downloads_price[]');
	  for (var i = 0; i < downloads_chks.length; i++)
         {   
		 	 if(downloads_chks[i].value == '')	
		 	 {
		 	 alert('Please enter price for Additional documents');
			 tasks_chks[i].focus();
			 return ;
			 }
         }	

   if(frm.i_agree.checked == false)
	{
		alert('Please check the required fields');
		frm.i_agree.focus();
		return;
	}
//frm.submit_type.value = 'Submit';
frm.submit_type.value = act;
frm.Alt_Prp.value = 'yes';
getcommission_2();	
}

</script>
<form name="vendor_Edit_proposal_form" method="post" action="index.php?option=com_camassistant&controller=proposals&task=Proposal_save_as&rfp_id=<?PHP echo $RFP->id  ?>"/>
<div id="vender_right2">
<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php">Home  </a></li><li><a href="index.php?option=com_camassistant&controller=vendors&task=vendor_proposal_centre&Itemid=106">Proposal Center Home</a> </li><li>RFP Response - Proposal # <?PHP echo $RFP->id  ?></li>
</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<div class="green-heading" id="dotshead_green"> <?PHP if($rebid == 's') { ?> <font color="#FF0000">ALTERNATE PROPOSAL FORM</font>- <?PHP echo $RFP->projectName;} else { if($Alt_Prp == 'yes') { ?><font color="#FF0000">ALTERNATE PROPOSAL FORM</font><?PHP } else {?> PROPOSAL FORM<?PHP } ?> - <?PHP echo $RFP->projectName. ' - STATUS: '. $Form_status.'&nbsp;'.$Form_bidded_date; } ?> </div>
<!-- eof dotshead -->

<div id="i_bar_gr">
<div id="i_bar_txt">
<span><?PHP echo $RFP->property_name  ?>   </span></div>
<div id="i_icon"><a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=119&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" style="margin-top:1px;"> </a></div>
</div>


<!-- sof table pan -->
<div class="table_pannel">

<?php //echo "<pre>"; print_r($RFP); ?>
<div class="head_bluebg2"><!--sof rfp box-->   
    <div id="rpf_ifo">
    <div id="rpf_ifo_head">RFP CONTACT INFO</div>
    <div id="rpf_ifo_text"><h1>Property Management Company:</h1>
<?php if ($RFP->showcompany=='0') {?>
<?PHP echo $RFP->comp_name;  ?><br />
<?php } ?>
<?php if ($RFP->showaddress=='0') {?>
<?PHP echo $RFP->mailaddress;  ?><br />
<?PHP echo $RFP->comp_city;  ?>, <?PHP echo $RFP->comp_state;  ?> <?PHP echo $RFP->comp_zip;  ?><br />
<?php } ?>
<?php if ($RFP->showphone=='0') { ?>
P: <?PHP echo $RFP->comp_phno;  ?><br />
<?php } ?>
<?php if ($RFP->showfax=='0') {?>
F: <?PHP echo $RFP->comp_alt_phno;  ?><br />
<?php } ?>
<a href="http://<?PHP echo $RFP->comp_website;  ?>" target="_blank"><?PHP echo $RFP->comp_website;  ?></a>
<h1>Property Manager:</h1>
<?PHP echo $RFP->name;  ?> <?PHP echo $RFP->lastname;  ?><br />
<?php if ($RFP->showphone=='0') { ?>
P: <?PHP echo $RFP->phone;  ?> (x<?PHP echo $RFP->extension;  ?>)<br />
<?php } ?>
<?php if ($RFP->showemail=='0') {?>
<a href="mailto:<?PHP echo $RFP->email;  ?>">Email Property Manager</a>
<?php } ?>
    </div>
    
    </div>  
<!--eof rfp box--><?PHP echo $RFP->projectName.' - '.$RFP->industry_name;  ?> - RFP# <?PHP echo $RFP->id  ?> 
 

 </div>

  <div class="proposal_form">

<div class="signup">
<label>Proposal Deadline: </label>
<input readonly="readonly" name="" type="text" style="width:275px;" value="<?PHP echo $RFP->proposalDueDate.',&nbsp;'.$RFP->proposalDueTime  ?>"/>
</div>
<?PHP
list($month, $day, $year) = explode("-", $RFP->startDate);
$date =  $day."-".$month."-".$year;
 ?>
<div class="signup">
<div class="state">
<label>Projected Start Date:</label>
<input readonly="readonly" name="" type="text" style="width:123px;" value="<?PHP echo date("M d, Y", strtotime($date)) ?>"/>
</div>
<?PHP
list($month, $day, $year) = explode("-", $RFP->endDate);
$date =  $day."-".$month."-".$year;
 ?>
<div class="zip" style="padding-right:51px">
<label>Projected End Date:</label>
<input name="" readonly="readonly" type="text" style="width:127px;" value="<?PHP echo date("M d, Y", strtotime($date)) ?>"/>
</div>
</div>
<div class="signup">
<label>Property Address:  </label>
<input name="" readonly="readonly" type="text" style="width:275px;" value="<?PHP echo $RFP->street;  ?>"/>
</div>
<div class="signup">
<label>City: </label>
<input name="" readonly="readonly" type="text" style="width:275px;" value="<?PHP echo $RFP->city;  ?>"/>
</div>
<div class="signup">
<div class="state">
<label>State: 	</label>
<input name="" readonly="readonly" type="text" style="width:123px;" value="<?PHP echo $RFP->state;  ?>"/>
</div>
<div class="zip" style="padding-right:51px">
<label>      Zip: 	</label>
<input name="" readonly="readonly" type="text" style="width:127px;" value="<?PHP echo $RFP->zip;  ?>"/>
</div>
</div>
<div class="signup">
<label>Where on the Property the work is to be performed: </label>
<textarea name="" readonly="readonly" style="width:275px; height:50px; font-family:arial; font-size:12px; color:#7D7D7D; border:1px solid #D7D7D7;"><?PHP echo $RFP->work_perform; ?></textarea>
</div>
<table width="100%">
  <tr>
    <td><div class="signup">
<label>Frequency:</label>
<input name=""  readonly="readonly" type="text" style="width:275px;" value="<?PHP echo $RFP->frequency;  ?>"/>
</div></td>
    <td><div class="signup">
<label>Site Visit Requirement:</label>
<input name="" type="text" style="width:275px;" value="<?PHP echo $RFP->site_visit;  ?>" readonly="readonly" /><br/>
<input name="" type="text" style="width:275px;" value="<?PHP echo $RFP->bidders_info;  ?>" readonly="readonly" />
</div></td>
  </tr>
</table>

<br />

<span class="blue_small">STATEMENT OF WORK:</span><br />
<br />
<?PHP  $price_cnt=0; for($i=0; $i<count($TASKS); $i++)
{ //echo "<pre>"; print_r($TASKS);?>
	<!--  sof line item pan -->
<div class="lineitem_pan_row">
<?PHP if($TASKS[$i]->is_modified==1) { ?>
<span class="grey_12" style="color:#FF0000" title="This is modified Line Item">Line Item #<?PHP echo $i+1; ?>:
</span>
<?PHP } else { ?>
<span class="grey_12">Line Item #<?PHP echo $i+1; ?>:
</span>
<?PHP }  ?>
<div class="lineitem_pan"><input type="text" readonly="readonly"  style="width: 308px;" class="other_tfield"  value="<?PHP echo $TASKS[$i]->linetaskname; ?> 	"> <input type="text" readonly="readonly"  style="width: 264px; margin-left: 32px;" class="other_tfield" value="<?PHP echo $TASKS[$i]->rfpreference; ?>">
<?PHP echo $TASKS[$i]->task_desc; ?><br/>
Notes: <span id="NOTES_<?PHP echo $TASKS[$i]->task_id ?>"><?PHP echo $TASKS[$i]->Notes; ?></span><br/>
Exceptions: <span id="EXCEP_<?PHP echo $TASKS[$i]->task_id ?>"><?PHP echo $TASKS[$i]->Exception; ?></span><br/>
</div>
<?PHP if($TASKS[$i]->is_req_taskvendors == 1) { $price_cnt = $price_cnt+1;?>
<div class="pricing_pan">
<label><img align="top" src="templates/camassistant_left/images/edit_line_itempricing.gif" alt="line item pricing" width="109" height="22" /> $&nbsp;</label>
<input name="task_price[]" type="text" style="background-color:#666666; color:#ffffff;" id="task_price<?PHP echo $i+1; ?>" value="<?PHP echo $TASKS[$i]->price?>"  onblur="javascript: format_val(<?PHP echo $i+1; ?>,'task_price',this.value);"   onchange="javascript: update_price(this.value);"  />
<input type="hidden" name="task_ids[]" value="<?PHP echo $TASKS[$i]->task_id ?>" />
<?php /*?><input name="task_price[]" type="text" style="background-color:#666666; color:#ffffff;" id="task_price<?PHP echo $i+1; ?>" value="<?PHP echo $TASKS[$i]->price?>" onkeypress="return isNumberKey(event)" onfocus="this.value=this.value.replace(/,/gi, '')" onblur="javascript: price(event,'task_price<?PHP echo $i+1; ?>');"   onchange="javascript: update_price(this.value);"  />
<input type="hidden" name="task_ids[]" value="<?PHP echo $TASKS[$i]->task_id ?>" /><?php */?>
</div>
<?PHP } ?>

<div class="color_butons">
<span id="Alink_<?PHP echo $TASKS[$i]->task_id ?>"><?PHP echo $TASKS[$i]->Addnotes; ?></span>
<?PHP echo $TASKS[$i]->Uploadfile; ?>
<span id="Elink_<?PHP echo $TASKS[$i]->task_id ?>"><?PHP echo $TASKS[$i]->AddException; ?></span>
</div>
<div class="clear"></div>
Uploaded Files:<br/> <span id="FILES_<?PHP echo $TASKS[$i]->task_id ?>"></span> 
<?PHP $files_cnt = count($TASKS[$i]->uploaded_file); if($files_cnt > 0) { for($f=0; $f<$files_cnt; $f++){?>
<div class="downloadfile">
<strong> <?PHP echo $TASKS[$i]->uploadfile_title[$f];?></strong>
<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $TASKS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $TASKS[$i]->uploaded_file[$f]; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a><a href="index.php?option=com_camassistant&controller=proposals&spl_req=No&task=Remove_downloadfile&Alt_Prp=<?PHP echo $is_Alt; ?>&prop_id=<?PHP echo $prop_id; ?>&vendor_id=<?PHP echo $user->id; ?>&rfp_id=<?PHP echo $TASKS[$i]->rfp_id;  ?>&task_id=<?PHP echo $TASKS[$i]->task_id ?>&doc_id=<?PHP echo $TASKS[$i]->uploaded_doc_ids[$f];  ?>&Itemid=<?PHP echo $_REQUEST['Itemid']; ?>"><img src="templates/camassistant_left/images/remove.gif" alt="remove file" align="absmiddle" /></a> 
</div>
<?PHP } //end for loop ?>
<?PHP } //end if loop ?>
</div>

<!-- eof line item pan -->
<?PHP } ?>
<?PHP for($j=0; $j<count($DOCS); $j++)
{?>
<!-- sof line item pan -->
<div class="downloadfile">
<span class="grey_12">Additional Document/Specification #<?PHP echo $j+1; ?>:</span><br />
<strong><?PHP echo $DOCS[$j]->title;?></strong>
<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $DOCS[$j]->title; ?>&path=<?PHP echo $DOCS[$j]->doc_path; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a> <strong><?PHP echo $DOCS[$j]->upload_doc;?></strong>
<div class="clear"></div>
<?PHP if($DOCS[$j]->is_req_docvendors == 1) { ?>
<div class="pricing_pan2">
<label><img align="top" height="22" width="109" style="margin: 0px; padding: 0px;" alt="line item pricing" src="templates/camassistant_left/images/edit_line_itempricing.gif"> $&nbsp;</label>
<input type="hidden" name="downloads_ids[]" value="<?PHP echo $DOCS[$j]->doc_id;  ?>" />
<input name="downloads_price[]" type="text" id="downloads_price<?PHP echo $j+1; ?>" value="<?PHP echo $DOCS[$j]->price;  ?>"  onchange="javascript: update_price(this.value);" onblur="javascript: format_val('<?PHP echo $j+1; ?>','downloads_price',this.value);"/>
</div>
<?PHP } ?>
</div>
<!-- eof line item pan -->
<?PHP } ?>

<!--  sof line item pan -->
<div class="lineitem_pan_row">
<?PHP if(count($main)>0) { ?>
<span class="grey_12">Special Requirements:</span>
<div class="lineitem_pan">
<?php /*?><?PHP for($c=0; $c<count($cat); $c++)
 {
     for($m=0; $m<count($main); $m++)
	 {
	 	if($cat[$c]->req_id == $main[$m]->main_id)
	    echo $main[$m]->main_title.'<br/>'; 
		for($s=0; $s<count($sub); $s++)
	   {
			for($ch=0; $ch<count($child); $ch++)
			{
			if($cat[$c]->req_id == $main[$m]->main_id && $cat[$c]->req_id == $sub[$s]->main_id &&  $sub[$s]->sub_id == $child[$ch]->sub_id) {
			echo '<p>'.$sub[$s]->sub_title.'</p>'; 
			echo '<p>&nbsp;&nbsp;&nbsp;'.$child[$ch]->child_title; 
			if($child[$ch]->child_id == 8 || $child[$ch]->child_id == 9)
			{
			for($k=0; $k<count($SPLreq_amount); $k++)
			{
			if($SPLreq_amount[$k]->req_id == $child[$ch]->child_id)
			$child[$ch]->amount = $SPLreq_amount[$k]->amount;  }
			 echo '&nbsp;&nbsp;<input type="hidden" name="spl_req[]" value="'.$child[$ch]->child_id.'" />' ;
			 echo '$&nbsp;&nbsp;<input type="text" value= "'.$child[$ch]->amount.'" name="amount['.$child[$ch]->child_id.']" /></p>' ; } break; }
			}
		}
	  }
 } ?>   <?php */?>  
 <?php 
 for($c=0; $c<count($cat); $c++)
 {
     for($m=0; $m<count($main); $m++)
	 {
	 	if($cat[$c]->main_id == $main[$m]->main_id)
		{
			echo '<span style="padding-left:0px;font-weight:bold;height:15px;">'.ucwords($main[$m]->main_title).'</span><br/>'; 
			for($s=0; $s<count($sub); $s++)
			{
				if($main[$m]->main_id==$sub[$s]->main_id)
				{
				echo '<span style="padding-left:25px;font-weight:normal;height:15px;">&nbsp;&nbsp;'.ucwords($sub[$s]->sub_title).'</span><br/>';
				if($sub[$s]->sub_id==12)
				echo '<span style="padding-left:25px;font-weight:normal;height:15px;">Minimum Liability Insurance Amount Required:<b>$'.$sub[$s]->price.'</b></span> <br/>';
					for($ch=0; $ch<count($child); $ch++)
					{
						if($sub[$s]->sub_id==$child[$ch]->sub_id)
						{
						echo '<span style="padding-left:45px;font-weight:normal;height:15px;"> &nbsp;&nbsp;'.ucwords($child[$ch]->child_title).'</span>';
						if($child[$ch]->child_id==14)
						{
						$child_price=explode(',',$child[$ch]->price);
						echo '<span style="padding-left:30px;font-weight:normal;height:15px;font-weight:bold">- $'.$child_price[0].'/$'.$child_price[1].'/$'.$child_price[2].'</span><br/>';
						} else {
						echo '<br/>';
						}
						}
					}
				}
				
			}
		}
	  }
 } ?> 
<br/><strong>Vendor must furnish documentation designating the Property Association to be listed as an "additional insured"</strong><br/>
Notes: <span id="NOTES_0"><?PHP echo $SPL_REQ_TABS[6]->Notes; ?></span><br/>
Exception: <span id="EXCEP_0"><?PHP echo $SPL_REQ_TABS[7]->Exception; ?></span>
</div>

<div class="color_butons">
<span id="Alink_0"><?PHP echo $SPL_REQ_TABS[0]->Addnotes; ?></span>
<?PHP echo $SPL_REQ_TABS[1]->Uploadfile; ?>
<span id="Elink_0"><?PHP echo $SPL_REQ_TABS[2]->AddException; ?></span>
</div>
<?PHP } ?>
<div class="clear"></div>
Uploaded Files:<br/> <span id="FILES_0"></span> 
<?PHP $files_cnt = count($SPL_REQ_TABS[3]->uploaded_file); if($files_cnt > 0) { for($f=0; $f<$files_cnt; $f++){?>
<div class="downloadfile">
<strong> <?PHP echo $SPL_REQ_TABS[5]->uploadfile_title[$f];?></strong>
<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $SPL_REQ_TABS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $SPL_REQ_TABS[3]->uploaded_file[$f]; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a><a href="index.php?option=com_camassistant&controller=proposals&spl_req=Yes&Alt_Prp=<?PHP echo $is_Alt; ?>&task=Remove_downloadfile&prop_id=<?PHP echo $prop_id; ?>&vendor_id=<?PHP echo $user->id; ?>&rfp_id=<?PHP echo $RFP->id;  ?>&doc_id=<?PHP echo $SPL_REQ_TABS[4]->uploaded_doc_ids[$f];  ?>"><img src="templates/camassistant_left/images/remove.gif" alt="remove file" align="absmiddle" /></a> 
</div>
<?PHP } //end for loop ?>
<?PHP } //end if loop ?>
</div>

<!-- eof line item pan -->


<!--  sof line item pan -->
<div class="lineitem_pan_row" <?PHP if(count($main)==0) { ?> style="padding-top:12px" <?PHP } ?> >
<span class="grey_12">PROPOSAL PRICING:
</span>
<div class="downloadfile">
<?PHP if($price_cnt != 0) { ?>
<div class="proposal_pric">
<label style="width:256px"><strong>LINE ITEM PRICING ABOVE ADDED UP</strong>:</label>
<?PHP $PRICE[0]->tasks_total_price = number_format($PRICE[0]->tasks_total_price,2); ?>
$&nbsp;<input name="total_lineitem_pricing" id="total_lineitem_pricing" type="text"  value="<?PHP echo $PRICE[0]->tasks_total_price; ?>" readonly="readonly" />
</div>
<?PHP } ?>
<div class="proposal_pric">
<?PHP $PRICE[0]->price_other_items = number_format($PRICE[0]->price_other_items,2); ?>
<label style="width:256px"><?PHP if($price_cnt != 0) { ?><strong style="float:left;">YOUR PRICE FOR ALL OTHER ITEMS:</strong> <?PHP } else { ?><strong style="float:left;">YOUR PRICE FOR ALL OF THE ABOVE ITEMS:</strong><?PHP } ?></label>
$&nbsp;<input name="other_items_price" id="other_items_price" style="background-color:#666666; color:#ffffff;" type="text" value="<?PHP echo $PRICE[0]->price_other_items; ?>"  onclick="if(this.value == 0.00) this.value = '';" onblur="javascript: format_val('','other_items_price',this.value);"  onchange="javascript: getcommission();"  /> <span class="hasTip2" title="Info ::<div style='font-size:13px; width:500px;'>All Other Items specifically includes any line items that did NOT require line-item pricing.  This MAY also include any adjustments relating to Notes or Exceptions, but should be CLEARLY noted in the respective Note or Exception.</div>"> <img align="right" style="margin-bottom:-8px; float:none; margin-right: 0px;" alt="info" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/info_icon3.png"></span>
</div>
<?PHP if($price_cnt != 0) { ?>
<div class="proposal_pric">
<label style="width:256px"><strong>TOTAL PROPOSAL PRICE:</strong></label>
<?PHP $PRICE[0]->proposal_total_price = number_format($PRICE[0]->proposal_total_price,2); ?>
$&nbsp;<input name="total_price" id="total_price" type="text" style=" font-weight:bold; " value="<?PHP echo $PRICE[0]->proposal_total_price; ?>" readonly="readonly"/>
<?PHP } ?>
</div>

<div class="proposal_pric">
<label style="width:256px"><strong>YOUR MAXIMUM COMMISSION:</strong><br />
(Due upon the awarding of the job)</label>
<?PHP $PRICE[0]->commission = number_format($PRICE[0]->commission,2); ?>
$&nbsp;<input readonly="readonly" name="commisions" id="commisions" type="text" style="font-weight:bold;" value="<?PHP echo $PRICE[0]->commission; ?>"/>

</div>

</div>

<div class="clear"></div>
<br/>

  <table width="100%">
    <tr>
      <td width="4%" align="left" valign="top"><input name="i_agree" id="i_agree" type="checkbox" checked="checked" value="yes" /></td>
      <td width="96%">I Have Read and understand all of the requirements and/or attachments of this Request For Proposal.  My pricing reflects the performance of all the duties asked, and the delivery of any products requested, and I am aware that any change orders that I submit to the aforementioned scope of work may adversely affect my Vendor Rating.  I have also read and agree to the Terms and Conditions of this website. <span class="redstar">(Required)      <br />
        <br />
        <br />
      </span></td>
    </tr>
  </table>

<?PHP if($Alt_Prp == 'yes') { if($rebid == 's') $img1='saveasdraft.gif'; else $img1 = 'save_changes.gif'; if($act == 'Submit') { $img='resubmit.gif'; $js_act='resubmit';} else {$img = 'review_submit.gif'; $js_act='review'; }  ?>
<div id="topborder_row" align="right"><a href="javascript: location.reload(true);"><img src="templates/camassistant_left/images/discardchanges.gif" alt="save as draft" width="194" height="47" /></a><?PHP if($act == 'Draft' || $act == 'review' || $rebid == 's') { ?><a href="javascript: Alt_saveasdraft('Draft');"><img src="templates/camassistant_left/images/saveasdraft.gif" alt="save as draft" width="154" height="46" /></a><?PHP } ?><a href="javascript: Alt_saveassubmit('<?PHP echo $js_act; ?>');"><img src="templates/camassistant_left/images/<?PHP echo $img; ?>" alt="review &amp; submit" /></a></div></div>
<?PHP } else {  if($rebid == 's') $img1='saveasdraft.gif'; else $img1 = 'save_changes.gif';  if($act == 'Submit'){ $img='resubmit.gif'; $js_act='resubmit'; } else {$img = 'review_submit.gif'; $js_act='review'; } ?>
<div id="topborder_row" align="right"><a href="javascript: location.reload(true);"><img src="templates/camassistant_left/images/discardchanges.gif" alt="save as draft" width="194" height="47" /></a><?PHP if($act == 'Draft' || $act == 'review' || $rebid == 's') { ?><a href="javascript: fun_saveasdraft('Draft');"><img src="templates/camassistant_left/images/saveasdraft.gif" alt="save as draft" width="154" height="46" /></a><?PHP } ?><a  href="javascript: fun_saveassubmit('<?PHP echo $js_act; ?>');"><img src="templates/camassistant_left/images/<?PHP echo $img; ?>" alt="review &amp; submit" /></a></div></div>
<?PHP } ?>
</div>
<!-- eof line item pan -->



</div>

</div>
<!-- eof table pan -->
</div>
<input type="hidden" name="Itemid" value="<?PHP echo $_REQUEST['Itemid']; ?>" />
<input type="hidden" name="Proposal_id" value="<?PHP echo $Proposal_id; ?>" />
<input type="hidden" name="Prp_id" value="<?PHP echo $Proposal_id; ?>" />
<input type="hidden" name="act" value="Update" />
<input type="hidden" name="rfp_id" value="<?PHP echo $_REQUEST['rfp_id']; ?>" />
<input type="hidden" name="submit_type" id="submit_type" />
<input type="hidden" name="Alt_Prp" id="Alt_Prp" value="<?PHP echo $is_Alt; ?>" />
<input type="hidden" name="rebid" id="rebid" value="<?PHP echo $rebid; ?>" />
</form>