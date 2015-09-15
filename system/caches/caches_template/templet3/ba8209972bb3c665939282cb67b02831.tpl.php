<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="layout980 clearfix">
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-home.css"/>
<?php include templates("member","left");?>
<div class="center">
	<div class="per-info">
		<ul>
			<li class="info-mane gray02">
				<b class="gray01">
				<?php if($member['username']!=null): ?>
				<?php echo $member['username']; ?>
				<?php elseif ($member['mobile']!=null): ?>
				<?php echo $member['mobile']; ?>
				<?php  else: ?>
				<?php echo $member['email']; ?>
				<?php endif; ?>
				</b>
				<?php if($member['username']!=null): ?>
				(
				<?php if($member['mobile']!=null): ?>
				<?php echo $member['mobile']; ?>
				<?php  else: ?>
				<?php echo $member['email']; ?>
				<?php endif; ?>
				)
				<?php endif; ?>
				<br>
				<span><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?>" target="_blank" class="blue"><s></s><?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?></a></span>
			</li>
			<li class="account-money">
				<em class = "gray02">经验值：<?php echo $member['jingyan']; ?></em> 
				<span class="class-icon0<?php echo $dengji_1['groupid']; ?> gray01"><s></s><?php echo $dengji_1['name']; ?></span>
				<?php if($dengji_2): ?>
					<span class = "gray02">（还差<?php echo $dengji_x; ?>经验值升级到<?php echo $dengji_2['name']; ?>）</span>
				<?php  else: ?>
					<span class = "gray02">（还差<?php echo $dengji_x; ?>经验值升级到最高等级）</span>
				<?php endif; ?>
			</li>
			<li class="account-money">
				<em class="gray02">帐户余额：</em>
				<span class="money-red"><s></s><?php echo uidcookie('money'); ?></span>&nbsp;&nbsp;
				<a href="<?php echo WEB_PATH; ?>/member/home/userrecharge" title="充值" class="blue">充值</a>
			</li>
		</ul>		
	</div>
</div>
<!--center_center_end-->
<div class="right">				
	<div class="groups-shadow clearfix">
		<div class="R-grtit">
			<h3>圈子热门话题</h3>
		</div>
		<ul class="R-list">
			<?php $ln=1;if(is_array($quanzi)) foreach($quanzi AS $tm): ?>
			<li>
				<p class="groups-t"><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tm['id']; ?>" target="_blank" class="gray"><?php echo $tm['title']; ?></a></p>
				<p class="groups-c gray02"><?php echo qztitle($tm['qzid']); ?><span class="gray03"> | </span><?php echo tiezi($tm['id']); ?>条回复</p>
			</li>
			<?php  endforeach; $ln++; unset($ln); ?>
		</ul>
	</div> 
	<p class="r-line"></p>
	<!-- <div class="gg-content">
		<div class="R-grtit"><h3>公告栏</h3></div>
		<ul class="gg-list">	
			<li><span class="point"></span><span class="info"><a href="http://group.1yyg.com/Topic-621.html" target="_blank" class="gray" title="关于“幸运云购码”计算结果错误的公告">关于“幸运云购码”计算结果错误的公告</a></span></li>
		</ul>
	</div> -->
</div>
<!--center_rjght_end-->

</div>
<?php include templates("index","footer");?>