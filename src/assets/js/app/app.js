import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import TweenLite from 'TweenLite';
import classie from 'classie';
import itemsJson from '../../../json/miserables.json';

class Services extends Component {
	handleClick = (event) => {
		event.preventDefault();

		let parentel = event.currentTarget.parentNode;
		setTimeout(()=>{
			classie.remove(parentel, 'clicked');
			TweenLite.to('.cube-container', 0.4, {height: '0%', onComplete:()=>{
				TweenLite.set('.cube-container', { 'borderTop': '1px solid #15e0f9' });
				TweenLite.to('.cube-container', 0.6, { width: '0%', onComplete:()=>{
					TweenLite.to('.node-infobox', 0.4, { alpha: 0, onComplete: ()=>{
						TweenLite.set('.node-infobox', {x: '100%'});
					}});
				} });
			}});
		},500);
	}
	render(){
		let example = `<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<span>`;

		return (
			<div className="services-inner">
				<div className="chart">
					<div className="hud">
						<div className="hud__core">
							<span className="hud__number">6</span>
							<svg id="core-image" viewBox="0 0 63.5 55">
								<defs/>
								<polygon className="cls-1" points="16.75 1.5 46.77 1.51 61.77 27.51 46.75 53.5 16.73 53.49 1.73 27.49 16.75 1.5"/>
								<polygon className="cls-2" points="23.09 12.5 40.41 12.51 49.07 27.51 40.4 42.5 23.09 42.49 14.43 27.5 23.09 12.5"/>
								<line className="cls-2" x1="46.77" x2="40.41" y1="1.51" y2="12.51"/>
								<line className="cls-2" x1="16.75" x2="23.09" y1="1.5" y2="12.5"/>
								<line className="cls-2" x1="14.43" x2="1.73" y1="27.49" y2="27.49"/>
								<line className="cls-2" x1="23.09" x2="16.73" y1="42.49" y2="53.49"/>
								<line className="cls-2" x1="40.4" x2="46.75" y1="42.5" y2="53.5"/>
								<line className="cls-2" x1="49.07" x2="59.75" y1="27.51" y2="27.5"/>
							</svg>
						</div>
						<div className="lines">
							<span className="cate-line line-4"></span>
							<span className="cate-line line-5"></span>
							<span className="cate-line line-3"></span>
							<span className="cate-line line-2"></span>
							<span className="cate-line line-1"></span>
							<span className="cate-line line-0"></span>
						</div>
					</div>
					<FilteredList />
				</div>
				<div className="cube-container">
					<a className="info-close button button--close" onClick={this.handleClick}>CLOSE</a>
					<div className="cube">
						<div className="node-infobox__content">
							{example}
						</div>
					</div>
				</div>
			</div>
		)
	}
}

class FilteredList extends Component {
	state = {
		initialItems: [],
		items: []
	}
	loadData() {
		let data = [];

		this.setState({
			initialItems: itemsJson.nodes,
			items: itemsJson.nodes,
		});
	}
	componentWillMount() {
		this.loadData();
	}
	componentDidMount() {
	}
	filterList = (event) => {
		let updatedList = this.state.initialItems;
		updatedList = updatedList.filter((item)=>{
			return item.name.toLowerCase().search(
			event.target.value.toLowerCase()) !== -1;
		});
		this.setState({items: updatedList});

		let num = document.querySelector('.hud__number');
		num.innerHTML = updatedList.length;
	}
	render() {
		return (
			<div className="service-list">
				<input type="text" placeholder="Search" onChange={this.filterList}/>
				<ServicesRow services={this.state.items}/>
			</div>
		);
	}
}
class ServicesRow extends Component {
	constructor(props) {
		super(props);
	}
	handleClick = (event) => {
		event.preventDefault();

		let parentel = event.currentTarget.parentNode;
		classie.add(parentel, 'clicked');
		setTimeout(()=>{
			classie.remove(parentel, 'clicked');
			TweenLite.to('.node-infobox', 0.4, { x: '0%', alpha: 1, onComplete: ()=>{
				TweenLite.to('.cube-container', 0.6, { width: '45%', onComplete:()=>{
					TweenLite.to('.cube-container', 0.3, {height: '60%'});
					TweenLite.set('.cube-container', { 'borderTop': 'none' });
				} });
			}});
		},500);
	}
	lineHover = (event) => {
		let el = event.currentTarget;
		let line = el.getAttribute('data-line');
		TweenLite.to(line, 0.4, { alpha: 1 });
	}
	LinesOut = (event) => {
		TweenLite.to('.cate-line', 0.4, { alpha: 0.4 });
	}
	render() {
		return (
			<div className="service-list-items">
				{this.props.services.map((item, index) => {
					return (
						<div key={index} className="item">
							<a href={item.link} onClick={this.handleClick} onMouseOver={this.lineHover} onMouseLeave={this.linesOut}>{item.name}</a>
						</div>
					)
				})}
			</div>
		);
	}
}

ReactDOM.render(
  <Services />,
  document.getElementById('services')
);