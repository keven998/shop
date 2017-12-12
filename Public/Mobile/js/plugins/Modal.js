'use strict';

var Modal = {

	time: 3000, // 自动消失时间
	autoOut: false, // 是否自动隐藏
	times: null, // 计时

	/**
  * 加载状态
  * 
  */
	loading: function loading(time) {
		time = time != null ? time : 500;
		var html = '';
		html += '<div class="ms-modal ms-modalLoading ms-middle show"><div class="bg"></div>', html += '<div class="content"><div class="panel none">', html += '<div class="loading"><img src="/public/app/wapyx/statics/images/loading.gif" /></div>';
		html += '</div></div></div>';
		this.times = setTimeout(function () {
			$('body').append(html);
		}, time);
	},


	/**
  * 弹窗
  * opt  {Object}
  * --- class: 样式名
  * --- content: 弹窗内容
  * --- okText: 成功弹窗按钮文字
  * --- onSucess: 回调函数
  * --- isCallback: 是否回调关闭
  */
	activity: function activity(options) {
		var _this = this;
		var defaults = {
			class: '',
			content: '',
			okText: '',
			isCallback: false,
			onSucess: function onSucess() {},
			onCancel: function onCancel() {}
		};
		var settings = $.extend({}, defaults, options || {});
		console.log(settings);
		var html = '';
		html += '<div class="ms-modal ms-middle show ' + settings.class + '"><div class="bg"></div>', html += '<div class="content"><div class="panel none">', html += '<a href="javascript:void(0);" id="closeBtn"></a><a href="javascript:void(0);" id="okText">' + settings.okText + '</a>', html += settings.content, html += '</div></div></div>';
		$('body').append(html);
		$('#closeBtn').on('click', function () {
			if (!settings.isCallback) _this.remove();
			settings.onCancel();
		});
		$(document).on('click', '#okText', function (e) {
			if (!settings.isCallback) _this.remove();
			settings.onSucess();
		});
	},


	/**
  * 弹窗
  * opt  {Object}
  * --- title: 弹窗标题
  * --- content: 弹窗内容
  * --- okText: 成功弹窗按钮文字
  * --- onSucess: 回调函数
  */
	alert: function alert(options) {
		var _this = this;
		var defaults = {
			title: '',
			content: '',
			okText: '',
			cancelText: '',
			isClose: false,
			isCallback: false,
			onSucess: function onSucess() {}
		};
		var settings = $.extend({}, defaults, options || {});
		var html = '';
		html += '<div class="ms-modal ms-middle show"><div class="bg"></div>', html += '<div class="content"><div class="panel">', html += '<a href="javascript:;" id="closeModal">x</a>';
		html += '<div class="txt">', html += '<h4>' + settings.title + '</h4><p>' + settings.content + '</p></div>', html += '<div class="btn">', html += '<button class="okText red">' + settings.okText + '</button>', html += '</div></div></div></div>';
		$('body').append(html);

		$('.okText').on('click', function () {
			if (!settings.isCallback) _this.remove();
			settings.onSucess();
		});

		$(document).on('click', '#closeModal', function () {
			_this.remove();
		});
	},


	/**
  * 弹窗确认
  * opt  {Object}
  * --- title: 弹窗标题
  * --- content: 弹窗内容
  * --- cancelText: 失败弹窗按钮文字
  * --- okText: 成功弹窗按钮文字
  * --- onCancel: 回调函数
  * --- onSucess: 回调函数
  */
	confirm: function confirm(options) {
		var _this2 = this;

		var defaults = {
			title: '',
			content: '',
			okText: '',
			cancelText: '',
			onSucess: function onSucess() {},
			onCancel: function onCancel() {}
		};
		var settings = $.extend({}, defaults, options || {});
		var html = '';
		html += '<div class="ms-modal ms-middle show"><div class="bg"></div>', html += '<div class="content"><div class="panel">', html += '<div class="txt">', html += '<h4>' + settings.title + '</h4><p>' + settings.content + '</p></div>', html += '<div class="btn">', html += '<button class="cancelText">' + settings.cancelText + '</button>', html += '<button class="okText red">' + settings.okText + '</button>', html += '</div></div></div></div>';
		$('body').append(html);

		$('.cancelText, .okText').on('click', function (e) {
			if (e.target.className.split(' ')[0] == 'okText') {
				settings.onSucess();
			} else {
				settings.onCancel();
			}
            _this2.remove();
		});
	},


	/**
  * Tip
  * opt  {Object}
  * --- content: 弹窗内容
  * --- time: 显示时间
  */
	tip: function tip(options, callback) {
		var defaults = {
			content: '',
			time: this.time
		};
		var settings = $.extend({}, defaults, options || {});
		var html = '';
		html += '<div class="ms-modal ms-modalTip ms-middle show">', html += '<div class="content"><div class="tip">', html += '<div class="txt">', html += '<p>' + settings.content + '</p>', html += '</div></div></div></div>';
		$('body').append(html);

		setTimeout(function () {
			$('.ms-modalTip').hide().remove();
			callback && callback();
		}, settings.time);
	},


	// 移除
	remove: function remove() {
		clearTimeout(this.times);
		$('.ms-modal').remove();
	},


	// 移除时间
	removeTime: function removeTime(time) {
		var _this4 = this;

		setTimeout(function () {
			_this4.remove();
		}, time);
	}
};