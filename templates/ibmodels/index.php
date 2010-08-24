<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/ibmodels/css/fonts/stylesheet.css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/ibmodels/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/ibmodels/css/template.css" type="text/css" />
<script src="<?php echo $this->baseurl ?>/templates/ibmodels/js/ibm_scripts.js" language="Javascript"></script>

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php if($this->direction == 'rtl') : ?>
	<link href="<?php echo $this->baseurl ?>/templates/ibmodels/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>

</head>
<body>


<div id="main">

<a id="title" href="index.php"><h2>IBMODELS</h2></a>
<div id="mainmenu">
						
						
						
						<?php if($this->countModules('menu')) : ?>
							<jdoc:include type="modules" name="menu" style="rounded" />
						<?php endif; ?>
					
						
						</div>
						<div id="conteudo">
<jdoc:include type="component" />
		</div>

</div>
</body>
</html>
