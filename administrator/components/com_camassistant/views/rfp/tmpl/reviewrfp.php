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
JHTML::_('behavior.calendar');
jimport( 'joomla.html.html' );
$propertyList=$this->propertyList;
$industryList=$this->industryList;
$reqCatList=$this->reqCatList;


$model=$this->getModel('rfp');
for($i=0;$i<count($reqCatList);$i++)
{
	$pid = $reqCatList[$i]['id'];
	$reqCatList2=$model->getSplRequiremntCats($pid);
	$reqCatList[$i]['subcat'] = $reqCatList2;
	//$cnt = count($reqCatList[$i]['subcat']); 
	for($j=0;$j<count($reqCatList[$i]['subcat']);$j++)
	{
		$pid2 = $reqCatList[$i]['subcat'][$j]['id'];
		$reqCatList3=$model->getSplRequiremntCats($pid2);
		$reqCatList[$i]['subcat'][$j]['subcat2'] = $reqCatList3;
		
	}
}
//echo $reqCatList[1][subcat][0]['id'];
/*echo "<pre>";
print_r($reqCatList);exit;*/
$user=& JFactory::getuser();
?>

<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/jquery1.css" />		
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-timepicker-addon.js"></script>
<script>

G = jQuery.noConflict();
window.addEvent('domready', function() {
			SqueezeBox.initialize({});
			$$('input.modal').each(function(el) {					
				el.addEvent('click', function(e) {
				new Event(e).stop();
					inputString=G('#industry_id').val();
					if(inputString){
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=rfp&task=showindustryform&amp;formid='+inputString;
					SqueezeBox.fromElement(el);
					}else{
					alert('Please Select The industry');
					}
				});
			});
						
		});

G = jQuery.noConflict();
function deletelinetask(inputString){
	 if (confirm("Are you sure you want to delete")) {
		G.post("index2.php?option=com_camassistant&controller=rfp&task=deletelinetask", {queryString: ""+inputString+""}, function(data){
				G('#line_task'+inputString).html('');
			});
	 }
	}

function deletelineupload(taskid){
window.parent.document.getElementById('line_uploads'+taskid).value ='';
window.parent.document.getElementById('upload_file'+taskid).innerHTML ='<a href="javascript:linetaskupload(\''+taskid+'\');"><img src="<? echo juri::base(); ?>components/com_camassistant/skin/images/uploadfile.gif" alt="upload a file"></a>';
}

function addproperty(id){ 
if(id=='1'){  
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=rfp&task=addproperty';
SqueezeBox.fromElement(el);
}  
}

function linetaskupload(id){ 
property_id=G('#property_id').val();
alert(property_id);
if(property_id){
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=popupdocs&task=pfiles&taskid='+id+'&pid='+property_id+'&mid='+<?php echo $user->id; ?>;
SqueezeBox.fromElement(el);
}else{
alert('Please Select The Property');

}
}

function sowrfp(task) { 
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=rfp&task='+task;
SqueezeBox.fromElement(el); 
}		


function showperform(id,rfm){
G('#sub_perform'+id).css('display','');
G('#sub_perform'+rfm).css('display','none');
}
function removeperform(){
G('#sub_performother').css('display','none');
G('#sub_perform1').css('display','none');
}
function showme(){
G('#sow_me').css('display','block');
G('#someone_me').css('display','none');
}
function showsomeone(){
G('#sow_me').css('display','none');
G('#someone_me').css('display','block');
}

function addEvent1() {
linetask=$('#line_task').html();
G('#newdiv').prepend(linetask);
}


function fn_submitRFP(rfpType)
{
	frm=document.adminForm;
	if(frm.property_id.value=='')
	{
		alert("Please choose your property name");
		frm.property_id.focus();
		return;
	} else if(frm.projectName.value=='') {
		alert("Please enter Reference name");
		frm.projectName.focus();
		return;
	} else if(frm.industry_id.value=='') {
		alert("Please choose your Industry Name");
		frm.industry_id.focus();
		return;
	} else if(frm.projectInfo.value=='') {
		alert("Please enter about Project details");
		frm.projectInfo.focus();
		return;
	} else if(frm.startDate.value=='') {
		alert("Please select your project Start date");
		frm.startDate.focus();
		return;
	} else if(frm.endDate.value=='') {
		alert("Please select your project End date");
		frm.endDate.focus();
		return;
	} else if(frm.frequency.value=='') {
		alert("Please enter Frequency");
		frm.frequency.focus();
		return;
	} else if(frm.proposalDueDate.value=='') {
		alert("Please select vendor proposal due Date");
		frm.proposalDueDate.focus();
		return;
	} else if(frm.proposalDueTime.value=='') {
		alert("Please select vendor proposal Ending Time");
		frm.proposalDueTime.focus();
		return;
	} else if(frm.maxProposals.value=='') {
		alert("Please select maximum proposals");
		frm.maxProposals.focus();
		return;
	} else {
		frm.controller.value="rfp";
		frm.task.value="submit_rfp";
		frm.rfp_type.value=rfpType;
		frm.submit();
	}

}

