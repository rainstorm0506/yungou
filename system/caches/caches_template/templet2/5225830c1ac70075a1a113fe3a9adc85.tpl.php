<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Home.css"/>

<style type="text/css">
    .demo{ width:740px; height:333px; position:relative; overflow:hidden; padding:0px;}
    .num{ position:absolute;right:20px; top:300px; z-index:10;}
    .num a{background:#fff; color:#db3752; border:1px solid #ccc; width:16px; height:16px; display:inline-block; text-align:center; line-height:16px; margin:0 3px; cursor:pointer;}
    .num a.cur{ background:#db3752;color:#fff;text-decoration:none;}
    .demo ul{ position:relative; z-index:5;}
    .demo ul li{ position:absolute; display:none;}
</style>
<!--banner and Recommend 开始-->
<div class="banner_recommend">
    <div class="banner-box">
        
        <?php $slides=$this->DB()->GetList("select * from `@#_slide` where 1",array("type"=>1,"key"=>'',"cache"=>0)); ?>
        <div style="margin-left:239px;" class="demo">					
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
        <div class="new_notice">
            <div class="new_notice_center">
                <h4>最新公告</h4>
                <ul>
                    <li>
                        <span class="n_number">1</span>
                        “iPhone5s 降价了大家快来抢啊！ ”
                        <a href="">查看晒单</a>
                    </li>
                    <li>
                        <span class="n_number">2</span>
                        “限时云购活动，即将于12月31日停止。”
                    </li>
                    <li>祝您愉快~！</li>
                </ul>
            </div>
        </div>
        <div class="new_publish">		      
            <a href="javascript:;"><div class="arrows arrows2" arae="left"></div></a>
            <div class="prin_pp" id="prin_pp">
                <?php 
                $shopqishub=$this->db->GetList("select qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu  from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 6");   
                 ?>
                <?php $ln=1;if(is_array($shopqishub)) foreach($shopqishub AS $qishu): ?>
                <?php 
                $qishu['q_user'] = unserialize($qishu['q_user']);	
                $user_shop_number = $this->db->GetOne("select sum(gonumber) as gonumber from `@#_member_go_record` where `uid`= '$qishu[q_uid]' and `shopid` = '$qishu[id]' and `shopqishu` = '$qishu[qishu]'");
                $user_shop_number = $user_shop_number['gonumber'];
                 ?>				
                <div class='print'>
                    <div class="new_publish1" style="border-right:solid 1px #ebebeb">
                        <i class="ico_label_newReveal" title="最新揭晓"></i>
                        <p class="w_goods_title"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" title="<?php echo $qishu['title']; ?>">(第<?php echo $qishu['qishu']; ?>期)<?php echo $qishu['title']; ?></a></p>
                        <div class="w_goods_pic"><a title="<?php echo $qishu['title']; ?>" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['thumb']; ?>"/></a></div>
                        <p class="w_goods_price">总需：<?php echo $qishu['zongrenshu']; ?>人次</p>
                        <div class="w_goods_record">
                            <P>获奖者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>"><?php echo get_user_name($qishu['q_user']); ?></a></P>
                            <p>本期参与：<?php echo $user_shop_number; ?>人次</p>
                            <p>本期幸运号码：<?php echo $qishu['q_user_code']; ?></p>							
                        </div>
                    </div>	
                </div>			
                <?php  endforeach; $ln++; unset($ln); ?>				
                <!------>
                <script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/GLotteryFun.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        gg_show_time_init("prin_pp", '<?php echo WEB_PATH; ?>', 0);
                    });
                </script>  
                <!------>	
            </div>
            <a href="javascript:;"><div class="arrows arrows1" arae="right"></div></a>
            <div class="controller-nav">
                <a class="cur" id="cur_k1" qarae="lee" href="javascript:;"></a>
                <a class="" id="cur_k2" qarae="lel" href="javascript:;"></a>
                <a class="" id="cur_k3" qarae="lcc" href="javascript:;"></a>
            </div>
        </div>
    </div>			
    <script type="text/javascript">
        $(function() {
            var sw = 0;
            $(".demo .num a").mouseover(function() {
                sw = $(".num a").index(this);
                myShow(sw);
            });
            function myShow(i) {
                $(".demo .num a").eq(i).addClass("cur").siblings("a").removeClass("cur");
                $(".demo ul li").eq(i).stop(true, true).fadeIn(600).siblings("li").fadeOut(600);
            }
            //滑入停止动画，滑出开始动画
            $(".demo").hover(function() {
                if (myTime) {
                    clearInterval(myTime);
                }
            }, function() {
                myTime = setInterval(function() {
                    myShow(sw)
                    sw++;
                            if (sw == <?php echo count($slides); ?>){sw = 0; }
                }, 3000);
            });
            //自动开始
            var myTime = setInterval(function() {
                myShow(sw)
                sw++;
                        if (sw == <?php echo count($slides); ?>){sw = 0; }
            }, 3000);
        })
    </script>
    <!-- 首页右边推荐商品一个 start-->
    <?php if($new_shop): ?>
    <div class="recommend">    
        <ul class="Pro">			
            <li>
                <div class="pic">
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop['id']; ?>" target="_blank" title="<?php echo $new_shop['title']; ?>">
                        <i class="goods_tj"></i>
                        <img alt="<?php echo $new_shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $new_shop['thumb']; ?>">
                    </a>
                    <p name="buyCount" style="display:none;"></p>
                </div>
                <p class="name">
                    <strong><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop['id']; ?>" target="_blank" title="<?php echo $new_shop['title']; ?> ">
                            <?php echo $new_shop['title']; ?></strong></a>
                </p>
                <p class="money">价值：<span class="rmb"><?php echo $new_shop['money']; ?></span></p>
                <div class="Progress-bar" style="">
                    <p title="已完成<?php echo percent($new_shop['canyurenshu'],$new_shop['zongrenshu']); ?>"><span style="width:<?php echo width($new_shop['canyurenshu'],$new_shop['zongrenshu'],205); ?>px;"></span></p>
                    <ul class="Pro-bar-li">
                        <li class="P-bar01"><em><?php echo $new_shop['canyurenshu']; ?></em>已参与人次</li>
                        <li class="P-bar02"><em><?php echo $new_shop['zongrenshu']; ?></em>总需人次</li>
                        <li class="P-bar03"><em><?php echo $new_shop['zongrenshu']-$new_shop['canyurenshu']; ?></em>剩余人次</li>
                    </ul>
                </div>
                <p>
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop['id']; ?>" target="_blank" class="go_buy"></a>
                </p>
            </li>				
        </ul>
    </div>
    <?php endif; ?>   
    <!-- 首页右边推荐商品多个 start-->
    <div class="recommend rect_rem" style="height:225px;">
        <a href="javascript:;"><div class="arr_row arrows_arr" arae1="left1"></div></a>
        <ul class="Pro" id="prpr_po" style="border:solid 1px #ebebeb;height:206px;position:absolute;left:0px;">
            <?php 
            $new_shopmun=$this->db->GetList("select * from `@#_shoplist` where `pos` = '1' and `q_uid` is null ORDER BY `id` DESC LIMIT 3");
            $num=1;
             ?>
            <?php $ln=1;if(is_array($new_shopmun)) foreach($new_shopmun AS $new_shop_mun): ?>
            <?php 
            $num++;
             ?>
            <li id="pre_0<?php echo $num; ?>">
                <div class="pic">				
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop_mun['id']; ?>" target="_blank" title="<?php echo $new_shop_mun['title']; ?>">
                        <img alt="<?php echo $new_shop_mun['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $new_shop_mun['thumb']; ?>">
                    </a>
                    <p name="buyCount" style="display:none;"></p>
                </div>
                <p class="name">
                    <strong><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new_shop_mun['id']; ?>" target="_blank" title="<?php echo $new_shop_mun['title']; ?> ">
                            <?php echo $new_shop_mun['title']; ?></strong></a>
                </p>
            </li>
            <?php  endforeach; $ln++; unset($ln); ?>		
        </ul>
        <a href="javascript:;"><div class="arr_row arrows_are" arae1="right1"></div></a>
    </div>
