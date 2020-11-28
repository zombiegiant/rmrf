<?php
include ('const.php');
function ConnectDB(){

    $mysqli=new mysqli(dbHost, dbUserName, dbPassword, dbName);
    mysqli_query ($mysqli,"set_client='utf8'");
    mysqli_query ($mysqli,"set character_set_results='utf8'");
    mysqli_query ($mysqli,"set collation_connection='utf8_general_ci'");
    mysqli_query ($mysqli,"SET NAMES utf8");
    return $mysqli;

}


function logout(){
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

function GetUrl(){
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
    return $url;
}

function GetNamePage(){
    $name=explode("/", GetUrl());
    $name=$name[count($name)-1];
    return $name;
}

function getSelectFindTags($str){
    $result="Select id, tags.name as name From tags Where ";
    $arrayStr=explode(" ",$str);
    $i=0;
    foreach ($arrayStr as $value){
        if($i!=0) $result.="AND ";
        $result.="tags.name like '%$value%'";
        $i++;
    }
    $result.=";";
    return $result;
}


function CreateTableSQLTagsForAddPostRat($res,$added){

    echo "<div class='table-responsive'><table class='table-sm table-hover'  style='max-height: 300px; width: 100%;'>
        <thead>
            <tr>";

        echo "<th scope='col'>Название</th>";
    echo "<th scope='col'>Действие</th>";


    echo "</tr>
  </thead>
  <tbody class='table-hover'>";

    while($row = $res->fetch_assoc()) {
        $add=false;
        foreach ($added as $value){
            if($value==$row['id']) $add=true;
        }

        if($add==false) {
            echo "<tr>
                    <td>$row[name]</td>
                    <td>
                    <button class='form-control' type='button' data-dismiss='modal' value='$row[name]' id='$row[id]' onclick='addTag(this)'>Добавить</button>
                    </td>
                    </tr>";
        }
        else {
            echo "<tr>
                    <td>$row[name]</td>
                    <td>
                    <button class='form-control' type='button' data-dismiss='modal' disabled value='$row[name]' id='$row[id]' onclick='addTag(this)'>Добавлено</button>
                    </td>
                    </tr>";
        }

    }
    echo "
  </tbody>
</table></div>";
}