function openmenu(val) 
{
	//alert(document.getElementById("submenu"+val).style.display);
	if(document.getElementById("submenu"+val).style.display=="none")
	{
	document.getElementById("submenu"+val).style.display="";
	//document.getElementById("sr_cat").checked="true";
	}
	else
	{
	document.getElementById("submenu"+val).style.display="none";
	//document.getElementById("sr_cat").checked="false";
	}
	
}

var id1 =  '';
	var cnt =  '';
	if(!id1)
	id1=1;
	var endid1;
	function addEvent1()
	{
		//document.getElementById("removeevent1").style.display = "block";
		/*if (id1<10)
		{ */
			id1++;
			var arrlicen=new Array();
			var ni = document.getElementById('newdiv');
			var numi = document.getElementById('theValue');
			var num = (document.getElementById("theValue").value -1)+ 2;
			//alert(num);
			numi.value = num;
			var divIdName = "newSelect"+num;
			  newitem='<div id=\'line_task'+id1+'\'><div class="lineitem_pan_row"><p style="padding-top: 35px;"></p><span class="grey_12">Line Item #'+id1+':</span><div class="lineitem_pan"><input type="text" value="Enter Title of Line Item Task" onblur="if (this.value == \'\') this.value = \'Enter Title of Line Item Task\'" onfocus="if (this.value == \'Enter Title of Line Item Task\')this.value = \'\'"  class="other_tfield" style="width: 310px;" name="linetaskname[]"><input type="text" value="Enter your own reference name for this RFP" onblur="if (this.value ==\'\') this.value =\'Enter your own reference name for this RFP\'" onfocus="if (this.value == \'Enter your own reference name for this RFP\') this.value = \'\'" class="other_tfield" style="width: 280px; margin-left: 32px;" name="rfpreference[]"><div class="clear"></div><p style="padding-top: 5px;"></p><textarea style="border: 1px solid rgb(215, 215, 215); padding: 5px; background: rgb(247, 247, 247) none repeat scroll 0% 0%; width: 630px; height: 45px; font-family: arial; font-size: 12px; color: rgb(125, 125, 125); -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;" name="task_desc[]"></textarea></div><div style="float: left; padding-left: 10px;"><strong><input type="checkbox" value="" name="">Require</strong> vendors to assign a <strong>Dollar Value</strong> to this Line Item. </div><div class="color_butons"><input type="hidden" checked="" id="line_uploads'+id1+'" name="linetask_uploads[]" value=""><span id="upload_file'+id1+'"><a href="javascript:linetaskupload('+id1+');"><img alt="upload a file" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/uploadfile.gif"></a></span> <a href="javascript:removeEvent1();" ><img height="22"  alt="Add another line item task" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/removelineitemtask.gif"></a></div><div class="clear"></div></div></div>';
			var newdiv = document.createElement('div');
			newdiv.setAttribute("id",divIdName);
			newdiv.innerHTML = newitem;
			ni.appendChild(newdiv);
	//}
	/*if(id1==10)
		document.getElementById("addevent1").style.display = "none";*/
	}
	function removeEvent1()
	{
	
		divNum = document.getElementById("theValue").value;
		if(divNum != 0 )
		{
			var d = document.getElementById('newdiv');
			var olddiv = document.getElementById("newSelect"+divNum);
			d.removeChild(olddiv);
			
			var numi = document.getElementById('theValue');
			var num = document.getElementById("theValue").value -1;
			numi.value = num;
		}
	/*if(id1<=cnt)
	document.getElementById("removeevent1").style.display = "none";*/
		
	}
