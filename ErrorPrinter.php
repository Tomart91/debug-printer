<?php

namespace DebugPrinter;

class ErrorPrinter {

	static public function renderError($message, $code, $className) {
		$viewer = Renderer::getInstance();
		$viewer->assign('MESSAGE', $message);
		$viewer->assign('CODE', $code);
		$viewer->assign('CLASS_NAME', $className);
		$viewer->render('error.php');
		BacktracePrinter::renderBackTrace();
	}

}
