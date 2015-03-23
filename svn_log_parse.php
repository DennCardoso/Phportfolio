<?php

$svn_log_xml = simplexml_load_file(dirname(__FILE__).'/resources/svn_log.xml');

foreach($svn_log_xml->logentry as $logentry){
    $revision = $logentry['revision'];
    $author = $logentry->author;
    $date = date('m/d/Y', strtotime((string)$logentry->date));
    foreach($logentry->paths as $paths){
        $action = $paths->path['action'];
        $kind = $paths->path['kind'];
        $file = $paths->path;
    }
    $msg = $logentry->msg;
    
    echo "Revision: $revision</br>Author: $author</br>Date: $date</br>Action: $action</br>Kind: $kind</br>Path: $file</br>Message: $msg</br></br>";
}

?>
