document.writeln("<!--[if lte IE 7]>");
document.writeln("<div style=\"color: #474747;padding: 8px 35px 8px 14px;background-color: #FCF8E3;border: 1px solid #FBEED5;line-height: 1.5;text-align: center;\">");
document.writeln("    <strong>注意！</strong>");
document.writeln("    本网站不支持IE8以下的浏览器，为了获得更快、更安全的浏览体验，我们建议您使用");
document.writeln("    <a href=\"http://www.google.com/chrome\" target=\"_blank\">chrome</a>！");
document.writeln("    或者");
document.writeln("    <a href=\"http://firefox.com.cn/\" target=\"_blank\">火狐</a>浏览器");
document.writeln("</div>");
document.writeln("<![endif]-->");

//ie 
	function placeholderSupport() {
    return 'placeholder' in document.createElement('input');
}
$(function  () {
	//自动登录
	$(".forgot .remember").click(function  () {
		$(this).css({'background-position': '-88px -38px'})
	})
	$(".forgot .remember").toggle(
  		function () {
  			$("#remember").val("1");
  	  		$(this).css({'background-position': '-88px -38px'});
  	  		$("#forgot_hide").val("yes_forgot");
  		},
 		 function () {
  			$("#remember").val("0");
   			 $(this).css({'background-position': '-88px 0px'});
   			 $("#forgot_hide").val("no_forgot");
  		}
	);

	//选择注册方式
	$('.radio input').change(function(){  
		var radio_vals= $(this).val(); 
		if (radio_vals=="phone") {
			$("#phone-reg").show();
			$("#email-reg").hide();
		} else{
			$("#phone-reg").hide();
			$("#email-reg").show();
		};           
    });

	//第三方登录 选择
    $(".helis").click(function  () {
    	$("#helis-form").show();
		$("#founds-form").hide();
		$(this).css({background:"#cce8f7",color:"#008cd6"})
		$(".founds").css({background:"#ccc",color:"#fff"})
    })
    $(".founds").click(function  () {
    	$("#helis-form").hide();
		$("#founds-form").show();
		$(this).css({background:"#cce8f7",color:"#008cd6"})
		$(".helis").css({background:"#ccc",color:"#fff"})
    })

 	//选择密保问题
    /*
 	$(".select-ico").click(function(){
//		$(this).next("ul").show();
		$(this).next("ul").slideDown(200);
		inner("error_proquestion", "");
	});*/
    
    $(".select-ico").click(function(){
		 var displays=$(this).next("ul").css("display");
		 if (displays=="none") {
               $(this).next("ul").show();
           } else{
              $(this).next("ul").hide();
           };
		
	});

	$("#select1 ul li").click(function(){  
		$("#select1 input:first").val($(this).html());
		$(this).parent().hide();
	});


	//选择找回密码方式
	$('#sle-way .radio-style').change(function(){	
		var radio_vals= $(this).val(); 
		switch(radio_vals){
			case "email-way":
				$("#phone-way,#select1").hide();
				$("#email-way").show();
			  break;
			case "phone-way":
				$("#phone-way").show();
				$("#select1,#email-way").hide();
			  break;
			case "question-way":
			  	$("#phone-way,#email-way").hide();
				$("#select1").show();
			  break;
		}
	
	})
	
	
	if(!placeholderSupport()){ 
//		$.each($('[placeholder]'),function  (i,val) {
		$('input[type=text],input[type=password]').each(function(){
			text = $(this).attr("placeholder");
//			val == this 
			if ($(this).attr("type")=="password") { 
				$(this).before('<input class="pwdPlaceholder" type="text"  value='+text+' />'); 
				$(this).hide();
				$(".pwdPlaceholder").focus(function  () {
					$(this).hide()
					$(this).siblings("input").show().focus();
				})
			} ;
			var place=text;
			$(this).val(place);

		})

		$(".v_inp").focus(function  () {
			input_focus2(this)
		})
		$(".v_inp").blur(function  () {
			if ($(this).attr("type")=="password") {
				input_blur2(this);
			} else{
				input_blur3(this);
			};
		})
    }else{
    	$(".v_inp").focus(function  () {
			input_focus(this)
		})
		$(".v_inp").blur(function  () {
			input_blur(this);
		})
    }


})

function findway(radio_vals){	
//		var radio_vals= $(this).val(); 
		switch(radio_vals){
			case "email-way":
				$("#phone-way,#select1").hide();
				$("#email-way").show();
			  break;
			case "phone-way":
				$("#phone-way").show();
				$("#select1").hide();
			  break;
			case "question-way":
			  	$("#phone-way").hide();
				$("#select1").show();
			  break;
		}
	}

/**
 * 信息提示函数
 * id:标签的id名称, content：需要提示的内容
 */
function inner ( id , content) {
 		var objs=$("#"+id);
 		 objs.html(content);
 		objs.show();
    }

/**
 * 显示输入框后面的图标（正确图标还是错误图标）
 * id:input标签的id名称, status:"1"显示正确图标 "0"显示错误图标
 */
function showErrorIcon (id,status) {
	$("#"+id).siblings("b").show();
	if (status=="1") {
		$("#"+id).next(".tip").hide();
		$("#"+id).siblings("b").addClass("correct").removeClass("error");
	} else if(status=="0"){
		$("#"+id).next(".tip").show();
		$("#"+id).siblings("b").addClass("error").removeClass("correct");
	};
}

/**
 * 输入框得到焦点,清除此输入框下的提示信息.若输入框内无数据,则输入框后的图标为空,如有数据,则显示正确图标
 * id:input标签的id名称
 */
