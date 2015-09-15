<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<style>
		#wuliu_select{ padding:5px 8px; width:80px; background-color:#F60;border-radius:2px;font-family: 微软雅黑; color:#fff; font-size:12px; margin-left:30px; }		
		.wuliubtn{ padding:3px 5px;background-color:#2af;border-radius:2px; color:#fff; font-size:12px; }
		.wuliubtn:hover{ color:#fff; cursor:pointer}
		.single-img .pic{ text-indent:0px;}
		#divPageNav{ padding-top:10px;text-align:right}		
		.listTitle .sdzt b{color: #fe6c00; font-weight:bold}
		.message{ background:#fffce2; border:1px solid #fd9; color:#f60; padding:5px 8px; text-indent:10px;}
		.single-xx-has span{ display:inline-block;  width:180px}
</style>
        
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-commodity.css"/>
<div class="R-content">
	<div class="member-t"><h2>获得的商品</h2></div>
	<div class="get-pro gray02">您总共成功云购获得商品 <b id="goodsCount" class="orange"><?php echo count($record); ?></b> 个
    	  <a href="#" id="wuliu_select">查询物流</a>
    </div>	
    <?php if(!member_get_dizhi($uid)): ?>    
    <div class="message">你还没有填写收货信息,请填写收货信息！ <a href="<?php echo WEB_PATH; ?>/member/home/address" style="font-weight:bold; color:#2af">去填写!</a></div>
    <?php endif; ?>    
    
    <div style="clear:both; width:100%; height:20px; display:block;"></div>
	<div id="tbList" class="single-C list-tab">
		<ul class="listTitle">
			<li class="single-img">商品图片</li>
			<li class="single-xx-has">商品信息</li>
			<li class="sdzt">状态</li>
			<li class="single-Control">运费</li>
		</ul>
		<?php if(count($record)==0): ?>
		<div class="tips-con"><i></i>无相应的获得商品记录</div>
		<?php  else: ?>
		<?php $ln=1;if(is_array($record)) foreach($record AS $recd): ?>
		<ul class="listTitle" style="background:#fff; height:80px; padding:10px 0 0 0;">
			<li class="single-img"><a target="_blank" class="pic" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $recd['shopid']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo yunjl($recd['shopid']); ?>"></a></li>
			<li class="single-xx-has"><a target="_blank" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $recd['shopid']; ?>" class="blue">第<?php echo $recd['shopqishu']; ?>期<?php echo $recd['shopname']; ?></a>
            <br/><?php if($recd['company']): ?><span>物流公司::: <?php echo $recd['company']; ?></span>快递单号:::<?php echo $recd['company_code']; ?><?php endif; ?>
            </li>
			<li class="sdzt">
            <b>
            <?php              
            	$status=@explode(",",$recd['status']);               
                if($status[2]=='未完成' || $status[2]=='待收货'){       	
                    if($status[1]=='未发货'){                    	
                        echo "等待发货";
                    } 
                    if($status[1]=='已发货'){
                    	echo "已发货";
                        echo "<br>";
                        echo '<a class="wuliubtn" oid="'.$recd['id'].'" uid="'.$recd['uid'].'">确认收货</a>';                      
                    }  
                } 
                if($status[2]=='已完成'){
                	echo "已完成";
                }   
                if($status[2]=='已作废'){
                	echo "已作废";
                }          
             ?>       
            </b>
            
            </li>
            <li class="single-Control">￥<?php echo $recd['company_money']; ?></li>
			
            
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php endif; ?>
	</div>
		<div id="divPageNav" class="page_nav">
        	<?php echo $page->show('two'); ?> <li>共 <?php echo $total; ?> 条</li>
        </div>
</div>
</div>

<!--期数修改弹出框-->
<style>
#paywindow{position:absolute;z-index:999; display:none}
#paywindow_b{width:542px;height:360px;background:#2a8aba; filter:alpha(opacity=60);opacity: 0.6;position:absolute;left:0px;top:0px; display:block}
#paywindow_c{width:530px;height:348px;background:#fff;display:block;position:absolute;left:6px;top:6px;}
.p_win_title{ line-height:40px;height:40px;background:#f8f8f8;}
.p_win_title b{float:left}
.p_win_title a{float:right;padding:0px 10px;color:#f60}
.p_win_content h1{font-size:25px;font-weight:bold;}
.p_win_but,.p_win_mes,.p_win_ctitle,.p_win_text{ margin:10px 20px;}
.p_win_mes{border-bottom:1px solid #eee;line-height:35px;}
.p_win_mes span{margin-left:10px;}
.p_win_ctitle{overflow:hidden;}
.p_win_x_b{float:left; width:73px;height:68px;background-repeat:no-repeat;}
.p_win_x_t{ font-size:18px; font-weight:bold;font-family: "Helvetica Neue",\5FAE\8F6F\96C5\9ED1,Tohoma;color:#f00; text-align:center}
.p_win_but{ height:40px; line-height:40px;}
.p_win_but a{ padding:8px 15px; background:#f60; color:#fff;border:1px solid #f50; margin:0px 15px;font-family: "Helvetica Neue",\5FAE\8F6F\96C5\9ED1,Tohoma; font-size:15px; }
.p_win_but a:hover{ background:#f50}
.p_win_text a{ font-size:13px; color:#f60}
.pay_window_quit:hover{ color:#f00}
</style>
<div id="paywindow">
	<div id="paywindow_b"></div>
	<div id="paywindow_c">
		<div class="p_win_title"><a href="javascript:void();" class="pay_window_quit">[关闭]</a><b>　 物流查询</b></div>
		<div class="p_win_content">			
            	<iframe name="kuaidi100" src="http://www.kuaidi100.com/frame/app/index2.html" width="527" height="300" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>        
		</div>
	</div>
</div>

<script>
$(function(){
	var width = ($(window).width()-542)/2;
	var height = ($(window).height()-360)/2;
	$("#paywindow").css("left",width);
	$("#paywindow").css("top",height);
		
	$(".pay_window_quit").click(function(){
		$("#paywindow").hide();								 
	});	
	$("#wuliu_select").click(function(){
		$("#paywindow").show();								 
	});	
	
	$(".wuliubtn").click(function(){
		var uid = $(this).attr("uid");	
		var oid = $(this).attr("oid");	
		$.post("<?php echo WEB_PATH; ?>/api/dingdan/set",{"uid":uid,"oid":oid},function(sdata){
			if(sdata=='1'){
				alert("更新成功");
			}else{
				alert("更新失败");
			}											   
		});					  
	});
});

</script>
<!--期数修改弹出框-->
<?php include templates("index","footer");?>