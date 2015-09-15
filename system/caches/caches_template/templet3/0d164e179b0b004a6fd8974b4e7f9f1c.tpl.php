<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>支付_<?php echo _cfg("web_name"); ?></title>
<meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo $keywords; ?><?php  else: ?><?php echo _cfg("web_key"); ?><?php endif; ?>" />
<meta name="description" content="<?php if(isset($description)): ?><?php echo $description; ?><?php  else: ?><?php echo _cfg("web_des"); ?><?php endif; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/MyCart.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.cookie.js"></script>
<style>
.yeepay_bank img{ border:1px solid #eee; padding:2px; width:130px; height:35px; }
</style>
</head>
<body>
<div class="logo">
	<div class="float">
		<span class="logo_pic"><a href="<?php echo WEB_PATH; ?>" class="a" title="<?php echo _cfg("web_name"); ?>">
			<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
		</a></span>
		<span class="tel"><a href="<?php echo WEB_PATH; ?>" style="color: #999;">返回首页</a></span>
	</div>
</div>
<form id="form_paysubmit" action="<?php echo WEB_PATH; ?>/<?php echo ROUTE_M; ?>/<?php echo ROUTE_C; ?>/paysubmit" method="post">
<div class="shop_payment">
	<ul class="payment">
		<li class="first_step">第一步：提交订单</li>
		<li class="arrow_1"></li>
		<li class="secend_step orange_Tech">第二步：网银支付</li>
		<li class="arrow_3"></li>
		<li class="third_step">第三步：支付成功 等待揭晓</li>
		<li class="arrow_2"></li>
		<li class="fourth_step">第四步：揭晓获得者</li>
		<!-- <li class="arrow_2"></li>
		<li class="fifth_step">第五步：晒单奖励</li> -->
	</ul>
	<div class="payment_Con">
		<ul class="order_list">
			<li class="top">
				<span class="name">商品名称</span>
				<span class="moneys">价值</span>
				<span class="money">云购价</span>
				<span class="num">云购人次</span>
				<span class="all">小计</span>
			</li>               
			<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shops): ?>
			<li class="end">
				<span class="name">
               		<a class="blue" href="<?php echo WEB_PATH; ?>/goods/<?php echo $shops['id']; ?>"><?php echo $shops['title']; ?></a>
                </span>
				<span class="moneys"><?php echo $shops['money']; ?></span>
				<span class="money"><span class="color">￥<b><?php echo $shops['yunjiage']; ?></b></span></span>
				<span class="num orange Fb"><?php echo $shops['cart_gorenci']; ?></span>
				<span class="all"><?php echo $shops['cart_xiaoji']; ?></span>
			</li>
			<?php  endforeach; $ln++; unset($ln); ?>           
			<li class="payment_Total">
				<div class="payment_List_Lc"><a href="<?php echo WEB_PATH; ?>/member/cart/cartlist" class="form_ReturnBut">返回购物车修改订单</a></div>
				<p class="payment_List_Rc">商品合计：<span class="orange F20"><?php echo $MoenyCount; ?></span> 元</p>
			</li>
			<!-- 福分 -->
            <?php if($fufen_dikou): ?>
			 <li id="liPayByPoints" class="point_out">
					<div class="payment_List_Lc">
					<input type="checkbox" class="input_choice" id="shop_score" name="shop_score" value="1"/>使用福分抵扣现金：您的福分(<?php echo $member['score']; ?>)本次消费最多可抵扣现金
                    <span class="orange Fb"><?php echo $fufen_dikou; ?>.00</span>元)，我要使用 
                    <input type="text" maxlength="8" class="pay_input_text_gray" id="shop_score_num" value="0" money="<?php echo $fufen['fufen_yuan']; ?>" name="shop_score_num"/> 福分, 1元 = <?php echo $fufen['fufen_yuan']; ?> 福分</div>
                    <p id="pPointsTip" class="pay_Value" style="display:none;"></p>
                    <p class="payment_List_Rc"></p>
             </li>
             <?php  else: ?>
              <li id="liPayByPoints" class="point_out point_gray">
					<div class="payment_List_Lc">
					<input type="checkbox" class="input_choice" disabled="disabled"/>使用福分抵扣现金：您的福分(<?php echo $member['score']; ?>)本次消费最多可抵扣现金
                    <span class="orange Fb"><?php echo $fufen_dikou; ?>.00</span>元)，我要使用 
                    <input type="text" maxlength="8" class="pay_input_text_gray" name="costPoint"  disabled="disabled"/> 福分</div>
                    <p id="pPointsTip" class="pay_Value" style="display:none;"></p>
                    <p class="payment_List_Rc"></p>
              </li>
             <?php endif; ?>
             <!-- 福分 -->
            <!-- 余额支付 start-->
			<li class="point_in" id="liPayByBalance">
				<div class="payment_List_Lc">					
					<input type="checkbox" name="moneycheckbox" id="MoneyCheckbox" class="input_choice"/>使用账户余额支付，账户余额：
					<span class="green F18"><?php echo $Money; ?></span>元
				</div>
				<p style="" class="pay_Value" id="pBalanceTip">
				<span>◆</span><em>◆</em>账户余额支付更快捷，
				<a class="blue" target="_blank" href="<?php echo WEB_PATH; ?>/member/home/userrecharge">立即充值</a></p>
				<p class="payment_List_Rc">余额支付：<span id="pay_money" class="orange F20">0.00</span> 元</p>
			</li>
            <!-- 余额支付 end--> 
		
			<li id="liPayByOther" class="point_in point_bank" style="display:list-item;">
				<div class="payment_List_Lc gary01 Fb">您的账户余额不足，请选择以下方式完成支付</div>
				<p class="payment_List_Rc">网银支付：<span id="pay_bankmoney" class="orange F20">0.00</span> 元</p>
			</li>
			
            
		</ul>
	</div>
    
	<div class="pay_bankC" id="divBankList" style="display:block;">
		<div class="bank_arrow"><span>◆</span><em>◆</em></div>
		<?php 
        	$bank1 = $this->db->GetOne("select * from `@#_caches` where `key` = 'pay_bank_type'");
            $bank2 = $this->db->GetOne("select * from `@#_pay` where `pay_class` = '$bank1[value]'");
            if($bank1 && $bank2['pay_start'] ==1){
		 ?>
        <?php if($bank1['value'] == 'tenpay'): ?>
		 <h2>银行支付：</h2>
            <ul class="bank_logo click_img">
            	<input type="hidden" name="pay_bank" value="tenpay"  />
                <li><input type="radio" value="CMB" name="account" checked="checked" /><label for="bankType1001"><span class="zh_bank"></span></label></li>
                <li><input type="radio" value="ICBC" name="account"/><label for="bankType1002"><span class="gh_bank"></span></label></li>
                <li><input type="radio" value="CCB" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
                <li><input type="radio" value="ABC" name="account" /><label for="bankType1005"><span class="nh_bank"></span></label></li>
                <li><input type="radio" value="SPDB" name="account" /><label for="bankType1004"><span class="pf_bank"></span></label></li>   
                    
                <li><input type="radio" value="SDB" name="account" /><label for="bankType1008"><span class="sf_bank"></span></label></li>
                <li><input type="radio" value="CIB" name="account" /><label for="bankType1009"><span class="xy_bank"></span></label></li>
                <li><input type="radio" value="BOB" name="account" /><label for="bankType1032"><span class="bj_bank"></span></label></li>
                <li><input type="radio" value="CEB" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
                <li><input type="radio" value="CMBC" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>
                    
                <li><input type="radio" value="CITIC" name="account" /><label for="bankType1021"><span class="zx_bank"></span></label></li>
                <li><input type="radio" value="GDB" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>
                <li><input type="radio" value="PAB" name="account" /><label for="bankType1010"><span class="pa_bank"></span></label></li>
                <li><input type="radio" value="BOC" name="account" /><label for="bankType1052"><span class="zg_bank"></span></label></li>
                <li><input type="radio" value="COMM" name="account"/><label for="bankType1020"><span class="jt_bank"></span></label></li>
            </ul> 
            <?php endif; ?>
            <?php if($bank1['value'] == 'yeepay'): ?>
          	<h2>银行支付：</h2>
            <ul class="bank_logo yeepay_bank click_img">
            <input type="hidden" name="pay_bank" value="yeepay"  />
     		<li><input type="radio" value="ICBC-NET-B2C" name="account" checked="checked" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/ICBC.png"></li>
            <li><input type="radio" value="CCB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CCB.png"></li>
            <li><input type="radio" value="ABC-NET-B2C" name="account"  /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/ABC.png"></li>
         	<li><input type="radio" value="CMBCHINA-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CMBCHINA.png"></li>
            <li><input type="radio" value="BOC-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/BOC.png"></li>
            <li><input type="radio" value="BOCO-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/JIAOTONG.png"></li>
            
            
            <li><input type="radio" value="CEB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CEB.png"></li>
            <li><input type="radio" value="GDB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/GDB.png"></li>
            <li><input type="radio" value="POST-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/PSBC.png"></li>
            <li><input type="radio" value="CMBC-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/CMBC.png"></li>
            <li><input type="radio" value="PINGANBANK-NET" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/SZPA.png"></li>
            <li><input type="radio" value="BCCB-NET-B2C" name="account" /><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/bank/BCCB.png"></li>
            </ul> 
            <?php endif; ?>
			<?php 
				}
			 ?>
		<h3 class="bor">支付平台支付：</h3>
		<ul class="click_img">
        	<?php $ln=1;if(is_array($paylist)) foreach($paylist AS $pay): ?>
			<li>
            <input checked="checked" type="radio" value="<?php echo $pay['pay_id']; ?>" name="account" id="Tenpay">
            <img style="border:1px solid #eee; padding:1px" height="35px" width="120px" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pay['pay_thumb']; ?>">
            </li>   
            <?php  endforeach; $ln++; unset($ln); ?>
		</ul>
	</div>
    <div class="payment_but" style="margin:15px 0 0 0;">
			<input type="hidden" name="submitcode" value="<?php echo $submitcode; ?>">
			<input id="submit_ok" class="shop_pay_but" type="submit" name="submit" value="">
	</div>
    </form>
	<div class="answer">
		<h6><span></span>付款遇到问题</h6>
		<ul class="answer_list">
			<li>1、如您未开通网上银行，即可以使用储蓄卡快捷支付轻松完成付款；</li>
			<li>2、如果您没有网银，可以使用银联在线支付，银联有支持无需开通网银的快捷支付和储值卡支付；</li>
			<li>3、如果您有财付通或快钱、手机支付账户，可将款项先充入相应账户内，然后使用账户余额进行一次性支付；</li>
			<li>4、如果银行卡已经扣款，但您的账户中没有显示，有可能因为网络原因导致，将在第二个工作日恢复。</li>
			<li class="more"><a href="<?php echo WEB_PATH; ?>/help/liaojie">更多帮助</a>&nbsp;&nbsp;<a href="<?php echo WEB_PATH; ?>/member/home">进入我的云购中心&gt;&gt;</a></li>
		</ul>
	</div>
    
