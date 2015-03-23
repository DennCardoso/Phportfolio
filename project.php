<?php

/**
 * Description of newPHPClass
 *
 * @author denniscardoso
 */
	class project{
		var $name;
		var $revision;
		var $date;
		var $msg;
		var $files;
		var $author;

		function __construct($name, $revision, $date, $msg, $author){
			$this->name = $name;
			$this->revision = $revision;
			$this->date = $date;
			$this->msg = $msg;
			$this->files = array();
			$this->author = $author;
		}
	}


