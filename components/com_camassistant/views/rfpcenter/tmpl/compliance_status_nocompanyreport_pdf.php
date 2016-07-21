<?php

/**
 * @version		1.0.0 camassistant $
 * @package		camassistant
 * @copyright	Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author
 * @author mail	nobody@nobody.com
 *
 *
 * @MVC architecture generated by MVC generator tool at http://www.alphaplug.com
 */
// no direct access
	
	$original_mem = ini_get('memory_limit');
	ini_set('memory_limit','640M');
	ini_set('max_execution_time', 5000);
	defined('_JEXEC') or die('Restricted access');
	require_once('libraries/tcpdf/config/lang/eng.php');
	require_once('libraries/tcpdf/tcpdf.php');
	ini_set('zlib.output_compression','Off');
	$vendor_data =  $this->message;
	//echo '<pre>';print_r($vendor_data); exit;
  

	class MYPDF extends TCPDF {

	// Page footer
	public function Footer() {
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Page number
		$this->SetFontSize(8);
			if($this->pageno){
		//$page=(int)$this->getAliasNumPage();
		//$this->Cell(208, 0, 'Vendor Compliance Status ', 0, 2, 'C');
}$this->pageno=$this->pageno+1;
		$this->SetFontSize(7);
		$this->Cell(0, 5, 'Copyright 2014-2015 HOA Assistant, LLC', 0, 0, 'C');
	}

	public function Header() {
	
	$bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        if($this->page <= 1){
          $img_file = 'templates/camassistant_left/images/header-bg-border.jpg';
              $this->Image($img_file, 0, 0, 300, 60, '', '', '', false, 300, '', false, false, 0);
			
        }
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
	
	}
}
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	//set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	//$pdf->SetDrawColor(204, 204, 204);
	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	//set some language-dependent strings
	$pdf->setLanguageArray($l);

	//$pdf->SetFont('dejavusans', '', 10);// set font
	//$pdf->AddPage(); // add a page
	// Your custom code here
	JHTML::_('behavior.modal');
	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	// set font
	//$pdf->SetFont('dejavusans', '', 12);
	//Image Quality
	$pdf->setJPEGQuality(200);
	// add a page
	//echo $this->count_enable; exit;
	
$pdf->AddPage('L');
$pdf->SetMargins(-4, 10, 0, true);
$pdf->SetXY(0, 0);

$today = date('m-d-Y H:i:s');
$today_explode = explode(' ',$today);
$items = $this->items;
$totalvendors = count($items);	
$noncomp = 0;
$comp = 0;
for( $pv=0; $pv<count($items); $pv++ )
{
if( $items[$pv]->final_status == 'fail' || $items[$pv]->final_status == 'medium' )
 $noncomp++;
if($items[$pv]->final_status == 'success')
 $comp++;
}

$db = Jfactory::getDBO();
$user = Jfactory::getUser();
$manager_logo = "SELECT comp_logopath FROM #__cam_customer_companyinfo where cust_id ='".$user->id."'";
$db->Setquery($manager_logo);
$manager_logo = $db->loadResult();
$today = date('m-d-Y H:i:s');
$today_explode = explode(' ',$today);
	$htmlcontent = '<table width="1205" border="0" cellspacing="0" height="290" style="padding:0; margin:0;border:none;" >
	<tr height="20"><td ></td></tr>
  	<tr>
		<td width="20"></td>
    	<td>
    		<table>
				<tr>
					<td>
						<table>
							<tr>
								<td><img width="150" src="templates/camassistant_left/images/my-vc-logo.png"></td>
							</tr>
							<tr>
								<td><img width="200" src="templates/camassistant_left/images/profacts-logo.png"></td>
							</tr>
							<tr>
								<td style="color:#fff; font-size:22px;">Your exclusive Vendor Compliance Report</td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<td style="text-align:center;">';
								 $pdf->Image(''.JURI::root().'components/com_camassistant/assets/images/properymanager/'.$manager_logo.'', 180, 10, 40, 40, "", "", "", true, 550,'', false, false, 0, false, false, false);
								$htmlcontent .='</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		</tr>
		<tr>';
		$htmlcontent .='</tr>
		</table><br/><br/><br/><br/><br/>
		<table>';
		$htmlcontent .='<tr  width="100%" style="padding:0px;">
    			<td width="100%"  bgcolor="#f5f5f5"  >';
					$htmlcontent .='<table width="100%" align="center"> 
        				<tr height="30">
            				<td colspan="2"></td>
            			</tr>
            			<tr>
							<td width="20"></td>
            				<td width="38%" align="left" >
                				<p style="color:#2c384a; font-size:28px; margin:0; padding:0;  line-height:5px;">
