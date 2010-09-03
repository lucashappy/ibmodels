/**
* @file
* @brief    sigplus Image Gallery Plus save and restore settings control
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

if (typeof(__jQuery__) == 'undefined') {
	var __jQuery__ = jQuery.noConflict();
}

function sigplus_settings_backup(ctrlid) {
	var textarea = __jQuery__('#' + ctrlid);
	var params = __jQuery__(':input[name^=params]').serializeArray();
	var data = __jQuery__.map(params, function (item) {
		var match = /^params\[(.*)\]$/.exec(item.name);
		if (match) {
			return match[1] + '=' + item.value.replace(/\\/g, '\\\\').replace(/\n/g, '\\n');
		}
		return null;
	}).join('\n');
	textarea.val(data);
}

function sigplus_settings_restore(ctrlid) {
	var textarea = __jQuery__('#' + ctrlid);
	__jQuery__.each(textarea.val().split('\n'), function (index, item) {
		var i = item.indexOf('=');
		if (i >= 0) {
			var name = item.substr(0, i);
			var value = item.substr(i+1);
			var elem = __jQuery__(':input[name=params\\[' + name + '\\]]');
			if (elem.is('[type=radio]')) {
				elem.filter('[value=' + value + ']').attr('checked', true);
			} else {
				elem.val(value.replace(/\\n/g,'\n').replace(/\\\\/g,'\\'));
			}
		}
	});
}