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
echo "this is Shared default-2 file";
if(!$_SESSION['taskid'])
$_SESSION['taskid']= $_REQUEST['taskid'];
?>
<div id="dotshead_line">&nbsp;</div>
<!-- eof dotshead -->
<div id="i_bar">
<div id="i_bar_txt">
<span>ARROWHEAD   </span>
</div>
<div id="i_icon"></div>
</div>
<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="62" align="center" valign="top">SELECT</td>
    <td width="456" align="left" valign="top">Name</td>
    <td width="141" align="center" valign="top">options</td>
    </tr>
	
  <?php 
  if(count($this->sfiles)){
//  print_r($this->pfiles);
for ($i=0; $i<count($this->sfiles); $i++){
$sfiles = $this->sfiles[$i]; 
$file = substr($sfiles->sdocTitle,-4,-3);
if($file!='.') {
?>
  <tr class="table_blue_rowdots2">
<td align="center" valign="bottom"><img src="images/folder_icon.png"  alt="folder" /></td>
<td align="left" valign="middle"><?php 

print_r($sfiles->sdocTitle); ?>

</td>

<td align="center" valign="middle">
<a href="index.php?option=com_camassistant&controller=documents&Itemid=82?controller=documents&task=sopenfiles&parentid=<?php echo $sfiles->id;?>&spid=<?php print_r($sfiles->property_id); ?>&smid=<?php print_r($sfiles->property_manager_id); ?>&spath=<?php print_r($sfiles->docPath); ?>&taskid=<?php echo $_SESSION['taskid'];?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">OPEN</a>
</td>

<td>
<a href="index.php?option=com_camassistant&controller=documents&Itemid=82?controller=documents&task=delete&spid=<?php print_r($sfiles->property_id); ?>&smid=<?php print_r($sfiles->property_manager_id); ?>&spath=<?php print_r($sfiles->docPath); ?>&title=<?php print_r($sfiles->sdocTitle); ?>&taskid=<?php echo $_SESSION['taskid'];?>">DELETE</a>

</td>
</tr>
<?php } else { ?>
<tr class="table_blue_rowdots2">
<td align="center" valign="bottom"><img src="images/file.png" />
</td>
<td align="left" valign="middle"><?php print_r($sfiles->sdocTitle); ?>
</td>
<td align="center" valign="middle"><a href="<?php print_r($sfiles->docPath);?>">OPEN</a></td>
<td>
<a href="index.php?option=com_camassistant&controller=documents&Itemid=82?controller=documents&task=delete&spid=<?php print_r($sfiles->property_id); ?>&smid=<?php print_r($sfiles->property_manager_id); ?>&spath=<?php print_r($sfiles->docPath); ?>&title=<?php print_r($sfiles->sdocTitle); ?>&taskid=<?php echo $_SESSION['taskid'];?>">DELETE</a>

</td>
</tr>
<?php } 

} }
 else { ?>
<tr>
<td>&nbsp;</td>
<td width="20"></td>
<td width="500"><?php echo "No files in this folder"; ?></td>

<td>

</td>
</tr>
<?php } ?>
 <tr class="table_blue_rowdots2">
   <td align="center" valign="bottom">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>
</table>
<?php $val = 'components/com_camassistant/doc/'; 
if($sfiles->property_id ==''){
$sfiles->property_id = $_REQUEST['spid'];
} 
if($sfiles->property_manager_id ==''){
$sfiles->property_manager_id = $_REQUEST['smid'];
} 

?>
<div class="table_bottomlinks2">
<ul>
<li  style=" background:none;"><img src="images/new_folder.png" alt="add a new folder" width="45" height="39" align="absmiddle" /><a class="modal" id="links1"  title="Add Folder"  href="index.php?option=com_camassistant&controller=documents&task=saddfolder&parentid=0&spid=<?php print_r($sfiles->property_id); ?>&smid=<?php print_r($sfiles->property_manager_id); ?>&spath=<?php print_r($val); ?>&taskid=<?php echo $_SESSION['taskid'];?>" rel="{handler: 'iframe', size: {x: 400, y: 200}}" >Add a folder</a></li>

<li><img src="images/upload_folder.png" alt="Upload a file to this folder" width="37" height="36" align="middle" /><a class="modal" id="links1"  title="Upload File"  href="index.php?option=com_camassistant&controller=documents&task=saddfile&parentid=0&spid=<?php print_r($sfiles->property_id); ?>&smid=<?php print_r($sfiles->property_manager_id); ?>&spath=<?php print_r($val); ?>&taskid=<?php echo $_SESSION['taskid'];?>" rel="{handler: 'iframe', size: {x: 400, y: 200}}" >Upload a file</a></li> 
</ul>
</div>
</div></div>




<div class="clear"></div>
<?php exit; ?>