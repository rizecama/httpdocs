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

//echo "<pre>"; print_r($this->details);
//echo '<pre>'; print_r($_REQUEST['Itemid']); exit;
$post = JRequest::get('get');
$Itemid = $post['Itemid'];
?>
<script type="text/javascript" src="<?php echo Juri::base(); ?>components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript">

function popup_proposal_summary2(rfp_id)
{

	window.open('index.php?option=com_camassistant&controller=vendors&task=vendor_awarded_proposals&rfp_id='+rfp_id,'_blank');
}

G = jQuery.noConflict();
function popup_proposal_summary(rfp_id)
{
window.location.href='zipdownloads/RFP'+rfp_id+'.zip';
}
function draft(rfp_id)
{
	window.location.href ="index.php?option=com_camassistant&controller=rfpcenter&task=copydraft&rfpid="+rfp_id+"&Itemid=<?php echo $_REQUEST['Itemid']; ?>";
}
function getapplepopup(rfpid,vendorid){
G.post("index2.php?option=com_camassistant&controller=rfpcenter&task=checkapples", {rfpid: ""+rfpid+""}, function(data){
if(data != 'given') {
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=rfpcenter&task=getapplebox&rfpid='+rfpid+'&vendorid='+vendorid+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 700, y:570}}"))
SqueezeBox.fromElement(el,options);
}
else{
alert("You have already given rating to this vendor.");
}
});

}
function popup_proposal_summary36(rfp_id,bid)
{
	var chk = document.getElementsByName('cid[]');
	var rfp_id=rfp_id;
	var bid=bid;
	if(bid!=0){
	G.post("index2.php?option=com_camassistant&controller=rfp&task=keypath&tmpl=component", {rfpid: ""+rfp_id+""}, function(data){

if(data.length >0) {
window.location.href='<?php echo Juri::root(); ?>zipcron.php?directtozip='+data+'&rfpid='+rfp_id+'';
}
});
} else {
alert('There are no Proposals submitted for this RFP.\n We are unable to generate the Zip File.');
}
}
function getapplepopup_edit(rfpid,id,vendorid){
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=rfpcenter&task=getapplebox&type=edit&rfpid='+rfpid+'&id='+id+'&vendorid='+vendorid+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 700, y:570}}"))
SqueezeBox.fromElement(el,options);
}

</script>
<script type="text/javascript">
G = jQuery.noConflict();
G(document).ready( function(){
G(".rfp_<?php echo $_REQUEST['type']; ?>").addClass('active');

G('.proposal_opener').click(function(){
rfpdata=G(this).attr('data').split('|');
if(!G(this).hasClass("active")){
if(rfpdata[2] == 'yes') {
	getclosedproposals(rfpdata[0],rfpdata[1],rfpdata[2]);
	} else {
	getclosedproposals(rfpdata[0],rfpdata[1],'');
	}
G('.proposal_opener').removeClass('active');
G(this).addClass('active');
}else{
getproposalshide(rfpdata[0]);
G(this).removeClass('active');

}
//G('#proposaldetails_'+rfpid).removeClass('loader');

});
});

function getclosedproposals(rfpid,rfpname,only){
G = jQuery.noConflict();
G('#proposaldetails_'+rfpid).addClass('loader');
G.post("index2.php?option=com_camassistant&controller=rfpcenter&task=getawardedproposals&from="+only+"", {rfpid: ""+rfpid+"", rfpname: ""+rfpname+""}, function(data){
if(data) {
G('#proposaldetails_'+rfpid).removeClass('loader');
G('.prop_details').slideUp();
G('.table_blue_rowdots_submitted').removeClass('active');
G('#table_blue_rowdots'+rfpid).addClass('active');
G('#proposaldetails_'+rfpid).html(data).slideDown('slow');
//G('#getproposals_'+rfpid).hide();
//G('#getproposalshide_'+rfpid).show();
G('#proposaldetails_'+rfpid).show();
}
else{
G('#proposaldetails_'+rfpid).removeClass('loader');
G('#proposaldetails_'+rfpid).html("No proposals for this RFP");
//G('#getproposals_'+rfpid).hide();
//G('#getproposalshide_'+rfpid).show();
}
		});
}

function getproposalshide(rfpid){
//G('#getproposalshide_'+rfpid).hide();
//G('#getproposals_'+rfpid).show();
G('#proposaldetails_'+rfpid).slideUp('slow').html('');
G('.table_blue_rowdots_submitted').removeClass('active');
//G('#table_blue_rowdots'+rfpid).css('color','#636363');
}


