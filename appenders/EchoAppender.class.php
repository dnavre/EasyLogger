<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EchoAppender implements Appender {

    /**
     * @param $logLevel String
     * @param $msg String
     */
    public function appendLog($loggerName, $logLevel, $msg) {
	echo date('Y-m-d H:i:s') . " $loggerName:$logLevel\t- $msg\n";
    }
}
?>
