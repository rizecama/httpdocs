<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Proposal Preview</title>
</head>

<link href="<?php JPATH_SITE ?>templates/camassistant_left/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php JPATH_SITE ?>templates/camassistant/css/popup.css" rel="stylesheet" type="text/css"/>
<body class="Body_proposals">
<?php
/**
 * @version		1.0.0 camassistant $
 * @package		camassistant
 * @copyright	Copyright ? 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */
//http://192.168.1.30/camassistant/index.php?option=com_camassistant&controller=proposals&Itemid=56&task=vendor_proposal_preview&view=proposals&rfp_id=24
// no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal');
$user = JFactory::getUser();
$act = $_REQUEST['act'];
$action = JRequest::getVar('action','');
//echo '<pre>'; print_r($_REQUEST);
$Itemid = JRequest::getVar('Itemid','');
$Alt_bid = JRequest::getVar('Alt_bid','');
$Alt_Prp = JRequest::getVar('Alt_Prp','');
$Proposal_id = JRequest::getVar('Proposal_id','');
$RFP = $this->RFP_details;
$TASKS_DOCS = $this->Tasks_DOCS_details;
$TASKS = $this->TASKS_details;
$DOCS = $this->DOCS_details;
$PRICE = $this->Proposal_price_details;
$SPL_REQ_DETAILS = $this->SPLRequirements_details;
$SPL_REQ_TABS = $this->SPL_REQ_tabs;
$Review_reqCatList = $this->SPLRequirements_details;
//$cat = $this->SPLReq_Category;
$cat = $Review_reqCatList['main'];
$main = $Review_reqCatList['main'];
$sub = $Review_reqCatList['sub'];
$child = $Review_reqCatList['child'];
$child_price=array();
$SPLreq_amount = $this->SPLreq_amount;
$Form_status = $this->Form_status;
if($Form_status == 'ITB')
$Form_status = "Unsubmitted";
$Form_bidded_date = $this->Form_bidded_date;
$rfp_id = JRequest::getVar('rfp_id','');
$vdata = $this->vendor_name;
//echo  '<pre>'; print_r($TASKS_DOCS);
$db = JFactory::getDBO();
$sql = 'SELECT County FROM #__cam_counties WHERE id = '.$RFP->divcounty;
		$db->Setquery($sql);
		$county = $db->loadResult();

		$property_details="SELECT property_id FROM #__cam_rfpinfo where id='".$rfp_id."'";
$db->Setquery($property_details);
$property = $db->loadResult();

		$sql1 = 'SELECT property_manager_id,property_name FROM #__cam_property WHERE id = '.$property;
		$db->Setquery($sql1);
		$property_det = $db->loadObject();
		$property_manager_id = $property_det->property_manager_id ;
		
		$sql2 = 'SELECT name,lastname,phone,extension,email FROM #__users WHERE id = '.$RFP->cust_id;
		$db->Setquery($sql2);
		$property_manager_detail = $db->loadObjectList();
		?>
		<script type="text/javascript">
function PrintDiv() {
	var divToPrint = document.getElementById('vender_right2proposals');
    var popupWin = window.open('', '_blank', 'width=300,height=300');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close(); 		
		}
