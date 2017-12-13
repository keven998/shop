'use strict';
/**
 * 滚动加载
 */

var Scroll = {

	lastScrollY: 0, // 最后次滚动高度
	scrollY: 0, // 滚动高度
	innerHeight: 0, // 窗口高度
	isLoading: true, // 是否加载完成
	isOver: false, // 是否全部加载完毕
	options: {}, // 参数

	// 初始化函数
	init: function init(opt) {
		this.lastScrollY = this.scrollY = Scroll.getScrollTop();
		this.optitons = opt;
		this.handleScroll();
	},
	getScrollTop: function getScrollTop() {
		var supportPageOffset = window.pageYOffset !== undefined;
		var isCSS1Compat = (document.compatMode || "") === "CSS1Compat";
		var y = supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
		return y;
	},
	handleScroll: function handleScroll() {
		var _this = this;

		if (this.isOver) return clearInterval(window.scrollTime);

		// body 滚动高度
		var bodyScrollY = this.getScrollTop();

		// 如果时间间隔内，没有发生滚动，且并未强制触发加载，则do nothing，再次间隔100毫秒之后查询
		if (this.lastScrollY === bodyScrollY) {
			window.scrollTime = setTimeout(function () {
				_this.handleScroll();
			}, 500);
			return;
		}

		// 更新文档滚动位置
		this.lastScrollY = this.scrollY = bodyScrollY;

		// 浏览器窗口的视口（viewport）高度赋值
		this.innerHeight = window.outerHeight * window.dpr;

		// 判断是否需要加载，document.body.offsetHeight;返回当前网页高度
		if (this.isLoading && this.scrollY + this.innerHeight + 400 > document.body.offsetHeight) {
			// !isLoading &&
			this.optitons.callback(Scroll);
		}

		window.scrollTime = setTimeout(function () {
			_this.handleScroll();
		}, 500);
	}
};