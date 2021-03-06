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

class rfpcenterViewrfpcenter extends Jview
{
	function display($tpl = null)
	{
		//echo "iam hre"; exit;
		global $mainframe;
		 $db = JFactory::getDBO();
		$task = JRequest::getVar("task",'');
		$pathway  =& $mainframe->getPathway();
		
		//$pathway->addItem( JText::_( 'Unsubmitted (Draft) RFPs' ));
		// Load the form validation behavior
		JHTML::_('behavior.formvalidation');
	 	if($task=='submitedrfp')
		{
			$pathway->addItem( JText::_( 'Submitted RFPs' ));
			$model = $this->getModel('rfpcenter');
			$details = $model->getsubmitedrfp();
			//echo "<pre>"; print_r($details);
			$pagination =& $this->get('Pagination');
            $announcement = $model->getannouncement();
			//$limit=JRequest::getVar('limit', 5, '', 'int');
			//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
			//print_r($pagination);

			$this->assignRef('pagination', $pagination);
            $this->assignRef('announcement',$announcement);
			$this->assignRef('details',$details);

			$this->setLayout('default');
			parent::display($tpl);
		}

		if($task=='unsubmittedrfp')
		{
			$pathway->addItem( JText::_( 'Unsubmitted (Draft) RFPs' ));
			$model = $this->getModel('rfpcenter');
			$details1 = $model->getunsubmittedrfp();

		//$limit=5;
		//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$pagination1 =& $this->get('Pagination1');
		$this->assignRef('pagination1', $pagination1);
		$this->assignRef('details1',$details1);
		$this->setLayout('unsubmittedrfp');
		parent::display($tpl);
		}
		if($task=='closedrfp')
		{
		$pathway->addItem( JText::_( 'Closed RFPs' ));
		$model = $this->getModel('rfpcenter');
		$details2 = $model->getclosedrfp();
		//echo "<pre>"; print_r($details2);
		//$limit=5;
		//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$pagination2 =& $this->get('Pagination2');
		$this->assignRef('pagination2', $pagination2);
		$this->assignRef('details2',$details2);
		$this->setLayout('closedrfp');
		parent::display($tpl);
		}
		if($task=='awardrfp')
		{
		$pathway->addItem( JText::_( 'Award RFPs' ));
		$model = $this->getModel('rfpcenter');
		$details4 = $model->getawardrfp();
		//echo "<pre>"; print_r($details4);
		//$limit=5;
		//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$pagination4 =& $this->get('Pagination4');
		$this->assignRef('pagination4', $pagination4);
		$this->assignRef('details4',$details4);
		$this->setLayout('awardrfp');
		parent::display($tpl);
		}
		if($task=='unawardrfp')
		{
		$pathway->addItem( JText::_( 'Unaward RFPs' ));
		$model = $this->getModel('rfpcenter');
		$details5 = $model->getunawardrfp();
		//echo "<pre>"; print_r($details2);
		//$limit=5;
		//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$pagination5 =& $this->get('Pagination5');
		$this->assignRef('pagination5', $pagination5);
		$this->assignRef('details5',$details5);
		$this->setLayout('unawardrfp');
		parent::display($tpl);
		}
		if($task=='dashboard')
		{
		$pathway->addItem( JText::_( 'DashBoard' ));
		$model = $this->getModel('rfpcenter');
		$dashboard = $model->getclosedrfp();
		$dashboard_submit = $model->getdashboard_submit();
		$get_rfprequest = $model->awaitingrfprequest();
		$get_rfpapproval = $model->awaitingrfpapproval();
		$getrejectedrfp = $model->get_rejectedrfp();
		$awaitingclientapproval = $model->awaitingclientapproval();
		
		$survey_rfp = $model->surveyrfps();
        $announcement = $model->getannouncement();
        $details4 = $model->getawardrfp();
	    $getproperty_invitations = $model->getproperty_invitations();
	    $recommends = $model->getallrecommendations();
        $pagination4 =& $this->get('Pagination4');
		$this->assignRef('pagination4', $pagination4);
		$this->assignRef('details4',$details4);
		$pagination2 =& $this->get('Pagination2');
		$this->assignRef('pagination2', $pagination2);
        $this->assignRef('dashboard_submit',$dashboard_submit);
		$this->assignRef('dashboard',$dashboard);
		$this->assignRef('announcement',$announcement);
		$this->assignRef('survey_rfp',$survey_rfp);
		$this->setLayout('dashboard');
		$this->assignRef('recommends',$recommends);
		$this->assignRef('porpertyinvitations',$getproperty_invitations);
		$this->assignRef('getrfprequest', $get_rfprequest);
		$this->assignRef('getrfpapproval', $get_rfpapproval);
		$this->assignRef('getrejectedrfp', $getrejectedrfp);
		$this->assignRef('awaitingclientapproval', $awaitingclientapproval);
		
        
		parent::display($tpl);

		
		}
		if($task=='awardjob')
		{
		$pathway->addItem( JText::_( 'awardjob' ));
		 $model = $this->getModel('rfpcenter');
	    $proposals = $model->getawardjob();
		$alt_proposals = $model->getaltproposals();
		$this->assignRef('alt_proposals',$alt_proposals);
		$this->assignRef('proposals',$proposals);
		$outer_proposals = $model->getoutsidevendor();
		$this->assignRef('outer_proposals',$outer_proposals);
		$this->setLayout('awardjob');
		parent::display($tpl);
		}
		if($task=='outsidevendor')
		{
		$pathway->addItem( JText::_( 'OutSideVendor' ));
		// $model = $this->getModel('rfpcenter');
	    //$proposals = $model->getawardjob();

		//$this->assignRef('proposals',$proposals);
		$this->setLayout('outsidevendor');
		parent::display($tpl);
		}
		if($task=='proposalawarding')
		{
		$pathway->addItem( JText::_( 'proposalawarding' ));
		// $model = $this->getModel('rfpcenter');
	    //$proposals = $model->getawardjob();

		//$this->assignRef('proposals',$proposals);
		$this->setLayout('proposalawarding');
		parent::display($tpl);
		}
		if($task=='unawardingjob')
		{
		$pathway->addItem( JText::_( 'unawardingjob' ));
		 $model = $this->getModel('rfpcenter');
		 $unawardingjob = $model->getunawardingjob();
		// print_r($unawardingjob);
		 $this->assignRef('unawardingjob',$unawardingjob);
		$this->setLayout('unawardingjob');
		parent::display($tpl);
		}
		if($task=='rejectproposal')
		{
		$pathway->addItem( JText::_( 'Reject Proposal' ));
		$this->setLayout('rejectproposal');
		parent::display($tpl);
		}
		if($task=='requote')
		{
		//print_r($_REQUEST); exit;
		//print_r($insert_id);
		$pathway->addItem( JText::_( 'Requote RFP' ));
		$this->setLayout('requote');
		parent::display($tpl);
		}
		if($task=='overview')
		{
			$pathway->addItem( JText::_( 'Overview (or) RFP Center' ));
			$model = $this->getModel('rfpcenter');
			$details = $model->overviewrfpsubmitedrfp();
			$this->assignRef('details', $details);
			$unsubmitted = $model->overviewrfpunsubmitedrfp();
			$this->assignRef('unsubmitted', $unsubmitted);
			$closed = $model->overviewrfpclosedrfp();
			$this->assignRef('closed', $closed);
			$this->setLayout('overview');
			//$details = $model->getsubmitedrfp();
			//$pagination =& $this->get('Pagination');
			parent::display($tpl);
		}
		else if($task == 'not_authorized')
		{
			$this->setLayout('not_authorized');
			parent::display($tpl);
		}
		else if($task == 'getinvitation')
		{
			$model = $this->getModel('rfpcenter');
			$coms = $model->getcompanies();
			$this->assignRef('coms', $coms);	
			$this->setLayout('getinvitation');
			parent::display($tpl);
		}
		else if($task == 'outsidevendorinvite')
		{
				
			$this->setLayout('outsideinvitation');
			parent::display($tpl);
		}
		else if($task == 'getapplebox')
		{
			$model = $this->getModel('rfpcenter');
			$vendorid = JRequest::getVar('vendorid','');
			$id = JRequest::getVar('id','');
			
			$type = JRequest::getVar('type','');
			$v_data = $model->getvendordata($vendorid);
			$this->assignRef('vdata', $v_data);
			
			if($type == 'edit') {
			$edata = $model->getexistreview($id);
			$this->assignRef('edata', $edata);
			$this->setLayout('editapples');
			parent::display($tpl);
			}
			
			$this->setLayout('applebox');
			parent::display($tpl);
		}
		else if($task == 'mastercompliance')
		{
			$model = $this->getModel('rfpcenter');
			$industries = $model->allindustries();
			$this->assignRef('industries', $industries);
			$existingdata = $model->getallinsdataforindus();
			$this->assignRef('existingdata', $existingdata);
			$aboutus = $model->getaboutus();
			$this->assignRef('aboutus', $aboutus);
			$master = $model->getmasterfirmaccount();
			$this->assignRef('masterexist', $master);
			$permissions = $model->getpermissions();
			$this->assignRef('permissions', $permissions);
	        $reportsmsg = $model->getpreferredvendors_list();  
			$this->assignRef('reportsmsg', $reportsmsg);
			$acount_type = $model->getacount_type();  
			$this->assignRef('acount_type', $acount_type);
			$this->setLayout('insurancestandards');
			parent::display($tpl);
		}
		
		else if($task == 'compliancereport')
		{
			$model = $this->getModel('rfpcenter');
			$industries = $model->allindustries();
			$this->assignRef('industries', $industries);
			
			$existingdata = $model->getallinsdataforindus();
			$this->assignRef('existingdata', $existingdata);
			$aboutus = $model->getaboutus();
			$this->assignRef('aboutus', $aboutus);
			
			$master = $model->getmasterfirmaccount();
			$this->assignRef('masterexist', $master);
			$permissions = $model->getpermissions();
			$this->assignRef('permissions', $permissions);

			$reportsmsg = $model->getpreferredvendors_list();  
			$this->assignRef('reportsmsg', $reportsmsg);
			$allotheremails = $model->allotheremails();
			$this->assignRef('otheremails', $allotheremails);
			$items  =& $this->get('inhouse');
			//echo '<pre>';print_r($items);exit;
			$this->assignRef('items',$items);
			$this->setLayout('compliancereport');
			parent::display($tpl);
		}
		
		else if($task == 'getdeclinedreason')
		{
			$model = $this->getModel('rfpcenter');
			$rfpid = JRequest::getVar('rfpid','');
			$vendorid = JRequest::getVar('vendorid','');
			$declines = $model->declinedreason($rfpid,$vendorid);
			$this->assignRef('declines', $declines);
			$v_name = $model->vendorcompanyname($vendorid);
			$this->assignRef('v_name', $v_name);
			$this->setLayout('declined_cause');
			parent::display($tpl);
		}
		
		else if($task == 'vendor_proposal_preview_tomanager')
		{
		$Alt_Prp = JRequest::getVar('Alt_Prp','');
		$vendorid = JRequest::getVar('vendor_id','');
		$job = JRequest::getVar('job','');
		$model = $this->getModel('rfpcenter');
		//function to get RFP details in edit proposal form
		$RFP_details = $model->get_RFPinfo();
		$this->assignRef('RFP_details',$RFP_details[0]);

		//function to get RFP Task details in edit proposal form
		$TASKS_details = $model->get_TASKSinfo_preview('Preview',$Alt_Prp,$vendorid);
		$this->assignRef('TASKS_details',$TASKS_details);

		//function to get RFP Tasks_Docs details
		$Tasks_DOCS_details = $model->get_Tasks_DOCSinfo($Alt_Prp);
		$this->assignRef('Tasks_DOCS_details',$Tasks_DOCS_details);

		//function to get RFP Docs details in edit proposal preview
		$Edit_DOCS_details = $model->get_Edit_DOCSinfo($Alt_Prp,$vendorid);
		$this->assignRef('DOCS_details',$Edit_DOCS_details);

		//function to get RFP special Requirements details
		$SPLReq_Category = $model->get_SPLReq_Category();
		$this->assignRef('SPLReq_Category',$SPLReq_Category);

		//function to get RFP special Requirements details in edit proposal form
		$SPLRequirements_details = $model->get_SPLRequirements($Alt_Prp);
		$this->assignRef('SPLRequirements_details',$SPLRequirements_details);

		//function to get RFP Docs details in edit proposal form
		$DOCS_details = $model->get_DOCSinfo('Edit',$Alt_Prp,$vendorid);
		$this->assignRef('DOCS_details',$DOCS_details);

		//function to get Proposal bidding price details in edit proposal form
		$Proposal_price_details = $model->get_Proposal_price_details($Alt_Prp,$vendorid);
		$this->assignRef('Proposal_price_details',$Proposal_price_details);

		//function to get special requirement amount
		$SPLreq_amount = $model->get_SPLreq_amount($vendorid);
		$this->assignRef('SPLreq_amount',$SPLreq_amount);

		//function to get RFP special Requirements tabs Addnotes, Uploadfile, Addexception links
		$SPL_REQ_tabs = $model->get_SPLRequirements_Preview('Edit',$Alt_Prp,$vendorid);
		$this->assignRef('SPL_REQ_tabs',$SPL_REQ_tabs);

		$Form_status = $model->get_Form_status($vendorid);
		$this->assignRef('Form_status',$Form_status[0]->proposaltype);
		$this->assignRef('Form_bidded_date',$Form_status[0]->proposeddate);
		
		$generaldocs = $model->getgeneraldocs();
		$this->assignRef('generaldocs',$generaldocs);
		
		$vvendor_name = $model->getvendorcompanyname($vendorid);
		$this->assignRef('vendor_name',$vvendor_name);
		
		if($job == 'basic'){
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
		
			if($job == 'basic'){
			$this->setLayout('vendor_proposal_preview_tomanager_basic');
			}
			else{
			$this->setLayout('vendor_proposal_preview_tomanager');
			}
		parent::display();
		}
		
		else if($task == 'upload_select')
		{
		$this->setLayout('uploadfile_form');
		parent::display();
		}
		else if($task == 'Uploadfile')
		{
		$this->setLayout('task_uploadfile_form'); 
		parent::display();
		}
		else if($task == 'getcloserfp')
		{
			$this->setLayout('getcloserfp');
			parent::display($tpl);
		}
		else if($task == 'vendortype')
		{
			$this->setLayout('vendortype');
			parent::display($tpl);
		}
		else if($task == 'reminderbox')
		{
			$this->setLayout('reminderbox');
			parent::display($tpl);
		}
		else if($task == 'uninvitevendors')
		{
			$model = $this->getModel('rfpcenter');
			$rfp_id = JRequest::getVar('rfpid','');
			$drafts_total = $model->alldraftproposals($rfp_id);
			$this->assignRef('drafts', $drafts_total);
			$this->setLayout('uninvite');
			parent::display($tpl);
		}
		else if($task == 'messagebox')
		{
			$model = $this->getModel('rfpcenter');
			$this->setLayout('messagebox');
			parent::display($tpl);
		}
		else if($task == 'showuninitedmsgtomgr'){
			$model = $this->getModel('rfpcenter');
			$rfpid = JRequest::getVar('rfpid','');
			$vendorid = JRequest::getVar('vendorid','');
			$message = $model->getreason_uninvite($rfpid,$vendorid);  
			$this->assignRef('message', $message);
			$this->setLayout('message_uninvited');
			parent::display($tpl);
		}
		else if($task == 'blankpopupbox')
		{
			$this->setLayout('blankmessage');
			parent::display($tpl);
		}
		else if($task == 'compliance_status_report')
		{
			//get all preferred vendors
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_list();  
			$this->assignRef('message', $message);
			$count_enable = $model->countenableddocs(); 
			$docs_permission = $model->getpermission_cdocs(); 
			$this->assignRef('count_enable', $count_enable);
			$this->assignRef('docs_permission', $docs_permission);
			$reportmessage = $model->reportmessage();  
			$this->assignRef('reportmessage', $reportmessage);
			$this->setLayout('compliance_status_report');
			parent::display($tpl);
		}
		else if($task == 'compliance_status_report_webpage')
		{
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_list_pdf();  
			$this->assignRef('message', $message);
			$count_enable = $model->getpermission_cdocs_webpage();  
			$this->assignRef('count_enable', $count_enable);
			$items  =& $this->get('inhouse');
			$this->assignRef('items',$items);
			$this->setLayout('compliance_status_report_webpage');
			parent::display($tpl);
		}
		
		else if($task == 'compliance_status_report_companywebpage')
		{
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_company();  
			$this->assignRef('message', $message);
			$count_enable = $model->getpermission_cdocs_webpage();  
			$this->assignRef('count_enable', $count_enable);
			$items  =& $this->get('inhouse');
			$this->assignRef('items',$items);
			$this->setLayout('compliance_status_report_companywebpage');
			parent::display($tpl);
		}
		
		else if($task == 'compliance_status_report_pdf')
		{
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_list_pdf();  
			$this->assignRef('message', $message);
			$count_enable = $model->getpermission_cdocs_webpage();  
			$this->assignRef('count_enable', $count_enable);
			$items  =& $this->get('inhouse');
			$this->assignRef('items',$items);
			$reportmessage = $model->reportmessage();  
			$this->assignRef('reportmessage', $reportmessage);
			
			if( $count_enable->how_docs == 'all' || ($count_enable->w9 == 1 || $count_enable->gli == 1 || $count_enable->api == 1 || $count_enable->umb == 1 || $count_enable->wc == 1 || $count_enable->omi == 1 || $count_enable->pln == 1 || $count_enable->oln == 1 ))
			 
			     $this->setLayout('compliance_status_report_pdf');
			else
			  		$this->setLayout('compliance_status_nocompanyreport_pdf');
			parent::display($tpl);
		}
		
		else if($task == 'compliance_status_companyreport_pdf')
		{
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_company();  
			$this->assignRef('message', $message);
			$count_enable = $model->getpermission_cdocs_webpage();  
			$this->assignRef('count_enable', $count_enable);
			$items  =& $this->get('inhouse');
			$this->assignRef('items',$items);
			$reportmessage = $model->reportmessage();  
			$this->assignRef('reportmessage', $reportmessage);
			
			if( $count_enable->how_docs == 'all' || ($count_enable->w9 == 1 || $count_enable->gli == 1 || $count_enable->api == 1 || $count_enable->umb == 1 || $count_enable->wc == 1 || $count_enable->omi == 1 || $count_enable->pln == 1 || $count_enable->oln == 1 ))
			 
			     $this->setLayout('compliance_status_companyreport_pdf');
			else
			     $this->setLayout('compliance_status_noreport_pdf');
			parent::display($tpl);
		}
		
		else if($task == 'compliance_status_companyreport')
		{
			$model = $this->getModel('rfpcenter');
			$message = $model->getpreferredvendors_companylist();  
			$this->assignRef('message', $message);
			$count_enable = $model->countenableddocs(); 
			$docs_permission = $model->getpermission_cdocs(); 
			$this->assignRef('count_enable', $count_enable);
			$this->assignRef('docs_permission', $docs_permission);
			$reportmessage = $model->reportmessage();  
			$this->assignRef('reportmessage', $reportmessage);
			$this->setLayout('compliance_status_companyreport');
			parent::display($tpl);
		}
		
		else if( $task == 'getcompliance_null' ){
			$this->setLayout('no_standards');
			parent::display($tpl);
		}
		else if( $task == 'awardmail' ){
			$rfpno = JRequest::getVar('rfpno','');
			$proposalid = JRequest::getVar('proposalid','');
			$model = $this->getModel('rfpcenter');
			$message = $model->getawardedmessage($rfpno,$proposalid);  
			$this->assignRef('message', $message);
			$this->setLayout('awardjob_second');
			parent::display($tpl);
		}
		
		else if( $task == 'awardmail_submit' ){
			$model = $this->getModel('rfpcenter');
			$rfpno = JRequest::getVar('rfpno','');
			$proposalid = JRequest::getVar('proposalid','');
			$awardedto = JRequest::getVar('awardedto','');
			if( $awardedto == 'in' ){
				$vendorinfo = $model->gendorinvendorinfo($proposalid,$rfpno);  
				$this->assignRef('vendorinfo', $vendorinfo);	
				}
			else{
				$vendorinfo = $model->gendoroutvendorinfo($proposalid,$rfpno);  
				$this->assignRef('out_vendorinfo', $vendorinfo);
				}
			$message = $model->getawardedmessage($rfpno,$proposalid);  
			$this->assignRef('message', $message);
			$globals = $model->getmasterglobals(); 
			$this->assignRef('globals',$globals);
			$rfp_stand = $model->getallstandardsrfp(); 
			$this->assignRef('rfp_stand',$rfp_stand);
			$this->setLayout('awardjob_last');
			parent::display($tpl);
		}
		else if( $task == 'getcheckmarkpbox' ){
			$this->setLayout('notice_reminder');
			parent::display($tpl);
		}
		else if( $task == 'allinvitations' ){
		    $model = $this->getModel('rfpcenter');
			$getproperty_invitations = $model->getproperty_invitations();
			$this->assignRef('invitations', $getproperty_invitations);
			$get_rfprequest = $model->awaitingrfprequest();
		    $this->assignRef('get_rfprequestper', $get_rfprequest);
			$get_rfpapproval = $model->awaitingrfpapproval();
			 $this->assignRef('get_rfpapprovalper', $get_rfpapproval);
			$this->setLayout('allinvitations');
			parent::display($tpl);
		}
		else if( $task == 'viewstatussample' ){
			$this->setLayout('viewstatussample');
			parent::display($tpl);
		}
		
		
	// Get data from the model
	    //print_r($pagination);

	//print_r($pagination);
        // push data into the template
      // $this->assignRef('pagination', $pagination);

	}



}
?>