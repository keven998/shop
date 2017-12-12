'use strict';

var _scrollTop = {

    /**
     * 添加 HTML 代码
     */
    init: function init() {
        var html = "<div id='goTop' style='display: none; position: fixed; bottom: 1.9rem; right: .25rem; width: 1rem; height: 1rem; z-index: 100;'>";
        html += "<img src='/Public/Mobile/images/goTop.png' style='width: 100%; height: 100%;' /></div>";
        $('body').append(html);
        this.bindScrollEvnet();
    },

    /**
     * 事件绑定
     */
    bindScrollEvnet: function bindScrollEvnet() {
        $(window).scroll(function () {
            var _top = $(window).scrollTop(),
                _height = $(window).height();
            _top > _height ? $('#goTop').show() : $('#goTop').hide();
        });
        $('#goTop').click(function () {
            var curScroll = $(document.body).scrollTop(); //获取当前scrollTop的位置
            var speed = 50; //上升的位移
            if (curScroll > 0) setInterval(timer, 1);
            function timer() {
                if (curScroll > 0) {
                    curScroll = curScroll - speed;
                    $(document.body).scrollTop(curScroll);
                    if (curScroll <= 0) {
                        $(document.body).scrollTop(0);
                        clearInterval(timer);
                    }
                }
            }
        });
    }
};