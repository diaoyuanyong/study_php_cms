<?php defined('IN_IA') or exit('Access Denied');?>			</div>
		</div>
	</div>
	<script>
		require(['bootstrap'], function($){
			$.post("<?php  echo url('utility/subscribe');?>");
			$.post("<?php  echo url('utility/sync');?>");
		});
	</script>
	<div class="container-fluid footer" role="footer">
		<div class="page-header"></div>
		<span class="pull-left">
			<p><a href="<?php  echo $core['url']['owner'];?>"><b><?php  echo $core['owner'];?></b></a> v<?php echo IMS_VERSION;?><a href="<?php  echo $core['url']['owner'];?>"><?php  echo $core['host'];?></a> <?php  echo $core['beian'];?></p>
		</span>
		<span class="pull-right">
			<p><a href="<?php  echo $core['url']['about'];?>"><?php  echo $core['owner'];?></a> &nbsp; &nbsp; <a href="<?php  echo $core['url']['help'];?>"><?php  echo $core['owner'];?></a></p>
		</span>
	</div>
</body>
</html>
