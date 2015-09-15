<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-topic.css"/>
<div class="R-content">
	<div class="member-t">
		<h2>加入的圈子</h2> <span id="spanCount">(<?php echo count($group); ?>)</span>
	</div>
	<div class="groups-list clearfix">
		<?php if($group==null): ?>
		<div class="tips-con"><i></i>您还未有发表话题哦</div>
		<?php  else: ?>
			<ul id="ulGroupList">
			<?php $ln=1;if(is_array($group)) foreach($group AS $v): ?>
			<li class="">
				<div class="groups-img"><a target="_blank" href="<?php echo WEB_PATH; ?>/group/show/<?php echo $v['id']; ?>" class="fl-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $v['img']; ?>" border="0"></a></div>
				<div class="groups-info">
					<p class="groups-name"><a target="_blank" href="<?php echo WEB_PATH; ?>/group/show/<?php echo $v['id']; ?>" rel="nofollow" class="blue"><b><?php echo $v['title']; ?></b></a></p>
					<p class="groups-class gray02">成员：<?php echo $v['chengyuan']; ?>&nbsp;&nbsp;&nbsp;&nbsp;话题：<?php echo $v['tiezi']; ?></p>
					<p class="groups-intro gray02"><?php echo $v['jianjie']; ?></p>
				</div>
			</li>
			<?php  endforeach; $ln++; unset($ln); ?>
			</ul>
		<?php endif; ?>
	</div>
	<div id="divPageNav" class="page_nav"></div>
</div>

</div>
<?php include templates("index","footer");?>