<style>
	.headerError{
		background: #f3f3f3;
		height: 80px;
		padding-top: 20px;
		border-radius: 5px;
		border: 1px solid #f9f9f9;
	}
	.headerError .className{
		color: #ff0000;
		font-size: 25px;
	}
	.headerError .message{
		color: #ff0021;
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
		<span class="col-xs-12 message"><b>Fatal Error:</b> <?php echo $this->get('MESSAGE') ?></span>
	</div>

</div>
