<?php
/**
 * @version		1.0.0 cam assistant $
 * @package		cam_assistant
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

class vinvitationsViewVinvitations extends Jview
{
	function display($tpl = null){
			$model  =$this->getModel('vinvitations');
			$mailbody = $model->getbody(); 
			$this->assignRef('mailbody',$mailbody);
			$vendors = $model->getprevious(); 
			$this->assignRef('vendors',$vendors);
			parent::display($tpl);
		}
		

	}
?>