<?php defined('IN_IA') or exit('Access Denied');?>
<style>
	.red{
		color: red;
	}
</style>
<input type="hidden" name="fid" value="<?php  echo $reply['id'];?>" />

<div class="panel panel-default">
	<div class="panel-heading">
		基本设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="title" class="form-control span7"
					   placeholder="" name="title" value="<?php  echo $reply['title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>关注链接图文链接：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="follow_url" class="form-control span7"
					   placeholder="" name="follow_url" value="<?php  echo $reply['follow_url'];?>">
			</div>
		</div>






	</div>

	</div>







<div class="panel panel-default">
	<div class="panel-heading">
		图文设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="new_title" class="form-control span7" placeholder="" name="new_title" value="<?php  echo $reply['new_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文 图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('new_icon',$reply['new_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="new_content"
					  class="form-control span7" cols="60"><?php  echo $reply['new_content'];?></textarea>
			</div>
		</div>


		</div>
	</div>


<div class="panel panel-default">
	<div class="panel-heading">
		分享设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="share_title" class="form-control span7" placeholder="" name="share_title" value="<?php  echo $reply['share_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享 图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('share_icon',$reply['share_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="share_content"
					  class="form-control span7" cols="60"><?php  echo $reply['share_content'];?></textarea>
			</div>
		</div>


	</div>
</div>

