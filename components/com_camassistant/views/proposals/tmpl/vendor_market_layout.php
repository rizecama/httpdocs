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
$Itemid = JRequest::getVar('Itemid','');
// Your custom code here
JHTML::_('behavior.modal');
$warranty = JRequest::getVar('warranty','');
$taskid = JRequest::getVar('taskid','');
$user = JFactory::getUser();
error_reporting(0);
?>
<link rel="stylesheet" href="<? echo juri::base(); ?>templates/camassistant_inner/css/style.css" type="text/css" />
<link rel="stylesheet" href="<? echo juri::base(); ?>templates/camassistant_left/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo JURI::root(); ?>/media/system/css/modal.css" type="text/css" />
<script type="text/javascript" src="<?php echo JURI::root(); ?>/media/system/js/mootools.js"></script>
  <script type="text/javascript" src="<?php echo JURI::root(); ?>/media/system/js/modal.js"></script>
    <script type="text/javascript" >
window.addEvent('domready', function() {
			SqueezeBox.initialize({});
			$$('a.modal').each(function(el) {
				el.addEvent('click', function(e) {
					new Event(e).stop();
					SqueezeBox.fromElement(el);
				});
			});
		});
</script>
<script>
function addfile_warranty(path,filename){
window.parent.document.getElementById('warranty_path').value = path;
window.parent.document.getElementById('warranty_hid_text').value =filename;
window.parent.document.getElementById('warranty_file_text').innerHTML =filename;
var del_path = "&nbsp;<img onclick = \'javascript: warranty_doc_remove(); \' src=\'templates/camassistant_left/images/red.png\' alt=\'Remove file\' style=\'cursor:pointer;\' />";	
window.parent.document.getElementById('warranty_file_rem').innerHTML =del_path;
window.parent.document.getElementById('sbox-window').close(); 
}

function add_generalfile(taskid,path,filename){
window.parent.document.getElementById('fpath_general'+taskid).value = path;
window.parent.document.getElementById('upload_file_general'+taskid).innerHTML =filename;
window.parent.document.getElementById('delimg_general'+taskid).style.display ='';
window.parent.document.getElementById('sbox-window').close(); 

}
</script>
<script>
function addfile(taskid,path,filename){
//alert(path);
window.parent.document.getElementById('fpath'+taskid).value = path;
//window.parent.document.getElementById('hid_text'+taskid).value =filename;
//window.parent.document.getElementById('file_text'+taskid).innerHTML =filename;
window.parent.document.getElementById('upload_file'+taskid).innerHTML =filename;
window.parent.document.getElementById('delimg'+taskid).style.display ='';
//var del_path = "&nbsp;<img onclick = \'javascript: doc_remove("+taskid+"); \' src=\'templates/camassistant_left/images/remove.gif\' alt=\'Remove file\' />";	
//window.parent.document.getElementById('file_rem'+taskid).innerHTML =del_path;
window.parent.document.getElementById('sbox-window').close(); 
}
function addsfile(taskid,path,filename){
//alert(taskid);
window.parent.document.getElementById('spath'+taskid).value = path;
window.parent.document.getElementById('supload_file'+taskid).innerHTML =filename;
window.parent.document.getElementById('delimg'+taskid).style.display ='';
//var del_path = "&nbsp;<img onclick = \'javascript: sdoc_remove(); \' src=\'templates/camassistant_left/images/remove.gif\' alt=\'Remove file\' />";	
//window.parent.document.getElementById('sfile_rem').innerHTML =del_path;
window.parent.document.getElementById('sbox-window').close(); 
}
</script>

<!-- sof bedcrumb -->
 
<div style="float: right;"><a href="javascript:history.go(-1)"><img alt="info" src="templates/camassistant_left/images/back.png"></a></div>
<?php /*?><div style="float: right;"><a href="index2.php?option=com_camassistant&controller=proposals&task=warranty_popup"><img alt="info" src="templates/camassistant_left/images/back.png"></a></div><?php */?>
<!-- eof bedcrumb -->
<!-- sof dotshead -->
<div class="green-heading" id="dotshead_green">&nbsp;</div>
<div id="new_bar">
<div style="padding: 0px; padding-top:4px; line-height: 27px;" id="new_bar_txt">
<span style="color: rgb(255, 255, 255); text-transform: uppercase; font-family: Arial; font-weight: bold;"><strong>MY MARKETING DOCUMENTS</strong></span>

