<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>购物车 - <?php echo _cfg("web_name"); ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/CartList.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.cookie.js"></script>
</head>
<body>
<div class="logo">
	<div class="float">
		<span class="logo_pic"><a href="<?php echo G_WEB_PATH; ?>" class="a" title="<?php echo _cfg("web_name"); ?>">
			<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
		</a></span>
		<span class="tel"><a href="<?php echo G_WEB_PATH; ?>" style="color:#999;">返回首页</a></span>
	</div>
</div>
<div class="shop_process">
	<ul class="process">
		<li class="first_step">第一步：提交订单</li>
		<li class="arrow_1"></li>
		<li class="secend_step">第二步：网银支付</li>
		<li class="arrow_2"></li>
		<li class="third_step">第三步：支付成功 等待揭晓</li>
		<li class="arrow_2"></li>
		<li class="fourth_step">第四步：揭晓获得者</li>
		<!-- <li class="arrow_2"></li>
		<li class="fifth_step">第五步：晒单奖励</li> -->
	</ul>
	<div class="i_tips"></div>
	<div class="submitted">
		<ul class="order">
			<li class="top">
				<span class="goods">商品</span>
				<span class="name">名称</span>
				<span class="moneys">价值</span>
				<span class="money">云购价</span>
				<span class="num">云购人次</span>
				<span class="xj">小计</span>
				<span class="do">操作</span>
			</li>
			<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shops): ?>            
			<li class="end" id="shoplist<?php echo $shops['id']; ?>">
				<span class="goods">
					<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shops['id']; ?>">
                   	 <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shops['thumb']; ?>" />
                    </a>                    
				</span>
				<span class="name">
					<a href="<?php echo WEB_PATH; ?>/go/index/item/<?php echo $shops['id']; ?>" ><?php echo $shops['title']; ?></a>
					<p>总需 <span class="color"><?php echo $shops['zongrenshu']; ?></span>人次参与，还剩 
                      	   <span class="gorenci"><?php echo $shops['cart_shenyu']; ?></span> 人次
                    </p>
				</span>
				<span class="moneys">￥<?php echo $shops['money']; ?></span>
				<span class="money"><span class="color">￥<b><?php echo $shops['yunjiage']; ?></b></span></span>
				<span class="num">				
					<dl class="add">					
					<dd><input type="type" val="<?php echo $shops['id']; ?>" onkeyup="value=value.replace(/\D/g,'')" value="<?php echo $shops['cart_gorenci']; ?>" class="amount" /></dd>
						<dd>
							<a href="JavaScript:;" val="<?php echo $shops['id']; ?>" class="jia"></a>
							<a href="JavaScript:;" val="<?php echo $shops['id']; ?>" class="jian"></a>
						</dd>                        
					</dl>
                    <p class="message"></p>
				</span>
				<span  class="xj"><?php echo $shops['cart_xiaoji']; ?></span>
				<span class="do"><a href="javascript:;" onclick="delcart(<?php echo $shops['id']; ?>)"  class="delgood">删除</a></span> 
			</li>		
			<?php  endforeach; $ln++; unset($ln); ?>
			<li class="ts">
				<p class="right">云购金额总计:￥<span id="moenyCount"><?php echo $MoenyCount; ?></span></p>
			</li>
		</ul>
	</div>
	<h5>
		<a href="<?php echo WEB_PATH; ?>" id="but_on"></a>
		<input id="but_ok" type="button" value=""  name="submit"/>
	</h5>
</div>  
<script type="text/javascript"> 
var info=<?php echo $Cartshopinfo; ?>;
var numberadd=$(".jia");
var numbersub=$(".jian");
var xiaoji=$(".xj");
var num=$(".amount");
var message=$(".message");
var moenyCount=$("#moenyCount");

$(function(){
	$("#but_ok").click(function(){
		var countmoney=parseInt(moenyCount.text());		
		if(countmoney > 0){		
			//$.cookie('Cartlist','',{path:'/'});
			$.cookie('Cartlist',$.toJSON(info),{expires:7,path:'/'});
			document.location.href='<?php echo WEB_PATH; ?>/member/cart/pay/'+new Date().getTime();
		}else{
			alert("购物车为空!");
		}
	});
});
function UpdataMoney(shopid,number,zindex){		
		var number = parseInt(number);
		info['MoenyCount']=info['MoenyCount']-info[shopid]['money']*info[shopid]['num']+info[shopid]['money']*number;
		info[shopid]['num']=number;
		var xjmoney=xiaoji.eq(zindex+1);
			xjmoney.text(info[shopid]['money']*number+'.00');
			moenyCount.text(info['MoenyCount']+'.00');
}


function delcart(id){
	info['MoenyCount'] = info['MoenyCount']-info[id]['money']*info[id]['num'];
	$("#shoplist"+id).hide();
	$("#moenyCount").text(info['MoenyCount']+".00");
	delete info[id];
	//$.cookie('Cartlist','',{path:'/'});
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
}

num.keyup(function(){
	var shopid=$(this).attr("val");
	var zindex=num.index(this);	
	if($(this).val() > info[shopid]['shenyu']){
		message.eq(zindex).text("云购次数不能超过"+info[shopid]['shenyu']+"次");		
		$(this).val(info[shopid]['shenyu']);
		UpdataMoney(shopid,$(this).val(),zindex);		
		return;
	}
	if($(this).val()<1){
		message.eq(zindex).text("云购次数不能少于1次");
		$(this).val(1);
		UpdataMoney(shopid,$(this).val(),zindex);
		return;
	}	
	UpdataMoney(shopid,$(this).val(),zindex);	
});
numberadd.click(function(){
	var shopid=$(this).attr('val');		
	var zindex=numberadd.index(this);
	var thisnum=num.eq(zindex);	
		if(info[shopid]['num'] >= info[shopid]['shenyu']){
			message.eq(zindex).text("云购次数不能超过"+info[shopid]['shenyu']+"次");
			return;
		}
		var number=info[shopid]['num']+1;			
			thisnum.val(number);
			UpdataMoney(shopid,number,zindex);
});
numbersub.click(function(){
	var shopid=$(this).attr('val');		
	var zindex=numbersub.index(this);
	var thisnum=num.eq(zindex);	
		if(info[shopid]['num'] <=1){
			message.eq(zindex).text("云购次数不能少于1次");
			return;
		}
		var number=info[shopid]['num']-1;			
			thisnum.val(number);
			UpdataMoney(shopid,number,zindex);
});

</script> 
<!--footer 开始-->
<?php include templates("index","footer");?>