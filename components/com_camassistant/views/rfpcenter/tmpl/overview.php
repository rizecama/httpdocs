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
//echo "<pre>"; print_r($this->closed);  exit;

?>
<script type="text/javascript" src="components/com_camassistant/skin/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript">
K = jQuery.noConflict();

function addendum(id) {
				//Cancel the link behavior


		//Get the A tag

		//Get the screen height and width
		var maskHeight = K(document).height();
		var maskWidth = K(window).width();


		//Set heigth and width to mask to fill up the whole screen
		K('#mask1').css({'width':maskWidth,'height':maskHeight});

		//transition effect
		K('#mask1').fadeIn(100);
		K('#mask1').fadeTo("slow",0.8);

		//Get the window height and width

		var winH = K(window).height();
		var winW = K(window).width();



		//Set the popup window to center
		K("#submit1").css('top',  '582');
		K("#submit1").css('left', '232');

//		K("#done1").html("<a href='index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid="+id+"&Itemid=87'>Done</a>");
//		K("#close1").html("Cancel");
		//transition effect
		K("#submit1").fadeIn(2000);

		K('.window1 #done1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		K('#mask1').hide();
		K('.window1').hide();

		window.location = "index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid="+id+"&date=add&Itemid=87"

	});
}


K(document).ready(function() {


	//if close button is clicked
	K('.window1 #close1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();

		K('#mask1').hide();
		K('.window1').hide();

	});

	//if done button is clicked
	K('.window1 #done1').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		K('#mask1').hide();
		K('.window1').hide();

	});



});

</script>
<style>
#mask1 {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}

#boxes1 .window1 {
  position:absolute;
  left:0;
  top:0;
  width:350px;
  height:150px;
  display:none;
  z-index:9999;
  padding:20px;
}


#boxes1 #submit1 {
  width:300px;
  height:150px;
  padding:10px;
  background-color:#ffffff;
}
#boxes1 #submit1 a{
 text-decoration:none;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}
#done1 {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
float:left;
width:160px;
/*background:url(templates/camassistant/images/yes.gif) no-repeat;
*/
}
#close1 {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}

</style>
<script type="text/javascript">
function deletedraft(rfpid){
	L = jQuery.noConflict();
		var maskHeight = L(document).height();
		var maskWidth = L(window).width();
		//Set heigth and width to mask to fill up the whole screen
		L('#maskr').css({'width':maskWidth,'height':maskHeight});
		//transition effect		
		L('#maskr').fadeIn(100);	
		L('#maskr').fadeTo("slow",0.8);	
		//Get the window height and width
		var winH = L(window).height();
		var winW = L(window).width();
		//Set the popup window to center
		L("#submitr").css('top',  parseInt(maskHeight)-1400);
		L("#submitr").css('left', '582');
		L("#submitr").fadeIn(2000);

		
	L('.windowr #closer').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		L('#maskr').hide();
		L('.windowr').hide();
	});	
	L('.windowr #doner').click(function (e) {
    L.post("index.php?option=com_camassistant&controller=rfpcenter&task=deleterfp", {rfpid: ""+rfpid+""}, function(data){
	e.preventDefault();
	L('#maskr').hide();
	L('.windowr').hide();
	if(data == 'success'){
	alert("Draft RFP deleted successfully");
	location.reload(); 
	}
	else{
	alert("Please try again");
	}
   });
   
	});
}
</script>
<style>
#maskr {
  position:absolute;
  left:0;
  top:0;

  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxesr .windowr {
  position:absolute;
  left:0;
  top:0;
  width:350px;
  height:150px;
  display:none;
  z-index:9999;
  padding:20px;
}


#boxesr #submitr {
  width:300px; 
  height:131px;
  padding:10px;
  background-color:#ffffff;
}
#boxesr #submitr a{
 text-decoration:none;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}
#doner {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
float:left;
width:160px;
/*background:url(templates/camassistant/images/yes.gif) no-repeat;
*/
}
#closer {
border:0 none;
cursor:pointer;
height:30px;
margin:0;
padding:0;
 color:#000000;
 font-weight:bold;
 font-size:20px;
}
</style>
<script type="text/javascript">
G = jQuery.noConflict();
function openpopup() {
var chk = document.getElementsByName('chk1[]'); 
var j = 0;
for(var i=0; i < chk.length; i++){
if(chk[i].checked){
j++;
total = chk[i].value; 
}
}
if(j==0 || j>1){
alert("Please select one property");
}
else {
var el ='index.php?option=com_camassistant&controller=rfpcenter&task=proposalawarding&Itemid=<?php echo $_REQUEST['Itemid']; ?>&rid='+total;

	var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 700, y:550}}"))
