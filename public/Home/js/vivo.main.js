//Powered by uimix.com;
//date:2015-10-01;
//date:2016-04-01;
//date:2016-08-08;  vivo2016.high

function A(url, param, success, error) {
	if (url[0] != '/') {
		url = '/' + url;
	}
	var ajax = {type: "POST", url: url, dataType: 'json'};
	if (param) ajax.data = param;
	ajax.success = function(data) {
		if (data.no == 0) {
			if (success) success(data.data);
		} else {
			if (error) error(data.no, data.msg);
		}
	};
	if (error) {
		ajax.error = function() {
			error(500, '访问网络失败，请检查您的网络连接并重试');
		}
	}
	$.ajax(ajax);
}

var Q = {
	init: function() {
		$('.v_h_search .vh-sear-nav ul li.input input.data_q').keyup(Q.check);
	},
	last_val: false,
	wait_intval: false,
	query: function() {
		Q.wait_intval = false;
		var q = Q.last_val;
		var params = {q:q};
		A('qsearch', params, function(data) {
			if (!data || data.length == 0 || q != Q.last_val) {
				return;
			}

            var html = '';
            var prohtml = '<dl class="vhs-pro"><dt><p>产品<span></span></p></dt>';
            var datahtml = '<dl class="vhs-data"><dt><p>资料<span></span></p></dt>';
            var newshtml = '<dl class="vhs-news"><dt><p>新闻<span></span></p></dt>';
            var info = [];
            var proTotal=newsTotal=0;
            for (var i in data) {
                var p = data[i];
                if (p.type == 'keywords') {
                    prohtml += '<dd><a href="'+p.url+'"><h4 class="v-gb-ico">'+p.name+'</h4><p>'+p.desc+'</p></a></dd>';
                } else if (p.type == 'product') {
                    prohtml += '<dd><a href="'+p.url+'"><h4 class="v-gb-ico">'+p.name+'</h4><p>'+p.desc+'</p></a></dd>';
                    datahtml += '<dd><a href="'+p.download_url+'"><h4 class="v-gb-ico">'+p.name+'</h4><p>固件、Funtouch OS、视频、使用教程、等等。</p></a></dd>';
                } else if (p.type == 'news') {
                    newshtml += '<dd><a href="'+p.url+'"><h4 class="v-gb-ico">'+p.title+'</h4><p>'+p.summary+'</p></a></dd>';
                }
                if(p.type === 'product.total') proTotal = p.total;
                if(p.type === 'news.total') newsTotal = p.total;
            }
            prohtml+='</dl>';
            datahtml+='</dl>';
            newshtml+='</dl>';
            $('.v_h_search .vh-sear-cont .cont-box').html(prohtml+datahtml+newshtml);
            0 !== proTotal && $('.v_h_search .vh-sear-cont .cont-box').find('.vhs-pro dt span').html('(共'+proTotal+'个结果)');
            0 !== proTotal && $('.v_h_search .vh-sear-cont .cont-box').find('.vhs-data dt span').html('(共'+proTotal+'个结果)');
            0 !== newsTotal && $('.v_h_search .vh-sear-cont .cont-box').find('.vhs-news dt span').html('(共'+newsTotal+'个结果)');
			
			$('.v_h_search .vh-sear-cont .cont-box').show();
			$('.v_h_search .vh-sear-nav ul li.sear-tool a.search').attr('href', '/search?'+$.param({q:q}));
		}, function() {});
	},
	check: function() {
		$('.v_h_search .vh-sear-cont .cont-box').hide();
		var q = $.trim($('.v_h_search .vh-sear-nav ul li.input input.data_q').val());
		if (q == Q.last_val) {
			return;
		}
		Q.last_val = q;
		if (q == '') {
			return;
		}
		if (Q.wait_intval) clearTimeout(Q.wait_intval);
		Q.wait_intval = setTimeout(Q.query, 300);
	}
};
$(document).ready(Q.init);


var VPV=function(v){
    UIMIX_VIVO.vplayVideo(v);
    return false;
};


