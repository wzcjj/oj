<?php
    $pid = $_GET['current_dir'];
    $current_dir = "/home/judge/data/".$pid."/";
    $filename = $_GET['filename'];
    //$filename = remove_special_chars($filename);
    $file = $current_dir.$filename;
    if(file_exists($file)){
        $is_denied = false;
        /*foreach($download_ext_filter as $key=>$ext){
            if (preg_match($ext,$filename)){
                $is_denied = true;
                break;
            }
        }*/
        if (!$is_denied){
            $size = filesize($file);
            header("Content-Type: application/save");
            header("Content-Length: $size");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Transfer-Encoding: binary");
            if ($fh = fopen("$file", "rb")){
                fpassthru($fh);
                fclose($fh);
            } //else alert(et('ReadDenied').": ".$file);
        } else echo 'ReadDenied';//else alert(et('ReadDenied').": ".$file);
    } else echo 'FileNotFound';//else alert(et('FileNotFound').": ".$file);
?>
