<?php
error_reporting(0);
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
$folder_name = JRequest::getVar('folder_name','');
$taxid = JRequest::getVar( 'taxid','' );
$warranty = JRequest::getVar('warranty','');
$Itemid = JRequest::getVar('Itemid','');
$taskid = JRequest::getVar('taskid','');
//echo "this is default-4 file"; 
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
var del_path = "&nbsp;<img onclick = \'javascript: warranty_doc_remove(); \' src=\'templates/camassistant_left/images/delete.gif\' alt=\'Remove file\' style=\'cursor:pointer;\' />";	
window.parent.document.getElementById('warranty_file_rem').innerHTML =del_path;
window.parent.document.getElementById('sbox-window').close(); 

}
function addfile(taskid,path,filename){
window.parent.document.getElementById('fpath'+taskid).value = path;
window.parent.document.getElementById('delimg'+taskid).style.display ='';
//window.parent.document.getElementById('hid_text'+taskid).value =filename;
//window.parent.document.getElementById('file_text'+taskid).innerHTML =filename;
window.parent.document.getElementById('upload_file'+taskid).innerHTML =filename;
//var del_path = "&nbsp;<img onclick = \'javascript: doc_remove("+taskid+"); \' src=\'templates/camassistant_left/images/remove.gif\' alt=\'Remove file\' />";	
//window.parent.document.getElementById('file_rem'+taskid).innerHTML =del_path;
window.parent.document.getElementById('sbox-window').close(); 
}
function add_generalfile(taskid,path,filename){
window.parent.document.getElementById('fpath_general'+taskid).value = path;
window.parent.document.getElementById('upload_file_general'+taskid).innerHTML =filename;
window.parent.document.getElementById('delimg_general'+taskid).style.display ='';
window.parent.document.getElementById('sbox-window').close(); 

}
function addsfile(taskid,path,filename){
window.parent.document.getElementById('spath'+taskid).value = path;
window.parent.document.getElementById('supload_file'+taskid).innerHTML =filename;
window.parent.document.getElementById('delimg'+taskid).style.display ='';
/*window.parent.document.getElementById('spath0').value = path;
window.parent.document.getElementById('shid_text').value =filename;
window.parent.document.getElementById('sfile_text').innerHTML =filename;
var del_path = "&nbsp;<img onclick = \'javascript: sdoc_remove(); \' src=\'templates/camassistant_left/images/remove.gif\' alt=\'Remove file\' />";	
window.parent.document.getElementById('sfile_rem').innerHTML =del_path;*/
window.parent.document.getElementById('sbox-window').close(); 
}
</script>
<?php 
$fileplace = explode("-->", $_REQUEST['fileplace']);
$fpath='components/com_camassistant/doc/'.$fileplace[0].'/';
$fpath_back='components/com_camassistant/doc';
$cnt=count($fileplace);
$user = JFactory::getUser(); 
//Functio to  by sateesh on 03-08-11--> 
///for My company documents BACK BUTTON functionality
if($cnt==1) {
$backlink = "index.php?option=com_camassistant&controller=proposals&task=vendor_docs&Itemid=115";
}
else{
//echo "<pre>"; print_r($fileplace);
	for($i=0;$i<count($fileplace)-1;$i++) {
		$fpath_back.='/'.$fileplace[$i];
		$fplace_back = explode("-->", $_REQUEST['fileplace']);
		for($j=0;$j<=$i;$j++)
		$fplace1_back[$j]=$fplace_back[$j];
		$fplace2_back=implode('-->',$fplace1_back);
		$fpath_back = str_replace($_REQUEST['folder_name'],'',$fpath_back);
	}
$k=count($fileplace)-2;
$fpath_back = str_replace('doc','doc/'.$taxid,$fpath_back);
$backlink='index.php?option=com_camassistant&controller=proposals&task=openfiles&Itemid='.$_REQUEST['Itemid'].'&pid='.$_REQUEST['pid'].'&mid='. $_REQUEST['mid'].'&path='.$fpath_back.'&folder_name='.$fileplace[$k].'&fileplace='.$fplace2_back.'&taxid='.$taxid.'&taskid='.$taskid.'&warranty='.$warranty;
}
//$path = explode($_REQUEST['folder_name'], $_REQUEST['path']);
//$fileplace = explode("-->".$_REQUEST['folder_name'], $_REQUEST['fileplace']);
?>


