<?php
/**
 * @version		1.0.0 camsignup $
 * @package		camsignup
 * @copyright	Copyright � 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		anand kumar
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal');


?>
<style>
#maskvrecdonee {  position:absolute;  left:0;  top:0;  z-index:9000;  background-color:#000;  display:none;}
#boxesvrecdonee .windowvrecdonee {  position:absolute;  left:0;  top:0;  width:1300px;  height:150px;  display:none;  z-index:9999;  padding:38px 10px 3px 10px;}
#boxesvrecdonee #submitvrecdonee {  width:434px;  height:158px;  padding:10px;  background-color:#ffffff;}
#boxesvrecdonee #submitvrecdonee a{ text-decoration:none; color:#000000; font-weight:bold; font-size:20px;}
#donevrecdonee {border:0 none; cursor:pointer; height:30px; margin-left:-17px; margin-top:-29px; width:474px; float:left; }
</style>

<script type="text/javascript" >
G = jQuery.noConflict();
function submitform12()
{
var form = document.reg_form.view.value;
var email=G("#email").val();
if(!email)
{
alert("please enter email");
form.email.focus();
return false;
 }
var mail=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
if(mail.test(email)==false)
		 {
		 alert("Please enter a proper email address.");
		 form.email.focus();
		 return false;
		 }
		if(email)
         {
 G.post("index2.php?option=com_camassistant&controller=propertymanager&task=usercheck", {mailid: ""+email+""}, function(data){
		if(data == 1){
		geterrorpopup();
		}
		 else
		 {
		 document.reg_form.view.value='propertymanager';
			document.reg_form.submit();
		 }
 });
 } 

		
}
function geterrorpopup(){

H = jQuery.noConflict();
	H('body,html').animate({
	scrollTop: 250
	},800);
	var maskHeight = H(document).height();
	var maskWidth = H(window).width();
	H('#maskvrecdonee').css({'width':maskWidth,'height':maskHeight});
	H('#maskvrecdonee').fadeIn(100);
	H('#maskvrecdonee').fadeTo("slow",0.8);
	var winH = H(window).height();
	var winW = H(window).width();
	H("#submitvrecdonee").css('top',  winH/2-H("#submitvrecdonee").height()/2);
	H("#submitvrecdonee").css('left', winW/2-H("#submitvrecdonee").width()/2);
	
	H("#submitvrecdonee").fadeIn(2000);
	H('.windowvrecdonee #closevrecdonee').click(function (e) {
		e.preventDefault();
		H('#maskvrecdonee').hide();
		H('.windowvrecdonee').hide();
	});
}	


</script>

<div id="container_right_campmanager">
<div class="email_begin">Enter your email to begin! </div>
<div id="signup-forms">

<div class="signup" >

<form action=""  method="post" name="reg_form" enctype="multipart/form-data" style="padding:0; margin:0;">
<div class="signup">
<div class="text_enter">
<input type="text" id="email" class= "email" name="email" value=""/>
<img src="templates/camassistant_inner/images/login-button.png">
</div>
<p class="ptext">Note: Your email address will become your username.</p><br/>
<div>
 <a href="javascript: submitform12()" class="review_submitvendorspres"></a></div>
 <div class="clear"></div>
 
 <div id="boxesvrecdonee" class="boxesvrecdonee">
<div id="submitvrecdonee" class="windowvrecdonee" style="top:300px; left:582px; border:6px solid red; position:fixed;">
<br/>
<p align="center" style="color:gray; font-size:14px;">The email you entered has already been registered with another account. Please use a different email address or contact support at support@myvendorcenter.com to have this resolved.</p>
<div class="recoommend_alert">
<div id="closevrecdonee" name="closeprecdonee" value="Cancel" class="ok_newone_recom_gray"></div>
</div>
</div>
<div id="maskvrecdonee"></div>
</div>
		
		<input type="hidden" name="option" value="com_camassistant" />
		<input type="hidden" name="controller" value="propertymanager" />
		<input type="hidden" name="view" value="propertymanager" />
		<input type="hidden" name="task" value="submit_email" />
		<input type="hidden" name="Itemid" value="105" />	
		<input type="hidden" id="from" name="from" value="<?php echo JRequest::getVar("from",''); ?>" />
</form>


</div>
</div>
<div class="clear"></div>
</div>
