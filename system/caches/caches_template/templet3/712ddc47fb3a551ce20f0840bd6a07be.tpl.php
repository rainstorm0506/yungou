<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-topic.css"/>
<div class="R-content">
	<div class="subMenu">
		<a class="current">发表的话题(<?php echo count($tiezi); ?>)</a>
		<a >发表的回复(<?php echo count($hueifu); ?>)</a>
	</div>
	<div class="list-tab topic" style="display: block;">
		<?php if(!$tiezi): ?>
		<div class="tips-con"><i></i>您还未有发表话题哦</div>
		<?php  else: ?>
		<ul class="listTitle">
			<li class="w400">话题</li>
			<li class="w100">所属圈子</li>
			<li class="w130">时间</li>
			<li class="w85">回复/人气</li>
			<li class="w85 fr">操作</li>
		</ul>
		<?php $ln=1;if(is_array($tiezi)) foreach($tiezi AS $tz): ?>
		<ul class="listCon">
			<li class="w400"><a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tz['id']; ?>" target="_blank" class="gray01"><?php echo $tz['title']; ?></a></li>
			<li class="w100"><a href="<?php echo WEB_PATH; ?>/group/show/<?php echo $tz['qzid']; ?>" target="_blank" class="blue"><?php echo quanzid($tz['qzid']); ?></a></li>
			<li class="w130 gray03"><?php echo date("Y-m-d H:i:s",$tz['time']); ?></li>
			<li class="w85 gray03"><?php echo $tz['hueifu']; ?>/<?php echo $tz['dianji']; ?></li>
			<li class="w85 fr">
				<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $tz['id']; ?>" target="_blank" class="blue">编辑</a>&nbsp;&nbsp;
				<a name="delete" href="javascript:;" onclick="tiezi(<?php echo $tz['id']; ?>)" class="blue">删除</a>
			</li>
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php endif; ?>
	</div>
	<div class="list-tab topic" style="display: none;">
		<?php if(!$hueifu): ?>
		<div class="tips-con"><i></i>您还未有发表话题哦</div>
		<?php  else: ?>
		<ul class="listTitle">
			<li class="w630">回复内容</li>
			<li class="w50 fr">操作</li>
		</ul>
		<?php $ln=1;if(is_array($hueifu)) foreach($hueifu AS $hf): ?>
		<ul class="listCon">
			<li class="w630"><div class="listConT"><?php echo date("Y年m月d日 H:i",$hf['hftime']); ?>对话题“
			<a href="<?php echo WEB_PATH; ?>/group/nei/<?php echo $hf['tzid']; ?>" target="_blank" class="blue"><?php echo tztitle($hf['tzid']); ?></a>
			”进行了回复：</div><?php echo $hf['hueifu']; ?></li>
			<li class="w50 fr"><a name="delete" onclick="hueifu(<?php echo $hf['id']; ?>)" href="javascript:;" class="blue">删除</a></li>
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php endif; ?>
	</div>
</div>
<script>
$(function(){
	$(".subMenu a").click(function(){
		var id=$(".subMenu a").index(this);
		$(".subMenu a").removeClass().eq(id).addClass("current");
		$(".R-content .topic").hide().eq(id).show();
	});
})
function tiezi(id){
	if(confirm("您确认要删除该条信息吗？")){
		window.location.href="<?php echo WEB_PATH; ?>/member/home/tiezidel/"+id;
	}
}
function hueifu(id){
	if(confirm("您确认要删除该条信息吗？")){
		window.location.href="<?php echo WEB_PATH; ?>/member/home/hueifudel/"+id;
	}
}
</script>
</div>
<?php include templates("index","footer");?>