<?php
/* 
 * 
 * Copyright (c) 2010 Yervand Aghababyan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 */

namespace easyLogger;

define ( 'SIMPLE_LOGGER_PATH', dirname ( __FILE__ ) );

require_once SIMPLE_LOGGER_PATH . '/LoggingEvent.class.php';
require_once SIMPLE_LOGGER_PATH . '/Appender.interface.php';
require_once SIMPLE_LOGGER_PATH . '/shortLogFunctions.php';
require_once SIMPLE_LOGGER_PATH . '/appenders/EchoAppender.class.php';

/**
 * 
 * @author Yervand Aghababyan
 *
 */
class Logger {
	
	const LOG_LEVEL_TRACE 	= 3;
	const LOG_LEVEL_DEBUG 	= 6;
	const LOG_LEVEL_INFO 	= 9;
	const LOG_LEVEL_WARN 	= 12;
	const LOG_LEVEL_ERROR 	= 15;
	const LOG_LEVEL_FATAL 	= 18;
	
	const DEFAULT_LOGGER_NAME = 'MAIN';
	
	/**
	 * An array of instances of
	 * @var array
	 */
	private static $loggers = array ();
	
	/**
	 * A list of appenders log messages would be added to
	 * @var array(Appender)
	 */
	private $appenders = array ();
	
	/**
	 * Name of the current logger.
	 * 
	 * @var String
	 */
	private $name;
	
	/**
	 * Class constructor
	 *
	 * @param String $name
	 */
	private function __construct($name) {
		$this->name = $name;
		
		$this->addAppender ( new EchoAppender () );
	}
	
	/**
	 *
	 * @return String
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 *
	 * @param Appender $appender
	 * @param bool $removePreviouslyAdded if true removes all previously added appenders
	 */
	public function addAppender(Appender $appender, $removePreviouslyAdded = false) {
		
		if ($removePreviouslyAdded) {
			$this->appenders = array ();
		}
		
		$this->appenders [] = $appender;
	}
	
	/**
	 *
	 * @param int $logLevel
	 * @param String $msg
	 */
	public function log($logLevel, $msg) {
		$logLevelInt = self::getLogLevelName ( $logLevel );
		$logTime = time();
		
		foreach ( $this->appenders as $appender ) {
			$e = new LoggingEvent($this, $logLevelInt, $logTime, $msg);
			$appender->doAppend($e);
		}
	}
	
	/**
	 *
	 * @param int $logTypeInt
	 * @return string Log type
	 */
	private static function getLogLevelName($logLevelInt) {
		$logLevel = null;
		switch ($logLevelInt) {
			case 3 :
				$logLevel = 'TRACE';
				break;
			case 6 :
				$logLevel = 'DEBUG';
				break;
			case 9 :
				$logLevel = 'INFO';
				break;
			case 12 :
				$logLevel = 'WARN';
				break;
			case 15 :
				$logLevel = 'ERROR';
				break;
			case 18 :
				$logLevel = 'FATAL';
				break;
			default :
				$logLevel = 'FATAL';
		}
		
		return $logLevel;
	}
	
	/**
	 *
	 * @return Logger
	 */
	public static function getLogger($loggerName = null) {
		
		if (is_null ( $loggerName )) {
			$loggerName = self::DEFAULT_LOGGER_NAME;
		}
		
		if (! isset ( self::$loggers [$loggerName] )) {
			self::$loggers [$loggerName] = new Logger ( $loggerName );
		}
		
		return self::$loggers [$loggerName];
	}
}

?>
