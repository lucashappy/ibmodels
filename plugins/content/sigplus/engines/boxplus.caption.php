<?php
/**
* @file
* @brief    sigplus Image Gallery Plus boxplus mouse-over caption engine
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
* Support class for jQuery-based boxplus mouse-over caption engine.
* @see http://hunyadi.info.hu/projects/boxplus/
*/ 
class SIGPlusBoxPlusCaptionEngine extends SIGPlusCaptionsEngine {
	public function getIdentifier() {
		return 'boxplus.caption';
	}

	public function addStyles() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/caption/css/boxplus.caption.css');

		// include style sheet in HTML head section to target Internet Explorer
		$this->addCustomTag('<!--[if IE]><link rel="stylesheet" href="'.JURI::base(true).'/plugins/content/sigplus/engines/boxplus/caption/css/boxplus.caption.ie.css" type="text/css" /><![endif]-->');
	}

	public function addScripts($id, $params) {
		$this->addJQuery();
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/caption/js/'.$this->getScriptFilename().'.js');
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/boxplus/lang/boxplus.lang.js');

		$engineservices =& SIGPlusEngineServices::instance();
		if ($params->metadata) {
			$metadatabox = $engineservices->getMetadataEngine($params->lightbox);
			if ($metadatabox) {
				$metadatabox->addStyles();
				$metadatafun = $metadatabox->getMetadataFunction();
			}
		}
		
		$language =& JFactory::getLanguage();
		list($lang, $country) = explode('-', $language->getTag());
		$script =
			'__jQuery__("#'.$id.'").boxplusCaptionGallery({'.
				'download:'.($params->download ? 'function (image) { var d = __jQuery__("#" + image.attr("id") + "_metadata a[rel=download]"); return d.size() ? d.attr("href") : false; }' : 'false').','.
				'metadata:'.(isset($metadatafun) ? 'function (image) { var m = __jQuery__("#" + image.attr("id") + "_iptc"); return m.size() ? m : false; }' : 'false').','.
				'dialog:'.(isset($metadatafun) ? $metadatafun : 'false').
			'}); '.
			'__jQuery__.boxplusLanguage("'.$lang.'", "'.$country.'");';
		$this->addOnReadyScript($script);
	}
}