SqueezeBox.fromElement(el,options);
}
}
G = jQuery.noConflict();
function popup_proposal_summary() 
{

	var chk = document.getElementsByName('chk1[]'); 
	var j = 0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	rfp_id =chk[i].value; 
	}
	}
	if(j==0 || j>1){
  alert("Please select one property");
	}
	else {

		
	/**   gfgdfgdfg             ***/
	window.location.href='zipdownloads/RFP'+rfp_id+'.zip';	

	}
}
function popup_proposal_summary1() 
{
	var chk = document.getElementsByName('chk1[]'); 
	var j = 0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	rfp_id =chk[i].value; 
	}
	}
	if(j==0 || j>1){
  alert("Please select one property");
	}
	else {
	window.open('index.php?option=com_camassistant&controller=vendors&task=vendor_proposals_summary&rfp_id='+rfp_id,'_blank');

	}
}

function rebid() 
{
	var chk = document.getElementsByName('chk1[]'); 
	var j = 0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	rfp_id =chk[i].value; 
	}
	}
	if(j==0 || j>1){
	alert("Please select one property");
	} else {
	window.location.href ="index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid="+rfp_id+"&Itemid=<?php echo $_REQUEST['Itemid']; ?>";
	}
}

function draft() 
{
	var chk = document.getElementsByName('chk1[]'); 
	
	var j=0;
	for(var i=0; i < chk.length; i++){
	if(chk[i].checked){
	j++;
	rfp_id =chk[i].value; 
	}
	}
	if(j==0 || j>1){
	alert("Please select one property");
	}
	else {
	window.location.href ="index.php?option=com_camassistant&controller=rfpcenter&task=copydraft&rfpid="+rfp_id+"&Itemid=<?php echo $_REQUEST['Itemid']; ?>";
	}
}
</script>
<div id="boxesr" style="top:400px; left:582px;">		
<div id="submitr" class="windowr" style="left:582px;">		
<div class="" style="padding-left:100px">&nbsp;</div>
<p style="padding-left:0px; color:#0000ce; text-align:center;">Are you sure you want to permanently delete <br />this Draft RFP? </p><br />
<div style="padding-top:10px; text-align:center; padding-left:60px;">
<form name="edit" id="edit" method="post">
<div id="doner" style="width:50px" name="doner" value="Ok"><img src="templates/camassistant_left/images/yes.gif" /></div>
<div id="closer" style="width:250px" name="closer" value="Cancel"><img src="templates/camassistant_left/images/no.gif" /></div></div>
</form>
</div>
  <div id="maskr"></div>
</div>

<div id="boxes1" style="top:576px; left:582px;">
<div id="submit1" class="window1" style="top:300px; left:582px;">

<div style="padding-top:10px; text-align:center"><font color="#0000ce">Addendums require a minimum of 5 days for the vendors to adjust their proposals.  The RFP selected has less than the minimum required time. Do you want to extend the Proposal Deadline in order to add an addendum?</font>
</div>
<div style="padding-top:20px; text-align:center;">
<form name="edit" id="edit" method="post">
<div id="done1" name="done1" value="Ok"><img src="templates/camassistant/images/yes.gif" /></div>
<div id="close1" name="close1" value="Cancel"><img src="templates/camassistant/images/No.gif" /></div>
</form>
</div>
</div>
  <div id="mask1"></div>
</div>

<div id="bedcrumb">
<ul>
<li class="home"><a href="index.php">Home  </a></li><li>RFP Center Overview</li>
</ul>
</div>
<div class="table_pannel">
<div id="i_bar">
<div class="head_bluebg">STEP 2 of 5: ACTIVE BIDDING <span>( Open )</span>
<div id="i_icon">
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=143&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" style="vertical-align:top; margin-top:-6px;"/> </a>
</div>
</div></div>
<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="60"  valign="middle" align="center">RFP#</td>
    <td width="222" valign="middle" align="center">PROPERTY NAME</td>
    <td width="270" valign="middle" align="center">PROJECT NAME</td>
    <td width="160"  valign="middle" align="center">CLOSE DATE</td>
    <td width="200" valign="middle" align="center">OPTIONS</td>
