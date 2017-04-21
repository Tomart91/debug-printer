<?php

namespace DebugPrinter;

class PhpPrinter {

	public $file = '';
	public $countLineToDisplay = 20;
	public $line = 0;
	public $content = '';
	public static $phpAtributes = ['catch', 'public', 'try', 'if', 'else', 'switch', 'case', 
		'static', 'return', 'exit', 'class', 'namespace', 'function', 'new', 'self', 'isset', 'false', 'true', 'empty', 'for', 'foreach', 'instanceof'];
	public static function getInstance($file) {
		$instance = new self();
		$instance->file = $file;
		$instance->content = file_get_contents($file);
		return $instance;
	}

	public function setLine($numberLine) {
		$this->line = $numberLine;
	}

	public function getLine($line) {
		$code = $this->content;
		$code = explode("\n", $code);
		if (!isset($code[$line]))
			return false;
		return [
			'numberLine' => $line + 1,
			'contentLine' => $this->parseLine($code[$line])
		];
	}

	public function parseLine($content) {
		$content = htmlspecialchars($content);
		$content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', nl2br($content));
		if (empty($content)) {
			$content = '&nbsp;';
		}
		$content = preg_replace_callback('/\\$[\w]+/', function($matches) {
			return '<span class="variable">' . $matches[0] . '</span>';
		}, $content);

		$content = preg_replace_callback('/\\\'[\w\/\.]+/', function($matches) {
			return '<span class="string">' . $matches[0] . '</span>';
		}, $content);
		foreach (self::$phpAtributes as $attribute) {
			$content = preg_replace_callback('/' . $attribute . '\\s/', function($matches) {
				return '<span class="phpAtributes">' . $matches[0] . '</span>';
			}, $content);
		}
		return $content;
	}

	public function getCode() {
		$result = [];
		$startLine = (int) ($this->line - $this->countLineToDisplay / 2);
		if ($startLine < 0) {
			$startLine = 0;
		}
		for ($line = $startLine; $line <= $startLine + $this->countLineToDisplay; $line++) {
			$htmlLine = $this->getLine($line);
			if ($htmlLine !== false)
				$result [] = $htmlLine;
		}
		return $result;
	}

}