var
UIMIX_VIVO={
    platform: function () {
        var u = navigator.userAgent,
            app = navigator.appVersion,
            e=window.navigator.userAgent;
        var ieNub=999,browserName=false;
        var thisBody = document.body || document.documentElement,
	    thisStyle = thisBody.style,
	    support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
        
        if(e.indexOf("MSIE") >= 0){
            if(e.indexOf("MSIE 6.0")>0) ieNub=6;
            if(e.indexOf("MSIE 7.0")>0) ieNub=7;
            if(e.indexOf("MSIE 8.0")>0) ieNub=8;
            if(e.indexOf("MSIE 9.0")>0) ieNub=9;
            if(e.indexOf("MSIE 10.0")>0) ieNub=10;
            if(e.indexOf("MSIE 11.0")>0) ieNub=11;
            if(e.indexOf("MSIE 12.0")>0) ieNub=12;
            browserName='ie';
        }else{
            if (e.indexOf("Firefox") >= 0) browserName="firefox";
            if(e.indexOf("Safari") >= 0) browserName="safari";
            if(e.indexOf("Chrome") >= 0) browserName="chrome";
            if(e.indexOf("Opera") >= 0) browserName="opera";
        }
        return {
            trident: u.indexOf('Trident') > -1,
            presto: u.indexOf('Presto') > -1,
            webKit: u.indexOf('AppleWebKit') > -1,
            gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
            mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/),
            ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
            android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
            iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
            iPad: u.indexOf('iPad') > -1,
            webApp: u.indexOf('Safari') == -1,
            ismobile : !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/) || u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
            weichat: u.indexOf('MicroMessenger') > -1,
            html5: support ? true : false,
            ie: ieNub,
            browser: browserName
        };
        
    }(),
    supportVideo : function() {
        if (!!document.createElement('video').canPlayType) {
            var vidTest = document.createElement("video");
            var oggTest = vidTest.canPlayType('video/ogg; codecs="theora, vorbis"');
            if (!oggTest) {
                var h264Test = vidTest.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
                if (!h264Test) {
                    return false;
                }else {
                    if (h264Test == "probably") {
                        return true;
                    }else {
                        return false;
                    }
                }
            }else {
                if (oggTest == "probably") {
                    return true;
                }
                else {
                   return false;
                }
            }
        }else {
            return false;
        }
    }(),
    pf : function(){
        var ra='(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)';
        return {
            retina : window.devicePixelRatio > 1 ? true : window.matchMedia && window.matchMedia(ra).matches ? true : false
        }
    }(),
    cRetina : function(){
        var a=this;
        $('img[data-x2]').each(function(){
            if(a.pf.retina && ( !a.platform.ismobile || !a.platform.iPad || $(this).attr('data-x2')!="")){
                $(this).attr({'src':$(this).attr('data-x2')}).removeAttr('data-x2');
            }else{
                $(this).removeAttr('data-x2');
            }
        });
    },
    browserSupport : function(){
        if(!UIMIX_VIVO.platform.html5 || parseInt(UIMIX_VIVO.platform.ie)<9) $('html').addClass('nohtml5');
        if(UIMIX_VIVO.platform.ismobile){
             $('html').addClass('pf-mb');
        }else{
             $('html').addClass('pf-pc');
        }
    },
    vplayVideo : function(v){
        var
        vurl=v.url ? $.trim(v.url) : false,
        vwidth=v.width ? v.width : 600,
        vheight=v.height ? v.height : 400,
        vposter=v.poster ? v.poster : '',
        vcode='',vdelay=0,
        curScrollTop=$(window).scrollTop();
        if(!vurl) return false;
        
        if($('#vivo-airbox').size()<1) $('body').append('<div id="vivo-airbox" />');
        if($('#video_layer').size()<1) $('#vivo-airbox').append('<div id="video_layer" style="display:none;"><a class="vdl-colse v-gb-ico"></a><div class="vdl-box"></div></div>');
        
        
         if(UIMIX_VIVO.platform.ismobile){//移动端播放
             var vfixsize={width:'100%', height:'100%', left:0, top:0};
             if(vurl.indexOf('.mp4') > -1){
                 vcode='<video width="100%" height="100%" autoplay><source src="' + vurl + '" type="video/mp4"></video>';
             }else{
                 vcode='<iframe frameborder="0" width="100%" height="100%" src="' + vurl + '"></iframe>';
             }
             
         }else{//PC端播放
            var vfixsize={width:vwidth, height:vheight, marginTop:-vheight/2, marginLeft:-vwidth/2};
              if(vurl.indexOf('.mp4') > -1 && UIMIX_VIVO.supportVideo){ //HTML5播放器
                vcode='<iframe frameborder="0" width="100%" height="100%" allowfullscreen src="/vplay?url=' + vurl + '&poster=' + vposter + '"></iframe>';
              }else if (vurl.indexOf('.flv') > -1 || vurl.indexOf('.mp4') > -1) {
                  var delay=0;
                  vcode='<span id="CuPlayer"/>';
                  if(typeof SWFObject == 'undefined'){
                       $('head').append('<script src="/script/swfobject.js"></script>');
                       delay = 1000;
                  }
                  var initPlayer = function () {
                        var vcp = new SWFObject("/script/CuPlayerMiniV3.swf", "CuPlayer", vwidth, vheight, "9", "#000000");
                        vcp.addParam("allowfullscreen", "true");
                        vcp.addParam("allowscriptaccess", "always");
                        vcp.addParam("wmode", "opaque");
                        vcp.addParam("quality", "high");
                        vcp.addParam("salign", "lt");
                        vcp.addVariable("CuPlayerFile", vurl);
                        vcp.addVariable("CuPlayerWidth", vwidth);
                        vcp.addVariable("CuPlayerHeight", vheight);
                        vcp.addVariable("CuPlayerAutoPlay", "yes");
                        vcp.addVariable("CuPlayerAutoRepeat", "false");
                        vcp.addVariable("CuPlayerImage", vposter);
                        vcp.addVariable("CuPlayerShowControl", "true");
                        vcp.addVariable("CuPlayerAutoHideControl", "true");
                        vcp.addVariable("CuPlayerVolume", "80");
                        vcp.addVariable("CuPlayerLogo",""); 
                        vcp.write("CuPlayer");
                    },
                    loadingSWF = function () {
                        if (typeof SWFObject != 'undefined') {
                            initPlayer();
                            clearTimeout(tt);
                        } else {
                            tt = setTimeout(loadingSWF, delay);
                        }
                    },
                    tt = setTimeout(loadingSWF, delay);
              }else{
                  vcode='<iframe frameborder="0" width="' + vwidth + '" height="' + vheight + '" src="' + vurl + '"></iframe>';
              }
         }
        
        
        var resizePlayvideo=function(){
             $('#video_layer').css({height:$(window).height()});
         };
        $('html').addClass('fly-layer');
        $('#video_layer').show().find('.vdl-box').hide().css(vfixsize).html(vcode);
        if(st !== 'undefined') clearTimeout(st);
        var st=setTimeout(function(){
            $('#video_layer').find('.vdl-box').show();
        },vdelay);

        $('.vdl_video_btn').off('click').click(function(){
//                TH.highStop();////
            var $high=$('#vivo-high-wrap #vivo-high');
            $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.stop(), $high.data({isactive: ''}));
        });
        
        $('#video_layer').find('a.vdl-colse').off('click').click(function(){
            var vth=$(this);
            $('html').removeClass('fly-layer');
            $('body').stop().animate({scrollTop:curScrollTop},1);
            var tts=setTimeout(function(){
                $('#video_layer').hide().find('.vdl-box').html('');
            },10);
            
//            TH.highPlay();////
            var $high=$('#vivo-high-wrap #vivo-high');
            $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'true'}));
            return false;
        });
        
        $(document)
            .off('keydown')
            .on({
                keydown : function(e){//ESC键关闭视频
                    if(e.keyCode == 27 && $('#video_layer').is(':visible')){
                        $('#video_layer').find('a.vdl-colse').click();
                    }
                }
        });

        $(window)
            .off('resize')
                .on({
                resize : resizePlayvideo
            });
        resizePlayvideo();
        
    },
    gotop : function(){
        if($('#vivo-airbox').size()<1) $('body').append('<div id="vivo-airbox" />');
        $('#vivo-airbox').append('<div id="v-gotop"><a class="v-gb-ico" href="#"></a></div>');
        
        var
        _gotop=$('#v-gotop'),
        h,p,
        scrollFun=function(){
            h=$(window).height();
            p=$(window).scrollTop();
            _gotop.css({top:(h-_gotop.height()-40)});
            
            if(p>h){
                if(_gotop.hasClass('show')) return;
                _gotop.css({display:'block'});
                if(s !== 'undefined') clearTimeout(s);
                var s=setTimeout(function(){
                    _gotop.addClass('show');
                },100);
            }else{
                if(!_gotop.hasClass('show')) return;
                _gotop.removeClass('show');
                if(s !== 'undefined') clearTimeout(s);
                var s=setTimeout(function(){
                    _gotop.css({display:'none'});
                },300);
            }
        };
        _gotop.on({
            click : function(){
                var durScroll=Math.floor(p/h*100);
                durScroll=p>5000 ? durScroll/2 : durScroll;
                $('html,body').stop().animate({scrollTop:0},durScroll);
                return false;
            }
        });
        $(window)
            .off('resize')
            .on({
                scroll : scrollFun,
                resize : scrollFun
            });
        scrollFun();
    },
    xinit : function(){
//        !$('html').hasClass('img-autoresize') && this.cRetina();
        this.browserSupport();
        if($('html').hasClass('gotop')) this.gotop();
    },
    init : function(c){
        this.xinit();
        var c= c ? c : this;
        for(var i in c){
            if(c[i] && c[i].init) c[i].init();
        }
    }
};
$(document).ready(function(){
    UIMIX_VIVO.init();
});