<?php /*?>    <td width="120" valign="top" align="center">Preview Proposals</td><?php */?>
  </tr>

  	<?php
	$k = 0;
	foreach ($this->details as $row) :
	?>
		  <tr class="table_blue_rowdots">

			<td align="center" valign="top"><?php echo sprintf('%06d', $row->id); //echo $row->id; ?></td>
	 		<td align="left" valign="top"><?php echo str_replace('_',' ',$row->property_name); ?></td>
			<td align="left" valign="top"><?php echo $row->projectName; ?></td>
	   		<td align="center" valign="top" style="width:200px;"><?php echo $row->proposalDueDate; ?>&nbsp;<?php echo $row->proposalDueTime; ?></td>
			<?php //print_r($row-); ?>
			<?php  $date1 = $row->proposalDueDate;
				$date = explode("-", $date1);
				 $pdate = $date[2].'-'.$date[0].'-'.$date[1];
				 $date2 = date("Y-m-d");
			 $diff = abs(strtotime($pdate) - strtotime($date2));
			 $days = floor($diff/(60*60*24));

			//print_r($days);
			//echo '<pre>'; print_r($row);
?>	<td align="center" valign="middle" width="500">
<?php if($row->publish=='1' ){
		$user =& JFactory::getUser();
	 	$user_id = $user->get('id');
?> <?php if ($days >1) { ?>
	<?php if ($days <=5) { ?>
    <a href="#" onclick="javascript:addendum(<?php echo $row->id;  ?>);"> ADD ADDENDUM</a>/
    <?php } else { ?>
    <a href="index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid=<?php echo $row->id; ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">ADD ADDENDUM</a>/
    <?php } } ?>
<?php    // if($row->cust_id == $user_id){ ?>
    <a href="index.php?option=com_camassistant&controller=rfpcenter&task=copydraft&rfpid=<?php echo $row->id; ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">COPY</a>/
    <?php } //} ?>
        <a href="index.php?option=com_camassistant&controller=rfp&task=reviewrfp&rfpid=<?php echo $row->id;  ?>&var=view&Itemid=<?php echo $_REQUEST['Itemid']; ?>">VIEW</a> <?php /*?>  /<a href="<?php echo juri::base();  ?>index.php?option=com_camassistant&controller=rfp&task=cancelrfp&tmpl=component&rfpid=<?php echo $row->id; ?>&Itemid=<?php echo $_REQUEST['Itemid'];?>" class="modal" rel="{ handler:'iframe', size:{x:440, y:360} }" style="text-decoration:none;">CANCEL</a><?php */?>
                </td>
</tr>
  </tr>
		<?php
		$k = 1 - $k;
		endforeach;
	//}
                ?>
               
	
 <tr class="table_blue_rowdots">
   <td align="center" valign="top"></td>
   <td align="left" valign="middle"></td>
   <td align="left" valign="top"></td>
   <td align="left" valign="top"></td>
   <td align="center" valign="middle"></td>
 </tr>

 <?php if($this->details) { ?> <tr>
		    <td valign="middle" align="right" colspan="5"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=submitedrfp&Itemid<?php echo $_REQUEST['Itemid']; ?>"><img height="25" width="95" vspace="10" alt="view all" src="templates/camassistant/images/view_all.gif"></a></td>
		 </tr>	<?php } ?>
</table>
<div class="clear"></div>
</div>
</div>
<div id="i_bar">
<div class="head_bluebg">Drafts (Unfinished)</span>
<div id="i_icon">
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=144&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" style="vertical-align:top; margin-top:-6px;"/> </a>
</div>
</div></div>

	<div class="table_pannel">
