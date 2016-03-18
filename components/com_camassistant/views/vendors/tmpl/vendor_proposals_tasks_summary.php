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
// Your custom code here
JHTML::_('behavior.modal');
$from = JRequest::getVar('from','');
$document =& JFactory::getDocument();
$document->addStyleSheet('templates/camassistant_left/css/style.css');
$RFP_info = $this->RFPinfo;
$BID_info = $this->BIDinfo;
$BID_Vendors_info = $this->BiddedVendorsInfo;
$TASKS_summary = $this->TASKS_summary;
$DOCS_summary = $this->DOCS_summary;
$com_phone = explode('-',$RFP_info->comp_phno) ;
//echo "<pre>"; print_r($TASKS_summary);	
?>
<link rel="stylesheet" type="text/css" href="templates/camassistant_left/css/style.css">
<div id="mc_container">

<!--SOF header-->
<div id="mc_header">
<div id="mc_logo"><a href="#"><img src="templates/camassistant_left/images/<?PHP echo $RFP_info->comp_logopath; ?>" width="432" height="133" alt="Management company" /></a></div>
<div id="mc_companyadres"><img src="templates/camassistant_left/images/mc_headicons.jpg" width="103" height="29" / style=" padding-bottom:15px;"><br />
<strong><?PHP echo $RFP_info->comp_name; ?></strong><br />
<?PHP echo $RFP_info->mailaddress; ?>.<br />
<?PHP echo $RFP_info->comp_city; ?>, <?PHP echo $RFP_info->comp_state; ?> <?PHP echo $RFP_info->comp_zip; ?><br />
<strong>P</strong>: (<?PHP echo $com_phone[0] ?>) <?PHP echo $com_phone[1] ?>-<?PHP echo $com_phone[2] ?> </div>
<div class="clear"></div>
</div>
<!--EOF header-->

<div id="mc_report">
<strong>Proposal Summary Report For:</strong><br />
<?PHP echo  $RFP_info->property_name; ?><br />
<?PHP echo  $RFP_info->street; ?><br />
<?PHP echo  $RFP_info->city; ?>, <?PHP echo  $RFP_info->state; ?> <?PHP echo  $RFP_info->zip; ?>
</div>

<?php /*?>
<div id="mc_report">
<div id="mc_summarydetails">
<strong>Summary Details:</strong><br />
<?PHP echo  $RFP_info->projectName; ?><br />
Industry Solicited<br />
RFP Close Date & Time:  <?PHP echo  $RFP_info->proposalDueDate; ?>  <?PHP echo  $RFP_info->proposalDueTime; ?><br />
<?PHP echo  $RFP_info->work_perform; ?>.<br />
Frequency: <?PHP echo  $RFP_info->frequency; ?>
</div>


<div id="mc_overviewdetails">
<strong>Proposal Overview Details:</strong><br />

Proposals Submitted:  <strong><?PHP echo  $BID_info->Submitted; ?></strong><br />
Proposals Rejected:  <strong><?PHP echo  $BID_info->Rejected; ?></strong><br />
High Bid: <strong> $<?PHP echo   number_format($BID_info->Max_Bid, 2, '.', ''); ?></strong><br />
Low Bid: <strong> $<?PHP echo  number_format($BID_info->Min_Bid, 2, '.', ''); ?></strong><br />
Average Bid: <strong> $<?PHP echo  number_format($BID_info->Average_Bid, 2, '.', ''); ?></strong><br />
</div>

<div class="clear"></div>
</div>
<?php */?>
<!-- sof table pan-->
<div class="mc_tablepan">
<p style="padding-top:18px;"></p>

</div>
<!-- eof table pan-->

