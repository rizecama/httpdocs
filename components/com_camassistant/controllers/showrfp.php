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

jimport('joomla.application.component.controller');

class showrfpController extends JController
{

	function __construct()
	{
			parent::__construct();
	}

	function display()
	{
		$user	= JFactory::getUser();
		if($user->user_type == 12 || $user->user_type == 13)
		{
			JRequest::getVar('view','showrfp');
	    	parent::display();
		}
		else
		{
			JRequest::setVar('task', 'not_authorized');
			JRequest::setVar('view', 'showrfp');
			parent::display();
		}
		
	
	}
	function rfpform()
	{
		JRequest::setVar('view', 'rfp');
		parent::display();
	}
	
	function submit_rfp()
	{
		global $mainframe;
		$user=JFactory::getUser();  //For $my
		$basepath=JURI::root(); 
		$db = &JFactory::getDbo();
		$post = JRequest::get('post');
		$post['publish']=1;
		$post['cust_id']=$user->id;
		$createdDate=date('Y-m-d');
		$post['createdDate']=$createdDate;
		$property_id=$post['property_id'];
		$industry_id=$post['industry_id'];
		$model	=& $this->getModel('rfp');
		//echo "<pre>"; print_r($model); exit;
		$from_name=$user->name;
		$from_email=$user->email;
		
		if($model->store($post)) {
			$mesg = "<font color='red' size='3'><b>RFP stored successfully<b></font>";	
		} else {
			$mesg = "Could not added RFP";
		}
		$rfp_id = $db->insertid();
		$line_tasks['rfp_id']=$rfp_id;
		$task_desc =  JRequest::getVar('task_desc',array()); 
		$is_req_taskvendors =  JRequest::getVar('is_req_taskvendors',array());
		if(count($task_desc)>0)
		{
			for($i=0;$i<count($task_desc);$i++)
			{
				$line_tasks['task_desc']=$task_desc[$i];
				$line_tasks['is_req_taskvendors']=$is_req_taskvendors[$i];
				$line_tasks['rfp_id']=$rfp_id;
				if($model->tasks_store($line_tasks)) {
				$mesg = "Tasks stored successfully";	
				} else {
					$mesg = "Error saved";
				}
			}
		}
		$req_docprice =  JRequest::getVar('require_docprice',array()); 
		if(count($_FILES['attachmnent'])>0)
		{
			for($i=0;$i<count($_FILES['attachmnent']);$i++)
			{
				$file=$this->checkImage($_FILES['attachmnent']['name'][$i],$_FILES['attachmnent']['tmp_name'][$i]);
				if($file)
				{
					$req_docsow['is_req_docvendors']=$req_docprice[$i];
					$req_docsow['doc_path']='components/com_camassistant/assets/images/rfp/'.$file;
					$req_docsow['rfp_id']=$rfp_id;
					if($model->reqdocs_store($req_docsow)) {
					$mesg = "Documents stored successfully";	
					} else {
						$mesg = "Error saved";
					}
				}		
			}
		}
		$splreq_rfp['rfp_id']=$rfp_id;
		$splreq_rfp['req_parentid']=$post['req_parentid'];
		$splreq_rfp['req_id']=$post['req_id'];
		$splreq_rfp['price']=$post['price'];
		if($model->rfpsplreqs_store($splreq_rfp)) {
		
		}
		//Code for sending Email to Property Manager for this related property 
		$pmdetails=$model->getPManagers($property_id);
		$from_name=$user->name;
		$from_email=$user->email;
		$pmemail=$pmdetails[0]->email;
		$sub='RFP Created Info';
		if($pmemail) 
		{
			$sitename=$mainframe->getCfg('sitename');
			$getCfgfromname=$mainframe->getCfg('fromname');
			$body_content='';
			$body='';
			$body_content='<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><h3>Congratulations!</h3></td>
							  </tr>
							  <tr>
								<td><strong>Your RFP has been successfully submitted to the CAMASSISTANT NETWORK</strong></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>';
			$body = '<table width="100%" border="0" cellspacing="0" cellpadding="0">
				 <tr>
				   <td width="20%"><span style="font-family: Helvetica,Arial,sans-serif;">Hi '.ucwords($pmdetails[0]->name).'</span></td>
				   <td>&nbsp;</td>
				 </tr>
				  <tr>
				   <td width="20%">&nbsp;</td>
				   <td>&nbsp;</td>
				 </tr>
				 <tr>
				 <td colspan="2">'.$body_content.'</td>
				 </tr>
				  <tr>
				   <td>Regards</td>
				   <td>&nbsp;</td>
				 </tr>
				  <tr>
				   <td>'.ucfirst($user->name).'</td>
				   <td>&nbsp;</td>
				 </tr>
				  <tr>
				   <td>CAMASSISTANT NETWORK</td>
				   <td>&nbsp;</td>
				 </tr>
			   </table>';
			$successMail =JUtility::sendMail($from_email, $from_name, $pmemail, $sub, $body,1);
		}
		//
		//Code for sending RFP Emails to Vendors for the related Industry 
		$vendorsinfo=$model->getVendors($industry_id);
		if(count($vendorsinfo)>0)
		{
		  for($i=0;$i<count($vendorsinfo);$i++)
		  {
			$vendoremail=$vendorsinfo[$i][0]->email;
			$sub='RFP Invitation from CAMAssistant';
			if($vendoremail) 
			{
				$body_content='';
				$body='';
				$verificationLink = '<br><a href="'.JURI::root().'/index.php?option=com_camassistant&controller=vendors&vendor_id='.$vendorsinfo[$i][0]->id.'&task=vendorrfps>Click Here </a>To verify your RFPs List';
				$body_content='<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td><h3>This is our RFP Information for our company and we are expecting your response to make a buisiness conact </h3></td>
								  </tr>
								  <tr>
									<td>'.$verificationLink .'</td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
								  </tr>
								</table>';
				$body = '<table width="100%" border="0" cellspacing="0" cellpadding="0">
					 <tr>
					   <td width="20%"><span style="font-family: Helvetica,Arial,sans-serif;">Hi '.ucwords($vendorsinfo[$i][0]->name).'</span></td>
					   <td>&nbsp;</td>
					 </tr>
					  <tr>
					   <td width="20%">&nbsp;</td>
					   <td>&nbsp;</td>
					 </tr>
					 <tr>
					 <td colspan="2">'.$body_content.'</td>
					 </tr>
					  <tr>
					   <td>Regards</td>
					   <td>&nbsp;</td>
					 </tr>
					  <tr>
					   <td>'.ucfirst($user->name).'</td>
					   <td>&nbsp;</td>
					 </tr>
					  <tr>
					   <td>CAMASSISTANT NETWORK</td>
					   <td>&nbsp;</td>
					 </tr>
				   </table>';
				$successMail =JUtility::sendMail($from_email, $from_name, $vendoremail, $sub, $body,1);
			}
		  }
		}//End send mails to vendors
		$msg='RFP was created successfully';
		$this->setRedirect( 'index.php?option=com_camassistant&controller=rfp&task=saverfpmsg',$msg );
	}
	function saverfpmsg()
	{
		JRequest::setVar('view', 'rfp');
		parent::display();
	}
	//
	function checkImage($fname,$tempname , $folder = 'com_camassistant') {
		//echo "hi iam here";exit;
		/*Uploading Image*/
		ini_set('upload_max_filesize','20');
		  if($fname != '')
		  {
			  $pos = strrpos($fname,'.');
			  $fileExt = substr($fname,($pos+1),4);
			  $fileName = substr($fname,0,($pos));
			  $aryFileExt = array('jpeg','JPEG','JPG','jpg','GIF','gif','PNG','png','pdf','xls','docs','txt','php');
			  if(in_array($fileExt,$aryFileExt) )
			  {
				   $file = $fileName.time().".".$fileExt;
				   $file = str_replace(' ','_',$file);
				   copy($tempname, 'components/com_camassistant/assets/images/rfp/'.$file);
				   return $file;
			  }
			  else
			  {
				$msg="File format was not supported";
				$this->setRedirect( 'index.php?option=com_camassistant&controller=rfp&task=rfp',$msg );
			  }
		 }
	 }

