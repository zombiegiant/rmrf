<?php
//echo "ajax_3";
include ("config/includes.php");
//$name = $_POST['fname'];

$mysqliStatus = ConnectDB();

if (!$resStatus=$mysqliStatus->query('Call GetStatusUsers()')) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliStatus->errno . ") " . $mysqliStatus->error;
}
$countStatus=0;
while($rowStatus[$countStatus] = $resStatus->fetch_assoc()) {

    $countStatus++;
}

$mysqliExpert = ConnectDB();

if (!$resExpert=$mysqliExpert->query('Call GetExpertsNames()')) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliExpert->errno . ") " . $mysqliExpert->error;
}
$countExpert=0;
while($rowExpert[$countExpert] = $resExpert->fetch_assoc()) {

    $countExpert++;
}


function getSelectFindUsers($str){
    $result="Select user.id as id, user.email as email, user.first_name as first_name, user.middle_name as middle_name, user.last_name as last_name,
user.number as number, status_user.name as status_user
 
 From user 
inner join status_user on status_user.id=user.id_status_user
    WHERE ";
    $arrayStr=explode(" ",$str);
    $i=0;
    foreach ($arrayStr as $value){
        if($i!=0) $result.="AND ";
        $result.="user.email like '%$value%' or user.first_name like '%$value%' or user.middle_name like '%$value%' or user.last_name like '%$value%' or
user.number like '%$value%' or status_user.name  like '%$value%' ";
        $i++;
    }

    return $result;
}

function getSelectFindExpert($str){
    $result="Select user.id as id, user.email as email, user.first_name as first_name, user.middle_name as middle_name, user.last_name as last_name,
user.number as number, expert.name as name_expert, expert.id as id_expert, status_user.name as status_user
 
 From user 
inner join expert on user.expert = expert.id  inner join status_user on status_user.id=user.id_status_user
    WHERE user.id_status_user=2 AND ( ";
    $arrayStr=explode(" ",$str);
    $i=0;
    foreach ($arrayStr as $value){
        if($i!=0) $result.="AND ";
        $result.="user.email like '%$value%' or user.first_name like '%$value%' or user.middle_name like '%$value%' or user.last_name like '%$value%' or
user.number like '%$value%' or expert.name  like '%$value%' ";
        $i++;
    }
    $result.=")";
    return $result;
}

if(isset($_POST['user'])){

    $mysqli = ConnectDB();

    if (!$res=$mysqli->query(getSelectFindUsers($_POST['user']))) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    while($row = $res->fetch_assoc()) {
       // echo "$row[first_name]<br>";

    echo "<form class='form-inline'  method='post' action='admin_cabinet.php'>
           <div class=\"row \"style='min-height: 150px;' >                        
                                        <div class=\" col-md-4 form-group \">
                                            <p class='form-control-plaintext'>$row[last_name] $row[first_name] $row[middle_name] <br>$row[email] <br> $row[number] <br> $row[status_user]</p> 
                                        </div>
                                        <div class=\" col-md-5 form-group\">
                                            <select size=\"2\" style='width: 100%; height: 90%;' name=\"UserRole\">";
                                               for($i=0; $i<$countStatus; $i++){
                                                   echo "<option value=\"".$rowStatus[$i]['id_status']."\">".$rowStatus[$i]['name_status']."</option>";

                                               }

    /* <option disabled>Выберите роль</option>
                                                <option value=\"Эксперт\">Эксперт</option>
                                                <option selected value=\"Участник\">Участник</option>
                                                <option value=\"Слесарь\">Слесарь</option>
                                                <option value=\"Сварщик\">Сварщик</option>*/
                                            echo "</select>
                                        </div>
                                        <div class='col-md-3  form-group'>  
                                         <input type='hidden' name='user_id' value='$row[id]'>      
                                         <input class='btn btn-primary' type='submit' name='updateUserStatus' value='Принять'>
                                        </div>
        </div>
        </form>";
}



}

if(isset($_POST['expert'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query(getSelectFindExpert($_POST['expert']))) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    while($row = $res->fetch_assoc()) {
        // echo "$row[first_name]<br>";

        echo "<form class='form-inline'  method='post' action='admin_cabinet.php'>
           <div class=\"row \"style='min-height: 150px;' >                        
                                        <div class=\" col-md-4 form-group \">
                                            <p class='form-control-plaintext'>$row[last_name] $row[first_name] $row[middle_name] <br>$row[email] <br> $row[number] <br> $row[status_user] <br> $row[name_expert]</p> 
                                        </div>
                                        <div class=\" col-md-5 form-group\">
                                            <select size=\"2\" style='width: 100%; height: 90%;' name=\"expert_id\">";
        for($i=0; $i<$countExpert; $i++){
            echo "<option value=\"".$rowExpert[$i]['id']."\">".$rowExpert[$i]['name']."</option>";

        }

        /* <option disabled>Выберите роль</option>
                                                    <option value=\"Эксперт\">Эксперт</option>
                                                    <option selected value=\"Участник\">Участник</option>
                                                    <option value=\"Слесарь\">Слесарь</option>
                                                    <option value=\"Сварщик\">Сварщик</option>*/
        echo "</select>
                                        </div>
                                        <div class='col-md-3  form-group'>  
                                         <input type='hidden' name='user_id' value='$row[id]'>      
                                         <input class='btn btn-primary' type='submit' name='updateExpertStatus' value='Принять'>
                                        </div>
        </div>
        </form>";
    }




}
/*$str = $_POST['str'];



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
*/
