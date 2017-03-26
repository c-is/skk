import $ from 'jquery';
import { decodeHtmlEntity, mobilecheck, getOrientation, getUrlVars, readCookie } from './app/globals';
import {TweenMax} from "gsap";
import classie from 'classie';

$(() => {

	'use strict';

	// let view = new HomeView();
	// view.render();

	getHeight();
	getCircleSize();
	search();
	tabs();
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