</script>
<div style="background:#ccc">
<p style="height:20px;"></p>
<div class="containerpreview clr" style="width:673px; background:#fff; padding-top:1px; padding-bottom:1px;">
<form name="vendor_Edit_proposal_form" method="post" action="index.php?option=com_camassistant&controller=proposals&task=Proposal_save_as&rfp_id=<?PHP echo $RFP->id  ?>"/>
<div id="vender_right2proposals" style="padding:0px;">
<!-- Top menu starts -->
<div align="center" id="instructionsprint" style="margin:15px;">
<table><tr>
  <?PHP if($Alt_bid == 'cancel') {?>
<td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_submit&Proposal_id=<?PHP echo $Proposal_id;?>&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&Itemid=<?PHP echo $Itemid;  ?>"><img src="templates/camassistant_left/images/review_submit.gif" alt="review &amp; submit" /></a></td>
<?PHP } else if($act == 'review') { ?>
<td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_edit&Proposal_id=<?PHP echo $Proposal_id;?>&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&reject=<?PHP echo $_REQUEST['reject']; ?>&act=Draft&status=<?PHP echo $Form_status; ?>&Itemid=<?PHP echo $Itemid;  ?>"><img src="templates/camassistant_left/images/continueediting.gif" alt="Continue Editing" /></a></td><td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_save_as&Proposal_id=<?PHP echo $Proposal_id;?>&act=submitproposal&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&submit_type=Submit&Itemid=106"><img src="templates/camassistant_left/images/submitpraposal.gif" alt="Submit Proposal" /></a></td>
<?PHP }  else { ?> 
 
<?PHP } ?>
<td><a id="printicon" href="javascript:PrintDiv();"><img align="right" src="templates/camassistant_left/images/PRINT.gif" /></a></td></tr></table>
</div>
<?php /*?><div class="green-heading" id="dotshead_green"><?PHP if($Alt_Prp == 'yes') { ?><font color="#FF0000">ALTERNATE PROPOSAL FORM </font><?PHP } else { ?> PROPOSAL FORM <?PHP } ?> - <?PHP echo $RFP->projectName.' - STATUS: Submit &nbsp;'.$Form_bidded_date;  ?></div><?php */?>
<!-- eof dotshead -->
<?php /*?><div style="float:right"><a href="javascript:PrintDiv();">Printer Friendly Version</a></div><br /><?php */?>
<div id="shadowproposals" style="padding-bottom:0px;">

<div id="i_bar">
<div id="i_bar_txt" style="text-align:center; float:none; width:636px; font-size:14px;">
<span><strong> <?PHP echo strtoupper($vdata->company_name); ?> </strong></span>
</div>
</div>


<!-- sof table pan -->
<div class="table_pannel">


<div class="head_bluebg2" style="background:none;"><!--sof rfp box--><?PHP //echo $RFP->projectName.' - '.$RFP->industry_name;  ?> <?PHP //echo sprintf('%06d', $RFP->id);   ?>
    <div id="rpf_ifo" style="margin-top:-6px;">
	
    <div id="i_bar_gr_small" style="margin-bottom:6px;">
<div id="i_bar_txt_smalli" style="text-align:center;">
<span style="padding-left:0px; color:#fff; font-size:14px;"><strong>RFP CONTACT INFO</strong></span></div>
</div>
   <?php /*?> <div id="rpf_ifo_text"><h1>Property Management Company:</h1>
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
    </div><?php */?>
        <div id="rpf_ifo_text">

<br /><span><strong><?PHP echo $vdata->company_name;  ?></strong></span>
<?PHP echo $vdata->contact_name;  ?><br />
<?PHP echo $vdata->company_address;  ?><br />
<?PHP echo $vdata->city.',&nbsp;'.strtoupper($vdata->state).'&nbsp;'.$vdata->zipcode;  ?><br /><br />
<?PHP echo "P:&nbsp;".$vdata->company_phone; if($vdata->phone_ext) { echo "&nbsp;(".$vdata->phone_ext.')'; }?><br />
<?php if($vdata->alt_phone!='--'){
echo "Alt:&nbsp;".$vdata->alt_phone; if($vdata->alt_phone_ext) { echo "&nbsp;(".$vdata->alt_phone_ext.')'; }?><br />
<?php } ?>
<a href="mailto:<?PHP echo $vdata->email;  ?>"><?PHP echo $vdata->email;  ?></a><br />
    </div>
    <?php //echo '<pre>'; print_r($RFP); ?>
    </div>
<!--eof rfp box-->
 </div>
</div>
</div>
<?php
$db=JFactory::getDBO();
$property_details="SELECT property_id FROM #__cam_rfpinfo where id='".$rfp_id."'";
$db->Setquery($property_details);
$property_id = $db->loadResult();

