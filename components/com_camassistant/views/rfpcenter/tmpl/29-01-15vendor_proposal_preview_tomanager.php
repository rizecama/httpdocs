<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Proposal Preview</title>
</head>

<link href="<?php JPATH_SITE ?>templates/camassistant_left/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php JPATH_SITE ?>templates/camassistant/css/popup.css" rel="stylesheet" type="text/css"/>
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Open+Sans+Condensed:700" rel="stylesheet" type="text/css" />
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
<span style="padding-left:0px; color:#fff; font-size:14px;"><strong>CONTACT INFO</strong></span></div>
</div>
   
<div id="rpf_ifo_text">

<br /><?PHP echo $vdata->company_name;  ?><br />
<?PHP echo $vdata->contact_name;  ?><br />
<?PHP echo $vdata->company_address;  ?><br />
<?PHP echo $vdata->city.',&nbsp;'.strtoupper($vdata->state).'&nbsp;'.$vdata->zipcode;  ?><br /><br />
<?PHP echo "P:&nbsp;".$vdata->company_phone; if($vdata->phone_ext) { echo "&nbsp;(".$vdata->phone_ext.')'; }?><br />
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
<span><strong> BASIC INFORMATION </strong></span>
</div>
</div>

<div class="proposal_form" id="rfp_data_manager">

<div class="signupreview">
<label><strong>Reference Name:</strong> <?PHP echo $RFP->projectName ;  ?></label>
</div>
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
	<p style="font-size: 13px; margin-top:8px; font-weight: bold;">Property Management Company:</p>
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
<div id="rpf_ifo_text_new" style="margin-right:1px;">
<h1>Site Visit Requirement:</h1>
<input name="" type="text" style="width:193px; background-color:#F7F7F7; color:#7D7D7D; border:1px solid #D7D7D7; padding:3px;" value="<?PHP echo $RFP->site_visit;  ?>" readonly="readonly" />
<?php if($RFP->site_visit!='Not Required') { ?>
<br/><div readonly="readonly" cols="23" style="width:199px; text-align:left; padding:3px; font-family:arial; font-size:12px; color:#7D7D7D; border:1px solid #D7D7D7; background:#F7F7F7; margin-top:9px;"><?PHP echo $RFP->bidders_info;   ?></div>
<?PHP } ?>
</div>

</div>