UIMIX_VIVO.share = {
	sns: function(type, content, url, image, des) {
        var $tihs=this;
		switch(type) {
			case 'weibo':
				return $tihs.weibo_url(content, url, image, des);
			case 'douban':
				return $tihs.douban_url(content, url, image, des);
			case 'renren':
				return $tihs.renren_url(content, url, image, des);
			case 'tencentweibo':
				return $tihs.tencentweibo_url(content, url, image, des);
			case 'qzone':
				return $tihs.qzone_url(content, url, image, des);
			case 'kaixin':
				return $tihs.kaixin_url(content, url, image, des);
			case '163weibo':
				return $tihs.t163weibo(content, url, image, des);
			case 'sohu':
				return $tihs.sohu(content, url, image, des);
			case 'msn':
				return $tihs.msn(content, url, image, des);
			default:
				return false;
		}
	},

	t163weibo: function(content, url, image) {
		var param = {info: content + ' ' + url};
		if (image) {
			param['images'] = image;
			param['togImg'] = true;
		}
		return 'http://t.163.com/article/user/checkLogin.do?' + $.param(param);
	},

	weibo_url: function(content, url, image) {
		var param = {title: content + ' ' + url};
		if (image) {
			param['pic'] = encodeURI(image);
		}
		return 'http://service.weibo.com/share/share.php?' + $.param(param);
	},

	renren_url: function(content, url, image, des) {
        var rrShareParam = {
            resourceUrl : url,
            srcUrl : '',
            pic : image,
            title : content,
            description : des
        };
        return 'http://widget.renren.com/dialog/share?' + $.param(rrShareParam);
	},

	qzone_url: function(content, url, image, des) {
		var param = {title: content};
		if (url) {
			param['url'] = url;
		}
		if (image) {
			param['pics'] = image;
		}
		return 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?' + $.param(param);
	},

	douban_url: function(content, url, image) {
		var param = {title: content};
		if (url) {
			param['url'] = url;
		}
		if (image) {
			param['pic'] = image;
		}
		return 'http://www.douban.com/recommend/?' + $.param(param);
	},

	tencentweibo_url: function(content, url, image) {
		var param = {title: content};
		if (url) {
			param['url'] = url;
		}
		if (image) {
			param['pic'] = image;
		}
		return 'http://v.t.qq.com/share/share.php?' + $.param(param);
	},

	kaixin_url: function(content, url, image) {
		var param = {rtitle: content};
		if (url) {
			param['rurl'] = url;
		}
		if (image) {
			param['pic'] = image;
		}
		return 'http://www.kaixin001.com/repaste/share.php?' + $.param(param);
	},

	sohu: function(content, url, image) {
		var param = {title: content};
		if (url) {
			param['url'] = url;
		}
		if (image) {
			param['pic'] = image;
		}
		return 'http://t.sohu.com/third/post.jsp?' + $.param(param);
	},

	msn: function(content, url, image) {
		var param = {title: content};
		if (url) {
			param['url'] = url;
		}
		if (image) {
			param['screenshot '] = image;
		}
		return 'http://profile.live.com/badge?' + $.param(param);
	},
    weixin : function(v){
        var ua = navigator.userAgent.toLowerCase();
        var WXversion = ua.match(/micromessenger/) ? ua.match(/micromessenger\/([\d.]+)/)[1] : null;
        var baseUri = v.baseUri;

        //自定义微信分享
        window.shareData = {
            picUrl: v.picUrl, //分享图片
            url: v.baseUri,
            title: v.title, //分享标题
            desc: v.des, //好友内容
            timelineTitle : v.content, //朋友圈内容
            callback: function(type) {
                if(typeof _hmt != "undefined"){
                    _hmt.push(['_trackEvent', "weixin", type]);
                }
                if(typeof _czc != "undefined"){
                    _czc.push(["_trackEvent", "weixin", type]);
                }
            }
        };
        
        function refreshShareData() {
            if (WXversion >= '6.0.2') {
                wx.ready(function(){
                    wx.onMenuShareTimeline({
                        title: window.shareData.timelineTitle,
                        link: window.shareData.url,
                        imgUrl: window.shareData.picUrl,
                        success: function () { 
                            shareData.callback("ShareTimeline");
                        },
                        cancel: function () {}
                    });

                    wx.onMenuShareAppMessage({
                        title: window.shareData.title,
                        desc: window.shareData.desc,
                        link: window.shareData.url,
                        imgUrl: window.shareData.picUrl,
                        type: '',
                        dataUrl: '',
                        success: function () { 
                            shareData.callback("ShareAppMessage");
                        },
                        cancel: function () {}
                    });

                    wx.onMenuShareQQ({
                        title: window.shareData.title,
                        desc: window.shareData.desc,
                        link: window.shareData.url,
                        imgUrl: window.shareData.picUrl,
                        success: function () { 
                           shareData.callback("ShareQQ");
                        },
                        cancel: function () { 
                           // 用户取消分享后执行的回调函数
                        }
                    });
                    wx.onMenuShareWeibo({
                        title: window.shareData.title,
                        desc: window.shareData.desc,
                        link: window.shareData.url,
                        imgUrl: window.shareData.picUrl,
                        success: function () { 
                           shareData.callback("ShareWeibo");
                        },
                        cancel: function () { 
                            // 用户取消分享后执行的回调函数
                        }
                    });
                });
            } else {
                (function() {
                    function onBridgeReady() {
                        WeixinJSBridge.call('hideToolbar');
                        WeixinJSBridge.call('showOptionMenu');
                        WeixinJSBridge.on('menu:share:timeline', function(argv){
                            WeixinJSBridge.invoke('shareTimeline',{
                                "img_url"    : window.shareData.picUrl,
                                "img_width"  : "400",
                                "img_height" : "400",
                                "link"       : window.shareData.url,
                                "desc"       : window.shareData.desc,
                                "title"      : window.shareData.title
                            }, function(res){
                                shareData.callback("ShareTimeline");
                            });
                        });

                        WeixinJSBridge.on('menu:share:appmessage', function(argv){
                            WeixinJSBridge.invoke('sendAppMessage',{
                                "appid"      : appId,
                                "img_url"    : window.shareData.picUrl,
                                "img_width"  : "400",
                                "img_height" : "400",
                                "link"       : window.shareData.url,
                                "desc"       : window.shareData.desc,
                                "title"      : window.shareData.title
                            }, function(res){
                                shareData.callback("ShareAppMessage");
                            });
                        });

                        WeixinJSBridge.on('menu:share:weibo', function(argv){
                            WeixinJSBridge.invoke('shareWeibo',{
                                "content" : window.shareData.desc + window.shareData.url,
                                "url"     : window.shareData.url
                            }, function(res){
                                shareData.callback("ShareWeibo");
                            });
                        });

                        WeixinJSBridge.on('menu:share:facebook', function(argv){
                            WeixinJSBridge.invoke('shareFB',{
                                  "img_url"    : window.shareData.picUrl,
                                  "img_width"  : "640",
                                  "img_height" : "640",
                                  "link"       : window.shareData.url,
                                  "desc"       : window.shareData.desc,
                                  "title"      : window.shareData.title
                            }, function(res) {
                                shareData.callback("ShareFacebook");
                            });
                        });

                        WeixinJSBridge.on('menu:general:share', function(argv){
                            argv.generalShare({
                                "appid"      : appId,
                                "img_url"    : window.shareData.picUrl,
                                "img_width"  : "640",
                                "img_height" : "640",
                                "link"       : window.shareData.url,
                                "desc"       : window.shareData.desc,
                                "title"      : window.shareData.title
                            }, function(res){
                                shareData.callback("generalShare");
                            });
                        });
                    };

                    document.addEventListener('WeixinJSBridgeReady', onBridgeReady);
                })();
            }
        }
        refreshShareData();
    }
};





