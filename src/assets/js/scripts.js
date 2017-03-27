import $ from 'jquery';
import { decodeHtmlEntity, mobilecheck, getOrientation, getUrlVars, readCookie } from './app/globals';
import {TweenMax} from "gsap";
import classie from 'classie';
import Isotope from 'isotope-layout';

$(() => {

	'use strict';

	// let view = new HomeView();
	// view.render();

	getHeight();
	getCircleSize();
	search();
	tabs();
	filterItems();
});
$(window).on('scroll', () => {
	fixHeader();
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