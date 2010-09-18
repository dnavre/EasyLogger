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

/**
 *
 * @param String $msg
 */
function trace($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_TRACE, $msg);
}

/**
 *
 * @param String $msg
 */
function debug($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_DEBUG, $msg);
}

/**
 *
 * @param String $msg
 */
function info($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_INFO, $msg);
}

/**
 *
 * @param String $msg
 */
function warn($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_WARN, $msg);
}

/**
 *
 * @param String $msg
 */
function error($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_ERROR, $msg);
}

/**
 *
 * @param String $msg
 */
function fatal($msg, $loggerName = null) {
    EasyLogger::getLogger($loggerName)->log(EasyLogger::LOG_LEVEL_FATAL, $msg);
}

?>
