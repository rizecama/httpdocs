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

class popupdocsController extends JController
{

	function __construct()
	{
		parent::__construct();
	}
	function display()
	{
	parent::display();

	}
	function pdocs(){

	$model = $this->getModel('popupdocs');
	$result = $model->getpdocs();
	parent::display();
}

	function sdocs(){
//echo "<pre>"; print_r($_REQUEST); exit;
	$model = $this->getModel('popupdocs');
	$sdocs = $model->get('Data');
	parent::display();

	}
	
	function pfiles(){
	$model = $this->getModel('popupdocs');
	$pfiles = $model->getpfiles();
	parent::display();
	}
	
	function addfolder(){
	JRequest::getVar( 'view','popupdocs');
	$model = $this->getModel('popupdocs');
	$categoriess = $model->getcategories();
	parent::display();
	}
	function savefolder(){
	//print_r($_REQUEST); exit;
	$post = JRequest::get('post');
	$cat_id = JRequest::getVar( 'cat_id','' );
	$docTitle = JRequest::getVar( 'docTitle','' );	

	$docTitle = preg_replace("/[&'`:;={}!@#$%^*(?)-+|]/"," ",$docTitle);	
	$docTitle = ereg_replace('/',' ',$docTitle);
	$docTitle = str_replace('.',' ',$docTitle);	
	$docTitle = str_replace(',',' ',$docTitle);	
	$docTitle = str_replace('[',' ',$docTitle);	
	$docTitle = str_replace(']',' ',$docTitle);	
	$docTitle = ereg_replace('-',' ',$docTitle);	
	$docTitle = ereg_replace('"',' ',$docTitle);	
	$docTitle = str_replace('\\',' ',$docTitle);		
	
	$docTitle = ereg_replace(' ','_',$docTitle);
	
	if($_REQUEST['path']=='components/com_camassistant/doc/'){

	$path1 = "components/com_camassistant/doc/".$docFoldername;
	$path = "components/com_camassistant/doc/".$docFoldername.$docTitle;
	}
	else {
	$path1 = $_REQUEST['path'];
	$path = $_REQUEST['path']."/".$docTitle;
	}
	if(!is_dir($path1))
	mkdir($path1,0777);
	if(is_dir($path))
	{
	$post['docPath'] = $path1;
	echo "Exists";
	}
	else {
	mkdir($path,0777);
	$post['docPath'] = $path;
	$post['property_manager_id'] = $_REQUEST['mid'];
	$post['property_id'] = $_REQUEST['pid'];
	$post['parent'] = $_REQUEST['parentid'];
	$post['docTitle'] = $docTitle;

	$post['docTitle'] = preg_replace("/[&:;=`{}'!@#$%^*(?)-+|]/","_",$post['docTitle']);
	$post['docTitle'] = ereg_replace('/',' ',$post['docTitle']);
	$post['docTitle'] = ereg_replace('"',' ',$post['docTitle']);
	$post['docTitle'] = ereg_replace('-',' ',$post['docTitle']);
	$post['docTitle'] = str_replace('.',' ',$post['docTitle']);
	$post['docTitle'] = str_replace(',',' ',$post['docTitle']);
	$post['docTitle'] = str_replace('[',' ',$post['docTitle']);
	$post['docTitle'] = str_replace(']',' ',$post['docTitle']);
	$post['docTitle'] = ereg_replace(' ','_',$post['docTitle']);
	
	$model = $this->getModel('popupdocs');
	$success = $model->store($post);
	$db =& JFactory::getDBO();
	$query = "SELECT property_name FROM #__cam_property where id =".$cat_id;
	$db->setQuery($query);
    $catname=$db->loadResult();
	$post['cat_name'] = $catname; 
	
	$success = $model->store1($post);
	?>
	<script type="text/javascript">	
				window.parent.location.reload();
				//window.parent.document.getElementById( 'sbox-window' ).close(); 
				</script>

<?php


}
exit;
	}
	
	function openfiles(){
	
	JRequest::getVar('view','popupdocs');
	parent::display();

	}
	function addfile(){
	JRequest::getVar( 'view','popupdocs');
 	parent::display();
	}
	
	function savefile(){
	
	$post = JRequest::get('post');
	$dest = JRequest::getVar( 'path','');
	$fileexists = JRequest::getVar( 'fileexists','');
	jimport('joomla.filesystem.file');
////For checking file extension/////////////
	$model = $this->getModel('popupdocs');
	if(!is_dir($dest))
	mkdir($dest,0777);
	
	$check = $model->getcheck();
	if ($check=='1'){
////For checking file extension/////////////	
	$_FILES['file']['name'] = ereg_replace(' ','_',$_FILES['file']['name']);
	$_FILES['file']['name'] = str_replace("&", "_", $_FILES['file']['name']); 
	$_FILES['file']['name'] = str_replace("#", "_", $_FILES['file']['name']); 
	$_FILES['file']['name'] = str_replace("%", "_", $_FILES['file']['name']); 


	$ext = end(explode('.', $_FILES['file']['name']));

	$ext1 = strtolower($ext);
	$_FILES['file']['name'] = str_replace($ext,$ext1,$_FILES['file']['name']);

	$dest = $dest."/";

	$dest = str_replace('//','/',$dest);
	$dest = str_replace('///','/',$dest);
	
	$copied = copy($_FILES["file"]["tmp_name"],$dest.$_FILES['file']['name']);
	if($copied){
 	$post['property_manager_id'] = $_REQUEST['mid'];
 	$post['property_id'] = $_REQUEST['pid'];
	$post['docPath'] = $_REQUEST['path']."/".$_FILES['file']['name'];
 	$post['docTitle'] = $_FILES['file']['name'];
	$post['parent'] = $_REQUEST['parentid'];	
	$model = $this->getModel('popupdocs');
	 /*?>modified by anand kumar 25-7-11<?php */
	$pid= JRequest::getVar( 'pid','');
	$mid= JRequest::getVar( 'mid','');
	if($fileexists == ''){
	$res = $model->store3($post);
	}
	} else {
	//echo "anand";
	$msg= "Sorry!  The file type you attempted to upload is not allowed.  Please try again and note the allowed file types and extensions.<br>
If you continue to have problems or need help, please contact the CAMassistant Customer Support Team at 561-246-3830.";

	$url= 'index2.php?option=com_camassistant&controller=popupdocs&task=addfile&parentid=0&pid='.$pid.'&mid='.$mid.'&path='.$dest;
	$this->setRedirect( $url ,$msg);
	}
   /*?>modified by anand kumar 25-7-11<?php */

?>
	<script type="text/javascript">	
				window.parent.location.reload();
				//window.parent.document.getElementById( 'sbox-window' ).close(); 
				</script>

<?php


	} else{
	}

}
////////////////////////////////////////Shared docs////////////////////////////////////
	function sfiles(){
	$model = $this->getModel('popupdocs');
	$sfiles = $model->getsfiles();
	parent::display();
	}


