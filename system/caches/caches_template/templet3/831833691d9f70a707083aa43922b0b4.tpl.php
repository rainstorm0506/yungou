<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="login_layout">    
	<div class="login_title">
		<h2>新用户注册</h2>
		<ul class="login_process">
			<li><b>1</b>填写注册信息</li>
			<li class="login_arrow"></li>
			<li><b>2</b>验证邮箱/验证手机</li>
			<li class="login_arrow"></li>
			<li class="login_processCur"><b>3</b><?php echo $tiebu; ?></li>
		</ul>
	</div>
	<div class="login_Content">		
		<div class="login_CMobile_Complete" style="padding:70px 0 70px 350px;">
		<?php if(empty($guoqi)): ?>
		<p>恭喜你<span class="orange"><?php echo $success; ?></span>,<a id="hylinkLoginPage" class="blue Fb" href="<?php echo WEB_PATH; ?>/member/home">进入个人中心</a></p>
		<?php  else: ?>
		<p style="height:36px;font-weight:bold;"><span class="orange"><?php echo $guoqi; ?></span></p>
		<p><a style=" font-size:12px;" id="hylinkLoginPage" class="blue Fb" href="<?php echo WEB_PATH; ?>/member/user/emailcheck/<?php echo $name; ?>">重新发送验证邮件</a></p>
		<?php endif; ?>
		</div>		
	</div>
</div>
<?php include templates("index","footer");?>