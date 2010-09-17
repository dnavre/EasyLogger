<?php
/* 
 * Contains a list of easy to use functions for
 * calling the logger class
 * 
 */

/**
 *
 * @param String $msg
 */
function debug($msg, $loggerName = null) {
    Logger::getLogger($loggerName)->log(Logger::LOG_LEVEL_DEBUG, $msg);
}

/**
 *
 * @param String $msg
 */
function info($msg, $loggerName = null) {
    Logger::getLogger($loggerName)->log(Logger::LOG_LEVEL_INFO, $msg);
}

/**
 *
 * @param String $msg
 */
function warn($msg, $loggerName = null) {
    Logger::getLogger($loggerName)->log(Logger::LOG_LEVEL_WARN, $msg);
}

/**
 *
 * @param String $msg
 */
function error($msg, $loggerName = null) {
    Logger::getLogger($loggerName)->log(Logger::LOG_LEVEL_ERROR, $msg);
}

/**
 *
 * @param String $msg
 */
function fatal($msg, $loggerName = null) {
    Logger::getLogger($loggerName)->log(Logger::LOG_LEVEL_FATAL, $msg);
}

?>