</div>

<div id="new_icon"></div>
</div>
<?php /*?><div id="i_bar">
<div id="i_bar_txt">
<span>MY COMPANY DOCUMENTS </span></div>
</div>
 <div class="clear"></div><?php */?>
<!-- sof table pan -->
<div class="table_pannel">
<div class="table_panneldiv">
<form name="docform" action="index.php">
<input type="hidden" name="option" value="" />
<input type="hidden" name="controller" value="" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="spid" value="" />
<input type="hidden" name="smid" value="" />
<input type="hidden" name="spath" value="" />
<input type="hidden" name="doc_title" value="" />

<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_blue_row">
    <td width="62" align="center" valign="middle">SELECT</td>
    <td width="456" align="left" valign="middle">Name</td>
    <td width="141" align="center" valign="middle">options</td>
    </tr>
  
  <?php 

if(count($this->vendor_files)>0) {
for ($i=0; $i<count($this->vendor_files); $i++){
$vendor_files = $this->vendor_files[$i]; 
$ext = end(explode('.', $vendor_files->filename));
$img_icon = substr(strrchr($vendor_files->filename, "."), 1);
$ext = end(explode('.', $vendor_files->filename));
?>


<tr class="table_blue_rowdots2">
    <td align="center" valign="bottom"><img src="templates/camassistant_inner/images/images_<?PHP echo $ext; ?>.png"  alt="folder" /></td>
    <td align="left" valign="middle"><?php echo str_replace('_',' ',$vendor_files->filename); ?>
</td>
<!--<td><a href="<?php  //print_r($vendor_files->docPath);?>">OPEN</a></td>-->
<td>
	<?php if($warranty=='file'){ 
//$taskid = JRequest::getVar('taskid',''); ?>
<?php //echo '<pre>'; print_r($_REQUEST); ?>
<a href="#" style="cursor:pointer" onclick="addfile('<?php echo $taskid; ?>','<?php echo "components/com_camassistant/assets/images/market/".$user->id.'/'.$vendor_files->filename; ?>','<?php print_r($vendor_files->filename); ?>');">Add To Proposal</a>
<?php } else if ($warranty=='sfile'){ ?>
	<a href="#" style="cursor:pointer" onclick="addsfile('<?php echo $taskid; ?>','<?php echo "components/com_camassistant/assets/images/market/".$user->id.'/'.$vendor_files->filename; ?>','<?php print_r($vendor_files->filename); ?>');">Add To Proposal</a>
<?php } 
else if( $warranty=='general_popup' ){ ?>
<a href="javascript:void(0);" style="cursor:pointer" onclick="add_generalfile('<?php echo $taskid; ?>','<?php echo "components/com_camassistant/assets/images/market/".$user->id.'/'.$vendor_files->filename; ?>','<?php print_r($vendor_files->filename); ?>');">Add To Proposal</a>
<?php }
else { ?>
	<a href="#" style="cursor:pointer" onclick="addfile_warranty('<?php echo "components/com_camassistant/assets/images/market/".$user->id.'/'.$vendor_files->filename; ?>','<?php print_r($vendor_files->filename); ?>');">Add To Proposal</a>
	<?php } ?>
	</td>
</tr>
<?php  } 
} // end -ifif(count($this->vendor_files)>0)
 else { ?>
<tr class="table_blue_rowdots2">
    <td align="center" valign="bottom"><img src="images/folder_icon.png"  alt="folder" /></td>
    <td align="left" valign="middle"><?php echo "No files in this folder"; ?></td>
</tr>
<?php } ?>
 <tr class="table_blue_rowdots2">
   <td align="center" valign="bottom">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>

</table>
</form>
<?php $val = 'components/com_camassistant/doc/'; 
if($vendor_files->property_id ==''){
$vendor_files->property_id = $_REQUEST['pid'];
}
if($vendor_files->property_manager_id ==''){
$vendor_files->property_manager_id = $user->id;
}
$db =& JFactory::getDBO(); $user =&JFactory::getUser();
$vendor_files->property_manager_id = $user->id;
?>
</div></div>

<?PHP  echo exit; ?>