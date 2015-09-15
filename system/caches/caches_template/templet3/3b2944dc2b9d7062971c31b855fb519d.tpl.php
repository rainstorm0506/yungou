<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php if(isset($title)): ?><?php echo $title; ?><?php  else: ?><?php echo _cfg("web_name"); ?><?php endif; ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/register.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>	
<script>
$(function(){
	window.parent.set_iframe_height("iframea_divPost","divPost",document.body.offsetHeight+120);
});

</script>
</head>
<style type="text/css">
.Single_Content {
overflow: hidden;
border-top: none;
background: #fff;
margin: auto;
}
.Single_list {
width: 918px;
overflow: hidden;
margin: 30px auto 15px;
padding: 0 0 19px 0;
border-bottom: 1px solid #E4E4E4;
}
.Single_list .Topiclist-img {
width: 80px;
overflow: hidden;
text-align: center;
float: left;
}
.Single_list .Topiclist-img .head-img {
width: 80px;
margin: 0 auto;
display: block;
}
.Single_list .Topiclist-img .head-img img {
width: 80px;
height: 80px;
}
.Single_list .Topiclist-img .blue {
white-space: nowrap;
width: 80px;
overflow: hidden;
display: block;
}
.Single_list .SingleR {
width: 782px;
margin-left: 48px;
display: inline;
}
.fl, .fl-img {
float: left;
}
.Single_list .SingleR_TC {
position: relative;
zoom: 1;
}
.Single_list .SingleR_TC i {
left: -28px;
top: 0;
background-position: -143px 0;
}
.Single_list .SingleR_TC s {
right: 0;
bottom: 12px;
background-position: -168px 0;
}
.Single_list .SingleR_TC h3 {
color: #999;
font-family: 微软雅黑,宋体;
font-size: 18px;
color: #333;
line-height: 24px;
}
.Single_list .SingleR_TC h3 span {
font-size: 14px;
}
a {
color: #333;
text-decoration: none;
outline: none;
}
.Single_list .SingleR_TC h3 em {
font-size: 12px;
}
.gray02 {
color: #999;
}
.Single_list .SingleR_TC p {
padding: 7px 25px 12px 0;
}
.gray01 {
color: #666;
}
.Single_list .SingleR_TC p {
padding: 7px 25px 12px 0;
}
.Single_list ul.SingleR_pic {
display: inline-block;
}
.Single_list .SingleR_pic li {
float: left;
margin-right: 10px;
display: inline;
}
.Single_list .SingleR_Comment .Comment_smile {
height: 25px;
padding-top: 6px;
}
.SingleR_Comment .Comment_smile span {
margin-right: 10px;
}
.SingleR_Comment .Comment_smile span i {
background: url(<?php echo G_TEMPLATES_STYLE; ?>/images/Detailsbg.png) no-repeat;
width: 18px;
height: 18px;
display: inline-block;
vertical-align: -4px;
background-position: -198px 0;
margin-right: 3px;
}
.SingleR_Comment .Comment_smile span s {
width: 18px;
height: 18px;
display: inline-block;
vertical-align: -8px;
background-position: -230px 0;
margin-right: 0;
}
</style>
<body style="width:970px; min-height:150px">
	<?php if($error==0): ?>
		<div id="divPost" class="Single_Content">
		<?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $v): ?>			
			<div class="Single_list">
				<div class="SingleL fl Topiclist-img">
					<a rel="nofollow" class="head-img" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member_id[$v['sd_id']]); ?>" type="showCard" uweb="1000371861" target="_blank">
						<img border="0" alt="" src="<?php if($member_img[$v['sd_id']]!=''): ?> <?php echo G_UPLOAD_PATH; ?>/<?php echo $member_img[$v['sd_id']]; ?><?php  else: ?><?php echo G_UPLOAD_PATH; ?>/photo/member.jpg_30.jpg<?php endif; ?>">
					</a>
					<a class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member_id[$v['sd_id']]); ?>" type="showCard" uweb="1000371861" target="_blank"><?php echo $member_username[$v['sd_id']]; ?></a>
					<!--span class="class-icon02"><s></s>云购少将</span-->
				</div>
				<div class="SingleR fl">
					<div class="SingleR_TC"><i></i> <s></s>
						<h3><span class="gray02">第<?php echo $v['sd_qishu']; ?>期晒单</span><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $v['sd_id']; ?>" target="_blank"><?php echo $v['sd_title']; ?></a>   <em class="gray02"><?php echo date("Y-m-d",$v['sd_time']); ?></em></h3>
						<p class="gray01"><?php echo _strcut($v['sd_content'],220); ?></p>
					</div>
					<ul class="SingleR_pic">
						<li><img src2="http://postimg.1yyg.com/UserPost/Small/20131030121619093.jpg" border=0 /></li><li><img src2="http://postimg.1yyg.com/UserPost/Small/20131030121627718.jpg" border=0 /></li><li><img src2="http://postimg.1yyg.com/UserPost/Small/20131030121639453.jpg" border=0 /></li><li><img src2="http://postimg.1yyg.com/UserPost/Small/20131030121644250.jpg" border=0 /></li>
					</ul>
					<div class="SingleR_Comment" postID="2676" count="7">
						<div class="Comment_smile gray02"><span><i></i><?php echo $v['sd_zhan']; ?>人羡慕嫉妒恨</span><span><s></s><?php echo $v['sd_ping']; ?>条评论</span></div>
					</div>
				</div>
			</div>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if($total>$num): ?>
			<div class="pagesx"><?php echo $page->show('two'); ?></div>
		<?php endif; ?>
		</div>
	<?php  else: ?>
		<div style="text-align:center;width:100%;height:80px;line-height:80px;">
			<b>该商品还未有晒单！</b>
		</div>
	<?php endif; ?>
</body>
</html>