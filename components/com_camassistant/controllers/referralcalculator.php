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
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class referralcalculatorController extends JController
{

	function __construct()
	{
		parent::__construct();
	}
	function display()
	{
	parent::display();

	}

function vendor_proposal_get_commission()
	{
		$c1		=0;
		$c2		=$_REQUEST['c2'];

		//$path	=$_REQUEST['path'];
		$c2 = doubleval(str_replace(",","",$c2));
		if($c1 == 0 && $c2 !=0) //code to combined calculation
		{
		if($c2 < 4400000)
		{
		$formula = (-0.00869*log($c2))+0.15;
		$percent = round($formula,5);
		}
		else if($c2 >= 4400000 && $c2 < 6500000)
		{
		$formula	=  (-0.00000000000000000000004033*pow($c2,3))+((0.0000000000000010088)*pow($c2,2))-(0.0000000083137)*$c2 + 0.037557;
		$percent = round($formula,5);
		}
		else if($c2 >= 6500000)
		{
		$percent = 0.015;
		}
		$comm_amnt = $percent*$c2;
		$comm_amnt = round($comm_amnt,2);
		}
		//$comm_amnt = '1000000';
		//$comm_amnt = number_format($comm_amnt,2,'.','');
		$comm_amnt = doubleval(str_replace(",","",$comm_amnt));
		$comm_amnt = number_format($comm_amnt,2);
		$c2 = doubleval(str_replace(",","",$c2));
		$amnt = number_format($c2,2);
		$added = doubleval(str_replace(",","",$added));
		$added = number_format($added,2);
		$other = doubleval(str_replace(",","",$other));
		$other = number_format($other,2);
		echo $comm_amnt;
		exit;
	}

////
//Completed

}
?>