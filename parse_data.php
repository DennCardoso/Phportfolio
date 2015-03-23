 <?php

require ('project.php');
require ('file.php');
 
$svn_list_xml = simplexml_load_file(dirname(__FILE__).'/resources/svn_list.xml');
$svn_log_xml = simplexml_load_file(dirname(__FILE__).'/resources/svn_log.xml');

$list = $svn_list_xml->list;

//Read SVN_list information from XML and insert into Objects 
$num = 0;
$project_array = array();
$file_array = array();

foreach ($list->entry as $entry)
{
     $kind = $entry['kind'];
     $path = $entry->name;
     $revision = $entry->commit['revision'];
     $author = $entry->commit->author;
     $date = date('m/d/Y', strtotime((string)$entry->commit->date));
     $msg = "";
     $name_array = explode("/",$path);
    
     if ($kind == 'dir') {
        $size = $entry->size;
        echo "$size<br>";
     }
     
     foreach ($svn_log_xml->logentry as $logentry) { // look for the messages ***not working
         //echo "</br>check: ";
         //print $logentry['revision'];
        
            if($logentry['revision'] == $revision){
			echo '***MATCH***';
			$msg = $log_item->msg;
			break;
		}
     }
     
     //echo "kind: $kind<br> Path: $path<br> Revision: $revision<br> author: $author<br> date: $date<br> Massage: $msg</br>"; 
     //echo "<br>";
     
     if($kind == "dir"){
        if (sizeof($name_array) == 1){ //
            $name = $path;
            $project = new project($name, $revision, $date, $msg, $author);
            array_push($project_array, $project);
            //echo "okay $revision</br>";   
        } else {
            $name = $name_array[sizeof($name_array)-1];
            $file = null;
            $type_array = explode(".",$name);
            
            if(sizeof($type_array) > 1){
	    		$type = '.' . $type_array[sizeof($type_array)-1];
	    	} else {
	    		$type = "";
	    	}
            
            $file = new file ($name, $kind, $size, $revision, $author, $date, $type, $path, $file, $msg);
            array_push($file_array, $file);
        }
     }     
}

foreach ($file_array as $file)
{
    $name_array = explode("/",$file->path);
    foreach($project_array as $project){
        if($project->name == $name_array[0]){
            array_push($project->files,$file);
        }
    }
}
