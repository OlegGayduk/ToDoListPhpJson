<?php

if(isset($_POST['add_text'])) {
    
	$text = htmlspecialchars($_POST['add_text']);

	if($text != "") {

        $file = file_get_contents("../data/data.json");

        if($file != false) {

        	$arr = json_decode($file,true);
            
            if($arr != false && $arr != NULL) {

            	$length = count($arr);

            	if($length == 0) {
            		$id = 1;
            	} else {
            		$id = $arr[($length-1)]['id'] + 1;
            	}
                 
                array_push($arr, array('id' => $id, 'text' => $text, 'done' => false));

                $arr = json_encode($arr);

                if($arr != false) {

                    $res = file_put_contents("../data/data.json", $arr);

                    if($res != false) {
                    	header('Location: ../index.php');
                    } else {
                    	echo "Can not write file!";
                    }
                } else {
                	echo "Can not encode json!";
                }
            } else {
            	echo "Can not decode json!";
            }
        } else {
        	echo "Can not read file!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}
?>