$pimage = "SELECT property_image FROM #__cam_property WHERE id='".$property_id."' ";
$db->Setquery($pimage);
$filename = $db->loadResult();
if( $filename ) {
		$path2 = $siteURL."components/com_camassistant/assets/images/property_pictures/";
		$path1 = $filename;
		$image = $path2.$path1;	
		$image = str_replace(' ','%20',$image);
		$apath= getimagesize($image);
		$height_orig=$apath[1];
		$width_orig=$apath[0];
		$aspect_ratio = (float) $height_orig / $width_orig;
		$thumb_width =404;
		$thumb_height = round($thumb_width * $aspect_ratio) ;
		if($thumb_height == 0){
		$thumb_height = '300';
		}		
		$image = "<div id='property_image'><img  width=".$thumb_width." height=".$thumb_height." src='components/com_camassistant/assets/images/property_pictures/".$filename."'></div><div class='clear'></div><p style='height:20px'></p>";
		}	
else{
$image = '<div style="margin-left: 15px; margin-top:-8px;">
<div style="margin-top:-10px; font-size:15px; display:table-cell; text-align:center; vertical-align:middle; width:407px; height:298px; box-shadow:1px 1px 2px 1px #808080;">
No Image available for this Property.</div></div>';
$cleamsg = '<div class="clear"></div><p style="height:20px"></p>';
}	
echo $image ;
?>
<?php echo $cleamsg; ?>

<div id="i_bar_basicinfo">
<div id="i_bar_txt" style="text-align:center; float:none; width:643px;">
<span><strong><?PHP echo strtoupper($RFP->projectName) ;  ?></strong></span>
</div>
</div>

<div class="proposal_form" id="rfp_data_manager">

<div class="signupreview">
<label><strong>Property Name:</strong> <?PHP echo str_replace('_',' ',$property_det->property_name) ;  ?></label>
</div>
<div id="rpf_ifo_text_new" style="margin-right:1px;">
<font style="font-size: 13px;    font-weight: bold;">Property Manager:</font><br />
<?PHP echo $property_manager_detail[0]->name;  ?> <?PHP echo $property_manager_detail[0]->lastname;  ?><br />
<?php if ($RFP->showphone=='0') { ?>
P: <?PHP echo $property_manager_detail[0]->phone;  ?> (x<?PHP echo $property_manager_detail[0]->extension;  ?>)<br />
<?php } ?>
<?php if ($RFP->showemail=='0') {?>
<a href="mailto:<?PHP echo $property_manager_detail[0]->email;  ?>">Email Property Manager</a>
<?php } ?>
	<br />
<?php if ( $RFP->user_type !='16' ) { ?>	
	<p style="font-size: 13px;    font-weight: bold; margin-top:8px;">Property Management Company:</p>
<?php if ($RFP->showcompany=='0') {?>
<?PHP echo $RFP->comp_name;  ?><br />
<?php } ?>
<?php if ($RFP->showaddress=='0') {?>
<?PHP echo $RFP->mailaddress;  ?><br />
<?PHP echo $RFP->comp_city;  ?>, 
<?PHP $trimstate = trim($RFP->comp_state);
	  $letters_state = substr($trimstate,0,2) ;
	  echo strtoupper($letters_state);
  ?> 
 <?PHP echo $RFP->comp_zip;  ?><br />
<?php } ?>
<?php if ($RFP->showphone=='0') { ?>
P: <?PHP echo $RFP->comp_phno;  ?><br />
<?php } ?>
<?php if ($RFP->showfax=='0' && $RFP->comp_alt_phno!='--') {?>
Alt.Phone: <?PHP echo $RFP->comp_alt_phno;  ?><br />
<?php } ?>
<a href="http://<?PHP echo $RFP->comp_website;  ?>" target="_blank"><?PHP echo $RFP->comp_website;  ?></a>
<?php } ?>
    </div>
<div class="signupreview_new">
<label><strong>Requested Due Date:</strong> <?PHP echo $RFP->proposalDueDate.',&nbsp;'.$RFP->proposalDueTime  ?></label>
</div>
<?PHP
list($month, $day, $year) = explode("-", $RFP->startDate);
$date =  $day."-".$month."-".$year;
 ?>
