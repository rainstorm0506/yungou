$(function() {
    var b = $("#postBox10");
    var o = $("#postBox20");
    var k = $("#postBox30");
    var l = $("#postLoading");
    var p = $("#btnLoadMore");
    var n = 10;
    var e = 10;
    var m = null;
    var q = false;
    var j = false;
    var i = false;
    var g = false;
    var d = {
        FIdx: 1,
        EIdx: n,
        isCount: 1
    };
    var c = {
        FIdx: 1,
        EIdx: n,
        isLoaded: 0
    };
    var a = {
        FIdx: 1,
        EIdx: n,
        isLoaded: 0
    };
    var f = function(r) {
        if (r && r.stopPropagation) {
            r.stopPropagation()
        } else {
            window.event.cancelBubble = true
        }
    };
    var h = function() {
        var s = 0;
        var r = function() {
            var u = "";
            if (e == 10) {
                u = "FIdx=" + d.FIdx + "&EIdx=" + d.EIdx + "&isCount=" + d.isCount + "&order=10"
            } else {
                if (e == 20) {
                    u = "FIdx=" + c.FIdx + "&EIdx=" + c.EIdx + "&isCount=0&order=20"
                } else {
                    if (e == 30) {
                        u = "FIdx=" + a.FIdx + "&EIdx=" + a.EIdx + "&isCount=0&order=30"
                    }
                }
            }
            return u
        };
        var t = function() {
            p.hide();
            l.show();
            GetJPData("http://m.1yyg.com", "getPostPageList", r(),
            function(z) {
                if (z.code == 0) {
                    if (d.isCount == 1 && e == 10) {
                        s = z.count;
                        d.isCount = 0
                    }
                    var A = 0;
                    var y = z.listItems;
                    for (var w = 0; w < y.length; w++) {
                        var B = '<div class="cSingleInfo">';
                        B += '<dl class="fl"><a href="http://m.1yyg.com/userpage/' + y[w].userWeb + '"><img src="http://faceimg.1yyg.com/UserFace/' + y[w].userPhoto + '"><b></b></a></dl>';
                        B += '<div class="cSingleR m-round" id="' + y[w].postID + '">';
                        B += "<ul>";
                        B += '<li><em class="blue" uweb="' + y[w].userWeb + '">' + y[w].userName + '</em><span><strong class="c9">：</strong>' + y[w].postTitle + "</span> <h5>" + y[w].postTime + "</h5></li>";
                        B += "<li><p>" + y[w].postContent + "</p></li>";
                        B += '<li class="maxImg">';
                        var u = y[w].postAllPic.split(",");
                        for (var v = 0; v < u.length; v++) {
                            B += '<img src="' + Gobal.LoadPic + '" src2="http://mimg.1yyg.com/userpost/small/' + u[v] + '" />'
                        }
                        B += "</li>";
                        B += "<li><dd><s></s><strong>" + y[w].postHits + "</strong>人羡慕嫉妒</dd><dd><i></i><strong>" + y[w].postReplyCount + "</strong>条评论</dd></li>";
                        B += "</ul>";
                        B += '<b class="z-arrow"></b>';
                        B += "</div>";
                        B += "</div>";
                        var x = $(B);
                        x.children("div.cSingleR").click(function() {
                            location.href = "/post/detail-" + $(this).attr("id") + ".html"
                        }).find("em.blue").click(function(C) {
                            f(C);
                            location.href = "http://m.1yyg.com/userpage/" + $(this).attr("uweb")
                        });
                        if (e == 10) {
                            A = d.EIdx;
                            b.append(x)
                        } else {
                            if (e == 20) {
                                A = c.EIdx;
                                c.isLoaded = 1;
                                o.append(x)
                            } else {
                                if (e == 30) {
                                    A = a.EIdx;
                                    a.isLoaded = 1;
                                    k.append(x)
                                }
                            }
                        }
                    }
                    if (A >= s) {
                        if (e == 10) {
                            j = true
                        } else {
                            if (e == 20) {
                                i = true
                            } else {
                                if (e == 30) {
                                    g = true
                                }
                            }
                        }
                    } else {
                        p.show()
                    }
                    loadImgFun(0)
                }
                l.hide();
                q = false
            })
        };
        this.initData = function() {
            t()
        };
        this.getNextPage = function() {
            t()
        }
    };
    m = new h();
    m.initData();
    $("#navBox").children("div").each(function(r) {
        var s = $(this);
        s.click(function() {
            s.addClass("z-sgl-crt");
            s.siblings().removeClass("z-sgl-crt");
            if (r == 0) {
                e = 10;
                b.show();
                o.hide();
                k.hide();
                if (!j) {
                    p.show()
                }
            } else {
                if (r == 1) {
                    e = 20;
                    b.hide();
                    o.show();
                    k.hide();
                    if (c.isLoaded == 0) {
                        m.initData()
                    } else {
                        if (!i) {
                            p.show()
                        }
                    }
                } else {
                    e = 30;
                    b.hide();
                    o.hide();
                    k.show();
                    if (a.isLoaded == 0) {
                        m.initData()
                    } else {
                        if (!g) {
                            p.show()
                        }
                    }
                }
            }
        })
    });
    p.click(function() {
        if (!q) {
            q = true;
            if (e == 10 && !j) {
                d.FIdx += n;
                d.EIdx += n;
                m.getNextPage()
            } else {
                if (e == 20 && !i) {
                    c.FIdx += n;
                    c.EIdx += n;
                    m.getNextPage()
                } else {
                    if (!g) {
                        a.FIdx += n;
                        a.EIdx += n;
                        m.getNextPage()
                    }
                }
            }
        }
    })
});