function contactsupport(rfpname){
		G('body,html').animate({
		scrollTop: 250
		},800);
		G('#submitteremail').val(rfpname);
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();
		G('#maskfb').css({'width':maskWidth,'height':maskHeight});
		G('#maskfb').fadeIn(100);
		G('#maskfb').fadeTo("slow",0.8);
		var winH = G(window).height();
		var winW = G(window).width();
		G("#submitfb").css('top',  winH/2-G("#submitfb").height()/2);
		G("#submitfb").css('left', winW/2-G("#submitfb").width()/2);
		G("#submitfb").fadeIn(2000);
		G('.windowfb #donefb').click(function (e) {
		G('#contactsupportform').submit();
		e.preventDefault();
		G('#maskfb').hide();
		G('.windowfb').hide();
		});
	 	G('.windowfb #closefb').click(function (e) {
		e.preventDefault();
		G('#maskfb').hide();
		G('.windowfb').hide();
		});
}
function getbasiccompliance(vendorid,status){
var el ='index.php?option=com_camassistant&controller=vendorscenter&task=preferredcompliance&vendorid=&vendorid='+vendorid+'&status='+status+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:700}}"))
SqueezeBox.fromElement(el,options);
G("#sbox-window").addClass("newclasssate");	
}

function getbasiccompliance_null(vendorid){
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=rfpcenter&task=getcompliance_null&vendorid='+vendorid+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:210}}"))
SqueezeBox.fromElement(el,options);
}

function unverified(vendorid,type){
if(type == 'unverified')
var height = '290';
else
var height = '230';
var el ='index.php?option=com_camassistant&controller=rfpcenter&task=vendortype&vendorid='+vendorid+'&type='+type;
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:"+height+"}}"))
SqueezeBox.fromElement(el,options);
}
function getcompliancestate(rfpid,vendorid,custid,status){
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=rfp&task=getcompliance_active&from=active&rfpid='+rfpid+'&custid='+custid+'&vendorid='+vendorid+'&status='+status+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:700}}"))
SqueezeBox.fromElement(el,options);
G("#sbox-window").addClass("newclasssate");	
}

function getcompliancestate_null(rfpid,vendorid,custid){
el='<?php  echo Juri::base(); ?>index.php?option=com_camassistant&controller=rfpcenter&task=getcompliance_null&rfpid='+rfpid+'&custid='+custid+'&vendorid='+vendorid+'';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 650, y:210}}"))
SqueezeBox.fromElement(el,options);
}

</script>
<style>
#maskfb {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}

#boxesfb .windowfb {
  position:absolute;
  left:0;
  top:0;
  width:350px;
  height:150px;
  display:none;
  z-index:9999;
  padding:20px;
}


#boxesfb #submitfb {
  width:426px;
  height:320px;
  padding:10px;
  background-color:#ffffff;
}
#boxesfb #submitfb a{
 text-decoration:none;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}
#donefb {
border:0 none;
cursor:pointer;
height:30px;
margin-left:80px;
padding:0;
float:left;
}
#closefb {
border:0 none;
cursor:pointer;
height:30px;
margin-right:65px;
padding:0;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}

</style>
<div id="boxesfb" style="top:576px; left:582px;">
<div id="submitfb" class="windowfb" style="top:300px; left:582px; position:fixed; border:4px solid #8FD800;">
	<form method="post" name="contactsupportform" id="contactsupportform">
	<div style="padding-top:10px; text-align:left">
	<dl>
	<dt><label for="submitter_name">Subject</label></dt>
	<dd><input type="text" value="" id="submitteremail" name="subject" style="width:250px" readonly="readonly" /> </dd>
	<dt><label for="feedback">Your Request</label></dt>
	<dd><textarea name="supportbody" id="supportbody" style="height:150px; width:350px"></textarea></dd>
	</dl>
	</div>
	<div style="padding-top:20px; text-align:center;">
	<input type="hidden" value="com_camassistant" name="option">
	<input type="hidden" value="rfpcenter" name="controller">
	<input type="hidden" value="sendrequest" name="task">
	<div id="donefb" name="donefb" value="Ok"><img src="templates/camassistant/images/send-request.gif" class="yesimage" /></div>
	<div id="closefb" name="closefb" value="Cancel"><img src="templates/camassistant/images/No.gif" class="yesimage" /></div>
	</form>
</div>
</div>
  <div id="maskfb"></div>
