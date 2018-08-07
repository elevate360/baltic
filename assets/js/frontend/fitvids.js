(function(f){if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f()}else if(typeof define==="function"&&define.amd){define([],f)}else{var g;if(typeof window!=="undefined"){g=window}else if(typeof global!=="undefined"){g=global}else if(typeof self!=="undefined"){g=self}else{g=this}g.fitvids = f()}})(function(){var define,module,exports;return (function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

'use strict';

var selectors = [
	'iframe[src*="player.vimeo.com"]',
	'iframe[src*="youtube.com"]',
	'iframe[src*="youtube-nocookie.com"]',
	'iframe[src*="kickstarter.com"][src*="video.html"]',
	'object'
];

module.exports = function (parentSelector, opts) {
	parentSelector = parentSelector || 'body';
	opts = opts || {};

	if (isObject(parentSelector)) {
		opts = parentSelector;
		parentSelector = 'body';
	}

	opts.ignore = opts.ignore || '';
	opts.players = opts.players || '';

	var containers = queryAll(parentSelector);
	if (!hasLength(containers)) {
		return;
	}

	var custom = toSelectorArray(opts.players) || [];
	var ignored = toSelectorArray(opts.ignore) || [];
	var selector = selectors
		.filter(notIgnored(ignored))
		.concat(custom)
		.join();

	if (!hasLength(selector)) {
		return;
	}

	containers.forEach(function (container) {
		var videos = queryAll(container, selector);
		videos.forEach(function (video) {
			wrap(video);
		});
	});
};

function queryAll (el, selector) {
	if (typeof el === 'string') {
		selector = el;
		el = document;
	}
	return Array.prototype.slice.call(el.querySelectorAll(selector));
}

function toSelectorArray (input) {
	if (typeof input === 'string') {
		return input.split(',').map(trim).filter(hasLength);
	} else if (isArray(input)) {
		return flatten(input.map(toSelectorArray).filter(hasLength));
	}
	return input || [];
}

function wrap (el) {
	if (/fluid-width-video-wrapper/.test(el.parentNode.className)) {
		return;
	}

	var widthAttr = parseInt(el.getAttribute('width'), 10);
	var heightAttr = parseInt(el.getAttribute('height'), 10);

	var width = !isNaN(widthAttr) ? widthAttr : el.clientWidth;
	var height = !isNaN(heightAttr) ? heightAttr : el.clientHeight;
	var aspect = height / width;

	el.removeAttribute('width');
	el.removeAttribute('height');

	var wrapper = document.createElement('div');
	el.parentNode.insertBefore(wrapper, el);
	wrapper.className = 'fluid-width-video-wrapper';
	wrapper.style.paddingTop = (aspect * 100) + '%';
	wrapper.appendChild(el);
}

function notIgnored (ignored) {
	if (ignored.length < 1) {
		return function () {
			return true;
		};
	}
	return function (selector) {
		return ignored.indexOf(selector) === -1;
	};
}

function hasLength (input) {
	return input.length > 0;
}

function trim (str) {
	return str.replace(/^\s+|\s+$/g, '');
}

function flatten (input) {
	return [].concat.apply([], input);
}

function isObject (input) {
	return Object.prototype.toString.call(input) === '[object Object]';
}

function isArray (input) {
	return Object.prototype.toString.call(input) === '[object Array]';
}

},{}]},{},[1])(1);
});
