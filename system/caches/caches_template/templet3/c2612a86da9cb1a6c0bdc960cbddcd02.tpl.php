<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript">
$(function(){		
	var demo=$(".tel_verification").Validform({
		tiptype:3,		
	});
})
</script>
<div class="R-content">
	<div class="member-t"><h2>QQ绑定</h2><a href="javascript:history.go(-1);" class="blue">&lt;&lt; 返回</a></div>
	<div class="tel_verification">
		<div class="prompt orange">请完成QQ绑定，QQ绑定可以方便您快速登录！<em></em></div>
		<form method="post" action="<?php echo WEB_PATH; ?>/member/home/mobilesuccess">
		<div class="text_tel" id="divSend" style="display: block;">
			<span>请点击右图标绑定QQ：</span>
			<a href="<?php echo WEB_PATH; ?>/api/qqlogin/"><img src="<?php echo G_WEB_PATH; ?>/statics/templates/yungou/images/qqlogin.png" /></a>

			<div class="Validform_checktip"></div>
		</div>
		</form>		
	</div>
</div>
		
</div>
<?php include templates("index","footer");?>