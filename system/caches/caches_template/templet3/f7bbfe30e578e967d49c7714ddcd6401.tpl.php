<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><link href="<?php echo G_TEMPLATES_STYLE; ?>/css/groups.css" rel="stylesheet" type="text/css" />
<div class="groups-right">
	<div class="groups-head">
	<?php if(uidcookie('uid')): ?>	
	<div class="grhead-img"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia(uidcookie('uid')); ?>" class="fl-img">		
		<?php if(userid(uidcookie('uid'),'img')==null): ?>
		<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
		<?php  else: ?>
		<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid(uidcookie('uid'),'img'); ?>" width="50" height="50" border="0"/>
		<?php endif; ?>	
	</div>
	<div class="grhead-info">
		<p class="grhead-name"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia(uidcookie('uid')); ?>" class="gray" ><?php echo userid(uidcookie('uid'),'username'); ?></a></p>
		<p class="grhead-topic gray02">话题<?php echo huati('tiezi'); ?><span class="gray03"> | </span>回复<?php echo huati('hueifu'); ?></p>
		<div id="divJoinGroup">
	        <p id="pJoinGroup" class="grhead-join gray02"> 加入圈子<span id="spJoinGroupNum" class="orange"><?php echo qznum(); ?></span>个<b></b></p>
	    </div>
	</div>	
	<?php  else: ?>
	<div class="groups-login">
		<p class="grhead-loginc1 gray02">登录查看您的圈子吧！</p>
		<p class="grhead-login-reg gray02">没账号？ <span><a href="<?php echo WEB_PATH; ?>/member/user/register" target="_blank" class="gray01">简单注册 快捷方便！</a></span></p>
		<a id="btnLogin" href="<?php echo WEB_PATH; ?>/member/user/login" class="button07">立即登录</a>
	</div>
	<?php endif; ?>
	</div>
	<div class="blank10"></div>
	<div id="divHotTopic" class="groups-shadow clearfix">
		<div class="R-grtit"><h3>热门话题</h3></div>
		<?php $tiezi=$this->DB()->GetList("select * from `@#_quanzi_tiezi` group by hueiyuan order by id DESC limit 5",array("type"=>1,"key"=>'',"cache"=>0)); ?>
		<?php $ln=1;if(is_array($tiezi)) foreach($tiezi AS $tz): ?>
		<div class="R-list Topic-list">
			<div class="groups-Rimg">
			<a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($tz['hueiyuan']); ?>" class="fl-img">				
			<?php if(userid($tz['hueiyuan'],'img')==null): ?>
			<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="30" height="30" />
			<?php  else: ?>
			<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($tz['hueiyuan'],'img'); ?>" width="30" height="30" border="0"/>
			<?php endif; ?>	
			</a></div>
			<div class="groups-Rinfo"><!-- <?php echo _strcut($tz['title'],24,""); ?> -->
				<p class="groups-ht"><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tz['id']; ?>" class="gray"> <?php echo $tz['title']; ?></a></p>
				<p class="groups-c gray02"><?php echo _strcut(quanzid($tz['qzid']),10); ?><span class="gray03"> | </span><?php echo huifu($tz['id']); ?>条回复</p>
			</div>
		</div>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
	</div>
	<div class="blank10"></div>
	<div class="groups-shadow clearfix">
		<div class="R-grtit"><h3>活跃成员</h3></div>
		<div class="Member-list clearfix">
			<ul id="ulMember">
			<?php $hueifu=$this->DB()->GetList("select * from `@#_quanzi_hueifu` group by hueiyuan order by id DESC limit 12",array("type"=>1,"key"=>'',"cache"=>0)); ?>
			<?php $ln=1;if(is_array($hueifu)) foreach($hueifu AS $hf): ?>		
				<li><a type="showCard" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($hf['hueiyuan']); ?>" class="blue">
				<?php if(userid($hf['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="50" height="50" />
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($hf['hueiyuan'],'img'); ?>" width="50" height="50" border="0"/>
				<?php endif; ?>	
				<i><?php echo userid($hf['hueiyuan'],'username'); ?></i></a>
				</li>		
			<?php  endforeach; $ln++; unset($ln); ?>
			<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
			</ul>
		</div>
	</div>
</div>
