<?php
/**
* @file
* @brief    sigplus Image Gallery Plus Sexy Lightbox 2 engine
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Support class for Sexy Lightbox 2 (jQuery-based).
* @see http://www.coders.me/lang/en/web-html-js-css/javascript/sexy-lightbox-2
*/
class SIGPlusSexyLightboxEngine extends SIGPlusLightboxEngine {
	private $theme = 'black';

	public function getIdentifier() {
		return 'sexylightbox';
	}

	public function __construct($params = false) {
		if (isset($params['theme'])) {
			$this->theme = $params['theme'];
		}
	}

	protected function addCommonScripts() {
		$this->addJQuery();
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/js/jquery.easing.js');  // duplicates are ignored
		parent::addCommonScripts();
	}

	public function addScripts($galleryid) {
		$this->addCommonScripts();
		$script = 'SexyLightbox.initialize({ dir:"'.JURI::base(true).'/plugins/content/sigplus/engines/sexylightbox/css", color:"'.$this->theme.'" });';
		$this->addOnReadyScript($script);
	}
}
