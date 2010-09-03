<?php
/**
* @file
* @brief    sigplus Image Gallery Plus boxplus hover engine
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once JPATH_PLUGINS.DS.'content'.DS.'sigplus'.DS.'params.php';

/**
* Support class for jQuery-based boxplus hover engine.
* @see http://hunyadi.info.hu/projects/boxplus/
*/
class SIGPlusBoxPlusHoverEngine extends SIGPlusCaptionsEngine {
	public function getIdentifier() {
		return 'boxplus.hover';
	}

	public function addStyles() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/hover/css/boxplus.hover.css');
	}

	public function addScripts($id, $params) {
		$this->addJQuery();
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/hover/js/'.$this->getScriptFilename().'.js');
		$script = '__jQuery__("#'.$id.'").boxplusHoverGallery();';
		$this->addOnReadyScript($script);
	}
}