	function addproperty()
	{
		JRequest::setVar('view', 'rfp');
		parent::display();
	}
	//
	function submit_property()
	{
		$post	= JRequest::get('post');
		$user=JFactory::getUser();  //For $my
		/*echo "123456<pre>";
		print_r($post); exit;*/
		global $mainframe;
		$model = $this->getModel('property');
		$post['id']='';
		$post['property_manager_id']=$user->id;
		if($user->id)
		{
			if ($model->store($post)) {
				echo "<font color='red'>Property Saved Successfully</font>";
				echo '<script language="javascript">window.parent.location.reload();</script>';
				exit;
			} else {
				echo "<font color='red'>Error Saving Property</font>";exit;
			}
		//$this->setRedirect( 'index.php?option=com_camassistant&controller=rfp&amp;task=addproperty&msg='.$msg );
		} else {
			echo "<font color='red'>Your session has been expired.Please login again</font>";
			echo '<script language="javascript">window.parent.location.reload();</script>';
			exit;
		}
	}
	//For pop up line tasks check list
	function pop_linetasks()
	{
	 	JRequest::setVar('view', 'rfp');
		parent::display();
	}
	/*function industries_Save()
	{
		//echo "5454554";exit;
		//session_destroy();
		session_start();
		$_SESSION['line_industries']='';
		$ind_ary = JRequest::getVar('cid','','post','array',REQUEST_ALLOWRAW);
		$ind = implode(',',$ind_ary); 
		$_SESSION['line_industries'] = $ind;
		echo "<script language='javascript' type='text/javascript'>
		window.parent.location.reload();
		self.close();
		 </script>"; 
		 $_SESSION['line_industries'] = $ind;
		//$link = 'index.php?option=com_camassistant&controller=vendors&task=vendor_info';	
		//$this->setRedirect( $link,$msg );
		exit;
	}*/
}
?>