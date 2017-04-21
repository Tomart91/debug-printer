<?php

namespace DebugPrinter;

class BacktracePrinter {

	static public function renderBackTrace($message) {
		
		$backtrace = array_reverse(xdebug_get_function_stack());
		unset($backtrace[0]);
		unset($backtrace[2]);
		$backtrace[1] = $message;
		$trace = CallStack::getInstanceByBacktrace($backtrace);
		$viewer = Renderer::getInstance();
		$viewer->assign('TRACE', $trace);
		$viewer->render('main.php');
	}

}
