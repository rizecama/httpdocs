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
/* print_r($selproperty = $this->selproperty);   print_r($selindustry = $this->selindustry); */
/*echo "<pre>"; print_r($gtesplreq[0]->req_title);  echo '<pre>'; print_r($getinfo); exit; */
$selproperty = $this->selproperty;
$selindustry = $this->selindustry;
$getinfo = $this->getinfo;
$getlinetask = $this->getlinetask;
$getdocs = $this->getdocs;
$getcats = $this->getcats;
$gtesplreq = $this->gtesplreq;

?>
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
	function open_new_window(url)
	{ 
	new_window = window.open(url,'window_name','toolbar=0,menubar=0,resizable=0,dependent=0,status=0,width=550,height=450,left=25,top=25')
	}

// -->
function fnSendValuestoParent()
{
	var Frm 	= document.adminForm;
	var FldLen	= Frm.elements['cid[]'].length;
	var FldVal	= '';
	for(i=0;i<FldLen;i++)
	{
		if(Frm.elements['cid[]'][i].checked == true)
			FldVal = (FldVal == '') ? Frm.elements['cid[]'][i].value : FldVal+','+Frm.elements['cid[]'][i].value;
	}
	document.getElementById('line_id').style.display = '';
	document.getElementById('task_desc').value = FldVal;
	document.getElementById('site_linkdiv').style.display = 'none';
}
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
<div>
<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
<div class="white_light_link" id="site_linkdiv" style="display:;">
<div align="right"><a class="knowmore" onclick="document.getElementById('site_linkdiv').style.display='none';" href="javascript:void(0)"><strong>X</strong></a></div>
<?php 
for($i=0;$i<count($selindustry);$i++) { ?>
<div style="float:left;width:150px;padding:3px;"><input type="checkbox" name="cid[]" id="cid" value="<?php echo $selindustry[$i]->industry_name; ?>" />&nbsp;<?php echo $selindustry[$i]->industry_name; ?></div>
<?php
if(($i+1)%2 == 0) { ?><div style="clear:both;"></div><?php } 
}
?>
<div style="clear:both;"></div>
<div style="margin-top:10px;"><input type="button" value="Save" onclick="javascript:fnSendValuestoParent();"/></div>
</div>
<div id="bedcrumb">
				&nbsp;
	</div>
		<div id="dotshead_blue">Show RFP  # <?php echo $getinfo[0]->id; ?></div><br>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <!--<tr>
    <td colspan="3"><h1>Show RFP</h1></td>
  </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" height="25" valign="top"><strong>Select Property to be serviced</strong></td>
    <td width="20%" align="left">	<?php echo $selproperty[0]->property_name; ?> </td>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%" height="25" valign="top" ><strong>Reference Name for this RFP :</strong></td>
    <td width="20%" align="left" valign="top"><?php echo $getinfo[0]->projectName; ?>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td width="30%" height="25" valign="top"><strong>Select Industry :</strong></td>
    <td width="20%" align="left" valign="top"><?php echo $selindustry[0]->industry_name; ?></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td height="25" colspan="2">&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td width="30%" height="25" colspan="2" valign="top" ><h3>General projects Information</h3></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td width="30%" height="25" colspan="3" valign="top"><strong>Where on the property will this work be performed ?</strong></td>
  </tr>
  <tr>
    <td width="20%" height="25" valign="top">&nbsp;</td>
    <td width="20%" align="left" valign="top"><?php echo $getinfo[0]->projectInfo; ?><!--<textarea cols="20" rows="4"  name="projectInfo" id="projectInfo" readonly="readonly" ></textarea>--></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td width="20%" height="25" valign="top"><strong>Work Start Date :</strong></td>
    <td width="20%" align="left" valign="top">  <?php echo $getinfo[0]->startDate; // echo JHTML::_('calendar', $this->detail->startdate, "startDate", "startDate" ,"%Y-%m-%d", array('class'=>'inputbox','readonly'=>'readonly')); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%" height="25" valign="top"><strong>Work End Date :</strong></td>
    <td width="20%" align="left" valign="top">  <?php  echo $getinfo[0]->endDate;//echo JHTML::_('calendar', $this->detail->startdate, "endDate", "endDate","%Y-%m-%d", array('class'=>'inputbox','readonly'=>'readonly')); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%" height="25" valign="top"><strong>Frequency :</strong></td>
    <td width="20%" align="left" valign="top"><?php  echo $getinfo[0]->frequency; ?><!-- <input type="text" name="frequency" id="frequency" class="inputbox" readonly="readonly"  value=""/>--> </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="30%" height="25" valign="top"><strong>Vendor Proposal Due Date :</strong></td>
    <td width="20%" align="left" valign="top">  <?php   echo $getinfo[0]->proposalDueDate;  //echo JHTML::_('calendar', $this->detail->startdate, "proposalDueDate", "proposalDueDate","%Y-%m-%d", array('class'=>'inputbox','readonly'=>'readonly')); ?></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td width="30%" height="25" valign="top"><strong>Proposal Ending Time :</strong></td>
    <td width="20%" align="left" valign="top">   <?php echo $getinfo[0]->proposalDueTime; ?>
			<?php /*?><select name="proposalDueTime" readonly="readonly">
					<option value="12AM" <?php if($getinfo[0]->proposalDueTime == '12AM') { echo 'selected=selected'; } ?> >12:00 AM</option>
					<option value="1AM" <?php if($getinfo[0]->proposalDueTime == '1AM') { echo 'selected=selected'; } ?> >1:00 AM</option>
					<option value="2AM"  <?php if($getinfo[0]->proposalDueTime == '2AM') { echo 'selected=selected'; } ?> >2:00 AM</option>
					<option value="3AM"  <?php if($getinfo[0]->proposalDueTime == '3AM') { echo 'selected=selected'; } ?> >3:00 AM</option>
					<option value="4AM"  <?php if($getinfo[0]->proposalDueTime == '4AM') { echo 'selected=selected'; } ?> >4:00 AM</option>
					<option value="5AM"  <?php if($getinfo[0]->proposalDueTime == '5AM') { echo 'selected=selected'; } ?> >5:00 AM</option>
					<option value="6AM"  <?php if($getinfo[0]->proposalDueTime == '6AM') { echo 'selected=selected'; } ?> >6:00 AM</option>
					<option value="7AM"  <?php if($getinfo[0]->proposalDueTime == '7AM') { echo 'selected=selected'; } ?> >7:00 AM</option>
					<option value="8AM"  <?php if($getinfo[0]->proposalDueTime == '8AM') { echo 'selected=selected'; } ?> >8:00 AM</option>
					<option value="9AM" <?php if($getinfo[0]->proposalDueTime == '9AM') { echo 'selected=selected'; } ?> >9:00 AM</option>
					<option value="10AM" <?php if($getinfo[0]->proposalDueTime == '10AM') { echo 'selected=selected'; } ?> >10:00 AM</option>
					<option value="11AM" <?php if($getinfo[0]->proposalDueTime == '11AM') { echo 'selected=selected'; } ?> >11:00 AM</option>
					<option value="12PM" <?php if($getinfo[0]->proposalDueTime == '12PM') { echo 'selected=selected'; } ?> >12:00 PM</option>
					<option value="1PM"  <?php if($getinfo[0]->proposalDueTime == '1PM') { echo 'selected=selected'; } ?>>1:00 PM</option>
					<option value="2PM"  <?php if($getinfo[0]->proposalDueTime == '2PM') { echo 'selected=selected'; } ?>>2:00 PM</option>
					<option value="3PM" <?php if($getinfo[0]->proposalDueTime == '3PM') { echo 'selected=selected'; } ?> >3:00 PM</option>
					<option value="4PM" <?php if($getinfo[0]->proposalDueTime == '4PM') { echo 'selected=selected'; } ?> >4:00 PM</option>
					<option value="5PM" <?php if($getinfo[0]->proposalDueTime == '5PM') { echo 'selected=selected'; } ?> >5:00 PM</option>
					<option value="6PM" <?php if($getinfo[0]->proposalDueTime == '6PM') { echo 'selected=selected'; } ?> >6:00 PM</option>
					<option value="7PM" <?php if($getinfo[0]->proposalDueTime == '7PM') { echo 'selected=selected'; } ?> >7:00 PM</option>
					<option value="8PM" <?php if($getinfo[0]->proposalDueTime == '8PM') { echo 'selected=selected'; } ?> >8:00 PM</option>
					<option value="9PM" <?php if($getinfo[0]->proposalDueTime == '9PM') { echo 'selected=selected'; } ?> >9:00 PM</option>
					<option value="10PM" <?php if($getinfo[0]->proposalDueTime == '10PM') { echo 'selected=selected'; } ?> >10:00 PM</option>
					<option value="11PM" <?php if($getinfo[0]->proposalDueTime == '11PM') { echo 'selected=selected'; } ?> >11:00 PM</option>
			</select><?php */?>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%" valign="top" ><strong>Maximunm Number Of Proposals:</strong></td>
    <td width="20%" align="left" valign="top" > <?php echo $getinfo[0]->maxProposals; ?>
		<?php /*?><select name="maxProposals" readonly="readonly">
			<option <?php if($getinfo[0]->maxProposals == '3') { echo 'selected=selected'; } ?> >3</option>
			<option <?php if($getinfo[0]->maxProposals == '4') { echo 'selected=selected'; } ?>>4</option>
			<option <?php if($getinfo[0]->maxProposals == '5') { echo 'selected=selected'; } ?>>5</option>
			<option <?php if($getinfo[0]->maxProposals == '6') { echo 'selected=selected'; } ?>>6</option>
			<option <?php if($getinfo[0]->maxProposals == '7') { echo 'selected=selected'; } ?>>7</option>
			<option <?php if($getinfo[0]->maxProposals == '8') { echo 'selected=selected'; } ?>>8</option>
			
 		</select><?php */?>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="3">&nbsp;</td>
  </tr>
  
  <tr>
   <?php  if($getinfo[0]->defsow_who == "self") {  ?> <td height="25" colspan="3" valign="top"><h3>Who defines the Statment Of Work ? </h3> <?php } ?></td>
  </tr>
 <!-- <tr>
    <td width="30%">&nbsp;</td>
	<td align="left" colspan="2" valign="top">
	
		<input type="radio" name="defsow_who" value="self"  <?php //if($getinfo[0]->defsow_who == "self") { echo "checked=checked;";  } ?> />Self SOW (I am ready to define the SOW and Create a RFP)  
	</td>
  </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td align="left" colspan="2" valign="top">
		<input type="radio" name="defsow_who"  value="someother" <?php //if($getinfo[0]->defsow_who == "someother") { echo "checked=checked"; } ?> />Someone Else	(This is a Presolitation to define the SOW)
	</td>
  </tr>-->
  <!--<tr id="showdiv"   <?php if($getinfo[0]->defsow_who == "self") {  ?>  style="display:show;" <?php  } else { ?> style="display:none;" <?php } ?> >
    <td height="25" colspan="3">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="25" colspan="2"><h3>Would you like to view/select common tasks within this industry?</h3></td>
	  </tr>
	  <tr>
		<td width="30%" height="25">&nbsp;</td>
		<td align="left">
			<?php //echo $getinfo[0]->choose_tasks; ?>
			<input type="radio" name="choose_tasks" value="yes" <?php if($getinfo[0]->choose_tasks == "yes") { echo "checked=checked"; } ?> />yes
		</td>
	  </tr>
	  <tr>
		<td width="30%" height="25">&nbsp;</td>
		<td align="left"><input type="radio" name="choose_tasks" value="no"/>No, I want to define them all manually OR I prefer to upload a document with the statement of work</td>
	  </tr>
	</table>	</td>
  </tr> <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
 
  <tr id="line_id"  <?php if($getinfo[0]->choose_tasks == "yes") { ?> style="display:show" <?php } else { ?> style="display:none" <?php } ?>  >
  	<td colspan="3">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<?php $i=1; // echo '<pre>'; print_r($getlinetask); 
			foreach($getlinetask as $task) { ?>
		  <tr>
			
			<td valign="top" height="25" width="30%"><strong>Line Task <?php echo $i; ?></strong></td>
			<td align="left" valign="top" ><?php  echo $task->task_desc; ?><!--<textarea cols="30" rows="5"  name="task_desc[]" id="task_desc"></textarea>--></td>
			<td>&nbsp;</td>
			
		  </tr>
		  <?php  $i++; } ?>
		  <tr>
			
			<td align="left" style='padding-top:2px;' colspan='2' nowrap="nowrap">
				<strong>Require Vendors to assign a $ value to this line of task :</strong> <?php if($getlinetask[0]->is_req_taskvendors == "1"){ echo "Yes"; } else { echo 'No'; }  ?></td><td valign="top" height="25" width="30%">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		 <!-- <tr>
		    <td valign="top" height="30" colspan="3">
			<div id="newdiv"></div>			</td>
		  </tr>-->
		  
		  <input name="hidden" type="hidden" id="theValue" value="0">
		   <tr>
			<td width="30%" height="25">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<!--<td nowrap="nowrap" align="left">
			<table width="100%" border="0" cellspacing="3" cellpadding="0">
			  <tr>
				<td align="left" width="20%"><span id ="addevent1" style="display:block"><a href="javascript:addEvent1();">Add another Line Item/Task</a>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
				<td align="left"><span  id ="removeevent1" style="display:none;"><a href="javascript: removeEvent1();">Remove Task</a></span></td>
			  </tr>
			</table>			</td>-->
		  </tr>
		  
		 <tr>
		 	<td height="25" colspan="3"><h3>Attach any documents/requirements to this SOW? ( pdf,jpg,doc,xls,..etc.)</h3></td>
		 </tr>
		 <?php $i=1;	foreach($getdocs as $docs) {  ?>
		 <tr>
		 <td><?php echo 'Download'.$i;?></td>
		 		<td valign="top" height="25" width="30%"><a href="<?php echo JURI::root();?>components/com_camassistant/helpers/downloadnew.php?f=<?php echo $docs->doc_path;?> ">Download</a> </td>
			
			
			<?php /*?><td align="left" colspan="2"><a href="download.php?f=<?php echo $getdocs[0]->doc_path; ?>" ><?php echo $getdocs[0]->doc_path; ?></a></td><?php */?>
		  </tr>
		  <?php $i++; } ?>
		  <tr>
			
			<td align="left" colspan="2" nowrap="nowrap"> 
					<strong>Require Vendors to assign a $ value to this line of task : </strong> <?php if($getdocs[0]->is_req_docvendors == '1') { echo 'Yes'; } else { echo 'No'; }  ?>
					
			</td>
			<td valign="top" height="25" width="30%"></td>
		  </tr>
	<!--  	  <tr>
		    <td valign="top" height="30" colspan="3">
			<div id="newdiv2"></div>			</td>
		  </tr>
		  <input name="hidden2" type="hidden" id="theValues" value="0">
		 <tr>
			<td width="30%" height="25">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td nowrap="nowrap" align="left">
			<table width="100%" border="0" cellspacing="3" cellpadding="0">
			  <tr>
				<td align="left" width="20%"><span id ="addevent2" style="display:block"><a href="javascript:addEvent2();">Add another File</a>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
				<td align="left"><span  id ="removeevent2" style="display:none;"><a href="javascript: removeEvent2();">Remove File</a></span></td>
			  </tr>
			</table>			</td>
		  </tr>-->
		   <tr>
		     <td height="25" colspan="3">&nbsp;</td>
	        </tr>

		   <tr>
		 	<td height="25" colspan="3" valign="top" ><h3><strong>Special Requirements</strong>-I require vendors to meet the following requirements:</h3></td>
		 </tr>
		<?php foreach($gtesplreq AS $splreq) {  ?> <tr>
		 <td>&nbsp;</td>
		 
		 	<td valign="top" height="25" > 	<?php //echo'<pre>'; print_r($splreq);
			echo $splreq->req_title.'&nbsp;&nbsp;&nbsp;&nbsp;'.$splreq->price;//echo '<pre>'; print_r($gtesplreq->req_title); ?>		</td>
			
		 </tr><?php } ?>

		</table>	</td></tr>
	<tr>
     <td>&nbsp;</td>
     <td align="left">&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td align="left">&nbsp;</td>
     <!--<td><input type="button" value="Save As Draft" name="draft" onclick="javascript:fn_submitRFP('draft');"/><input type="button" value="Save As RFP" name="rfpbtn" onclick="javascript:fn_submitRFP('rfp');"/></td>-->
   </tr>
