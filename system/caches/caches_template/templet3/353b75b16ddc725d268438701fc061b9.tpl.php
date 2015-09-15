<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-records.css"/>
<div class="R-content">
	<div class="member-t"><h2>云购记录</h2></div>
	<div id="GoodsList" class="goods_show">
		<ul class="gtitle">
			<li>商品图片</li>
			<li class="gname">商品名称</li>
			<li class="yg_status">云购状态</li>
			<li class="joinInfo">参与人次</li>
			<li class="do">操作</li>
		</ul>	
		<?php $ln=1;if(is_array($record)) foreach($record AS $rt): ?>
        <?php 
        	$jiexiao = get_shop_if_jiexiao($rt['shopid']);
         ?>
		<?php if($jiexiao['q_uid']): ?>
		<ul class="goods_list">	
			<li><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $jiexiao['thumb']; ?>"></a></li>
			<li class="gname"style="margin:10px 0 0 0;">
				<a target="_blank" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $rt['shopid']; ?>_<?php echo $rt['shopqishu']; ?>" class="blue">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a>
				<p class="gray02">获得者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($jiexiao['q_uid']); ?>" target="_blank" class="blue">
                <?php echo get_user_name($jiexiao['q_user']); ?>
                </a></p>
				<p class="gray02">揭晓时间：<?php echo microt($rt['time']); ?></p>
			</li>
			<li class="yg_status" style="margin:23px 0 0 0;"><span class="orange">已揭晓</span></li>
			<li class="joinInfo" style="margin:23px 0 0 0;"><p><em><?php echo $rt['gonumber']; ?></em>人次</p></li>
			<li class="do" style="margin:23px 0 0 0;"><a href="<?php echo WEB_PATH; ?>/member/home/userbuydetail/<?php echo $rt['id']; ?>" class="blue" title="详情">详情</a></li>
		</ul>
		<?php  else: ?>
		<ul class="goods_list">	
			<li><a title="" target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo yunjl($rt['shopid']); ?>"></a></li>
			<li class="gname" style="margin:15px 0 0 0;">
				<a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $rt['shopid']; ?>" class="blue">第(<?php echo $rt['shopqishu']; ?>)期 <?php echo $rt['shopname']; ?></a>				
				<p class="gray02">购买时间：<?php echo microt($rt['time']); ?></p>
			</li>
			<li class="yg_status" style="margin:23px 0 0 0;"><span class="orange">正在进行...</span></li>
			<li class="joinInfo" style="margin:23px 0 0 0;"><p><em><?php echo $rt['gonumber']; ?></em>人次</p></li>
			<li class="do" style="margin:23px 0 0 0;"><a href="<?php echo WEB_PATH; ?>/member/home/userbuydetail/<?php echo $rt['id']; ?>" class="blue" title="查看云购码">查看云购码</a></li>
		</ul>
		<?php endif; ?>
		<?php  endforeach; $ln++; unset($ln); ?>	
        
        <style>
			#divPageNav{ padding-top:10px;text-align:right}
			#divPageNav li a{ padding:5px;}
		</style>
		<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('one'); ?> <li>共 <?php echo $total; ?> 条</li>
        </div>
	</div>
</div>

</div>
<?php include templates("index","footer");?>