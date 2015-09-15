$(function() {    
    var c = $("#userMobile");
    var ps = $("#txtPassword");
    var vv = $("#txtVerify");
    var a = $("#btnNext");
    var b = $("#isCheck");
    var d = function() {
        var k = 0;
        var h = "";
        var psv = "";
        var vf = "";
        var q = function(u) {
            var t = /^\d+$/;
            return t.test(u)
        };
        var m = function(u) {
            var t = /^1\d{10}$/;
            return t.test(u)
        };
        var l = {
            txtStr: "请输入您的手机号码",
            ishad: "已被注册，请更换手机号码",
            error: "请输入正确的手机号码",
            verify: "请输入验证码",
            verifyerr: "请输入正确的验证码",
            many: "验证码请求次数过多，请稍后再试",
            retry: "验证码发送失败，请重试",
            msgerror: "系统短息配置不正确",
            ok: "该号码可以注册"
        };
        var f = {
            txtStr: "下一步",
            checkNO: "正在验证手机号",
            sendCode: "正在发送验证码"
        };
        var i = function(t) {
            $.PageDialog.fail(t)
        };
        var n = function() {		
            if (!isLoaded || k != 2) {
                return
            }
            var u = h;
            var pass = psv;
            var t = function(v) {
			//alert(v.state);				
                if (v.state == 0) {					
                    location.replace(Gobal.Webpath+"/mobile/user/mobilecheck/" + u);
                    return
                } else {
                    if (v.state == 2) {
                        i(l.many)
                    }else if(v.state==-1){
                        i(l.verifyerr)
                    }  else{
                        i(l.retry)
                    }
                }
                isLoaded = true;
                a.html(f.txtStr).removeClass("grayBtn").bind("click", g)
            };			
            isLoaded = false;

            a.html(f.sendCode).addClass("grayBtn").unbind("click");

            $.post(Gobal.Webpath + "/mobile/ajax/userMobile", { "username": u,"password": pass,"verify":vf }, t, "json");
			//$.getJSON(Gobal.Webpath + "/mobile/ajax/userMobile",{"username":u,"password":pass,"verify":vf},t);
           // GetJPData(Gobal.Webpath, "ajax", "userMobile/"+u+"/"+pass, t);
        };
        var o = function() {
            if (!isLoaded) {
                return
            }
            var u = h;
            var pass = psv;
            var t = function(v) {
			 //alert(v.state);
                if (u == h) {
                    if (v.state == 1) {
                        k = 1;
                        i(l.ishad)
                    }else if(v.state == 2){
					   k = 1;
					   i(l.msgerror)
					} else {
                        if (v.state == 0) {
                            k = 2;
                            isLoaded = true;
                            n()
                        } else {
                            k = 0
                        }
                    }
                }
            };
            GetJPData(Gobal.Webpath, "ajax", "checkname/"+ u, t)
        };
        var g = function() {
		
            h = c.val();
            psv = ps.val();
            vf = vv.val();
            if (j) {
                return
            }
            if (h == "" || h == l.txtStr) {
                i(l.txtStr)
            } else {
                if ((h.length < 11 || h.length >= 11) && !m(h)) {
                    i(l.error)
                } else {
                    if (m(h)) {
                        o()
                    }
                }
            }
            if (vf == "" || vf == l.verify) {
                i(l.verify)
            }
        };
        var r = "";
        var s = function() {
            if (r != c.val()) {
                if (q(c.val()) || c.val() == "") {
                    r = c.val()
                } else {
                    c.val(r)
                }
            }
            if (checkSwitch) {
                setTimeout(s, 200)
            }
        };
        c.bind("focus",
        function() {
            $(this).attr("style", "color:#666666");
            checkSwitch = true;
            s()
        }).bind("blur",
        function() {
            checkSwitch = false
        });
        var j = false;
        var p = function() {
            if (!j) {
                b.addClass("noCheck");
                a.addClass("grayBtn").unbind("click")
            } else {
                b.removeClass("noCheck");
                var t = c.val();
                a.removeClass("grayBtn").bind("click", g)
            }
            j = !j
        };
        a.bind("click", g);
        b.bind("click", p);
        isLoaded = true
    };
    Base.getScript(Gobal.Skin + "/js/mobile/pageDialog.js", d)
});