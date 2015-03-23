<?php

/**
 * Description of File Class
 *
 * @author denniscardoso
 */

class file {
    var $name;
    var $size;
    var $revision;
    var $author;
    var $date;
    var $type;
    var $path;
    var $file;
    var $msg;
    var $kind;

    /**
        * Initializes an object for a file on SVN.
        *
        * @param $name
        * @param $kind
        * @param revision
        * @param author
        * @param date
        * @param size
        * @param type  
        * @param $path
        * @param msg
        * @param file
    */
    function __construct($name, $kind, $size, $revision, $author, $date, $type, $path, $file, $msg) {
        $this->name = $name;
        $this->kind = $kind;
        $this->revision = $revision;
        $this->author = $author;
        $this->date = $date;
        $this->size = $size;
        $this->type = $type;
        $this->path = $path;
        $this->msg = $msg;
        $this->file = $file;
    }
}
