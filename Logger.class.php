<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define ( 'SIMPLE_LOGGER_PATH', dirname ( __FILE__ ) );

require_once SIMPLE_LOGGER_PATH . '/Appender.interface.php';
require_once SIMPLE_LOGGER_PATH . '/funcs.php';
require_once SIMPLE_LOGGER_PATH . '/appenders/EchoAppender.class.php';

class Logger {
	
	const LOG_LEVEL_DEBUG = 3;
	const LOG_LEVEL_INFO = 6;
	const LOG_LEVEL_WARN = 9;
	const LOG_LEVEL_ERROR = 12;
	const LOG_LEVEL_FATAL = 15;
	
	const DEFAULT_LOGGER_NAME = 'MAIN';
	
	/**
	 * An array of instances of
	 * @var array
	 */
	private static $loggers = array ();
	
	/**
	 * A list of appenders log messages would be added to
	 * @var array
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
		$logType = self::getLogLevelName ( $logLevel );
		
		foreach ( $this->appenders as $appender ) {
			$appender->appendLog ( $this->getName (), $logType, $msg );
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
				$logLevel = 'DEBUG';
				break;
			case 6 :
				$logLevel = 'INFO';
				break;
			case 9 :
				$logLevel = 'WARN';
				break;
			case 12 :
				$logLevel = 'ERROR';
				break;
			case 15 :
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
