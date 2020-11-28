<?php

include ("config/includes.php");
//$name = $_POST['fname'];
$str = $_POST['str'];
$added=$_POST['added'];

$mysqli = ConnectDB();


if (!$res=$mysqli->query(getSelectFindTags($str))) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
else
CreateTableSQLTagsForAddPostRat($res,$added);



?>