<div class="table_panneldiv">
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="70" align="center" valign="middle">RFP#</td>
    <td width="157" align="center" valign="middle">PROPERTY NAME</td>
    <td width="231" align="center" valign="middle">PROJECT NAME</td>
    <td width="76" align="center" valign="middle">Created</td>
    <td width="120" align="center" valign="middle"># OPTIONS</td>
  </tr>
  
  	<?php
	$k = 0;
	foreach ($this->unsubmitted as $row1) :
	//for ($i=0, $n=count( $this->details1 ); $i < $n; $i++)
	//{
		//$row1 = &$this->details1[$i];
       // echo "<pre>"; print_r($row1);
		//$link 	= JRoute::_( 'index.php?option=com_camassistant&controller=category_detail&task=edit&cid[]='. $row->id );

		//$checked 	= JHTML::_('grid.checkedout',   $row, $i );
		//$published 	= JHTML::_('grid.published', $row, $i );		

		?> <?php if($row1->publish=='2') { ?>
		  <tr class="table_blue_rowdots" style="color:red;">
			
			<td align="center" valign="top"><?php echo sprintf('%06d', $row1->id); //echo $row1->id; ?></td>
	 		<td align="left" valign="middle"><?php echo str_replace('_',' ',$row1->property_name); ?></td>		
			<td align="left" valign="top"><?php echo $row1->projectName; ?></td>
	   		<td align="center" valign="top"><?php echo $row1->createdDate; ?></td>
            <?php if($row1->rfp_type=='draft'){ ?>
            <td align="center" valign="middle"><a href="index.php?option=com_camassistant&controller=rfp&task=editrfp&var=draft&rfpid=<?php echo $row1->id;  ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">EDIT</a> / <a href="javascript:deletedraft(<?php echo $row1->id ; ?>);">DELETE</a></td><?php } ?>
  		</tr>
 
  <tr style="color:red;"><td colspan="5">Returned to DRAFT status by MyVendorCenter Review Process. Please call 561-246-3830 for assistance.</td></tr>
  <?php } else { ?>
   <tr class="table_blue_rowdots">
			
			<td align="center" valign="top"><?php echo sprintf('%06d', $row1->id); //echo $row1->id; ?></td>
	 		<td align="left" valign="middle"><?php echo str_replace('_',' ',$row1->property_name); ?></td>		
			<td align="left" valign="top"><?php echo $row1->projectName; ?></td>
	   		<td align="center" valign="top"><?php echo $row1->createdDate; ?></td>
    		<td align="center" valign="middle"><a href="index.php?option=com_camassistant&controller=rfp&task=editrfp&var=draft&rfpid=<?php echo $row1->id;  ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">EDIT</a> / <a href="javascript:deletedraft(<?php echo $row1->id ; ?>);">DELETE</a></td>
  </tr>
  <?php } ?>

		<?php
		$k = 1 - $k;
		endforeach;
	//}
	?>
 <tr class="table_blue_rowdots">
   <td align="center" valign="top"></td>
   <td align="left" valign="middle"></td>
   <td align="left" valign="top"></td>
   <td align="left" valign="top"></td>
   <td align="center" valign="middle"></td>
 </tr>
 <?php if($this->unsubmitted) { ?> <tr>
		    <td valign="middle" align="right" colspan="5"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=unsubmittedrfp&Itemid=<?php echo $_REQUEST['Itemid']; ?>"><img height="25" width="95" vspace="10" alt="view all" src="templates/camassistant/images/view_all.gif"></a></td>
		 </tr>	<?php } ?>
 
</table>
<div class="clear"></div>
</div>
</div>
<div id="i_bar">
<div class="head_bluebg">STEP 3 of 5: BIDDING ENDED (Closed)</span>
<div id="i_icon">
<a style="text-decoration: none;" title="Click here" class="modal" rel="{handler: 'iframe', size: {x: 680, y: 530}}" href="index2.php?option=com_content&amp;view=article&amp;id=145&amp;Itemid=113"><img src="templates/camassistant_left/images/info_icon2.png" style="vertical-align:top; margin-top:-6px;"/> </a>
</div>
</div></div>
	<div class="table_pannel">
