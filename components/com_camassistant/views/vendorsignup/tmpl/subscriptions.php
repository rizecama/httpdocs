<script type="text/javascript">
function getpromocode(){
alert("can");

}
</script>
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
// Your custom code here

$user =& JFactory::getUser(); 
if($user->user_type != 11)
{ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else { ?>
<div id="container_inner"  style=" padding-top:10px;">
<p style="height:12px;"></p>
<div>
<div id="i_bar">
<div id="i_bar_txt">
<span><strong>MY SUBSCRIPTIONS</strong></span>
</div>
&nbsp;
<div id="i_icon"><a href="index2.php?option=com_content&amp;view=article&amp;id=71&amp;Itemid=113" rel="{handler: 'iframe', size: {x: 680, y: 530}}" class="modal" title="Click here" style="text-decoration: none;"><img src="templates/camassistant_left/images/info_icon2.png"> </a></div>

<!--<div id="i_icon"><a href="#"><img alt="info" src="/dev/images/info_icon2.png"></a></div>-->
</div>
<div class="clear"></div>
<p style="height:20px; margin-top:30px;">Choose your Membership below and then hit "SUBSCRIBE NOW"</p>
<form enctype="multipart/form-data" action="index.php?option=com_camassistant&controller=vendors&task=updatesubscribe" method="post" name="VendorForm2" onsubmit="javascript:return validate_data2();">
<table cellpadding="0" cellspacing="0">
<tr style="height:50px;"><td width="91%"><input type="radio" value="basic" id="basic" name="subscribe" style="width:20px;"  /><strong>Basic Membership</strong> </td><td width="25%"><strong>$149/Year</strong></td></tr>
<tr style="height:50px;"><td width="91%"><input type="radio" value="public" id="public" name="subscribe" style="width:20px;"  /><strong>Basic Membership + Publi Profile</strong> </td><td width="25%"><strong>$199/Year</strong></td></tr>
<tr style="height:50px;"><td width="91%"><input type="radio" value="sponsor" id="sponsor" name="subscribe" style="width:20px;"  /><strong>Basic Membership + Sponsored Vendor</strong> </td><td width="25%"><strong>$249/Year</strong></td></tr>
<tr style="height:50px;"><td width="91%"><input type="radio" value="all" id="all" name="subscribe" style="width:20px;"  /><strong>Basic Membership + Publi Profile + Sponsored Vendor</strong></td><td width="25%"><strong>$299/Year</strong></td></tr>
<tr><td><input type="text" value="" id="promocode" name="promocode" /></td><td><a href="javascript:getpromocode();">Apply Promocode</a></td></tr>
<tr><td align="center"><input type="image" style="border:none"  src="templates/camassistant_left/images/Save.gif" alt="Continue sign up!" readonly="readonly"  /></td></tr>
	</table>

</form>
</div> 
<div class="clear"></div>
</div>
<?php } ?>