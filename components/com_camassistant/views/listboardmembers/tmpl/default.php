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
$Itemid = JRequest::getVar('Itemid','');
$usertype = JRequest::getVar('usertype','');


?>
<style>
#maskcb {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescb .windowcb {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescb #submitcb {width:556px;height:275px;padding:10px;background-color:#ffffff;}
#boxescb #submitcb a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}
#donecb {border:0 none;cursor:pointer;height:30px;margin-right:150px;padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecb {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}

#maskeb {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxeseb .windoweb {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#submiteb > p {padding-top: 31px;text-align: center;font-size:14px;}
#boxeseb #submiteb {width:478px;height:287px;padding:15px 13px 13px;background-color:#ffffff;}
#boxeseb #submiteb a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}

#maskeb_del {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxeseb_del .windoweb_del {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#submiteb > p {padding-top: 31px;text-align: center;font-size:14px;}
#boxeseb_del #submiteb_del {width:478px;height:175px;padding:15px 13px 13px;background-color:#ffffff;}
#boxeseb_del #submiteb_del a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}
.closeicons_popup {
  top: -31px !important;
  right:-22px !important;
}
.closeiconsnew_popup {
  top: -31px !important;
  right:-22px !important;
}

#maskcbd {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescbd .windowcbd {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescbd #submitcbd {width:556px;height:294px;padding:10px;background-color:#ffffff;}
#boxescbd #submitcbd a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;display:inline-block;}
#donecbd {border:0 none;cursor:pointer;height:30px;margin-right:150px;padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecbd {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}


#maskcbde {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescbde .windowcbde {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescbde #submitcbde {width:557px;height:204px;padding:10px;background-color:#ffffff;}
#boxescbde #submitcbde a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}
#donecbde {border:0 none;cursor:pointer;height:30px;margin-right:150px;padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecbde {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}

#maskvrecdoneee {  position:absolute;  left:0;  top:0;  z-index:9000;  background-color:#000;  display:none; }
#boxesvrecdoneee .windowvrecdoneee {  position:absolute;  left:0;  top:0;  width:1300px;  height:200px;  display:none;  z-index:9999;  padding:38px 10px 3px 10px;}
#boxesvrecdoneee #submitvrecdoneee {  width:515px;  height:215px;  padding:10px;  background-color:#ffffff;}
#boxesvrecdoneee #submitvrecdoneee a{ text-decoration:none; color:#000000; font-weight:bold; font-size:20px;}
#donevrecdoneee {border:0 none; cursor:pointer; height:30px; margin-left:-17px; margin-top:-29px; width:474px; float:left; }

</style>
<script type="text/javascript" src="components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript">
G(document).ready(function(){
G('.closeicons_popup').click(function (e) {	
			e.preventDefault();
		
			G('#maskcbde').hide();
			G('.windowcbde').hide();
		});
		G('.closeiconsnew_popup').click(function (e) {	
			e.preventDefault();
		
			G('#maskcb').hide();
			G('.windowcb').hide();
		});
		});
</script>
<script language="javascript" type="text/javascript">


function addclientpopup(){

G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskcb').css({'width':maskWidth,'height':maskHeight});
		G('#maskcb').fadeIn(100);
		G('#maskcb').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitcb").css('top',  winH/2-G("#submitcb").height()/2);
		G("#submitcb").css('left', winW/2-G("#submitcb").width()/2);
		G("#submitcb").fadeIn(2000);
		G('.windowcb #donecb').click(function (e) {
         var accept='yes';
	window.location="index.php?option=com_camassistant&controller=vendorscenter&task=promanagerinvitation&Itemid=151&accept="+accept+"";
		G('#cancelbiddingform').submit();
		e.preventDefault();
		G('#maskcb').hide();
		G('.windowcb').hide();
		});
		G('.windowcb #closecb').click(function (e) {
		var accept='no';
		window.location="index.php?option=com_camassistant&controller=boardmembers&task=addboardmember&Itemid=151&accept="+accept+"";
		
		e.preventDefault();
		G('#maskcb').hide();
		G('.windowcb').hide();
		});
}