</script>
<script language="javascript">
	//
	var id2 =  '';
	var cnt2 =  '';
	if(!id2)
	id2=1;
	var endid2;
	function addEvent2()
	{
		//document.getElementById("removeevent2").style.display = "block";
		/*if (id1<10)
		{ */
			id2++;
			var arrlicen2=new Array();
			var ni2 = document.getElementById('newdiv2');
			var numi2 = document.getElementById('theValues');
			var num2 = (document.getElementById("theValues").value -1)+ 2;
			//alert(num);
			numi2.value = num2;
			var divIdName2 = "newSelector"+num2;
			  newitem2='<div id="upload_file"><div class="lineitem_pan_row"><span class="grey_12">Additional Document/Specifications #'+id2+':</span><div style="padding: 10px 0pt 10px 5px;" class="lineitem_pan"><input type="file" name="attachmnent[]" /></div><div style="float: left; padding-left: 10px;"><input type="checkbox" value="" name=""><strong>Require</strong> vendors to assign a <strong>Dollar Value </strong>to this Attachment.</div><div class="color_butons"><a href="javascript:removeEvent2();"><img height="22"  alt="Upload another attachment" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/removeattachement.gif"></a></div><div class="clear"></div></div></div>';
			 
			   
			var newdiv2 = document.createElement('div');
			newdiv2.setAttribute("id",divIdName2);
			newdiv2.innerHTML = newitem2;
			ni2.appendChild(newdiv2);
	//}
	/*if(id1==10)
		document.getElementById("addevent1").style.display = "none";*/
	}
	function removeEvent2()
	{
			divNum2 = document.getElementById("theValues").value;
			
		if(divNum2 != 0 )
		{
			var d2 = document.getElementById('newdiv2');
			var olddiv2 = document.getElementById("newSelector"+divNum2);
			d2.removeChild(olddiv2);
			var numi2 = document.getElementById('theValues');
			var num2 = document.getElementById("theValues").value -1;
			numi2.value = num2;
		}
	/*if(id1<=cnt)
	document.getElementById("removeevent1").style.display = "none";*/
		
	}
</script>



<script type="text/javascript">


<!--
	function validateForm( frm ) {
		var valid = document.formvalidator.isValid(frm);
		if (valid == false) {
			// do field validation
			// your custom code here
			return false;
		} else {
			frm.submit();
		}
	}
	function fun_showdiv()
	{
		document.getElementById('showdiv').style.display='';
	}
	/*function open_new_window(url)
	{ 
	new_window = window.open(url,'window_name','toolbar=0,menubar=0,resizable=0,dependent=0,status=0,width=550,height=450,left=25,top=25')
	}*/

// -->
</script>
<style type="text/css">
.white_light_link {
	background-color:#FFF;
	border:1px solid #5096DB;
	display:none;
	height:250px;
	left:25%;
	overflow:auto;
	padding:5px;
	position:absolute;
	top:800px;
	bottom:0px;
	width:50%;
	z-index:1002;
}
</style>
<div id="vender_right2">
<?php $RFP=$this->userinfo;  ?>
<!-- sof dotshead -->
<div id="dotshead_blue">Review <span style="color:#8A976F;">RFP</span></div>
<!-- eof dotshead -->

<div id="i_bar">
<div id="i_bar_txt">
<span>REQUEST PROPOSALS FROM QUALIFIED VENDORS </span></div>
<div id="i_icon"><a href="#"><img alt="info" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/info_icon2.png"></a></div>
</div>


<!-- sof table pan -->
<div class="table_pannel">


<div class="head_greenbg2"><!--sof rfp box-->   
<div id="rpf_ifo" >
<div id="rpf_ifo_head">MY CONTACT INFO <img align="right" style="margin-top: -4px; margin-right: -8px;" alt="info" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/info_icon2.png"></div>
    <div id="rpf_ifo_text"><h1>Property Management Company:</h1>
<?PHP echo $RFP->comp_name;  ?><br />
<?PHP echo $RFP->mailaddress;  ?><br />
<?PHP echo $RFP->comp_city;  ?>, <?PHP echo $RFP->comp_state;  ?> <?PHP echo $RFP->comp_zip;  ?><br />
P: <?PHP echo $RFP->comp_phno;  ?><br />
F: <?PHP echo $RFP->comp_alt_phno;  ?><br />
<a href="http://<?PHP echo $RFP->comp_website;  ?>" target="_blank"><?PHP echo $RFP->comp_website;  ?></a>
<h1>Property Manager:</h1>
<?PHP echo $RFP->name;  ?> <?PHP echo $RFP->lastname;  ?><br />
P: <?PHP echo $RFP->phone;  ?> (x<?PHP echo $RFP->extension;  ?>)<br />
<a href="mailto:<?PHP echo $RFP->email;  ?>">Email Property Manager</a>
</div>
    <a href="#"><img height="22" align="right" width="141" alt="info sharing preferences" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/infosharing.gif"></a>

	 <?php
