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

// Your custom code here
JHTML::_('behavior.modal');
$taxid = JRequest::getVar( 'taxid','' );
//echo "this is default-4 file"; 
//echo "<pre>"; print_r($_REQUEST);
if(!$_SESSION['taskid'])
$_SESSION['taskid']= $_REQUEST['taskid'];
$db = JFactory::getDBO();
$pid=$_REQUEST['pid'];		
$db->setQuery('Select property_name,tax_id FROM #__cam_property where id="'.$pid.'"');
$db->query();
$propert_name = $db->loadObjectList();

?> 


<script>
function addfile(data,taskid,filename){
window.parent.document.getElementById('lineuploads'+taskid).value =data;
window.parent.document.getElementById('delimg'+taskid).style.display ='';
window.parent.document.getElementById('uploadfile'+taskid).innerHTML =filename;
/* if(taskid>20){
window.parent.document.getElementById('requiredoprice'+taskid).style.display ='block';
} */
window.parent.document.getElementById( 'sbox-window' ).close(); 
}
</script><link rel="stylesheet" href="<?php echo JURI::root(); ?>templates/camassistant_inner/css/style.css" type="text/css" />

<!-- eof dotshead -->
<?php 
$fpath='components/com_camassistant/doc';
$fpath_back='components/com_camassistant/doc';
$fileplace = explode("-->", $_REQUEST['fileplace']);
$cnt=count($fileplace);
$user = JFactory::getUser(); 
//Functio to  by sateesh on 03-08-11--> 
if ($user->user_type=='13' || $user->user_type=='12' ) {
if($cnt==1)
	$backlink='index2.php?option=com_camassistant&controller=popupdocs&task=pdocs&Itemid=76';
else if($cnt==2)
	$backlink='index2.php?option=com_camassistant&controller=popupdocs&task=pfiles&Itemid='.$_REQUEST['Itemid'].'&taskid='.$_SESSION['taskid'].'&pid='.$_REQUEST['pid'].'&mid='. $_REQUEST['mid'].'&propertyname='.$fileplace[0].'&taxid='.$taxid;
else {
	for($i=0;$i<count($fileplace)-2;$i++) {
		$pro_name = str_replace(' ','_',$fileplace[0]);
		$pro_name = $pro_name.'_'.$taxid;
	
		$fpath_back.='/'.$fileplace[$i+1];
		$fplace_back = explode("-->", $_REQUEST['fileplace']);
		for($j=0;$j<=$i+1;$j++)
		$fplace1_back[$j]=$fplace_back[$j];
		$fplace2_back=implode('-->',$fplace1_back);
	}
	$k=count($fileplace)-2;
	$fpath_back = str_replace('doc','doc/'.$pro_name,$fpath_back);
	$backlink='index2.php?option=com_camassistant&controller=popupdocs&task=openfiles&Itemid='.$_REQUEST['Itemid'].'&taskid='.$_SESSION['taskid'].'&pid='.$_REQUEST['pid'].'&mid='. $_REQUEST['mid'].'&path='.$fpath_back.'&folder_name='.$fileplace[$k].'&fileplace='.$fplace2_back.'&taxid='.$taxid;
}
} 
?>
<div align="right" style="padding-top:10px; padding-right:10px;"><a href="<?php echo $backlink.'&tmpl=component';?>"><img alt="info" src="images/back_admin.png"/></a></div>
<div id="i_bar">
<div id="i_bar_txt" style="padding:0px;line-height:33px;">
<div style="float:left; padding-top:0px; height:10px; color:#ffffff; padding-left:20px;" id="pbedcrumb">
<?php $m=count($fileplace)-1;

for($i=0;$i<count($fileplace);$i++) { 
if($i<$m) { ?>
<?php if($i==0) { ?>
<?php echo "<strong>".ucwords($fileplace[$i])."</strong>/";?>
<?php } else { 
$fpath.='/'.$fileplace[$i];
$fplace = explode("-->", $_REQUEST['fileplace']);
for($j=0;$j<=$i;$j++)
$fplace1[$j]=$fplace[$j];
$fplace2=implode('-->',$fplace1);
//$fplace2=htmlentities($fplace2);
?>
<?php echo "<strong>".ucwords(str_replace('_',' ',$fileplace[$i]))."</strong>/";?>
<?php } ?>

<?php  
} else { 
echo "<strong>".ucwords(str_replace('_',' ',$fileplace[$i]))."</strong>/";
}
}
//echo $v;
	$docTitle = ereg_replace('--','',$_REQUEST['fileplace']);