UIMIX_VIVO.vivo2016={
    init : function(){
//        this.high();
        
        
        this.nav();
        this.foot();
        this.mainpage();
        this.navsearch();
    },
    
    navsearch : function(){
        var
        TH=this,
        _vivowrap=$('#mobile-wrap').size()>0 ? $('#mobile-wrap') : $('#vivo-wrap'),
        _vivoheadwrap=_vivowrap.find('#vivo-head-wrap'),
        _vivoheadsearchBtn=_vivoheadwrap.find('.vivo-head .nav-tool a.nav-t-search'),
        _headsearchbox=_vivowrap.find('.v_h_search'),
        _headsearchInp=_headsearchbox.find('.vh-sear-nav ul .input input'),
        _htoolsearchBtn=_headsearchbox.find('.vh-sear-nav ul .sear-tool .search'),
        _htoolsearchcloseBtn=_headsearchbox.find('.vh-sear-nav ul .sear-tool .close'),
        _vivoheadkefuBtn=_vivoheadwrap.find('.vivo-head .nav-tool a.nav-t-kefu'),
        _vivoheadkefuPop=_vivoheadwrap.find('.vivo-head .nav-tool a.nav-t-kefu .nav-t-kefu-pop');
        
        
        _vivoheadkefuBtn.on({
            mouseenter : function(){
                _vivoheadkefuPop.show();
            },
            mouseleave : function(){
                _vivoheadkefuPop.hide();
            }
        });
        _vivoheadsearchBtn.click(function(){
            _vivowrap.removeClass('clearSearchDelay');
            _headsearchbox.css({display: 'block'});
            var ttt=setTimeout(function(){
                _vivowrap.addClass('SearchOpen');
                _headsearchInp.focus();
//                TH.highStop();
                var $high=$('#vivo-high-wrap #vivo-high');
                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.stop(), $high.data({isactive: ''}));
            },50);
            return false;
        });
        
        _htoolsearchcloseBtn.click(function(){
            _vivowrap.removeClass('SearchOpen');
            _headsearchInp.blur();
//            TH.highPlay();
            var $high=$('#vivo-high-wrap #vivo-high');
                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'active'}));
            var ttt=setTimeout(function(){
                _headsearchbox.css({display: 'none'});
                _vivowrap.addClass('clearSearchDelay');
            },500);
            return false;
        });
        
        
        var resizeSearch=function(){
            $('.v_h_search .vh-sear-cont').css({height:$(window).height()-_vivoheadwrap.height()}); 
            if(_vivowrap.hasClass('SearchOpen')) _htoolsearchcloseBtn.click();
        };
        $(window).on({
            resize : resizeSearch
        });
        resizeSearch();
        
        
    },
    mainpage : function(){
        var
        a=this,
        _mainbox=$('#mobile-wrap').size()>0 ? $('body') : $('#vivo-wrap'),
        _highwrapbox=_mainbox.find('#vivo-high-wrap'),
        _highbox=_mainbox.find('#vivo-high'),
        _headbox=_mainbox.find('#vivo-head-wrap'),
        _contbox=_mainbox.find('#vivo-contain'),
        _footbox=_mainbox.find('#vivo-foot'),
        _footwrapbox=_mainbox.find('#vivo-foot-wrap');
        
        var highblur=function(p){
            
                var cs={'-webkit-filter' : 'blur('+p+'px)'};
//            if(UIMIX_VIVO.platform.browser=='firefox') cs={'filter':'url(css/blur.svg#blur)','-moz-filter' : 'blur('+p+'px)'};
                if(UIMIX_VIVO.platform.browser=='ie') cs={'-ms-filter' : 'blur('+p+'px)'};
                if(UIMIX_VIVO.platform.browser=='ie' && UIMIX_VIVO.platform.ie<9) cs={'filter': 'progid:DXImageTransform.Microsoft.Blur(PixelRadius="'+p+'")'};
                return cs; 
                
        };
        
            
            
        
        $(document).on({
            mouseleave : function(){
//                a.highStop();
//                var $high=$('#vivo-high-wrap #vivo-high');
//                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.stop(), $high.data({isactive: ''}));
            },
            mouseenter : function(){
//                a.highPlay();
//                var $high=$('#vivo-high-wrap #vivo-high');
//                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'active'}));
            }
        });



        var resizeele=function(){
            var
            curScrollTop=$(window).scrollTop(),
            norHeight=winHeight=$(window).height(),
            norWidth=winWidth=$(window).width();
            
            if(_highbox.size()<=0){
                _footwrapbox.css({visibility:'visible'});
                _footbox.css({opacity:1});
                return;
            }
            
            winHeight=winHeight<400 ? 400 : winHeight;
            
            _highbox.css({height: winHeight});
            _highwrapbox.css({height: winHeight});
            
            if(curScrollTop>winHeight){
//                a.highStop();
                var $high=$('#vivo-high-wrap #vivo-high');
                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.stop(), $high.data({isactive: ''}));
                _highbox.hide();
                _footbox.show();
            }else{
//                a.highPlay();
                var $high=$('#vivo-high-wrap #vivo-high');
                $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'active'}));
                _highbox.show();
                _footbox.hide();
            }
            if(norHeight<400){
                _highbox.find('.vivo-h-dot').css({bottom:400-norHeight+20});
            }else{
                _highbox.find('.vivo-h-dot').css({bottom:20});
            }
            
            //滚动轮播效果控制
            if(curScrollTop>0 && curScrollTop<=winHeight){
                var pt=curScrollTop/winHeight;
            }
            if(curScrollTop==0) pt=0;
            if(curScrollTop>=winHeight) pt=1;
            if(!UIMIX_VIVO.platform.ismobile) _highbox.css(highblur(pt*10));
            
            
            
            //首页foot效果控制
            if(curScrollTop>_mainbox.height()-_footwrapbox.height()-winHeight && curScrollTop<_mainbox.height()-winHeight){
                var
                ftop=curScrollTop-(_mainbox.height()-_footwrapbox.height()-winHeight),
                fpt=ftop/_footwrapbox.height();
            }
            if(curScrollTop<=_mainbox.height()-_footwrapbox.height()-winHeight) fpt=0;
            if(curScrollTop>=_mainbox.height()-winHeight) fpt=1;
