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

class XmlAppender implements Appender {

    /**
     *
     * @var \DOMElement
     */
    private $rootElement;

    public function __construct(\DOMElement $rootElement) {
	$this->rootElement = $rootElement;
    }

    public function getName() {
	return get_class($this);
    }

    public static function proxyLogXmlToAppender(\DOMElement $xmlNode, Appender $a) {
	$logNodes = $xmlNode->childNodes;

	$count = $logNodes->length;
	for($i = 0; $i < $count; $i++ ) {
	    $node = $logNodes->item($i);

	    $e = new LoggingEvent(Logger::getLogger(
		    $node->getAttribute('logger')),
		    $node->getAttribute('level'),
		    \strtotime($node->getAttribute('time')),
		    $node->nodeValue);
	    $a->doAppend($e);
	}
    }

    /**
     * @param $logLevel String
     * @param $msg String
     */
    public function doAppend(LoggingEvent $e) {
    	$loggerName	= $e->getLogger()->getName();
    	$logLevelStr	= $e->getLevelStr();
    	$msg		= $e->getMsg();
    	$logTimestamp	= $e->getTimestamp();

	$newEntry = $this->rootElement->ownerDocument->createElement('entry');
	$newEntry->setAttribute('logger', $loggerName);
	$newEntry->setAttribute('level', $level);
	$newEntry->setAttribute('time', date('Y-m-d H:i:s', $logTimestamp));

	$entryValue = $this->rootElement->ownerDocument->createCDATASection($msg);
	$newEntry->appendChild($entryValue);

	$this->rootElement->appendChild($newEntry);
    }
}
?>