</div>
</div>
<!-- 首页右边推荐商品 end-->
</div>
<!--商品 开始-->
<div class="get_ready">
    <h3><span style="color:#000">最新上架</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list">更多新品，点击查看&gt;&gt;</a></h3>
    <ul id="readyLotteryItems" class="hot-list">
        <?php $shoplistnew=$this->DB()->GetList("select * from `@#_shoplist` where `q_end_time` is  null and `q_showtime` = 'N' and `shenyurenshu`!='0'  and `sid`=`id`  LIMIT 0,10",array("type"=>1,"key"=>'',"cache"=>0)); ?>	
        <?php $ln=1;if(is_array($shoplistnew)) foreach($shoplistnew AS $shop): ?>
        <li class="list-block">
            <div class="pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?>">
                    <!--补丁3.1.5_b.0.1-->                    	 
                    <?php $i_googd_bj = null; ?>        
                    <!--补丁3.1.5_b.0.1-->        
                    <?php if(($this_time - $shop['time']) < 86400): ?>						
                    <?php $i_googd_bj = '<i class="goods_xp"></i>'; ?>					
                    <?php endif; ?>			
                    <?php echo $i_googd_bj; ?>    
                    <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>" alt="<?php echo $shop['title']; ?>"></a></div>
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
            <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
        </li>
        <?php  endforeach; $ln++; unset($ln); ?>			
    </ul>
