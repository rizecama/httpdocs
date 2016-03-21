<?php
/**
* @version		$Id: helper.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');


jimport('joomla.base.tree');
jimport('joomla.utilities.simplexml');

/**
 * mod_mainmenu Helper class
 *
 * @static
 * @package		Joomla
 * @subpackage	Menus
 * @since		1.5
 */
 ?>
 <script type="text/javascript">
 function mitem()
 {
 var r=confirm("Are you sure you want to leave the RFP and lose your current work?");
 return r;
 }
 function mitem_c()
 {
	 if( document.getElementById('changes').value == 'yes' ){
	 var r=confirm("Are you sure you want to leave Compliance Documents and lose any changes you just made?");
	 return r;
	 }
	 else{
	 
 	 }
 }
 function popuprefer(){
el='<?php  echo Juri::base(); ?>index2.php?option=com_camassistant&controller=referralcalculator&task=referralcalculator&Itemid=198';
var options = $merge(options || {}, Json.evaluate("{handler: 'iframe', size: {x: 300, y:250}}"))
SqueezeBox.fromElement(el,options);
 }
 function mitem1()
 {
 var r=confirm("You have not completed your submission of this proposal. You must click 'Submit Proposal' at the bottom of this page to verify that you have reviewed and would like to submit your proposal. Are you sure you want to leave this page?");
 return r;
 }
</script>
<?php
class modMainMenuHelper
{
	function buildXML($params)
	{
		$menu = new JMenuTree($params);
		$items = &JSite::getMenu();

		// Get Menu Items
		$rows = $items->getItems('menutype', $params->get('menutype'));
		$maxdepth = $params->get('maxdepth',10);

		// Build Menu Tree root down (orphan proof - child might have lower id than parent)
		$user =& JFactory::getUser();
		$ids = array();
		$ids[0] = true;
		$last = null;
		$unresolved = array();
		// pop the first item until the array is empty if there is any item
		if ( is_array($rows)) {
			while (count($rows) && !is_null($row = array_shift($rows)))
			{
				if (array_key_exists($row->parent, $ids)) {
					$row->ionly = $params->get('menu_images_link');
					$menu->addNode($params, $row);

					// record loaded parents
					$ids[$row->id] = true;
				} else {
					// no parent yet so push item to back of list
					// SAM: But if the key isn't in the list and we dont _add_ this is infinite, so check the unresolved queue
					if(!array_key_exists($row->id, $unresolved) || $unresolved[$row->id] < $maxdepth) {
						array_push($rows, $row);
						// so let us do max $maxdepth passes
						// TODO: Put a time check in this loop in case we get too close to the PHP timeout
						if(!isset($unresolved[$row->id])) $unresolved[$row->id] = 1;
						else $unresolved[$row->id]++;
					}
				}
			}
		}
		return $menu->toXML();
	}

	function &getXML($type, &$params, $decorator)
	{
		static $xmls;

		if (!isset($xmls[$type])) {
			$cache =& JFactory::getCache('mod_mainmenu');
			$string = $cache->call(array('modMainMenuHelper', 'buildXML'), $params);
			$xmls[$type] = $string;
		}

		// Get document
		$xml = JFactory::getXMLParser('Simple');
		$xml->loadString($xmls[$type]);
		$doc = &$xml->document;

		$menu	= &JSite::getMenu();
		$active	= $menu->getActive();
		$start	= $params->get('startLevel');
		$end	= $params->get('endLevel');
		$sChild	= $params->get('showAllChildren');
		$path	= array();

		// Get subtree
		if ($start)
		{
			$found = false;
			$root = true;
			if(!isset($active)){
				$doc = false;
			}
			else{
				$path = $active->tree;
				for ($i=0,$n=count($path);$i<$n;$i++)
				{
					foreach ($doc->children() as $child)
					{
						if ($child->attributes('id') == $path[$i]) {
							$doc = &$child->ul[0];
							$root = false;
							break;
						}
					}

					if ($i == $start-1) {
						$found = true;
						break;
					}
				}
				if ((!is_a($doc, 'JSimpleXMLElement')) || (!$found) || ($root)) {
					$doc = false;
				}
			}
		}

		if ($doc && is_callable($decorator)) {
			$doc->map($decorator, array('end'=>$end, 'children'=>$sChild));
		}
		return $doc;
	}

