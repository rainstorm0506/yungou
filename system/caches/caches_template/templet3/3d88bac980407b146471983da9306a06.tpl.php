<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-recharge.css"/>
<div class="R-content">
	<div class="member-t"><h2>账户福分</h2></div>
	<div class="last">
		<ul>
			<li><h3>可用福分：</h3><b class="orange"><?php echo $member['score']; ?></b>	</li>
			<li>			
				<h3>可用金钱：</h3>	<b class="orange">
				<?php 
					$conf = System::load_app_config("user_fufen",'','member');
					$fufen_to_money  = intval($member['score'] / $conf['fufen_yuan']);			
					
				 ?>
				<?php echo $member['score']; ?>福分 / <?php echo $conf['fufen_yuan']; ?>福分<h3>(1元=<?php echo $conf['fufen_yuan']; ?>福分)</h3>	 = 
				<?php echo $fufen_to_money; ?>元<h3>(取整)</h3>	
				</b>
			</li>
		</ul>
	</div>
	<div id="divList0" class="list-tab recordList">
	<ul class="listTitle">
		<li class="leftTitle">时间</li>
		<li class="price">渠道</li>
		<li class="regard">获得/支出</li>
	</ul>
	<?php $ln=1;if(is_array($account)) foreach($account AS $at): ?>
	<ul>
		<li class="leftTitle fontAri"><?php echo date("Y-m-d H:i:s",$at['time']); ?></li>
		<li class="price"><?php echo $at['content']; ?></li>
		<li class="regard">
		<?php if($at['type']==1): ?>
			<font color="#0c0">+ <?php echo $at['money']; ?></font>
		<?php  else: ?>
			<font color="red">- <?php echo $at['money']; ?></font>
		<?php endif; ?>
		</li>
	</ul>
	<?php  endforeach; $ln++; unset($ln); ?>
	</div>
          <style>
			#divPageNav{ padding-top:10px;text-align:right}
			#divPageNav li a{ padding:5px;}
		</style>
		<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('one'); ?> <li>共 <?php echo $total; ?> 条</li>
        </div>
	<div id="divPageNav0" class="page_nav" style="display: none;"></div>
	<div id="divList1" class="list-tab recordList" style="display:none;"></div>
	<div id="divPageNav1" class="page_nav" style="display:none;"></div>
	<div id="divDetailInfo" class="count" style="display:none;"></div>
	<div id="divbuyDetail" class="list-tab recordList buyDetail" style="display:none;"></div>
</div>

</div>
<?php include templates("index","footer");?>