//echo $docTitle; ?>

</div>
<div id="i_icon"></div>
</div></div>
<?php //echo "<pre>"; print_r($_SESSION); ?>
<!-- sof table pan -->
<div class="table_pannel" style="margin-top:10px;">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="98" align="center" valign="top">SELECT</td>
    <td width="644" align="left" valign="top">Name</td>
    <td width="631" align="center" valign="top">options</td>
    </tr>
  <?php for ($i=0; $i<count($this->openfiles['folders']); $i++){ ?>

<tr class="table_blue_rowdots2">
    <td align="center" valign="bottom"><a href="index2.php?option=com_camassistant&controller=popupdocs&taskid=<?php print_r($_SESSION['taskid']); ?>&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&tmpl=component"><img src="images/folder_icon.png"  alt="folder" /></a></td>
    
<td align="left" valign="middle"><a href="index2.php?option=com_camassistant&controller=popupdocs&taskid=<?php print_r($_SESSION['taskid']); ?>&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&tmpl=component"><?php echo str_replace('_',' ',$this->openfiles['folders'][$i]); ?></a>
</td>

<td align="center" valign="middle"><a href="index2.php?option=com_camassistant&controller=popupdocs&taskid=<?php print_r($_SESSION['taskid']); ?>&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&tmpl=component">OPEN</a>

<?PHP $db =& JFactory::getDBO(); $user =& JFactory::getUser(); if($user->user_type == '11'){ ?> <img src="images/links_devider.gif" alt="liks devider" hspace="8" />  
<script type="text/javascript">
function folderdelete(){
var result = confirm('Are you sure you want to delete this folder <?php print_r($this->openfiles['folders'][$i]); ?> and the internal files?');

	if(result == true)
	{
		var frm = document.docform;
		frm.option.value='com_camassistant';
		frm.controller.value='documents';
		frm.task.value='vendor_delete';
		//frm.view.value='documents';
		frm.spid.value=<?php echo $_REQUEST['pid']; ?>;
		frm.smid.value=<?php echo $_REQUEST['mid']; ?>;
		frm.spath.value='<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>';
		frm.doc_title.value='<?php print_r($this->openfiles['folders'][$i]); ?>';
		frm.submit();
	}
	if(result == false) 
	{
		//alert('No action taken');
		window.location.href;
		//window.location = "http://www.google.com/"
		//return false;
	}
}
</script>
<!--<a href="index.php?option=com_camassistant&controller=documents&Itemid=<?PHP //echo $Itemid; ?>&controller=documents&task=vendor_delete&spid=<?php //echo $_REQUEST['pid']; ?>&smid=<?php //echo $_REQUEST['mid']; ?>&spath=<?php //echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&title=<?php //print_r($this->openfiles['folders'][$i]); ?>">DELETE</a> 
-->
<a href="javascript:folderdelete();">DELETE</a>
<?PHP } ?>
</td>
</tr>
<?php } ?>
<?php