Please find the list of your Vendors below and their compliance status as of <strong>'.date("h:i A", strtotime($today_explode[1])).'</strong> on <strong>'.$today_explode[0].'</strong> Note: this list is determined by the Vendors that you have manually added to be included on your "My Vendors" list ("Corporate Preferred Vendors" list for Master Account holder). You can view this list by logging into your MyVendorCenter account and clicking on "Vendor Lists" ("Preferred Vendors" for Master Account holder)
								</p>
                			</td>
                			<td width="55%" align="right" valign="middle">
								<table width="100%" >
									<tr><td  height="10"></td></tr>
                					<tr><td>
										<table>
											<tr>
												<td>
												<img width="120" src="components/com_camassistant/assets/piechart/'.$user->id.'_piechartimg.jpg">
												</td>
												<td>
													<table style="width:100%; text-align:left; padding-top:	7px;padding-left:10px;" bgcolor="#E3E4E6" >
														<tr>
															<td  height="10"></td>
														</tr>
														<tr>
															<td style=" padding-top:30px;">
																<h3 style="font-size:38px; margin-bottom:0; line-height:normal;  color: #2c384a;">Vendor Compliance Overview</h3>
															</td>
														</tr>
														<tr>
															<td>
																<table width="100%" style="padding:0;">
																<tr>
																	<td width="15">
																		<img width="15" src="templates/camassistant_left/images/green-box.png">
																	</td>
																	<td style="font-size:28px; color:#2c384a; line-height:5px;" valign="middle">
																		 Compliant: <strong >'.$comp.'</strong>
																	</td>
																</tr>
																<tr>
																	<td width="15" >
																		<img width="15" src="templates/camassistant_left/images/red-box.png">
																	</td>
																	<td style="font-size:28px;color:#2c384a; line-height:5px;" valign="middle">
																		 Non-Compliant: <strong  >'.$noncomp.'</strong>
																	</td>
																</tr>
															</table>
															</td>
														</tr>
														<tr>
															<td style="font-size:28px; color:#2c384a; line-height:normal; padding:0;" >
																Total Vendors: <strong>'.$totalvendors.'</strong>
															</td>
														</tr>
													</table>	
												</td>
											</tr>
										</table>
									</td></tr>
									<tr><td  height="20"></td></tr>
								</table>	
                			</td>
							<td width="15"></td>
           			 	</tr>
            			<tr height="70">
            				<td colspan="2"></td>
            			</tr>
        			</table>
   				 </td>
  			</tr>
		</table>
		<br pagebreak="true" />
		';
		
		$count_enable= $this->count_enable;
		$alt = 2;
		//echo '<pre>';print_r($vendor_data );exit;
	
	if( $count_enable->phone_number == '1' )
			     $display_phone = '';
			else
			     $display_phone = 'none';
	foreach($vendor_data as $key=>$value){
	$htmlcontent .=' <table width="100%"  cellpadding="0" cellspacing="0">
			<tr>
  	<td>
    	<table width="100%" >
        	<tr height="30"><td></td> </tr>
        	<tr>
            	<td valign="middle"  style="color: #2c384a; font-size: 35px; margin:0; padding:0px; font-weight:bold; vertical-align:middle; border-top:1px solid #8c8c8c; border-bottom:1px solid #8c8c8c; line-height:10px; border-left:none; border-right:none; text-align:center;">
				'.$key.'</td>
            </tr>';
		  	for($last=0; $last<count($value); $last++){
				$exp = explode('MYVC',$value[$last]);
				//echo '<pre>';print_r($exp);exit;
				if($value[$last]){
				$alt++;
				if( $alt%2 == 0 )
					{
						$style = '#f5f5f5';
						$chageimage  = '0';
					}
					else
					{
						$style = '#ffffff';
						$chageimage  = '1';
					}
	           $htmlcontent .='  
			   <tr height="20" ><td></td> </tr>
			    <tr height="20" ><td></td> </tr>
				 <tr height="20" ><td></td> </tr>
		       <tr height="20" bgcolor="'.$style.'"><td></td> </tr>
			   <tr width="100%">
            	<td width="100%">
                	<table width="100%" bgcolor= "'.$style.'">
                    	<tr>
                        	<td>
								<table width="100%">
									<tr>
									<td width="25"></td>
										<td width="300"><h2 style="color: #2c384a; font-size: 25px; margin:0;">&nbsp;&nbsp;&nbsp;'.$exp[2].'</h2></td>
									</tr>
									<tr style="display:'.$display_phone.'">
									<td width="25"></td>	
										<td width="100%">
										<p style="font-size:25px; color:#2c384a;">
									&nbsp;&nbsp;&nbsp;'.$exp[13].'
									<br>
									&nbsp;&nbsp;&nbsp;'.$exp[14].', '.$exp[16].', '.$exp[15].' 
								</p>
										</td>
									</tr>
								</table>
							</td>';
			
				if( $exp[1] == "Verified" )
							{
								$image_text = '#8dc63f';
								if ( $chageimage == 1 ) 
									$image_status = 'compliance-verified.jpg';
								else
									$image_status = 'compliance-verifiedgray.jpg';
							}
							else
							{
								$image_text = 'red';
								if ( $chageimage == 1 ) 
									$image_status = 'compliance-failed-icon.jpg';
								else
									$image_status = 'compliance-unverifiedgray1.jpg';
							}
										
						if ( $exp[0] == 'Non-Compliant')
							 {
								$image_text1 ="red";
								if ( $chageimage == 1 ) 
									$image_status1 = 'compliance-failed-icon.jpg';
								else
									$image_status1 = 'compliance-unverifiedgray1.jpg';
				              }
						else
							{
								$image_text1 ="#8dc63f";
								if ( $chageimage == 1 ) 
									$image_status1 = 'compliance-verified.jpg';
								else
									$image_status1 = 'compliance-verifiedgray.jpg';
							}				
						$htmlcontent .='<td>
								<img src="templates/camassistant_left/images/'.$image_status1.'" width="10" ><span style="color:'.$image_text1.'" >&nbsp;'.$exp[0].'</span>
					        </td>
							 <td>
						<img src="templates/camassistant_left/images/'.$image_status.'" width="10" ><span style="color:'.$image_text.'">&nbsp;'.$exp[1].'&nbsp;Documents </span>
			                 </td>
							
					     </tr>
						<tr height="3"><td></td></tr>
						<tr>
						<td width="25"></td>
                        	<td style="display:'.$display_phone.'">
								<p style="font-size:25px; color:#2c384a;">
									<strong style="padding-bottom:2px; line-height:2;">&nbsp;&nbsp;&nbsp;Contact</strong><br>
									&nbsp;&nbsp;&nbsp;'.$exp[17].'<br>
									&nbsp;&nbsp;&nbsp;'.$exp[12].' 
								</p>
							</td>
				         </tr>';
								
						$htmlcontent .='
                    </table>
                </td>
		    </tr>';
			 }
			   
		}
		  $htmlcontent .='
            <tr height="30"><td></td> </tr>
        </table>
	</td>
  </tr>
		</table>';
			}