<!-- sof table pan-->
<div>
<div>
<table width="25%" border="0" cellpadding="0" cellspacing="0">
    <tr>
	<?PHP $cnt=count($BID_Vendors_info); if($from == '') { $from=0; $cnt=4; } if($cnt>0){ for($v=$from; $v<$cnt; $v++) {?>
    <td align="left" valign="top">
    <div class="mc_tablepan">
    <table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="25%"  class="mc_heads01" bgcolor="<?PHP if($v==0||$v==2) echo '#21314d'; else echo '#7ab800';?>" >VENDER <?PHP echo $v+1; ?></td>
    </tr>
  <tr>
    <td height="70"><img src="components/com_camassistant/assets/images/vendors/<?PHP echo $BID_Vendors_info[$v]->image ?>" alt="Flowerbed Design" width="198" height="53" /></td>
    </tr>
	 <tr>
    <td><?PHP echo $BID_Vendors_info[$v]->company_name; ?></td>
    </tr>
	 <tr>
    <td height="15" style="border: 0px none ;"></td>
  </tr>
  <tr>
    <td bgcolor="<?PHP if($v%2==0) echo '#7ab800'; else echo '#21314d';?>" class="mc_heads02" style="font-size:13px;">PRICING PER LINE ITEM:</td>
    </tr>
  <tr>
    <td style="border:0px solid #DADADA"><table width="100%"><?PHP //echo "<pre>"; print_r($TASKS_summary); exit;
	$cnt_tasks=count($TASKS_summary); if($cnt_tasks>0){
	 for($T=0; $T<$cnt_tasks; $T++) 
	 {
	 $cnt_notes = count($TASKS_summary[$T]->task_price); 
	//echo $T+1; echo "<br>"; 
	 echo '<tr><td style="height:40px"> ';
	 //echo "<pre>"; print_r($TASKS_summary[$T]->task_price); 
	 for($N=0; $N<$cnt_notes; $N++)
	 {
	 //echo $TASKS_summary[$T]->task_price[$N]->item_price;
	    if(($TASKS_summary[$T]->task_price[$N]->vendor_id == $BID_Vendors_info[$v]->proposedvendorid) && $TASKS_summary[$T]->task_price[$N]->item_price != '')
		 {  ?>
		<?PHP   if($TASKS_summary[$T]->is_req_taskvendors == '1'){ ?> <?PHP echo $TASKS_summary[$T]->linetaskname;?>: <?PHP  echo '<br/> $ '.$TASKS_summary[$T]->task_price[$N]->item_price; }  ?>
		<?PHP
	    }
		/*else if($TASKS_summary[$T]->task_price[$N]->vendor_id != $BID_Vendors_info[$v]->proposedvendorid)
		{
		$stat = '--';
		echo $stat; 
		}*/
		else
		echo "&nbsp;";
		
	 } echo '</td></tr>';
	  }?> <?PHP } ?>
	</table></td>
  </tr>

  <tr>
    <td bgcolor="<?PHP if($v%2==0) echo '#7ab800'; else echo '#21314d';?>" class="mc_heads06" style=" padding:5px;">PRICING PER DOCUMENT UPLOADED BY RFP REQUESTOR:</td>
  </tr>
 <tr>
    <td style="border:0px solid #DADADA"><table width="100%"><?PHP //echo "<pre>"; print_r($DOCS_summary); exit;
	$cnt_docs=count($DOCS_summary); if($cnt_docs>0){ for($D=0; $D<$cnt_docs; $D++) {?>
	<tr><td><?PHP echo $DOCS_summary[$D]->title;?> <?PHP if($DOCS_summary[$D]->is_req_docvendors == '1')  echo '<br/><span class="mc_heads05">  $ '.$DOCS_summary[$D]->doc_price;  echo '</span>'; ?></td></tr>
	<?PHP } ?> <?PHP } ?>
	</table></td>
  </tr>
  
  
    </table>
    </div>
    </td>
    <?PHP }//end for loop 
	}//if loop ?>
  </tr>
    <tr>
      
    </tr>
</table>
</div>
</div>
<!-- eof table pan-->


<!-- sof table pan-->
<div class="mc_tablepan">
<p style=" padding-top:3px;"></p>

</div>
<!-- eof table pan-->


<!--sof footer-->
<div id="mc_footer"><a href="index.php?option=com_camassistant&controller=vendors&task=vendor_proposals_summary&rfp_id=<?PHP echo $BID_Vendors_info[0]->rfpno ?>">Prev</a> Proposal Report Page 2 of 4 <a href="index.php?option=com_camassistant&controller=vendors&task=vendor_proposals_notes_summary&rfp_id=<?PHP echo $BID_Vendors_info[0]->rfpno ?>">Next</a><br />
<?php /*?><a href="index.php?option=com_camassistant&controller=vendors&task=vendor_proposals_tasks_summary&rfp_id=<?PHP echo $BID_Vendors_info[0]->rfpno ?>&from=4">Other Proposals</a><?php */?>

<span>Copyright 2011 </span> <a href="#" class="mc_camlink">CAMassistant.com</a>
</div>
<!--sof footer-->


</div>

<?PHP exit; ?>





