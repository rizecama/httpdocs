<?php
error_reporting(0);
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
$county = JRequest::getVar('county','');
?>

<style>
#maskvrecdonee {  position:absolute;  left:0;  top:0;  z-index:9000;  background-color:#000;  display:none;}
#boxesvrecdonee .windowvrecdonee {  position:absolute;  left:0;  top:0;  width:1300px;  height:150px;  display:none;  z-index:9999;  padding:38px 10px 3px 10px;}
#boxesvrecdonee #submitvrecdonee {  width:434px;  height:132px;  padding:10px;  background-color:#dddddd;}
#boxesvrecdonee #submitvrecdonee a{ text-decoration:none; color:#000000; font-weight:bold; font-size:20px;}
#donevrecdonee {border:0 none; cursor:pointer; height:30px; margin-left:-17px; margin-top:-29px; width:474px; float:left; }
</style>
<script type="text/javascript">
G = jQuery.noConflict();
G(document).ready(function(){
G('.closeicons_popup').click(function (e) {	

			e.preventDefault();
			G('#maskcb').hide();
			G('.windowcb').hide();
		});
		});
</script>
<script type="text/javascript">
O = jQuery.noConflict();
function view()
{
	var chk = document.getElementsByName('chk1[]');
	var j = 0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	id =chk[i].value;
	}
	}
	if(j==0 || j>1){
  alert("Please select one property");
	}
	else {

	window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=view&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid='+id;
	}
}
function getpopuppics(pid){
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=addproperty&task=addpropertypic&pid='+pid;
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 500, y:350}}"))
SqueezeBox.fromElement(el,options);
}

function reasign()
{
	var chk = document.getElementsByName('chk1[]');
	var j = 0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	id =chk[i].value;
	}
	}
	if(j==0 || j>1){
  alert("Please select one property");
	}
	else {

	window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=reasign&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid='+id;

	}
}
function deleteproperty(id)
{
	
	
		//alert('hi');
		var maskHeight = O(document).height();
		var maskWidth = O(window).width();
		O('#maska').css({'width':maskWidth,'height':maskHeight});

		//transition effect
		O('#maska').fadeIn(100);
		O('#maska').fadeTo("slow",0.8);

		//Get the window height and width

		var winH = O(window).height();
		var winW = O(window).width();

		//Set the popup window to center
		O("#submita").css('top',  winH/2-O("#submita").height()/2);
		O("#submita").css('left', winW/2-O("#submita").width()/2);

		//transition effect
		O("#submita").fadeIn(2000);

		 //alert( e.preventDefault);

	//});

	O('.windowa #closea').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		O('#maska').hide();
		O('.windowa').hide();
	});
	//if done button is clicked
	O('.windowa #donea').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		O('#maska').hide();
		O('.windowa').hide();
		//document.signoutform.submit();
		//alert(id);
		window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=remove&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid='+id;
	});


//});
	//window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=remove&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid='+id;
	
}
function specific()
{	
	val = O('#customer').val();
	state = O('#stateid').val();
	county = O('#divcounty').val();
	window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=specific&Itemid=<?php echo $_REQUEST['Itemid']; ?>&cid='+val+'&county='+county+'&state='+state;
}

function county(val){
	var state = O("#stateid").val();
	O("#divStates").show();
		<?php if($county){ ?>
		var county = <?php echo $county; ?> ;
		<?php } else { ?>
		var county = '' ;
		<?php } ?>
		
	if(val){
		state = val ;
	}
	else{
		state = state ;
	}
		O.post("index2.php?option=com_camassistant&controller=addproperty&task=ajaxcounty_sorting&county="+county, {State: ""+state+""}, function(data){
			if(data.length >0) {
				O("#divcounty").html(data);
			}
		});
}

function property_unlink(pid)
{
G('body,html').animate({
scrollTop: 250
},800);
	   
	   G(".hidden_pmanager").val(pid);
		
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



function sendinvitation(pid)
{
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
		var email = G('#email').val();
		var property = G('#property').val();
		G(".hidden-pid").val(pid);
	if(!email)
		{
		geterrorpopup();
		return false;	
		}
	    var mail=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
       if(mail.test(email)==false)
        {
       alert("Please enter the valid email");
       return false;
         }
	if( !property )
		{
		alert('Please enter the property name'); 
		return false;	
		}

		else
		G('#pmanagerinvitation').submit();
		e.preventDefault();
		G('#maskcb').hide();
		G('.windowcb').hide();
	
	    });
		
		
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