	function render(&$params, $callback)
	{
		switch ( $params->get( 'menu_style', 'list' ) )
		{
			case 'list_flat' :
				// Include the legacy library file
				require_once(dirname(__FILE__).DS.'legacy.php');
				mosShowHFMenu($params, 1);
				break;

			case 'horiz_flat' :
				// Include the legacy library file
				require_once(dirname(__FILE__).DS.'legacy.php');
				mosShowHFMenu($params, 0);
				break;

			case 'vert_indent' :
				// Include the legacy library file
				require_once(dirname(__FILE__).DS.'legacy.php');
				mosShowVIMenu($params);
				break;

			default :
				// Include the new menu class
				$xml = modMainMenuHelper::getXML($params->get('menutype'), $params, $callback);
				if ($xml) {
					$class = $params->get('class_sfx');
					$xml->addAttribute('class', $class);
					if ($tagId = $params->get('tag_id')) {
						$xml->addAttribute('id', $tagId);
					}

					$result = JFilterOutput::ampReplace($xml->toString((bool)$params->get('show_whitespace')));
					$result = str_replace(array('<ul/>', '<ul />'), '', $result);
					echo $result;
				}
				break;
		}
	}
}

/**
 * Main Menu Tree Class.
 *
 * @package		Joomla
 * @subpackage	Menus
 * @since		1.5
 */
class JMenuTree extends JTree
{
	/**
	 * Node/Id Hash for quickly handling node additions to the tree.
	 */
	var $_nodeHash = array();

	/**
	 * Menu parameters
	 */
	var $_params = null;

	/**
	 * Menu parameters
	 */
	var $_buffer = null;

	function __construct(&$params)
	{
		$this->_params		=& $params;
		$this->_root		= new JMenuNode(0, 'ROOT');
		$this->_nodeHash[0]	=& $this->_root;
		$this->_current		=& $this->_root;
	}

	function addNode(&$params, $item)
	{
		// Get menu item data
		$data = $this->_getItemData($params, $item);

		// Create the node and add it
		$node = new JMenuNode($item->id, $item->name, $item->access, $data);

		if (isset($item->mid)) {
			$nid = $item->mid;
		} else {
			$nid = $item->id;
		}
		$this->_nodeHash[$nid] =& $node;
		$this->_current =& $this->_nodeHash[$item->parent];

		if ($item->type == 'menulink' && !empty($item->query['Itemid'])) {
			$node->mid = $item->query['Itemid'];
		}

		if ($this->_current) {
			$this->addChild($node, true);
		} else {
			// sanity check
			JError::raiseError( 500, 'Orphan Error. Could not find parent for Item '.$item->id );
		}
	}

	function toXML()
	{
		// Initialize variables
		$this->_current =& $this->_root;

		// Recurse through children if they exist
		while ($this->_current->hasChildren())
		{
			$this->_buffer .= '<ul>';
			foreach ($this->_current->getChildren() as $child)
			{
				$this->_current = & $child;
				$this->_getLevelXML(0);
			}
			$this->_buffer .= '</ul>';
		}
		if($this->_buffer == '') { $this->_buffer = '<ul />'; }
		return $this->_buffer;
	}

	function _getLevelXML($depth)
	{
		$depth++;

		// Start the item
		$rel = (!empty($this->_current->mid)) ? ' rel="'.$this->_current->mid.'"' : '';
		
		$user =& JFactory::getUser();
//echo $user->invitation; echo "<br>";
//echo $this->_current->id; echo "<br>";
//echo $user->user_type; echo "<br>";

		if($user->invitation == 0 && $this->_current->id == 182 && $user->user_type==12) {
		$this->_buffer .= '';
		}
		if($user->invitation == 1 && $this->_current->id == 246 && $user->user_type==12 && $user->dmanager=='yes') {
		$this->_buffer .= '';
		}
		else{
		$this->_buffer .= '<li access="'.$this->_current->access.'" level="'.$depth.'" id="'.$this->_current->id.'"'.$rel.'>';
		}
		// Append item data
	
		if($user->invitation == 0 && $this->_current->id == 182 && $user->user_type==12) {
		$this->_buffer .= '';
		}
		if($user->invitation == 1 && $this->_current->id == 246 && $user->user_type==12 && $user->dmanager=='yes') {
		$this->_buffer .= '';
		}
		else{
		$this->_buffer .= $this->_current->link;
		}
		// Recurse through item's children if they exist
		while ($this->_current->hasChildren())
		{
			$this->_buffer .= '<ul>';
			foreach ($this->_current->getChildren() as $child)
			{
				$this->_current = & $child;
				$this->_getLevelXML($depth);
			}
			$this->_buffer .= '</ul>';
		}

		// Finish the item
		$this->_buffer .= '</li>';
	}

