<style>
	.headerError{
		background: #eaeaea;
		height: 150px;
		padding-top: 20px;
		border-radius: 5px;
		border: 1px solid #e9e9e9;
	}
	.headerError .className{
		color: #ff0000;
		font-size: 25px;
	}
	.headerError .message{
		color: #2217c1;
		font-size: 25px;
	}
	.headerError .code{
		color: #ff0000;
		font-size: 25px;
	}
	.headerError .iconWarn{
		background: #ddd;
		padding: 20px;
		color: #ff0000;
		font-size: 63px;
		border-radius: 15px;
	}

</style>
<div class="col-xs-12 headerError">
	<div class="col-xs-10">
		<span class="col-xs-12 className"><b>Class:</b> <?php echo $this->get('CLASS_NAME') ?></span>
		<span class="col-xs-12 message"><b>Message:</b> <?php echo $this->get('MESSAGE') ?></span>
		<span class="col-xs-12 code"><b>Code:</b> <?php echo $this->get('CODE') ?></span>
	</div>
	<div class="col-xs-2">
		<span class="pull-right glyphicon glyphicon-warning-sign iconWarn"></span>
	</div>

</div>
