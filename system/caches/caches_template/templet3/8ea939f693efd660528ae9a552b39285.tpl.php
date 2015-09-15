<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-records.css"/>
<div class="R-content">
	<div class="member-t"><h2>云购记录</h2></div>
	<?php 
        	$jiexiao = get_shop_if_jiexiao($record['shopid']);	
	
     ?>
	<?php if($jiexiao['q_uid']): ?>
	<div class="yg_record_goods">
		<a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $record['shopid']; ?>" target="_blank" class="fl-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $record['thumb']; ?>"></a>
		<div class="yg_record_r">
			<li><span class="orange">(第<?php echo $record['shopqishu']; ?>期)</span> <a target="_blank" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $record['shopid']; ?>_<?php echo $record['shopqishu']; ?>" class="blue"><?php echo $jiexiao['title']; ?></a></li>
			<li class="gray02">本期商品云购已结束 【获得者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank" class="blue">
			<?php echo get_user_name($jiexiao['q_user']); ?></a> 
			幸运编号：<?php echo $jiexiao['q_user_code']; ?> 】</li>
			<li><a target="_blank" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $record['shopid']; ?>" class="bluebut">查看详情</a></li></div>
	</div>
	<?php  else: ?>
	<div class="yg_record_goods">
		<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank" class="fl-img"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $record['thumb']; ?>"></a>
		<div class="yg_record_r">
			<li><span class="orange">(第<?php echo $record['shopqishu']; ?>期)</span> <a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" class="blue"><?php echo $jiexiao['title']; ?></a></li>
			<li><a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" class="bluebut">查看详情</a></li></div>
	</div>
	<?php endif; ?>
	<div class="goods-tit gray02">
		<p class="fl">本期商品您总共云购<span><?php echo $record['gonumber']; ?></span>人次 拥有<span><?php echo $record['gonumber']; ?></span>个云购码</p><a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" class="blue fr">&lt;&lt; 返回列表</a>
	</div> 

	<div class="list-tab goodsList" id="userbuylist">
		<ul class="listTitle">
			<li class="leftTitle">云购时间</li>
			<li>云购人次</li>
			<li class="Code">云购码</li></ul>
		<ul><li class="leftTitle"><?php echo microt($record['time']); ?></li>
			<li><?php echo $record['gonumber']; ?>人次</li>
			<li class="Code"><?php echo yunma($record['goucode']); ?></li></ul>
	</div>

	<div class="goods-tit gray02">
		<a href="<?php echo WEB_PATH; ?>/member/home/userbuylist" class="blue fr">&lt;&lt; 返回列表</a></div>
</div>

</div>
<?php include templates("index","footer");?>