<?php
/**
* @file
* @brief    sigplus Image Gallery Plus Slimbox lightbox engine
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Support class for Slimbox (MooTools-based).
* @see http://www.digitalia.be/software/slimbox
*/
class SIGPlusSlimboxEngine extends SIGPlusLightboxEngine {
	public function getIdentifier() {
		return 'slimbox';
	}

	protected function addCommonScripts() {
		$this->addMooTools();
		parent::addCommonScripts();
	}

	public function addScripts($galleryid) {
		$this->addInitializationScripts();
		$script = 'bindSlimbox($("'.$galleryid.'"));';
		$this->addOnReadyScript($script);
	}
}
