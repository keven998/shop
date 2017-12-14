var Modal = {};

/*
 * 确定弹窗
 */
Modal.alert = function (options) {
    var defaults = {
        // 标题
        title: '',
        // 内容
        content: '',
        // 是否显示x
        isDel: true,
        // 按钮文本，不填默认为确定
        okText: '确定',
        // 按钮文本，不填默认为取消
        noText: '取消',
        // 内容距离按钮高度,默认50px,如需修改可以自行填写高度
        height: 50,
        // 是否需要取消按钮
        thisId: '',
        cancel: false,
        isCall: false,
        onSuccess: function () { }
    }
    var settings = $.extend({}, defaults, options);

    var html = '<div class="x-mask x-Modal">';
    html += '<div class="x-popUps">';
    html += '<div class="x-delBtn" onclick="Modal.remove()" style="display:' + (settings.isDel ? 'block' : 'none') + '"></div>';
    html += '<h1 class="x-ModalTitle" style="display:' + (settings.title == '' ? 'none' : 'block') + '">' + settings.title + '</h1>';
    html += '<div class="x-ModalContent" style="padding-bottom:' + settings.height + 'px">' + settings.content + '</div>';
    html += '<div class="x-Modalbottom"><button class="x-norBtn x-mr10" onclick="Modal.remove()" style="display:' + (settings.cancel == false ? 'none' : 'inline-block') + '">' + settings.noText + '</button><button class="x-redBtn ModalokText" id="' + settings.thisId + '">' + settings.okText + '</button></div>';
    html += '</div></div>';

    $('body').append(html);

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })

    choose('.typeText>ul');
}

Modal.oneWarp = function (options) {
    var defaults = {
        // 内容
        content: '',
        // 是否显示x
        isDel: true,
        // 按钮文本，不填默认为确定
        okText: '确定',
        // 按钮文本，不填默认为取消
        noText: '取消',
        // 是否需要取消按钮
        thisId: '',
        cancel: false,
        isCall: false,
        onSuccess: function () { }
    }
    var settings = $.extend({}, defaults, options);

    var html = '<div class="x-mask x-Modal">';
    html += '<div class="x-popUps">';
    html += '<div class="x-delBtn" onclick="Modal.remove()" style="display:' + (settings.isDel ? 'block' : 'none') + '"></div>';
    html += '<div class="x-ModalContent" style="padding-bottom:50px"><p class="x-oneWarp">' + settings.content + '</p></div>';
    html += '<div class="x-Modalbottom"><button class="x-norBtn x-mr10" onclick="Modal.remove()" style="display:' + (settings.cancel == false ? 'none' : 'inline-block') + '">' + settings.noText + '</button><button class="x-redBtn ModalokText" id="' + settings.thisId + '">' + settings.okText + '</button></div>';
    html += '</div></div>';

    $('body').append(html);

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })

    choose('.typeText>ul');
}

Modal.black = function (options) {
    var defaults = {
        text: '测试文字',
        // 消失所用时间
        time: 300,
        // 停留在页面上的时间
        hold: 1000,
        isCall: false,
        onSuccess: function () { }
    }

    var settings = $.extend({}, defaults, options)

    var html = '<div class="x-tipBox"><p>' + settings.text + '</p></div>';

    $('body').append(html);

    setTimeout(function () {
        $('.x-tipBox').animate({ 'opacity': '0' });
        setTimeout(function () {
            $('.x-tipBox').remove();
            if (!settings.isCall) {
                settings.onSuccess(Modal);
            }
        }, settings.time);
    }, settings.hold);

}

Modal.blackBtn = function (options) {
    var defaults = {
        text: '测试文字',
        // 按钮文字
        okText: '确定',
        thisId: '',
        isCall: false,
        onSuccess: function () { }

    }
    var settings = $.extend({}, defaults, options)

    var html = '<div class="x-blackBox"><p>' + settings.text + '</p>'
    html += '<div class="btnBar" style="display:' + (settings.isBtn == false ? 'none' : 'block') + ';"><button class="x-redBtn BlackokText" id="' + settings.thisId + '">' + settings.okText + '</button></div>'
    html += '</div>'

    $('body').append(html)

    $('.BlackokText').on('click', function () {
        if (!settings.isCall) return Modal.removeB();
        settings.onSuccess(Modal);
    })
}

