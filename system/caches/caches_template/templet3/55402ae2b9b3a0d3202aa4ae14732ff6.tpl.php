<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="subnav">
	<ul>
		<?php if($tab=="uname"): ?>
		<li class="poa-4"><a class="cur">TA的主页<s></s></a></li>
		<?php  else: ?>
		<li class="poa-4"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($member['uid']); ?>" >TA的主页<s></s></a></li>
		<?php endif; ?>
		
		<?php if($tab=="userbuy"): ?>
		<li class="poa-4"><a class="cur">云购记录<s></s></a></li>
		<?php  else: ?>
		<li class="poa-4"><a href="<?php echo WEB_PATH; ?>/userbuy/<?php echo idjia($member['uid']); ?>" >云购记录<s></s></a></li>
		<?php endif; ?>
		
		<?php if($tab=="userraffle"): ?>
		<li class="poa-4"><a class="cur">获得的商品<s></s></a></li>
		<?php  else: ?>
		<li class="poa-4"><a href="<?php echo WEB_PATH; ?>/userraffle/<?php echo idjia($member['uid']); ?>" >获得的商品<s></s></a></li>
		<?php endif; ?>
		
		<!-- <?php if($tab=="userpost"): ?>
		<li class="poa-2"><a class="cur">晒单<s></s></a></li>
		<?php  else: ?>
		<li class="poa-2"><a href="<?php echo WEB_PATH; ?>/userpost/<?php echo idjia($member['uid']); ?>" >晒单<s></s></a></li>
		 -->
		<?php endif; ?>
		<!-- <li class="poa-4"><a href="http://u.1yyg.com/1000293094/UserBuy">云购记录<s></s></a></li>
		<li class="poa-4"><a class="cur">获得的商品<s></s></a></li>
		<li class="poa-2"><a href="http://u.1yyg.com/1000293094/UserPost">晒单<s></s></a></li> -->
	</ul></div>
