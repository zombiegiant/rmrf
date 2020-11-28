<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

if(isset($_POST['like'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddLike('$_GET[id]','$_SESSION[id]','1')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
if(isset($_POST['dislike'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddLike('$_GET[id]','$_SESSION[id]','-1')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

if(isset($_POST['expert_like'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddLikeExpert('$_GET[id]','$_SESSION[id]','1','-')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call ExistLikeExpertCount('$_SESSION[expert]','$_GET[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $row = $res->fetch_assoc();

    if($row['count']==0){
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call InsertLikeExpertCount('$_GET[id]','$_SESSION[expert]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }
    else {
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call AddLikeExpertCount('$_GET[id]','$_SESSION[expert]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }


}
if(isset($_POST['expert_dislike'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddLikeExpert('$_GET[id]','$_SESSION[id]','-1','-')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if (!$res=$mysqli->query("Call ExistDislikeExpertCount('$_SESSION[expert]','$_GET[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $row = $res->fetch_assoc();

    if($row['count']==0){
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call InsertDislikeExpertCount('$_GET[id]','$_SESSION[expert]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }
    else {
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call AddDislikeExpertCount('$_GET[id]','$_SESSION[expert]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }

}

echo '
<br><br>


<div class="container">
<div class="row">
    <div class="col-md-8 offset-md-2">
    <h4 class="text-center">Предложение по рационализации</h4>
    </div>
</div>        
   <br>';

if(isset($_GET['id'])){
    if(isset($_POST['addAnswer'])){
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call AddAnswerPostRat('$_GET[id]','$_SESSION[id]','$_POST[answer]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }

    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call GetPostRatFromId('$_GET[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $row = $res->fetch_assoc();



}
echo "
<div class='form-control'>
<div class=\"row \" style=\"min-height: 200px; \"> 
      <div class='col-md-5'>
        <br>
   
  
    <div>
        <img width=\"400\" height=\"250\" src=\"$row[img]\" class=\"img-fluid img-thumbnail\" alt=\"...\">
    </div>
      <br>
      </div>

      <div class='col-md-7'>
        <div class='row'>
            <div class='col-md-7'>
            <br>
            <a class=\"nav-link link text-black display-4\" href=\"$domain\"><h4>$row[name_post]</h4></a>
             <hr class=\"my-0\" />       
            </div>
            <div class='col-md-5'>
            <br>
            <p>Дата публикации:<br> $row[data_create]</p>     
            </div>
        </div>
        <div class='row'>
            <div class='col'>";
$mysqli2 = ConnectDB();

if (!$res2=$mysqli2->query("Call GetTagsFromPostRat('$row[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
}
while($row2 = $res2->fetch_assoc()) {
    echo "<span class=\"badge badge-pill badge-primary\">$row2[name]</span>";
}


echo "
            </div>
        </div>
        
        
        <div class='row' style='min-height: 150px;'>
            <div class='col-md-6'>
                <br>
                <h5>Обо мне:</h5>  
                $row[last_name]<br>              
                $row[first_name]<br>
                $row[middle_name]<br>
                Дата рождения: $row[data]<br>
                Статус: $row[id_status_user] <br>
                
                
            </div>
            
            <div class='col-md-5'>
                <br>
                
               <a href='$domain/profile.php?id=$row[id_user]'> <img src=\"$row[img_user]\"  alt=\"...\" class=\"rounded-circle\"></a>
                
            </div>
        </div>
      </div>  
</div>
      
        <div class='row' style='margin-left: 2px; margin-right: 2px; align=\"right\"; min-height: 150px;'>
            <div class='col-md-12 text-justify'>
            <h3>Подробное описание:</h3>
            <br>
               $row[long_text]
            </div>   
        </div>
        <hr class=\"my-4\" />  
        ";

$mysqliLike = ConnectDB();
if (!$resLike=$mysqliLike->query("Call CountLike('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliLike->errno . ") " . $mysqliLike->error;
}
$rowLike = $resLike->fetch_assoc();

$mysqliDislike = ConnectDB();
if (!$resDislike=$mysqliDislike->query("Call CountDislike('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliDislike->errno . ") " . $mysqliDislike->error;
}
$rowDislike = $resDislike->fetch_assoc();

$mysqliExistLike = ConnectDB();
if (!$resExistLike=$mysqliExistLike->query("Call ExistLike('$_GET[id]',$_SESSION[id])")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliExistLike->errno . ") " . $mysqliExistLike->error;
}
$rowExistLike = $resExistLike->fetch_assoc();

          echo "<div class='row'>

            <div class='col-md-10'>
             <form method='POST'>";
          if($rowExistLike['exist_like']==0){
               echo "<div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                <input type='submit' class='btn btn-outline-success btn-sm' value='Лайк $rowLike[count_like]' name='like'>    
                <input type='submit' class='btn btn-outline-success btn-sm' value='Дизлайк $rowDislike[count_dislike]' name='dislike'>
                </div>";
                }
          else {
              echo "<div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                <input type='submit' class='btn btn-outline-success btn-sm' disabled value='Лайк $rowLike[count_like]'>    
                <input type='submit' class='btn btn-outline-success btn-sm' disabled value='Дизлайк $rowDislike[count_dislike]'>
                </div>";
          }

$mysqliEx = ConnectDB();

if (!$resEx=$mysqliEx->query("Call GetExpertsAndLikes('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliEx->errno . ") " . $mysqliEx->error;
}

$mysqliExistExpert = ConnectDB();

if (!$resExistExpert=$mysqliExistExpert->query("Call ExistExpertLike('$_GET[id]','$_SESSION[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqliExistExpert->errno . ") " . $mysqliExistExpert->error;
}
$rowExistExpert = $resExistExpert->fetch_assoc();

while($rowEx = $resEx->fetch_assoc()) {
    if(($rowEx['id'] == $_SESSION['expert'])&&($rowExistExpert['exist_like']==0)){
        echo "<div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
              <input type='submit' class='btn btn-outline-secondary btn-sm' value='$rowEx[name] Лайк $rowEx[like_expert]' name='expert_like'>
              <input type='submit' class='btn btn-outline-secondary btn-sm' value='$rowEx[name] Дизлайк $rowEx[dislike_expert]' name='expert_dislike'>
              </div>";
    }
    else {
        echo "<div style=\"float: left\" class=\"btn-group mr-1 mb-1 p-md-10\" aria-label=\"Basic example\">
              <input type='submit' class='btn btn-outline-secondary btn-sm' disabled value='$rowEx[name] Лайк $rowEx[like_expert]' >    
              <input type='submit' class='btn btn-outline-secondary btn-sm' disabled value='$rowEx[name] Дизлайк $rowEx[dislike_expert]' >
              </div>";
    }
}

//GetExpertsNames
            echo "
</form>
</div>
            
            <div class='col-md-2'>
            
         <button type=\"button\" class=\"btn btn-primary \" data-toggle=\"modal\" data-target=\"#divAnswer\">Ответить</button>
         </div>";
       echo "</div>
       
       </div><br>";

if(isset($_SESSION['id'])) echo "
    <div  class=\"modal fade\" style=\"max-height: 450px;\" id=\"divAnswer\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"divTagsLabel\" aria-hidden=\"true\">';
<form method='post'>
<div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
      
        <h5 class=\"modal-title\" id=\"staticBackdropLabel\">Ответ</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\" style=\"max-height: 250px;\">
        <div class=\"form-group\">

             <textarea name='answer' ' class=\"form-control\" name=\"email\" rows='8' required></textarea>
             <input type='hidden' name='id_user' value='$_SESSION[id]'>

       </div>
       </div>
      <div class=\"modal-footer\">
     
        <input type=\"submit\" class=\"btn btn-primary\"  name=\"addAnswer\" value=\"Добавить ответ\"> &nbsp
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Отмена</button>
      </div>
    </div>
  </div>
  </form>
</div>
<br>
";
$mysqli3=ConnectDB();
if (!$res3=$mysqli3->query("Call GetAnswerForPostRat('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
}
while($row3 = $res3->fetch_assoc()) {



echo "





<div class=\"row border border-secondary rounded bg-light \" style=\"min-height: 200px; \"> 
    <div class='col-md-2 my-auto mx-auto'>
        <a href='$domain/profile.php?id=$row3[id_user]'><img src=\"$row3[img_user]\" alt=\"...\" class=\"rounded-circle\"></a>
    </div>
    <div class='col-md-10'>
        <div class='row'>
            <div class='col-md-5 align-self-center'>
                $row3[data_answer] $row3[last_name] $row3[first_name] $row3[middle_name] $row3[id_status_user]
            </div>
            <div class='col-md-7 '><br>
            <form method='post'>
            <input type='hidden' name='id' value='$row3[id_answer]'>
            ";/*<div class='row'>
            
            
                <div class='col'> <input type='submit' class='form-control form-control-sm  ' value='Лайк $row3[likes]' name='like'>  </div>
              <div class='col'> <input type='submit' class='form-control form-control-sm' value='Дизлайк $row3[dislikes]' name='dislike'>    </div>
              <div class='col'> <input type='submit' class='form-control form-control-sm' value='Помогло  $row3[helping]' name='helping'>   </div>
               <div class='col'><input type='submit' class='form-control form-control-sm' value='Решило  $row3[finish]' name='finish'>   </div>
               
               </div>*/echo"
             </form>  
               
            </div>
        </div><br>
        <div class='row border border-secondary rounded bg-light ' style='min-height: 100px;'>
            <div class='col-md align-self-center'>
                <div style=''>
                $row3[text_answer]
                </div>
            </div>
        </div>
    </div>
</div>
<br>

";
}



echo "</div></div>";
include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';


