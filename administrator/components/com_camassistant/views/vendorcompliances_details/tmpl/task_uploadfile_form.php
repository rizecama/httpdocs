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
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/style.css" 
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Open+Sans+Condensed:700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Juri::base(); ?>components/com_camassistant/skin/css/jquery1.css" />		
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery.elastic.js"></script>
<style>
table_blue_row {
	background:url(../images/green_bg-bar.gif) repeat-x;
	height:30px;
	color:#FFF;
	text-transform:uppercase;
	font-weight:bold;
	padding-bottom:15px;
}
.table_blue_row td {
	padding:2px 5px 0 5px;
	height:28px;
	font-size:13px;
}
</style>

<script type="text/javascript">
function validate_data2()
{
var frm = document.Addnotesform;
var fup = document.getElementById('uploadfile');
var fileName = fup.value;

var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	 if(fileName != '')
    {
	 if(ext != 'png' && ext != 'PNG' && ext != 'jpg' && ext != 'JPG' && ext != 'gif' && ext != 'GIF' && ext !='jpeg' && ext != 'JPEG' && ext != 'pdf' && ext != 'PDF' && ext != 'doc' && ext != 'DOC' && ext != 'rtf' && ext != 'RTF' && ext != 'xls' && ext != 'XLS' && ext != 'ppt' && ext != 'PPT' && ext != 'xlsx' && ext != 'XLSX' && ext != 'docx' && ext != 'DOCX' && ext != 'pptx' && ext != 'PPTX')
	  {
	  alert("Invalid file extension, please select another file");
	  return false;
	  } else {
	  return true;
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
			   L('input[type="file"]').width('82');
               L('#file_val').html(filePath);
			}
			

        });
    });
	
});

function getreplaceimage(filenames){
var fileName = filenames.replace("C:\\fakepath\\", "");

document.getElementById('uploadfile').value = fileName;
}
</script>
<?PHP

// Your custom code here
//echo "<pre>"; print_r($_REQUEST); 
$id	= JRequest::getVar('id','');
$type = JRequest::getVar('type','');
$type_id = JRequest::getVar('type_id','');
$userid = JRequest::getVar('userid','');

?>
<?php //echo '<pre>'; print_r($_REQUEST); ?>

<br />
<form style="padding:0px; margin:0px;" action="index.php?option=com_camassistant&controller=vendorcompliances_details&task=imageupload23&id=<?php echo $id; ?>&type=<?php echo $type; ?>&userid=<?php echo $userid; ?>&type_id=<?php echo $type_id; ?> <?php //echo $_REQUEST['rfp_id']; ?>" method="post" name="Addnotesform" enctype="multipart/form-data">
<table border="0" align="center" width="100%" class="firsttableform">
<tr class="table_blue_row" style="background:none;"><td align="center"><font color="#79B700">Available file extensions to upload</font>	</td></tr>
<tr><td align="center"><span style="font-size:13px;">png, jpg, gif, jpeg, pdf, doc, rtf, xls, ppt, xlsx, docx, pptx, tif, tiff</span></td></tr>
<tr height="30px"></tr>
<tr><td align="center"><!--<input type="file" name="uploadfile" id="uploadfile" /><span id="file_val"> </span>-->
<table style="width: 149px;"><tbody><tr><td width="150">
<input type="text" id="uploadfile" class="file_input_textbox" readonly="readonly" style="vertical-align: top; margin-top:3px;">
</td>
<td>
<div style="float: left;width:93px;" class="file_input_div2">
<input type="button" class="file_input_button2" style="margin-top:2px; right:0; width:93px;">
<input title="Upload Document"  type="file" id="uploadfile_origin" onchange="javascript: getreplaceimage(this.value);" name="uploadfile" class="file_input_hidden">
</div></td></tr></tbody></table>
</td></tr>
<tr height="25px"><td align="center"></td></tr>
<tr class="buttons_uninvite"><td align="center">
<a href="javascript:close();"><img src="<?php echo Juri::base(); ?>/components/com_camassistant/skin/images/Cancel.gif" style="cursor:pointer;" /></a>&nbsp;&nbsp;
<input type="image" src="<?php echo Juri::base(); ?>/components/com_camassistant/skin/images/Upload.gif"  onclick="javascript: return validate_data2();"/></td></tr>
</table>
<div id="rolloverimage" style="display:none;"></div>
<?php echo JHTML::_( 'form.token' ); ?>
</form>


<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php exit; ?>
</body>
</html>