function inputFocus(id) {
	//add by lixiaobing start placeholder问题
	if(!placeholderSupport()){
		$("#"+id).attr("value","");
	}
	//add by lixiaobing end
	$("#"+id).siblings("b").hide();
//	var input_val=$.trim($("#"+id).val());
//	if(input_val)
//	{
//		$("#"+id).siblings("b").show();
//		$("#"+id).next(".tip").hide();
//		$("#"+id).siblings("b").addClass("correct").removeClass("error");
//	}
	inner("error"+id, "");
}

/**
 * 输入框失去焦点,判断此输入框是否为空.若为空,则提示相应的错误,并且显示错误图标.若不为空,则不提示错误,并且显示正确图标
 * id:input标签的id名称,tishi:如”帐户“，”密码“。
 */
function inputBlur(id, tishi) {
	var input_val=$.trim($("#"+id).val());
	$("#"+id).siblings("b").show();
	if (input_val) {
		$("#"+id).next(".tip").hide();
		$("#"+id).siblings("b").addClass("correct").removeClass("error");
		inner("error"+id, "");
	} else{
		$("#"+id).next(".tip").show();
		$("#"+id).siblings("b").addClass("error").removeClass("correct");
		inner("error"+id, tishi);
	};
}

//邮箱跳转
function goemail (str) {
	var separator = "@";
	if(str.indexOf('@') == -1){
		separator ="%40";
	}
	var arr=str.split(separator) ; 
	var all_email=arr[1]; 
	var get_email=all_email.substring  (0,3);
	switch(get_email){
	case "sin":
		  location.href = "http://ad.mail.sina.com.cn";
		  break;
		case "yea":
		  location.href = "http://www.yeah.net";
		  break;
		case "yah":
		  location.href = "http://mail.cn.yahoo.com";
		  break;
		case "qq.":
		  location.href = "http://mail.qq.com";
		  break;
		case "139":
		  location.href = "http://mail.10086.cn";
		  break;
		case "21c":
		  location.href = "http://mail.21cn.com";
		  break;
		case "soh":
		  location.href = "http://mail.sohu.com";
		  break;
		  case "126":
		  location.href = "http://mail.126.com";
		  break;
		case "gma":
		  location.href = "https://accounts.google.com/ServiceLogin?service=mail&continue=https://mail.google.com/mail/&hl=zh-CN#__utma=29003808.993752852.1382081171.1382081171.1382081171.1&__utmb=29003808.0.10.1382081171&__utmc=29003808&__utmx=-&__utmz=29003808.1382081171.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)&__utmv=-&__utmk=193873262";
		  break;
		case "fox":
		  location.href = "http://mail.qq.com/cgi-bin/loginpage?t=fox_loginpage&sid=,2,zh_CN&r=b5ea9ae5ee13f0d80054e5dca9010f40";
		  break;
		case "hot":
		  location.href = "http://login.live.com";
		  break;
		default:
		    location.href ="http://mail.163.com";
	}
}

function formatName(id)
{
	var reg=/^(?!_)(?!.*?_$)[a-zA-Z0-9_\u4e00-\u9fa5]{2,15}$/;
	var reg2=/^[0-9]*$/;
	var reg3=/^[\u4e00-\u9fa5]$/;
	var vals=$.trim($("#"+id).val());
	if(!reg.test(vals))
	{
		
		if(vals[0]=="_")
		{
			inner( 'error'+id , '不能以下划线开头');
			showErrorIcon(id, "0");
			return false;
		}
		inner( 'error'+id , '请输入3-15个字符或2-7个汉字');
		showErrorIcon(id, "0");
		return false;
	}
	var size=0;
	for (var i = 0; i < vals.length; i++) {
		if(!reg3.test(vals[i]))
		{
			size+=1;
		}
		else
		{
			size+=2;
		}
	}	
	if(size<3 || size > 15)
	{
		inner( 'error'+id , '请输入3-15个字符或2-7个汉字');
		showErrorIcon(id, "0");
		return false;
	}
	if(reg2.test(vals))
	{
		inner( 'error'+id , '用户名不能为纯数字');
		showErrorIcon(id, "0");
		return false;
	} 
	showErrorIcon(id, "1");
	return true;
}


function hideEmail(email)
{
		var start = email.substring(0, email.indexOf('@'));
		var end= email.substring(email.indexOf('@'));
		var temp='';
		for(var i = 0; i < start.length; i++)
		{
			if(i<2)
			{
				temp+=start[i];
			}
			else
			{
				temp+='*';
			}	
		}
		return temp+end;
}
//var patternName=/^[a-zA-Z0-9_]{3,15}|[\u4e00-\u9fa5]{2,7}$/;
var patternPhone = /^((\+86)|(86))?(1)\d{10}$/; 
var patternEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var patternPwd=/^[a-zA-Z0-9~!@#$%^&*()=+-\_\|.\?\/\\\[\]{};:'",<>]{6,16}$/;


function input_focus2(id) {
	$(id).val("");
	$(id).siblings("b").hide();
}



function input_blur2(id) {
	var input_val=$.trim($(id).val());
	$(id).siblings("b").show();
	if (input_val) {
		$(id).next(".tip").hide();
		$(id).siblings("b").addClass("correct").removeClass("error");
		
	} else{
		$(id).next(".tip").show();
		$(id).siblings("b").addClass("error").removeClass("correct");
		$(id).hide();
		$(id).siblings("input").show();
	};
}


function input_blur3(id) {
		var input_val=$.trim($(id).val());
		$(id).siblings("b").show();
		if (input_val) {
			$(id).next(".tip").hide();
			$(id).siblings("b").addClass("correct").removeClass("error");
			
		} else{
			$(id).next(".tip").show();
			$(id).siblings("b").addClass("error").removeClass("correct");
			$(id).val($(id).attr("placeholder"))
		};
	}