?>
<?php
//echo $htmlcontent;exit;
header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
$style7 = array('width' => 0.1, 'color' => array(220, 220, 220));
$pdf->SetLineStyle($style7);
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
$pdf->lastPage();
 //set title
$pdf->SetTitle($title);//set title
$path =   $_SERVER['DOCUMENT_ROOT'].'live/creports';
ob_end_clean();
$pdf->Output($path.'/compliancereports.pdf', 'FI');
$sendmail = JRequest::getVar('send');
if( $sendmail == 'mail' ){
		$user	= JFactory::getUser();
		$body =  $this->reportmessage;
		$body = str_replace('[USER FULL NAME]',$user->name.'&nbsp;'.$user->lastname,$body);
		$body = str_replace('[TIME]',date("h:i A", strtotime($today_explode[1])),$body);
		$body = str_replace('[DATE]',$today_explode[0],$body);
		$mailfrom = 'support@myvendorcenter.com';
		$from = 'MyVendorCenter';
		$to = $user->email;
		//$to = "rize.cama@gmail.com";
		$subject = 'Compliance Report Status';
		//$body = 'Please find the attachment for compliance status report.';
		$attachment = "/var/www/vhosts/vps61048.vps.ovh.ca/httpdocs/creports/compliancereports.pdf";
		JUtility::sendMail($mailfrom, $from, $to, $subject, $body, $mode=1, $cc=null, $bcc=null, $attachment, $replyto=null, $replytoname=null);
		header('Location: index.php?option=com_camassistant&controller=rfpcenter&task=compliance_status_report_webpage');
}
else
header('Location: /live/creports/compliancereports.pdf');
	/*	$path = $path;
		$doc_name = $path.'/compliancereports.pdf';
		header("content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=compliancereports.pdf");
		readfile($doc_name);
	
header('Location: /live/creports/compliancereports.pdf');*/
ini_set('memory_limit',$original_mem);
exit;
?>
