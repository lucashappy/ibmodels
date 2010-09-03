/*!
* @file
* @brief    boxplus lightweight window engine on mouse-over
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

/*
* boxplus: a lightweight pop-up window engine shipped with sigplus
* Copyright 2009-2010 Levente Hunyadi
*
* boxplus is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* boxplus is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with boxplus.  If not, see <http://www.gnu.org/licenses/>.
*/

if (typeof(__jQuery__) == 'undefined') {
	var __jQuery__ = jQuery.noConflict();
}
(function ($) {
	// DOM elements
	var dialog;                   // lightweight pop-up window dialog
	var dialogWidth;              // initial width for dialog
	var dialogHeight;             // initial height for dialog
	var viewer;                   // image viewer inside dialog
	var caption;                  // image caption inside dialog
	var win = $(window);          // browser window

	// Image visualization
	var preloader = new Image();  // image preloader
	var anchor;                   // anchor to image being displayed

	/**
	* Appends the pop-up window HTML code to the document and initializes global variables.
	* The HTML code inserted is
		<div id="boxplus-dialog" class="hide">
			<div id="boxplus-viewer" class="hide"></div>
			<div id="boxplus-caption" class="hide">
				<p class="title"></p>
				<p class="caption"></p>
			</div>
		</div>
	*/
	$(function () {  // fired when DOM tree is finished loading
		$('body').append('<div id="boxplus-dialog" class="hide"><div id="boxplus-viewer" class="hide"></div><div id="boxplus-caption" class="hide"><p class="title"></p><p class="caption"></p></div></div>');
		
		dialog = $('#boxplus-dialog');
		dialogWidth = dialog.css('width');
		dialogHeight = dialog.css('height');
		viewer = $('#boxplus-viewer');
		caption = $('#boxplus-caption');
	});
	
	/**
	* Returns the width and height of an element as an object.
	*/
	$.fn.dimensions = function () {
		return { width: parseInt(this.css('width')), height: parseInt(this.css('height')) };
	}
	
	/**
	* Binds the lightweight window to appear when thumbnail images are hovered.
	*/
	$.fn.boxplusHover = function () {
		$(this).each(function () {
			$(this).hover(_showWindow, _hideWindow);
		});
	}
	
	/**
	* Binds the lightweight window to appear when images in a gallery are hovered.
	* A gallery should be specified as a list (ul or ol with li as direct children), each of whose elements wraps an individual image.
	*/
	$.fn.boxplusHoverGallery = function () {
		$('li', this).each( function () {
			var anchor = $('a:has(img)', this).eq(0);  // bind to first anchor that wraps an image in each list item
			if (anchor) {
				anchor.boxplusHover();
			}
		});
	};
	
	/**
	* Smart placement for the lightweight window not to cover the thumbnail image that has triggered displaying the window.
	*/
	function _positionWindow(width, height) {
		// increment width and height to take into account dialog margin, border and padding
		width += dialog.outerWidth(true) - parseInt(dialog.css('width'));
		height += dialog.outerHeight(true) - parseInt(dialog.css('height'));
	
		var thumb = $('img:first', anchor);
		var areaoffset = thumb.offset();  // offset w.r.t. document
		
		// dimensions and offset w.r.t. browser window edges
		var arealeft = areaoffset.left - win.scrollLeft();
		var areatop = areaoffset.top - win.scrollTop();
		var areawidth = thumb.outerWidth();
		var areaheight = thumb.outerHeight();

		var error = [
			arealeft + areawidth + width - win.width(),    // position to the right of area
			areatop + areaheight + height - win.height(),  // position to the bottom of area
			width - arealeft                               // position to the left of area
		];

		// find positioning with minimum error
		var index = -1;
		var min = Infinity;
		for (var k in error) {
			if (error[k] < min) {
				index = k;
				min = error[k];
			}
		}
		
		var x = (win.width() - width) / 2;
		var y = (win.height() - height) / 2;
		var pad = 20;  // keeps distance 
		var left = [
			arealeft + areawidth + pad,
			x,
			arealeft - width - pad
		];
		var top = [
			y,
			areatop + areaheight + pad,
			y
		];

		return {
			left: win.scrollLeft() + left[index],
			top: win.scrollTop() + top[index]
		};
	}

	/**
	* Returns smart-placement position for window.
	*/
	function _getPosition(w, h) {
		return $.extend({
			width: w,
			height: h
		}, _positionWindow(w, h));
	}
	
	/**
	* Shows the lightweight pop-up window.
	*/
	function _showWindow(event) {
		anchor = $(event.currentTarget);

		// position the pop-up window
		dialog.css(_positionWindow(dialogWidth, dialogHeight));
		dialog.css({
			width: dialogWidth,
			height: dialogHeight
		});

		// preload image
		preloader.onload = _prepareImage;  // display image when image has been loaded
		preloader.src = anchor.attr('href');

		dialog.removeClass('hide');
	}
	
	/**
	* Hides the lightweight pop-up window.
	*/
	function _hideWindow() {
		dialog.stop();  // clear any pending animations
		dialog.addClass('hide');
		viewer.addClass('hide');
		caption.addClass('hide');
	}
	
	/**
	* Prepares an image for display in the viewer using a preloaded image.
	*/
	function _prepareImage() {
		// set image viewer dimensions
		var w = preloader.width;
		var h = preloader.height;
		viewer.css({
			width: w,
			height: h
		});
		viewer.css('background-image', 'url("' + anchor.attr('href') +'")');

		// resize dialog box with animation
		dialog.css(_getPosition(1, 1));  // set initial position for window
		dialog.animate(_getPosition(w, h), 'fast', 'swing', _showImage);  // ease out to final position for window
	}
	
	/**
	* Displays the image in the viewer.
	*/
	function _showImage() {
		// show image
		viewer.removeClass('hide');
		
		// add caption text
		var thumb = $('img:first', anchor);
		var alttext = thumb.attr('alt');
		var titletext = anchor.attr('title');
		if (alttext && alttext != titletext) {
			$('.title', caption).html(alttext);
		} else {
			$('.title', caption).empty();
		}
		$('.caption', caption).html(titletext);
		
		if (alttext || titletext) {
			// resize dialog to show caption text
			var target = dialog.dimensions();
			target.height += caption.outerHeight(true);
			dialog.animate(target, 'slow', 'swing', _showCaption);
		}
	}
	
	/**
	* Displays the image caption text.
	*/
	function _showCaption() {
		caption.removeClass('hide');
	}
})(__jQuery__);