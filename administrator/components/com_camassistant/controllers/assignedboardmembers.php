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

class assignedboardmembersController extends JController
{

	function __construct()
	{
		parent::__construct();
	}
	function display()
	{

	parent::display();

	}
	function addmember(){
	$model = $this->getModel('assignedboardmembers');
	$pfiles = $model->getaddmember();
	parent::display();
	}
	function savemember(){		

	$post = JRequest::get('post');
	$post['manager_id'] = $_REQUEST['managerid'];
	$post['property_id'] = $_REQUEST['property_id'];
	$model = $this->getModel('assignedboardmembers');	
	$properties = $model->getproperties();

	$success = $model->store($post);
if($success)
{
$msg = 'Member assigned Successfully';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}

else {
$msg = 'Not assigned successfully';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}
	}						

function remove(){
	$model = $this->getModel('assignedboardmembers');	
	$pfiles = $model->getremove();
/*	if($pfiles)
{
$msg = 'Member removed Successfully';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}
else {
$msg = 'Not removed successfully';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}	
*/}


function editmembers(){
//echo "In controle"; exit;
	$model = $this->getModel('assignedboardmembers');	
	$editmembers = $model->geteditmembers();
	$editmembers1 = $model->geteditmembers1();
	parent::display();
}
function editmember(){

$db=JFactory::getDBO();
$sql="UPDATE #__cam_assignedboardmembers SET property_id='".$_POST['property_id']."',member_id='".$_POST['member_id']."' where property_id='".$_REQUEST['propertyid']."' and member_id='".$_REQUEST['memberid']."' ";
$db->setQuery($sql);
$res=$db->query(); 
if($res)
{
$msg = 'Updated Successfully';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}
else {
$msg = 'Not updated';
$url = 'index.php?option=com_camassistant&controller=assignedboardmembers&Itemid=79';
$this->setRedirect( $url, $msg );
}
}

}
?>