</div>

<!--商品 结束-->
<!--banner and Recommend 结束-->
<!--product 开始-->
<!--<div class="goods_hot">
    <div class="goods_left">


        <div class="hot" style="">
            <h3><span>最热人气商品</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/0_0_2">更多商品，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">
                <?php 
                $shoplistrenqib=$this->db->GetList("select * from `@#_shoplist` where `renqi`='1' and `q_uid` is null ORDER BY id DESC LIMIT 8");
                 ?>
                <?php $ln=1;if(is_array($shoplistrenqib)) foreach($shoplistrenqib AS $renqi): ?>
                 每一个产品
                <li class="list-block">
                    <div class="pic"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank" title="<?php echo $renqi['title']; ?>">					
                            补丁3.1.5_b.0.1                    	 
                            <?php $i_googd_bj = null; ?>        
                            <?php if($renqi['renqi']=='1' && !isset($i_googd_bj)): ?>						
                            <?php $i_googd_bj = '<i class="goods_rq"></i>'; ?>				
                            <?php endif; ?>					
                            <?php echo $i_googd_bj; ?>    
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
            <h3>最新揭晓记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 
                    $shopgxb=$this->db->GetList("select qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu  from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 8");
                     ?>
                    <?php $ln=1;if(is_array($shopgxb)) foreach($shopgxb AS $shopgx): ?>
                    <?php 
                    $shopgx['q_user'] = unserialize($shopgx['q_user']);
                     ?>
                    <li>
                        <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shopgx['id']; ?>" class="pic" target="_blank">
                            <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shopgx['thumb']; ?>" style="width:58px"/></a>
                        <span class="who"><p style="display: inline;"><a class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($shopgx['q_uid']); ?>"><?php echo get_user_name($shopgx['q_user']); ?></a></p>刚刚获得了</span>
                        <span><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shopgx['id']; ?>" class="name" target="_blank"><?php echo $shopgx['title']; ?></a></span>

                    </li>
                    <?php  endforeach; $ln++; unset($ln); ?>
                </ul>
            </div>
        </div>
    </div>
</div>-->
<!--product 结束-->
<div class="clear"></div>

<!--奢侈品专区--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>奢侈品区</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/5_0_1">更多奢侈品，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($new_goods)) foreach($new_goods AS $shop): ?>
                <li class="list-block">
                    <div class="pic"><a href="<?php echo WEB_PATH; ?>/goods_area/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>" alt="<?php echo $shop['title']; ?>"></a></div>
                    <p class="name"><a href="<?php echo WEB_PATH; ?>/goods_area/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?>"><?php echo $shop['title']; ?></a></p>
                    <p class="money">价值：<span class="rmb"><?php echo $shop['money']; ?></span></p>
                    <div class="Progress-bar" style="">
                        <p title="已完成<?php echo percent($shop['canyurenshu'],$shop['zongrenshu']); ?>"><span style="width:<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],221); ?>px;"></span></p>
                        <ul class="Pro-bar-li">
                            <li class="P-bar01"><em><?php echo $shop['canyurenshu']; ?></em>已参与人次</li>
                            <li class="P-bar02"><em><?php echo $shop['zongrenshu']; ?></em>总需人次</li>
                            <li class="P-bar03"><em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余人次</li>
                        </ul>
                    </div>
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods_area/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--奢侈品专区--结束-->

