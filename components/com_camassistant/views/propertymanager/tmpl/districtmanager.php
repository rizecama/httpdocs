<?php
$id=JRequest::getVar('id','');
$db = JFactory::getDBO();
$sql = "SELECT name,lastname FROM #__users where id=".$id."";
$db->Setquery($sql);
$users = $db->loadObject();
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
// Your custom code here
 JHTML::_('behavior.modal');
 
?>
<style type="text/css">
body {
	background-color:#EEE;
	padding:0px;
	margin:0px;	
}
#loading {
	position:fixed;
	top:0px;
	right:50%;
	background:#fff;
	width:60px;
	height:20px;
	padding:0px;
	padding:4px;
	-moz-border-radius-topleft: 0px;
	-moz-border-radius-topright: 0px;
	/*-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;*/
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	z-index: 999999;
}

.main {
	width: 550px;
	border: 1px solid #CCC;
	background-color: #FFF;
	color: #666;
	padding: 20px;
	margin-top: 50px;
	margin-right: auto;
	margin-left: auto;
	height: 300px;
	position:relative;
}

.main .test_content {
	position: absolute;
	bottom: 0px;
}

</style>
<body onLoad="init()" >
<div id="loading" style="position:relative; background:#FFFFFF; width:100%; height:100%; top:0px;  margin-left: 47%;">
<img src="templates/camassistant_left/images/final_loading_big.gif" border=0 style="position:absolute; left:45%; top:50%;"></div>
<script type="text/javascript">
 var ld=(document.all);
 var ns4=document.layers;
 var ns6=document.getElementById&&!document.all;
 var ie4=document.all;
 if (ns4)
 	ld=document.loading;
 else if (ns6)
 	ld=document.getElementById("loading").style;
 else if (ie4)
 	ld=document.all.loading.style;
  function init()
 {
 if(ns4){ld.visibility="hidden";}
 else if (ns6||ie4) ld.display="none";
 }
 function managers(){
  document.forms["industriesForm"].submit();
 }
 </script>

<?php $managers = $this->mans;
$id=JRequest::getVar('id','');
$firstname=$users->name;
$lastname=$users->lastname;

 ?>
<link href="<?php echo Juri::base();?>templates/camassistant/css/popup.css" rel="stylesheet"/>
<div id="container_inner"  style=" padding-top:0px;">

<div class="head_greenbg2"><strong>VENDOR INVITATION PERMISSIONS</strong></div>
<div style="float:right; margin-right:10px"></div>
<div class="signup_check">
<form name="industriesForm" id="industriesForm" method="post" action="" >
<div style="padding-top:20px;"><table style="padding-left:20px; font-size:12px;" width="100%"><tr class="form_row">
 </td></tr>
<tr>
<td><p style="font-weight:bold; padding-left:1px; padding-right:10px;">District Manager</a></p></td>
<td>
<p style="font-weight:bold; padding-left:1px; padding-right:10px;"><?php echo $firstname.'&nbsp;'.$lastname; ?></p>
 
 </tr><tr height="20"></tr>
<!-- <tr><td>Manager Name</td><td>Select manager</td></tr>

<?php 
for($i=0; $i<count($managers); $i++){
?>
<tr>
<td>

<?php
echo $managers[$i]->lastname.'&nbsp;'.$managers[$i]->name;
?>
</td>
<td>
<input type="checkbox"  value="<?php echo $managers[$i]->id; ?>" name="standardmanagers[]" />
</td>
<?php } ?>
</tr>
--><tr>
<td><strong>Enable Vendor Invitations for this District Manager?</strong></td>
<td><input type="radio" value="1" name="invite">Yes<input type="radio" value="0" name="invite">No</td>
</tr>
<tr><td colspan="2"><a href="#" onClick="javascript:managers();" ><img align="right" src="templates/camassistant_left/images/save&amp;continue.gif" border="0" style="padding-right:30px;" ></a><!--<input type="image" onclick="industries();" src="templates/camassistant_left/images/save&amp;continue.gif"  alt="Continue sign up!" />--><!--<input type="Submit" value="Save" /> --></td></tr></table>
</div>
<input type="hidden" name="managername" value="<?php echo $firstname.'&nbsp;'.$lastname; ?>">
<input type="hidden" name="dmanager" value="<?php echo $id; ?>">
<input type="hidden" name="controller" value="propertymanager" >
<input type="hidden" name="task" value="managers_save" >
 </form>
<div class="clear"> </div>
</div>


</div>
</body>
<?PHP exit; ?>





