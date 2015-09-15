<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="qc:admins" content="24673242717526375" />
<title><?php if(isset($title)): ?><?php echo $title; ?><?php  else: ?><?php echo _cfg("web_name"); ?><?php endif; ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/register.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>




</head>
<body>
<div class="header">
	<div class="site_top">
		<div class="head_top">
		<p class="collect"><a href="javascript:;" id="addSiteFavorite">收藏<?php echo _cfg("web_name_two"); ?></a></p>
		<p class="Ht-qqicon"><a class="gray01" href="<?php echo WEB_PATH; ?>/group_qq" target="_blank">官方QQ群</a></p>
		<ul class="login_info" style="display: block;">
			<?php if(get_user_arr()): ?>
			<li class="h_wel" id="logininfo">
				<a href="<?php echo WEB_PATH; ?>/member/home" class="gray01" >					
					<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img('3030'); ?>" width="30" height="30"/>					
					<?php echo get_user_name(get_user_arr(),'username'); ?>
				</a>&nbsp;&nbsp;
				<a href="<?php echo WEB_PATH; ?>/member/user/cook_end" class="gray01">[退出]</a>
			</li>
			<?php  else: ?>
			<li id="logininfo" class="h_login">
				<i>您好，欢迎光临！</i>		
				<a class="gray01" href="<?php echo WEB_PATH; ?>/login" >登录</a>
				<span>|</span>
				<a class="gray01" href="<?php echo WEB_PATH; ?>/register" >注册</a>				
			</li>
			<?php endif; ?>
			<li class="h_1yyg">
				<a  href="<?php echo WEB_PATH; ?>/home/member">我的<?php echo _cfg('web_name_two'); ?><b></b></a>
				<div class="h_1yyg_eject" style="display:none;">
					<dl>
						<dt><a  href="<?php echo WEB_PATH; ?>/member/home">我的<?php echo _cfg('web_name_two'); ?><i></i></a></dt>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/userbuylist">云购记录</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home">获得的商品</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/userrecharge">帐户充值</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/modify">个人设置</a></dd>
					</dl>
				</div>
			</li>
			<li class="h_help"><a href="<?php echo WEB_PATH; ?>/help/1" target="_blank">帮助</a></li>
			<li class="h_inv"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes"><img border="0" src="images/pa" style="display:none;">在线客服</a></li>
			<li class="h_tel"><b><?php echo _cfg("cell"); ?></b></li>
		</ul>
		</div>
	</div>
	<div class="head_mid">
		<div class="head_mid_bg">			
			<h1 class="logo_1yyg">
				<a class="logo_1yyg_img" href="<?php echo G_WEB_PATH; ?>/" title="<?php echo _cfg('web_name'); ?>">
					<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
				</a>
			</h1>			
			<div class="head_number">
				已
					<a href="<?php echo WEB_PATH; ?>/buyrecord" target="_blank">
					<span id="spBuyCount" style="color:#22AAFF; background:#F5F5F5; opacity:1;"><?php echo go_count_renci(); ?></span>
					</a>
					人次参与云购
				
			</div>
			
			<div class="head_search">
				<input type="text" id="txtSearch" class="init" value='输入"红米手机"试一试'/>
				<input type="button" id="butSearch" class="search_submit" value="搜索"/>
				<div class="keySearch">
					<a href="<?php echo WEB_PATH; ?>/s_tag/苹果" target="_blank">苹果</a>
					<a href="<?php echo WEB_PATH; ?>/s_tag/iPhone" target="_blank">iPhone</a>
					<a href="<?php echo WEB_PATH; ?>/s_tag/智能手机" target="_blank">智能手机</a>
					<a href="<?php echo WEB_PATH; ?>/s_tag/G手机" target="_blank">3G手机</a>
					<a href="<?php echo WEB_PATH; ?>/s_tag/宝马" target="_blank">宝马</a>
					<a href="<?php echo WEB_PATH; ?>/s_tag/单反" target="_blank">单反</a>                 
				</div>
			</div>
            <div class="head_ad">			<?php $mod_go_ad = System::load_app_model('ad','go');$datas = $mod_go_ad->get_ad(2); ?>	</div>
		</div>
	</div>
