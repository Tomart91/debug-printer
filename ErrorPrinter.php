<?php

namespace DebugPrinter;

class ErrorPrinter {

	static public function renderError($message, $code, $className) {
		var_dump($code);
		$viewer = Renderer::getInstance();
		$viewer->assign('MESSAGE', $message);
		$viewer->assign('CODE', $code);
		$viewer->assign('CLASS_NAME', $className);
		$viewer->render('error.php');
		BacktracePrinter::renderBackTrace();
	}

	static public function renderFatalError($message) {
		$viewer = Renderer::getInstance();
		$viewer->assign('MESSAGE', $message['message']);
		$viewer->render('error.php');
		BacktracePrinter::renderBackTrace($message);
	}
	public static function registerFatalError() {
		register_shutdown_function([__CLASS__, 'fatalError']);
	}
	public static function fatalError(){
		$lastError = error_get_last();
		if ($lastError['type'] === E_ERROR) {
			self::renderFatalError($lastError);
		}
	}

}
