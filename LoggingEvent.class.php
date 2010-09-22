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

/**
 * An instance of this class represents a single logger's event.
 * 
 * @author Yervand Aghababyan
 *
 */
class LoggingEvent {
	
	/**
	 * The logger object which recorded the event
	 * @var EasyLogger
	 */
	private $logger;
	
	/**
	 * Timestampt of when the event occured
	 * 
	 * @var int
	 */
	private $timestamp;
	
	/**
	 * Level of the occured event.
	 * 
	 * @var int
	 */
	private $level;
	
	/**
	 * Message of the event
	 * @var string
	 */
	private $msg;
	
	/**
	 * Class Constructor
	 * 
	 * @param Logger $logger
	 * @param int $level
	 * @param int $timestamp
	 * @param string $msg
	 */
	public function __construct(Logger $logger, $level, $timestamp, $msg) {
		$this->logger 		= $logger;
		$this->level 		= $level;
		$this->timestamp 	= $timestamp;
		$this->msg 		= $msg;
		
	}
	
	/**
	 * Return's the logger which recorded this event
	 * 
	 * @return EasyLogger
	 */
	public function getLogger() {
		return $this->logger;
	}

	/**
	 * Timestampt of when the event occured
	 * 
	 * @return int
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * Level of the occured event
	 * 
	 * @return int
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Level of the occured event
	 * 
	 * @return string
	 */
	public function getLevelStr() {
		return Logger::$this->level;
	}

	/**
	 * Message of the occired event
	 * 
	 * @return string $msg
	 */
	public function getMsg() {
		return $this->msg;
	}

}


?>