//            if(!UIMIX_VIVO.platform.ismobile) _footbox.css(highblur(5-fpt*5));
            if(!UIMIX_VIVO.platform.ismobile) _footbox.css({opacity:fpt});
            
        };
//        if(!UIMIX_VIVO.platform.ismobile) _footbox.css(highblur(5));
        if(!UIMIX_VIVO.platform.ismobile) _footbox.css({opacity:0});
        $(window).on({
            resize : resizeele,
            scroll : resizeele
        });
        resizeele();
        _highwrapbox.css({visibility:'visible'});
        _footwrapbox.css({visibility:'visible'});
        
    },
    nav : function(){
        var 
            TH=this,
            _vivo_nav=$('#vivo-head-wrap'),
            _vivo_menuBtn=_vivo_nav.find('.nav-tool a.nav-t-menu'),
            _vivo_navItem=_vivo_nav.find('.vivo-h-nav li.nav-h-products'),
            _vivo_navItems=_vivo_nav.find('.vivo-h-nav li.nav-gb'),
            curLitem=_vivo_nav.find('.vivo-h-nav li.current'),
            _vivo_navProSeries=$('.vivo-menu-series'),
            ttt=sss=tt=null,navMenushow=false;
        
        _vivo_navItems.on({
            mouseenter : function(){
                var a=$(this);
                setTimeout(function(){
                    a.addClass('current').siblings().removeClass('current');
                },100);
            },
            mouseleave : function(){
               if(!_vivo_navProSeries.is(':visible')){
                   setTimeout(function(){
                        curLitem.addClass('current').siblings().removeClass('current'); 
                   },100);
                }
            }
        });
        
        //products
        TH.delay=0;
        _vivo_navItem.on({
            mouseenter : function(){
                clearTimeout(ttt);
                clearTimeout(tt);
                clearTimeout(sss);
                if(!_vivo_navProSeries.is(':visible')) {
                    var a=$(this);
//                    TH.highStop();
                    var $high=$('#vivo-high-wrap #vivo-high');
                    $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.stop(), $high.data({isactive: ''}));
                    navMenushow=true;
                    tt=setTimeout(function(){
                        a.addClass('current').siblings().removeClass('current');
                        _vivo_navProSeries.css({display:'block',opacity:0}).stop().animate({opacity:1},300,function(){
                            $('body').addClass('OpenNavproduct');
                        });
                    },TH.delay);
                }
            },
            mouseleave : function(){
                var a=$(this);
                navMenushow=false;
                clearTimeout(ttt);
                clearTimeout(tt);
                clearTimeout(sss);
                ttt=setTimeout(function(){
                    if(!navMenushow){
//                        TH.highPlay();
                        var $high=$('#vivo-high-wrap #vivo-high');
                    $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'active'}));
                        curLitem.addClass('current').siblings().removeClass('current');
                        !navMenushow && $('body').removeClass('OpenNavproduct');
                        if($('html').hasClass('nohtml5')){
                            TH.delay=0;
                        }else{
                            TH.delay=400;
                        }
                        sss=setTimeout(function(){
                                _vivo_navProSeries.stop().animate({opacity:0},300,function(){
                                   $(this).hide();
                               });
                        },TH.delay);

                    }
                },100);
            }
        });
        _vivo_navProSeries.find('.vms-bigbox').on({
            mouseenter : function(){
                clearTimeout(ttt);
                clearTimeout(tt);
//                clearTimeout(sss);
                navMenushow=true;
            },
            mouseleave : function(){
                navMenushow=false;
                clearTimeout(ttt);
                clearTimeout(tt);
                clearTimeout(sss);
                ttt=setTimeout(function(){
                    if(!navMenushow){
//                        TH.highPlay();
                        var $high=$('#vivo-high-wrap #vivo-high');
                        $high.size()>0 && window.VIVO_HIGHLIGHT && (VIVO_HIGHLIGHT.play(), $high.data({isactive: 'active'}));
                        curLitem.addClass('current').siblings().removeClass('current');
                       $('body').removeClass('OpenNavproduct');
                        if($('html').hasClass('nohtml5')){
                            var delay=0;
                        }else{
                            var delay=400;
                        }
                        sss=setTimeout(function(){
                                _vivo_navProSeries.stop().animate({opacity:0},300,function(){
                                   $(this).hide();
                               });
                        },delay);
                    }
                },100);
            }
        });
        
        
        var resizeNav=function(){
            if(_vivo_nav.hasClass('openMenu')) _vivo_menuBtn.click();
            if(_vivo_menuBtn.is(':visible')){
                _vivo_nav.find('.vivo-head ul.vivo-h-nav').hide();
                _vivo_menuBtn.off('click').click(function(){
                    if(_vivo_nav.hasClass('openMenu')){
                        _vivo_nav.removeClass('openMenu');
                        var tt=setTimeout(function(){
                            _vivo_nav.find('.vivo-head ul.vivo-h-nav').hide();
                        },300);
                    }else{
                        _vivo_nav.find('.vivo-head ul.vivo-h-nav').show();
                        var tt=setTimeout(function(){
                            _vivo_nav.addClass('openMenu');
                        },300);
                    }
                    return false;
                });
            }else{
                _vivo_nav.find('.vivo-head ul.vivo-h-nav').css({display:'table'});
            }
            _vivo_navProSeries.css({height:$(window).height()+100});
            if($('body').hasClass('OpenNavproduct')){
                _vivo_navProSeries.hide().find('.vms-bigbox').mouseleave();
            }
        };
        
        $(window).on({
            resize :resizeNav,
            scroll :resizeNav
        });
        resizeNav();
    
    },
    foot : function(){
        var
        _footerBox=$('#vivo-foot-wrap'),
        _footerShareBtn=_footerBox.find('.vivo-f-share .vf-f-weixin'),
        _footerSharePop=_footerBox.find('.vivo-f-share .vf-weixin-overbox');
        _footerShareBtn.on({
            mouseenter : function(){
                _footerSharePop.css({left:$(this).offset().left-(_footerSharePop.width()/2)+12});
                _footerSharePop.show();
            },
            mouseleave : function(){
                _footerSharePop.hide();
            }
        });
    },
    high : function(){
            $('#vivo-high-wrap img').resizeImage({autoresize: true});
        
            var
            TH=this,
            _vivo_high_wrap=$('#vivo-high-wrap'),
            _vivo_high=$('#vivo-high'),
            _high_slide=_vivo_high.find('ul'),
            _high_slide_li=_vivo_high.find('ul li'),
            _high_switch=_vivo_high.find('.vivo-h-dot'),
            slideTotal= _high_slide_li.size(),
            curInd=0,oldInd=999,wWidth=0,isplayed=true,ttt=nttt=null,
            delay=_vivo_high.data('delay') || 5000,speed=_vivo_high.data('duration') || 600,
            swHtml='',multi=false,iscanChange=true;
        
           
            for(var i=0;i<slideTotal; ++i){
                swHtml+='<a hraf="#"><b></b></a>';
            }
            _high_switch.append(swHtml);
        
            if(slideTotal>1 && UM_SUPPORT.ie>8){
                var aa=_high_slide_li.first().clone();
                var zz=_high_slide_li.last().clone();
                _high_slide.prepend(zz).append(aa);
                slideTotal=_high_slide.find('li').size();
                curInd=1;
                multi=true;
            }
        
        
        
            var
            resizeHigh=function(){
                wWidth=$(window).width();
                _high_slide.css(setProperty(curInd,0)).css({width:wWidth*slideTotal}).find('li').css({width:wWidth});
            },
            setProperty=function(ind,duration){
                var cs={};
                if(UM_SUPPORT.transition){
                    if(UM_SUPPORT.transform3d){
                        cs={transform:"translate3d("+(-wWidth*ind)+"px,0,0)",transitionDuration: (duration/1000).toFixed(1)+"s"};
                    }else{
                        cs={transform:"translate("+(-wWidth*ind)+"px,0)",transitionDuration: (duration/1000).toFixed(1)+"s"};
                    }
                }else{
                    cs={left:(-wWidth*ind)};
                }
                return cs;
            },
            changeHigh=function(){
                
                if(multi && (oldInd===slideTotal-2 && curInd===1)){
                    if(UM_SUPPORT.transition){
                        _high_slide.css(setProperty(slideTotal-1, speed));
                        setTimeout(function(){
                            iscanChange=true;
                            _high_slide.css(setProperty(curInd,0)).find('li').eq(curInd).addClass('start').siblings().addClass('clearAnt').removeClass('start');
                            setTimeout(function(){
                                 _high_slide.find('li').eq(curInd).siblings().removeClass('clearAnt');
                            },10);
                        },speed+100);
                    }else{
                        _high_slide.clearQueue().stop().animate(setProperty(slideTotal-1,0), speed,function(){
                            _high_slide.css(setProperty(curInd,0));
                            iscanChange=true; 
                        });
                    }
                }else if(multi && (oldInd===1 && curInd===slideTotal-2)){
                    if(UM_SUPPORT.transition){
                        _high_slide.css(setProperty(0, speed));
                        setTimeout(function(){
                            iscanChange=true;
                            _high_slide.css(setProperty(curInd,0)).find('li').eq(curInd).addClass('start').siblings().addClass('clearAnt').removeClass('start');
                            setTimeout(function(){
                                 _high_slide.find('li').eq(curInd).siblings().removeClass('clearAnt');
                            },10);
                        },speed+100);
                    }else{
                        _high_slide.stop().animate(setProperty(0,0), speed,function(){
                            _high_slide.css(setProperty(curInd,0));
                            iscanChange=true; 
                        });
                    }
                }else{
                    if(UM_SUPPORT.transition){
                        if(oldInd===999){
                            _high_slide.children('li').eq(curInd).addClass('clearAnt start ');
                            setTimeout(resizeHigh,10);
                            iscanChange=true;
                        }else{
                            _high_slide.css(setProperty(curInd, speed));
                            setTimeout(function(){
                                _high_slide.find('li').eq(curInd).addClass('start').siblings().addClass('clearAnt').removeClass('start');
                                setTimeout(function(){
                                     _high_slide.find('li').eq(curInd).siblings().removeClass('clearAnt');
                                },10);
                                setTimeout(function(){
                                    _high_slide.find('li').eq(curInd).addClass('clearAnt');
                                    iscanChange=true;
                                },speed+100);
                            },speed+100);
                        }
                    }else{
                        if(UM_SUPPORT.ie<9){
                            _high_slide.css(setProperty(curInd,0));
                            iscanChange=true;
                        }else{
                            if(oldInd===999){
                                _high_slide.children('li').eq(curInd).addClass('clearAnt start ');
                                setTimeout(resizeHigh,10);
                                iscanChange=true;
                            }else{
                                _high_slide.stop().animate(setProperty(curInd,0), speed, function(){
                                   iscanChange=true; 
                                });
                            }
                        }
                        
                    }
                }
                
            },
            autoplay=function(){
                curInd=curInd>=slideTotal-(multi ? 2 : 1) ? 0 : curInd++;
                _high_switch.find('a').eq(curInd).click();
            };
        
        
        
        
        _high_switch.find('a').on({
            click : function(){
                if($(this).hasClass('current') || !iscanChange) return false;
                iscanChange=false;
                $(this).addClass('current').siblings().removeClass('current');
                curInd=multi ? $(this).index()+1 : $(this).index();
                changeHigh();
                clearTimeout(ttt);
                ttt=setTimeout(autoplay,delay);
                oldInd=curInd;
                return false;
            },
            mouseenter : function(){
                clearTimeout(ttt);
            },
            mouseleave : function(){
                clearTimeout(ttt);
                ttt=setTimeout(autoplay,delay);
            }
        });
       
        
        
        
        
        TH.highStop=function(){
            clearTimeout(ttt);
            clearTimeout(nttt);
        };
        TH.highPlay=function(){
            clearTimeout(ttt);
            clearTimeout(nttt);
            if(UM_SUPPORT.ismobile){
                nttt=setTimeout(nextItem,delay);
            }else{
                ttt=setTimeout(autoplay,delay);
            }
        };
        
        function nextItem(){
			curInd = Math.min(curInd+1, slideTotal-1);
			moveItem(wWidth*curInd,speed);
		};
		function prevItem(){
			curInd = Math.max(curInd-1, 0);
			moveItem(wWidth*curInd,speed);
		};
        
		function moveItem(distance,duration){
			_high_slide.css({transitionDuration: (duration/1000).toFixed(1) + "s"});
			_high_slide.css({transform: "translate3d("+ -distance +"px,0px,0px)"});
			
			if(curInd==slideTotal-1){
				_high_switch.find('a').eq(0).addClass("current").siblings().removeClass("current");
			}else if(curInd==0){
				_high_switch.find('a').eq(slideTotal-3).addClass("current").siblings().removeClass("current");
			}else{
				_high_switch.find('a').eq(curInd-1).addClass("current").siblings().removeClass("current");
			}
			_high_slide.on("webkitTransitionEnd",function(){
				if(curInd==slideTotal-1){
					_high_slide.css({transitionDuration:  "0s"});
					_high_slide.css({transform: "translate3d("+ -wWidth +"px,0px,0px)"});
					curInd=1;
				}
				if(curInd==0){
					_high_slide.css({transitionDuration: "0s"});
					_high_slide.css({transform: "translate3d("+ -wWidth*(slideTotal-2) +"px,0px,0px)"});
					curInd=slideTotal-2;
				}
			});
            
            clearTimeout(nttt);
            nttt=setTimeout(nextItem,delay);
            
            
        };
        
        
        if(UM_SUPPORT.ismobile){
            _vivo_high_wrap.swipe({
                swipeStatus: function(event, phase, direction, distance, duration){
                    var duration=0;
                    if(phase=="move" && (direction=="left" || direction=="right")){
                        if(direction=="left"){
                            moveItem((wWidth*curInd)+distance,duration);
                        }else if(direction=="right"){
                            moveItem((wWidth*curInd)-distance,duration);
                        }
                    }else if(phase=="cancel"){
                        moveItem(wWidth*curInd,speed);
                    }else if(phase=="end"){
                        if(direction=="left"){
                            nextItem();
                        }else if(direction=="right"){
                            prevItem();
                        }
                    }
                },
                allowPageScroll:"vertical"
            })
            .click(function(){
                window.open(_high_slide.children('li').eq(curInd).find('a').attr('href'));
                return false;
            });
            _high_switch.find('a').first().addClass('current').siblings().removeClass('current');
            if(slideTotal>1) _high_slide.css({transform: "translate3d("+ (-wWidth) +"px,0,0)",transitionDuration:"0s"});
            clearTimeout(nttt);
            nttt=setTimeout(nextItem,delay);
        }else{
            _high_switch.find('a').first().click();
        }
        
        $(window).on({
            resize:resizeHigh
        });
        
    },
    runs : function(){
		var mainBox=$("#mobile-wrap"),
			TH=this,
			section=mainBox.find("#mobile-contain .vmb-stage"),
			winheight=curScoll=0;

		TH.section.xinit();

		$(window).on({
			resize : function(){
				winheight=$(this).height();
			},
			scroll : function(){
				curScoll=$(this).scrollTop();
				for(var i=0; i<section.size(); ++i){
					if(curScoll > parseInt(section.eq(i).offset().top) - winheight + section.eq(i).height() * 0.5 && !section.eq(i).hasClass("start") && !$('html').hasClass("layer-ant")){
						section.eq(i).addClass("start");
						if(typeof TH.section['act'+section.eq(i).index()] === 'function') TH.section['act'+section.eq(i).index()]();
					}					
				}
			}
		}).resize().scroll();

	},
    section : function(){
        
    }
};












                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            