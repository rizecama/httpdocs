<?php
/**
 * @version		1.0.0 packages $
 * @package		packages
 * @copyright	Copyright Â© 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
// Your custom code here
global $mosConfig_live_site;

$Itemid = JRequest::getVar('Itemid','');
$user = JFactory::getUser();
$user_id = $user->id;
$cost = JRequest::getVar('cost','');
$url = 'http://camassistant.com/cms';
//$url = 'http://192.168.1.30/camassistant';
$paypalMail  = JRequest::getVar('pay_email','');
//$cost= '$99.99'; 
/*$payment_type	= JRequest::getVar('payment_type','');
if($payment_type == 'Paypal')
{
	$pay_currency	= JRequest::getVar('pay_currency','');
	$pay_name	= JRequest::getVar('pay_name','');
	$paypalMail  = JRequest::getVar('pay_email','');
}
else if($payment_type == 'Authorize')
{
	$Auth_key = JRequest::getVar('Auth_key','');
	$Auth_login_id = JRequest::getVar('Auth_login_id','');
}
*///$paypalMail='kvvipin@projectsinfo.net';
?>
<form action="https://www.sandbox.paypal.com"  name="paypalfrm" method="post" runat="server">
<input type="hidden" name="business" value="<?php echo $paypalMail;?>" runat="server">
<input type="hidden" name="cmd" value="_xclick" runat="server">
<input type="hidden" name="item_name" value="Vendor Registration Payment" runat="server"/>
<input type="hidden" name="no_note" value="1" runat="server">
<input type="hidden" name="amount" value="<?php echo $cost;?>" runat="server"/>
<input type="hidden" name="currency_code" value="<?php echo $pay_currency;?>" runat="server">
<input type="hidden" name="custom" value="Y" runat="server">
<input type="hidden" name="return" value="<?php echo $url;?>/index.php?option=com_camassistant&controller=vendors&task=vendor_billing_thankyou_form&user_id=<?PHP echo $user_id; ?>&Itemid=140&pack_cost=<?php echo $cost;?>"  runat="server" />
<input type="hidden" name="cancel_return" value="<?php echo $url;?>/index.php?option=com_camassistant&controller=vendors&task=vendor_billing_failed_form&user_id=<?PHP echo $user_id; ?>&Itemid=140&pack_cost=<?php echo $cost;?>"  runat="server" />
<input type="hidden" name="rm" value="2" id="rm" runat="server">
<input type="hidden" name="no_shipping" value="1" id="no_shipping" runat="server">
<input type="hidden"  name="lc" value="en" runat="server">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="100%" colspan="3" align="left">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="100%" colspan="3" align="left">&nbsp;</td>
              </tr>
                </table></td>
    </tr>
              <tr>
                <td colspan="3" align="left" class="border_01" style="padding:5px"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="" height="30" align="left" class="redfont"><?php echo "Thanks for Registering"; ?></td>
                    </tr>
					  <tr>
					    <td align="left" height="30"><?php echo "Please wait while forwarding to paypal......";?></td>
					  </tr>
					  <tr><td align="center" height="30"></td></tr>
					  </table></td></tr></table>
<script language="javascript">
document.paypalfrm.submit();
</script>
<input type="hidden" name="task" value="" />
<input type="hidden" name="option" value="com_camassistant" />
 </form>

