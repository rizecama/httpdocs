<?php
/**
 * @version		1.0.0 camsignup $
 * @package		camsignup
 * @copyright	Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		anand kumar
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Your custom code here

//echo "<pre>"; print_r($_REQUEST);
 $rfp_id =JRequest::getVar('rfpid','');
?>
<div style="padding-top:50px; font-size:15px; font-weight:bold;">
<div>Your proposal has been duplicated into your DRAFT RFP folder.  Would you like to edit it now?</div><br/>
<div align="center"><?php /*?><input type="radio" name="radio" value="yes"  onclick="window.parent.location='index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid=<?php echo $rfp_id;  ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>';"/><?php */?><a href="#" onclick="window.parent.location='index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid=<?php echo $rfp_id;  ?>&Itemid=89';" ><img src="templates/camassistant/images/yes.gif" border="0" /></a>

 <?php $user = JFactory::getUser();
		 if($user->user_type == '12'){ ?>
		<?php /*?> <input type="radio" name="radio" value="No"  onclick="window.parent.location='index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=128';"/><?php */?> <a href="#" onclick="window.parent.location='index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=128';" > <img src="templates/camassistant/images/No.gif" border="0" /></a>
		<?php 
			}
			if($user->user_type == '13'){ ?>
			<?php /*?> <input type="radio" name="radio" value="No"  onclick="window.parent.location='index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125';"/> <?php */?> <a href="#" onclick="window.parent.location='index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125';" ><img src="templates/camassistant/images/No.gif" border="0" /></a>
		<?php 
			}
	?>
	</div>
</div>
<?php exit; ?>