</div>
<?php
$user = JFactory::getUser();
if($user->user_type == 11)
{ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else { ?>
<?php
if($_REQUEST['rated'] == 'yes'){
$class = "class='active'" ;
}  else{
$class1 = "class='active'" ;
}
?>
<ul class="addednum_bread">
<li class="first"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=unsubmittedrfp&Itemid=88">DRAFTS</a></li>
<li><a href="index.php?option=com_camassistant&controller=rfpcenter&task=submitedrfp&type=rfp&Itemid=87" class="rfp_rfp">ACTIVE</a></li>
<li><a href="index.php?option=com_camassistant&controller=rfpcenter&task=closedrfp&Itemid=89" class="rfp_end">ENDED</a></li>
<li><a href="index.php?option=com_camassistant&controller=rfpcenter&task=awardrfp&Itemid=123" <?php echo $class1; ?>>AWARDED</a></li>
<li><a href="index.php?option=com_camassistant&controller=rfpcenter&task=awardrfp&rated=yes&Itemid=123" <?php echo $class; ?>>AWARDED & RATED</a></li>
<li><a href="index.php?option=com_camassistant&controller=rfpcenter&task=unawardrfp&Itemid=124" class="rfp_cancel">CANCELED</a></li>
</ul>
<p class="topalign"></p>
<div id="i_bar">
<div id="i_icon"><?php

if ($user->user_type=='12') { ?>

<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=135&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } else { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=134&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } ?></div>

<div id="i_bar_txt">
<span>
<?php if($_REQUEST['rated'] == 'yes'){ echo "<font style='font-weight:bold;'>&nbsp;&nbsp;STEP 5 of 5: AWARDED & RATED</font> (Process Complete)"; } else { echo "<font style='font-weight:bold;'>&nbsp;&nbsp;STEP 4 of 5: AWARDED </font>(Awaiting Vendor Rating)"; } ?>
</span>
</div></div>


<div class="table_pannel">
<div class="table_panneldiv">
  <table width="100%" cellpadding="0" cellspacing="4" class="titleheadings">
  <tr class="table_green_row">
   <td width="80"  valign="middle" align="center" colspan="1" class="firsttd">RFP#</td>
    <td width="222" valign="middle" align="center">PROPERTY NAME</td>
    <td width="270" valign="middle" align="center">PROJECT NAME</td>
   <?php /*?> <td width="120"  valign="middle" align="center">AWARDED DATE</td>
	<td width="120"  valign="middle" align="center">AWARDED TO</td><?php */?>
    <td width="130" valign="middle" align="center">AWARD AMOUNT</td>

  </tr></table><?php if($this->details4){ ?>
<table cellpadding="0" cellspacing="0" width="99%" style="margin:0px 4px">

  	<?php
	$k = 0;
	foreach ($this->details4 as $row) :
	//for ($i=0, $n=count( $this->details ); $i < $n; $i++)
	//{
		//$row = &$this->details[$i];
       //echo "<pre>"; print_r($row);
		//$link 	= JRoute::_( 'index.php?option=com_camassistant&controller=category_detail&task=edit&cid[]='. $row->id );

		//$checked 	= JHTML::_('grid.checkedout',   $row, $i );
		//$published 	= JHTML::_('grid.published', $row, $i );
//echo "<pre>"; print_r($row);
		$db =& JFactory::getDBO();
		 $query ="SELECT proposal_total_price FROM #__cam_vendor_proposals WHERE rfpno=".$row->id." and proposaltype='Awarded'";
		$db->setQuery( $query );
		if($row->id == '550494'){
		$cost = $db->loadObjectList();
		}
		else{
		$data4 = $db->loadResult();
		}
		//print_r($data4);
		 $query_a ="SELECT proposedvendorid FROM #__cam_vendor_proposals WHERE rfpno=".$row->id." and proposaltype='Awarded'";
		$db->setQuery( $query_a );
		$vid = $db->loadResult();

		 $query_c ="SELECT company_name FROM #__cam_vendor_company WHERE user_id=".$vid."";
		$db->setQuery( $query_c );
		$vcname = $db->loadResult();

                 $query_o ="SELECT awarded_vendor FROM #__cam_outsidevendor WHERE rfpid =".$row->id."";
		$db->setQuery( $query_o );
		$outname = $db->loadResult();

		?>
		<?php
	if( $row->jobtype == 'yes' )
		$job = 'basic';
	else
		$job = '';	
	?>
		  <tr class="table_blue_rowdots_submitted" id="table_blue_rowdots<?php echo $row->id; ?>" >

			<td width="15" valign="middle" align="center">
			<a id="getproposals_<?php echo $row->id; ?>" class="proposal_opener" data="<?php echo $row->id; ?>|<?php echo $row->projectName; ?>|<?php echo $_REQUEST['rated']; ?>" href="javascript:void(0);"></a>
			</td>
			<td valign="middle" align="center" valign="middle" width="15"><?php echo $row->id; ?></td>
	 		<td align="center" valign="middle" width="270"><?php echo str_replace('_',' ',$row->property_name); ?></td>
			<td align="center" valign="middle" width="270">
			<a class="joblinkhomepage" href="index.php?option=com_camassistant&controller=rfp&task=reviewrfp&rfpid=<?php echo $row->id; ?>&var=view&job=<?php echo $job; ?>&Itemid=87"><?php echo $row->projectName; ?></a></td>
			<?php if($row->id == '550494'){
		$db= JFactory::getDBO();
		$query = "SELECT U.company_name FROM #__cam_vendor_proposals as V, #__cam_vendor_company as U WHERE V.rfpno=".$row->id." and V.proposedvendorid = U.user_id and V.proposaltype = 'Awarded'";
		$db->setQuery($query);
		$a_prs = $db->loadObjectList();
		$vcname = $a_prs[0]->company_name .', '.$a_prs[1]->company_name;
			}?>

			<?php if($row->id == '550494'){  ?>
			<?php /*?><td align="center" valign="top"><?php echo $vcname;  ?></td><?php */?> <?php } else {?>
			<?php /*?><td align="center" valign="top"><?php if($data4=='') { echo $outname; echo '(O)'; } else { echo $vcname; }//if($data4==''){ echo 'Outside vendor'; } else { echo 'Inside vendor'; } ?></td><?php */?>
			<?php } ?>

    		 <?php if($row->id == '550494'){ ?>
			<td align="center" valign="middle"><?php echo "$".$cost[0]->proposal_total_price .', $'.$cost[1]->proposal_total_price; //if($data4==''){ echo 'Outside vendor'; } else { echo 'Inside vendor'; } ?></td>
			<?php } else {?>


			 <td align="center" valign="middle" width="160">
			<?php if($data4==''){
			$decimal = explode('.', $row->amount);
			if($decimal[1] == ''){
			$decimal = '.00';
			}
			else{
			$decimal = '';
			}
			echo "$".number_format($row->amount,2).$decimal;
			 }
			else {
			$decimal4 = explode('.', $data4);
			if($decimal4[1] == ''){
			$decimal = '.00';
			}
			else{
			$decimal = '';
			}
			echo "$".number_format($data4,2).$decimal;
			 }

			 ?></td>
<?php } ?>
			<?php /*?><td align="center" valign="middle"><a href="index.php?option=com_camassistant&amp;controller=showrfp&amp;task=showrfp&amp;rfpid=<?php echo $row->id; ?>&amp;Itemid=<?php echo $Itemid; ?>">PREVIEW</a></td><?php */?>



  </tr>
  </tr>
  <tr><td colspan="6"><div id="proposaldetails_<?php echo $row->id; ?>" class="prop_details" ></div></td></tr>
		<?php
		$k = 1 - $k;
		endforeach;
	//}
	?>

</table>
<?php JHTML::_('behavior.modal'); ?>
<div class="table_bottomlinks">
<ul style="display:none">
<!--<li style="background: none repeat scroll 0% 0% transparent;"><a href="#" onclick="popup_proposal_summary1();">View Proposals</a></li>--> <!-- anil_23-08-2011 -->
<li style="background: none repeat scroll 0% 0% transparent;"><a href="#" onclick="popup_proposal_summary1();">View Proposals</a></li>
<li><a href="javascript:popup_proposal_summary()">Download Proposals</a></li>
<li><a href="#" onclick="draft();">Copy As A New (Draft) RFP</a> </li>
</ul>
</div>
<div class="clear"></div>

<?php } else if($_REQUEST['rated']=='yes'){ ?>
<div align="center" style="margin-top:10px; font-weight:bold;">You have NOT rated any of your Awarded Vendors</div>
<?php } else { ?>
<div align="center" style="margin-top:10px; font-weight:bold;">You don't have any awarded requests</div>
<?php } ?></div>
</div>
<?php if(count($this->details4) >= $this->pagination4->limit) { ?>
<?php if($this->details4){ ?>
<?php if($_REQUEST['viewall']!='all'){ ?>
<div class="viewallbuttons_loc"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=awardrfp&viewall=all&Itemid=<?php echo $_REQUEST['Itemid'];?>" ><img src="templates/camassistant_left/images/view_all.gif" border="0"/></a></div>
<?php } ?>
<?php if ($_REQUEST['viewall']=='all') { ?>
<div class="viewallbuttons_loc"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=awardrfp&Itemid=<?php echo $_REQUEST['Itemid'];?>" ><img src="templates/camassistant_left/images/back1.gif" border="0" /></a></div>
<?php } } } ?>
<div style="float:right;">
<?php //echo $this->pagination4->getPagesLinks( ); ?>
	<?php //echo $this->pagination1->getLimitBox( ); ?>
	<?php //echo $this->pagination4->getResultsCounter(); ?>
	</div>
	</div>
<?php } ?>