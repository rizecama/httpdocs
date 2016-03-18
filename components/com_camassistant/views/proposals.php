<?php
/**
 * @version		1.0.0 cam assistant $
 * @package		cam_assistant
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

jimport( 'joomla.application.component.model' );


class proposalsModelproposals extends Jmodel
{
	 function __construct(){
		parent::__construct();
	 }
     
	 function get_SPLreq_amount()
	 {
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		$rfp_id = JRequest::getVar('rfp_id','');	
		$sql = "SELECT * FROM #__cam_rfpsow_splreq_price where rfp_id=".$rfp_id." AND vendor_id =".$user->id;
		$db->Setquery($sql);
		$result = $db->loadObjectList();
		return $result;
	 }
	 //function to update status of available jobs
	function get_Update_job_status()
	{
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		$id = JRequest::getVar('id','');
		$sql = "UPDATE  #__cam_vendor_availablejobs  SET status = 1 WHERE user_id=".$user->id." AND id = ".$id;		
		$db->Setquery($sql);
		$data = $db->query(); 
		return $data;
	}
	
	 
	 //function to submit proposal from vendor centre page
	 function Proposal_submit()
	 {
	 	  $rfp_id = JRequest::getVar('rfp_id','');	
		  $Proposal_id = JRequest::getVar('Proposal_id','');
		  $Alt_Prp = JRequest::getVar('Alt_Prp','');
	      $db = JFactory::getDBO();
		  $user = JFactory::getUser();
		  $sql = "Update #__cam_vendor_proposals set proposaltype='Submit' where proposedvendorid =".$user->id." AND rfpno=".$rfp_id." AND id =".$Proposal_id." AND Alt_bid= '".$Alt_Prp."'";  
		  $db->Setquery($sql);
		  $db->query(); 
	 }
	 
	 function get_Form_status()
	 {
	 	$db = JFactory::getDBO();
		$post	= JRequest::get('post');
		$user	= JFactory::getUser();
		$rfp_id = JRequest::getVar('rfp_id','');
		$sql2 = "SELECT proposaltype,proposeddate FROM #__cam_vendor_proposals  where rfpno=".$rfp_id." AND proposedvendorid =".$user->id;
		$db->Setquery($sql2);
		$result = $db->loadObjectList();
		return $result;
	 }
	 
	 //function to save as ITB
	function Proposal_save_as_ITB()
	{
		$post	= JRequest::get('post');
	//code to update vendor bidding proposal for RFP
		$user	= JFactory::getUser();
		$vendor_rfp['id'] 				 = ''; 
		$vendor_rfp['rfpno'] 				 = $post['rfp_id'];
		$vendor_rfp['proposalno'] 		     = '';
		$vendor_rfp['proposedvendorid'] 	 = $user->id;
		$vendor_rfp['proposeddate'] 		 = date('m-d-Y');
		$vendor_rfp['proposaltype'] 		 = $post['submit_type'];
		$vendor_rfp['price_other_items'] 	 = '';
		$vendor_rfp['proposal_total_price']	 = '';
		$vendor_rfp['commission'] 			 = '';
		$vendor_rfp['Alt_bid'] 			 	 = '';
		//echo "<pre>"; print_r($vendor_rfp); exit;
		$row = & $this->getTable('vendor_rfp_proposals_info');
		// Bind the form fields to the  table
		if (!$row->bind($vendor_rfp)) { 
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		//echo "<pre>"; print_r($row); 
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg()); 
			return false;
		}
		$db = JFactory::getDBO();
		$sql = "SELECT max(id) FROM #__cam_vendor_proposals ";
		$db->Setquery($sql);
		$Proposal_id = $db->loadResult(); 
		$random_id 	 = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
		$upd_sql = 'UPDATE #__cam_vendor_proposals set id='.$random_id.' WHERE id ='.$Proposal_id;
		$db->Setquery($upd_sql);
		$db->query();
		return true;
	}
	 
	 //function to save RFP bidding
	 function Proposal_save_as($data)
	 {
		//code to update tasks prices in cam_rfpsow_docs_lineitems_prices table.
		$db = JFactory::getDBO();
		$user	= JFactory::getUser();
		//echo "<pre>"; print_r($data); echo count($data['amount']);  exit;
		if($data['Alt_bid'] != 'yes' && $data['act'] != 'Update')
		{
			$Proposal_id = JRequest::getVar('Proposal_id','');
			$Alt_Prp = JRequest::getVar('Alt_Prp','');
			if($Proposal_id !='')
			{
				 $del_sql = "DELETE from #__cam_rfpsow_docs_lineitems_prices WHERE rfp_id=".$data['rfp_id']." AND vendor_id=".$user->id." AND Alt_bid='".$Alt_Prp."'"; 
				$db->Setquery($del_sql);
				$db->query();
				//code to delete proposal bidding of the user
				 $del_sql2 = "DELETE FROM #__cam_vendor_proposals  where rfpno=".$data['rfp_id']." AND proposedvendorid 	 =".$user->id." AND Alt_bid='".$Alt_Prp."'"; 
				$db->Setquery($del_sql2);
				$db->query(); 
			}
		}	
		for($t=0; $t<count($data['task_price']),$t<count($data['task_ids']); $t++) //for line items
		{
			$data_task['rfp_id'] = $data['rfp_id'];
			$data_task['vendor_id'] = $user->id;
			$data_task['item_type'] = 'task';
			$data_task['item_id'] = $data['task_ids'][$t];
			$data_task['item_price'] = $data['task_price'][$t];
			$data_task['status'] = 'active';
			if($Proposal_id != '')
			$data_task['Alt_bid'] 			 	 = $Alt_Prp;
			else
			$data_task['Alt_bid'] 			 	 = $data['Alt_bid'];
		  	$price_task = & $this->getTable('rfp_task_docs_tasks_price'); 
		  // Bind the form fields to the  table
			if (!$price_task->bind($data_task)) { 
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			// Store the  detail record into the database
			if (!$price_task->store()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}// end for loop
		for($d=0; $d<count($data['downloads_price']),$d<count($data['downloads_ids']); $d++) //for additional docs
		{
			$data_doc['rfp_id'] = $data['rfp_id'];
			$data_doc['vendor_id'] = $user->id;
			$data_doc['item_type'] = 'doc';
			$data_doc['item_id'] = $data['downloads_ids'][$d];
			$data_doc['item_price'] = $data['downloads_price'][$d];
			$data_doc['status'] = 'active';
			if($Proposal_id != '')
			$data_doc['Alt_bid'] 			 	 = $Alt_Prp;
			else
			$data_doc['Alt_bid'] 			 	 = $data['Alt_bid'];
		  	$price_doc = & $this->getTable('rfp_task_docs_tasks_price'); 
		  // Bind the form fields to the  table
			if (!$price_doc->bind($data_doc)) { 
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			// Store the  detail record into the database
			if (!$price_doc->store()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}// end for loop
		//cod to update status of rfpsow_addnotes,rfpsow_addexception,rfpsow_uploadfiles
		$db = JFactory::getDBO();
		$sql2 = "Update #__cam_rfpsow_addnotes  set status='active' where rfp_id=".$data['rfp_id']." AND vendor_id =".$user->id;
		$db->Setquery($sql2);
		$db->query();
		
		$db = JFactory::getDBO();
		$sql3 = "Update #__cam_rfpsow_addexception  set status='active' where rfp_id=".$data['rfp_id']." AND vendor_id =".$user->id;
		$db->Setquery($sql3);
		$db->query();
		
		$db = JFactory::getDBO();
		$sql4 = "Update #__cam_rfpsow_uploadfiles  set status='active' where rfp_id=".$data['rfp_id']." AND vendor_id =".$user->id;
		$db->Setquery($sql4);
		$db->query();
		
		//code to save insurence,liability amounts
		//echo "<pre>"; print_r($data); 
		$spl_req = $data['spl_req']; //echo $data['amount'][$spl_req[0]];  echo $sp l_req[0]; exit;
		$sql5 = "DELETE FROM #__cam_rfpsow_splreq_price where rfp_id=".$data['rfp_id']." AND vendor_id =".$user->id;
		$db->Setquery($sql5);
		$db->query();
		for($i=0; $i<count($data['amount']); $i++)
		{
			$spl_arr['rfp_id'] =$data['rfp_id'];
			$spl_arr['req_id'] = $spl_req[$i];
			$spl_arr['vendor_id'] = $user->id;
			$spl_arr['amount'] =  $data['amount'][$spl_req[$i]];
			$spl_arr['status'] = 'active';
			$row = & $this->getTable('vendor_rfp_proposals_splreq_amount');
			// Bind the form fields to the  table
			if (!$row->bind($spl_arr)) { 
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			//echo "<pre>"; print_r($row); exit;
			// Store the  detail record into the database
			if (!$row->store()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}
		
		//code to update vendor bidding proposal for RFP
		$user	= JFactory::getUser();
		$vendor_rfp['id'] 				 	 = $data['id'];
		$vendor_rfp['rfpno'] 				 = $data['rfp_id'];
		$vendor_rfp['proposalno'] 		     = '';
		$vendor_rfp['proposedvendorid'] 	 = $user->id;
		$vendor_rfp['proposeddate'] 		 = date('m-d-Y');
		$vendor_rfp['proposaltype'] 		 = $data['submit_type'];
		$vendor_rfp['price_other_items'] 	 = $data['other_items_price'];
		$vendor_rfp['proposal_total_price']	 = $data['total_price'];
		$vendor_rfp['commission'] 			 = $data['commisions'];
		if($Proposal_id != '')
		$vendor_rfp['Alt_bid'] 			 	 = $Alt_Prp;
		else
		$vendor_rfp['Alt_bid'] 			 	 = $data['Alt_bid'];
		
		$row = & $this->getTable('vendor_rfp_proposals_info');
		
		// Bind the form fields to the  table
		if (!$row->bind($vendor_rfp)) { 
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		//echo "<pre>"; print_r($row); exit;
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		if($data['id'] == '')
		{
			$db = JFactory::getDBO();
			$sql = "SELECT max(id) FROM #__cam_vendor_proposals ";
			$db->Setquery($sql);
			$Proposal_id = $db->loadResult(); 
			$random_id 	 = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
			$upd_sql = 'UPDATE #__cam_vendor_proposals set id='.$random_id.' WHERE id ='.$Proposal_id;
			$db->Setquery($upd_sql);
			$db->query();
		}
		return true;
	  
	 }
	   function get_SPLReq_Category()
	 {
	  $db = JFactory::getDBO();
	  $rfp_id = JRequest::getVar('rfp_id','');
	  $sql = " SELECT * FROM jos_cam_rfpreq_categories where req_parentid=0";
	  $db->Setquery($sql);
	  $categories = $db->loadObjectList();
	  return $categories;
	 }
	 
	 //function to get RFP Spl requirements data
	 function get_SPLRequirements($act)
	 {
	   $db = JFactory::getDBO();
	   $rfp_id = JRequest::getVar('rfp_id',''); 
	   $user = JFactory::getUser();
	 // $sql = " SELECT a.*, b.price FROM jos_cam_rfpreq_categories as a , jos_cam_rfpreq_info as b  WHERE a.req_id = b.req_id and b.rfp_id = ".$rfp_id."  order by b.req_parentid ";
	 // $sql = " SELECT * FROM jos_cam_rfpreq_info WHERE rfp_id = ".$rfp_id;
	  $sql = " SELECT b.req_parentid as main_id, a.req_title as main_title FROM jos_cam_rfpreq_categories as a , jos_cam_rfpreq_info as b  WHERE a.req_id = b.req_parentid 	 and b.rfp_id = ".$rfp_id."   group by b.req_parentid order by b.req_parentid ";
	  $db->Setquery($sql);
	  $main_cat = $db->loadObjectList();
	  $SPLRequirements_details['main'] = $main_cat;
	   $sql = " SELECT b.req_parentid as main_id, b.req_subparentid as sub_id, a.req_title as sub_title FROM jos_cam_rfpreq_categories as a , jos_cam_rfpreq_info as b  WHERE a.req_id = b.req_subparentid and b.rfp_id = ".$rfp_id." AND  req_subparentid != 0  order by b.req_parentid ";
	  $db->Setquery($sql);
	  $sub_cat = $db->loadObjectList();
	  $SPLRequirements_details['sub'] = $sub_cat;
	  $sql = " SELECT b.req_parentid as main_id, b.req_subparentid as sub_id, b.req_id as child_id, a.req_title as child_title FROM jos_cam_rfpreq_categories as a , jos_cam_rfpreq_info as b  WHERE a.req_id = b.req_id and b.rfp_id = ".$rfp_id." AND b.req_parentid != 0 AND req_subparentid != 0  order by b.req_parentid ";
	  $db->Setquery($sql);
	  $child = $db->loadObjectList();
	   //echo "<pre>"; print_r($SPLRequirements_details); exit;
	  if($act == 'Edit')
	  {
	  //$sql = " SELECT b.req_parentid as main_id, b.req_subparentid as sub_id, b.req_id as child_id, a.req_title as child_title,c.amount FROM jos_cam_rfpreq_categories as a LEFT JOIN jos_cam_rfpreq_info as b ON a.req_id = b.req_id LEFT JOIN #__cam_rfpsow_splreq_price c ON a.req_id = c.req_id WHERE a.req_id = b.req_id and b.rfp_id = ".$rfp_id." AND b.req_parentid != 0 AND req_subparentid != 0 AND c.vendor_id = ".$user->id."  order by b.req_parentid ";
		  for($x=0; $x<count($child); $x++)
		  {
		  $sql = "SELECT amount FROM  #__cam_rfpsow_splreq_price WHERE req_id = ".$child[$x]->sub_id." AND rfp_id = ".$rfp_id." AND vendor_id = ".$user->id ; 
		  $db->Setquery($sql);
		  $amount = $db->loadResult();
		  $child[$x]->amount = $amount; 
		  }
	  }
	   $SPLRequirements_details['child'] = $child;
	//echo "<pre>"; print_r($SPLRequirements_details); exit;
	  return $SPLRequirements_details;
	 }
	 
	 //function to save task uploadfile
	function save_uploadfile($data)
	{
		// give me JTable object			 	
		$row = & $this->getTable('rfp_task_uploadfiles');
		// Bind the form fields to the  table
		if (!$row->bind($data)) { 
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		//echo "<pre>"; print_r($data); exit;
		// Create the timestamp for the date field
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	//function to save task addnotes
	function save_addnotes($data)
	{
		// give me JTable object			 	
		$row = & $this->getTable('rfp_task_addnotes');
		
		// Bind the form fields to the  table
		if (!$row->bind($data)) { 
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		//echo "<pre>"; print_r($data); exit;
		// Create the timestamp for the date field
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	//function to save task addnotes
	function save_addexception($data)
	{
		// give me JTable object			 	
		$row = & $this->getTable('rfp_task_addexception');
		// Bind the form fields to the  table
		if (!$row->bind($data)) { 
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		//echo "<pre>"; print_r($data); exit;
		// Create the timestamp for the date field
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	 
	//function to download doc
	function get_downloadfile()
	{
	    /*$db = JFactory::getDBO();
		$doc_id = JRequest::getVar('doc_id',''); 
		$rfp_id = JRequest::getVar('rfp_id','');  
		$sql = 'SELECT taskuploads FROM #__cam_rfpsow_linetask WHERE rfp_id = '.$rfp_id.' AND task_id ='.$doc_id ;
		$db->Setquery($sql);
		$filename = $db->loadResult();
		$path = JURI::root().'components/com_camassistant/assets/images/rfp/'; 
		$doc_name = $path.$filename; */
		$path = JRequest::getVar('path',''); 
		$path = JURI::root().$path;
		$doc_name = $path;      
		header("content-type: application/octet-stream");		
		header("Content-Disposition: attachment; filename=".$doc_name);
		readfile($doc_name); 
		exit; 
		return ;
	} 	
	
	//function to get RFP tasks info
	function get_TASKSinfo($act,$Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$rfp_id = JRequest::getVar('rfp_id','');
		$user = JFactory::getUser();
		$sql = 'SELECT * FROM #__cam_rfpsow_linetask WHERE rfp_id = '.$rfp_id ;
		$db->Setquery($sql);
		$TASK_details = $db->loadObjectList();
		//echo "<pre>"; print_r($TASK_details);
		if($act == 'Edit')
		{
		  //code to get Addnotes data
		 for($t=0; $t<count($TASK_details); $t++) //to get task price
		 {
			$db = JFactory::getDBO();
			$sql = 'SELECT add_notes  FROM #__cam_rfpsow_addnotes  WHERE status = "active" AND spl_req = "No" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$user->id.' AND task_id='.$TASK_details[$t]->task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
			$db->Setquery($sql);
			$db->query();
			$is_Notes = $db->loadResult();
			$TASK_details[$t]->Notes = $is_Notes;
		  }	
		//end of code to get Addnotes data	
		  for($p=0; $p<count($TASK_details); $p++) //to get task price
		  {
		  $price_sql = 'SELECT item_price FROM #__cam_rfpsow_docs_lineitems_prices  WHERE item_type="task" AND item_id = '.$TASK_details[$p]->task_id.' AND vendor_id = '.$user->id.' AND Alt_bid="'.$Alt_Prp.'"' ;
		  $db->Setquery($price_sql);
		  $price = $db->loadResult();
		  $TASK_details[$p]->price = $price;
		  } 
		  for($u=0; $u<count($TASK_details); $u++)//to get task related uploaded files
		  {
		   $upld_sql = 'SELECT upload_doc FROM #__cam_rfpsow_uploadfiles  WHERE spl_req = "No" AND task_id = '.$TASK_details[$u]->task_id.' AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'  ;
		  $db->Setquery($upld_sql);
		  $upld_file = $db->loadResultArray();
		  $TASK_details[$u]->uploaded_file = $upld_file;
		  $upld_sql = 'SELECT id FROM #__cam_rfpsow_uploadfiles  WHERE spl_req = "No" AND task_id = '.$TASK_details[$u]->task_id.' AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'  ;
		  $db->Setquery($upld_sql);
		  $upld_doc_ids = $db->loadResultArray();
		  $TASK_details[$u]->uploaded_doc_ids = $upld_doc_ids;
		  $upld_title = array();
		   for($i=0; $i<count($upld_file); $i++)
			{
		 		$arr = explode('/',$upld_file[$i]);
 		 		$cnt = count($arr);
		 		$upld_title[$i] = $arr[$cnt-1];
			}
			$TASK_details[$u]->uploadfile_title = $upld_title;
		  }
		 
		}
		//echo $x = $this->get_Addnotes_link($id);
		if($act == 'Add')
		{
			for($x=0; $x<count($TASK_details); $x++)
			{
			$TASK_details[$x]->Addnotes = $this->get_Addnotes_link($TASK_details[$x]->task_id,'No','Add',$Alt_Prp);
			$TASK_details[$x]->Uploadfile = $this->get_Uploadfile_link($TASK_details[$x]->task_id,'No','Add',$Alt_Prp);
			$TASK_details[$x]->AddException = $this->get_Addexception_link($TASK_details[$x]->task_id,'No','Add',$Alt_Prp);
			}
		}
		else
		{
			for($x=0; $x<count($TASK_details); $x++)
			{
			$TASK_details[$x]->Addnotes = $this->get_Addnotes_link($TASK_details[$x]->task_id,'No','Edit',$Alt_Prp);
			$TASK_details[$x]->Uploadfile = $this->get_Uploadfile_link($TASK_details[$x]->task_id,'No','Edit',$Alt_Prp);
			$TASK_details[$x]->AddException = $this->get_Addexception_link($TASK_details[$x]->task_id,'No','Edit',$Alt_Prp);
			}
		}	
		// echo "<pre>"; print_r($TASK_details); exit;
		return $TASK_details;
	}
	
	//function to get RFP special requirements tabs Addnotes, Uploadfile, Addexception links
	function get_SPLRequirements_tabs($act,$Alt_Prp)
	{
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		if($act == 'Add')
		{
			$SPL_REQ_tabs[0]->Addnotes = $this->get_Addnotes_link('0','Yes','Add',$Alt_Prp);
			$SPL_REQ_tabs[1]->Uploadfile = $this->get_Uploadfile_link('0','Yes','Add',$Alt_Prp);
			$SPL_REQ_tabs[2]->AddException = $this->get_Addexception_link('0','Yes','Add',$Alt_Prp);
		}
		else
		{
			$SPL_REQ_tabs[0]->Addnotes = $this->get_Addnotes_link('0','Yes','Edit',$Alt_Prp);
			$SPL_REQ_tabs[1]->Uploadfile = $this->get_Uploadfile_link('0','Yes','Edit',$Alt_Prp);
			$SPL_REQ_tabs[2]->AddException = $this->get_Addexception_link('0','Yes','Edit',$Alt_Prp);
			$upld_sql = 'SELECT upload_doc FROM #__cam_rfpsow_uploadfiles  WHERE status="active" AND spl_req = "Yes" AND task_id = 0 AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'  ;
		  $db->Setquery($upld_sql);
		  $upld_file = $db->loadResultArray();
		  $SPL_REQ_tabs[3]->uploaded_file = $upld_file;
		  $upld_sql = 'SELECT id FROM #__cam_rfpsow_uploadfiles  WHERE status=1 AND spl_req = "Yes" AND task_id = 0 AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'   ;
		  $db->Setquery($upld_sql);
		  $upld_ids = $db->loadResultArray();
		  $SPL_REQ_tabs[4]->uploaded_doc_ids = $upld_ids;
		  $upld_title = array();
		   for($i=0; $i<count($upld_file); $i++)
			{
		 		$arr = explode('/',$upld_file[$i]);
 		 		$cnt = count($arr);
		 		$upld_title[$i] = $arr[$cnt-1];
			}
			$SPL_REQ_tabs[5]->uploadfile_title = $upld_title;
			 //code to get Addnotes data
			$db = JFactory::getDBO();
			$sql = 'SELECT add_notes  FROM #__cam_rfpsow_addnotes  WHERE status = "active" AND spl_req = "Yes" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$user->id.' AND task_id=0 AND Alt_bid="'.$Alt_Prp.'"' ; 
			$db->Setquery($sql);
			$db->query();
			$is_Notes = $db->loadResult();
			$SPL_REQ_tabs[6]->Notes = $is_Notes;
		//end of code to get Addnotes data	
		}	
		// echo "<pre>"; print_r($SPL_REQ_tabs);
		return $SPL_REQ_tabs;
	}
	
	//function to populate select industries link 
	function get_Addnotes_link($id,$is_Spl,$act,$Alt_Prp)
	{
	    /*****************code to send to fnd**************************/
		if($act == 'Add')
		$var = 'Alt_bid='.$Alt_Prp;
		else
		$var = 'Alt_Prp='.$Alt_Prp;
	    JHTML::_('behavior.modal');
        $uri	=& JURI::getInstance();
		//echo "<pre>"; print_r($_REQUEST); 
		$rfp_id	= JRequest::getVar('rfp_id','');
		$vendor_id	= JRequest::getVar('vendor_id','');
		$user = JFactory::getUser();
		$vendor_id = $user->id;
		$base	= $uri->toString( array('scheme', 'host', 'port'));
		$link	= $base;
		if($is_Spl == 'No')
		$url	= 'index.php?option=com_camassistant&controller=proposals&task=Addnotes&'.$var.'&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id='.$id.'&Action='.$act; 
		else
		$url	= 'index.php?option=com_camassistant&controller=proposals&task=Addnotes&'.$var.'&spl=Yes&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id=0&Action='.$act; 
		$status = 'width=400,height=350,menubar=yes,resizable=yes';
		//code to get Addnotes data
		 $db = JFactory::getDBO();
		$sql = 'SELECT * FROM #__cam_rfpsow_addnotes  WHERE status = "active" AND spl_req = "'.$is_Spl.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$is_Id = $db->loadResultArray();
		//end of code to get Addnotes data
		//echo "<pre>"; print_r($notes);
		if($act == 'Add' || ($act == 'Edit' && $is_Id[0] == ''))
		$text = '<img src="templates/camassistant_left/images/addnotes.gif" border="0" alt="add notes" width="76" height="22" />';
		else
		$text = '<img src="templates/camassistant_left/images/editnotes.gif" border="0" alt="add notes" width="76" height="22" />';
        $attribs['rel']	= "{handler: 'iframe', size: {x: 630, y: 390}}";  
		$attribs['class']	= 'modal';  
		$attribs['title']	= JText::_( 'Addnotes' );
		//$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";
		$output = JHTML::_('link', JRoute::_($url), $text, $attribs);
		return $output;
		/*****************end of code to send to fnd**************************/	
	}
	
		//function to populate select industries link 
	function get_Uploadfile_link($id,$is_Spl,$act,$Alt_Prp)
	{
	    /*****************code to send to fnd**************************/
		if($act == 'Add')
		$var = 'Alt_bid='.$Alt_Prp;
		else
		$var = 'Alt_Prp='.$Alt_Prp;
	    JHTML::_('behavior.modal');
        $uri	=& JURI::getInstance();
		$rfp_id	= JRequest::getVar('rfp_id','');
		$vendor_id	= JRequest::getVar('vendor_id','');
		$base	= $uri->toString( array('scheme', 'host', 'port'));
		$link	= $base;
		if($is_Spl == 'No')
		$url	= 'index.php?option=com_camassistant&controller=proposals&'.$var.'&task=Uploadfile&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id='.$id.'&Action='.$act; 
		else
		$url	= 'index.php?option=com_camassistant&controller=proposals&'.$var.'&task=Uploadfile&spl=Yes&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id=0&Action='.$act; 
		$status = 'width=400,height=350,menubar=yes,resizable=yes';
		$text = '<img src="templates/camassistant_left/images/uploadfile.gif" border="0" alt="upload a file" />';
        $attribs['rel']	= "{handler: 'iframe', size: {x: 330, y: 190}}";  
		$attribs['class']	= 'modal';  
		$attribs['title']	= JText::_( 'Uploadfile' );
		//$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";
		$output = JHTML::_('link', JRoute::_($url), $text, $attribs);
		return $output;
		/*****************end of code to send to fnd**************************/	
	}

			//function to populate select industries link 
	function get_Addexception_link($id,$is_Spl,$act,$Alt_Prp)
	{
	    /*****************code to send to fnd**************************/
		if($act == 'Add')
		$var = 'Alt_bid='.$Alt_Prp;
		else
		$var = 'Alt_Prp='.$Alt_Prp;
	    JHTML::_('behavior.modal');
        $uri	=& JURI::getInstance();
		$rfp_id	= JRequest::getVar('rfp_id','');
		$vendor_id	= JRequest::getVar('vendor_id','');
		$user = JFactory::getUser();
		$vendor_id = $user->id;
		$base	= $uri->toString( array('scheme', 'host', 'port'));
		$link	= $base;
		if($is_Spl == 'No')
		$url	= 'index.php?option=com_camassistant&controller=proposals&'.$var.'&task=Addexception&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id='.$id.'&Action='.$act; 
		else
		$url	= 'index.php?option=com_camassistant&controller=proposals&'.$var.'&task=Addexception&spl=Yes&rfp_id='.$rfp_id.'&vendor_id='.$vendor_id.'&task_id=0&Action='.$act; 
		$status = 'width=400,height=350,menubar=yes,resizable=yes';
		if($act == 'Add')
		$text = '<img src="templates/camassistant_left/images/addexception.gif" border="0" alt="add exception" />';
		else
		$text = '<img src="templates/camassistant_left/images/editexception.gif" border="0" alt="add exception" />';
        $attribs['rel']	= "{handler: 'iframe', size: {x: 630, y: 390}}";  
		$attribs['class']	= 'modal';  
		$attribs['title']	= JText::_( 'Addexception' );
		//$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";
		$output = JHTML::_('link', JRoute::_($url), $text, $attribs);
		return $output;
		/*****************end of code to send to fnd**************************/	
	}

	//code to get max bids allowed for an RFP
     function get_RFP_Maxbids()
	 {
	    //validation to redirect to vendor bidding form
		$rfp_id = JRequest::getVar('rfp_id','');
		$user = JFactory::getUser();
		$db = JFactory::getDBO();
		$sql = "SELECT maxProposals FROM #__cam_rfpinfo WHERE id=".$rfp_id;
		$db->Setquery($sql);
		$Max_bids = $db->loadResult();
		$prp_sql = "SELECT count(*) FROM #__cam_vendor_proposals WHERE rfpno=".$rfp_id." AND Alt_bid != 'yes' ";
		$db->Setquery($prp_sql);
		$Prp_bids = $db->loadResult();
		if($Max_bids > $Prp_bids)
		$flag = '1';
		else if($Max_bids == $Prp_bids)
		$flag = 0;
		return $flag;
	 }
	
	//function to get RFP, property, customer info
	function get_RFPinfo()
	{
		$rfp_id = JRequest::getVar('rfp_id','');
		$Prp_id = JRequest::getVar('Prp_id','');
	    $db = JFactory::getDBO();
		$sql = 'SELECT I.industry_name, U.name, U.showphone,U.showfax,U.showaddress,U.showcompany,U.showemail,U.lastname, U.email, U.extension, U.phone, C.comp_name, C.comp_city, C.comp_state, C.comp_phno, C.comp_extnno, C.comp_alt_phno, C.comp_alt_extnno, C.comp_website, C.mailaddress, P.street, P.property_name, P.state, P.city, P.zip, R.id, R.startDate, R.endDate, R.projectName,R.work_perform, R.frequency, R.proposalDueDate, R.proposalDueTime FROM #__cam_rfpinfo as R
		LEFT JOIN  #__cam_customer_companyinfo as C ON R.cust_id = C.cust_id  
		LEFT JOIN  #__cam_industries  as I ON R.industry_id = I.id  
		LEFT JOIN  #__cam_property as P ON R.property_id = P.id  
		LEFT JOIN  #__users as U ON R.cust_id = U.id WHERE R.id = '.$rfp_id;
		$db->Setquery($sql);
		$RFP_details = $db->loadObjectList();
		return $RFP_details;
	}
	
	//function to get DOCS info in vendor_proposal_form
	function get_DOCSinfo($Act,$Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$rfp_id = JRequest::getVar('rfp_id','');
		$user = JFactory::getUser();
		$sql = 'SELECT * FROM #__cam_rfpsow_docs WHERE rfp_id = '.$rfp_id ;
		$db->Setquery($sql);
		$DOCS_details = $db->loadObjectList();
		if($Act == 'Edit')
		{
			for($i=0; $i<count($DOCS_details); $i++)
			{
			 $arr = explode('/',$DOCS_details[$i]->doc_path);
			 $cnt = count($arr);
			 $DOCS_details[$i]->title = $arr[$cnt-1];
			 $sql = 'SELECT item_price FROM #__cam_rfpsow_docs_lineitems_prices WHERE rfp_id = '.$rfp_id.' AND vendor_id ='.$user->id.' AND item_type="doc" AND item_id='.$DOCS_details[$i]->doc_id.' AND Alt_bid="'.$Alt_Prp.'"' ;
			$db->Setquery($sql);
			$price = $db->loadResult();
			$DOCS_details[$i]->price = $price;
			}
		}
		//echo "<pre>"; print_r($DOCS_details);
		return $DOCS_details;
	}
	
	//function to get DOCS info in vendor_proposal_form
	function get_Tasks_DOCSinfo()
	{
	    $db = JFactory::getDBO();
		$rfp_id = JRequest::getVar('rfp_id','');
		$sql = 'SELECT task_id, taskuploads FROM #__cam_rfpsow_linetask  WHERE rfp_id = 1'.$rfp_id  ;
		$db->Setquery($sql);
		$Tasks_DOCS_details = $db->loadObjectList();
		for($i=0; $i<count($Tasks_DOCS_details); $i++)
		{
		 $arr = explode('/',$Tasks_DOCS_details[$i]->taskuploads);
 		 $cnt = count($arr);
		 $Tasks_DOCS_details[$i]->title = $arr[$cnt-1];
		}
		return $Tasks_DOCS_details;
	}
	
	//function to display industries list in popup
	function getindustires() 
	{
		global $mainframe;
		if(isset($_SESSION['industries']))
		$chk_arry = $_SESSION['industries'];
		$db = JFactory::getDBO();
		$checked    = JHTML::_( 'grid.id', $i, $row->id );
		$sql = "SELECT * FROM #__cam_industries WHERE published=1 order by industry_name ";
		$db->Setquery($sql);
		$objects = $db->loadObjectList();
		foreach( $objects as $key => $obj ) 
		{
			//$checked    = JHTML::_( 'grid.id', $key, $obj->industry_name);
			if(isset($chk_arry) && in_array($obj->industry_name,$chk_arry))
			$checked = "<input checked='checked' type='checkbox' onclick='isChecked(this.checked);' value='".$obj->industry_name."' name='cid[]' id='cb'".$key.">";
			else
			$checked = "<input type='checkbox' onclick='isChecked(this.checked);' value='".$obj->industry_name."' name='cid[]' id='cb'".$key.">";
			$industries[] = $checked.'&nbsp;'. $obj->industry_name;
		}
		//echo "<pre>"; print_r($industries);
	   return $industries;
	}
	
	//function to save vendor registration details
	function store($data)
	{
	 	// give me JTable object			 	
		$row = & $this->getTable('vendors');
		// Bind the form fields to the  table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		// Create the timestamp for the date field
		// Store the  detail record into the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	
	
   /***************************Edit related function**********************************/
   
   	//function to get uploaded DOCS in vendor_proposal_edit_form
	function get_Edit_DOCSinfo($Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$user = JFactory::getUser();
		$rfp_id = JRequest::getVar('rfp_id','');
		$vendor_id = JRequest::getVar('vendor_id','');
		$sql = 'SELECT * FROM #__cam_rfpsow_uploadfiles  WHERE rfp_id ='.$rfp_id.' AND vendor_id='.$vendor_id.' AND Alt_bid = "'.$Alt_Prp.'"' ;
		$db->Setquery($sql);
		$Edit_DOCS_details = $db->loadObjectList();
		return $Edit_DOCS_details;
	}
	
	//function to get download docs
	function get_Remove_downloadfile($Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$spl_req = JRequest::getVar('spl_req',''); 
		$doc_id = JRequest::getVar('doc_id',''); 
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$vendor_id = JRequest::getVar('vendor_id',''); 
		$user = JFactory::getUser();
		$vendor_id = $user->id;
		$sql = 'DELETE FROM #__cam_rfpsow_uploadfiles  WHERE spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND id ='.$doc_id.' AND vendor_id='.$vendor_id.' AND Alt_bid = "'.$Alt_Prp.'"' ;  
		$db->Setquery($sql);
		$db->query();
		return ;
	} 
	
	//function to get Proposal Price details in Proposal edit form
	function get_Proposal_price_details($Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$Proposal_id = JRequest::getVar('Proposal_id',''); 
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$user = JFactory::getUser();
		$sql = 'SELECT price_other_items,proposal_total_price,commission,(proposal_total_price-price_other_items) as tasks_total_price FROM #__cam_vendor_proposals  WHERE rfpno = '.$rfp_id.' AND proposedvendorid ='.$user->id.' AND id='.$Proposal_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$Proposal_price_details = $db->loadObjectList();
		return $Proposal_price_details;
	} 
	
	//function to get Add notes data in popup -- Proposal edit form
	function get_task_Addnotes($spl_req,$Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$task_id = JRequest::getVar('task_id',''); 
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$vendor_id = JRequest::getVar('vendor_id','');
		$sql = 'SELECT * FROM #__cam_rfpsow_addnotes  WHERE status = "active" AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$task_Addnotes_details = $db->loadObjectList(); 
		//echo "<pre>"; print_r($task_Addnotes_details); exit;
		return $task_Addnotes_details;
	} 
	
	//function to get Add notes data in popup -- Proposal edit form
	function get_task_Addexception($spl_req,$Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$task_id = JRequest::getVar('task_id',''); 
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$vendor_id = JRequest::getVar('vendor_id','');
		$sql = 'SELECT * FROM #__cam_rfpsow_addexception   WHERE status = "active" AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$task_AddException_details = $db->loadObjectList(); 
		return $task_AddException_details;
	} 
	
	/******************proposal preview related functions*********************************/
	//function to get RFP tasks info
	function get_TASKSinfo_preview($act,$Alt_Prp)
	{
	    $db = JFactory::getDBO();
		$rfp_id = JRequest::getVar('rfp_id','');
		$user = JFactory::getUser();
		$sql = 'SELECT * FROM #__cam_rfpsow_linetask WHERE rfp_id = '.$rfp_id ; 
		$db->Setquery($sql);
		$TASK_details = $db->loadObjectList();
		//echo "<pre>"; print_r($TASK_details);
		if($act == 'Preview')
		{
		  for($p=0; $p<count($TASK_details); $p++) //to get task price
		  {
		  $price_sql = 'SELECT item_price FROM #__cam_rfpsow_docs_lineitems_prices  WHERE item_type="task" AND item_id = '.$TASK_details[$p]->task_id.' AND vendor_id = '.$user->id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		  $db->Setquery($price_sql);
		  $price = $db->loadResult();
		  $TASK_details[$p]->price = $price;
		  } 
		  for($u=0; $u<count($TASK_details); $u++)//to get task related uploaded files
		  {
		   $upld_sql = 'SELECT upload_doc FROM #__cam_rfpsow_uploadfiles  WHERE spl_req = "No" AND task_id = '.$TASK_details[$u]->task_id.' AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'  ;
		  $db->Setquery($upld_sql);
		  $upld_file = $db->loadResultArray();
		  $TASK_details[$u]->uploaded_file = $upld_file;
		  $upld_sql = 'SELECT id FROM #__cam_rfpsow_uploadfiles  WHERE spl_req = "No" AND task_id = '.$TASK_details[$u]->task_id.' AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'  ;
		  $db->Setquery($upld_sql);
		  $upld_doc_ids = $db->loadResultArray();
		  $TASK_details[$u]->uploaded_doc_ids = $upld_doc_ids;
		  $upld_title = array();
		   for($i=0; $i<count($upld_file); $i++)
			{
		 		$arr = explode('/',$upld_file[$i]);
 		 		$cnt = count($arr);
		 		$upld_title[$i] = $arr[$cnt-1];
			}
			$TASK_details[$u]->uploadfile_title = $upld_title;
			$db = JFactory::getDBO();
			$spl_req = 'No';
			$task_id = $TASK_details[$u]->task_id; 
			$vendor_id = JRequest::getVar('vendor_id','');
			$sql = 'SELECT add_notes FROM #__cam_rfpsow_addnotes  WHERE status = "active" AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
			$db->Setquery($sql);
			$db->query();
		  	$TASK_details[$u]->addnotes_desc = $db->loadResultArray(); 
			$sql = 'SELECT add_exception FROM #__cam_rfpsow_addexception  WHERE status = "active" AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
			$db->Setquery($sql);
			$db->query();
		  $TASK_details[$u]->exception_desc = $db->loadResultArray(); 
		  }
		  
		 
		}
		 //echo "<pre>"; print_r($TASK_details); exit;
		return $TASK_details;
	}
	
	//function to get RFP special requirements tabs Addnotes, Uploadfile, Addexception links
	function get_SPLRequirements_Preview($act,$Alt_Prp)
	{
		$rfp_id = JRequest::getVar('rfp_id',''); 
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		$upld_sql = 'SELECT upload_doc FROM #__cam_rfpsow_uploadfiles  WHERE (status="active" OR status="") AND spl_req = "Yes" AND task_id = 0 AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp .'"' ;
		$db->Setquery($upld_sql);
		$upld_file = $db->loadResultArray();
		$SPL_REQ_tabs[0]->uploaded_file = $upld_file;
		$upld_sql = 'SELECT id FROM #__cam_rfpsow_uploadfiles  WHERE (status="active" OR status="") AND spl_req = "Yes" AND task_id = 0 AND rfp_id ='.$rfp_id.' AND vendor_id='.$user->id.' AND Alt_bid="'.$Alt_Prp.'"'   ;
		$db->Setquery($upld_sql);
		$upld_ids = $db->loadResultArray();
		$SPL_REQ_tabs[1]->uploaded_doc_ids = $upld_ids;
		$upld_title = array();
		for($i=0; $i<count($upld_file); $i++)
		{
		$arr = explode('/',$upld_file[$i]);
		$cnt = count($arr);
		$upld_title[$i] = $arr[$cnt-1];
		}
		$SPL_REQ_tabs[2]->uploadfile_title = $upld_title;
		
		$db = JFactory::getDBO();
		$spl_req = 'Yes';
		$task_id = 0; 
		$vendor_id = JRequest::getVar('vendor_id','');
		$sql = 'SELECT add_notes FROM #__cam_rfpsow_addnotes  WHERE (status="active" OR status="") AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$SPL_REQ_tabs[3]->addnotes_desc = $db->loadResultArray(); 
		$sql = 'SELECT add_exception FROM #__cam_rfpsow_addexception  WHERE (status="active" OR status="") AND spl_req = "'.$spl_req.'" AND rfp_id = '.$rfp_id.' AND vendor_id ='.$vendor_id.' AND task_id='.$task_id.' AND Alt_bid="'.$Alt_Prp.'"' ; 
		$db->Setquery($sql);
		$db->query();
		$SPL_REQ_tabs[4]->exception_desc = $db->loadResultArray(); 
		//echo "<pre>"; print_r($SPL_REQ_tabs);
		return $SPL_REQ_tabs;
	}
	


}
?>