Modal.spec = function (options) {
    var defaults = {
        title: '加入购物车',
        okText: '确定',
        isCall: false,
        content: '',
        inventory: 99,
        thisId: '',
        onSuccess: function () { }
    }

    var settings = $.extend({}, defaults, options);

    var html = '<div class="x-mask x-Modal"><div class="x-spec">'
    html += '<span class="x-minDel" onclick="Modal.remove()"></span>'
    html += '<div class="x-specTitle x-gray">' + settings.title + '</div>'
    html += '<div class="x-specContent">' + settings.content + '</div>'
    html += '<div class="x-specBottom"><button class="x-redBtn ModalokText" id="' + settings.thisId + '">' + settings.okText + '</button></div>'
    html += '</div></div>'

    $('body').append(html)

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })

    /*choose('.typeImg>ul');
    choose('.typeText>ul');*/
    QTY(settings.inventory);

}

Modal.login = function (options) {
    var defaults = {
        content: 'aa',
        errMsg: '',
        isCall: false,
        onSuccess: function () { }
    }

    var settings = $.extend({}, defaults, options)

    var html = '<div class="x-mask x-Modal">'
    html += '<div class="x-popUps x-loginBoard">'
    html += '<div class="x-delBtn" onclick="Modal.remove()"></div>';
    html += '<div class="x-ModalTitle x-pb30">账号登录</div>'
    html += '<div class="x-loginContent">'

    html += '<div class="x-input x-pb10">'
    html += '<div class="phone x-Licon"></div>'
    html += '<input class="x-left" type="text" placeholder="手机号码" name="uname">'
    html += '</div>'
    html += '<div class="x-input">'
    html += '<div class="lock x-Licon"></div>'
    html += '<input class="x-left" type="password" placeholder="输入密码" name="password">'
    html += '</div>'

    html += '<div class="x-h75">'
    html += '<div class="x-input x-verificationCode x-hide" id="input-vcode">'
    html += '<input class="x-left" type="text" placeholder="验证码" name="verifycode">'
    html += '<div class="x-codeArea" onclick="code()"><img id="vcode"></div>'
    html += '</div>'
    html += '<div class="x-red" id="err-msg"></div>'
    html += '</div>'

    html += '<div class="x-loginBottom">'
    html += '<button class="x-redBtn ModalokText">登&nbsp;&nbsp;&nbsp;录</button>'
    html += '<div class="p2040"><a class="x-gray x-fll" href="/passport-lost.html">忘记密码？</a>'
    html += '<a class="x-gray x-flr" href="/passport-signup.html">注册</a></div>'
    html += '</div>'

    html += '<div class="x-loginTP">' + settings.content + '</div>'

    html += '</div>'

    html += '</div></div>'

    $('body').append(html)

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })
}

function code() {
    $('#vcode').attr('src', '/index-gen_vcode-b2c-4.html?r=' + Math.random())
}

Modal.C_S = function (options) {
    var defaults = {
        // 内容
        content: '',
        // 跳转链接
        links: '/',
        // 按钮文本，不填默认为确定
        okText: '确定',
        isCall: false,
        onSuccess: function () { }
    }
    var settings = $.extend({}, defaults, options);

    var html = '<div class="x-mask x-Modal">';
    html += '<div class="x-popUps">';
    html += '<div class="x-delBtn" onclick="Modal.remove()"></div>';
    html += '<div class="x-ModalContent">' + settings.content + '</div>';
    html += '<div class="x-Modalbottom"><a href="' + settings.links + '" class="x-redBtn" target="_blank">在线客服</a></div>';
    html += '</div></div>';

    $('body').append(html);

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })

    choose('.typeText>ul');

}