$rfpinfo=$this->rfpinfo;
$rfpuploadfiles=$this->rfpuploadfiles;
$rfplinetasks=$this->rfplinetasks;
$rfpreqinfo=$this->rfpreqinfo;

  ?>
	
<div id="rpf_ifo_head" style="margin-top:30px;">SCOPE OF WORK (SOW): </div></span>
<!--  sof line item pan -->

 <div id="rpf_ifo_text">


<?php  if($rfpinfo->defsow_who=='self'){echo"Me"; ?>
<?php  if($rfpinfo->choose_tasks=='yes'){echo"<p>I would like to use the<strong> RFP Wizard</strong> to help view/select common tasks associated with this Industry.</p>";} ?><?php  if($rfpinfo->choose_tasks=='no'){echo"<p>I want to<strong> define</strong> all line<strong> items manually, OR</strong> I prefer to<strong> upload a document</strong> that details the Scope of Work.</p>";} ?>

<?php } ?>
<?php  if($rfpinfo->defsow_who=='someother'){echo"Someone Else"; ?>
<?php  if($rfpinfo->choose_tasks=='1'){echo"<p>A professional Hired by the property association.</p>";} ?>
<?php  if($rfpinfo->choose_tasks=='2'){echo"<p>I would like to hire an <strong>Engineer/Architect </strong>with this Industry to define the SOW for subsequent RFP creation/submission.</p>";} ?>
<?php  if($rfpinfo->choose_tasks=='3'){echo"<p>I want to have up to 3 Industry Professionals perform a site visit and define the SOW, which I will create a separate RFP for. I understand that this SOW is to be completed free of charge, and that I have a responsibility to meet the vendor(s) on-site.</p>";} ?> 
<?php } ?>

<!--eof rfp box-->DEFINE YOUR REQUEST FOR PROPOSAL (RFP) DETAILS BELOW:
 
</div></div>
 </div>


  <div class="proposal_form" style="padding-left:0px;">
<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
<div style="width:300px;   margin-top: 6px; width: 433px; padding:5px; font-weight:bold; font-size:11px;border:1px solid #CDCDCD;">
<div class="signup">
<label>Property Name: </label>
<?php echo $this->propertyname;?>
</div>


<div class="signup">
<label>Reference Name: </label>
<?php echo $rfpinfo->projectName; ?>
</div>

<div class="signup">
<label>Industry Name:</label>
<?php echo $this->industryname;?>
</div>


<div class="signup2">
<label>Where on the Property the work is to be performed<br>
 
 </label><div class="clear"></div> 
<?php echo $rfpinfo->work_perform ?>
 <div class="clear"></div>
</div>

<div class="signup">
<label>Frequency: <?php echo $rfpinfo->frequency; ?> </label>
</div>

<div class="signup">
<div class="state">
<label>Projected Start Date:   	</label>
<div class="clear"></div>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tbody><tr>
    <td align="left" width="70" valign="top"> 
<?php echo $rfpinfo->startDate; ?>
	</td>
  </tr>
</tbody></table>
 </div>

<div class="zip">
<label>Projected End Date:</label>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tbody><tr>
    <td><div class="clear"></div>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tbody><tr>
    <td align="left" width="150" valign="top">
<?php echo $rfpinfo->endDate; ?>

	
	</td>
  </tr>
</tbody></table></td>
    <td></td>
  </tr>
</tbody></table>


</div>
</div>


<div class="signup">
<label>Receive no of proposals: 
<b><?php echo $rfpinfo->maxProposals ?></b></label>
</div>


<div class="signup">
<div class="state">
<label>Proposals Last date:   	</label>
</div>

<div class="signup">
<div class="clear"></div>
<table cellspacing="0" cellpadding="0" border="0" width="277">
  <tbody><tr>
     <td>
	<?php echo $rfpinfo->proposalDueDate; ?> 	<?php echo $rfpinfo->proposalDueTime; ?>
	 </td>
  </tr>
</tbody></table>
</div>
</div>

<div class="signup2">
<label>
Site Visit: 
 </label><div class="clear"></div> 
<?php echo $rfpinfo->site_visit; ?>
</div>
<br>
</div>


</div>
<!-- eof line item pan -->
<div class="head_greenbg2">Line Tasks</div>

