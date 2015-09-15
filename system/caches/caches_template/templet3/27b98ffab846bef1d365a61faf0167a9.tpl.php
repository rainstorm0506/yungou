<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Referrals.css"/>
<script>
$(function(){
	$("#referDocument li").bind({		
		mouseover:function(){
			var number=$("#referDocument li").index(this)+1;
			$(".S0"+number).removeClass("hidden");
		},
		mouseout:function(){
			var number=$("#referDocument li").index(this)+1;
			$(".S0"+number).addClass("hidden");
		}
	})
})
</script>
<style type="text/css">
#d_clip_container,.my_clip_button,.d_clip_copy{margin:0;width:95px; height:32px; line-height:34px; text-align:center;}
#d_clip_container{top:-32px;}
#fe_text{resize:none;margin-bottom:10px;}
.my_clip_button {position:absolute; border:1px solid #999; background-color:#ccc; cursor:default; font-size:9pt; }
.my_clip_button.hover { background-color:#eee; }
.my_clip_button.active { background-color:#aaa; }
.d_clip_copy{ font-size:14px;color:#000;}
#d_clip_button{filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity:0.5; opacity:0.5;}
</style>
<?php 
	$uid = _encrypt(get_user_uid());
 ?>
<div class="referrals_box">
	<div class="W-left fl">
		<h4><i></i></h4>
		<div id="referDocument" class="process-box">
			<ul class="process">
				<li class="p-1">
					<div class="process_con S01 hidden">
						<span><em>◆</em><s>◆</s></span>
						您每邀请一位好友成功参与云购即可获得50福分。
					</div>
				</li>
				<li class="p-2">
					<div class="process_con S02 hidden">
						<span><em>◆</em><s>◆</s></span>
						经您邀请的所有好友，成功参与云购后，您都可以获得6%的现金奖赏，并且永久有效。
					</div>				    
				</li>
				<li class="p-3">
					<div class="process_con S03 hidden">
						<span><em>◆</em><s>◆</s></span>
						您每邀请一位好友成功参与云购，就可获得一个超级礼包抽奖机会；邀请越多，获奖机率就越大，快快告诉你QQ、MSN、人人、开心、微博上的朋友吧；具体活动详情请关注云购圈中活动专区。
					</div>				    
				</li>
				<li class="p-4">
					<div class="process_con S04 hidden">
						<span><em>◆</em><s>◆</s></span>
						每月成功邀请好友数量最多的前10000名云友，都可获得（<a href="<?php echo G_WEB_PATH; ?>"><?php echo G_WEB_PATH; ?></a>） “宝马3系”“云购码”一个，若邀请好友数量相同，则以邀请时间先后顺序为准。把宝马开回家的可能就是您哦！
					</div>
				</li>
			</ul>
		</div>
		<div class="referrals_banner">
			<ul>
			<li><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/referrals_01.jpg" border="0" alt=""width="900"></li>
			<li><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/referrals_02.jpg" border="0" alt=""width="900"></li>
			</ul>
		</div>
		<?php if(!uidcookie('uid')): ?>
			<div class="login_reg">
				请先<a href="<?php echo WEB_PATH; ?>/member/user/login">登录</a>或者<a href="<?php echo WEB_PATH; ?>/member/user/register">注册</a>，获取您的专属邀请链接。
			</div>
			<div class="login_button">
				<a href="<?php echo WEB_PATH; ?>/member/user/login">立即登录，邀请好友 &gt;&gt;</a>
			</div>
			<div class="reg-txt">
				还没有<?php echo _cfg('web_name_two'); ?>帐号？<a href="<?php echo WEB_PATH; ?>/member/user/register"><b>立即注册</b></a>
			</div>
		<?php  else: ?>	
			<div class="Invitation-t">专用邀请链接</div>
		    <div class="Invitation-C1">
			    <p class="fs14">这是您的专属邀请链接，请通过 MSN 或 QQ 发送给您的好友</p>
			    <div class="">
			    <textarea disabled="disabled" name="copyShareText" id="fe_text" class="textarea">我刚发现一个很好很好玩的网站，1元就能买IPhone 4S哦，快去看看吧！
<?php echo WEB_PATH; ?>/register/<?php echo $uid; ?></textarea>
			    </div>			   
				
		    </div>
		    <div class="Invitation-C2">
			    <p class="fs14">通过分享方式邀请好友，立即分享到您的QQ、MSN、人人、开心、微博上的朋友吧！</p>
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                    <a href="#" class="bds_qzone qqkj">QQ空间</a>
                    <a href="#" class="bds_msn msn">MSN</a>
                    <a href="#" class="bds_fx feixin">飞信</a>
                    <a href="#" class="bds_taobao tjh">淘宝</a>
                    <a href="#" class="bds_renren rrw">人人网</a>
                    <a href="#" class="bds_kaixin001 kxw">开心网</a>
                    <a href="#" class="bds_douban db">豆瓣网</a>
                    <a href="#" class="bds_tsina xlwb">新浪微博</a>
                    <a href="#" class="bds_tqq txwb">腾讯微博</a>
                    <a href="#" class="bds_tsohu shwb">搜狐微博</a>
                    <span class="bds_more">更多</span>
                </div>
				<div class="share">
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=671207" ></script>
					<script type="text/javascript" id="bdshell_js"></script>
					<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
					</script>
					<!-- Baidu Button END -->
				</div>
		    </div>
		    <div class="Invitation-C3">
		        <p class="fs14">您可以直接通过发送邮件邀请好友：</p>
			    <ul>
				    <li><a href="http://mail.126.com" target="_blank" class="M126"></a></li>
				    <li><a href="http://mail.163.com" target="_blank" class="M163"></a></li>
				    <li><a href="http://login.live.com" target="_blank" class="Mmsn"></a></li>
				    <li><a href="http://mail.sohu.com" target="_blank" class="Msohu"></a></li>
				    <li><a href="https://mail.google.com" target="_blank" class="Mgmail"></a></li>
				    <li><a href="http://mail.sina.com.cn" target="_blank" class="Msina"></a></li>
				    <li><a href="http://mail.cn.yahoo.com" target="_blank" class="Myahoo"></a></li>
			    </ul>
		    </div>
		<?php endif; ?>
	</div>
	<div class="W-right fr">
		<h4>温馨提示</h4>
		<div class="rig_con">
			<ul>
				<li><h5>1、在哪里可以看到我的佣金？</h5><p>在【我的个人中心】的【佣金明细】里可看到您的每次返现记录。佣金满100及以上可申请提现，任何时候都可充值到云购帐户参与云购。</p></li>
				<li><h5>2、哪些情况会导致佣金失效？</h5><p>借助网站及其他平台，恶意获取佣金，一经查实，扣除一切佣金，清除福分账户且封号。</p></li>
				<li><h5>3、自己邀请自己也能获得佣金吗？</h5><p>不可以。我们会人工核查，对于查实的作弊行为，扣除一切佣金，取消邀请佣金的资格并清除您的福分账户。</p></li>
				<li class="none"><h5>4、如何知道我有没有邀请成功</h5><p>您可以在【我的个人中心】的【成功邀请的会员】里面查看。</p></li>
			</ul>
		</div>
	</div>
</div>
<?php include templates("index","footer");?>