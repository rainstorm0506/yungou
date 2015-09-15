<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<script type="text/javascript">
$(function(){		
	var demo=$(".registerform").Validform({
		tiptype:2,
		datatype:{
			"tel":/([a-z][A-Z][0-9])+/,
			"nic":/^[A-Za-z0-9_\u4e00-\u9fa5]{2,20}$/,
		},
	});	
	demo.tipmsg.w["tel"]="请正确输入电话号码(区号、号码必填，用“-”隔开)";
	demo.tipmsg.w["nic"]="昵称为2-20个汉字、字母、数字、“_”字符组成";
	demo.addRule([
	{
		ele:"#nicxx",
		datatype:"nic",
	},
	{
		ele:"#txt_ship_tel",
		datatype:"tel",
	}]);
});
</script>
<div class="R-content">
	<?php include templates("member","shezhi");?>
	<div class="prompt orange">完善以下资料，<?php echo _cfg('web_name_two'); ?>不会以任何形式公开您的个人隐私，请放心填写！<s></s></div>
	<div class="info">
	<form class="registerform" method="post" action="<?php echo WEB_PATH; ?>/member/home/usermodify">
		<table border="0" cellpadding="0" cellspacing="8">
			<tr>
				<?php if($member['mobile']!=null && $member['mobilecode']=='1'): ?>		
				<td align="right"><em><font>*</font><label>手机：</label></em></td>
				<td>
					<b><?php echo $member['mobile']; ?></b> 
					 已验证
				</td>
				<?php  else: ?>
				<td align="right"><em><font>*</font><label>手机：</label></em></td>
				<td>
					<a style="margin-left:0;" href="<?php echo WEB_PATH; ?>/member/home/mobilechecking" title="绑定手机">绑定手机</a>
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<?php if($member['email']!=null && $member['emailcode']=='1'): ?>		
				<td align="right"><em><font>*</font><label>邮箱：</label></em></td>
				<td>
					<b><?php echo $member['email']; ?></b> 
					 已验证
				</td>
				<?php  else: ?>
				<td align="right"><em><font>*</font><label>邮箱：</label></em></td>
				<td>
					<a style="margin-left:0;" href="<?php echo WEB_PATH; ?>/member/home/mailchecking" title="绑定邮箱">绑定邮箱</a>
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<?php if($member_qq['b_id']!=null || $member_qq['b_type']=='qq'): ?>		
				<td align="right"><em><font>*</font><label>QQ：</label></em></td>
				<td>
					 已绑定
				</td>
				<?php  else: ?>
				<td align="right"><em><font>*</font><label>QQ：</label></em></td>
				<td>
					<a style="margin-left:0;" href="<?php echo WEB_PATH; ?>/member/home/qqclock" title="请绑定qq">请绑定qq</a>
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td align="right"><em><font>*</font><label>昵称：</label></em></td>
				<td>
					<input id="nicxx" datatype="nic" nullmsg="昵称不能为空" name="username" value="<?php echo $member['username']; ?>" type="text"  class="txt gray" maxlength="20" />					
				</td>					
				<td><div class="Validform_checktip">昵称为2-20个汉字、字母、数字、“_”字符组成</div></td>
			</tr>
			<tr>
				<td align="right"><em><font>&nbsp;</font><label>签名：</label></em></td>
				<?php if($member['qianming']==null): ?>
				<td><textarea name="qianming" class="info_txtarea gray03" >让别人看到不一样的你！</textarea></td>
				<?php  else: ?>
				<td><textarea name="qianming" class="info_txtarea gray03" ><?php echo $member['qianming']; ?></textarea></td>
				<?php endif; ?>
			</tr>
			<tr>
				<td><em>&nbsp;</em></td>
				<td><input name="submit" type="submit" class="bluebut" value="保存"></td>
			</tr>
		</table>
	</form>	
	</div>
</div>
</div>
<?php include templates("index","footer");?>