<div class="table_panneldiv">
<form action="" method="post" name="adminform"  >
<table width="100%" cellpadding="0" cellspacing="4">
  <tr class="table_green_row">
    <td width="70" align="center" valign="middle">SELECT</td>
    <td width="157" align="center" valign="middle">PROPERTY NAME</td>
    <td width="231" align="center" valign="middle">PROJECT NAME</td>
    <td width="76" align="center" valign="middle">CLOSED</td>
    <td width="120" align="center" valign="middle"># PROPOSALS</td>
	<td width="120" align="center" valign="middle">Download ZIP</td>	
  </tr>


  	<?php
	$k = 0;
	foreach ($this->closed as $row) :

	//for ($i=0, $n=count( $this->details2 ); $i < $n; $i++)
	//{
		//$row = &$this->details2[$i];
       // echo "<pre>"; print_r($row);
		//$link 	= JRoute::_( 'index.php?option=com_camassistant&controller=category_detail&task=edit&cid[]='. $row->id );

		//$checked 	= JHTML::_('grid.checkedout',   $row, $i );
		//$published 	= JHTML::_('grid.published', $row, $i );		

		//echo "<pre>"; print_r($row); ?>
			<?php	global $mainframe;
			$db = JFactory::getDBO();
			$count="SELECT id FROM #__cam_vendor_proposals WHERE proposaltype='Submit' and rfpno=".$row->id;
			$db->setQuery( $count );
			$count = $db->loadObjectlist(); 
			
			$rfp_id = $row->id;
			$newrfp_id = 'RFP'.$rfp_id;
			//echo $rfp_id.'<br />'.$newrfp_id.'<br />';
			

			$property_id="SELECT property_id FROM #__cam_rfpinfo where id=".$rfp_id;
			$db->Setquery($property_id);
			$property_id = $db->loadResult();
			//echo '<pre>'; print_r($property_id);
			
			$property_name ="SELECT property_name FROM #__cam_property where id=".$property_id;
			$db->Setquery($property_name);
			$property_name = $db->loadResult();
			$property_name = str_replace(" ", "_", $property_name);
			//echo '<pre>'; print_r($property_name);  
			
			$key = JPATH_BASE .DS.'PropertyDocuments'.DS.$property_name.DS.'Proposal Reports'.DS.$newrfp_id.DS; 
		//$key = '\\\192.168.1.46\www\camassistant_new\PropertyDocuments'.DS.$property_name.DS.'Proposal Reports'.DS.$newrfp_id.DS; 
			// echo $key; exit;  
			?>
		  <tr class="table_blue_rowdots">
			
			<td align="center" valign="top"><input type='radio' value='<?php echo $row->id; ?>' name="chk1[]" id="chk1[]"></td>
	 		<td align="left" valign="middle"><?php echo str_replace('_',' ',$row->property_name); ?></td>		
			<td align="left" valign="top"><?php echo $row->projectName; ?></td>
	   		<td align="center" valign="top"><?php echo $row->proposalDueDate; ?></td>
			<td align="center" valign="middle"><?php 	echo count($count); ?></td>
			<?php
$filename = 'zipdownloads/RFP'.$row->id.'.zip';

if (file_exists($filename)) {
$file =  "<a href='zipdownloads/RFP".$row->id.".zip'>DOWNLOAD</a>";
} else {
$file =  "Generating...";
}
?>

			<td align="center" valign="middle"><?php echo $file; ?></td>
    		<?php /*?><td align="center" valign="middle"><a href="index.php?option=com_camassistant&controller=rfp&task=editrfp&rfpid= <?php echo $row->id;  ?>&Itemid=<?php echo $_REQUEST['Itemid']; ?>">EDIT/SUBMIT</a></td><?php */?>
	

  
  </tr>

		<?php
		$k = 1 - $k;
		endforeach;

	//}
	?>
 <tr class="table_blue_rowdots">
   <td align="center" valign="top"></td>
   <td align="left" valign="middle"></td>
   <td align="left" valign="top"></td>
   <td align="left" valign="top"></td>
   <td align="center" valign="middle"></td>
     <td align="center" valign="middle"></td>
 </tr>
 

</table>
<?php JHTML::_('behavior.modal'); ?><?php if($this->closed) { ?> 
<div class="table_bottomlinks" style="margin-bottom:-25px;">
<ul>
<?php /*?><li style=" background:none;"><a title="Industries" class="modal" rel="{handler: 'iframe', size: {x: 1000, y: 850}}" href="index.php?option=com_camassistant&amp;controller=vendors&amp;task=vendor_proposals_summary&amp;rfp_id=<?php echo $row->id;  ?>&amp;Prp_id=<?PHP echo $row->property_id; ?>" onclick="javascript: alert('hi'); document.adminform.submit();">View Proposals</a></li>
<?php */?>
<li style=" background:none;"><a href="javascript:popup_proposal_summary1();">View Proposals</a></li> 
<!--<li style=" background:none;"><a href="javascript:popup_proposal_summary();">Download Proposals</a></li>--> 
<li><a href="#" onclick="openpopup();" >Award Job</a></li> 
<li><a href="#" onclick="draft();">Copy As A New (Draft) RFP</a> </li>
<li><a href="#" onclick="rebid();" >Modify and Resubmit RFP</a></li></ul>
</div>
    <table width="100%" cellpadding="0" cellspacing="4">
  <tr>
		    <td valign="middle" align="right" colspan="5"><a href="index.php?option=com_camassistant&controller=rfpcenter&task=closedrfp&Itemid=<?php echo $_REQUEST['Itemid']; ?>"><img height="25" width="95" vspace="10" alt="view all" src="templates/camassistant/images/view_all.gif"></a></td>
		  </tr>	</table><?php } ?>
<div class="clear"></div>
</div>
</div>
	

</div>







	