<?PHP
list($month, $day, $year) = explode("-", $RFP->endDate);
$date =  $day."-".$month."-".$year;
 ?>
<div class="signupreview">
<label><strong>Property Address:</strong> <?PHP echo $RFP->street;  ?> </label>
</div>
<div class="signupreview">
<label><strong>County:</strong> <?PHP echo $county;  ?> </label>
</div>
<div class="signupreview">
<label><strong>City:</strong> <?PHP echo $RFP->city;  ?></label>
</div>
<div class="signupreview">
<label><strong>State:</strong> <?PHP echo $RFP->state;  ?></label>
</div>
<div class="signupreview">
<label><strong>Zip:</strong> <?PHP echo $RFP->zip;  ?></label>
</div>
<div class="signupreview">
<label><strong>Number Of Units:</strong> <?PHP echo $RFP->units;  ?></label>
</div>
<br />
</div>


<div class="clear"></div>
<div id="i_bar_basicinfo">
<div style="text-align:center; width:643px; font-size:14px;" id="i_bar_txt">
<span style="padding-left:0px; color:#fff;"><strong>SCOPE OF WORK (SOW)</strong></span></div>
</div>
<div class="lineitem_pan_row" style="padding-left:15px; padding-right:15px;">
<div style="margin-top: 6px; padding:5px; font-size:11px;border:1px solid #CDCDCD;">
<?PHP echo nl2br($RFP->jobnotes) ;  ?>
</div>

<?php
$bascifiles = $this->basicfiles ;
if($bascifiles) { ?>
<p style="height:5px;"></p>
<p><strong>Uploaded Files:</strong></p>
<p style="height:10px;"></p>
<table cellpadding="0" cellspacing="0">
	<?php for( $f=0; $f<count($bascifiles); $f++ ){
			if( $bascifiles[$f]->filename != '' && $bascifiles[$f]->filename != ' ' ){
	 ?>
		<tr class="basicfiles<?php echo $bascifiles[$f]->id; ?>"><td><a href="index.php?option=com_camassistant&controller=documents&task=viewbasicfile&filename=<?php echo $bascifiles[$f]->filename; ?>&filepath=<?php echo $bascifiles[$f]->filepath; ?>&rfpid=<?php echo $RFP->id; ?>" class="deletebasicfile"><img id="redimagebasci" alt="delete" src="templates/camassistant_left/images/green.png"></a></td><td>&nbsp;&nbsp;
		<a style="margin-left:-6px; font-size:14px;" id="openbasicfile" href="index.php?option=com_camassistant&controller=documents&task=viewbasicfile&filename=<?php echo $bascifiles[$f]->filename; ?>&filepath=<?php echo $bascifiles[$f]->filepath; ?>&rfpid=<?php echo $RFP->id; ?>"><?php  echo str_replace('_',' ',$bascifiles[$f]->filename) ; ?> </a></td></tr>
		<tr class="basicfiles<?php echo $bascifiles[$f]->id; ?>" height="0"></tr>
		<tr height="3"></tr>
	<?php }	}
	echo "</table>";
}	
	?>
