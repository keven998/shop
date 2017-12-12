'use strict';

var selectAddress = {};
var id = 'plugin-selectAddress';

selectAddress.selectAddressHTML = function () {
	var html = '';
	html += '<a href="javascript:void(0);" class="click" id="ms-jsClickSelect"></a>';
	html += '<input type="text" placeholder="省、城市、县区" id="ms-addressTxt">', html += '<div class="ms-ModalBg"></div>';
	html += '<div class="ms-Select ms-middle" id="ms-jsAddresseBox">';
	html += '<div class="content"><div class="title clearfix">';
	html += '<a href="javascript:void(0);" id="ms-jsTrue">确定</a></div>';
	html += '<div class="selectBox selectAddressBox"><div class="bg"></div>';
	html += '<div class="address-swiperColumn classA" id="classA" data-key="0"><div class="address-wrapper"></div></div>';
	html += '<div class="address-swiperColumn classB" id="classB" data-key="1"><div class="address-wrapper"></div></div>';
	html += '<div class="address-swiperColumn classC" id="classC" data-key="2"><div class="address-wrapper"></div></div>';
	html += '</div></div></div>';
	$('#' + id).parent().append(html);
};

selectAddress.init = function () {
	this.selectAddressHTML();

	// 地区裤
	var data = unid(region_Data);
	var args = $('#' + id).attr('data-optionsId').split(',');

	var ids = [data[args[0]], data[args[1]], data[args[2]]];

	var opt_1 = ids[0] ? ids[0].split(':') : '',
	    opt_2 = ids[1] ? ids[1].split(':') : '',
	    opt_3 = ids[2] ? ids[2].split(':') : '';

	if (ids[0] != undefined) {
		var str = '';
		var txt = '';
		if (opt_1[0]) {
			str += opt_1[0] + '/';
			txt += opt_1[0] + ' ';
		}
		if (opt_3[0]) {
			str += opt_2[0] + '/' + opt_3[0] + ':' + opt_3[1];
			txt += opt_2[0] + ' ' + opt_3[0];
		} else {
			str += opt_2[0] + ':' + opt_2[1];
			txt += opt_2[0];
		}
		$('#ms-addressTxt').val(txt);
		$('#' + id).val('mainland:' + str);
	}

	ids = ids[0] == undefined ? ['北京:1:0', '北京市:64:0', '东城区:575'] : ids;

	console.log(ids);
	swiperFun('classA', ids, 0); // 省
	swiperFun('classB', ids, 1); // 市
	swiperFun('classC', ids, 2); // 区


	function swiperFun(clas, arg, grade, bool) {
		bool = bool == undefined ? false : bool;

		var index = 0;
		var items = '';

		// if (!arg[grade]){
		// 	console.log(arg[grade])
		// 	var id = null;
		// } else {
		// 	var id = arg[grade].split(':')[1];
		// 	console.log(id)
		// }

		var id = arg[grade] == undefined ? null : arg[grade].split(':')[1];

		// var id = arg[grade].split(':')[1];

		if (grade == 0) {
			items = region_Data[grade] || [];
		} else {
			var childKey = ids[grade - 1].split(':')[2];
			items = region_Data[grade][childKey] || [];
		}

		// console.log(region_Data)

		new Swiper('.' + clas, {
			wrapperClass: 'address-wrapper',
			slideClass: 'address-slide',
			slideActiveClass: 'address-slide-active',
			direction: 'vertical',
			slidesPerView: 5,
			freeModeSticky: true,
			centeredSlides: true,
			mousewheelControl: true,
			onInit: function onInit(swiper) {
				var html = '';
				items.map(function (v, i) {
					var d = v.split(':');
					if (d[1] == id && !bool) index = i;
					html += '<a class="address-slide " href="javascript:void(0);" data-val="' + d[0] + '" data-key="' + d[1] + '" data-nKey="' + d[2] + '" data-id="' + grade + '"><span>' + d[0] + '</span></a>';
				});

				$('#' + clas + ' .address-wrapper').html('');
				swiper.appendSlide(html);
				swiper.slideTo(index, 0, false);
			},
			onSlideChangeEnd: function onSlideChangeEnd(swiper) {
				var activeIndex = swiper.activeIndex;

				if (grade == 0) {
					var a = region_Data[grade][activeIndex];
					var b = region_Data[grade + 1][a.split(':')[2]][0];
					var c = region_Data[grade + 2][b.split(':')[2]] ? region_Data[grade + 2][b.split(':')[2]][0] : [];
					ids = [a, b, c];
					console.log(ids);
					swiperFun('classB', ids, 1, true); // 市
					swiperFun('classC', ids, 2, true); // 区
				} else if (grade == 1) {
					var a = ids[0];
					var b = region_Data[grade][a.split(':')[2]][activeIndex];
					var c = region_Data[grade + 1][b.split(':')[2]] ? region_Data[grade + 1][b.split(':')[2]][0] : "";
					ids = [a, b, c];
					console.log(ids);
					swiperFun('classC', ids, 2); // 区
				} else if (grade == 2) {
					var b = ids[1];
					var c = region_Data[grade][b.split(':')[2]][activeIndex];
					ids[grade] = c;
					console.log(ids);
				}
				swiper.update();
			},

			onTouchEnd: function onTouchEnd(swiper) {
				swiper.update();
			}
		});
	}

	$(document).on('click', '#ms-jsClickSelect', function () {
		// 地址选择触发
		$('.ms-Select,.ms-ModalBg').addClass('show');
	}).on('click', '#ms-jsTrue, .ms-ModalBg', function () {
		var opt_1 = ids[0] ? ids[0].split(':') : '',
		    opt_2 = ids[1] ? ids[1].split(':') : '',
		    opt_3 = ids[2] ? ids[2].split(':') : '';

		var str = '';
		var txt = '';
		if (opt_1[0]) {
			str += opt_1[0] + '/';
			txt += opt_1[0] + ' ';
		}
		if (opt_3[0]) {
			str += opt_2[0] + '/' + opt_3[0] + ':' + opt_3[1];
			txt += opt_2[0] + ' ' + opt_3[0];
		} else {
			str += opt_2[0] + ':' + opt_2[1];
			txt += opt_2[0];
		}

		$('#ms-addressTxt').val(txt);
		$('#' + id).val('mainland:' + str);

		// var str = opt_1[0] + ' ' + (opt_3[0] != '' ? opt_2[0] + ' ' + opt_3[0] + ':' + opt_3[1] : opt_2[0] + ':' + opt_2[1]);
		//
		// $('#ms-addressTxt').val(opt_1[0] + ' ' + opt_2[0] + ' ' + opt_3[0]);
		// $('#' + id).val('mainland:' + str);

		var key = $('#ms-jsSelect a.active').data('key');
		var val = $('#ms-jsSelect a.active').data('val');
		$('#selectTxt').text(val);
		$('.ms-Select,.ms-ModalBg').removeClass('show');
	});
};

// selectAddress.init()


// 多维数组转一维
function unid(arr) {
	var arr1 = (arr + '').split(','); //将数组转字符串后再以逗号分隔转为数组
	var arr2 = {};
	arr1.map(function (x) {
		arr2[x.split(":")[1]] = x;
	});
	return arr2;
}