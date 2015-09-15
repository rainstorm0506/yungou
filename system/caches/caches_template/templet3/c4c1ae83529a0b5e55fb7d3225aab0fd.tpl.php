<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Home.css"/>

<style type="text/css">
.demo{ width:707px; height:298px; position:relative; overflow:hidden; padding:0px;}
.num{ position:absolute;right:20px; top:275px; z-index:10;}
.num a{background:#fff; color:#ff6700; border:1px solid #ccc; width:16px; height:16px; display:inline-block; text-align:center; line-height:16px; margin:0 3px; cursor:pointer;}
.num a.cur{ background:#ff6700;color:#fff;}
.demo ul{ position:relative; z-index:5;}
.demo ul li{ position:absolute; display:none;}
</style>
<!--banner and Recommend 开始-->
<div class="banner_recommend">
	<!--左边 banner_left 开始-->
	<div class="banner_left">
		<div class="g_hot">
			<div class="banner_all">
				<!--banner-box 开始-->
				<div class="banner-box">
					<?php $slides=$this->DB()->GetList("select * from `@#_slide` where 1",array("type"=>1,"key"=>'',"cache"=>0)); ?>
					<div class="demo">					
						<ul>		
							<?php $ln=1;if(is_array($slides)) foreach($slides AS $slide): ?>
							<?php if($ln == 1): ?>
							<li style="display:list-item;"><a href="<?php echo $slide['link']; ?>" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $slide['img']; ?>"></a></li>
							<?php  else: ?>
						<li style="display:none;"><a href="<?php echo $slide['link']; ?>" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $slide['img']; ?>"></a></li>
							<?php endif; ?>
							<?php  endforeach; $ln++; unset($ln); ?>
						</ul>
						 <div class="num">
						<?php 					
							for($i=1;$i<=count($slides);$i++){
							echo '<a class="">'.$i.'</a>' ;
							}
						 ?>
						</div>
						<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
					</div>	
				</div>
				<!--banner-box 结束-->
				    <!-- 首页中间推荐商品 start-->     
				<div class="m_hot_pro">
					<ul>
					<?php $new_shop2=$this->DB()->GetList("select * from `@#_shoplist` where `pos` = '1' and `q_uid` is null ORDER BY `id` DESC LIMIT 2",array("type"=>1,"key"=>'',"cache"=>0)); ?>
				    <?php $ln=1;if(is_array($new_shop2)) foreach($new_shop2 AS $new_shop): ?>
						<li style="border-left:none;">
							<div class="m_pic_all">
								<span class="m_pic_txt">
								<a  href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop['id']; ?>"  target="_blank" title="<?php echo $new_shop['title']; ?> ">
								<?php echo $new_shop['title']; ?>
								</a></span>
								<p>
								<a class="m_pic_pic" href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop['id']; ?>"  target="_blank" title="<?php echo $new_shop['title']; ?> ">
								<i class="goods_tj">推荐</i>
								<img alt="<?php echo $new_shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $new_shop['thumb']; ?>" width="100" height="100"></a>
								</p>
								<div class="m_pic_button">
									<p class="m_pic_p gray9">已参与<span style="color:#f60;"><?php echo $new_shop['canyurenshu']; ?></span>人次</p>
								</div>
							</div>
						</li>
					 <?php  endforeach; $ln++; unset($ln); ?>	
					</ul>
				</div>
				 <!-- 首页中间推荐商品 end-->
			</div>
		</div>
	</div>
	<!--左边 banner_left 结束-->
	<!--右边 banner_right 开始-->
	<div class="banner_right">
		<div class="m_login">
			<a href=""><img src="<?php echo G_TEMPLATES_IMAGE; ?>/index-come.gif" width="208" height="108"></a>
		</div>
		<div class="m_app">
			<ul>
               <li> <a href=""><i class="i1"></i>诚信网站</a></li>
               <li> <a href=""><i class="i2"></i>可信网站</li></a>
               <li> <a href=""><i class="i3"></i>电商诚信</li></a>
               <li><a href=""><i class="i4"></i>安信宝</li></a>
               <li><a href=""><i class="i5"></i>监督管理局</li></a>
               <li><a href=""><i class="i6"></i>更多</li></a>
            </ul>
		</div>
		<div class="m_notice">
		
			<p class="mo_title">新闻公告</p>
			<!--公告 m_notice_list 开始-->
			<div class="m_notice_list">
				<ul>
				<?php 
				$cateid='17';
				 ?>
				<?php $article=$this->DB()->GetList("select * from `@#_article` where `cateid`='$cateid' order by `id` DESC  limit 3",array("type"=>1,"key"=>'',"cache"=>0)); ?>
				<?php 
				if($article){
				 ?>
				<?php $ln=1;if(is_array($article)) foreach($article AS $art): ?>
					<li>
						<span class="u_radius_point"></span>
						<a href="<?php echo WEB_PATH; ?>/help/<?php echo $art['id']; ?>"  target="_blank"  ><?php echo _strcut($art['title'],30); ?></a>
					</li>						
				<?php  endforeach; $ln++; unset($ln); ?>				
				<?php 
				}
				 ?>
				<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
				</ul>
			</div>
			<!--公告 m_notice_list 结束-->
		</div>
	</div>
	<!--右边 banner_right 结束-->
	<script type="text/javascript">
$(function(){
	var sw = 0;
	$(".demo .num a").mouseover(function(){
		sw = $(".num a").index(this);
		myShow(sw);
	});
	function myShow(i){
		$(".demo .num a").eq(i).addClass("cur").siblings("a").removeClass("cur");
		$(".demo ul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
	}
	//滑入停止动画，滑出开始动画
	$(".demo").hover(function(){
		if(myTime){
		   clearInterval(myTime);
		}
	},function(){
		myTime = setInterval(function(){
		  myShow(sw)
		  sw++;
		  if(sw==<?php echo count($slides); ?>){sw=0;}
		} , 3000);
	});
	//自动开始
	var myTime = setInterval(function(){
	   myShow(sw)
	   sw++;
	   if(sw==<?php echo count($slides); ?>){sw=0;}
	} , 3000);
})
</script>

</div>
<!--banner and Recommend 结束-->
<!--最新揭晓 goods_hot 开始-->
<div class="goods_hot">
	<div class="hot_title" style="border-bottom:none;">
		<h3>最新揭晓</h3>
		<?php $zxjx_idnumber=$this->DB()->GetList("select sum(id) as idnumber from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N'",array("type"=>1,"key"=>'',"cache"=>0)); ?>		
		<p><a href="<?php echo WEB_PATH; ?>/goods_lottery/"  target="_blank" >截至目前共揭晓商品<span>
		<?php $ln=1;if(is_array($zxjx_idnumber)) foreach($zxjx_idnumber AS $idnumber): ?>
		<?php echo $idnumber['idnumber']; ?>
		<?php  endforeach; $ln++; unset($ln); ?>		
		</span>个</a></p>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
	</div>
	<div class="g_list">
		<ul id="ulNewAwary">
		<?php $zxjx_templetes3=$this->DB()->GetList("select  qishu,id,sid,thumb,title,q_uid,q_user from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 5",array("type"=>1,"key"=>'',"cache"=>0)); ?>
		<?php $ln=1;if(is_array($zxjx_templetes3)) foreach($zxjx_templetes3 AS $gzxjx_templetes3): ?>
		<?php 
		$gzxjx_templetes3['q_user'] = unserialize($gzxjx_templetes3['q_user']);
		 ?>
			<li class="new3_li">
				<dl style="display: block;">
					<dt><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $gzxjx_templetes3['id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $gzxjx_templetes3['thumb']; ?>"  width="213"height="200"></a></dt>
					<dd class="g_user"><p>恭喜<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($gzxjx_templetes3['q_uid']); ?>"><?php echo get_user_name($gzxjx_templetes3['q_user']); ?></a>获得</p></dd>
					<dd class="g_name"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $gzxjx_templetes3['id']; ?>" title="<?php echo $gzxjx_templetes3['title']; ?>">(第<?php echo $gzxjx_templetes3['qishu']; ?>期)<?php echo $gzxjx_templetes3['title']; ?></a></dd>					
				</dl>
				<s></s>
			</li>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
		</ul>		
		<!---倒计时start--->
		<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/GLotteryFun.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){gg_show_time_init("ulNewAwary",'<?php echo WEB_PATH; ?>',0);});						
		</script>  
		 <!---倒计时end--->
	</div>
</div>
<!--最新揭晓 goods_hot 结束-->
<div class="clear"></div>
<!--product 开始-->
<div class="goods_hot">
	<div class="hot_title">
		<h3>热门推荐</h3>
		<a href="<?php echo WEB_PATH; ?>/goods_list/0_0_2">更多&gt;&gt;</a>
	</div>
	<div class="goods_left">
		<div class="hot" style="">
			<ul id="hostGoodsItems" class="hot-list">											
				<?php $ln=1;if(is_array($shoplistrenqi)) foreach($shoplistrenqi AS $renqi): ?>
				<li class="list-block">
					<div class="pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>">					
					<?php if(isset($renqi['t_max_qishu'])): ?>							
							<i class="goods_rq"></i>							
					<?php endif; ?>					
					<?php if(isset($renqi['t_new_goods'])): ?>						
							<i class="goods_xp"></i>					
					<?php endif; ?>
					<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>" alt="<?php echo $renqi['title']; ?>"></a></div>
					<p class="name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>"><?php echo $renqi['title']; ?></a></p>
					<p class="money">价值：<span class="rmb"><?php echo $renqi['money']; ?></span></p>
					<div class="Progress-bar" style="">
						<p title="已完成<?php echo percent($renqi['canyurenshu'],$renqi['zongrenshu']); ?>"><span style="width:<?php echo width($renqi['canyurenshu'],$renqi['zongrenshu'],221); ?>px;"></span></p>
						<ul class="Pro-bar-li">
							<li class="P-bar01"><em><?php echo $renqi['canyurenshu']; ?></em>已参与人次</li>
							<li class="P-bar02"><em><?php echo $renqi['zongrenshu']; ?></em>总需人次</li>
							<li class="P-bar03"><em><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></em>剩余人次</li>
						</ul>
					</div>
					<div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
				</li>
				<?php  endforeach; $ln++; unset($ln); ?>
			</ul>
		</div>
    

	</div>
	<div class="goods_right">
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
		<div class="share">
			<h3>TA们正在云购</h3>
			<div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
					<?php $ln=1;if(is_array($go_record)) foreach($go_record AS $gorecord): ?>
					<li>
						<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>" class="pic" target="_blank">
                        <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo shopimg($gorecord['shopid']); ?>"></a>
						<span class="who"><p style="display: inline;"><a class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($gorecord['uid']); ?>"><?php echo get_user_name($gorecord); ?></a></p>刚刚云购了</span>
						<span><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>" class="name" target="_blank"><?php echo $gorecord['shopname']; ?></a></span>
					</li>
					<?php  endforeach; $ln++; unset($ln); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--product 结束-->
<div class="clear"></div>
<!--商品 开始-->
<div class="get_ready">
	<div class="hot_title" style="width:1195px;height:55px;">
		<h3 style="margin-top:7px;">即将揭晓</h3>
		<div class="fr">
		<?php 
		$this->db=System::load_sys_class('model');
		$url_center='';		
			$center_navigation=$this->db->GetList("select cateid,parentid,name from `@#_category` where `model` = '1' and `parentid` = '0' order by `order` DESC");				
			$center_navigation=array_reverse($center_navigation,true);
			foreach($center_navigation as $v){
				$url_center.='<a href="'.WEB_PATH.'/goods_list/'.$v['cateid'].'_0_0">'.$v['name'].'</a>';
			}
		$url_center.='<a href="'.WEB_PATH.'/goods_list/">全部</a>';
	    echo  $url_center;
   		 ?>	
		</div>
	</div>
	<ul id="readyLotteryItems" class="hot-list">
		<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shop): ?>
		<li class="list-block">
			<div class="pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>" alt="<?php echo $shop['title']; ?>"></a></div>
			<p class="name"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?>"><?php echo $shop['title']; ?></a></p>
			<p class="money">价值：<span class="rmb"><?php echo $shop['money']; ?></span></p>
			<div class="Progress-bar" style="">
				<p title="已完成<?php echo percent($shop['canyurenshu'],$shop['zongrenshu']); ?>"><span style="width:<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],221); ?>px;"></span></p>
				<ul class="Pro-bar-li">
					<li class="P-bar01"><em><?php echo $shop['canyurenshu']; ?></em>已参与人次</li>
					<li class="P-bar02"><em><?php echo $shop['zongrenshu']; ?></em>总需人次</li>
					<li class="P-bar03"><em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余人次</li>
				</ul>
			</div>
			<div class="shop_buttom">
				<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a>
				<a href="javascript:;" class="buy_bus fr" title="加入购物车"></a>
			</div>
			<div class="Curbor_id" style="display:none;"><?php echo $shop['id']; ?></div>
			<div class="Curbor_yunjiage" style="display:none;"><?php echo $shop['yunjiage']; ?></div>
			<div class="Curbor_shenyu" style="display:none;"><?php echo $shop['shenyurenshu']; ?></div>
		</li>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>		
	</ul>
	<div class="all_goods">
		<div class="all_goods_main"><a href="<?php echo WEB_PATH; ?>/goods_list/">查看所有商品</a></div>
	</div>
</div>
<!--商品 结束-->
<script type="text/javascript">

$(function(){
	$("#readyLotteryItems li a.buy_bus").click(function(){ 
		var sw = $("#readyLotteryItems li a.buy_bus").index(this);
		var src = $("#readyLotteryItems li .pic a img").eq(sw).attr('src');				
		var $shadow = $('<img id="cart_dh" style="display:none; border:1px solid #aaa; z-index:99999;" width="200" height="200" src="'+src+'" />').prependTo("body");  			
		var $img = $("#readyLotteryItems li .pic").eq(sw);
		$shadow.css({ 
			'width' : 200, 
			'height': 200, 
			'position' : 'absolute',      
			"left":$img.offset().left+16, 
			"top":$img.offset().top+9,
			'opacity' : 1    
		}).show();
		var $cart = $("#btnMyCart");
		$shadow.animate({   
			width: 1, 
			height: 1, 
			top: $cart.offset().top,    
			left: $cart.offset().left, 
			opacity: 0
		},500,function(){
			Cartcookie(sw,false);
		});	
		
	});
	$("#readyLotteryItems li a.go_Shopping").click(function(){	
		var sw = $("#readyLotteryItems li a.go_Shopping").index(this);

		Cartcookie(sw,true); 
	});	
});
//存到COOKIE
function Cartcookie(sw,cook){
	var shopid = $(".Curbor_id").eq(sw).text(),
		shenyu = $(".Curbor_yunjiage").eq(sw).text(),
		money = $(".Curbor_shenyu").eq(sw).text();
	var Cartlist = $.cookie('Cartlist');
	if(!Cartlist){
		var info = {};
	}else{
		var info = $.evalJSON(Cartlist);
	}
	if(!info[shopid]){
		var CartTotal=$("#sCartTotal").text();
			$("#sCartTotal").text(parseInt(CartTotal)+1);
			$("#btnMyCart em").text(parseInt(CartTotal)+1);
	}	
	info[shopid]={};
	info[shopid]['num']=1;
	info[shopid]['shenyu']=shenyu;
	info[shopid]['money']=money;
	info['MoenyCount']='0.00';
	$.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
	if(cook){
		window.location.href="<?php echo WEB_PATH; ?>/member/cart/cartlist";
	}
}  

</script>

<!--商品 开始-->
<div class="get_ready">
	<div class="hot_title" style="width:1195px;">
		<h3 style="margin-top:7px;">新品上架</h3>
		<a href="<?php echo WEB_PATH; ?>/goods_list/0_0_4" >更多&gt;&gt;</a>
	</div>
	<ul id="readyLotteryItems" class="hot-list">
	    <?php $shoplistnew=$this->DB()->GetList("select * from `@#_shoplist` where `q_end_time` is  null and `q_showtime` = 'N' and `shenyurenshu`!='0'  and `sid`=`id` limit 8",array("type"=>1,"key"=>'',"cache"=>0)); ?>	
		<?php $ln=1;if(is_array($shoplistnew)) foreach($shoplistnew AS $newshop): ?>
		<li class="list-block" style="height:335px;">
			<div class="pic" style="width:250px;"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $newshop['id']; ?>" target="_blank" title="<?php echo $newshop['title']; ?>"><img style="width:200px;height:200px;margin:25px;" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $newshop['thumb']; ?>" alt="<?php echo $newshop['title']; ?>"></a></div>
			<p class="name"><a style="font-size:14px;" href="<?php echo WEB_PATH; ?>/goods/<?php echo $newshop['id']; ?>" target="_blank" title="<?php echo $newshop['title']; ?>"><?php echo $newshop['title']; ?></a></p>
			<p style="margin-top:5px;" class="money">价值：<span class="rmb"><?php echo $newshop['money']; ?></span></p>

		</li>
		<?php  endforeach; $ln++; unset($ln); ?>			
	</ul>
</div>

<!--商品 结束-->
<div class="clear:both;"></div>
<!--晒单分享-->
<div class="lottery_show">
    <div class="share_show">
        <h3><span>晒单分享</span><a href="<?php echo WEB_PATH; ?>/go/shaidan/" target="_blank">更多&gt;&gt;</a></h3>
		<?php $shaidan=$this->DB()->GetList("select * from `@#_shaidan` order by `sd_id` DESC LIMIT 1",array("type"=>1,"key"=>'',"cache"=>0)); ?>
		<?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
	   		<div class="singleL">
			<dl>
				<dt><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"></a></dt>
				<dd class="u_user">
					<p class="u_head"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($sd['sd_userid'],'img'); ?>"></a></p>
					<p class="u_info">
						<span><a href="<?php echo WEB_PATH; ?>/uname/<?php echo $sd['sd_userid']; ?>" target="_blank"><?php echo get_user_name($sd['sd_userid']); ?></a><em>
						<?php 
						$sdtime=$sd['sd_time'];
						$nowtime=time();
						$chatime=$nowtime-$sdtime;
						echo date('i',$chatime);
						 ?>
						分钟前</em></span>
					</p>
				<p>	<?php echo $sd['sd_title']; ?></p>
				</dd>
				<dd class="m_summary">
					<cite><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><?php echo _strcut($sd['sd_content'],100); ?></a></cite>
					<b><s></s></b>
				</dd>
			</dl>
		</div>
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
		<?php $shaidan_two=$this->DB()->GetList("select * from `@#_shaidan` order by `sd_id` DESC LIMIT 1,6",array("type"=>1,"key"=>'',"cache"=>0)); ?>
			<div class="singleR">	
				<ul id="ul_PostList">
				<?php $ln=1;if(is_array($shaidan_two)) foreach($shaidan_two AS $sd): ?>
				<li><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"><p><?php echo $sd['sd_title']; ?></p></a></li>
				</ul>	
		<?php  endforeach; $ln++; unset($ln); ?>
		<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>			
				<div class="arrow_left"></div>
				<div class="arrow_right"></div>
			</div>               
    </div>
</div>
<!--晒单分享end-->
<?php include templates("index","footer");?>