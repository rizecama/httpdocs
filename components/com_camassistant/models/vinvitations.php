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

defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.model' );
class camassistantModelVinvitations extends Jmodel
{
	function __construct(){
		parent::__construct();

	}
	



}
class vinvitationsModelVinvitations extends Jmodel
{
function __construct()
	{
		parent::__construct();
 
}
//To send the manager invitation to vendor
function getbody(){
		$db= JFactory::getDBO();
		$user=JFactory::getUser();
		//To get the manager company
		$companyname ="SELECT comp_name,comp_phno  FROM #__cam_customer_companyinfo where cust_id=".$user->id." ";
		$db->setQuery( $companyname );
		$list = $db->loadObject();
		
		$invitecode ="SELECT manager_invitecode  FROM #__users where id=".$user->id." ";
		$db->setQuery( $invitecode );
		$invitecode = $db->loadResult();
		if($invitecode)
		$invitecode = $invitecode;
		else
		$invitecode ='Please contact us for Invite Code';
		$query_rejectedemail ="SELECT introtext  FROM #__content where id='257'";
		$db->setQuery( $query_rejectedemail );
		$body = $db->loadResult();
		$body = html_entity_decode($body);
		$body = str_replace("[Manager's Full Name]",$user->name.' '.$user->lastname,$body);
		$body = str_replace('[Management Company]',$list->comp_name,$body);
		$body = str_replace("[Manager's Primary Phone Number]",$list->comp_phno,$body);
		$body = str_replace("[Master Account Preferred Vendor Code]",$invitecode,$body);
		return $body;
}

function getbody_new(){
		$db= JFactory::getDBO();
		$user=JFactory::getUser();
		//To get the manager company
		$companyname ="SELECT comp_name,comp_phno  FROM #__cam_customer_companyinfo where cust_id=".$user->id." ";
		$db->setQuery( $companyname );
		$list = $db->loadObject();
		
		$invitecode ="SELECT manager_invitecode  FROM #__users where id=".$user->id." ";
		$db->setQuery( $invitecode );
		$invitecode = $db->loadResult();
		if($invitecode)
		$invitecode = $invitecode;
		else
		$invitecode ='Please contact us for Invite Code';
		
		$managerid ="SELECT managerid FROM #__cam_vendorinviation_mail where managerid=".$user->id."";
		$db->setQuery( $managerid );
		$managerid = $db->loadResult();
		if($managerid)
		
			$query_rejectedemail ="SELECT email_text FROM #__cam_vendorinviation_mail where managerid=".$user->id."";
		else
		    $query_rejectedemail ="SELECT introtext  FROM #__content where id='257'";
		
		$db->setQuery( $query_rejectedemail );
		$body = $db->loadResult();
		$body = html_entity_decode($body);
		$body = str_replace("[Manager's Full Name]",$user->name.' '.$user->lastname,$body);
		$body = str_replace('[Management Company]',$list->comp_name,$body);
		$body = str_replace("[Manager's Primary Phone Number]",$list->comp_phno,$body);
		$body = str_replace("[Master Account Preferred Vendor Code]",$invitecode,$body);
		return $body;
}

function getinfo(){
		$db= JFactory::getDBO();
		$user=JFactory::getUser();
		$managerid ="SELECT email_new,subject_new FROM #__cam_vendorinviation_mail where managerid=".$user->id."";
		$db->setQuery( $managerid );
		$managerid = $db->loadObject();
		return $managerid;
}
//Completed
function getsavedetails($data){
	$db= JFactory::getDBO();
	$user=JFactory::getUser();
	$date = date('Y-m-d H:i');
	$query = "insert into #__cam_newvendorinvitations (`id`, `managerid`, `vendoremailid`, `vendorid`, `date`, `articletype`) VALUES ('','".$user->id."','".$data['vendoremailid']."','','".$date."','')";
	$db->setQuery($query);
	$save_data = $db->query();
	return $save_data ;
	}
	//Function to get the invited vendors list
	function getprevious()
	{
	   $db= JFactory::getDBO();
		$user =& JFactory::getUser();
	 	$user_id = $user->get('id');
		$usertype = $user->get('user_type');
		$cid = $_REQUEST['cid'];
		$type = $_REQUEST['type'];
		

		$query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$user_id;
		$db->setQuery($query);
		$comp_id = $db->loadResult();

		$query_get = "SELECT cust_id FROM #__cam_customer_companyinfo WHERE comp_id=".$comp_id;
		$db->setQuery($query_get);
		$managers = $db->loadObjectList();
		
			$sort = JRequest::getVar('sort','');
		
		if($sort == 'asc')
			$sorting = 'order by vendoremailid ASC';
		else if($sort == 'desc' )
			$sorting = 'order by vendoremailid DESC';
		
		else
			$sorting = 'order by date DESC';
		if($cid )
		{
		 if($cid =='undefined')
		 $cid = $user_id;
		 else
		 $cid = $cid;
		 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  managerid='".$cid."' and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		else
		{	 
		if($usertype ==13 && count($managers)!=0){
for($i=0; $i<count($managers);$i++){
 $condition = $condition." OR managerid='".$managers[$i]->cust_id."'";
  $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  (managerid='".$user_id."' ".$condition.")  and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		}
		else{
		 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where managerid = ". $user->id ." and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
  
	if($user->dmanager == 'yes'){
		$dmmanagers = "SELECT managerid FROM #__cam_invitemanagers WHERE dmanager=".$user->id;
		$db->setQuery($dmmanagers);
		$dm_managers = $db->loadObjectlist();
		for($i=0; $i<count($dm_managers);$i++){
$condition = $condition." OR managerid='".$dm_managers[$i]->managerid."'";
 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  (managerid='".$user_id."' ".$condition.") and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		}
		
		if($usertype ==13 && $user->accounttype == 'master')
		{
			$sql1 = "SELECT firmid from #__cam_masteraccounts where masterid=".$user->id." ";
			$db->Setquery($sql1);
			$subfirms = $db->loadObjectlist();
			//echo "<pre>"; print_r($subfirms); echo "</pre>";
	if($subfirms)
		{
			for( $a=0; $a<count($subfirms); $a++ )
				{
					$firmid1[] = $subfirms[$a]->firmid;
					$sql = "SELECT id from #__cam_camfirminfo where cust_id=".$subfirms[$a]->firmid." ";
					$db->Setquery($sql);
					$companyid[] = $db->loadResult();
											
				}
				//echo "<pre>"; print_r($firmid1); echo "</pre>";	
        }
			
	if($companyid)
		{
         	for( $c=0; $c<count($companyid); $c++ )
				{
					$sql_cid = "SELECT cust_id from #__cam_customer_companyinfo where comp_id=".$companyid[$c]." ";
					$db->Setquery($sql_cid);
					$managerids = $db->loadObjectList();
						if($managerids) {
							foreach( $managerids as $last_mans){
								$total_mangrs[] = $last_mans->cust_id ;
							}
						}
               }
        }
		
	if($firmid1 && $total_mangrs )
		{
            $total_mangrs = array_merge($total_mangrs,$firmid1); 
        }
	if($firmid1){
            for( $d=0; $d<count($firmid1); $d++ ){
        $query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$firmid1[$d];
	$db->setQuery($query);
	$comp_id = $db->loadResult();
	$userid=array($user->id);
	$query_mans = "SELECT cust_id from #__cam_customer_companyinfo where comp_id = ".$comp_id." ";
	$db->setQuery($query_mans);
        $Managers_list1 = $db->loadObjectList();
                if($Managers_list1) {
                        foreach( $Managers_list1 as $Managers_list2){
                                $Managers_list[] = $Managers_list2->cust_id ;
                        }
                }
            }
        if($Managers_list){
        $total_mangrs = array_merge($Managers_list,$firmid1);
            } else {
         $total_mangrs = $firmid1;        
            }
        }		
        $userid=array($user->id);
        if($total_mangrs){
        $total_mangrs = array_merge($userid,$total_mangrs); 
		}
		else{
		$total_mangrs[] = $user->id; 
		}
		$totalcust_id1_arr = implode($total_mangrs,',');
		$condition = " managerid IN (".$totalcust_id1_arr.")";
		
 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  ".$condition." and publish='0' GROUP BY vendoremailid ".$sorting." " ;

	}
	}	
	
	
	$db->setQuery($query);
	$invitations = $db->loadObjectList(); 
		
		for( $i=0; $i<count($invitations); $i++ ){
			$querys  = "SELECT id FROM  #__users  where user_type='11' and ( username = '". $invitations[$i]->vendoremailid ."' or email ='".$invitations[$i]->vendoremailid."' )" ;
				$db->setQuery($querys);
				$exid = $db->loadResult(); 
				if($exid){
				$invitations[$i]->status = 'accepted';
				}
				else{
					$invitations[$i]->status = 'notaccepted';
					/*$query_cc  = "SELECT ccemail FROM  #__users  where user_type='11' " ; 
					$db->setQuery($query_cc);
					$ccmails = $db->loadObjectList(); 
					for( $d=0; $d<count($ccmails); $d++ ){
					$cclist = explode(';',$ccmails[$d]->ccemail);
					for($c=0; $c<=count($cclist); $c++){
						$listcc = $cclist[$c];
							if($listcc){
								if( $listcc ==  $invitations[$i]->vendoremailid )
									$invitations[$i]->status = 'accepted';
							}
						}
					}*/	
				}
		}
	
	return $invitations;
	}

	
	function getvendorinfobydate()
	{
	  
	   $db= JFactory::getDBO();
		$user =& JFactory::getUser();
	 	$user_id = $user->get('id');
		$usertype = $user->get('user_type');
		$cid = $_REQUEST['cid'];
		$type = $_REQUEST['type'];
		

		$query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$user_id;
		$db->setQuery($query);
		$comp_id = $db->loadResult();

		$query_get = "SELECT cust_id FROM #__cam_customer_companyinfo WHERE comp_id=".$comp_id;
		$db->setQuery($query_get);
		$managers = $db->loadObjectList();
		
			$sort = JRequest::getVar('sort_date','');
		
		if($sort == 'asc1')
			$sorting = 'order by date ASC';
		else 
			$sorting = 'order by date DESC';
		
		
			
			
		if($cid )
		{
		 if($cid =='undefined')
		 $cid = $user_id;
		 else
		 $cid = $cid;
		$query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  managerid='".$cid."' and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		else
		{	 
		if($usertype ==13 && count($managers)!=0){
for($i=0; $i<count($managers);$i++){
 $condition = $condition." OR managerid='".$managers[$i]->cust_id."'";
  $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  (managerid='".$user_id."' ".$condition.")  and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		}
		else{
		 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where managerid = ". $user->id ." and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
  
	if($user->dmanager == 'yes'){
		$dmmanagers = "SELECT managerid FROM #__cam_invitemanagers WHERE dmanager=".$user->id;
		$db->setQuery($dmmanagers);
		$dm_managers = $db->loadObjectlist();
		for($i=0; $i<count($dm_managers);$i++){
$condition = $condition." OR managerid='".$dm_managers[$i]->managerid."'";
 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  (managerid='".$user_id."' ".$condition.") and publish='0' GROUP BY vendoremailid ".$sorting." " ;
		}
		}
		
		if($usertype ==13 && $user->accounttype == 'master')
		{
			$sql1 = "SELECT firmid from #__cam_masteraccounts where masterid=".$user->id." ";
			$db->Setquery($sql1);
			$subfirms = $db->loadObjectlist();
			//echo "<pre>"; print_r($subfirms); echo "</pre>";
	if($subfirms)
		{
			for( $a=0; $a<count($subfirms); $a++ )
				{
					$firmid1[] = $subfirms[$a]->firmid;
					$sql = "SELECT id from #__cam_camfirminfo where cust_id=".$subfirms[$a]->firmid." ";
					$db->Setquery($sql);
					$companyid[] = $db->loadResult();
											
				}
				//echo "<pre>"; print_r($firmid1); echo "</pre>";	
        }
			
	if($companyid)
		{
         	for( $c=0; $c<count($companyid); $c++ )
				{
					$sql_cid = "SELECT cust_id from #__cam_customer_companyinfo where comp_id=".$companyid[$c]." ";
					$db->Setquery($sql_cid);
					$managerids = $db->loadObjectList();
						if($managerids) {
							foreach( $managerids as $last_mans){
								$total_mangrs[] = $last_mans->cust_id ;
							}
						}
               }
        }
		
	if($firmid1 && $total_mangrs )
		{
            $total_mangrs = array_merge($total_mangrs,$firmid1); 
        }
	if($firmid1){
            for( $d=0; $d<count($firmid1); $d++ ){
        $query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$firmid1[$d];
	$db->setQuery($query);
	$comp_id = $db->loadResult();
	$userid=array($user->id);
	$query_mans = "SELECT cust_id from #__cam_customer_companyinfo where comp_id = ".$comp_id." ";
	$db->setQuery($query_mans);
        $Managers_list1 = $db->loadObjectList();
                if($Managers_list1) {
                        foreach( $Managers_list1 as $Managers_list2){
                                $Managers_list[] = $Managers_list2->cust_id ;
                        }
                }
            }
        if($Managers_list){
        $total_mangrs = array_merge($Managers_list,$firmid1);
            } else {
         $total_mangrs = $firmid1;        

            }
        }		
        $userid=array($user->id);
        if($total_mangrs){
        $total_mangrs = array_merge($userid,$total_mangrs); 
		}
		else{
		$total_mangrs[] = $user->id; 
		}
		$totalcust_id1_arr = implode($total_mangrs,',');
		$condition = " managerid IN (".$totalcust_id1_arr.")";
		
 $query  = "SELECT id, vendoremailid,managerid, date FROM  #__cam_newvendorinvitations  where  ".$condition." and publish='0' GROUP BY vendoremailid ".$sorting." " ;

	}
	}	
	
	
	$db->setQuery($query);
	$invitations = $db->loadObjectList(); 
	
		for( $i=0; $i<count($invitations); $i++ ){
			$querys  = "SELECT id FROM  #__users  where email = '". $invitations[$i]->vendoremailid ."' or ccemail LIKE '%".$invitations[$i]->vendoremailid."%' " ;
				$db->setQuery($querys);
				$exid = $db->loadResult(); 
				if($exid){
				$invitations[$i]->status = 'accepted';
				}
				else{
					$invitations[$i]->status = 'notaccepted';
					/*$query_cc  = "SELECT ccemail FROM  #__users  where user_type='11' " ; 
					$db->setQuery($query_cc);
					$ccmails = $db->loadObjectList(); 
					for( $d=0; $d<count($ccmails); $d++ ){
					$cclist = explode(';',$ccmails[$d]->ccemail);
					for($c=0; $c<=count($cclist); $c++){
						$listcc = $cclist[$c];
							if($listcc){
								if( $listcc ==  $invitations[$i]->vendoremailid )
									$invitations[$i]->status = 'accepted';
							}
						}
					}*/	
				}
		}
		
	
	
		
	return $invitations;
	}
	
	function getexistingid($managerid){
		$db = JFactory::getDBO();
		$query_rfpmail ="SELECT id, email_text from #__cam_vendorinviation_mail where managerid=".$managerid." ";
		$db->setQuery( $query_rfpmail );
		$mailid = $db->loadObject();
		return $mailid;
	}
	function store_mailtext($post){
	
		$row = & $this->getTable('vendorinvitationmail');
		if (!$row->bind($post)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return true;
		
	}
	
	function managemanagers(){
		$user =& JFactory::getUser();
		$db=&JFactory::getDBO();
			if($user->user_type == 13 && $user->accounttype != 'master') {
			$totalmanagers = $this->gettotalmanagersofcamfirm();
			$whereas[] = "`id` IN (".implode( ' , ' , $totalmanagers).") ";
			}
			else if($user->dmanager == 'yes'){
			$total_mangrs = $this->gettotalmanagersofdm() ;	
			$whereas[] = "`id` IN (".implode( ' , ' , $total_mangrs).") ";
			}
			else if($user->user_type ==13 && $user->accounttype == 'master')
			{
			$total_mangrs = $this->getmastermanagers() ;
			$whereas[] = "`id` IN (".implode( ' , ' , $total_mangrs).") ";
			}
			else{
			$whereas[] = "`id` IN (".$user->id.") ";
			}
		$query = "SELECT id,name,lastname FROM #__users where block='0' "; 
			if($whereas) {
				$query .= " AND ".implode( ' AND ', $whereas )."   ";
			}
			
			$db->setQuery($query);
       	 	$managers_mans=$db->loadObjectList();
			return $managers_mans;
	}
	function gettotalmanagersofcamfirm(){
	$db = JFactory::getDBO();
	$user = JFactory::getUser();
	$query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$user->id;
	$db->setQuery($query);
	$comp_id = $db->loadResult();
	$userid=array($user->id);
	$query_mans = "SELECT cust_id from #__cam_customer_companyinfo where comp_id = ".$comp_id." ";
	$db->setQuery($query_mans);
    $Managers_list = $db->loadObjectList();
	
	foreach( $Managers_list as $cf_mans)
		{
			$total_mangrs[] = $cf_mans->cust_id ;
		}
	if($total_mangrs){
		$totalcust_id1 = array_merge($userid,$total_mangrs); 
	}
	else{
		$totalcust_id1[] = $user->id; 
	}

	return $totalcust_id1; 	
	}
	function gettotalmanagersofdm(){
	$db = JFactory::getDBO();
	$user = JFactory::getUser();
	$dmmanagers = "SELECT DISTINCT managerid FROM #__cam_invitemanagers WHERE dmanager=".$user->id;
	$db->setQuery($dmmanagers);
	$dm_managers = $db->loadObjectlist();
					
		for($i=0; $i<count($dm_managers);$i++){
			$query = "SELECT id from #__users where id='".$dm_managers[$i]->managerid."'" ;
			$db->setQuery($query);
			$total_mangrs[]=$db->loadResult();
			}

			/*if($Managers_list){
	foreach( $Managers_list as $cf_mans)
		{
			$total_mangrs[] = $cf_mans->id ;
		}
		}*/

	$userid=array($user->id);		
	if($total_mangrs){
		$totalcust_id1 = array_merge($userid,$total_mangrs); 
	}
	else{
		$totalcust_id1[] = $user->id; 
	}
	 return $totalcust_id1; 		
	}
	
	function getmastermanagers(){
			$user =& JFactory::getUser();
			$db=&JFactory::getDBO();
			$sql1 = "SELECT firmid from #__cam_masteraccounts where masterid=".$user->id." ";
			$db->Setquery($sql1);
			$subfirms = $db->loadObjectlist();
			
	if($subfirms)
		{
			for( $a=0; $a<count($subfirms); $a++ )
				{
					$firmid1[] = $subfirms[$a]->firmid;
					$sql = "SELECT id from #__cam_camfirminfo where cust_id=".$subfirms[$a]->firmid." ";
					$db->Setquery($sql);
					$companyid[] = $db->loadResult();
											
				}
				
        }
			
	if($companyid)
		{
         	for( $c=0; $c<count($companyid); $c++ )
				{
					$sql_cid = "SELECT cust_id from #__cam_customer_companyinfo where comp_id=".$companyid[$c]." ";
					$db->Setquery($sql_cid);
					$managerids = $db->loadObjectList();
						if($managerids) {
							foreach( $managerids as $last_mans){
								$total_mangrs[] = $last_mans->cust_id ;
							}
						}
               }
        }
	
	if($firmid1 && $total_mangrs )
		{
            $total_mangrs = array_merge($total_mangrs,$firmid1); 
        }
        if($firmid1){
            for( $d=0; $d<count($firmid1); $d++ ){
        $query = "SELECT id FROM #__cam_camfirminfo WHERE cust_id=".$firmid1[$d];
	$db->setQuery($query);
	$comp_id = $db->loadResult();
	$userid=array($user->id);
	$query_mans = "SELECT cust_id from #__cam_customer_companyinfo where comp_id = ".$comp_id." ";
	$db->setQuery($query_mans);
        $Managers_list1 = $db->loadObjectList();
                if($Managers_list1) {
                        foreach( $Managers_list1 as $Managers_list2){
                                $Managers_list[] = $Managers_list2->cust_id ;
                        }
                }
            }
            if($Managers_list){
        $total_mangrs = array_merge($Managers_list,$firmid1);
            } else {
         $total_mangrs = $firmid1;        
            }
        }
	/*if($firmid1){
            $total_mangrs = $firmid1;
        }
         */
        $userid=array($user->id);
        if($total_mangrs){
        $total_mangrs = array_merge($userid,$total_mangrs); 
		}
		else{
		$total_mangrs[] = $user->id; 
		}
		 
		return $total_mangrs;
	}
	
 function addvendor($vendorid)
   {
	$db =& JFactory::getDBO();
	$user	= JFactory::getUser();
	
	// To check if is there any pre invitations to same user
	$checkvendor = "SELECT vid FROM #__vendor_inviteinfo where userid =".$user->id." and v_id=".$vendorid." ";
	$db->setQuery($checkvendor);
	$exist = $db->loadResult();
    
	if($exist){
		
			$query = "UPDATE #__vendor_inviteinfo SET search = 'yes' WHERE vid ='".$exist."'"; 
			$db->setQuery($query);
			$db->query();
		
	echo "already";
	
	}	
	
	else {
		// To get the company id
		$taxid = $this->getcompanyid($user->id,$user->user_type);
		//Completed
		//$email = JRequest::getVar( 'emailid',''); 
		$checkvendor_email = "SELECT email FROM #__users where id =".$vendorid." ";
		$db->setQuery($checkvendor_email);
		$email = $db->loadResult();
	
		$from_email = $user->email;
		$post['userid'] = $user->id ;
		$post['v_id'] = $vendorid;
		$post['taxid'] = $taxid;
		$post['licenseno'] = '';
		$post['vendortype'] = 'preferred';
		$post['fei'] = '';
		$post['inhousevendors'] = $email;
		$post['inhouse'] = $email;
		$post['subject'] = "Preferred invitation from camfirm";
		$post['inhousetext'] = "Preferred invitation from camfirm";
		$post['status'] = 1;
		$post['invitedate'] = date('Y-m-d h:i:m');;
		if($action_type == 'exclude') {
		$post['search'] = 'yes';
		$post['exclude'] = 'yes';
		}
		else {
		$post['search'] = '';
		$post['exclude'] = '';
		}
		$save = $this->store_add($post);
	   }
		
		$sendmail = $this->sendmailtovendor($vendorid);
		
	}
	
	function getcompanyid($id, $type){
	$db =& JFactory::getDBO();
	if($type == 13){
	$taxid = "SELECT id FROM #__cam_camfirminfo where cust_id =".$id."  ";
	$db->setQuery($taxid);
	$tax = $db->loadResult();
	}
	else{
	$taxid = "SELECT comp_id FROM #__cam_customer_companyinfo where cust_id =".$id."  ";
	$db->setQuery($taxid);
	$tax = $db->loadResult();
	}
	return $tax;  
	}
	
	function store_add($data){

	$row =& $this->getTable('invitevendors');
	//echo "<pre>"; print_r($row);print_r($post); exit;
		jimport('joomla.user.helper');
		// Bind the form fields to the  table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	function sendmailtovendor($vendorid){
		$user =& JFactory::getUser();
		$db = & JFactory::getDBO();
		//get article text
		$mailbody = $this->getmailtext();
		$mastercname = $this->getmasterdetails();
		$vendorinfo = $this->getvendordetails($vendorid);
		$managername = $user->name.'&nbsp;'.$user->lastname;
		
		$body = str_replace('[Vendor Company Name]',$vendorinfo->company_name,$mailbody);
		$body = str_replace('[Manager Full Name]',$managername,$body);
		$body = str_replace('[Manager Company Name]',$mastercname,$body);
		
		$mailfrom = $user->email;
		$fromname = 'MyVendorCenter.com';
		$mailsubject = "Vendor Invitation";
		$to = $vendorinfo->email;
		$ccemails = $vendorinfo->ccemail;
		
		$result = JUtility::sendMail($mailfrom, $fromname, $to, $mailsubject, $body, $mode = 1);
		$to_support = 'rize.cama@gmail.com';
		$to_support = 'vendoremails@myvendorcenter.com';
		$result = JUtility::sendMail($mailfrom, $fromname, $to_support, $mailsubject, $body, $mode = 1);
		$cclist = explode(';',$ccemails);
			for($c=0; $c<=count($cclist); $c++){
				$listcc = $cclist[$c];
				if($listcc){
					$result = JUtility::sendMail($mailfrom, $fromname, $listcc, $mailsubject, $body, $mode = 1);
				}
			} 
		
	}
	function getmailtext(){
	$db = & JFactory::getDBO();
	$body_msg = "SELECT introtext  FROM #__content where id='329'";
	$db->setQuery($body_msg);
	$msg=$db->loadResult();
	return $msg;
	}
	function getmasterdetails(){
		$user =& JFactory::getUser();
		$db = & JFactory::getDBO();
		$masterdata = "SELECT comp_name  FROM #__cam_customer_companyinfo where cust_id=".$user->id." ";
		$db->setQuery($masterdata);
		$master_c_name = $db->loadResult();
		return $master_c_name;
	}
	function getvendordetails($vendorid){
		$db = & JFactory::getDBO();
		$sql_vcname = "SELECT V.company_name, U.email, U.ccemail FROM #__cam_vendor_company as V, #__users as U where V.user_id=".$vendorid." and V.user_id=U.id";
		$db->setQuery( $sql_vcname );
		$vendordata = $db->loadObject();
		return $vendordata;
	}
	//COmpleted
	
	//invite vendor code feature
	
	function managerdefaultinvitecode(){
		$db = & JFactory::getDBO();
		$user = & JFactory::getUser();
		 $code = "SELECT manager_invitecode FROM #__users where id=".$user->id."";
		$db->setQuery( $code );
		$code = $db->loadResult();
		return $code;
	}
	//
	function getuserinfo(){
			$db = & JFactory::getDBO();
			$user = & JFactory::getUser();
			 $info = "SELECT email_new,subject_new,status FROM #__cam_vendorinviation_mail where managerid=".$user->id." and status=1";
			$db->setQuery( $info );
			$info = $db->loadObject();
			return $info;
	 } 
}
?>