function deleteownproperty(pid)
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
			window.location.href = 'index.php?option=com_camassistant&controller=addproperty&task=remove&Itemid=<?php echo $_REQUEST['Itemid']; ?>&pid='+pid;
		});
		G('.windoweb_del #closeeb_del').click(function (e) {
		e.preventDefault();
		G('#maskeb_del').hide();
		G('.windoweb_del').hide();
		});
		
		
}
</script>
<script language="javascript" type="text/javascript">
G = jQuery.noConflict();
G(document).ready( function(){
G('.property_manager_edit').click(function(){
propertydata=G(this).attr('data').split('|');
if(!G(this).hasClass("active")){
getproperty(propertydata[0],propertydata[1],propertydata[2]);
G('.property_manager_edit').removeClass('active');
G(this).addClass('active');
}
else{
getpropertyhide(propertydata[0]);
G(this).removeClass('active');

}
G('#proposaldetails_'+pid).removeClass('loader');
});
});
function getproperty(pid,plink,accept){
G = jQuery.noConflict();
G('#proposaldetails_'+pid).addClass('loader');
G.post("index2.php?option=com_camassistant&controller=addproperty&task=getpropertmanagerdetails", {pid: ""+pid+"", plink: ""+plink+"",accept: ""+accept+""}, function(data){
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
</script>

<style>
#maska {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxesa .windowa{position:absolute;left:0;top:0;width:400px;height:200px;display:none;z-index:9999;padding:20px;}
#boxesa #submita {width:400px;height:163px;padding:10px;background-color:#ffffff;}
#donea {border:0 none;cursor:pointer;height:30px;margin:0;padding:0;}
#closea {border:0 none;cursor:pointer;height:30px;margin:0;padding:0;}

#maskcb {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxescb .windowcb {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#boxescb #submitcb {width:541px;height:446px;padding:10px;background-color:#ffffff;}
#boxescb #submitcb a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}
#donecb {border:0 none;cursor:pointer;height:30px;/*margin-right:150px;*/padding:0; color:#000000; font-weight:bold; font-size:20px;}
#closecb {border:0 none;cursor:pointer;height:30px;margin-left:150px;padding:0;float:left;}

.closeicons_popup {
  top: -31px !important;
  right:-22px !important;
}
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


</style>
<?php
$user = JFactory::getUser();
$statelist = $this->statelist;
if(!$user->id){

echo "<span class='blueheads'>You need to login to access this page</span>";
}
else {
$usertype = $user->user_type;
if($usertype == '11'){ ?>
<div align="center" style="color:#0066FF; font-size:15px"> You are not authorized to view this page.</div>
<?php } else {

if ($usertype == '16') 
$display = 'none';
else
$display = '';

?>
<div align="center" style="margin-top:20px; display:<?php echo $display;?>; margin-top:<?php echo $displas;?>">
<span style="color:#7AB800; font-weight:bold; text-align:center; font-size:14px;">OPTIONAL FILTERS</span>
<form name="specificform" id="specificform" method="post" >
<table cellspacing="0" cellpadding="0">
<tbody><tr height="15"></tr>
<tr><td>
<?php if($usertype == '13'){  ?>
<select style="width: 360px;" name="cust" id="customer" onchange="javascript:specific()">
<option value="0">Filter By Manager</option>
<?php
for ($i=0; $i<count($this->custmers); $i++){
$custmers = $this->custmers[$i];
?>
<option value="<?php echo $custmers->id; ?>" <?php if($_REQUEST['cid']==$custmers->id) echo "selected";?>><?php echo $custmers->lastname.",".$custmers->name; ?> </option>
<?php }
echo "</select>"; } ?>
</td></tr>
<tr height="15"></tr>
<tr><td>
<select name="state" id="stateid" style="width:360px;" onchange="javascript:county('');">
<option value="">Filter By State</option>
<?php  foreach($statelist as $slist) {  ?>
<option value="<?php echo $slist->state_id; ?>" <?php if($_REQUEST['state']==$slist->state_id) echo "selected";?>><?php echo $slist->state_name; ?></option>
<?php } ?>
</select>
</td></tr>
<tr height="15"></tr>
<tr><td>
<div id="divStates" style="display:none">
<select name="state" style="width:360px;" id="divcounty" onchange="javascript:specific()"><option value="">Select County</option></select>
</div>
<?php 
if($_REQUEST['state']) { ?>
<script type="text/javascript">
county('<?php echo $_REQUEST['state'] ?>');
</script>
<?php }
?>
</td></tr>
</tbody></table>
</form>
</div>

<?php if($usertype == 16) 

?>
<div id="vender_right22">

<!-- sof bedcrumb -->
<!--<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125">Home</a></li><li><a href="#">Add or Edit Property</a> </li>
</ul>
</div>-->
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<!--<div id="dotshead_blue">ADD OR EDIT A PROPERTY </div>-->
<!-- eof dotshead -->


<div id="i_bar">
<div id="i_bar_txt" style="width:600px; color:#fff; text-align:center; margin-left:30px;"><strong>MY PROPERTIES</strong>
</div>
<div id="i_icon">
<?php  if ($user->user_type=='12') { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } else { ?>
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=79&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" /> </a>
<?php } ?>
</div>
</div>

<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="5" class="titleheadings">
  <tr class="table_green_row">
  
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
    <td width="10"  valign="middle" align="left" colspan="1" class="firsttd"><a id="<?php echo $id; ?>" href="index.php?option=com_camassistant&controller=addproperty&Itemid=75&sort=<?php echo $sort ; ?>">PROPERTY NAME</a></td>
    <td width="30" valign="middle" align="right">YOUR TITLE</td>
   
    <td width="30"  valign="middle" align="right">MANAGER</td>
	 <td width="30"  valign="middle" align="right">LINKED?</td>
   <?php /*?> <td width="200" valign="middle" align="center">OPTIONS</td><?php */?>
<?php /*?>    <td width="120" valign="top" align="center">Preview Proposals</td><?php */?>
  </tr>
  <?php //echo '<pre>'; print_r($this->properties);exit;?>
</table><?php if($this->properties){ ?>
<table cellpadding="0" cellspacing="0" width="99%" style="margin:0px 4px">
   <?PHP
  //echo '<pre>';print_r($this->properties);exit;
  for($i=0; $i < count($this->properties); $i++)
  { 
  $row = $this->properties[$i];
  
  $db=&JFactory::getDBO();
  $sql = "select link_value,user_id,boardmem_id FROM #__cam_propertyowner_link where property_id ='".$row->id."' AND propertyowner_id='".$user->id."'";
  $db->setQuery($sql);
  $link = $db->loadObject();
  if( $link->link_value == '1' )
  {
 
  $sql = "select name,lastname FROM #__users where id ='".$link->user_id."'";
  $db->setQuery($sql);
  $manager = $db->loadObject();
  $managername = $manager->name.'&nbsp;'.$manager->lastname;  
  }
  else
  $managername = 'None';
  
  if($link->link_value == '1' ) {
  $position = "select board_position FROM #__cam_board_mem where id='".$link->boardmem_id."'";
  $db->setQuery($position);
  $position = $db->loadResult();
  
  $link_value_color= "<span style='color:#7ab800'>Yes</span>";
  $link_value = "Yes";
 
  }
  else {
  $link_value_color = "<span style='color:#ff0000'>No</span>";
  $link_value = "No";
 $position = $row->boardposition;
   
  }
 
   
?>

		  <tr class="table_blue_rowdots_submitted" id="table_blue_rowdots<?php echo $row->id; ?>" >
           
			<td valign="middle" align="left" valign="middle" width="15">
			<a id="getpropertydetails_<?php echo $row->id; ?>" class="property_manager_edit" data="<?php echo $row->id; ?>|<?php echo $link_value; ?>|<?php echo $row->property_manager; ?>" href="javascript:void(0);"></a>
             
			
	 		<td align="left" valign="left" width="100"><span style="margin-left:0px;"><?php echo str_replace('_',' ',$row->property_name); ?></span></td>
			
		 <td align="center" valign="middle" width="100"><span style="margin-left:25px;"><?PHP echo ucfirst($position); ?>
		</td>
		  <td align="center" valign="middle" width="100"><span style="margin-right:-80px;"> <?PHP echo $managername; ?>
		</td>
	   		<td align="right" valign="middle" width="100" > <span style="margin-right:28px;"><?PHP echo $link_value_color; ?></span></td></td>
</tr>
  </tr>
  <tr><td colspan="8"></td></tr>
  <tr><td colspan="8"><div id="proposaldetails_<?php echo $row->id; ?>" class="prop_details" ></div></td></tr>
		<?php
		
} }
	?>
 <tr class="">
   <td align="center" valign="top"></td>
   <td align="left" valign="middle"></td>
   <td align="left" valign="top"></td>
   <td align="left" valign="top"></td>
   <td align="center" valign="middle"></td>
 </tr>


</table>
</div>
</div>

<?php } ?>
<!-- eof table pan -->
<div class="table_bottomlinks">
<?php /*?><ul>
<li style="background:none;"><a href="#" onclick="deleteproperty();" id="deleteproperty" >Remove Property</a> </li>
</ul><?php */?>
  <!--  <tfoot>
<table align="right"><tr><td colspan="9">
<?php //if(count($this->properties)>= $this->pagination->limit) { ?>
<?php //if($this->properties){ ?>
<?php if($_REQUEST['viewall']!='all'){ ?>
<a href="index.php?option=com_camassistant&controller=addproperty&viewall=all&Itemid=<?php echo $_REQUEST['Itemid'];?>&cid=<?php echo $_REQUEST['cid'];?>" ><img src="templates/camassistant_left/images/view_all.gif" border="0"/></a>
<?php } ?>
<?php if ($_REQUEST['viewall']=='all') { ?>
<a href="index.php?option=com_camassistant&controller=addproperty&Itemid=<?php echo $_REQUEST['Itemid'];?>&cid=<?php echo $_REQUEST['cid'];?>" ><img src="templates/camassistant_left/images/back1.gif" border="0" /></a>
<?php } //} }
?>
			<?php //echo $this->pagination->getPagesLinks(); ?>
</td></tr></table>
	</tfoot>-->
</div>
<div align="center"style="padding-top:6px;">
<?php if($user->user_type == 16) {  ?>
<a href="index.php?option=com_camassistant&controller=addproperty&task=proaddproperty&Itemid=<?php echo $_REQUEST['Itemid']; ?>" class="addpropertybutton">
</a>
<?php } else { ?>
<a href="index.php?option=com_camassistant&controller=addproperty&task=addproperty&Itemid=<?php echo $_REQUEST['Itemid']; ?>" class="addpropertybutton"></a>
<?php } ?>
<p style="height:100px;"></p>
</div>
</div>

<div id="boxesa">
<div id="submita" class="windowa" style="border:6px solid #609E00; position:fixed; text-align:center">
<form name="edit" id="edit" method="post">
<table width="100%" cellspacing="4" cellpadding="0">
  <tbody>
	 <tr><td>If you prefer to have another manager within your organization manage this property, you should NOT delete it.  You can reassign this property by clicking on the name of its current manager.  Are you sure you still want to delete this property?<br /><br /></td></tr>
	 <tr><td align="center"><table>
	 <tr>
	 <td align="left"><div id="closea" name="closea" value="Cancel" style="font-weight:bold;"><img src="templates/camassistant/images/No.gif" /></div></td>
	 <td width="100"><div id="donea" name="donea" value="Ok" style="font-weight:bold;"><img src="templates/camassistant/images/yes.gif" /></div></td>
	 </tr></table></td></tr>
	 </tbody></table>

</form>
</div>
  <div id="maska"></div>
</div>

<div id="boxeseb" style="top:576px; left:582px;">
<div id="submiteb" class="windoweb" style="top:300px; left:582px; border:6px solid red; position:fixed">
<div id="i_bar_terms" style="background:none repeat scroll 0 0 red;">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px; margin-top:3px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">UNLINK WITH YOUR CLIENT</font></span>
</div></div>
<p style= "font-weight:normal;">Are you sure you want to <strong>UNLINK</strong> this Property with your client's MyVendorCenter account?</p>
<div id="topborder_row_endbiddingss" style="margin-top:30px;"></div>
<div class="endbidding_text11" style="padding-top:10px;margin-bottom:2px;">
<p>IMPORTANT: If you click YES, your Client will no longer be able to collaborate with you on items related to this property through thier personal MyVendorCenter account. You can always LINK this Client and your Property again in the future.</p>
</div>
<div style="text-align:center; width:250px; margin:0 auto; padding-top:24px;">
<form name="unlink_property" id="unlink_property" method="post">
<div id="closeeb" name="closeeb" value="Cancel" class="nodeletecancelcode"></div>
<div id="doneeb" name="doneeb" value="Ok" class="deletepreferredcode"></div>

<input type="hidden" value="com_camassistant" name="option" />
<input type="hidden" value="addproperty" name="controller" />
<input type="hidden" name="propertyid1"  class="hidden_pmanager" />
<input type="hidden" value="unlink_propertymanager" name="task" />
</form>
</div>
</div>
  <div id="maskeb"></div>
</div>
<form name="pmanagerinvitation" id="pmanagerinvitation" method="post" >
<div id="boxescb" style="top:576px; left:582px;">

<div id="submitcb" class="windowcb" style="top:300px; left:582px; border:6px solid rgb(143, 216, 0); position:fixed">
<a id="sbox-btn-close" href="#" class="closeicons_popup"></a>
<div id="i_bar_terms"  style="margin: 9px 3px 3px;  background:#77b800; ">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">LINK WITH YOUR MANAGER</font></span>
</div></div>
<div  style="padding-top:21px; padding-left: 18px; text-align:center; margin-right:19px; font-size:15px ; color: #4c4c4c; font-weight:normal;" >Please enter your Manager's Email Address and the Name of your Property (i.e Community Name) below. Then click "INVITE" to send them a request to LINK your accounts
<!--<strong><span id ="property_newval"></span></strong>.-->	
</div>
<div calss="pmanager_newinvite">

<div class="email-div">
	<span style="padding-left:22px; padding-right:24px;">EMAIL</span><input class="int-mgr" type ="text"  id="email"  name="email" style="margin-left:11px;"/>
	</div>
	<div class="email-div1" style=" margin-bottom: 41px; margin-top: 25px;">
	<span style="font-size:13px;">PROPERTY <span class="propertynamebar"></span></span><input class="int-mgr" type ="text"  id="property"  name="property"/>
	</div>
	<input type="hidden" value="com_camassistant" name="option" />
   <input type="hidden" value="addproperty" name="controller" />
    <input type="hidden" value="sendmanger_link" name="task" />
    <input type="hidden" name="propertyid"  class="hidden-pid" />
</div>

<div id="topborder_row_endbidding" class="bdr-2"></div>
<div style="padding-top:7px; margin-right:13px; padding-left:11px; font-size:14px; color: #4c4c4c; font-weight:normal;">IMPORTANT:  Only your Manager is capable of LINKING properties. The notification they receive will instruct them to LINK you and your Property.  Once your Manager completes this process, you will receive an invitation you must ACCEPT within your account.
</div>

<div style="padding-top:20px; text-align:center;">
<div id="donecb" name="donecb" value="Ok"><a href="javascript:void(0);" class="requestmanager"></a></div>

</div>
</div>
  <div id="maskcb"></div>
</div>
</form>

 <div id="boxesvrecdonee" class="boxesvrecdonee">
<div id="submitvrecdonee" class="windowvrecdonee" style="top:300px; left:582px; border:6px solid red; position:fixed;">
<br/>
<p align="center" style="color:gray; font-size:14px;">Please enter your Manager email.</p>
<div class="recoommend_alert">
<div id="closevrecdonee" name="closeprecdonee" value="Cancel" class="ok_newone_recom_gray"></div>
</div>
</div>
<div id="maskvrecdonee"></div>
</div>
		

<div id="boxeseb_del" style="top:576px; left:582px;">
<div id="submiteb_del" class="windoweb_del" style="top:300px; left:582px; border:6px solid red; position:fixed">
<div id="i_bar_terms" style="background:none repeat scroll 0 0 red;">
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px; margin-top:3px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">DELETE PROPERTY</font></span>
</div></div>
<div id="topborder_row_endbiddingss" style="margin-top:22px;"></div>
<div class="endbidding_text11" style="padding-top:10px;margin-bottom:2px; text-align:center;"><font color="gray">Are you sure you want to DELETE this Property?</font>
</div>
<div style="text-align:center; width:250px; margin:0 auto; padding-top:17px;">
<div id="closeeb_del" name="closeeb_del" value="Cancel" class="nodeletecancelcode"></div>
<div id="doneeb_del" name="doneeb_del" value="Ok" class="deletepreferredcode"></div>
</div>
</div>
  <div id="maskeb_del"></div>
</div>

<?php } ?>