<br />
<div class="clear"></div>
<div id="i_bar_basicinfo">
<div style="text-align:center; width:643px; font-size:14px;" id="i_bar_txt">
<span style="padding-left:0px; color:#fff;"><strong>SCOPE OF WORK (SOW)</strong></span></div>
</div>
<div class="lineitem_pan_row" style="padding-left:15px; padding-right:15px;">
<?PHP   $price_cnt=0; for($i=0; $i<count($TASKS); $i++)
{ //echo "<pre>"; print_r($TASKS[$i]);?>
	<!--  sof line item pan -->

<?PHP if($TASKS[$i]->is_modified==1) { ?>
<span class="grey_12proposals" style="color:#FF0000; font-size:15px;" title="This is modified Line Item">Line Item #<?PHP echo $i+1; ?>:
</span>
<?PHP } else { ?>
<span class="grey_12proposals" style="float:left; width:628px; font-size:14px;">Line Item #<?PHP echo $i+1; ?>: <?PHP echo $TASKS[$i]->linetaskname; ?></span>
<br /><span class="grey_12proposals" style="float:left; width:56px;">Description:</span><?PHP 
if($TASKS[$i]->task_desc != ''){
$html = nl2br($TASKS[$i]->task_desc) ;
$html = preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<span.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<ul.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<div.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<li.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html_notes = preg_replace('/(<a.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html_notes = preg_replace('/(<td.+?)style=".+?"(>.+?)/i', "$1$2", $html_notes);
$html_notes = preg_replace('/[^(\x20-\x7F)]*/','', $html_notes);
$html_notes = str_replace('?','.', $html_notes);

echo $html_notes; 
}
else {
echo '-----';
}
 ?>
<?PHP }  ?>
<!--<span class="grey_12" style="float:right; width:350px" ><?PHP if($TASKS_DOCS[$i]->title != '') { ?><p>Attachment #<?PHP echo $i+1; ?>: <?PHP echo $TASKS_DOCS[$i]->title; ?><?PHP } ?></p>
</span>-->
 <table align="left">
<?PHP if($TASKS[$i]->taskuploads != '') {?>
<!-- sof line item pan -->
<!--<div class="downloadfile">-->
   <?php //echo '<pre>'; print_r($TASKS_DOCS); ?>
<!--<span class="grey_12">Attachment #<?PHP echo $i+1; ?>:</span> &nbsp;&nbsp;&nbsp;
<strong><?PHP //echo str_replace('_',' ',$TASKS_DOCS[$i]->title);?></strong> &nbsp;&nbsp;&nbsp;-->
<?php
$db =& JFactory::getDBO();

$property_details="SELECT property_id FROM #__cam_rfpinfo where id='".$rfp_id."'";
$db->Setquery($property_details);
$property_id = $db->loadResult();


$property_details="SELECT property_name,tax_id FROM #__cam_property where id='".$property_id."'";
$db->Setquery($property_details);
$property = $db->loadObject();
$default = 'components/com_camassistant/doc/';
//$uploaded_file= str_replace(' ','',$TASKS_DOCS[$i]->taskuploads);
$linetaks->taskuploads=$TASKS_DOCS[$i]->taskuploads;
$linetaks->taskuploads = str_replace(' ,','',$linetaks->taskuploads);
    $linetaks->taskuploads = str_replace(',,',',',$linetaks->taskuploads);
     $linetaks->taskuploads = str_replace(' ','',$linetaks->taskuploads);
 $uploads= explode(',',$linetaks->taskuploads );
    if(count($uploads)>0 && count($linetaks->taskuploads)>0 ){

         for ($l=0;$l<count($uploads);$l++){  ?>
    <?php  $uploads1=explode('/',$uploads[$l]);
       if($uploads[$l] && $uploads[$l]!=' '){

 $uploads23=explode('/',$uploads[$l]);
 //echo '<pre>'; print_r($uploads23);
//echo $uploads1;
 // $uploads=explode('/',$linetaks->taskuploads);
 $upcount=count($uploads1);
// echo "Filename:".$linetaks->taskuploads;
if($uploads23[0]=='components' && $uploads23[1]=='com_camassistant' && $uploads23[2]=='doc' ){
 $file_link = str_replace(' ','',$uploads[$l]);
 } else if($uploads23[0]=='components' && $uploads23[1]=='com_camassistant' && $uploads23[2]=='assets' ){
    $file_link =  str_replace(' ','',$uploads[$l]);
 } else {
 $file_link = $default.str_replace(' ','_',$property->property_name).'_'.$property->tax_id.'/'.str_replace(' ','',$uploads[$l]);
 }
//echo $file_link;
// $file_link = $default.$p_name.'_'.$property->tax_id.'//'.$linetaks->taskuploads;
 $file_link= str_replace('// ','/',$file_link); ?>
    <tr><td><span class="grey_12">Attachment #<?PHP echo $l+1; ?>:&nbsp;&nbsp;&nbsp;</span></td><td><span style="float:left;font-size:10px;width:auto; padding-right:5px;">
<a href="index.php?option=com_camassistant&controller=popupdocs&task=open&title=<?php echo str_replace(' ','',$uploads1[$upcount-1]); ?>&path=<?php print_r($file_link); ?> "><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a></span></td>&nbsp;&nbsp;&nbsp;<td><span style="float:left;font-size:14px;width:auto; padding-right:5px; font-size:14px;"><?php   $upcount=count($uploads1); ?> <?php echo $uploads1[$upcount-1]; ?></span></td></tr>
<?php } } }  ?>
<!--<a href="index2.php?option=com_camassistant&controller=popupdocs&task=open&title=<?PHP echo $TASKS_DOCS[$i]->title; ?>&path=<?PHP echo $file_link; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a>
</div>
<div class="clear"></div>-->
<!-- eof line item pan -->
<?PHP } ?></table>
<div class="clear"></div>
<div class="lineitem_pan">
<?php /*?>Referrence Name: <p><?PHP if($TASKS[$i]->rfpreference != '') echo $TASKS[$i]->rfpreference; else echo '-----'; ?> </p><?php */?>
<strong>Notes:</strong> <?PHP if($TASKS[$i]->addnotes_desc[0] != '') {
$html = html_entity_decode($TASKS[$i]->addnotes_desc[0]) ;
$html = preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<span.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<ul.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<div.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<li.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<a.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h1.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h2.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h3.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h4.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h5.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h6.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<h7.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = preg_replace('/(<font.+?)style=".+?"(>.+?)/i', "$1$2", $html);
$html = str_replace('h6', 'h4', $html);
$html = str_replace('h3', 'h4', $html);
echo $html; 
}
else 
{
echo '-----';
}
 ?>
<?PHP if($TASKS[$i]->is_req_taskvendors == 1) { $price_cnt = $price_cnt+1;?><br />
<strong>Line Item Price:</strong> <?PHP if($TASKS[$i]->price != '' && $TASKS[$i]->price!='(Line-Item Pricing)') { ?>$&nbsp;<?PHP echo $TASKS[$i]->price; ?> <?PHP } else echo '-----'; ?>
<?PHP } ?>
<?php //echo '<pre>'; print_r($TASKS[$i]); ?>
<br />
<?php if($TASKS[$i]->check_exception!='') { ?>
Exception:<p style="padding-left:0px;"> <?PHP if($TASKS[$i]->exception_desc[0] != '' && $TASKS[$i]->exception_desc[0]!='(list all Exceptions here)') echo $TASKS[$i]->exception_desc; else echo '-----'; ?>
    <?php } ?><br/>
 <table><div class="downloadfile">  <?Php $files_cnt = count($TASKS[$i]->uploaded_file);
 if($files_cnt > 0) { ?>
    Uploaded Files:<?php } ?>
<?PHP $files_cnt = count($TASKS[$i]->uploaded_file); if($files_cnt > 0) { for($f=0; $f<$files_cnt; $f++){?>
<tr><td>
<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $TASKS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $TASKS[$i]->uploaded_file[$f]; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a></td><td>
<strong> <p style="padding:0px; font-size:13px;"> <?PHP echo $TASKS[$i]->uploadfile_title[$f];?></p></strong></td></tr>
<?PHP } //end for loop ?>
<?PHP } //end if loop ?>
</div>
</table>

</div>
<br/>
<!-- eof line item pan -->
<?PHP } ?><?php /* ?>
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
<span style="float:left; width:350px; font-size:14px;" class="grey_12proposals">General Notes:</span><div class="clear"></div>
<div class="lineitem_pan">
<p style="padding-left:0px;"><?PHP 
$html_gen = html_entity_decode($SPL_REQ_TABS[3]->addnotes_desc[0]) ;
$html_gen = preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<span.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<ul.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<div.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<li.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<a.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h1.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h2.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h3.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h4.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h5.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h6.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<h7.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = preg_replace('/(<font.+?)style=".+?"(>.+?)/i', "$1$2", $html_gen);
$html_gen = str_replace('h6', 'h4', $html_gen);
$html_gen = str_replace('h3', 'h4', $html_gen);
echo $html_gen; 
 ?></p>
 <!--<strong>General Exception:</strong> <p><?PHP echo nl2br($SPL_REQ_TABS[4]->exception_desc[0]); ?></p>-->
 <div class="downloadfile">
    <?php //echo '<pre>'; print_r($SPL_REQ_TABS[2]); ?>
 <?PHP $files_cnt = count($SPL_REQ_TABS[2]->uploadfile_title); if($files_cnt > 0) { echo "Uploaded Files:";  for($fh=0; $fh<$files_cnt; $fh++){?>

<p><strong> <?PHP if($SPL_REQ_TABS[2]->uploadfile_title != '') echo $SPL_REQ_TABS[2]->uploadfile_title[$fh]; else echo '-----'; ?></strong></p>
<!--<a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $TASKS[$i]->uploadfile_title[$f]; ?>&path=<?PHP echo $TASKS[$i]->uploaded_file[$f]; ?>"><img src="templates/camassistant_left/images/downloadfile.gif" alt="download file" align="absmiddle" /></a>-->

<?php } } ?></div></div>
<strong class="grey_12proposals">UPLOADED&nbsp;FILES: </strong>
<?php
$generaldocs = $this->generaldocs ;
for( $g=0; $g<count($generaldocs); $g++ ){ ?>
	<table class="gendos_<?PHP echo $generaldocs[$g]->id;  ?>"><tr><td><a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $generaldocs[$g]->filename; ?>&path=<?PHP echo $generaldocs[$g]->filepath; ?>"><img src="templates/camassistant_left/images/green.png" vspace="2px"  alt="download file" align="absmiddle" /></a> </td><td><p><strong><?PHP echo $generaldocs[$g]->filename; ?></strong></p></td></tr></table>
<?php }
?>	

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
<?PHP if($PRICE[0]->warranty_file_area != '') { 

$html_war = html_entity_decode($PRICE[0]->warranty_file_area) ;
$html_war = preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<span.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<ul.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<div.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<li.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<a.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h1.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h2.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h3.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h4.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h5.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h6.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<h7.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = preg_replace('/(<font.+?)style=".+?"(>.+?)/i', "$1$2", $html_war);
$html_war = str_replace('h6', 'h4', $html_war);
$html_war = str_replace('h3', 'h4', $html_war);
echo $html_war; 
  } else echo 'Not Specified.'; ?>
</div>
<div class="clear"></div>
<?PHP if(($PRICE[0]->warranty_filepath != '' && $PRICE[0]->warranty_file_text == $title) || $PRICE[0]->warranty_file_text != '') { ?><strong class="grey_12proposals">UPLOADED&nbsp;FILES: </strong><br><?PHP if($PRICE[0]->warranty_filepath != '' && $PRICE[0]->warranty_file_text == $title) { ?><a href="index2.php?option=com_camassistant&controller=proposals&task=downloadfile&title=<?PHP echo $PRICE[0]->warranty_file_text ?>&path=<?PHP echo $PRICE[0]->warranty_filepath ?>"><img src="templates/camassistant_left/images/downloadfile.gif" vspace="2px"  alt="download file" align="absmiddle" /></a><?PHP } 
 echo $PRICE[0]->warranty_file_text; ?>
<?php }?>


<!--  sof line item pan -->
<div class="lineitem_pan_row">
<BR>
<div id="i_bar_gr_blue">
<div style="text-align:center; width:643px; font-size:14px; padding-left:0px;" id="i_bar_txt">
<span style="padding-left:0px; color:#fff;"><strong>PRICING</strong></span></div>
</div>
<div class="downloadfile">

<div class="proposal_pric">
<label style="width:231px;"><strong>LINE ITEM PRICING ABOVE ADDED UP:</strong></label>
<?PHP  if($PRICE[0]->tasks_total_price != 0) echo '$'.number_format($PRICE[0]->tasks_total_price,2); else echo '----'; ?>
</div>
<!--
<div class="proposal_pric">
<label><strong>YOUR PRICE FOR ALL OTHER ITEMS :</strong></label><?PHP if($PRICE[0]->price_other_items != 0) echo '$'.number_format($PRICE[0]->price_other_items,2); else echo '----'; ?>
</div>
-->
<div class="proposal_pric">
<label style="width:160px;"><strong>TOTAL PROPOSAL PRICE:</strong></label> <?PHP if($PRICE[0]->proposal_total_price != 0) echo '$'.number_format($PRICE[0]->proposal_total_price,2); else echo '----'; ?>
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
