<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


interface Appender {



    /**
     * @param $logLevel String
     * @param $msg String
     */
    public function appendLog($loggerName, $logLevel, $msg);
}

?>
