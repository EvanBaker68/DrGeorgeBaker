<?php
/*************************
  Coppermine Photo Gallery
  ************************
  Copyright (c) 2003-2008 Dev Team
  v1.1 originally written by Gregory DEMAR

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 3
  as published by the Free Software Foundation.
  
  ********************************************
  Coppermine version: 1.4.16
  $HeadURL: https://coppermine.svn.sourceforge.net/svnroot/coppermine/trunk/cpg1.4.x/anycontent.php $
  $Revision: 4233 $
  $Author: gaugau $
  $Date: 2008-02-02 09:23:58 +0100 (Sa, 02 Feb 2008) $
**********************************************/

/**
* Coppermine Photo Gallery 1.4.14 anycontent.php
*
* This file file gets included in the index.php if you set the option in admin
* can be used to display any content from any program, it is always to be edited
* according to tastes and then used
*
* @copyright 2002,2007 Gregory DEMAR, Coppermine Dev Team
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License V3
* @package Coppermine
* @version $Id: anycontent.php 4233 2008-02-02 08:23:58Z gaugau $
*/

if (!defined('IN_COPPERMINE')) die('Not in Coppermine...');

starttable("100%", "Welcome");

?>
<tr><td class="tableb" >
This is for any content block - just a test - Edit the file "anycontent.php" to change what is shown here
</td></tr>
<?php
endtable();

?>
