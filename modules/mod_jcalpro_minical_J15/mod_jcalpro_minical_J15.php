<?php
/*
 **********************************************
 JCal Pro
 Copyright (c) 2006-2007 Anything-Digital.com
 **********************************************
 JCal Pro is a fork of the existing Extcalendar component for Joomla! and Mambo.
 Extcal (http://sourceforge.net/projects/extcal) was renamed
 and adapted to become a Mambo/Joomla! component by
 Matthew Friedman, and further modified by David McKinnis
 (mamboguru.com) to repair some security holes.

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This header must not be removed. Additional contributions/changes
 may be added to this header as long as no information is deleted.
 **********************************************

 * Minical Module
 *
 * $Id: mod_jcalpro_minical_J15.php 699 2011-02-14 23:39:17Z jeffchannell $
 *
 * Module for displaying a monthly minicalender in connection with the JCal Pro
 * component, The component must be installed before this module will work.
 * There are some options for this module, which can be set in the
 * "Parameters" section of the module in Administration.
 *

 **********************************************
 Get the latest version of JCal Pro at:
 http://dev.anything-digital.com//
 **********************************************
 */

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

if( is_readable(JPATH_ROOT. DS. 'components'.DS.'com_jcalpro'.DS.'include'.DS.'minical.inc.php') ) {
  include( JPATH_ROOT. DS. 'components'.DS.'com_jcalpro'.DS.'include'.DS.'minical.inc.php' );
}

// get the module output
$moduleContent = jclMinical( $params, $module->id);

// echo it
echo $moduleContent;
