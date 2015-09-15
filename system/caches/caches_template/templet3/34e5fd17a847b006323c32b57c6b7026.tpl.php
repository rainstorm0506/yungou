<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php if(isset($title)): ?><?php echo $title; ?><?php  else: ?><?php echo _cfg("web_name"); ?><?php endif; ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/GoodsDetail.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>	
<style>
.AllRecW .AllRecR .AllRecR_T span.user_see_code{
	color: #fff;
}
.AllRecR{ border:1px solid #f8f8f8; background:#f8f8f8; padding:5px 0px; position:relative;}
.user_codes_box{ display:none }
.user_codes { color:#aaa; padding-left:35px;word-break:break-all;overflow:hidden;}
.user_codes i{ width:75px; display:inline-block; text-align:center; height:20px;}
.user_codes_js { width:100%; line-height:40px; background:#f8f8f8;text-align:center; color:#999; cursor:pointer;}
.user_see_code{border-radius:5px; position:absolute; right:10px; width:75px; text-align:center; height:25px; line-height:25px; background:#f60; cursor:pointer; display:none;}
</style>
</head>
<body style="width:970px; min-height:35px;  padding-top:20px;background-color:#fff">
		<?php if(!$go_record_list): ?>
        	<h1 style=" text-align:center;width:100%;font-size:22px; font-weight:bold;color:#555;">还没有购买记录,赶快购买吧!</h1>
        <?php endif; ?>         
		<!--获取当前会商品的购买记录50条-->		
   		<?php  
        	foreach($go_record_list as $k=>$user){
        	if($k==0){
            	echo '<div class="AllRecW AllRecTime"><p>'.date("Y-m-d",$user['time']).'</p> <b></b></div>';
            }                         
        	if($k >0 && date("Ymd",$go_record_list[$k-1]['time']) > date("Ymd",$user['time'])){
            	echo '<div class="AllRecW AllRecTime"><p>'.date("Y-m-d",$user['time']).'</p> <b></b></div>';
            }
           
         ?>        
		<div class="AllRecW AllReclist"><div class="AllRecL fl"><?php echo microt($user['time']); ?><i></i></div>
			<div class="AllRecR fl">
			<p class="AllRecR_T">            	
				<span name="spCodeInfo" class="AllRecR_Over">
				<a class="Headpic" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($user['uid']); ?>" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $user['uphoto']; ?>" border="0" width="20" height="20"></a>
				<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($user['uid']); ?>" target="_blank" class="blue"><?php echo _strcut($user['username'],6); ?></a>
				<?php if($user['ip']): ?>
				(<?php echo get_ip($user['id'],'ipcity'); ?> IP:<?php echo get_ip($user['id'],'ipmac'); ?>)
				<?php endif; ?>
				云购了<em class="Fb orange"><?php echo $user['gonumber']; ?></em>人次
				</span>     
                <span class="user_see_code" see="off">查看云购码</span>           
			</p>
                <div class="user_codes_box">
                	<div class="user_codes" style="max-height:260px;">
                	<?php  
                    	$codes  = explode(",",$user['goucode']);
                        foreach($codes as $c){
                        	echo "<i>".$c."</i>";
                     	}                       
                     ?>  
                    </div> 
                   <?php if($user['gonumber'] > '98'): ?><div class="user_codes_js" click="off" num="<?php echo $user['gonumber']; ?>">展开查看全部↓</div><?php endif; ?>                                   
                </div>
			</div>
		</div>
		<?php  }  ?>
		<!--/获取当前会商品的购买记录-->
        <?php if($total>$num): ?>
			<div class="pagesx" style=" padding-right:30px;"><?php echo $page->show('two'); ?></div>
		<?php endif; ?>
        
<script>
$(function(){
	<!--补丁3.1.6_b.0.1-->
	window.parent.set_iframe_height("iframea_bitem","bitem",document.body.offsetHeight+120);
	window.onclick=function(){		
		window.parent.set_iframe_height("iframea_bitem","bitem",document.body.offsetHeight+120);
	};
	<!--补丁3.1.6_b.0.1-->
	  
	$(".AllRecR").mousemove(function(){
		$(this).css("border","1px solid #eee");		
		$(this).find(".user_see_code").show();
	});
	
	
	$(".AllRecR").mouseleave(function(){
		$(this).css("border","1px solid #f8f8f8");	
		if($(this).find(".user_see_code").attr("see") == 'off'){
		$(this).find(".user_see_code").hide();	
		}
	});
	
	$(".user_see_code").click(function(){
		if($(this).attr("see")=='off'){
			$(this).attr("see","on");
			$(this).text("关闭云购码");
			$(this).parents().next().show();
		}else{
			$(this).text("显示云购码")
			$(this).attr("see","off");
			$(this).parents().next().hide();
		}
	});
	
	
	$(".user_codes_js").click(function(){	
		var codes = $(this).prev();
		
		if($(this).attr("click") == 'off'){
			var num = $(this).attr("num");		
			var line = Math.ceil(num / 7) * 20;	
			codes.css("max-height",line+"px");
			$(this).attr("click","on");
			$(this).text("收起全部↑");
		}else{
			codes.css("max-height","260px");
			$(this).attr("click","off");
			$(this).text("展开查看全部↓");	
		}
		
	});

});
</script>
</body>
</html>