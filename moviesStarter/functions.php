<?php

function getDir ( $movie ) {

    $dir = opendir( $movie );
    $files = false;
    
    if ( $dir ) {
        
        while ( ( $file = readdir($dir) ) !== false ) {
            
            if ( $file != "." && $file != ".." && preg_match("/png/", $file) != 1 ) {
                
                if ( preg_match("/info/", $file) == 1 ) {
                    $files["info"] = $file;
                    
                }else if ( preg_match("/overview/", $file) == 1 ) {
                    
                    $files["overview"] = $file;
                    
                }else {
                    $files["reviews"][] = $file;
                }
                
            }
        }
        
        closedir($dir);
        
    }
    
    return $files;
    
}

function setInfo ( $folder, $file ) {
    
    $contents = false;
    
    if ( isset($file) ) {
        
        $path = $folder . "/" . $file;
        $contents = file( $path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
        
    }
    
    
    return $contents;
    
}

function setOverview ( $folder, $file ) {
    
    $parsedContent = false;
    
    if ( isset($file) ) {
        
        $path = $folder . "/" . $file;
        $parsedContent;
        
        $contents = file( $path, FILE_SKIP_EMPTY_LINES );
        
        foreach ( $contents as $line ) {
            
            $temp = explode( ':', $line );
            $parsedContent[$temp[0]] = $temp[1];
            
        }
        
    }
    return $parsedContent;
    
}

function setReviews ( $folder, $files ) {
    
    $reviews;
    
    foreach ( $files as $file ) {
        
        $path = $folder . "/" . $file;
        
        $contents = file( $path, FILE_SKIP_EMPTY_LINES );
        $reviews[] = $contents;
        
    }
    
    return $reviews;
    
}
?>