function hidevendor()
{
vendorid = H(this).attr('rel');		
alert('can');
		
}

function property_unlink(pid,bid)
{

G('body,html').animate({
scrollTop: 250
},800);
	   
	   G(".hidden_pmanager").val(pid);
	   G(".hidden_bid").val(bid);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskeb').css({'width':maskWidth,'height':maskHeight});
		G('#maskeb').fadeIn(100);
		G('#maskeb').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submiteb").css('top',  winH/2-G("#submiteb").height()/2);
		G("#submiteb").css('left', winW/2-G("#submiteb").width()/2);
		G("#submiteb").fadeIn(2000);
		G('.windoweb #doneeb').click(function (e) {
		G('#unlink_property').submit();
		e.preventDefault();
		G('#maskeb').hide();
		G('.windoweb').hide();
		});
		G('.windoweb #closeeb').click(function (e) {
		e.preventDefault();
		G('#maskeb').hide();
		G('.windoweb').hide();
		
		});

}

function sendclientinvitation_register(pid,bid)

{
window.location.href = "index.php?option=com_camassistant&controller=vendorscenter&task=invitationtoregister&Itemid=216&pid="+pid+"&bid="+bid+"";
}
function delete_client(bid)
{
	G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskeb_del').css({'width':maskWidth,'height':maskHeight});
		G('#maskeb_del').fadeIn(100);
		G('#maskeb_del').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submiteb_del").css('top',  winH/2-G("#submiteb_del").height()/2);
		G("#submiteb_del").css('left', winW/2-G("#submiteb_del").width()/2);
		G("#submiteb_del").fadeIn(2000);
		G('.windoweb_del #doneeb_del').click(function (e) {
		window.location.href = 'index.php?option=com_camassistant&controller=boardmembers&task=deleteclient&Itemid=<?php echo $_REQUEST['Itemid']; ?>&bid='+bid;
			
		});
		G('.windoweb_del #closeeb_del').click(function (e) {
		e.preventDefault();
		G('#maskeb_del').hide();
		G('.windoweb_del').hide();
		});
		
		
}
function property_link(pid,bid,accountstatus)
{
if(accountstatus == 'Yes')
{
el="<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=getacountclients&pid="+pid+"&bid="+bid+"";
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 570, y:300}}"))
		SqueezeBox.fromElement(el,options);
}
else
{
G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskcbd').css({'width':maskWidth,'height':maskHeight});
		G('#maskcbd').fadeIn(100);
		G('#maskcbd').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitcbd").css('top',  winH/2-G("#submitcbd").height()/2);
		G("#submitcbd").css('left', winW/2-G("#submitcbd").width()/2);
		G("#submitcbd").fadeIn(2000);
		G('.findnoclient').click(function (e) {
		e.preventDefault();
		G('#maskcbd').hide();
		G('.windowcbd').hide();
       /* el="<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=findnoclient";
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:300}}"))
		SqueezeBox.fromElement(el,options);*/
		getclientfindpopup(pid,bid);
		});
		G('.cancelnoclient').click(function (e) {
		e.preventDefault();
		G('#maskcbd').hide();
		G('.windowcbd').hide();
	});
	G('.invitenoclient').click(function (e) {
	    
        window.location="index.php?option=com_camassistant&controller=vendorscenter&task=invitationtoregister&bid="+bid+"&pid="+pid+"&Itemid=216";
});
	
}

function getclientfindpopup(pid,bid)
{
G('body,html').animate({
		scrollTop: 250
		},800);
		
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskcbde').css({'width':maskWidth,'height':maskHeight});
		G('#maskcbde').fadeIn(100);
		G('#maskcbde').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitcbde").css('top',  winH/2-G("#submitcbde").height()/2);
		G("#submitcbde").css('left', winW/2-G("#submitcbde").width()/2);
		G("#submitcbde").fadeIn(2000);
		G('.check_email').click(function (e) {
         var email=G("#email").val();
		if(!email)
		{
		alert("please enter email");
		form.email.focus();
		return false;
		 }
		if(email)
		{
		G.post("index2.php?option=com_camassistant&controller=vendorscenter&task=checkpropertyowneraccount", {mailid: ""+email+""}, function(data){
				if(data == 1){
		
				e.preventDefault();
		       G('#maskcbde').hide();
		       G('.windowcbde').hide();
				acountclientpopup(pid,bid,email);
				
				}
				else
				{
				e.preventDefault();
		       G('#maskcbde').hide();
		       G('.windowcbde').hide();
		       noacountclientpopup(email,pid,bid);
				}
		});
		} 
		});
}