<div class="clear"></div>
<?PHP   $price_cnt=0; for($i=0; $i<count($TASKS); $i++)
{ //echo "<pre>"; print_r($TASKS[$i]);?>
	<!--  sof line item pan -->
<div class="clear"></div>		
<span style="float:left; width:350px; font-size:14px;" class="grey_12">Response:</span>
<div class="clear"></div>	
<div class="lineitem_pan_row">
<div class="lineitem_pan">
<?php /*?>Referrence Name: <p><?PHP if($TASKS[$i]->rfpreference != '') echo $TASKS[$i]->rfpreference; else echo '-----'; ?> </p><?php */?>
<?PHP if($TASKS[$i]->addnotes_desc[0] != '') echo html_entity_decode($TASKS[$i]->addnotes_desc[0]); else echo '-----'; ?>
<?PHP if($TASKS[$i]->is_req_taskvendors == 1) { $price_cnt = $price_cnt+1;?><br />
<strong>Line Item Price:</strong> <?PHP if($TASKS[$i]->price != '' && $TASKS[$i]->price!='(Line-Item Pricing)') { ?>$&nbsp;<?PHP echo $TASKS[$i]->price; ?> <?PHP } else echo '-----'; ?>
<?PHP } ?>
<?php //echo '<pre>'; print_r($TASKS[$i]); ?>
<br />
<?php if($TASKS[$i]->check_exception!='') { ?>
Exception:<p style="padding-left:0px;"> <?PHP if($TASKS[$i]->exception_desc[0] != '' && $TASKS[$i]->exception_desc[0]!='(list all Exceptions here)') echo $TASKS[$i]->exception_desc; else echo '-----'; ?>
    <?php } ?><br/>
 </div></div>
<table><div class="downloadfile">  <?Php if($files_cnt > 0) { ?>
    Uploaded Files:<?php } ?>
<?PHP $files_cnt = count($TASKS[$i]->uploaded_file); if($files_cnt > 0) { for($f=0; $f<$files_cnt; $f++){?>
<tr><td>
<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $TASKS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $TASKS[$i]->uploaded_file[$f]; ?>"><img src="templates/camassistant_left/images/green.png" alt="download file" align="absmiddle" /></a></td><td>
&nbsp;&nbsp;<a id="openbasicfile" href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $TASKS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $TASKS[$i]->uploaded_file[$f]; ?>"><?PHP echo $TASKS[$i]->uploadfile_title[$f];?></a>
</td></tr>
<?PHP } //end for loop ?>
<?PHP } //end if loop ?>
</div>
</table> 
<br/>
<!-- eof line item pan -->
<?PHP } ?>

<?php /* ?>
<?PHP if(count($DOCS)>0) { for($j=0; $j<count($DOCS); $j++)
{?>
<!-- sof line item pan -->
<?PHP if($DOCS[$j]->title != '') { ?>
<?php //echo '<pre>'; print_r($DOCS); ?>
<div class="downloadfile">
<span class="grey_12">Additional Document/Specification #<?PHP echo $j+1; ?>:</span><br />
Uploaded Files:
<p><strong><?PHP echo $DOCS[$j]->title;?></strong>
<?php /*?><a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $DOCS[$j]->title; ?>&path=<?PHP echo $DOCS[$j]->doc_path; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a><?php  <strong><?PHP echo $DOCS[$j]->upload_doc;?></strong>
<div class="clear"></div>
<?php /* ?>
<?PHP if($DOCS[$j]->is_req_docvendors == 1) { ?>
<div class="pricing_pan2">
Additional Item Price: $&nbsp; <?PHP echo $DOCS[$j]->price;  ?>
</div>
<?PHP } ?>
<?php *
</div>
<?PHP } ?>
<!-- eof line item pan -->
<?PHP } //for
 } //if ?><?php */ ?>
<!--  sof line item pan -->




 <?php /*?>Uploaded Files: <?PHP if($SPL_REQ_TABS[2]->uploadfile_title[0] != '') { ?><p><strong><?PHP echo $SPL_REQ_TABS[2]->uploadfile_title[0]; ?></strong>&nbsp;<?php /*?><a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $SPL_REQ_TABS[2]->uploadfile_title[0]; ?>&path=<?PHP echo $SPL_REQ_TABS[0]->uploaded_file[0]; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a> </p> <?PHP } ?>

</div>
<div class="clear"></div>
</div><?php */?>
<?php //} ?>


<!-- eof line item pan -->
<div class="clear"></div><br/>
 <?PHP

		$arr = explode('/',$PRICE[0]->warranty_filepath);
		$cnt = count($arr);
		$title = $arr[$cnt-1];
  ?>
  <div class="clear"></div>
  <span style="float:left; width:80px; font-size:14px;" class="grey_12proposals">Warranty: </span> 
    <div class="clear"></div>