Modal.pay = function (options) {
    var defaults = {
        content: '',
        text: '请尽快在开启的支付平台页面进行付款，超时订单将被关闭',
        urlA: 'javascript:;',
        urlB: 'javascript:;',
        time: '56分05秒',
        timeId: 'payTime',
        isCall: false,
        onSuccess: function () { }
    }

    var settings = $.extend({}, defaults, options)
    var html = '<div class="x-mask x-Modal">'
    html += '<div class="x-popUps x-payBoard">'
    html += '<p class="x-payText">' + settings.text + '</p>'
    html += '<div class="x-payContent">'
    html += '<div class="left"><p>支付成功</p><a class="x-norBtn ModalokText" href="' + settings.urlA + '">查看订单</a></div>'
    html += '<div class="right"><p>支付失败</p><a class="x-redBtn ModalokText" href="' + settings.urlB + '">重新支付</a></div>'
    html += '</div>'
    html += '<p class="x-payTime">剩余支付时间:&nbsp;&nbsp;<span id="' + settings.timeId + '" class="x-red">' + settings.time + '</span></p>'
    html += '</div></div>'

    $('body').append(html)

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })

}

Modal.titleCenter = function (options) {
    var defaults = {
        title: '是否删除此地址',
        content: '',
        noText: '取消',
        okText: '确定',
        thisId: '',
        cancel: true,
        isCall: false,
        onSuccess: function () { }
    }

    var settings = $.extend({}, defaults, options)

    var html = '<div class="x-mask x-Modal x-titleCenter">';
    html += '<div class="x-popUps">';
    html += '<div class="x-delBtn" onclick="Modal.remove()"></div>';
    html += '<h1 class="x-ModalTitle">' + settings.title + '</h1>';
    html += '<div class="x-ModalContent">' + settings.content + '</div>';
    html += '<div class="x-Modalbottom"><button class="x-norBtn x-mr10" onclick="Modal.remove()" style="display:' + (settings.cancel == false ? 'none' : 'inline-block') + '">' + settings.noText + '</button><button class="x-redBtn ModalokText" id="' + settings.thisId + '">' + settings.okText + '</button></div>';
    html += '</div></div>';

    $('body').append(html)

    $('.ModalokText').on('click', function () {
        if (!settings.isCall) return Modal.remove();
        settings.onSuccess(Modal);
    })
}