	function _getItemData(&$params, $item)
	{
		$data = null;
		// Menu Link is a special type that is a link to another item
		if ($item->type == 'menulink')
		{
			$menu = &JSite::getMenu();
			if ($newItem = $menu->getItem($item->query['Itemid'])) {
    			$tmp = clone($newItem);
				$tmp->name	 = '<span><![CDATA['.$item->name.']]></span>';
				$tmp->mid	 = $item->id;
				$tmp->parent = $item->parent;
			} else {
				return false;
			}
		} else {
			$tmp = clone($item);
			$tmp->name = '<span><![CDATA['.$item->name.']]></span>';
		}

		$iParams = new JParameter($tmp->params);
		if ($params->get('menu_images') && $iParams->get('menu_image') && $iParams->get('menu_image') != -1) {
			switch ($params->get('menu_images_align', 0)){
				case 0 : 
				$imgalign='align="left"';
				break;
				
				case 1 :
				$imgalign='align="right"';
				break;
				
				default :
				$imgalign='';
				break;
			}
				
			
			$image = '<img src="'.JURI::base(true).'/images/stories/'.$iParams->get('menu_image').'" '.$imgalign.' alt="'.$item->alias.'" />';
			if($tmp->ionly){
				 $tmp->name = null;
			 }
		} else {
			$image = null;
		}
		switch ($tmp->type)
		{
			case 'separator' :
				return '<span class="separator">'.$image.$tmp->name.'</span>';
				break;

			case 'url' :
				if ((strpos($tmp->link, 'index.php?') === 0) && (strpos($tmp->link, 'Itemid=') === false)) {
					$tmp->url = $tmp->link.'&amp;Itemid='.$tmp->id;
				} else {
					$tmp->url = $tmp->link;
				}
				break;

			default :
				$router = JSite::getRouter();
				$tmp->url = $router->getMode() == JROUTER_MODE_SEF ? 'index.php?Itemid='.$tmp->id : $tmp->link.'&Itemid='.$tmp->id;
				break;
		}

		// Print a link if it exists
		
		if ($tmp->url != null)
		{
			// Handle SSL links
			$iSecure = $iParams->def('secure', 0);
			
			$user = JFactory::getUser();

			if(isset($user->user_type) && $user->user_type == 11 && $tmp->home == '1')
			$tmp->url = 'index.php?option=com_camassistant&controller=vendors&task=vendor_dashboard&Itemid=112';

			else if(isset($user->user_type) && $user->user_type == 12  && $tmp->home == '1') 
			$tmp->url = 'index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=128';
				
			else if(isset($user->user_type) && $user->user_type == 13 && $tmp->home == '1')
			$tmp->url = 'index.php?option=com_camassistant&controller=rfpcenter&task=dashboard&Itemid=125'; 

				if($_REQUEST['task'] == 'vendor_dashboard'){
				$db = & JFactory::getDBO();
				$user =& JFactory::getUser();
				$subscribe = "SELECT subscribe from #__users   WHERE id=".$user->id;
				$db->Setquery($subscribe);
				$sub_type = $db->loadResult();
				if($sub_type == 'no' || $sub_type == ''){
				$newURL = 'index.php?option=com_camassistant&controller=vendors&task=subscriptions&Itemid=213' ;
				header('Location: '.$newURL);
				}
				else{
				$tmp->url = $tmp->url ;
				}
				}
				
			//echo $tmp->url;
			if ($tmp->home == 1000) {
				$tmp->url = JURI::base();
			} elseif (strcasecmp(substr($tmp->url, 0, 4), 'http') && (strpos($tmp->link, 'index.php?') !== false)) {
				$tmp->url = JRoute::_($tmp->url, true, $iSecure);
			} else {
				$tmp->url = str_replace('&', '&amp;', $tmp->url);
			}

			switch ($tmp->browserNav)
			{
				default:
				case 0:
					// _top
					//echo 'anil';
					//echo '<pre>'; print_r($tmp); 
					
					// To activate the active ITEMID for MANAGEMENT FIRM
			$menu	= &JSite::getMenu();
     		$active	= $menu->getActive();
			//echo $active->id;	echo $tmp->id.'<br />';	
			If($active->id == $tmp->id)
			{
			$menuclass = 'active';
			}
			else
			{
			$menuclass = '';
			}
				// END --To activate the active ITEMID for MANAGEMENT FIRM
//echo $tmp->url;

/* Start -- confirm dialog box for CreateRFP:  anil_25-08-2011 */
				$cid = JRequest::getVar('task','','get');
				if($tmp->id == '199' || $tmp->id == '205' || $tmp->id == '200' || $tmp->id == '206' || $tmp->id == '201' || $tmp->id == '207' || $tmp->id == '88' || $tmp->id == '99') {
				$image = '<span class="greennumber">1 </span><p class="seperatordot">.</p>';
				}
				if($tmp->id == '87' || $tmp->id == '98') {
				$image = '<span class="greennumber">2 </span><p class="seperatordot">.</p>';
				}
				if($tmp->id == '89' || $tmp->id == '100') {
				$image = '<span class="greennumber">3 </span><p class="seperatordot">.</p>';
				}
				if($tmp->id == '123' || $tmp->id == '130') {
				$image = '<span class="greennumber">4 </span><p class="seperatordot">.</p>';
				}
				if($tmp->id == '202' || $tmp->id == '204') {
				$image = '<span class="greennumber">5 </span><p class="seperatordot">.</p>';
				}
				
			if( $cid=='vendor_proposal_preview'){
				$viewvar = JRequest::getVar('var','','get');
				$action = JRequest::getVar('action','','get');
				//echo $viewvar; exit;
				if ( $viewvar == 'view' ) {
				$data = '<a class="'.$menuclass.'" href="'.$tmp->url.'">'.$image.$tmp->name.'</a>';
				} else {
				//$url = $_SERVER['REQUEST_URI'];
				 if($action != 'view'){
				 $data = '<a class="'.$menuclass.'" href="'.$tmp->url.'" onclick="javascript:return mitem1()" >'.$image.$tmp->name.'</a>';
				 }
				 else{
				 $data = '<a class="'.$menuclass.'" href="'.$tmp->url.'" >'.$image.$tmp->name.'</a>';
				 }
				  //echo $root = JURI::root();
				  } //inner
				}  else
				   if ( $cid == 'rfpform' || $cid == 'editrfp' ){
					$viewvar = JRequest::getVar('var','','get');
					if ( $viewvar == 'view' ) {
				$data = '<a class="'.$menuclass.'" href="'.$tmp->url.'">'.$image.$tmp->name.'</a>';
				} else {
				 $data = '<a class="'.$menuclass.'" href="'.$tmp->url.'" onclick="javascript:return mitem()" >'.$image.$tmp->name.'</a>';
				  }
				  }	else
				   if ( $cid == 'vendor_compliance_docs'){
					$viewvar = JRequest::getVar('var','','get');
					if ( $viewvar == 'view' ) {
				$data = '<a class="'.$menuclass.'" href="'.$tmp->url.'">'.$image.$tmp->name.'</a>';
				} else {
				 $data = '<a class="'.$menuclass.'" href="'.$tmp->url.'" onclick="javascript:return mitem_c()" >'.$image.$tmp->name.'</a>';
				  }
				  }	
				  else {
				  if($item->id == '198'){
			$data = '<a class="'.$menuclass.'" href="#" onclick="javascript:return popuprefer()" >'.$image.$tmp->name.'</a>';
			}	else {
				 $data = '<a class="'.$menuclass.'" href="'.$tmp->url.'">'.$image.$tmp->name.'</a>';
				}
				 }
/* END -- confirm dialog box for CreateRFP:  anil_25-08-2011 */				 
					// END --To activate the active ITEMID for MANAGEMENT FIRM
					
					break;
				case 1:
					// _blank
					$data = '<a href="'.$tmp->url.'" target="_blank">'.$image.$tmp->name.'</a>';
					break;
				case 2:
		
					// window.open
					$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$this->_params->get('window_open');

					// hrm...this is a bit dickey
					$link = str_replace('index.php', 'index2.php', $tmp->url);
					$data = '<a href="'.$link.'" onclick="window.open(this.href,\'targetWindow\',\''.$attribs.'\');return false;">'.$image.$tmp->name.'</a>'; 
					break;
					
					
			}
		} else {
		   $data = '<a>'.$image.$tmp->name.'</a>';
		   
		}
		return $data;
	}
}

/**
 * Main Menu Tree Node Class.
 *
 * @package		Joomla
 * @subpackage	Menus
 * @since		1.5
 */
class JMenuNode extends JNode
{
	/**
	 * Node Title
	 */
	var $title = null;

	/**
	 * Node Link
	 */
	var $link = null;

	/**
	 * CSS Class for node
	 */
	var $class = null;

	function __construct($id, $title, $access = null, $link = null, $class = null)
	{
		$this->id		= $id;
		$this->title	= $title;
		$this->access	= $access;
		$this->link		= $link;
		$this->class	= $class;
	}
}