</div>
<!--header end-->
<div class="head_nav">
 	<div class="nav_center">
 		<ul class="nav_list">
			<li class="sort-all-shouye" ><a href="<?php echo G_WEB_PATH; ?>">首页</a></li>
			<?php echo Getheader('index'); ?>
 		</ul>
 		<!-- <div class="mini_mycart" id="sCart">
 			<input type="hidden" id="hidChanged" value="0"/>
 			<a id="sCartNavi" class="cart"><s></s>购物车<span id="sCartTotal">0</span></a>
			<a href="<?php echo WEB_PATH; ?>/member/cart/cartlist" target="_blank" class="checkout">去结算</a>
 		</div> -->
		<div class="mini_mycart" id="sCart">
 			<a rel="nofollow" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" id="sCartNavi" class="cart"><s></s>购物车<span id="sCartTotal">0</span></a><a rel="nofollow" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" class="checkout">去结算</a>
 			<div class="mycart_list" id="sCartlist" style="z-index: 99999; display: none;">
				
 				<div class="goods_loding" id="sCartLoading" style="display: none;"><img border="0" alt="" src="<?php echo G_TEMPLATES_STYLE; ?>/images/goods_loading.gif">正在加载......</div>
 				<p id="p1">共计 <span id="sCartTotal2"> 2</span> 件商品 金额总计：<span id="sCartTotalM" class="rmbred">5.00</span></p>
 				<h3><input type="button" id="sGotoCart" value="去购物车并结算"></h3>
 			</div>
 		</div>
 	</div>
</div>
<div class="nav_class">
	<ul>
		<?php $data=$this->DB()->GetList("select * from `@#_category` where `model`='1' and `parentid` = '0' order by `order` DESC",array("type"=>1,"key"=>'',"cache"=>0)); ?>
		<?php $ln=1;if(is_array($data)) foreach($data AS $categoryx): ?>
		<li><a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $categoryx['cateid']; ?>"><?php echo $categoryx['name']; ?></a></li>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
		<li><a href="<?php echo WEB_PATH; ?>/goods_list">全部</a></li>
	</ul>
</div>
<script>
$(function(){
	$("#sCart").hover(
		function(){			
			$("#sCartlist,#sCartLoading").show();
			$("#sCartlist p,#sCartlist h3").hide();
			$("#sCart .mycartcur").remove();
			$("#sCartTotal2").html("");
			$("#sCartTotalM").html("");
			$.getJSON("<?php echo WEB_PATH; ?>/member/cart/cartheader/="+ new Date().getTime(),function(data){
				$("#sCart .mycartcur").remove();
				$("#sCartLoading").before(data.li);
				$("#sCartTotal2").html(data.num);
				$("#sCartTotalM").html(data.sum);
				$("#sCartLoading").hide();
				$("#sCartlist p,#sCartlist h3").show();
			});
		},
		function(){
			$("#sCartlist").hide();
		}
	);
	$("#sGotoCart").click(function(){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist";
	});
})
function delheader(id){
	var Cartlist = $.cookie('Cartlist');
	var info = $.evalJSON(Cartlist);
	var num=$("#sCartTotal2").html()-1;
	var sum=$("#sCartTotalM").html();
	info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];
		
	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	$("#sCartTotalM").html(info['MoenyCount']);
	$('#sCartTotal2').html(num);
	$('#sCartTotal').text(num);											
	$('#btnMyCart em').text(num);
	$("#mycartcur"+id).remove();
}
$(function(){
	$(".h_1yyg").mouseover(function(){
		$(".h_1yyg_eject").show();
	});
	$(".h_1yyg").mouseout(function(){
		$(".h_1yyg_eject").hide();
	});
	$(".h_news").mouseover(function(){
		$(".h_news_down").show();
	});
	$(".h_news").mouseout(function(){
		$(".h_news_down").hide();
	});
});
$(function(){
	$("#txtSearch").focus(function(){
		$("#txtSearch").css({background:"#FFFFCC"});
		var va1=$("#txtSearch").val();
		if(va1=='输入"红米手机"试一试'){
			$("#txtSearch").val("");
		}
	});
	$("#txtSearch").blur(function(){
		$("#txtSearch").css({background:"#FFF"});
		var va2=$("#txtSearch").val();
		if(va2==""){
			$("#txtSearch").val('输入"红米手机"试一试');
		}			
	});
	$("#butSearch").click(function(){
		window.location.href="<?php echo WEB_PATH; ?>/s_tag/"+$("#txtSearch").val();
	});
});
$(function(){
    setInterval(function(){
        $.ajax({
            url:'<?php echo WEB_PATH; ?>/home/jquery_num/init',
            dataType:'json',
            success: function(data) {
                $("#spBuyCount").text(data.n);
            }
        });
    },1000);
});
</script>