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
$warranty = JRequest::getVar('warranty','');
$taskid = JRequest::getVar('taskid','');
?>
<link href="<?php JPATH_SITE ?>templates/camassistant_left/css/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/jquery1.css" />		
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery.elastic.js"></script>

<script type="text/javascript">
function validate_data2()
{
var x= document.forms["Addnotesform"]["uploadfile"].value;
var ext = x.substring(x.lastIndexOf('.') + 1);

var fileName = document.forms["Addnotesform"]["uploadfile"].value;
var filext = fileName.substring(fileName.lastIndexOf('.') + 1);

if(fileName){
var filesize = document.getElementById('uploadfile_origin');
var file_size = filesize.files[0].size;
}

	 if(x != '')
    {
	 if(ext != 'png' && ext != 'PNG' && ext != 'jpg' && ext != 'JPG' && ext != 'gif' && ext != 'GIF' && ext !='jpeg' && ext != 'JPEG' && ext != 'pdf' && ext != 'PDF' && ext != 'doc' && ext != 'DOC' && ext != 'rtf' && ext != 'RTF' && ext != 'xls' && ext != 'XLS' && ext != 'ppt' && ext != 'PPT' && ext != 'xlsx' && ext != 'XLSX' && ext != 'docx' && ext != 'DOCX' && ext != 'pptx' && ext != 'PPTX')
	  { 
	  alert("Invalid file extension, please select another file");
	  return false;
	  }
	  else{
				if(file_size > '5000000'){
					window.parent.document.getElementById( 'sbox-window' ).close();
					window.parent.parent.getalert();
					return false;
				}
				else{
					return;
				}
		  }
	 }
	 else{
	 	alert("Please select a file to upload.");
   	  	return false;
	 }
	return;
} 
function getreplaceimage(filenames){
var fileName = filenames.replace("C:\\fakepath\\", "");
document.getElementById('uploadfiles').value = fileName;
}
function pclose(){
window.parent.document.getElementById( 'sbox-window' ).close();
}
</script>
<script type="text/javascript">
L = jQuery.noConflict();
L(document).ready( function(){      
	L(function()
    {
        L('#fileUpload').on('change',function ()
        {
            var filePath = L(this).val();
			var clean=filePath.split('\\').pop();
            console.log(clean);
			len = clean.length ;
			if(len > 25){
				textsend = clean.substring(0,25);
				textsend = textsend + '...' ;
				L('input[type="file"]').width('82');
				L('#file_val').html(textsend);

			}else{
			   L('input[type="file"]').width('82');
               L('#file_val').html(filePath);
			}
			

        });
    });
	
});
</script>
<?PHP 

// Your custom code here
//echo "<pre>"; print_r($_REQUEST); exit;
$rebid	= JRequest::getVar('rebid','');
$Alt_bid = JRequest::getVar('Alt_bid','');
$Alt_Prp = JRequest::getVar('Alt_Prp','');
$property_id = JRequest::getVar('pid','');
$user_id = JRequest::getVar('mid','');
$act = JRequest::getVar('act','');
//echo '<pre>'; print_r($_REQUEST);
if($Alt_bid != '')
$is_Alt =  $Alt_bid;
else
$is_Alt =  $Alt_Prp;
?>
<link href="<?php echo JURI::root(); ?>administrator/templates/khepri/css/popup.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo JURI::root(); ?>administrator/components/com_camassistant/editor/ed.js"></script> 
<br /> 
<div align="right"><a href="javascript:history.go(-1)"><img alt="info" src="templates/camassistant_left/images/back.png"></a></div>
<form style="padding:0px; margin:0px;" action="index.php?option=com_camassistant&controller=rfpcenter&task=save_uploadfile&rfp_id=1&pid=<?php echo $property_id; ?>&mid=<?php echo $user_id; ?>&taskid=<?php echo $taskid; ?> <?php //echo $_REQUEST['rfp_id']; ?>" method="post" name="Addnotesform" enctype="multipart/form-data">

<table border="0" align="center" width="100%">
<tr class="table_blue_row" style="text-align:center; background:none;"><td><font style="font-weight:bold;font-size:15px; font-family: arial; line-height:28px;" color=" #4d4d4d">Available file extensions to upload</font>	</td></tr>
<tr class="table_blue_row" style="text-align:center; background:none;"><td><div style="color:#4d4d4d; font-family: arial; font-size:12px; line-height:19px;">Compatible File Types: <span style="font-weight:bold; color: #4d4d4d;">png, jpg, gif, jpeg, pdf, doc, rtf, xls, ppt, xlsx, docx, pptx</span></div></td></tr>
<tr height="30px"></tr>
</table>


<table cellpadding="0" cellspacing="0" align="center" width="100%">
<tr style="text-align:right;"><td align="center">
<table style="width: 149px;"><tbody><tr><td width="150">
<input type="text" id="uploadfiles" class="file_input_textbox" readonly="readonly" style="vertical-align: top; margin-top:3px;">
</td>
<td>
<div style="float: left;width:93px;" class="file_input_div2">
<input type="button" class="file_input_button2" style="margin-top:2px; right:0; width:93px;">
<input title="Upload Document"  type="file" id="uploadfile_origin" onchange="javascript: getreplaceimage(this.value);" name="uploadfile" class="file_input_hidden">
</div>
</td></tr></tbody></table></td></tr>
<tr height="50"></tr>

<tr><td align="center">
<a href="javascript:pclose();"><img style="cursor:pointer;" src="components/com_camassistant/assets/images/CancelButton2.gif"></a>
<input type="image" src="components/com_camassistant/assets/images/Uplaod2.png"  onclick="javascript: return validate_data2();"/>
</td></tr>

</table>
<?php echo JHTML::_( 'form.token' ); ?>

<input type="hidden" name="task_id" value="<?PHP echo $_REQUEST['taskid']; ?>" />
</form>
<?php exit; ?>
</body>
</html>