for ($i=0; $i<count($this->openfiles['files']); $i++){
$img_icon = substr(strrchr($this->openfiles['files'][$i], "."), 1);
?>

<tr class="table_blue_rowdots2">
<td align="center" valign="bottom"><a href="index2.php?option=com_camassistant&controller=popupdocs&task=open&taskid=<?php echo $_SESSION['taskid']; ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>&title=<?php print_r($this->openfiles['files'][$i]); ?>&path=<?php echo $_REQUEST['path']; ?>&folder_name=<?php print_r($this->openfiles['files'][$i]); ?>&tmpl=component"><img src="images/images_<?PHP echo $img_icon; ?>.png" /></a></td>
<td align="left" valign="middle"><a href="index2.php?option=com_camassistant&controller=popupdocs&taskid=<?php print_r($_SESSION['taskid']); ?>&task=open&Itemid=<?php echo $_REQUEST['Itemid']; ?>&title=<?php print_r($this->openfiles['files'][$i]); ?>&path=<?php echo $_REQUEST['path']; ?>&folder_name=<?php print_r($this->openfiles['files'][$i]); ?>&tmpl=component"><?php print_r($this->openfiles['files'][$i]); ?></a>
</td>

<td align="center" valign="middle">
<a href="index2.php?option=com_camassistant&controller=popupdocs&task=open&taskid=<?php print_r($_SESSION['taskid']); ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>&title=<?php print_r($this->openfiles['files'][$i]); ?>&path=<?php echo $_REQUEST['path']; ?>&folder_name=<?php print_r($this->openfiles['files'][$i]); ?>&tmpl=component">OPEN</a><input type="hidden" name="taskid" value="<?php echo $_SESSION['taskid']; ?>"  />
<?php $docpath=$_REQUEST['path'].'/'.$this->openfiles['files'][$i]; ?>
<?php //echo "<pre>"; print_r( $docpath); //print_r($_REQUEST['path'].'/'.$this->openfiles['files'][$i]); ?>
<?php
$default = 'components/com_camassistant/doc/'.$propert_name[0]->property_name.'_'.$propert_name[0]->tax_id.'/'; echo "<br><br>";
$path = str_replace($default,'',$docpath);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="addfile('<?php echo $path; ?>','<?php print_r($_SESSION['taskid']); ?>','<?php print_r($this->openfiles['files'][$i]); ?>');">ADD TO RFP</a>
<?PHP $db =& JFactory::getDBO(); $user =& JFactory::getUser(); if($user->user_type == '11'){ ?> <img src="images/links_devider.gif" alt="liks devider" hspace="8" />  
<script type="text/javascript">
function filedelete(){
var result = confirm('Are you sure you want to delete this file <?php echo $this->openfiles['files'][$i]; ?> ?');
	if(result == true)
	{
		var from = document.docform;
		from.option.value='com_camassistant';
		from.controller.value='documents';
		from.task.value='vendor_deletefile';
		from.spid.value=<?php echo $_REQUEST['pid']; ?>;
		from.smid.value=<?php echo $_REQUEST['mid']; ?>;
		from.spath.value='<?php echo $_REQUEST['path']; ?>';
		from.doc_title.value='<?php echo $this->openfiles['files'][$i]; ?>';
		from.second.value='second';
		from.submit();
	}
	else 
	{
		//alert('No action taken');
		return false;
	}
}
</script>
<a  href="#" onclick="javascript:filedelete();">DELETE</a>
<!--<a href="index.php?option=com_camassistant&controller=documents&Itemid=<?PHP //echo $Itemid; ?>&controller=documents&task=vendor_deletefile&spid=<?php //echo $_REQUEST['pid']; ?>&smid=<?php //echo $_REQUEST['mid']; ?>&spath=<?php //echo $_REQUEST['path']."/".$this->openfiles['files'][$i]; ?>">DELETE</a> 
-->
<?PHP } ?></td>

</tr>
<?php } ?>
 <tr class="table_blue_rowdots2">
   <td align="center" valign="bottom">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>
</table>

<div class="table_bottomlinks2">
<ul>
<li  style=" background:none;"><a class="modal" id="links1"  title="Add Folder"  href="index2.php?option=com_camassistant&controller=popupdocs&task=addfolder&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>&tmpl=component" rel="{handler: 'iframe', size: {x: 500, y: 250}}" ><img src="images/new_folder.png" alt="add a new folder" width="45" height="39" align="absmiddle" /> </a><a class="modal" id="links1"  title="Add Folder"  href="index.php?option=com_camassistant&controller=popupdocs&task=addfolder&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>&tmpl=component" rel="{handler: 'iframe', size: {x: 500, y: 250}}" >+Add a new Folder  </a></li>

<li><a class="modal" id="links1"  title="Add Folder"  href="index2.php?option=com_camassistant&controller=popupdocs&task=addfile&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>&tmpl=component" rel="{handler: 'iframe', size: {x: 500, y: 250}}" > +Upload a file to this folder <img src="images/upload_folder.png" alt="Upload a file to this folder" width="37" height="36" align="middle" /></a></li> 
</ul>
</div>
</div></div>
<div class="clear"></div>
