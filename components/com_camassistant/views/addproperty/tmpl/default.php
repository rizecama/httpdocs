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
#maskeb {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
#boxeseb .windoweb {position:absolute;left:0;top:0;width:350px;height:150px;display:none;z-index:9999;padding:20px;}
#submiteb > p {padding-top: 7px;text-align: center;font-size:14px;}
#boxeseb #submiteb {width:467px;height:186px;padding:15px 13px 13px;background-color:#ffffff;}
#boxeseb #submiteb a{text-decoration:none;color:#000000;font-weight:bold;font-size:20px;}

</style>
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
		O.post("index2.php?option=com_camassistant&controller=addproperty&task=checkopenrfps", {pid: ""+id+""}, function(data){
			if(data == 1)
			rfperrorpopup();
			else
			deleteuserproperty(id);
		});

}
function deleteuserproperty(id)
{
	
		var maskHeight = O(document).height();
		var maskWidth = O(window).width();
		O('#maska').css({'width':maskWidth,'height':maskHeight});
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

function rfperrorpopup(){
G('body,html').animate({
scrollTop: 250
},800);
		
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
		e.preventDefault();
		G('#maskeb').hide();
		G('.windoweb').hide();
		});
	
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
</script>
<style>
#maska {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}

#boxesa .windowa{
  position:absolute;
  left:0;
  top:0;
  width:400px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}


#boxesa #submita {
   width:400px;
  height:163px;
  padding:10px;
  background-color:#ffffff;
}
#donea {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
}
#closea {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
}
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
?>
<div align="center" style="margin-top:20px;">
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

<div style="margin-top:16px;">
</div>
<br /><div id="vender_right">

<!-- sof bedcrumb -->
<!--<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125">Home</a></li><li><a href="#">Add or Edit Property</a> </li>
</ul>
</div>--><br/>
<!-- eof bedcrumb -->

<!-- sof dotshead -->
<!--<div id="dotshead_blue">ADD OR EDIT A PROPERTY </div>-->
<!-- eof dotshead -->


<p style="height:10px;"></p>
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

<!-- sof table pan -->
<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4" class="vendortable">
  <tr class="vendorfirsttr">
    
	
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
	
    <td width="167" align="left" valign="middle">
	<a id="<?php echo $id; ?>" href="index.php?option=com_camassistant&controller=addproperty&Itemid=75&sort=<?php echo $sort ; ?>">PROPERTY NAME</a></td>
    <td width="203" align="center" valign="middle">ADDRESS</td>
    <?php //if($user->user_type=='13'|| $user->dmanager == 'yes'){ ?>
    <td width="123" align="center" valign="middle">MANAGER</td>
    <?php //} ?>
	<td width="62" align="center" valign="middle">DELETE</td>
  </tr>


  <?php
for ($i=0; $i<count($this->properties); $i++){
$properties = $this->properties[$i];


?>
<tr class="table_blue_rowdots">
    
    <td align="left" valign="middle">
	<a href="index.php?option=com_camassistant&controller=addproperty&task=view&Itemid=75&pid=<?php echo $properties->id; ?>">
	<?php 
		if( $properties->property_name_origin == '' )
			$propertyname = str_replace('_',' ',$properties->property_name);
		else
			$propertyname = $properties->property_name_origin;
				
	    echo $propertyname; ?>
	</td>
    <td align="center" valign="middle"><?php echo $properties->street; ?><br /><?php echo $properties->city; ?>, <?php echo strtoupper($properties->state); ?>&nbsp;<?php echo $properties->zip; ?></td>
    <?php if($user->user_type=='13' || $user->dmanager == 'yes'){ ?>
    <td align="center" valign="middle">
	<a rel="{handler: 'iframe', size: {x: 500, y: 300}}" title="Re-Assign The Property" class="modal" href="index.php?option=com_camassistant&controller=addproperty&task=reasign&pid=<?php echo $properties->id; ?>&from=popup"><?php echo $properties->lastname.",&nbsp;".$properties->name;?></a></td>
      <?php } else { ?>
	  <td align="center" valign="middle">
	  <?php echo $properties->lastname.",&nbsp;".$properties->name;  ?>
	  </td>
	  <?php 
	  }
	  ?>
	  <td width="62" align="center" valign="middle"><a href="javascript:void(0);" onclick="deleteproperty(<?php echo $properties->id; ?>)"><img style="cursor:pointer;" alt="delete" src="templates/camassistant_left/images/red.png"></a>
	  <?php /*?><input type="radio" value='<?php echo $properties->id; ?>' name="chk1[]" id="chk1[]" /><?php */?></td>
  </tr>
 <?php
}
?>
<tr class="table_blue_rowd">
   <td width="62" align="center" valign="top">&nbsp;</td>
   <td align="center" valign="top">&nbsp;</td>
   <td align="center" valign="top">&nbsp;</td>
   <?php if($user->user_type=='13' || $user->dmanager == 'yes'){ ?>
   <td align="center" valign="middle">&nbsp;</td>
   <?php } ?>
   
</tr>

</table>
</div>
</div>
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
<a href="index.php?option=com_camassistant&controller=addproperty&task=addproperty&Itemid=<?php echo $_REQUEST['Itemid']; ?>">
<img src="templates/camassistant_left/images/addaproperty.gif" alt="add a property" width="169" height="49" align="center" style="padding:0px;" />
</a>
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
<div id="i_bar_txt_terms" style="padding-top:8px; font-size:14px;">
<span style="font-size:14px;"> <font style="font-weight:bold; color:#FFF;">ERROR</font></span>
</div></div>
<div class="endbidding_text"><font color="gray">This Property can not be deleted because there are currently one or more Open Requests for this Property.  Please end bidding (close) for any Open Requests in order to delete this Property.</font>
</div>
<div style="text-align:center; width:116px; margin:0 auto; padding-top:24px;">
<div id="doneeb" name="doneeb" value="Ok" class="delete_rfpusers"></div>
</div>
</div>
  <div id="maskeb"></div>
</div>
<?php } }?>