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
$time = JRequest::getVar('time','');
?>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/jquery1.css" />		
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery.elastic.js"></script>

<script type="text/javascript">
function validate_data2()
{
var frm = document.Addnotesform;
var fup = document.getElementById('uploadfile');
var fileName = fup.value;

if(fileName){
	var filesize = document.getElementById('uploadfile');
	var file_size = filesize.files[0].size;
}

var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	 if(fileName != '')
    {
	 if(ext != 'png' && ext != 'PNG' && ext != 'jpg' && ext != 'JPG' && ext != 'gif' && ext != 'GIF' && ext !='jpeg' && ext != 'JPEG' && ext != 'pdf' && ext != 'PDF' && ext != 'doc' && ext != 'DOC' && ext != 'rtf' && ext != 'RTF' && ext != 'xls' && ext != 'XLS' && ext != 'ppt' && ext != 'PPT' && ext != 'xlsx' && ext != 'XLSX' && ext != 'docx' && ext != 'DOCX' && ext != 'pptx' && ext != 'PPTX')
	  {
	  alert("Invalid file extension, please select another file");
	  return false;
	  } else {
	 		if(file_size > '5000000'){
			window.parent.document.getElementById( 'sbox-window' ).close();
			window.parent.parent.getalert();
			return false;
			} 
			else{
			return true;
			}
	  }
	 } else {
	  alert("Please Select File or Cancel");
	  return false;
	 }
}
function close(){
     window.parent.document.getElementById( 'sbox-window' ).close();
}
</script>

<script type="text/javascript">
L = jQuery.noConflict();
L(document).ready( function(){      
	L(function()
    {
        L('#uploadfile').on('change',function ()
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
               L('#file_val').html(filePath);
			}
			

        });
    });
	
});
</script>

<?PHP

// Your custom code here
//echo "<pre>"; print_r($_REQUEST); exit;
$id	= JRequest::getVar('id','');
$type = JRequest::getVar('type','');
$type_id = JRequest::getVar('type_id','');
?>
<?php //echo '<pre>'; print_r($_REQUEST); ?>

<br />
<form style="padding:0px; margin:0px;" action="index.php?option=com_camassistant&controller=vendors&task=uploadcompanyfiles" method="post" name="Addnotesform" enctype="multipart/form-data">
<table style="padding:30px;" border="0" align="center">
<tr class="table_blue_row"><td colspan="2"><font color="#79B700">Available file extensions to upload</font>	</td></tr>
<tr><td colspan="2">png, jpg, gif, jpeg, pdf, doc, rtf, xls, ppt, xlsx, docx, pptx, tif, tiff</td></tr>
<tr height="30px"></tr>
<tr><td align="center"><input type="file" name="uploadfile" id="uploadfile" style="width:200px;"  /><span id="file_val"> </span></td></tr>
<tr height="25px"><td colspan="2"></td></tr>
<tr><td align="center" colspan="2"><!--<input type="submit" value="Submit" />  <input type="image" src="templates/camassistant_inner/images/submit.png"  onclick="javascript: return validate_data2();"/> --><a href="javascript:close();"><img src="components/com_camassistant/assets/images/Cancel.gif" style="cursor:pointer;" /></a>&nbsp;&nbsp;<input type="image" src="components/com_camassistant/assets/images/Upload.gif"  onclick="javascript: return validate_data2();"/></td></tr></table>
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php exit; ?>
</body>
</html>