Modal.avater = function (options) {
    var defaults = {
        isCall: false,
        text: '请选择图片',
        onSuccess: function () { }
    }
    var settings = $.extend({}, defaults, options)

    var html = '<div class="x-mask x-Modal">'
    html += '<div class="x-popUps x-avater">'
    html += '<h1 class="x-ModalTitle">设置头像</h1>'
    html += '<div class="x-ModalContent" style="padding-bottom:10px;">'
    html += '<div class="x-beforeUpload">'
    html += '<label class="btn-upload beforeUpload" for="inputImage">'
    html += '<input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">'
    html += '<span>+&nbsp;选择头像</span>'
    html += '</label>'
    html += '</div><div class="x-avaterContainer">'
    html += '<img id="avaterImage" src="http://fengyuanchen.github.io/cropper/images/picture.jpg" alt="Picture">'
    html += '<label class="btn-upload" for="inputImage">'
    html += '<input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">'
    html += '<span>+&nbsp;选择头像</span>'
    html += '</label>'
    html += '<div class="x-afterUpload"></div>'
    html += '</div>'
    html += '<div class="x-red"><span class="avaterTips">' + settings.text + '</span></div>'
    html += '<div id="result"></div></div>'
    html += '<div class="x-Modalbottom">'
    html += '<button class="x-redBtn" id="readyBtn">保存</button><button class="x-redBtn" id="uploadPic">保存</button><button class="x-norBtn" onclick="Modal.remove()">取消</button>'
    html += '</div>'
    html += '<div class="x-delBtn ModalokText" onclick="Modal.remove()"></div>'
    html += '</div></div>'

    $('body').append(html)


    var $after = $('.x-afterUpload')
    var $image = $('#avaterImage');
    var $button = $('#uploadPic');
    var $readyBtn = $('#readyBtn');
    var $result = $('#result');
    var croppable = false;
    var options = {
        aspectRatio: 1 / 1,
    };
    var uploadedImageURL;

    $readyBtn.click(function () {
        $('.avaterTips').css('opacity', '1')
        setTimeout(function () {
            $('.avaterTips').css('opacity', '0')
        }, 1000)
    })

    $button.on('click', function () {
        if (!settings.isCall) return;
        settings.onSuccess(Modal)
        $after.show()
        $('.btn-upload').hide()
        $button.hide()
        $readyBtn.show()
        $('.avaterTips').hide()
    })

    $image.cropper({
        aspectRatio: 1,
        viewMode: 1,
        ready: function () {
            croppable = true;
        }
    });

    $button.on('click', function () {
        var croppedCanvas;

        if (!croppable) {
            return;
        }

        // Crop
        croppedCanvas = $image.cropper('getCroppedCanvas', { width: 200 });

        // Show
        $result.html('<img src="' + croppedCanvas.toDataURL('image/jpge', 0.1) + '">');
    });


    // Import image
    var $inputImage = $('#inputImage');

    if (URL) {
        $inputImage.change(function () {
            var files = this.files;
            var file;

            $('.x-beforeUpload').hide()
            $('.x-avaterContainer').show()
            $button.show()
            $readyBtn.hide()
            $('.avaterTips').hide()

            if (!$image.data('cropper')) {
                return;
            }

            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    uploadedImageType = file.type;

                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                    }

                    uploadedImageURL = URL.createObjectURL(file);
                    $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                    $inputImage.val('');
                } else {
                    window.alert('Please choose an image file.');
                }
            }
        });
    } else {
        $inputImage.prop('disabled', true).parent().addClass('disabled');
    }

}

Modal.remove = function () {
    $('.x-Modal').remove()
}
Modal.removeB = function () {
    $('.x-blackBox').remove()
}


function choose(className) {
    var aLi = $(className).find('li').not('.disable');
    aLi.click(function () {
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    })
}
function QTY(num) {
    // 库存参数
    var QTYnum = num;

    // 初始化数量
    $('.count>input').each(function () {
        var that = $(this);
        var $val = that.val();

        if ($val == 1) {
            addName(that, 'reduce');
        } else if ($val == QTYnum) {
            addName(that, 'plus');
        }
    })

    // 按加减键计算数量
    $('.count').children('span').click(function () {
        var that = $(this);
        var thatCount = that.siblings('input');
        var num = parseInt(thatCount.val());

        if (that.hasClass('plus')) {
            if (num < QTYnum && num < 99) {
                thatCount.val(num += 1);
                removeName($(this), 'reduce');
            }
        } else {
            if (num > 1) {
                thatCount.val(num -= 1);
                removeName($(this), 'plus');
            }
        }
        if (num == 1) {
            that.addClass('reduceDis');
        } else if (num == QTYnum) {
            that.addClass('plusDis');
        }
    })

    // 设置input最大可输入数

    var maxNum = QTYnum

    // 输入编辑
    $('.count>input').bind({
        'input propertychange': function () {
            // 计算数量，输入限制
            var that = $(this);
            var $val = that.val();

            if ($val == 0 || $val == 1 || $val == '') {
                that.val(1);
                addName(that, 'reduce');
                removeName(that, 'plus');
            } else if ($val == maxNum) {
                addName(that, 'plus');
                removeName(that, 'reduce');
            } else if ($val > maxNum) {
                that.val(maxNum);
                addName(that, 'plus');
            } else if ($val < maxNum) {
                removeName(that, 'reduce');
            } else {
                removeName(that, 'plus');
                removeName(that, 'reduce');
            }

        },
    })

    function addName(element, className) {
        element.siblings('.' + className).addClass(className + 'Dis');
    }

    function removeName(element, className) {
        element.siblings('.' + className).removeClass(className + 'Dis');
    }
}





