<?php
//echo "ajax_3";
include ("config/includes.php");
//$name = $_POST['fname'];
$str = $_POST['str'];



function getSelectFindWorker($str){
    $result="Select  post_rat.id as id, id_user, name_post, short_text, long_text, data_create, img FROM post_rat inner join tags_for_post_rat on  post_rat.id=tags_for_post_rat.id_post_rat
    inner join tags on tags_for_post_rat.id_tag=tags.id
    WHERE ";
    $arrayStr=explode(" ",$str);
    $i=0;
    foreach ($arrayStr as $value){
        if($i!=0) $result.="AND ";
        $result.="tags.name like '%$value%' ";
        $i++;
    }
    $result.="
    group by post_rat.id
    order by  post_rat.data_create desc;";

    return $result;
}

$mysqli = ConnectDB();

if (!$res=$mysqli->query(getSelectFindWorker($str))) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
while($row = $res->fetch_assoc()) {
    echo "

    <div class=\"row form-control\" style=\"min-height: 200px; \"> 
        <div class='col-md-3'>
            <br>
            <a href='$domain/post_all.php?id=$row[id]'><img src=\"$row[img]\" class=\"img-fluid img-thumbnail\" alt=\"...\"></a>
            <br>
        </div>
        <div class='col-md-4'>
            <div class='row'>
                <div class='col'>
                    <br>
                    <a class=\"nav-link link text-black display-4\" href=\"$domain/post_all.php?id=$row[id]\"><h4>$row[name_post]</h4></a>   
                </div>
            </div>
            <div class='row'>
                <div class='col'>
            ";
    //<span class=\"badge badge-pill badge-primary\">Жилищная</span>
    $mysqli2 = ConnectDB();

    if (!$res2=$mysqli2->query("Call GetTagsFromPostRat('$row[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
    }
    while($row2 = $res2->fetch_assoc()) {
        echo "<span class=\"badge badge-pill badge-primary\">$row2[name]</span>";
    }


    echo " </div>
            </div>
        </div>
        <div class='col-md-5'>
            <div class='row' style='min-height: 150px;'>
                <div class='col-md-6 text-justify'>
                    <br>
                    <h3>Описание:</h3>
                    <br>
                    $row[short_text];                           
                </div>
                <div class='col-md-6 text-justify'>
                    <br>
                    <p>Дата создания: <br>$row[data_create]</p>                          
                </div>
            </div>
            <div class='row justify-content-end'>
                <div class='col-6 '>
                    <a href='$domain/post_all.php?id=$row[id]' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                </div>
            </div>
        </div>
    </div>
    <br>
";
}

?>