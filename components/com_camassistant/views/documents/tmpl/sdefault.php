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

//echo "this is shared default-1 file";
?>
<div id="bedcrumb" style="float:left; display:none;">
<ul>
<br/>
<li class="home"><a href="index.php?option=com_camassistant&controller=vendors&task=vendor_dashboard&Itemid=112">Home  </a></li>
<li><a href="index.php?option=com_camassistant&controller=documents&Itemid=76">My Company Documents</a></li>
<li>Shared Company Documents  </li>
</ul>
</div>
<div style="float:right; margin-bottom:10px;" ><br/>
<a href="index.php?option=com_camassistant&controller=documents&Itemid=76"><img src="templates/camassistant_left/images/back.png" alt="info" /></a></div>
<div class="clear"></div>
<div id="i_bar">
<div id="i_bar_txt">
<span>Shared Company Documents  </span>
</div>
<div id="i_icon">

<?php 
 $user = JFactory::getUser();  
 $userid = $user->id;
 $username = $user->name;

if ($user->user_type=='12') { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=89&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } else { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=80&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } ?>
</div>
</div>

<?php //echo "We are working on this functionality"; ?>
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
<input type="hidden" name="second" value="" />
<input type="hidden" name="backurl" value="" />

<table width="100%" cellpadding="0" cellspacing="4" class="vendortable">
  <tr class="vendorfirsttr">

    <td width="62" align="center" valign="middle">SELECT</td>
    <td width="456" align="left" valign="middle">NAME</td>
    <td width="141" align="center" valign="middle" colspan="2">OPTIONS</td>
    </tr>
  <?php 
//echo $this->camfirm[0]->id; 
for ($i=0; $i<count($this->sdocs); $i++){
$sdocs = $this->sdocs[$i]; 
if($sdocs->sdocTitle){
$type = 'shared';
}
?>
<!--To get the file extension Modified by sateesh on 27-07-11-->
<?php 
$filename = $sdocs->sdocTitle;
$ext = end(explode('.', $filename));
$ext = substr(strrchr($filename, '.'), 1);
$ext = substr($filename, strrpos($filename, '.') + 1);
$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);
$exts = split("[/\\.]", $filename);
$n = count($exts)-1;
$exts = $exts[$n];

if($exts=='gif' || $exts=='GIF' || $exts=='jpg' || $exts=='JPG' || $exts=='png' || $exts=='PNG' || $exts=='doc' || $exts=='DOC' || $exts=='psd' || $exts=='PSD' || $exts=='bmp' || $exts=='BMP' || $exts=='doc' || $exts=='docx' || $exts=='pdf' || $exts=='PDF' || $exts=='jpeg' || $exts=='JPEG' || $exts=='rtf' || $exts=='RTF' || $exts=='xls' || $exts=='XLS' || $exts=='ppt' ||  $exts=='PPT' || $exts=='xlsx' || $exts=='XLSX' || $exts=='docx' || $exts=='DOCX' || $exts=='pptx' || $exts=='PPTX'){
$exts = $exts;
$task = 'open';
$delete = 'filedelete';
if ($user->user_type=='13') { 
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.str_replace(' ','_',$this->camfirm[0]->camfirm_license_no).'/'.$sdocs->sdocTitle; 
} 
else if ($user->user_type=='16') { 
$path = 'components/com_camassistant/doc/pro/'.$sdocs->sdocTitle; 
}
else {
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.str_replace(' ','_',$this->camfirm[0]->camfirm_license_no).'/'.$user->id.'/'.$sdocs->sdocTitle;  
}
$type='shared';

} else{
$task = 'sopenfiles';
$exts = 'folder';
$delete = 'folderdelete';
if ($user->user_type=='13') {
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.str_replace(' ','_',$this->camfirm[0]->camfirm_license_no).'/'.$sdocs->sdocTitle; 
} 
else if ($user->user_type=='16') { 
$path = 'components/com_camassistant/doc/pro/'.$sdocs->sdocTitle; 
}

else{
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.str_replace(' ','_',$this->camfirm[0]->camfirm_license_no).'/'.$user->id.'/'.$sdocs->sdocTitle; 
}

$fileplace = $sdocs->sdocTitle;
$type='shared';
}

