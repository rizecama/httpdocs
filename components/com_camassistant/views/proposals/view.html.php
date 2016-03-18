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

jimport( 'joomla.application.component.view' );

//class vendorsViewvendors extends Jview
class proposalsViewproposals extends Jview
{
	function display($tpl = null){
		// global $mainframe;
		$task = JRequest::getVar("task",'');
		//singnup process 2
		$user	= JFactory::getUser();
		//Restriction to access vendor page.
		/*if($user->user_type != 11)
		{
		$user	= JFactory::getUser();
		JRequest::setVar('task', 'not_authorized');
		JRequest::setVar('view', 'proposals');
		$this->setLayout('not_authorized');
		parent::display();
		}*/
		//to display vendor proposal form to bid
		if($task == 'vendor_docs')
		{
			$model = $this->getModel('proposals');
			$vendor_files = $model->getvendordocs();
			$this->assignRef('vendor_files', $vendor_files);
			$taxid = $model->getvendortaxid();
			$this->assignRef('taxid', $taxid);
			$this->setLayout('vendor_docs_layout');
			parent::display();
		}
		else if($task == 'marketdocs')
		{
			$model = $this->getModel('proposals');
			$vendor_files = $model->getvendormarketdocs();
			$this->assignRef('vendor_files', $vendor_files);
			$this->setLayout('vendor_market_layout');
			parent::display();
		}
		else if($task == 'upload_select')
		{
			$model = $this->getModel('proposals');
			$vendor_files = $model->getvendordocs();
			$this->assignRef('vendor_files', $vendor_files);
			$taxid = $model->getvendortaxid();
			$this->assignRef('taxid', $taxid);
			$this->setLayout('uploadfile_form');
			parent::display();
		}
		else if($task == 'openfiles')
		{
			$model = $this->getModel('proposals');
			$path = JRequest::getVar('path','');
			$openfiles = $model->getopenfiles($path);
			//echo "<pre>"; print_r($openfiles);
			$this->assignRef('openfiles', $openfiles);
			$this->setLayout('default4');
			parent::display();
		}
		else if($task == 'vendor_proposal_form')
		{
		$Alt_bid = JRequest::getVar('Alt_bid','');
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		$jobtype	= JRequest::getVar('jobtype','');
		if($Alt_bid != '')
		$Alt_Prp =  $Alt_bid;
		else
		$Alt_Prp =  $Alt_Prp;
		//$Alt_Prp = JRequest::getVar('Alt_bid','');
		$model = $this->getModel('proposals');
		//function to get vendor proposal status
		$Form_status = $model->get_Form_status();
		$this->assignRef('Form_status',$Form_status[0]->proposaltype);
		$this->assignRef('Form_bidded_date',$Form_status[0]->proposeddate);

		//function to get RFP details
		$RFP_details = $model->get_RFPinfo();
		//echo "<pre>"; print_r($RFP_details[0]); echo "</pre>";
		$this->assignRef('RFP_details',$RFP_details[0]);

		//function to get RFP Task details
		$TASKS_details = $model->get_TASKSinfo('Add',$Alt_Prp);
		$this->assignRef('TASKS_details',$TASKS_details);

		//function to get RFP Docs details
		$DOCS_details = $model->get_DOCSinfo('Add',$Alt_Prp);
		$this->assignRef('DOCS_details',$DOCS_details);

		//function to get RFP Tasks_Docs details
		$Tasks_DOCS_details = $model->get_Tasks_DOCSinfo($Alt_Prp);
		$this->assignRef('Tasks_DOCS_details',$Tasks_DOCS_details);

		//function to get RFP special Requirements details
		$SPLReq_Category = $model->get_SPLReq_Category();
		$this->assignRef('SPLReq_Category',$SPLReq_Category);

		//function to get RFP special Requirements details
		$SPLRequirements_details = $model->get_SPLRequirements('Add');
		$this->assignRef('SPLRequirements_details',$SPLRequirements_details);

		//function to get RFP special Requirements tabs Addnotes, Uploadfile, Addexception links
		$SPL_REQ_tabs = $model->get_SPLRequirements_tabs('Add',$Alt_Prp);
		$this->assignRef('SPL_REQ_tabs',$SPL_REQ_tabs);

		$vendor_GLI_compliance_alert = $model->get_chk_vendor_GLI_compliance_alert();
		//echo "<pre>"; print_r($vendor_GLI_compliance_alert);
		$getindustryids = $model->getindustry_ids($user->id);
		if($getindustryids)
		if(in_array('56',$getindustryids))
		$PLN_needed = 'yes'; else $PLN_needed = 'no';
		// For the basic request
		if( $jobtype == 'yes' ) {
		$basicfiles = $model->getbasicuploadfiles();
		$this->assignRef('basicfiles',$basicfiles);
		}
		//Completed
		// To get the special requirements
			$general_special = $model->getgenerallibilities();
			$this->assignRef('generalinfo', $general_special);
			$auto_special = $model->getautolibilities();
			$this->assignRef('autoinfo', $auto_special);
			$workers_special = $model->getworkerslibilities();
			$this->assignRef('workersinfo', $workers_special);
			$umb_special = $model->getumblibilities();
			$this->assignRef('umbinfo', $umb_special);
			$lic_special = $model->getliclibilities();
			$this->assignRef('licinfo', $lic_special);
			$omi_special = $model->getomilibilities();
			$this->assignRef('omiinfo', $omi_special);
		//Completed	
			
		//validation to redirect to vendor bidding form
		$type	= JRequest::getVar('type','');
		if($type != 'invitation'){
		$Prp_bids = $model->get_RFP_Maxbids();
		}
		else{
		$Prp_bids = '100' ;
		}
		//$rfp_24hrs = $model->get_rfp_rebid_chk();
		$vendor_bids = $model->get_validate_vendor_bids();
		if($Prp_bids == 0)
		$this->setLayout('bidding_expired');
		else if($jobtype == 'yes')
		$this->setLayout('vendor_proposal_form_basic');
		else
		$this->setLayout('vendor_proposal_form');
		//parent::display();
		}
		//to edit Submitted or Drafted proposed form
		else if($task == 'Proposal_edit')
		{
		$rebid	= JRequest::getVar('rebid','');
		$reject_access	= JRequest::getVar('reject','');
		if($rebid != 's')
		{
			$Alt_bid = JRequest::getVar('Alt_bid','');
			$Alt_Prp = JRequest::getVar('Alt_Prp','');
			if($Alt_bid != '')
			$Alt_Prp =  $Alt_bid;
			else
			$Alt_Prp =  $Alt_Prp;
		}
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		$model = $this->getModel('proposals');


		//function to get vendor proposal status
		$Form_status = $model->get_Form_status();
		$this->assignRef('Form_status',$Form_status[0]->proposaltype);
		$this->assignRef('Form_bidded_date',$Form_status[0]->proposeddate);

		//function to get RFP details in edit proposal form
		$RFP_details = $model->get_RFPinfo();
		$this->assignRef('RFP_details',$RFP_details[0]);

		//function to get RFP Task details in edit proposal form
		$TASKS_details = $model->get_TASKSinfo('Edit',$Alt_Prp);
		$this->assignRef('TASKS_details',$TASKS_details);
		$jobtype	= JRequest::getVar('jobtype','');
		if( $jobtype == 'yes' ) {
		$TASKS_details = $model->get_TASKSinfo_basic('Edit',$Alt_Prp);
		$this->assignRef('TASKS_details',$TASKS_details);
		}
		//function to get RFP Tasks_Docs details
		$Tasks_DOCS_details = $model->get_Tasks_DOCSinfo($Alt_Prp);
		$this->assignRef('Tasks_DOCS_details',$Tasks_DOCS_details);

		//function to get RFP Docs details in edit proposal form
		$Edit_DOCS_details = $model->get_Edit_DOCSinfo($Alt_Prp);
		$this->assignRef('DOCS_details',$Edit_DOCS_details);

		//function to get RFP special Requirements details
		$SPLReq_Category = $model->get_SPLReq_Category();
		$this->assignRef('SPLReq_Category',$SPLReq_Category);

		//function to get RFP special Requirements details
		$SPLRequirements_details = $model->get_SPLRequirements('Edit');
		$this->assignRef('SPLRequirements_details',$SPLRequirements_details);

		//function to get RFP Docs details in edit proposal form
		$DOCS_details = $model->get_DOCSinfo('Edit',$Alt_Prp);
		$this->assignRef('DOCS_details',$DOCS_details);

		//function to get Proposal bidding price details in edit proposal form
		$Proposal_price_details = $model->get_Proposal_price_details($Alt_Prp);
		$this->assignRef('Proposal_price_details',$Proposal_price_details);

		//function to get RFP special Requirements tabs Addnotes, Uploadfile, Addexception links
		$SPL_REQ_tabs = $model->get_SPLRequirements_tabs('Edit',$Alt_Prp);
		$this->assignRef('SPL_REQ_tabs',$SPL_REQ_tabs);

		//function to get special requirement amount
		$SPLreq_amount = $model->get_SPLreq_amount();
		$this->assignRef('SPLreq_amount',$SPLreq_amount);
		
		$generaldocs = $model->getgeneraldocs();
		$this->assignRef('generaldocs',$generaldocs);
		
		$jobtype	= JRequest::getVar('jobtype','');
		if( $jobtype == 'yes' ) {
		$basicfiles = $model->getbasicuploadfiles();
		$this->assignRef('basicfiles',$basicfiles);
		}
			if( $jobtype == 'yes' ) {
			$this->setLayout('vendor_proposal_edit_form_basic');
			}
			else{
			$this->setLayout('vendor_proposal_edit_form');
			}
		}
                 if($task == 'Addnotes')
		{
		$act = JRequest::getVar('Action','');
		/*if(isset($act) && $act == 'Edit')
		{*/
		$Alt_bid = JRequest::getVar('Alt_bid','');
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		if($Alt_bid != '')
		$is_Alt =  $Alt_bid;
		else
		$is_Alt =  $Alt_Prp;
		$model = $this->getModel('proposals');
		$spl_req = JRequest::getVar('spl','No');
		$Notes_content = $model->get_task_Addnotes($spl_req,$is_Alt);
		$this->assignRef('Notes_content',$Notes_content);
		/*} */
		$this->setLayout('task_addnotes_form');
		parent::display();
		}
		else if($task == 'Uploadfile')
		{
		$this->setLayout('task_uploadfile_form');
		parent::display();
		}
		else if($task == 'Addexception')
		{
//		echo "can"; exit;
		$act = JRequest::getVar('Action','');
		/*if(isset($act) && $act == 'Edit')
		{*/
		$Alt_bid = JRequest::getVar('Alt_bid','');
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		if($Alt_bid != '')
		$is_Alt =  $Alt_bid;
		else
		$is_Alt =  $Alt_Prp;
		$model = $this->getModel('proposals');
		$spl_req = $act = JRequest::getVar('spl','No');
		$Exception_content = $model->get_task_Addexception($spl_req,$is_Alt);
		$this->assignRef('Eception_content',$Exception_content);
		/*}*/
		$this->setLayout('task_addexception_form');
		parent::display();
		}
		else if($task == 'vendor_proposal_preview')
		{
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		$model = $this->getModel('proposals');
		//function to get RFP details in edit proposal form
		$RFP_details = $model->get_RFPinfo();
		$this->assignRef('RFP_details',$RFP_details[0]);

		//function to get RFP Task details in edit proposal form
		$TASKS_details = $model->get_TASKSinfo_preview('Preview',$Alt_Prp);
		$this->assignRef('TASKS_details',$TASKS_details);
		
		$jobtype	= JRequest::getVar('jobtype','');
		if( $jobtype == 'yes' ) {
		$TASKS_details = $model->get_TASKSinfo_preview_basic('Preview',$Alt_Prp);
		$this->assignRef('TASKS_details',$TASKS_details);
		}
		//function to get RFP Tasks_Docs details
		$Tasks_DOCS_details = $model->get_Tasks_DOCSinfo($Alt_Prp);
		$this->assignRef('Tasks_DOCS_details',$Tasks_DOCS_details);

		//function to get RFP Docs details in edit proposal preview
		$Edit_DOCS_details = $model->get_Edit_DOCSinfo($Alt_Prp);
		$this->assignRef('DOCS_details',$Edit_DOCS_details);

		//function to get RFP special Requirements details
		$SPLReq_Category = $model->get_SPLReq_Category();
		$this->assignRef('SPLReq_Category',$SPLReq_Category);

		//function to get RFP special Requirements details in edit proposal form
		$SPLRequirements_details = $model->get_SPLRequirements($Alt_Prp);
		$this->assignRef('SPLRequirements_details',$SPLRequirements_details);

		//function to get RFP Docs details in edit proposal form
		$DOCS_details = $model->get_DOCSinfo('Edit',$Alt_Prp);
		$this->assignRef('DOCS_details',$DOCS_details);

		//function to get Proposal bidding price details in edit proposal form
		$Proposal_price_details = $model->get_Proposal_price_details($Alt_Prp);
		$this->assignRef('Proposal_price_details',$Proposal_price_details);

		//function to get special requirement amount
		$SPLreq_amount = $model->get_SPLreq_amount();
		$this->assignRef('SPLreq_amount',$SPLreq_amount);

		//function to get RFP special Requirements tabs Addnotes, Uploadfile, Addexception links
		$SPL_REQ_tabs = $model->get_SPLRequirements_Preview('Edit',$Alt_Prp);
		$this->assignRef('SPL_REQ_tabs',$SPL_REQ_tabs);

		$Form_status = $model->get_Form_status();
		$this->assignRef('Form_status',$Form_status[0]->proposaltype);
		$this->assignRef('Form_bidded_date',$Form_status[0]->proposeddate);
		
		$generaldocs = $model->getgeneraldocs();
		$this->assignRef('generaldocs',$generaldocs);
		
		$vendorcdata = $model->getvendordetails();
		$this->assignRef('vendorcdata',$vendorcdata);
		
		$jobtype	= JRequest::getVar('jobtype','');
		
		if( $jobtype == 'yes' ) {
		$basicfiles = $model->getbasicuploadfiles();
		$this->assignRef('basicfiles',$basicfiles);
		}
		
		// To get the special requirements
			$general_special = $model->getgenerallibilities();
			$this->assignRef('generalinfo', $general_special);
			$auto_special = $model->getautolibilities();
			$this->assignRef('autoinfo', $auto_special);
			$workers_special = $model->getworkerslibilities();
			$this->assignRef('workersinfo', $workers_special);
			$umb_special = $model->getumblibilities();
			$this->assignRef('umbinfo', $umb_special);
			$lic_special = $model->getliclibilities();
			$this->assignRef('licinfo', $lic_special);
			$omi_special = $model->getomilibilities();
			$this->assignRef('omiinfo', $omi_special);
		//Completed	
		
		$proposal_type = $model->checkprposaltype();
		$pagefrom	= JRequest::getVar('pagefrom','');
		
		if( $proposal_type == 'Draft' || $proposal_type == 'review' || $proposal_type == 'ITB'  ){
			if( $jobtype == 'yes' ) {
				if($pagefrom == 'draftstatus')
				$this->setLayout('vendor_proposal_form_draft_basic');
				else
				$this->setLayout('vendor_proposal_preview_form_basic');
			}
			else{
				if($pagefrom == 'draftstatus')
				$this->setLayout('vendor_proposal_form_draft');
				else
				$this->setLayout('vendor_proposal_preview_form');
			}
		}
		else{
			if( $jobtype == 'yes' ) {
			$this->setLayout('vendor_proposal_preview_form_basic_submit');
			}
			else{
			$this->setLayout('vendor_proposal_preview_form_submit');
			}
		
		}
		
		parent::display();
		}
		
		else if($task == 'not_authorized')
		{
		$this->setLayout('not_authorized');
		parent::display($tpl);
		}
		else if($task == 'warranty_docs')
		{
		$model = $this->getModel('proposals');
		//functio to get vendor docs in warranty form
		$pfiles = $model->get_warranty_files();
		//echo "<pre>"; print_r($pfiles);
		$this->assignRef('pfiles', $pfiles);
		$this->setLayout('warranty_docs_form');
		parent::display();
		}
		else if($task == 'warranty_popup')
		{
		$model = $this->getModel('proposals');
		//functio to get vendor docs in warranty form
		$pfiles = $model->get_warranty_files();
		$this->assignRef('pfiles', $pfiles);
		$this->setLayout('warrrant_popup');
		parent::display();
		}
                else if($task == 'reasondecline'){
		$this->setLayout('declinereason');
		parent::display();
		}
		else
		{
		$model = $this->getModel('proposals');
		parent::display($tpl);
		}

	}

}
?>