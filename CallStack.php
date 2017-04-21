<?php

namespace DebugPrinter;

class CallStack {

	public $trace = [];

	public static function getInstanceByBacktrace($trace) {
		$instances = [];
		foreach ($trace as $simpleTrace) {
			$instances [] = self::getInstance($simpleTrace);
		}
		return $instances;
	}

	public static function getInstance($simpleTrace) {
		$instance = new self();
		$instance->trace = $simpleTrace;
		return $instance;
	}

	public function getFileName() {
		return $this->trace['file'];
	}

	public function getLine() {
		return $this->trace['line'];
	}

	public function getLineDescription() {
		$description = '';
		if (isset($this->trace['class'])) {
			if($this->trace['type'] == 'dynamic') {
				$this->trace['type'] = '->';
			}
			if($this->trace['type'] == 'static') {
				$this->trace['type'] = '::';
			}
			$description = $this->trace['class'] . $this->trace['type'] . $this->trace['function'];
			$description .= '(';
			if (!empty($this->trace['args'])) {
				foreach ($this->trace['args'] as $arg) {
					if (gettype($arg) == 'object') {
						$description .= get_class($this->trace['args']);
					} else {
						$description .= "'$arg'";
					}
				}
			}
			$description .= ')';
		} else {
			
		}
		return $description;
	}

	public function getPhpCode() {
		
		$phpPrinter = PhpPrinter::getInstance($this->getFileName());
		$phpPrinter->setLine($this->getLine());
		return $phpPrinter->getCode();
	}

}