<div class="lineitem_pan">
<?PHP if($PRICE[0]->warranty_file_area != '') { echo html_entity_decode($PRICE[0]->warranty_file_area);  } else echo 'Not Specified.'; ?>
</div>
<div class="clear"></div>
<?PHP if(($PRICE[0]->warranty_filepath != '' && $PRICE[0]->warranty_file_text == $title) || $PRICE[0]->warranty_file_text != '') { ?>
<?PHP if($PRICE[0]->warranty_filepath != '' && $PRICE[0]->warranty_file_text == $title) { ?><a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $PRICE[0]->warranty_file_text ?>&path=<?PHP echo $PRICE[0]->warranty_filepath ?>"><img src="templates/camassistant_left/images/green.png" vspace="2px"  alt="download file" align="absmiddle" /></a>&nbsp;<?php echo $PRICE[0]->warranty_file_text; ?><?PHP } }?>


<!--  sof line item pan -->
<div class="lineitem_pan_row">
<BR>
<div id="i_bar_gr_blue">
<div style="text-align:center; width:643px; font-size:14px; padding-left:0px;" id="i_bar_txt">
<span style="padding-left:0px; color:#fff;"><strong>PRICING</strong></span></div>
</div>
<div class="downloadfile">

<div class="proposal_pric_manager">
<span class="price_manager_label">TOTAL PROPOSAL PRICE:</span>
<span class="price_manager"><?PHP if($PRICE[0]->proposal_total_price != 0) echo '$'.number_format($PRICE[0]->proposal_total_price,2); else echo '----'; ?></span>
</div>
</div>

<div class="clear"></div>
<br />
<div align="center">
<table align="center"><tr>
  <?PHP if($Alt_bid == 'cancel') {?>
<div id="topborder_row" align="right"><td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_submit&Proposal_id=<?PHP echo $Proposal_id;?>&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&Itemid=<?PHP echo $Itemid;  ?>"><img src="templates/camassistant_left/images/review_submit.gif" alt="review &amp; submit" /></a></td></div></div>

<?PHP } else if($act == 'review') { ?>
<div id="topborder_row" align="right"><td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_edit&Proposal_id=<?PHP echo $Proposal_id;?>&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&reject=<?PHP echo $_REQUEST['reject']; ?>&act=Draft&status=<?PHP echo $Form_status; ?>&Itemid=<?PHP echo $Itemid;  ?>"><img src="templates/camassistant_left/images/continueediting.gif" alt="Continue Editing" /></a></td><td><a href="index.php?option=com_camassistant&controller=proposals&Alt_Prp=<?PHP echo $Alt_Prp;?>&task=Proposal_save_as&Proposal_id=<?PHP echo $Proposal_id;?>&act=submitproposal&vendor_id=<?PHP echo $user->id;?>&rfp_id=<?PHP echo $RFP->id; ?>&submit_type=Submit&sendmailsupport=yes&Itemid=106"><img src="templates/camassistant_left/images/submitpraposal.gif" alt="Submit Proposal" /></a></td></div>


<?PHP }  else { ?> 
<div id="topborder_row" align="right">
 
</div>
<?PHP } ?>

<td><a id="printicon" href="javascript:PrintDiv();"><img align="right" src="templates/camassistant_left/images/PRINT.gif" /></a></td></tr></table>
</div>
<!-- eof line item pan -->

<input type="hidden" name="Itemid" value="<?PHP echo $_REQUEST['Itemid']; ?>" />
<input type="hidden" name="Proposal_id" value="<?PHP echo $Proposal_id; ?>" />
<input type="hidden" name="act" value="Update" />
<input type="hidden" name="rfp_id" value="<?PHP echo $_REQUEST['rfp_id']; ?>" />
<input type="hidden" name="submit_type" id="submit_type" />
<input type="hidden" name="Alt_Prp" id="Alt_Prp" />
<input type="hidden" name="sendmailsupport" value="yes" />
</form>

</body>
</div>
</div>
</div>
</div>
<?php 
exit;
?>