<!--精品电器--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>精品电器</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/13_0_1">更多精品电器，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($electrical_goods)) foreach($electrical_goods AS $shop): ?>
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--精品电器--结束-->

<!--汽车配件--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>汽车配件</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/6_0_1">更多即将揭晓，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($car_goods)) foreach($car_goods AS $shop): ?>
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--汽车配件--结束-->

<!--服饰百货--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>服饰百货</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/12_0_1">更多服饰百货，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($cloth_goods)) foreach($cloth_goods AS $shop): ?>
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--服饰百货--结束-->

<!--母婴美妆--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>母婴美妆</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/14_0_1">更多母婴美妆，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($mother_goods)) foreach($mother_goods AS $shop): ?>
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--母婴美妆--结束-->

<!--生活用品--开始-->
<div class="goods_hot">
    <div class="goods_left">

        <div class="hot" style="">
            <h3><span>生活用品</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/17_0_1">更多生活用品，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">			
                <?php $ln=1;if(is_array($life_goods)) foreach($life_goods AS $shop): ?>
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--生活用品--结束-->

<!--即将揭晓 开始-->
<div class="goods_hot">
    <div class="goods_left">


        <div class="hot" style="">
            <h3><span>即将揭晓</span><a rel="nofollow" href="<?php echo WEB_PATH; ?>/goods_list/0_0_1">更多即将揭晓，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">	
                <?php 
                $shoplist=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null ORDER BY `shenyurenshu` ASC LIMIT 8");
                 ?>			
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
                    <div class="shop_buttom"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" target="_blank" class="shop_but" title="立即云购"></a></div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="goods_right">

        <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">		
                <ul id="buyList" style="margin-top: 0px;">
                    <?php 		
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,10");	   
                     ?>
                    <?php $ln=1;if(is_array($go_recordb)) foreach($go_recordb AS $gorecord): ?>
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
<!--即将揭晓 结束-->

<div class="clear"></div>
<!--晒单分享-->
<div class="lottery_show">
    <div class="share_show">
        <h3><span style="color:#000">晒单分享</span><a href="<?php echo WEB_PATH; ?>/go/shaidan/" target="_blank">更多分享，点击查看&gt;&gt;</a></h3>
        <div class="show">
            <?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
            <dl>
                <dt><a rel="nofollow" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"></a></dt>
                <dd class="bg">
                    <ul>
                        <li class="name"><span><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank"><?php echo $sd['sd_title']; ?></a></span> 获得者：<a rel="nofollow" class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo $sd['sd_userid']; ?>" target="_blank"><?php echo get_user_name($sd['sd_userid']); ?></a></li>
                        <li class="content"><?php echo _strcut($sd['sd_content'],100); ?></li>
                    </ul>
                </dd>
            </dl>
            <?php  endforeach; $ln++; unset($ln); ?>	
            <div class="show_list">	
                <?php $ln=1;if(is_array($shaidan_two)) foreach($shaidan_two AS $sd): ?>
                <ul>
                    <li class="pic"><a rel="nofollow" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"></a></li>
                    <li class="show_tit"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" target="_blank"><?php echo $sd['sd_title']; ?></a></li>
                    <li>获得者：<a rel="nofollow" class="blue" href="<?php echo WEB_PATH; ?>/uname/<?php echo $sd['sd_userid']; ?>" target="_blank"><?php echo get_user_name($sd['sd_userid']); ?></a></li>
                    <li>揭晓时间：<?php echo date("Y-m-d",$sd['sd_time']); ?></li>
                </ul>	
                <?php  endforeach; $ln++; unset($ln); ?>			
                <div class="arrow_left"></div>
                <div class="arrow_right"></div>
            </div>               
        </div>
    </div>
</div>
<!--晒单分享end-->

