<?php
/**
* @file
* @brief    sigplus Image Gallery Plus boxplus slider engine
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
* Support class for jQuery-based boxplus slider engine.
* @see http://hunyadi.info.hu/projects/boxplus/
*/
class SIGPlusBoxPlusSliderEngine extends SIGPlusSliderEngine {
	public function getIdentifier() {
		return 'boxplus.slider';
	}

	public function addStyles() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/slider/css/boxplus.slider.css');
	}

	public function addScripts($id, $params) {
		$this->addJQuery();
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/slider/js/'.$this->getScriptFilename().'.js');
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/lang/boxplus.lang.js');

		$language =& JFactory::getLanguage();
		list($lang, $country) = explode('-', $language->getTag());
		$script =
			'__jQuery__("#'.$id.' ul:first").boxplusSlider({'.
			'rowCount:'.$params->rows.','.
			'columnCount:'.$params->cols.','.
			'orientation:"'.$params->orientation.'",'.
			'navigation:"'.$params->navigation.'",'.
			'showButtons:'.($params->buttons ? 'true' : 'false').','.
			'showLinks:'.($params->links ? 'true' : 'false').','.
			'showPageCounter:'.($params->counter ? 'true' : 'false').','.
			'showOverlayButtons:'.($params->overlay ? 'true' : 'false').','.
			'opacity:'.$params->opacity.','.
			'duration:'.$params->duration.','.
			'animationDelay:'.$params->animation.'}); '.
			'__jQuery__.boxplusLanguage("'.$lang.'", "'.$country.'");';
		$this->addOnReadyScript($script);
	}
}