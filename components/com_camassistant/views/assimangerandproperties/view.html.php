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

jimport( 'joomla.application.component.view' );

//class vendorsViewvendors extends Jview
class camassistantViewassimangerandproperties extends Jview
{
	function display($tpl = null){
		// global $mainframe;
		$task = JRequest::getVar("task",'');
		//singnup process 2
		if($task=='vendor_info')
		{
		//echo "<pre>"; print_r($_REQUEST);
		$model = $this->getModel('vendors');
		$industries_link = $model->getindustries_link(); 
		$this->assignRef('industries_link',$industries_link);
		$post	= JRequest::get('post');
		$tax_id = $post['tax_id1'].'-'.$post['tax_id2'].'-'.$post['tax_id3'];
		$company_phone = $post['phone1'].'-'.$post['phone2'].'-'.$post['phone3'];
		$alt_phone = $post['alt_phone1'].'-'.$post['alt_phone2'].'-'.$post['alt_phone3'];
		$in_house_parent_company_FEIN = $post['IH_FED1'].'-'.$post['IH_FED2'].'-'.$post['IH_FED3'];
		$this->assignRef('company_name',$post['company_name']);
		$this->assignRef('tax_id',$tax_id);
		$this->assignRef('company_address',$post['company_address']);
		$this->assignRef('city',$post['city']);
		$this->assignRef('state',$post['states']);
		$this->assignRef('zipcode',$post['zipcode']);
		$this->assignRef('established_year',$post['established_year']);
		$this->assignRef('company_phone',$company_phone);
		$this->assignRef('phone_ext',$post['phone_ext']);
		$this->assignRef('alt_phone',$alt_phone);
		$this->assignRef('alt_phone_ext',$post['alt_phone_ext']);
		$this->assignRef('in_house_vendor',$post['in_house_vendor']);
		$this->assignRef('in_house_parent_company',$post['in_house_parent_company']);
		$this->assignRef('in_house_parent_company_FEIN',$in_house_parent_company_FEIN);
		$this->setLayout('vendor_info_form'); 
		parent::display();
		}
		else if($task=='thanks_redirect') //singnup process 3
		{
		$this->setLayout('thanks_form');
		parent::display();
		}
		else if($task=='industries_form')	
		{
		$model = $this->getModel('vendors');
		$industries = $model->getindustires(); 
		$this->assignRef('industries',$industries);
		$this->setLayout('industries_form');
		parent::display($tpl);
		}
		else //signup process 1
		{
		$model = $this->getModel('vendors');
	//	$states = $model->getstates(); 
	//$this->assignRef('states',$states);
		//$this->setLayout('company_info_form');
		parent::display($tpl);
		}

	}

}
?>