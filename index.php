<!DOCTYPE html>
<html>
<head>
	<title>Список дел</title>
	<link rel='stylesheet' type='text/css' href='css/main.css'/>
</head>
<body>

	<div class="container">
		<div class="tasks-wrap">
		<?php

			$file = file_get_contents('data/data.json');

			if($file != false) {

                $arr = json_decode($file,true);

                if($arr != false && $arr != NULL) {
    
                	$length = count($arr);
            	
                	if($length > 0) {
                		for($i = 0;$i < $length;$i++) {
                			if($arr[$i]['done'] == false) {
                			    echo "<div class='tasks'>".($i+1).". <div class='tasks-text-wrap'>".$arr[$i]['text']."</div><a class='mark-btn' href='php/mark.php?id=".$arr[$i]['id']."'></a><a class='delete-btn' href='php/delete.php?id=".$arr[$i]['id']."'></a></div>";
                		    } else {
                		    	echo "<div class='tasks'>".($i+1).". <div class='tasks-text-wrap'>".$arr[$i]['text']."</div><div class='marked-btn'></div><a class='delete-btn' href='php/delete.php?id=".$arr[$i]['id']."'></a></div>";
                		    }
                		}
                	} else {
                		echo "У вас пока нет ни одной записи.";
                	}
                } else {
                	echo "Can not decode json!";
                }
            } else {
            	echo "Can not read file!";
            }
        ?>
        </div>
        <form class="send-form-wrap" method="POST" action="php/add.php">
        	<textarea class="send-textarea" placeholder="Напишите дело..." type="textarea" name="add_text"></textarea>
        	<input class="send-btn" type="submit" value="Добавить"/>
        </form>
	</div>

</body>
</html>