function acountclientpopup(pid,bid,email)
{

el="<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=vendorscenter&task=findnoclient&pid="+pid+"&bid="+bid+"&email="+email+"";
		var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 580, y:330}}"))
		SqueezeBox.fromElement(el,options);
}
function noacountclientpopup(email,pid,bid)
{
	
H = jQuery.noConflict();
	H('body,html').animate({
	scrollTop: 250
	},800);
	var maskHeight = 1500;
	H('.pmanageremail').val(email);
	var maskWidth = H(window).width();
	H('#maskvrecdoneee').css({'width':maskWidth,'height':maskHeight});
	H('#maskvrecdoneee').fadeIn(100);
	H('#maskvrecdoneee').fadeTo("slow",0.8);
	var winH = H(window).height();
	var winW = H(window).width();
	H("#submitvrecdoneee").css('top',  winH/2-H("#submitvrecdoneee").height()/2);
	H("#submitvrecdoneee").css('left', winW/2-H("#submitvrecdoneee").width()/2);
	
	H("#submitvrecdoneee").fadeIn(2000);
	H('.gobacknoclientpopup').click(function (e) {
	  e.preventDefault();
		H('#maskvrecdoneee').hide();
		H('.windowvrecdoneee').hide();
		getclientfindpopup(pid,bid);
	});
	H('.invitetoclientemail').click(function (e) {
	window.location.href = "index.php?option=com_camassistant&controller=vendorscenter&task=sendnewproownerinvitation&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid="+pid+"&email="+email+"";
	});
}

}
</script>
<script>
G = jQuery.noConflict();
G(document).ready( function(){
G('.property_owner').click(function(){
propertydata=G(this).attr('data').split('|');
if(!G(this).hasClass("active")){
getproperty(propertydata[0],propertydata[1], propertydata[2],propertydata[3],propertydata[4]);
G('.property_owner').removeClass('active');
G(this).addClass('active');
}
else{
getpropertyhide(propertydata[0]);
G(this).removeClass('active');

}
G('#proposaldetails_'+pid).removeClass('loader');
});
});
function getproperty(pid,useracount,accept,linkval,bid){
G = jQuery.noConflict();
G('#proposaldetails_'+pid).addClass('loader');
G.post("index2.php?option=com_camassistant&controller=boardmembers&task=getclientdetails", {pid: ""+pid+"", useracount: ""+useracount+"", accept: ""+accept+"" ,linkval: ""+linkval+"",bid: ""+bid+"" }, function(data){
if(data) {
G('#proposaldetails_'+pid).removeClass('loader');
G('.prop_details').slideUp();
G('.table_blue_rowdots_submitted').removeClass('active');
G('#table_blue_rowdots'+pid).addClass('active');
G('#proposaldetails_'+pid).html(data).slideDown('slow');
//G('#getproposals_'+rfpid).hide();
//G('#getproposalshide_'+rfpid).show();
G('#proposaldetails_'+pid).show();
}
else{
G('#proposaldetails_'+pid).removeClass('loader');
G('#proposaldetails_'+pid).html("No proposals for this RFP");
//G('#getproposals_'+rfpid).hide();
//G('#getproposalshide_'+rfpid).show();
}
		});
}
function getpropertyhide(pid){
//G('#getproposalshide_'+rfpid).hide();
//G('#getproposals_'+rfpid).show();
G('#proposaldetails_'+pid).slideUp('slow').html('');
G('.table_blue_rowdots_submitted').removeClass('active');
//G('#table_blue_rowdots'+rfpid).css('color','#636363');
}

function sortusers(){
	document.forms["newsortform"].submit();
}
</script>
<?PHP $user = JFactory::getUser();
   $managername = $user->name.'&nbsp;'.$user->lastname;