</table>
<script language="javascript" type="text/javascript">
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
	//
	var id1 =  '';
	var cnt =  '';
	if(!id1)
	id1=1;
	var endid1;
	function addEvent1()
	{
		document.getElementById("removeevent1").style.display = "block";
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
			  newitem="";
			  newitem ="<table width='100%'  border='0' cellspacing='0' cellpadding='0'>";
			  newitem+="<tr><td valign='top' height='30' width='30%'>";
			  newitem+="Line Task"+id1+":</td><td align='left' style='padding-top:2px;'><textarea cols='30' rows='5'  name='task_desc[]' ></textarea><\/td><td>&nbsp;</td><\/tr>";
			  newitem+="<tr><td valign='top' height='25' width='30%'></td>";
			  newitem+="<td align='left' style='padding-top:2px;' colspan='2'><input type='checkbox' name='is_req_taskvendors[]' value='1' />Require Vendors to assign a $ value to this line of task</td><td>&nbsp;</td></tr>";
		      newitem+="<\/table>";
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
		var divNum;
		id1--;
		if (id1 == 1)
		{
			document.getElementById("removeevent1").style.display = "none";
			document.getElementById("addevent1").style.display = "block";
		}
		else if(id1 > 1)
		{
			document.getElementById("removeevent1").style.display = "block";
			document.getElementById("addevent1").style.display = "block";
		}
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
		document.getElementById("removeevent2").style.display = "block";
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
			  newitem2="";
			  newitem2 ="<table width='100%'  border='0' cellspacing='0' cellpadding='0'>";
			  newitem2+="<tr><td valign='top' height='30' width='30%'></td>";
			  newitem2+="<td align='left' style='padding-top:2px;' colspan='2'><input type='file' name='attachmnent[]' /><\/td><\/tr>";
			  newitem2+="<tr><td valign='top' height='30' width='30%'></td>";
			  newitem2+="<td align='left' style='padding-top:2px;' colspan='2'><input type='checkbox' name='require_price[]' value='1'/>Require Vendors to assign a $ value to this line of task<\/td><\/tr>";
			   newitem2+="<\/table>";
			   
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
		var divNum2;
		id2--;
		if (id2 == 1)
		{
			document.getElementById("removeevent2").style.display = "none";
			document.getElementById("addevent2").style.display = "block";
		}
		else if(id2 > 1)
		{
			document.getElementById("removeevent2").style.display = "block";
			document.getElementById("addevent2").style.display = "block";
		}
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

<?php /*?><button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button><?php */?>
<input type="hidden" name="option" value="com_camassistant" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="rfp_type" value="" />
<input type="hidden" name="controller" value="rfp" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>