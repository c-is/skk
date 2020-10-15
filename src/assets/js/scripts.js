import $ from 'jquery';
import { decodeHtmlEntity, mobilecheck, getOrientation, getUrlVars, readCookie } from './app/globals';
import {TweenMax} from "gsap";
import classie from 'classie';
import Isotope from 'isotope-layout';

$(() => {

	'use strict';

	getHeight();
	getCircleSize();
	search();
	tabs();
	backToTop();

	new ClickableImage();

	if (document.querySelector('.article-list--archives')) filterItems();

	let slug = window.location.pathname.replace(/\//g, '');

	if (slug === '') youtubeFn();
});

$(window).on('scroll', () => {
	fixHeader();
	backToTopAppering();
});

function getHeight() {
	let windowHeight = window.innerHeight;
	let headerHeight = document.querySelector('.header').offsetHeight;
	let footerHeight = document.querySelector('.footer').offsetHeight;
	TweenMax.set('.js-get-height', { height: windowHeight - headerHeight });
}
function getCircleSize() {
	let elHeight = $('.js-circle').height();
	TweenMax.set('.js-circle', { width: elHeight });
}
let header = document.querySelector('.header');
function fixHeader() {
	let scrollVal = $(window).scrollTop();

	if(scrollVal > 0) {
		classie.add(header, 'fixed');
	} else {
		classie.remove(header, 'fixed');
	}
}
function backToTopAppering() {
	let scrollVal = $(window).scrollTop();
	let windowHeight = window.innerHeight;

	if(scrollVal > windowHeight) {
		TweenMax.to('.js-backtotop', 0.4, { autoAlpha: 1 });
	} else {
		TweenMax.to('.js-backtotop', 0.4, { autoAlpha: 0 });
	}
}
function backToTop() {
	$(document).on('click', '.js-backtotop', (event) => {
		event.preventDefault();
		$('body, html').animate({ scrollTop: 0 });
	});
}

function search() {
	let active = false;
	let $icon;
	$(document).on('click', '.js-search-trigger', (event) => {
		event.preventDefault();
		let tar = event.currentTarget.getAttribute('data-popup');
		$icon = $(event.currentTarget).children('.icon');

		if(active) {
			resetPopup();
		} else {
			let overlay = document.createElement('div');
			overlay.className = 'overlay overlay--search';
			document.body.appendChild(overlay);

			$(tar).addClass('active');
			$icon.removeClass('fa-search');
			$icon.addClass('fa-times');
			active = true;
			overlay.addEventListener('click', resetPopup);
		}
	});
	function resetPopup() {
		let overlay = document.querySelector('.overlay--search');
		document.body.removeChild(overlay);
		overlay.removeEventListener('click', resetPopup);
		$('.popup').removeClass('active');
		$icon.addClass('fa-search');
		$icon.removeClass('fa-times');
		active = false;
	}
}
function tabs() {
	$(document).on('click', '.js-tab', (event) => {
		event.preventDefault;

		let tar = event.currentTarget.getAttribute('data-tab');
		$('.js-tab, .js-tab-content').removeClass('active');
		$(event.currentTarget).add(tar).addClass('active');
	});
}

function filterItems() {
	//let archive = document.querySelector('.article-list--archives');
	let initCategory = window.location.pathname.replace(/\//g, '');
	let initVal = (initCategory && initCategory !== 'archives' ) ? `.category-${initCategory}` : '';
	let iso = new Isotope( '.article-list--archives', {
		itemSelector: '.article--item',
		layoutMode: 'fitRows',
		filter: initVal
	});
	let filters = {};

	if(initVal) { 
		$('.js-filter-select').val(initVal);
		filters['category'] = initVal;
	}

	$('.js-filter').on( 'click', '.js-filter-trigger', (event) => {
		event.preventDefault();
		
		let value = $(event.currentTarget).attr('data-filter');
		let filterValue = filtersSave(event.currentTarget, value);
		
		$('.js-filter-trigger').removeClass('active');
		$(event.currentTarget).addClass('active');

		iso.arrange({
			// item element provided as argument
			filter: filterValue,
		});
	});
	$('.js-filter').on( 'change', '.js-filter-select', (event) => {
		event.preventDefault();
		
		let value = $(event.currentTarget).val();
		let filterValue = filtersSave(event.currentTarget, value);
		
		iso.arrange({
			// item element provided as argument
			filter: filterValue,
		});
	});

	function filtersSave(el, val) {
		let filterGroup = $(el).parents('.js-filter').attr('data-filter-group');
		filters[filterGroup] = val;
		let filterValue = concatValues(filters);

		return filterValue;
	}
	function concatValues( obj ) {
		let value = '';
		for ( let prop in obj ) {
			value += obj[ prop ];
		}
		return value;
	}
}

function youtubeFn() {
	let player = new YT.Player('video-player', {
		height: '390',
		width: '640',
		videoId: '5X8GuwTRqVA',
		playerVars: {
			color: '#000',
			playsinline: 1,
			modestbranding: 1,
			autohide: 1,
			controls: 0,
			showinfo: 0,
			rel: 0,
			loop: 0
		},
		events: {
			onReady: onPlayerReady,
			//onStateChange: onPlayerStateChange
		},
	});

	function onPlayerReady(event) {
	  player.setPlaybackQuality('hd720');
	  // event.target.mute();
	  event.target.unMute();
	  event.target.playVideo();
	}

	var done = false;
	function onPlayerStateChange(event) {
	  if (event.data == YT.PlayerState.PLAYING && !done) {
	    setTimeout(stopVideo, 6000);
	    done = true;
	  }
	}
	function stopVideo() {
	  player.stopVideo();
	}
}

class ClickableImage {
	constructor(options) {
		this.events();
	}
	events() {
		$(document).on('click', '.js-enlarge-image', (event) => {
			this.enlargeImage(event);

			return false;
		});
	}
	closeImage = () => {
		console.log('closed');
		TweenMax.to(this.el, 0.4, { autoAlpha: 0, onComplete: () => {
			this.el.removeEventListener('click', this.closeImage);
			document.body.removeChild(this.el);
		}});
	};
	enlargeImage = (event) => {
		let src = event.currentTarget.getAttribute('src');
		let img = document.createElement('img');

		this.el = document.createElement('div');
		img.setAttribute('src', src);
		this.el.className = 'enlarge-image';

		this.el.appendChild(img);
		document.body.appendChild(this.el);

		console.log('enlarged');

		TweenMax.to(this.el, 0.4, { autoAlpha: 1 });

		this.el.addEventListener('click', this.closeImage);
	}
}