<!-- sof bedcrumb -->
<div style="float: right;"><a href="<?php echo $backlink;?>"><img alt="info" src="templates/camassistant_left/images/back.png"></a></div> 
<!-- eof bedcrumb -->
<!-- sof dotshead -->
<div class="green-heading" id="dotshead_green">&nbsp;</div>
<!--<div id="i_bar_gr">-->
<div id="new_bar">
<div style="padding: 0px; line-height: 27px;" id="new_bar_txt">
<span style="color: rgb(255, 255, 255); margin-left: 20px; text-transform: uppercase; font-family: ArialBlackRegular; font-weight: bold;"><strong>Directory Path: <?PHP //if(isset($folder_name) && $folder_name != '') echo $folder_name; else { ?>
<?php 	for($i=0;$i<count($fileplace);$i++) { 
			echo ucfirst(trim(str_replace('_',' ',$fileplace[$i])));
			if($i<count($fileplace)-1)
			echo '/';
		} ?>
<?PHP //} ?> </strong></span>

</div>

<div id="new_icon"></div>
</div>
<?php /*?><div id="i_bar_path">
<div id="i_bar_txt">
<span>Directory Path: <?PHP //if(isset($folder_name) && $folder_name != '') echo $folder_name; else { ?>
<?php 	for($i=0;$i<count($fileplace);$i++) { 
			echo ucfirst(trim(str_replace('_',' ',$fileplace[$i])));
			if($i<count($fileplace)-1)
			echo '/';
		} ?>
<?PHP //} ?> </span></div>
<div id="i_icon"><!--<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=80&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a> --></div>
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
<input type="hidden" name="second" value="" />
<input type="hidden" name="urlredirect" value="" />

<table width="100%" cellpadding="0" cellspacing="4">
  <!--<tr class="table_blue_row">-->
  <tr class="table_green_row">
    <td width="62" align="center" valign="top">SELECT</td>
    <td width="456" align="left" valign="top">Name</td>
    <td width="141" align="center" valign="top">options</td>
    </tr>
    
  <?php for ($i=0; $i<count($this->openfiles['folders']); $i++){ ?>
<tr class="table_blue_rowdots2">
    <td align="center" valign="bottom"><a href="index.php?option=com_camassistant&controller=documents&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&warranty=<?PHP echo $warranty; ?>&taskid=<?php echo $taskid; ?>"><img src="images/folder_icon.png"  alt="folder" /></a></td>
    <td align="left" valign="middle"><a href="index.php?option=com_camassistant&controller=documents&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&warranty=<?PHP echo $warranty; ?>&taskid=<?php echo $taskid; ?>"><?php echo str_replace('_',' ',$this->openfiles['folders'][$i]); ?></a>
</td>
<td align="center" valign="middle"><a href="index.php?option=com_camassistant&controller=proposals&task=openfiles&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']."/".$this->openfiles['folders'][$i]; ?>&folder_name=<?php print_r($this->openfiles['folders'][$i]); ?>&fileplace=<?php echo $_REQUEST['fileplace']."-->".$this->openfiles['folders'][$i];?>&taxid=<?php echo $taxid; ?>&warranty=<?PHP echo $warranty; ?>&taskid=<?php echo $taskid; ?>">OPEN</a>

</td>
</tr>
<?php } ?>
<?php

for ($i=0; $i<count($this->openfiles['files']); $i++){
$img_icon = substr(strrchr($this->openfiles['files'][$i], "."), 1);
//echo "<pre>"; print_r($this->openfiles['files'][$i]);
?>
<tr class="table_blue_rowdots2">
<td align="center" valign="bottom"><a href="index.php?option=com_camassistant&controller=documents&task=open&Itemid=<?php echo $_REQUEST['Itemid']; ?>&doc_title=<?php print_r($this->openfiles['files'][$i]); ?>&path=<?php echo $_REQUEST['path']; ?>&folder_name=<?php print_r($this->openfiles['files'][$i]); ?> "><img src="templates/camassistant_inner/images/images_<?PHP echo $img_icon; ?>.png" /></a></td>
<td align="left" valign="middle"><a href="index.php?option=com_camassistant&controller=documents&task=open&Itemid=<?php echo $_REQUEST['Itemid']; ?>&doc_title=<?php print_r($this->openfiles['files'][$i]); ?>&path=<?php echo $_REQUEST['path']; ?>&folder_name=<?php print_r($this->openfiles['files'][$i]); ?> "><?php echo str_replace('_',' ',$this->openfiles['files'][$i]); ?></a>
</td>
<td align="center" valign="middle">
<?php $pro_path = $_REQUEST['path']."/".$this->openfiles['files'][$i];?>
<?php if($warranty=='file'){ ?>
	<a href="#" style="cursor:pointer" onclick="addfile('<?php echo $taskid; ?>','<?php echo $pro_path; ?>','<?php print_r($this->openfiles['files'][$i]); ?>');">Add To Proposal</a> <?php } 
	else if( $warranty=='general_popup' ){ ?>
	<a href="javascript:void(0);" style="cursor:pointer" onclick="add_generalfile('<?php echo $taskid; ?>','<?php echo $pro_path; ?>','<?php print_r($this->openfiles['files'][$i]); ?>');">Add To Proposal</a>
	<?php } 
	else if($warranty=='sfile'){ ?>
	<a href="#" style="cursor:pointer" onclick="addsfile('<?php echo $taskid; ?>','<?php echo $pro_path; ?>','<?php print_r($this->openfiles['files'][$i]); ?>');">Add To Proposal</a>
<?php } else { ?>
		<a href="#" style="cursor:pointer" onclick="addfile_warranty('<?php echo $pro_path; ?>','<?php print_r($this->openfiles['files'][$i]); ?>');">Add To Proposal</a>
	<?php } ?>
	</td>

</tr>
<?php } ?>
 <tr class="table_blue_rowdots2">
   <td align="center" valign="bottom">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   <td align="left" valign="top">&nbsp;</td>
   </tr>
</table>
</form>
<div class="table_bottomlinks2">
<ul>
<li  style=" background:none;"><a class="modal" id="links1"  title="Add Folder"  href="index.php?option=com_camassistant&controller=documents&task=addfolder&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>" rel="{handler: 'iframe', size: {x: 400, y: 200}}" ><img src="images/new_folder.png" alt="add a new folder" width="45" height="39" align="absmiddle" /> </a><a class="modal" id="links1"  title="Add Folder"  href="index.php?option=com_camassistant&controller=documents&task=addfolder&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>" rel="{handler: 'iframe', size: {x: 400, y: 200}}" >+Add a new Folder  </a></li>

<li><a class="modal" id="links1"  title="Upload a file"  href="index.php?option=com_camassistant&controller=documents&task=addfile&parentid=1&pid=<?php echo $_REQUEST['pid']; ?>&mid=<?php echo $_REQUEST['mid']; ?>&path=<?php echo $_REQUEST['path']; ?>" rel="{handler: 'iframe', size: {x: 500, y: 250}}" > +Upload a file to this folder <img src="images/upload_folder.png" alt="Upload a file to this folder" width="37" height="36" align="middle" /></a></li> 
</ul>
</div>
</div></div>
<div class="clear"></div>
<?PHP  echo exit; ?>