<!--新闻列表-->
<style>
    .lottery_news{ width:100%; border:1px solid #000;}
</style>
<!--/新闻列表-->
<?php include templates("index","footer");?>

<script>
    $(".new_publish").mouseover(function() {
        $(".arrows").show();
    })
    $(".new_publish").mouseout(function() {
        $(".arrows").hide();
    })
//右移动
    $(".arrows1").click(function() {
        var arae = $(this).attr("arae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        var leftpx1 = $("#prin_pp").css("left");
        var time = 500;
        if (arae == 'left') {
            leftpx += 730;
            //$(".controller-nav a").attr("alt","");
            //$(this).parents(".new_publish").find(".controller-nav").find("a").attr("alt","cur")
            //$(this).parents(".new_publish").find(".controller-nav").find(".cur").css("background","#000");
        } else {
            leftpx -= 730;
        }
        if ((leftpx < (-730 * 2))) {
            leftpx = 0;
            time = 250;
        }

        if (leftpx > 0) {
            leftpx = (-730 * 2);
            time = 250;
        }

        if (leftpx1 == "0px") {
            $("#cur_k2").css("background", "#db3652");
            $("#cur_k1").css("background", "#b7b7b7");
            $("#cur_k3").css("background", "#b7b7b7");
        }
        if (leftpx1 == "-730px") {
            $("#cur_k3").css("background", "#db3652");
            $("#cur_k1").css("background", "#b7b7b7");
            $("#cur_k2").css("background", "#b7b7b7");
        }
        if (leftpx1 == "-1460px") {
            $("#cur_k1").css("background", "#db3652");
            $("#cur_k2").css("background", "#b7b7b7");
            $("#cur_k3").css("background", "#b7b7b7");
        }
        $("#prin_pp").animate({left: leftpx + "px"});
    });
//左移动
    $(".arrows2").click(function() {
        var arae = $(this).attr("arae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        var leftpx1 = $("#prin_pp").css("left");
        var time = 500;
        if (arae == 'left') {
            leftpx += 730;
        } else {
            leftpx -= 730;
        }
        if ((leftpx < (-730 * 2))) {
            leftpx = 0;
            time = 250;
        }

        if (leftpx > 0) {
            leftpx = (-730 * 2);
            time = 250;
        }

        if (leftpx1 == "0px") {
            $("#cur_k3").css("background", "#db3652");
            $("#cur_k1").css("background", "#b7b7b7");
            $("#cur_k2").css("background", "#b7b7b7");
        }
        if (leftpx1 == "-1460px") {
            $("#cur_k2").css("background", "#db3652");
            $("#cur_k1").css("background", "#b7b7b7");
            $("#cur_k3").css("background", "#b7b7b7");
        }
        if (leftpx1 == "-730px") {
            $("#cur_k1").css("background", "#db3652");
            $("#cur_k2").css("background", "#b7b7b7");
            $("#cur_k3").css("background", "#b7b7b7");
        }
        $("#prin_pp").animate({left: leftpx + "px"});
    });
</script>

<script>
    $(".rect_rem").mouseover(function() {
        $(".arr_row").show();
    })
    $(".rect_rem").mouseout(function() {
        $(".arr_row").hide();
    })
//banner 右侧左右移动
    $(".arr_row").click(function() {
        var arae1 = $(this).attr("arae1");
        var leftpx1 = parseInt($("#prpr_po").css("left"));
        if (arae1 == 'left1') {
            leftpx1 += 230;
        } else {
            leftpx1 -= 230;
        }
        if ((leftpx1 < (-230 * 2))) {
            leftpx1 = 0;
        }

        if (leftpx1 > 0) {
            leftpx1 = (-230 * 2);
        }
        $("#prpr_po").animate({left: leftpx1 + "px"});

    });
</script>
<script>
    $("#cur_k1").click(function() {
        var qarae = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if (qarae == 'lee') {
            leftpx = 0;
        } else {
            leftpx = leftpx - 730;
        }
        $("#prin_pp").animate({left: leftpx + "px"});
        $(this).css("background", "#db3652");
        $("#cur_k2").css("background", "#b7b7b7");
        $("#cur_k3").css("background", "#b7b7b7");
    });
    $("#cur_k2").click(function() {
        var warae = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if (warae == 'lel') {
            leftpx = -730;
        } else {
            leftpx = leftpx + 730;
        }
        $("#prin_pp").animate({left: leftpx + "px"});
        $(this).css("background", "#db3652");
        $("#cur_k1").css("background", "#b7b7b7");
        $("#cur_k3").css("background", "#b7b7b7");
    });
    $("#cur_k3").click(function() {
        var earae = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if (earae == 'lcc') {
            leftpx = -1460;
        } else {
            leftpx = leftpx + 730;
        }
        $("#prin_pp").animate({left: leftpx + "px"});
        $(this).css("background", "#db3652");
        $("#cur_k1").css("background", "#b7b7b7");
        $("#cur_k2").css("background", "#b7b7b7");

    });
</script>