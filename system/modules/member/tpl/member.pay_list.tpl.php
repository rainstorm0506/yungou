<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar-blue.css" type="text/css"> 
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/calendar/calendar.js"></script>
<style>
tbody tr{ line-height:30px; height:30px;} 
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>


<div class="header-data lr10">
<div style="margin-bottom:5px;">搜索的总消费金额：<span style="color:red;font-weight:bold;"><?php echo $summoeny['sum_money'];?>元</span></div>
<form action="" method="post">
 时间搜索: <input name="posttime1" type="text" id="posttime1" class="input-text posttime"  readonly="readonly" value="<?php echo !empty($posttime1)?date("Y-m-d H:i:s",$posttime1):''?>"/> -  
 		  <input name="posttime2" type="text" id="posttime2" class="input-text posttime"  readonly="readonly" value="<?php echo !empty($posttime2)?date("Y-m-d H:i:s",$posttime2):''?>"/>
			<script type="text/javascript">
					date = new Date();
					Calendar.setup({
								inputField     :    "posttime1",
								ifFormat       :    "%Y-%m-%d %H:%M:%S",
								showsTime      :    true,
								timeFormat     :    "24"
					});
					Calendar.setup({
								inputField     :    "posttime2",
								ifFormat       :    "%Y-%m-%d %H:%M:%S",
								showsTime      :    true,
								timeFormat     :    "24"
					});
							
			</script>

			<select name="yonghu">
			<option value="请选择用户类型" 
			<?php 
				if(isset($yonghu)){
					echo ($yonghu=='请选择用户类型')?'selected':'';
				}
			?>
			>请选择用户类型</option>
			<option value="用户id" 
			<?php 
				if(isset($yonghu)){
					echo ($yonghu=='用户id')?'selected':'';
				}
			?>
			>用户id</option>
			<option value="用户名称" 
			<?php 
				if(isset($yonghu)){
					echo ($yonghu=='用户名称')?'selected':'';
				}
			?>
			>用户名称</option>
			<option value="用户邮箱" 
			<?php 
				if(isset($yonghu)){
					echo ($yonghu=='用户邮箱')?'selected':'';
				}
			?>
			>用户邮箱</option>
			<option value="用户手机" 
			<?php 
				if(isset($yonghu)){
					echo ($yonghu=='用户手机')?'selected':'';
				}
			?>
			>用户手机</option>
			</select>
			<input type="text" name="yonghuzhi" class="input-text wid100" value="<?php echo !empty($yonghuzhi)?$yonghuzhi:''; ?>"/>
			<input class="button" type="submit" name="sososubmit" value="搜索">
</form>
</div>


<div class="table-list lr10">
<!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">用户名</th>
            <th width="100px" align="center">商品名称</th>
            <th width="100px" align="center">商品期数</th>
            <th width="100px" align="center">云购次数</th>
            <th width="100px" align="center">消费金额</th>
            <th width="100px" align="center">时间</th>  
		</tr>
    </thead>
    <tbody>
    	<?php 
		for($j=0;$j<count($pay_list);$j++){
		?>
		<tr>
			<td align="center">
				<?php  echo $members[$j];?>
			</td>
			<td align="center"><?php echo $pay_list[$j]['shopname']; ?></td>	
			<td align="center"><?php echo $pay_list[$j]['shopqishu']; ?></td>	
			<td align="center"><?php echo $pay_list[$j]['gonumber']; ?></td>	
			<td align="center"><?php echo $pay_list[$j]['moneycount']; ?></td>	
			<td align="center"><?php echo date("Y-m-d H:i:s",$pay_list[$j]['time']); ?></td>	   	
		</tr>
       <?php }  ?>
	
  	</tbody>
	
</table>
</div><!--table-list end-->
<div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>
<script>
</script>
</body>
</html> 