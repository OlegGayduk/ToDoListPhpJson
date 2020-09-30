<?php

if(isset($_GET['id'])) {
    
	$id = htmlspecialchars($_GET['id']);

	if($id != "") {

        $file = file_get_contents("../data/data.json");

        if($file != false) {

        	$arr = json_decode($file,true);
            
            if($arr != false && $arr != NULL) {

            	for($i = 0;$i < count($arr);$i++) {
            		if($id == $arr[$i]['id']) $arr[$i]['done'] = true;
            	}
              
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
        	echo "Can not open file!";
        }
    } else {
    	header('Location: index.php');
    }
} else {
	echo "Error! Please try again!";
}

?>