<?php
$i=1;
 foreach($rfplinetasks as $linetaks){ ?>
<!--  sof line item pan -->
<div id='line_task<?php echo $linetaks->task_id; ?>'>
<div class="lineitem_pan_row"><span class="grey_12">Line Item #1:</span>
<div class="lineitem_pan">Line task name:<?php  if($linetaks->linetaskname){ echo $linetaks->linetaskname; } ?>
<div style="border-top:1px solid #CDCDCD;  padding: 4px 0;">Own reference name:<?php  if($linetaks->rfpreference){ echo $linetaks->rfpreference; } ?></div>
<div  style="border-top:1px solid #CDCDCD;  padding: 4px 0;" >Line task desc:<?php echo $linetaks->task_desc; ?></div>


<div style="border-top:1px solid #CDCDCD;   padding: 4px 0;">
<strong>
<span style="text-align:left;width:300px;">Show to vendors: <?php  if($linetaks->is_req_taskvendors){ echo"Show"; }else{ echo"Hide";  } ?></span><span style="text-align:left;float:right;">Line task File: <?php  if($linetaks->taskuploads){ $uploads=explode('/',$linetaks->taskuploads); $upcount=count($uploads); echo $uploads[$upcount-1];  } ?> <br />
</span></div>
</div></div>
</div>
<!-- eof line item pan -->
<?php $i++; } ?>
	<div id="newdiv"></div>	 <input name="hidden" type="hidden" id="theValue" value="0">
	<div class="head_greenbg2">Additional Document/Specifications:</div>
<?php
$i=1;
 foreach($rfpuploadfiles as $rfpupload){ ?>
<!--  sof line item pan -->
<p style="padding-top: 20px;"></p>
<div id="upload_file">
<div class="lineitem_pan_row">
<span class="grey_12">Additional Document/Specifications #1:

</span>
<div style="padding: 10px 0pt 10px 5px;" class="lineitem_pan">
<input type="file" name="attachmnent[]" />

</div>
<div style="float: left; padding-left: 10px;">
<input type="checkbox" value="" name="">
<strong>Require</strong> vendors to assign a <strong>Dollar Value </strong>to this Attachment.</div>
<div class="color_butons"><a href="javascript:addEvent2();"><img height="22" width="160" alt="Upload another attachment" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/images/uploadanother.gif"></a>
</div>
<div class="clear"></div>
</div>
</div>
<!-- eof line item pan -->
<?php $i++; } ?>
	<div id="newdiv2"></div>
	<input name="hidden2" type="hidden" id="theValues" value="0">
<!--  sof line item pan -->

<p style="padding-top: 20px;"></p>
<div class="lineitem_pan_row">
<div class="head_greenbg2">Special Requirements:</div>

<div class="lineitem_pan">
	 <?php if(count($reqCatList)>0)  {
		 		for($i=0;$i<count($reqCatList);$i++) { ?>
            <div>
					<table width="100%"  border="0" cellpadding="0" cellspacing="0" >
					    <tr align="left" valign="middle" >
                          <td  class="liteblue" style="padding-left:6px;"><?php echo $reqCatList[$i]['req_title']; ?></td>
                        </tr>
						<tr id="submenu<?php echo $reqCatList[$i]['id'];?>">
				  		<td class="whitebg" colspan="2">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<?php $cnt = count($reqCatList[$i]['subcat']); 
						for($j=0;$j<$cnt;$j++)  { ?>
						<tr><td> <?php echo $reqCatList[$i]['subcat'][$j]['req_title']; ?></td></tr>
						<tr  id="submenu<?php echo $reqCatList[$i]['subcat'][$j]['id'];?>">
				  		<td class="whitebg" colspan="2">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<?php $cnt2 = count($reqCatList[$i]['subcat'][$j]['subcat2']); 
						for($k=0;$k<$cnt2;$k++)  { ?>
						<tr><td><?php echo $reqCatList[$i]['subcat'][$j]['subcat2'][$k]['req_title']; ?></td></tr>
						<?php } ?>
						</table></td>
						</tr>
						<?php } ?>
						</table></td>
						</tr>
                    </table></div>
				  <?php } }?>
</div>

<div class="clear"></div>
</div>
<!-- eof line item pan -->


<div align="right" id="topborder_row">
<input type="button" value="Save As Draft" name="draft" onclick="javascript:fn_submitRFP('draft');"/><input type="button" value="Save As RFP" name="rfpbtn" onclick="javascript:fn_submitRFP('rfp');"/></div>
</div>
<input type="hidden" name="option" value="com_camassistant" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="rfp" />
<input type="hidden" name="Itemid" value="<?php echo $_REQUEST['Itemid'];?>" />
<?php echo JHTML::_( 'form.token' ); ?>

</form>
</div>
<!-- eof table pan -->

</div>