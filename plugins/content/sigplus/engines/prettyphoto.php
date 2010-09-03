<?php
/**
* @file
* @brief    sigplus Image Gallery Plus prettyPhoto lightbox engine
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Support class for prettyPhoto (jQuery-based).
* @see http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
*/
class SIGPlusPrettyPhotoEngine extends SIGPlusLightboxEngine {
	private $theme = 'light_rounded';

	public function getIdentifier() {
		return 'prettyphoto';
	}

	public function __construct($params = false) {
		if (isset($params['theme'])) {
			$this->theme = $params['theme'];
		}
	}

	/**
	* Adds style sheet references to the HTML @c head element.
	*/
	public function addStyles() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base(true).'/plugins/content/sigplus/engines/'.$this->getIdentifier().'/css/'.$this->theme.'/'.$this->getIdentifier().'.css');
		parent::addStyles();
	}

	protected function addCommonScripts() {
		$this->addJQuery();
		parent::addCommonScripts();
	}

	public function addActivationScripts() {
		$this->addCommonScripts();
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base(true).'/plugins/content/sigplus/engines/'.$this->getIdentifier().'/js/activation.php?theme='.$this->theme);
	}

	public function addScripts($galleryid) {
		$this->addCommonScripts();
		$script = '__jQuery__("#'.$galleryid.' a[rel^=\'prettyphoto\']").prettyPhoto({theme:"'.$this->theme.'"});';
		$this->addOnReadyScript($script);
	}

	public function getLinkAttribute($gallery = false) {
		if ($gallery !== false) {
			return $this->getIdentifier().'['.$gallery.']';
		} else {
			return $this->getIdentifier();
		}
	}
}
