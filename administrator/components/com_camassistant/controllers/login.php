<?php
/**
 * @version		1.0.0 promocode $
 * @package		promocode
 * @copyright	Copyright © 2011 - All rights reserved.
 * @license		GNU/GPL
 * @author		anandbabu
 * @author mail	anandbabu@projectsinfo.net
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class loginController extends JController
{

function add()
	{
	//print_r($_REQUEST); exit;
	   JRequest::setVar('view', 'questions');
      parent::display();
	
		
	}
 function edit()
	{

	   JRequest::setVar('view', 'questions');
		parent::display();
		
	}
	
function save(){
//print_r($_POST); exit;
global $mainframe;

$cid	= JRequest::getVar( 'cid','','post');
$question	= JRequest::getVar( 'question','','post');
$published	= JRequest::getVar( 'published','','post');
//print_r($_REQUEST); exit;

$post = JRequest::get('post');
$model = $this->getModel('questions');
//$success = $model->store($post);
if($cid){
 $db = & JFactory::getDBO();
		 $query = "UPDATE #__questions SET question='$$question',published='$published' where id=".$cid;
		$db->setQuery($query);
	    $res=$db->query(); 
	if($res)
	{
	$msg = 'Question Updated Successfully';
	$url = 'index.php?option=com_camassistant&controller=questions';
	$this->setRedirect( $url, $msg );
	}
	

} else {
if($model->store($post)) {
		//echo "<pre>"; print_r($model->store($details)); exit;
		$link='index.php?option=com_camassistant&controller=questions';
		$this->setRedirect( $link, JText::_( 'Question Saved Successfully' ) );
		}
	}
parent::display();
}
	// Your custom code here
function addquestion(){

	JRequest::getVar('view','questions');
	parent::display();
	}
	
function remove()
{
global $mainframe;
$cid	= JRequest::getVar( 'cid','','post');
$cid=implode(',',$cid);
//$rfpid=implode(',',$rfpid);
$model = $this->getModel('questions');
$model->deletequestion($cid);
$err_msg="question Deleted Successfully";
$mainframe->Redirect('index.php?option=com_camassistant&controller=questions',$err_msg);
}


function cancel(){
//exit;
global $mainframe;
$mainframe->Redirect('index.php?option=com_camassistant&controller=questions ');
}
function unpublish()
	{
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= 0;

		
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__questions'
		. ' SET published = ' . (int) $publish
		. ' WHERE id IN ( '. $cids.'  )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning(500, $db->getError());
		}
				$this->setRedirect( 'index.php?option=com_camassistant&controller=questions','Question Unpublished Successfully');

	}
	
	function publish()
	{
		// Check for request forgeries


		// Initialize variables
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= ($task == 'publish');
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__questions'
		. ' SET published = ' . (int) $publish
		. ' WHERE id IN ( '. $cids.'  )'
	
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning( 500, $db->getError() );
		}
		$this->setRedirect( 'index.php?option=com_camassistant&controller=questions','Question Published Successfully');

	}
	
}
?>