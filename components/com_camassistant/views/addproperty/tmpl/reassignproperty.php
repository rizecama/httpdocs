<?php
/**
 * @version		1.0.0 camassistant $
 * @package		camassistant
 * @copyright	Copyright � 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal');
?>
<script type="text/javascript">

</script>
<?php
$user = JFactory::getUser();
$usertype = $user->user_type;
if($usertype == '11'){
echo "No permission";
} else {
?>
<form name="reassignform" id="reassignform" method="post" >
<div id="vender_right">

<!-- sof bedcrumb -->
<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125">Home</a></li><li><a href="index.php?option=com_camassistant&t&controller=addproperty&Itemid=125">Add Property</a> </li>
</ul>
</div>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<!--<div id="dotshead_blue">REASSIGN PROPERTY MANAGER </div>-->
<!-- eof dotshead -->
<div id="i_bar">
<div id="i_bar_txt"><font color="#ffffff"><strong>REASSIGN PROPERTY MANAGER </strong></font>
</div>
<div id="i_icon"></div>
</div>
<table width="100%" border="0">
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="25%" height="25"><strong>Property Name:</strong></td>
    <td><?php echo ucwords($this->pinfo[0]->property_name);?></td>
  </tr>
  <tr>
    <td height="25"><strong>Assigned Manager:</strong></td>
    <td>
<select style="width: 156px;" name="custid" >
<!--<option value="0">Current Assigned Manager</option>-->
<?php 
for ($i=0; $i<count($this->custmers); $i++){
$custmers = $this->custmers[$i];
?>
<option value="<?php echo $custmers->id; ?>" <?php if($this->pinfo[0]->property_manager_id==$custmers->id) echo "selected";?>><?php echo $custmers->lastname.' '.$custmers->name; ?> </option>
<?php }  ?>
<?php 
if( $usertype ==13 ) {
			$db= JFactory::getDBO();	
			$sql1 = "SELECT u.masterid, v.name, v.lastname from #__cam_masteraccounts as u, #__users as v where u.firmid=".$user->id." and u.masterid=v.id";
			$db->Setquery($sql1);
			$masterid = $db->loadObject();
}
?>
<?php if($masterid){ ?>
<option value="<?php echo $masterid->masterid; ?>" <?php if($this->pinfo[0]->property_manager_id==$masterid->id) echo "selected";?>><?php echo $masterid->lastname.' '.$masterid->name; ?> </option>
<?php } ?>
</select></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="pid" value="<?php echo $this->pid;?>" />
<input type="hidden" name="task" value="save_reassign" />
<input type="hidden" name="controller" value="addproperty" />
<input type="hidden" name="option" value="com_camassistant" />
<!-- sof table pan -->

<!-- eof table pan -->
<div class="table_bottomlinks">
<input type="image" src="templates/camassistant_left/images/reassignmanager.gif" alt="add a property" width="169" height="49" align="right" />
</div>
</div>
</form>

<?php } ?>