if(!$user->id){
echo "<span class='blueheads'>You need to login to access this page</span>";
}
else {
if($user->user_type == 11)
{ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else { 
 ?>

<div id="container_inner">
<div class="clear"></div>
<?php //$itemid= JRequest::getVar("Itemid",''); ?>
<form enctype="multipart/form-data" action="index.php?option=com_camassistant&controller=boardmembers&task=listboardmembers&Itemid=<?php echo $Itemid ?>" method="post" name="VendorForm2" >
<span style="margin-left:220px; float:right; display:none"><?php echo JHTML::_('select.genericlist', $this->propertyList, 'property_name','size="1" style="width:250px;" '.$disabled.' class="inputbox" '.$submit, 'value', 'text', $property_name);?></span>
<div id="i_bar">
<div id="i_bar_txt" style="text-align:center; padding-left:35px; font-size:14px;">
<?php /*?>modified by anand kumar 25-7-11<?php */?>
<?php $submit = 'onchange="document.VendorForm2.submit();"'; ?>
<?php $property_name = JRequest::getVar('property_name',''); ?>
<span><strong>MY CLIENTS</strong></span>
</div>
<div id="i_icon"><a href="index2.php?option=com_content&amp;view=article&amp;id=181&amp;Itemid=113" rel="{handler: 'iframe', size: {x: 680, y: 530}}" class="modal" title="Click here" style="text-decoration: none;"><img src="templates/camassistant_left/images/info_icon2.png"/> </a>
</div>
</div>
<?php /*?>modified by anand kumar 25-7-11<?php */?>
<?php /*?><div id="dotshead_blue">BOARD MEMBERS</div><?php */?>
<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="0" class="titleheadings_new">
  <tr class="table_green_row paddingbot">
  <?php
	$sort = JRequest::getVar('sort','');
	if($sort == 'asc' || $sort == ''){
	$sort = 'desc';
	$id = 'compliant_desc';
	}
	else{
	$sort = 'asc';
	$id = 'compliant_asc';
	}
	?>

  
   <td width="120" valign="middle" align="left" colspan="2" class="borederbot">NAME</td>
    <td width="200" valign="middle" align="center" class="borederbot">PROPERTY</td>
    <td width="100" valign="middle" align="center" class="borederbot">TITLE</td>
    <td width="100" valign="middle" align="center" class="borederbot">ACCOUNT?</td>
    <td width="100" valign="middle" align="center" class="borederbot">LINKED?</td>
	 
	 
     </tr>
	 
  </tr>
<?php 

//echo "<pre>"; print_r($this->boardmembers);exit;?>

   <?PHP
  for( $i=0; $i < count($this->boardmembers); $i++ )
  { 
   $row = $this->boardmembers[$i]; 
   if( $row->linkvalue == 'Yes'  )
   {
	   $db=&JFactory::getDBO();
	   $user = JFactory::getUser();
	   $sql1 = "SELECT name,lastname from #__users where id='".$row->propertyowner_id."' ";
	   $db->Setquery($sql1);
	   $propertyownerinfo = $db->loadObject();
	   $pownername = $propertyownerinfo->name.'&nbsp;'.$propertyownerinfo->lastname;
    }
    else{
    $pownername = $row->firstname.'&nbsp;'.$row->lastname;

    }
   $db=&JFactory::getDBO();	
   $propertyname = "SELECT property_name from #__cam_property where id='".$row->property_name."'";
   $db->Setquery( $propertyname );
   $propertyname = $db->loadResult();

  
?>
		  <tr class="table_blue_rowdots_submitted" id="table_blue_rowdots<?php echo $row->bid; ?>" >
           
			<td valign="middle" align="left" valign="middle" width="15">
			<a id="getpropertydetails_<?php echo $row->bid; ?>" class="property_owner" data="<?php echo $row->bid; ?>|<?php echo $row->account;?>| <?php echo $row->accept;?>| <?PHP echo $row->linkvalue; ?>|<?PHP echo $row->property_name; ?>" href="javascript:void(0);"></a>
             
			<td valign="middle" align="left" width="100"><?php echo  $pownername; ?></td>
	 		<td align="center" valign="left" width="200"><span><?php echo str_replace('_',' ',$propertyname); ?></span></td>
			
		 <td align="center" valign="middle" width="100"><span><?PHP echo ucfirst($row->board_position); ?>
		</td>
		  <td align="center" valign="middle" width="100"><span><?PHP echo $row->account; ?>
		</td>
	   		<td align="center" valign="middle" width="100" > <span><?PHP echo $row->linkvalue; ?></span></td></td>
</tr>
  </tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"><div id="proposaldetails_<?php echo $row->bid; ?>" class="prop_details" ></div></td></tr>
		<?php
 }
	?>
 <tr class="">
   <td align="center" valign="top"></td>
   <td align="left" valign="middle"></td>
   <td align="left" valign="top"></td>
   <td align="left" valign="top"></td>
   <td align="center" valign="middle"></td>
 </tr>


</table>
<div class="clear"></div>

</div>
</div>
<div class="client_add"><a id="addclientform" href="javascript:void(0);" onclick="addclientpopup()"></a></div>

</form>

</div> 
<div class="clear"></div>

<div id="add-vendor-new">
<div class="new-searchfilerts">
<div align="center" class="optional_filters">OPTIONAL FILTERS</div>
<form name="newsortform" id="newsortform" method="post">
<select onchange="javascript:sortusers();" style="width:330px;" name="usertype">
<option value="">All Clients</option>
<option value="uv" <?php if( $usertype == 'uv' ) echo 'selected="selected"';?> >Unregistered Clients</option>
<option value="rv" <?php if( $usertype == 'rv' ) echo 'selected="selected"';?>>Registered Clients</option>
</select>
<input type="hidden" name="option" value="com_camassistant" />
<input type="hidden" name="controller" value="boardmembers" />
<input type="hidden" name="task" value="listboardmembers" />
</form>
</div>
</div>
<div class="clear"></div>
<div id="i_bar_gray">
<div id="i_bar_terms_rfp">
<div id="i_bar_txt_terms_rfp">
<span> <font style="font-weight:bold; color:#FFF; font-size:14px;">INVITED CLIENTS</font></span>
</div></div>

</div>
<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellspacing="4" cellpadding="0" class="titleheadings">
  <tbody><tr class="table_green_row" style="text-transform:none;">
<td width="222" valign="middle" align="left">
<a id="<?php echo $id; ?>" href="index.php?option=com_camassistant&controller=boardmembers&task=listboardmembers&Itemid=151&sort=<?php echo $sort ; ?>&usertype=<?php echo $usertype; ?>">EMAIL ADDRESS</a>
</td>
<td width="91" valign="middle" align="center">SENT ON</td>
<td width="110" valign="middle" align="center">STATUS</td>
<td width="57" valign="middle" align="right">HIDE</td>
  </tr>
</tbody></table>
<table width="99%" cellspacing="4" cellpadding="0" style="margin:0px 4px">
<?php
$vendors = $this->vendors ;
//print_r($vendors);exit;
 for($i=0; $i<count($vendors); $i++){ 
 	if( $usertype == 'uv' ){
		if( $vendors[$i]->status == 'accepted' )
		$display = 'none';
		else
		$display = '';
	}
	if( $usertype == 'rv' ){
		if( $vendors[$i]->status != 'accepted' )
		$display = 'none';
		else
		$display = '';
	}
 ?>
<tr id="table_blue_rowdots345406" class="table_blue_rowdots" style="height:45px; display:<?php echo $display; ?>">
<td width="222" valign="middle" align="left" style="padding-top:1px;"><?php echo $vendors[$i]->email; ?></td>
<td width="91" valign="middle" align="center" style="padding-top:3px;"><?php 
$date_sent = explode(' ',$vendors[$i]->date);
$expdate = explode('-',$date_sent[0]);
echo $expdate[1].'/'.$expdate[2].'/'.$expdate[0]; ?></td>
<td width="110" valign="middle" align="center" style="padding-top:3px;">
<?php 
if($vendors[$i]->status == 'accepted'){
echo "Registered";
}
else{ ?>
Unregistered<br /><a class="resending_<?php echo $vendors[$i]->id; ?>" href="javascript:void(0);" onclick="resendinvitation('<?php echo $vendors[$i]->email; ?>',<?php echo $vendors[$i]->id; ?>);">(Resend Invite)</a>
<?php }
?></td>
<td width="57" valign="middle" align="right" style="padding-top:3px;">
<a title="Hide from list" class="hidevendor" href="javascript:void(0);" onclick="hidevendor()" rel="<?php echo $vendors[$i]->id; ?>-<?php echo $vendors[$i]->email; ?>"><img src="templates/camassistant_left/images/Hide.png" alt="delete" style="margin-right:6px;"></a>
</td>
</tr>
<?php } ?>

</table>
</div>
</div>

</div>
<?php } }?>


<div id="boxescb" style="top:576px; left:582px;">
<div id="submitcb" class="windowcb" style="top:300px; left:582px; border:6px solid rgb(143, 216, 0); position:fixed">
<a id="sbox-btn-close" href="#" class="closeiconsnew_popup" style="right:-32px; top:-20px;"></a>
<div id="i_bar_terms"  style="margin: 8px; background:#77b800; ">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">ADD A CLIENT</font></span>
</div></div>
<div style="padding: 19px 15px 2px 18px; text-align:center; font-size:15px; font-weight:normal;" >Do you want this client to register with a free MyVendorCenter account to improve collaboration?
</div>
<div id="topborder_row_endbidding"></div>
<div style="padding: 10px 26px 14px 25px; text-align:center; font-size:15px; font-weight:normal;">IMPORTANT: If YES, you will be able to allow this client to view your "My Vendors" list (Corporate Preferred for Master Account holders), approve requests, approve the awarding of projects, and more once they register.
</div>

<div style="padding-top:20px; text-align:center; padding-right:17px;">

<div id="closecb" name="closecb" value="Cancel"><a href="javascript:void(0);" class="noaddclientnew"></a></div>
<div id="donecb" name="donecb" value="Ok"><a href="javascript:void(0);" class="addclientnew"></a></div>

</div>
</div>
  <div id="maskcb"></div>
</div>

<div id="boxeseb" style="top:576px; left:582px;">
<div id="submiteb" class="windoweb" style="top:300px; left:582px; border:6px solid red; position:fixed">
<div id="i_bar_terms" style="background:none repeat scroll 0 0 red;">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px; margin-top:3px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">UNLINK WITH YOUR CLIENT</font></span>
</div></div>
<p>Are you sure you want to <strong>UNLINK</strong> this Property with your client's MyVendorCenter account?</p>
<div id="topborder_row_endbiddingss" style="margin-top:30px;"></div>
<div class="endbidding_text11" style="padding-top:10px;margin-bottom:2px;">IMPORTANT: If you click YES, your Client will no longer be able to collaborate with you on items related to this property through thier personal MyVendorCenter account. You can always LINK this Client and your Property again in the future.
</div>
<div style="text-align:center; width:250px; margin:0 auto; padding-top:24px;">
<form name="unlink_property" id="unlink_property" method="post">
<div id="closeeb" name="closeeb" value="Cancel" class="nodeletecancelcode"></div>
<div id="doneeb" name="doneeb" value="Ok" class="deletepreferredcode"></div>

<input type="hidden" value="com_camassistant" name="option" />
<input type="hidden" value="vendorscenter" name="controller" />
<input type="hidden" name="propertyid1"  class="hidden_pmanager" />
<input type="hidden" name="bid"  class="hidden_bid" />
<input type="hidden" value="unlink_property" name="task" />

</form>
</div>
</div>
  <div id="maskeb"></div>
</div>

<div id="boxeseb_del" style="top:576px; left:582px;">
<div id="submiteb_del" class="windoweb_del" style="top:300px; left:582px; border:6px solid red; position:fixed">
<div id="i_bar_terms" style="background:none repeat scroll 0 0 red;">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px; margin-top:3px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">DELETE CLIENT</font></span>
</div></div>
<div id="topborder_row_endbiddingss" style="margin-top:22px;"></div>
<div class="endbidding_text11" style="padding-top:10px;margin-bottom:2px; text-align:center;"><font color="gray">Are you sure you want to delete this Client?</font>
</div>
<div style="text-align:center; width:250px; margin:0 auto; padding-top:17px;">
<div id="closeeb_del" name="closeeb_del" value="Cancel" class="nodeletecancelcode"></div>
<div id="doneeb_del" name="doneeb_del" value="Ok" class="deletepreferredcode"></div>
</div>
</div>
  <div id="maskeb_del"></div>
</div>

<div id="boxescbd" style="top:576px; left:582px;">
<div id="submitcbd" class="windowcbd" style="top:300px; left:582px; border:6px solid rgb(143, 216, 0); position:fixed">
<div id="i_bar_terms"  style="margin: 8px; background:#77b800; ">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:800; color:#FFF;">LINK WITH YOUR CLIENT</font></span>
</div></div>
<div style="padding: 19px 15px 2px 18px; text-align:center; font-size:15px; font-weight:normal; color:#4d4d4d;  margin: 0 auto 27px; max-width: 496px;width:100%;" >
According to the Email Address you have listed for this client, our records show they are <strong>not</strong> currently registered with MyVendorCenter. You may click the INVITE button to send them a personal invitation to create a free account or click FIND to try and locate them under different email address
</div>
<div id="noclienttopborder"></div>

<div style="margin-top:38px; text-align:center; padding-right:17px; margin-left:34px;">
<table><tr>
<td>
<a class="cancelnoclient" href="javascript:void(0)"></a>
<a class="findnoclient" href="javascript:void(0)"></a>
<a class="invitenoclient" href="javascript:void(0)"></a>
</td></tr>
</table>
</div>
</div>
  <div id="maskcbd"></div>
</div>

<div id="boxescbde" style="top:576px; left:582px;">
<div id="submitcbde" class="windowcbde" style="top:300px; left:582px; border:6px solid #a1a1a1; position:fixed">
<a id="sbox-btn-close" href="#" class="closeicons_popup" style="right:-32px; top:-20px;"></a>
<div id="i_bar_terms"  style="margin: 8px; background:#a1a1a1; ">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">FIND YOUR CLIENT</font></span>
</div></div>
<div style="padding: 19px 15px 2px 18px; text-align:center; font-size:15px; font-weight:normal; color:#4d4d4d;" >To see if your Client is registered, please enter the primary email address associated with your Client's MYVendorCenter (Property Owner) Account
</div>
<div class="buttons_uninvite"  style="max-width: 365px; width: 100%; overflow: auto; margin: 10px auto 0px;">
<form action=""  method="post" name="reg_form" id='reg_form' enctype="multipart/form-data" style="padding:0; margin:0;">
<div class="check_clientemail">
<input type ="text" name ="email" id= "email" id="email" />

     <input type="hidden" name="option" value="com_camassistant" />
     </div>
		

</form>
<input type ="submit" class="check_email" value="ENTER" >
</div>

<div style="padding-top:20px; text-align:center; padding-right:17px;">

</div>
</div>
  <div id="maskcbde"></div>
</div>

<div id="boxesvrecdoneee" class="boxesvrecdoneee">
<div id="submitvrecdoneee" class="windowvrecdoneee" style="top:300px; left:60px; border:6px solid red; position:fixed;">
<div id="i_bar_terms"  style="background:#ff0000; margin-bottom:26px; margin-top:9px;">
<div id="i_bar_txt_terms" style="padding-top:10px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:800; color:#FFF;">ERROR</font></span>
</div></div>
<p align="center" style="color:#4d4d4d; font-size:14px;margin: 0 auto; max-width: 456px;width: 100%;">The Email you entered is not associated with any existing Property Owner account. You can click INVITE to ask your client to join or click BACK to try again.</p>
<div class="noclienterror">
 <div class="gobacknoclientpopup"></div>
<div class="invitetoclientemail"></div>
</div>
</div>
		
<div id="maskvrecdoneee"></div>
</div>




	

