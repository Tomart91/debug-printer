<?php

namespace BacktracePrinter;

class Renderer {
	static $dir = __DIR__;
	public $valueArray = [];

	public static function getInstance() {
		$instance = new self();
		return $instance;
	}

	public function render($file) {
		require self::$dir . '/view/' . $file;
	}

	public function assign($key, $value) {
		$this->valueArray[$key] = $value;
	}

	public function get($key){
		return $this->valueArray[$key];
	}
}
