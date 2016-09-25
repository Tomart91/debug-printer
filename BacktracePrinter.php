<?php

namespace BacktracePrinter;

class BacktracePrinter {

	static public function renderBackTrace() {
		$trace = CallStack::getInstanceByBacktrace(debug_backtrace());
		$viewer = Renderer::getInstance();
		$viewer->assign('TRACE', $trace);
		$viewer->render('main.php');
	}

}