if($sdocs->parent_manager==0){
$path = str_replace($user->id,'',$path);
$path = str_replace('//','/',$path);
$user = 'cam';
//echo $path;
}
else{
$companyname = $this->camfirm[0]->comp_name.'_'.$this->camfirm[0]->camfirm_license_no; 
$companyname = str_replace(' ','_',$companyname);
if ($user->user_type=='13') {
$paths = str_replace($companyname,$companyname.'/'.$sdocs->property_manager_id,$path);
} else{
$paths = $path;
}
$path = $paths;
$user = 'cust';
}
?>
<!--To get the file extension Modified by sateesh on 27-07-11 completed-->
<?php //echo "<pre>"; print_r($sdocs); ?>
<?php if($sdocs->sdocTitle){ ?>
<tr class="table_blue_rowdots2">
<!--<td><img src="images/doc.png" /></td>-->
<td align="center" valign="bottom" style="padding-top:12px; padding-bottom:12px;"><a href="index.php?option=com_camassistant&controller=documents&Itemid=<?php echo $_REQUEST['Itemid']; ?>&propertyname=<?php print_r($sdocs->sdocTitle);  ?>&task=<?php echo $task; ?>&fileplace=<?php echo $fileplace; ?>&type=<?php echo $type; ?>&spath=<?php echo $path;?>&spid=<?php echo $sdocs->id; ?>&smid=<?php echo $sdocs->property_manager_id; ?>&user=<?php echo $user; ?>"><img src="templates/camassistant_inner/images/images_<?php echo $exts; ?>.png" /></a></td>

<td align="left" valign="middle" style="padding-top:12px; padding-bottom:12px;"><a href="index.php?option=com_camassistant&controller=documents&Itemid=<?php echo $_REQUEST['Itemid']; ?>&propertyname=<?php print_r($sdocs->sdocTitle);  ?>&task=<?php echo $task; ?>&fileplace=<?php echo $fileplace; ?>&type=<?php echo $type; ?>&spath=<?php echo $path;?>&spid=<?php echo $sdocs->id; ?>&smid=<?php echo $sdocs->property_manager_id; ?>&user=<?php echo $user; ?>"><?php echo str_replace('_',' ',$sdocs->sdocTitle);  ?></a>
</td>
<td align="center" valign="middle" style="padding-top:12px; padding-bottom:12px;">
<a href="index.php?option=com_camassistant&controller=documents&Itemid=<?php echo $_REQUEST['Itemid']; ?>&propertyname=<?php print_r($sdocs->sdocTitle);  ?>&task=<?php echo $task; ?>&fileplace=<?php echo $fileplace; ?>&type=<?php echo $type; ?>&spath=<?php echo $path;?>&spid=<?php echo $sdocs->id; ?>&smid=<?php echo $sdocs->property_manager_id; ?>&user=<?php echo $user; ?>">OPEN</a>
</td>
<!--//////////////To open the files completed-->
<script type="text/javascript">
function filedelete(filename,path){

var result = confirm('Are you sure you want to delete this file '+filename+' ?');
	if(result == true)
	{
		var from = document.docform;
		from.option.value='com_camassistant';
		from.controller.value='documents';
		from.task.value='deletefile';
		from.backurl.value = '<?php echo $_SERVER['REQUEST_URI']; ?>'
		from.spid.value='<?php echo $sdocs->id; ?>';
		from.smid.value='<?php echo $sdocs->property_manager_id; ?>';
		from.spath.value=path;
		from.doc_title.value=filename;
		from.second.value='second';
		from.submit();
	}
	else 
	{
		return false;
	}
}
function folderdelete(folder,path){
var result = confirm('Are you sure you want to delete this folder '+folder+' and the internal files?');
	if(result == true)
	{
		var frm = document.docform;
		frm.option.value='com_camassistant';
		frm.controller.value='documents';
		frm.task.value='delete';
		frm.backurl.value = '<?php echo $_SERVER['REQUEST_URI']; ?>'
		frm.spid.value='<?php echo $sdocs->id; ?>';
		frm.smid.value='<?php echo $sdocs->property_manager_id; ?>';
		frm.spath.value=path;
		frm.doc_title.value=folder;
		frm.submit();
	}
	if(result == false) 
	{
		window.location.href;
	}
}
</script>
	<?php 
	 $user = JFactory::getUser();  
	?>
<?php if ($user->user_type=='12' && $sdocs->parent_manager==0) { ?>
<td align="center" valign="middle">
<a href="javascript:<?php echo $delete;?>('<?php echo $sdocs->sdocTitle;  ?>','<?php echo $path; ?>');">DELETE</a>
</td>
<?php } else if($user->user_type=='13'){ ?>
<td align="center" valign="middle">
<a href="javascript:<?php echo $delete;?>('<?php echo $sdocs->sdocTitle;  ?>','<?php echo $path; ?>');">DELETE</a>
</td>
<?php } ?>
</tr>
<?php }  } ?>


<tr class="table_blue_rowdot">
   <td align="center" valign="bottom">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>
  <tfoot>
		<td colspan="9">
			<?php echo $this->pagination->getPagesLinks(); ?>
            <?php echo $this->pagination->getPagesCounter(); ?>
		</td>
	</tfoot>
</table>
</form>
<?php  
if ($user->user_type=='13') { 
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.$this->camfirm[0]->camfirm_license_no; 
} 
else if ($user->user_type=='16'){
$path = 'components/com_camassistant/doc/pro/'; 
}
else{
$path = 'components/com_camassistant/doc/'.str_replace(' ','_',$this->camfirm[0]->comp_name).'_'.$this->camfirm[0]->camfirm_license_no.'/'.$user->id; 
}



?>
<div class="clear"></div>
<div class="table_bottomlinks2">
<ul>
<li  style=" background:none;"><img src="images/new_folder.png" alt="add a new folder" width="45" height="39" align="absmiddle" /><a class="modal" id="links1"  title="Add Folder"  href="index.php?option=com_camassistant&controller=documents&task=saddfolder&type=shared&parentid=0&smid=<?php echo $userid; ?>&spath=<?php echo $path; ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?> " rel="{handler: 'iframe', size: {x: 400, y: 200}}" >Add a folder</a></li>

<li><img src="images/upload_folder.png" alt="Upload a file to this folder" width="37" height="36" align="middle" /><a class="modal" id="links1"  title="Upload File"  href="index.php?option=com_camassistant&controller=documents&task=saddfile&type=shared&parentid=0&smid=<?php echo $userid; ?>&spath=<?php echo $path; ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>" rel="{handler: 'iframe', size: {x: 500, y: 250}}" >Upload a file</a></li> 
</ul>
</div>
 
<!--<div id="pagination" class="pagination_bg">
		<?php //echo $this->pagination->getPagesLinks(); ?>
		<?php //echo $this->pagination->getPagesCounter(); ?>
</div>
-->


</div></div>
