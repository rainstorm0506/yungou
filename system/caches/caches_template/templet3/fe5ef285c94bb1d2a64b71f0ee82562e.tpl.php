<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Jcrop.css" />
<link rel="stylesheet" href="<?php echo G_TEMPLATES_STYLE; ?>/js/uploadify.css" type="text/css"> 
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.uploadify-3.1.min.js"></script> 
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<div class="subMenu">
	<?php if($title=="编辑个人资料"): ?><a class="current2 current" href="<?php echo WEB_PATH; ?>/member/home/modify"> <?php  else: ?><a class="current2" href="<?php echo WEB_PATH; ?>/member/home/modify"><?php endif; ?>个人资料</a>
	<?php if($title=="修改头像"): ?><a class="current" href="<?php echo WEB_PATH; ?>/member/home/userphoto"> <?php  else: ?><a href="<?php echo WEB_PATH; ?>/member/home/userphoto"><?php endif; ?>修改头像</a>
	<?php if($title=="收货地址"): ?><a class="current" href="<?php echo WEB_PATH; ?>/member/home/address"> <?php  else: ?><a href="<?php echo WEB_PATH; ?>/member/home/address"><?php endif; ?>收货地址</a>
	<?php if($title=="密码修改"): ?><a class="current" href="<?php echo WEB_PATH; ?>/member/home/password"> <?php  else: ?><a href="<?php echo WEB_PATH; ?>/member/home/password"><?php endif; ?>密码修改</a>
</div>