</div><!--payment_Con end-->
<script>
$(function(){
	var info={'money':<?php echo $Money; ?>,'MoenyCount':<?php echo $MoenyCount; ?>,"shoplen":<?php echo $shoplen; ?>};
	if(info['money'] >= info['MoenyCount']){
		$("#divBankList").hide();
		$("#liPayByOther").hide();
		$("#MoneyCheckbox").attr("checked",true);
		$("#MoneyCheckbox").attr("disabled",true);
		$("#pay_money").text(info['MoenyCount']+'.00');
	}
	
	if(info['money']==0){
			$("#liPayByBalance").addClass("point_gray");
			$("#MoneyCheckbox").attr("disabled",true);
	}
	if(info['money'] < info['MoenyCount']){		
		$("#MoneyCheckbox").attr("checked",true);
		$("#pay_money").text(info['money']+'.00');
		$("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
		$("#MoneyCheckbox").click(function(){
			if(this.checked){
				$("#pay_money").text(info['money']+'.00');
				$("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
			}else{
				$("#pay_money").text('0.00');
				$("#pay_bankmoney").text(info['MoenyCount']+'.00');	
			} 
		});
	}
	
	
	$("#submit_ok").click(function(){	
		if(!this.cc){
			this.cc = 1;		
			return true;
		}else{		
			return false;
		}		
		return false;
	});
	
	$("#shop_score_num").blur(function(){
			var fufen = parseInt($(this).val());
			var money = parseInt($(this).attr("money"));
			$(this).val(Math.floor(fufen/money)*money);			
	});
	

	//$("input[@type=radio][@checked]").val();
	$(".click_img li>img").click(function(){			
			$(this).prev().attr("checked",'checked');
	});
	
});
</script>
<!--footer 开始-->
<?php include templates("index","footer");?>