	function saddfolder(){

	JRequest::getVar( 'view','popupdocs');
	$model = $this->getModel('popupdocs');
	$scategoriess = $model->getscategories();
	
 	parent::display();
	}
	
	
	function ssavefolder(){
	$post = JRequest::get('post');
	$cat_id = JRequest::getVar( 'cat_id','' );
	$sdocTitle = JRequest::getVar( 'sdocTitle','' );	
//	print_r($_REQUEST['spath']);  echo "<br><br>"; 
	if($_REQUEST['spath']=='components/com_camassistant/doc/'){
	echo "In if"; 
	$path1 = "components/com_camassistant/doc/".$docFoldername;	
	$path = "components/com_camassistant/doc/".$docFoldername.$sdocTitle;
	}
	else {
	$path1 = $_REQUEST['spath'];	
	$path = $_REQUEST['spath']."/".$sdocTitle;
	}
//print_r($path1);echo "<br>";print_r($path); exit;
	if(!is_dir($path1))
	mkdir($path1,0777);
	if(is_dir($path))
	{
	$post['docPath'] = $path1;
	echo "Exists";
	}
	else {
	mkdir($path,0777);
	$post['docPath'] = $path;
	$post['property_manager_id'] = $_REQUEST['smid'];
	$post['property_id'] = $_REQUEST['spid'];
	
	$model = $this->getModel('popupdocs');
	$success = $model->sstore($post);
	$db =& JFactory::getDBO();
	$query = "SELECT property_name FROM #__cam_property where id =".$cat_id;
	$db->setQuery($query);
    $catname=$db->loadResult();
	$post['cat_name'] = $catname; 
	$success = $model->store1($post);
	?>
	<script type="text/javascript">	
				window.parent.location.reload();
				//window.parent.document.getElementById( 'sbox-window' ).close(); 
				</script>
				<?php
	//if($success){
	//echo "New Folder added Successfully";
	//}
	//else{
	//echo "Please add one more time";
	//}
exit;
}
}
	function saddfile(){
	//echo "iam ehre<pre>";
	//print_r($_REQUEST);exit;
	JRequest::getVar( 'view','popupdocs');
 	parent::display();
	}

	
	function ssavefile(){
	$post = JRequest::get('post');
	$dest = JRequest::getVar( 'spath','');
	jimport('joomla.filesystem.file');
	$model = $this->getModel('documents');
	$check = $model->getcheck();
// For checking extension...///	
	$dest = $dest."/";
	$copied = copy($_FILES["file"]["tmp_name"],$dest.$_FILES['file']['name']);
	if($copied){
 	$post['property_manager_id'] = $_REQUEST['smid'];
 	$post['property_id'] = $_REQUEST['spid'];
	$post['docPath'] = $_REQUEST['spath']."/".$_FILES['file']['name'];
 	$post['sdocTitle'] = $_FILES['file']['name'];	
	$post['parent'] = $_REQUEST['parentid'];	
	$model = $this->getModel('documents');
	$res = $model->store3($post);
	?>
	<script type="text/javascript">	
				window.parent.location.reload();
				//window.parent.document.getElementById( 'sbox-window' ).close(); 
				</script>

<?php
	} else{
	}

}

	function sopenfiles(){
	
	JRequest::getVar('view','popupdocs');
	parent::display();
	}

	function delete(){
	$model = $this->getModel('popupdocs');
	$res = $model->getdelete($post);
	parent::display();
	}
	
		function deletefile(){
	$model = $this->getModel('popupdocs');
	$result = $model->getdeletefile($post);
	parent::display();
	}

	
	function open(){
	//echo '<pre>'; print_r($_REQUEST); exit;
	$model = $this->getModel('popupdocs');
	$open = $model->getopen($post);
	parent::display();
	
	}

////////////////////////////////////////Shared docs Completed////////////////////////////////////
//function to check the file exiting
function checkfile(){

	$_REQUEST['uploadfile'] = ereg_replace(' ','_', $_REQUEST['uploadfile']);
	$_REQUEST['uploadfile'] = str_replace("&", "_", $_REQUEST['uploadfile']); 
	$_REQUEST['uploadfile'] = str_replace("#", "_", $_REQUEST['uploadfile']); 
	$_REQUEST['uploadfile'] = str_replace("%", "_", $_REQUEST['uploadfile']); 

$totalfilepath =  $_REQUEST['mainpath'].str_replace(' ','_',$_REQUEST['uploadfile']);


if (file_exists($totalfilepath)) {

    echo "exists";
} else {
    echo "notexists";
}
exit;
}
//Completed

}
?>
