$(function() {   
/**
*
*  Base64 encode / decode
*
*  @author haitao.tu
*  @date   2010-04-26
*  @email  tuhaitao@foxmail.com
*
*/
 
    var b = function() {
        var h = "_uName";
        var g = $("#txtAccount");
        var k = $("#txtPassword");
        var vv = $("#txtVerify");
        var j = $("#showPWD");
        var e = $("#btnLogin");
        var m = false;
        var f = function(x) {
            var w = /^1\d{10}$/;
            return w.test(x)
        };
        var d = function(x) {
            var w = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            return w.test(x)
        };
        var u = function(x) {
            var w = /^([\x00-\xff])+$/;
            return w.test(x)
        };
        var r = function(y) {
            var x = /^([\x00-\xff]){6,20}$/;
            var w = /^\S{6,20}$/;
            return x.test(y) && w.test(y)
        };
        var o = {
            txtStr: "请输入您的手机号码/邮箱",
            txtpwd: "请输入您的登录密码",
            errorU: "请输入正确的手机号/邮箱",
            errorP: "密码长度为6-20位字符",
            loginerr0: "登录帐号或密码不正确",
            loginerr1: "登录帐号未注册",
            loginerr2: "账号被冻结，请与客服联系",
            loginerr3: "失败次数超限，被冻结5分钟",
            loginerr4: "登录失败，请重试",
            showPWD: "显示密码",
            loginerr5: "必须输入帐号和密码",
            loginok: "登录成功",
            verify:"请输入验证码",
            verifyerr:"验证码错误"
        };
        var t = {
            txtStr: "登录",
            checkCode: "正在登录"
        };
        var v = function(w) {
            $.PageDialog.fail(w)
        };
        var i = function(x, w) {
            $.PageDialog.ok(x, w)
        };
        var q = function() {
            if (!isLoaded) {
                return
            }
            var y = g.val().trim();
            var w = k.val().trim();
            var vf = vv.val().trim();
            if(vf==""){
                v(o.verify);
                return;
            }
            if (y == "" || y == o.txtStr) {
                v(o.txtStr);
                return
            } else {
                if (w == "" || w == o.txtpwd) {
                    v(o.txtpwd);
                    return
                } else {
                    if (!f(y) && !d(y)) {
                        v(o.errorU);
                        return
                    } else {
                        if (!r(w)) {
                            v(o.errorP)
                        } else {

                            var x = function(z) {
                                if (z.state == 0) {
                                    e.hide();
                                    /*$.cookie(h, y, {
                                        domain: "1yyg.com",
                                        expires: 1,
                                        path: "/"
                                    });*/

                                    GetJPData(Gobal.Webpath, "ajax", "loginok",
                                    function(A) {
									   if(A.Code==0){
											var B = function() {
												var C = $("#hidLoginForward").val();
												if (C.length == 0 || C.indexOf(Gobal.Webpath+"/mobile/user/login/") > 0) {
													C = Gobal.Webpath+"/mobile/mobile"
												}
												location.replace(C);
												return
											};
											i(o.loginok, B)
										}
                                    })
                                } else {
                                    if (z.state == 1 && z.num == -1) {
                                        v(o.loginerr0)
                                    } else {
                                        if (z.state == 1 && z.num == -2) {
                                            v(o.loginerr1)
                                        } else {
                                            if (z.state == 1 && z.num == -3) {
                                                v(o.loginerr2)
                                            } else {
                                                if (z.state == 3) {
                                                    v(o.loginerr3)
                                                } else if(z.state == 1 && z.num == -4) {
                                                    v(o.verifyerr)
                                                }else{
                                                    v(o.loginerr4)
                                                }
                                            }
                                        }
                                    }
                                }

                                isLoaded = true;
                                e.html(t.txtStr).removeClass("grayBtn").bind("click", q)
                            };
                            isLoaded = false;
                            e.html(t.checkCode).addClass("grayBtn").unbind("click");
                           // console.log(Gobal.Webpath + "/mobile/ajax/userlogin");
							//$.getJSON(Gobal.Webpath + "/mobile/ajax/userlogin",{username:y,password:w},function(data){
                             //   console.log(data);
                            //});

                            $.post(Gobal.Webpath + "/mobile/ajax/userlogin", { "username": y,"password": w,"verify":vf }, x, "json");
							//GetJPData(Gobal.Webpath, "ajax", "userlogin/" + y + "/" + w, x)
                        }
                    }
                }
            }
        };
		
        var n = "";
        var l;
        var p = function() {
            var w = l.val();
            if (n != w) {
                if (u(w) || w == "") {
                    n = w
                } else {
                    l.val(n).focus()
                }
            }
            if (m) {
                setTimeout(p, 200)
            }
        };
        g.bind("focus",
        function() {
            $(this).attr("style", "color:#666666");
            m = true;
            l = $(this);
            p()
        }).bind("blur",
        function() {
            m = false
        });
        k.bind("focus",
        function() {
            $(this).attr("style", "color:#666666");
            m = true;
            l = $(this);
            p()
        }).bind("blur",
        function() {
            m = false
        });
        var s = function() {
            var w = $.cookie(h);
            if (w != null) {
                g.val(w).attr("style", "color:#666666")
            }
        };
        s();
        e.bind("click", q);
        isLoaded = true
    };
    var a = function() {
        Base.getScript(Gobal.Skin + "/js/mobile/pageDialog.js", b)
    };
    Base.getScript(Gobal.Skin + "/js/mobile/Comm.js", a)
});