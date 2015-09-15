<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-Frame.css"/>
<div class="left">
	<div class="head">
		<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?>" target="_blank">			
			<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img('160160'); ?>" width="160" height="160" border="0"/>			
		</a>
	</div>
	<div class="head-but">
		<a href="<?php echo WEB_PATH; ?>/member/home/userphoto" class="blue">修改头像</a>
		<a href="<?php echo WEB_PATH; ?>/member/home/modify" class="blue fr">编辑资料</a>
	</div>
	<div class="sidebar-nav">
		<p class="sid-line"></p>
		<h2 class="sid-icon01"><a href="<?php echo WEB_PATH; ?>/member/home"><b></b>我的<?php echo _cfg('web_name_two'); ?></a></h2>
		<p class="sid-line"></p>
		<h3 class="sid-icon09" ><a href="<?php echo WEB_PATH; ?>/member/home/modify"><b></b>个人设置</a></h3>		
		<p class="sid-line"></p>
		<h3 class="sid-icon02">
			<a href="javascript:void();"><b></b>我的云购 <s title="收起"></s></a>
		</h3>
		<ul>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userbuylist">云购记录</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/orderlist">获得的商品</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/singlelist">晒单</a></li>
		</ul>
		<p class="sid-line"></p>
		<h3 class="sid-icon03 " >
			<a href="javascript:void();"><b></b>圈子管理 <s title="收起"></s></a>
		</h3>
		<ul>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/joingroup">加入的圈子</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/topic">圈子话题</a></li>
		</ul>
		<p class="sid-line"></p>
		<h3 class="sid-icon04 " >
			<a href="javascript:void();"><b></b>邀请管理 <s title="收起"></s></a>
		</h3>
		<ul>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/invitefriends">邀请好友</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/commissions">佣金明细</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/cashout">申请提现</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/record">提现记录</a></li>
		</ul>
		<p class="sid-line"></p>		
		<h3 class="sid-icon05 " >
			<a href="javascript:void();"><b></b>账户管理 <s title="收起"></s></a>
		</h3>
		<ul>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userbalance">账户明细</a></li>
			<li class=""><a href="<?php echo WEB_PATH; ?>/member/home/userrecharge">账户充值</a></li>
		</ul>
		<p class="sid-line"></p>
		<h3 class="sid-icon07 sid-hcur" hasChild="0" url=""><a href="<?php echo WEB_PATH; ?>/member/home/userfufen"><b></b>我的福分</a></h3>

	</div>
	<div class="sid-service">
		<p>
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes" target="_blank" class="service-btn">
				<s></s><img border="0" src="images/pa" style="display:none;">在线客服
			</a>
		</p>
		<span>客服热线</span>
		<b class="tel"><?php echo _cfg("cell"); ?></b>
	</div>
</div>
<script type="text/javascript">
var _NavState = [true, true, true, true, true];  
$("div.sidebar-nav").find("h3").each(function(i,v){
	var _This = $(this);
	var _HasClild = _This.attr("hasChild")=="1"; 
	var _SObj = _This.find("s");
	_This.click(function(e){
		if(_HasClild){
			var _State = _NavState[i];                
			/* 一级栏目更改样式 */
			if(_State){
				_This.addClass("sid-iconcur");
				_SObj.attr("title","展开");
			}
			else {
				_This.removeClass("sid-iconcur");
				_SObj.attr("title","收起");
			}                
			/* 二级栏目显示或隐藏 */
			_This.next("ul").children().each(function(){
				if(_State){
					$(this).hide(50);
				}
				else {
					$(this).show(50);
				}
			});
			_NavState[i] = !_State;
		}
	});
});   
</script>

<!--content left end-->