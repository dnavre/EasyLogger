<?php 

require_once dirname ( __FILE__ ) . '/../Logger.class.php';


use easyLogger\Logger as Logger;

$xml = new DOMDocument();

$qaq = $xml->createElement("qaq");
$xml->appendChild($qaq);
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;

Logger::setDefaultAppender(new easyLogger\XmlAppender($qaq));

trace("Hellow World!");
info("Hellow World!");
warn("Hellow World!");
error("Hellow World!");
fatal("Hellow World!");

echo $xml->saveXML();
?>