/*!
* @file
* @brief    boxplus strings for localization
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

if (typeof(__jQuery__) == 'undefined') {
	var __jQuery__ = jQuery.noConflict();
}
(function ($) {
	var code = '';

	/** Language strings. */
	var localizations = {
		'en': {
			first: 'First',
			prev: 'Previous',
			next: 'Next',
			last: 'Last',
			close: 'Close',
			enlarge: 'Enlarge',
			shrink: 'Shrink',
			download: 'Download',
			metadata: 'Image metadata'
		},
		'de': {
			first: 'Erstes',
			prev: 'Zurück',
			next: 'Weiter',
			last: 'Letztes',
			close: 'Schließen',
			enlarge: 'Vergrößern',
			shrink: 'Verkleinern',
			download: 'Download',
			metadata: 'Bild Metadaten'
		},
		'hu': {
			first: 'Első',
			prev: 'Előző',
			next: 'Következő',
			last: 'Utolsó',
			close: 'Bezár',
			enlarge: 'Nagyít',
			shrink: 'Kicsinyít',
			download: 'Letöltés',
			metadata: 'Kép metadatai'
		},
		'sk': {
			first: 'Prvá',
			prev: 'Vzad',
			next: 'Vpred',
			last: 'Posledná',
			close: 'Zavrieť',
			enlarge: 'Rozšíriť',
			shrink: 'Zúžiť',
			download: 'Stiahnutie',
			metadata: 'Metaúdaje obrázkov'
		}
	};

	/**
	* Get language strings and/or set language and country for localization.
	* @param langcode A language code in the ISO format "en".
	* @param countrycode A country code in the ISO format "US".
	* @return Language strings as an object.
	*/
	$.boxplusLanguage = function (langcode, countrycode) {
		if (arguments.length > 0) {
			var isocode = countrycode ? langcode + '-' + countrycode : langcode;

			// get language strings for selected language
			code = localizations.hasOwnProperty(isocode) ? isocode : ( localizations.hasOwnProperty(langcode) ? langcode : '' );

			var localization = { first: '', prev: '', next: '', last: '', close: '', enlarge: '', shrink: '', download: '', metadata: '', counter: '' };
			if (code) {
				$.extend(localization, localizations[code]);
			}
			
			// apply language strings
			$.each(localization, function (key, value) {
				$('div.boxplus-' + key).attr('title', value);
				$('a.boxplus-' + key).html(value);
				$('span.boxplus-' + key).html(value);
			});
		}
		return code;
	};

	// automatically select language when DOM tree is ready loading
	$(function () {
		var pattern = /lang=([a-z]{2,})(?:-([A-Z]{2,}))?/;
		$('script[src*="boxplus"][src*=lang]').each(function () {
			var match = pattern.exec($(this).attr('src'));
			if (match) {
				$.boxplusLanguage(match[1], match[2]);
			}
		});
	});
})(__jQuery__);
