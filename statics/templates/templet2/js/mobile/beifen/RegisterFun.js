$(function() {
    var e = "http://passport.1yyg.com";
    var c = $("#userMobile");
    var a = $("#btnNext");
    var b = $("#isCheck");
    var d = function() {
        var k = 0;
        var h = "";
        var q = function(u) {
            var t = /^\d+$/;
            return t.test(u)
        };
        var m = function(u) {
            var t = /^1\d{10}$/;
            return t.test(u)
        };
        var l = {
            txtStr: "�����������ֻ�����",
            ishad: "�ѱ�ע�ᣬ������ֻ�����",
            error: "��������ȷ���ֻ�����",
            many: "��֤������������࣬���Ժ�����",
            retry: "��֤�뷢��ʧ�ܣ�������",
            ok: "�ú������ע��"
        };
        var f = {
            txtStr: "��һ��",
            checkNO: "������֤�ֻ���",
            sendCode: "���ڷ�����֤��"
        };
        var i = function(t) {
            $.PageDialog.fail(t)
        };
        var n = function() {
            if (!isLoaded || k != 2) {
                return
            }
            var u = h;
            var t = function(v) {
                if (v.state == 0) {
                    location.replace("mobilecheck.html?mobile=" + u);
                    return
                } else {
                    if (v.state == 2) {
                        i(l.many)
                    } else {
                        i(l.retry)
                    }
                }
                isLoaded = true;
                a.html(f.txtStr).removeClass("grayBtn").bind("click", g)
            };
            isLoaded = false;
            a.html(f.sendCode).addClass("grayBtn").unbind("click");
            GetJPData(e, "ECUP", "userMobile=" + u, t)
        };
        var o = function() {
            if (!isLoaded) {
                return
            }
            var u = h;
            var t = function(v) {
                if (u == h) {
                    if (v.state == 1) {
                        k = 1;
                        i(l.ishad)
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
            GetJPData(e, "checkname", "name=" + u, t)
        };
        var g = function() {
            h = c.val();
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
    Base.getScript(Gobal.Skin + "/JS/pageDialog.js?v=130826", d)
});