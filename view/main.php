<style>
	.header{
		background: #ddd;
	}
	.callStackContainer li{
		list-style: none;
	}
	.element{
		padding: 15px;
		float:left;
		font-size: 16px;
		color: #666;
		cursor: pointer;
	}
	.element:hover{
		background: #fdffe7;
	}
	.phpCode{
		font-size: 12px;
	}
	.phpCode .line:hover{
		background: #e4f4ff;
	}
	.phpCode .markLine{
		background: #ffe4e4;
	}
	.fileName{
		color: #999;
	}
	.variable{
		color: #9c2424;
	}
	.string{
		color: #16b115;
	}
	.phpAtributes{
		color: #2900ff;
	}
</style>
<div class="col-xs-12 header">
	
</div>
<div class="col-xs-12 callStackContainer">
	<ul>
		<?php foreach ($this->get('TRACE') as $no => $callStack) { ?>
			<li>
				<div class="element col-xs-12">
					<span class="col-xs-1"><?php echo $no; ?></span>
					<span class="col-xs-9"><span class="fileName"><?php echo $callStack->getFileName(); ?></span> &nbsp;-&nbsp;<?php echo $callStack->getLineDescription(); ?> </span>
					<span class="col-xs-2">at line &nbsp;<?php echo $callStack->getLine(); ?></span>
				</div>
				<div class="col-xs-12 phpCode hide">
					<div class="col-xs-6">
						<?php foreach ($callStack->getPhpCode() as $line) { ?>
							<div class="col-xs-12 line">
								<div class="col-xs-1 <?php if ($callStack->getLine() == $line['numberLine']) echo 'markLine'; ?>">
									<?php echo $line['numberLine']; ?> 
								</div>
								<div class="col-xs-11 <?php if ($callStack->getLine() == $line['numberLine']) echo 'markLine'; ?>">
									<?php echo $line['contentLine']; ?> 
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>
<script src="/libraries/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function () {
		$('.element').click(function(e){
			var currentTarget = $(e.currentTarget);
			var phpCode = currentTarget.next();
			phpCode.toggleClass('hide');
		})
	});
</script>