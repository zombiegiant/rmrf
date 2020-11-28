<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');


echo '<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        function changeUser(){
            
            var obj = document.getElementById("findUserInput");
            var user = obj.value;        
            $.ajax({
                type: "POST",
                url: "findAdmin.php",
                data: {user:user}
            }).done(function( result )
            {

                $("#divUser").html( result );
            });
        }
    </script>
    
    <script>
        function changeExpert(){
            
            var obj = document.getElementById("findExpertInput");
            var expert = obj.value;        
            $.ajax({
                type: "POST",
                url: "findAdmin.php",
                data: {expert:expert}
            }).done(function( result )
            {

                $("#divExpert").html( result );
            });
        }
    </script>';


echo ' </head>
  <body onload="changeUser(); changeExpert();">';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии


if(isset($_POST['updateMinLikes'])){
    $mysqli = ConnectDB();
//echo "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>";
//var_dump($_POST);
    if (!$res=$mysqli->query(" Call UpdateMinLikesExpert('$_POST[id_expert]',$_POST[minLikes])")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

if(isset($_POST['addTag'])){
    $mysqli = ConnectDB();
//echo "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>";
//var_dump($_POST);
    if (!$res=$mysqli->query(" Call AddTag('$_POST[nameTag]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

echo "<br><br>";
var_dump($_POST);

if(isset($_POST['updateUserStatus'])){

    $mysqli = ConnectDB();
//echo "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>";
//var_dump($_POST);
    if (!$res=$mysqli->query(" Call UpdateStatusUser('$_POST[user_id]','$_POST[UserRole]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

if(isset($_POST['updateExpertStatus'])){

    $mysqli = ConnectDB();
//echo "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>";
//var_dump($_POST);
    if (!$res=$mysqli->query(" Call UpdateExpertStatus('$_POST[user_id]','$_POST[expert_id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

echo "<section>
<br>
<div class='container' style='min-height: 800px'>
    <div class='row'>
       <div class='col-md-12'>
        <div class=\"page-header text-center\">
            <h1 class=\"page-title\">Администрирование</h1>
        </div>
    </div>  
    </div>
    
    <br><div class='spick row form-control'>
        <div class='col-md-6'>
            <h4 class=\"page-title text-center\">Минимальные проходные баллы</h4><br>";
$mysqli = ConnectDB();

if (!$res=$mysqli->query(" Call GetExpertsNames()")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
while($row = $res->fetch_assoc()) {
    echo "
              <div class=\"spick row p-1 \">                        
                         <form class='form-inline'  method='post' action='admin_cabinet.php'>       
                                                     
                                    
                                        <div class=\" col-md-6 form-group \">
                                            <input class='form-control'  style='width: 100%;'  readonly type='text' value='$row[name]' > 
                                        </div>
                                        <div class=\" col-md-2 form-group \">
                                           <input class='form-control '  style='width: 100%;' type='text' value='$row[min_likes]' name='minLikes'>
                                        </div>
                                       <div class='col-md-4  form-group'>        
                                          <input class='btn btn-primary' style='width: 100%;'  type='submit' value='Применить' name='updateMinLikes'>
                                          <input type='hidden' value='$row[id]' name='id_expert'>
                                        </div>
                                    
                         </form>                    
        </div>
         
         ";

}



            echo "
           <br><h4 class=\"page-title text-center\">Управление аккаунтами</h4><br> 
           <div class=\"row\">                        
                                <div class='col-md-12 '>
                                <input class='form-control' type='text' name='userSearch' id='findUserInput' placeholder='Введите ФИО' oninput='changeUser();'>
                                </div>
           </div>   
           <div class='row ' style='min-height: 300px; max-height: 300px; overflow-y: scroll;'>
            <div class=\" col-md-12 form-group \" id='divUser'></div></div>
            
            
            ";
           
        /*
        <form class='form-inline'  method='post' action='admin_cabinet.php'>
        <div class=\"row\" style='min-height: 150px;'>                        
                                
                                                  
                                    
                                        <div class=\" col-md-3 form-group \">
                                            <p class='form-control-plaintext'>Петькин Иван Николаевич, hellocelo@ussr.derjava</p> 
                                        </div>
                                        <div class=\" col-md-5 form-group\">
                                            <select class='input-large' style='width: 100%' size=\"2\" name=\"UserRole\">
                                                <option disabled>Выберите роль</option>
                                                <option value=\"Эксперт\">Эксперт</option>
                                                <option selected value=\"Участник\">Участник</option>
                                                <option value=\"Слесарь\">Слесарь</option>
                                                <option value=\"Сварщик\">Сварщик</option>
                                            </select>  
                                        </div>
                                        <div class='col-md-4  form-group'>        
                                         <button class='btn btn-primary' type='submit'>Изменить роль</button> 
                                        </div>
                                    
                                
        </div>
        </form>";
        echo "
        <form class='form-inline'  method='post' action='admin_cabinet.php'>
        <div class=\"row\" style='min-height: 150px;'>                        
                                
                                                  
                                    
                                        <div class=\" col-md-3 form-group \">
                                            <p class='form-control-plaintext'>Петькин Иван Николаевич, hellocelo@ussr.derjava</p> 
                                        </div>
                                        <div class=\" col-md-5 form-group\">
                                            <select class='input-large' style='width: 100%' size=\"2\" name=\"UserRole\">
                                                <option disabled>Выберите роль</option>
                                                <option value=\"Эксперт\">Эксперт</option>
                                                <option selected value=\"Участник\">Участник</option>
                                                <option value=\"Слесарь\">Слесарь</option>
                                                <option value=\"Сварщик\">Сварщик</option>
                                            </select>  
                                        </div>
                                        <div class='col-md-4  form-group'>        
                                         <button class='btn btn-primary' type='submit'>Изменить роль</button> 
                                        </div>
                                    
                                
        </div>
        </form>
        </div>
        </div>*/;
         echo "<br><br><h4 class=\"page-title text-center\">Управление экспертами</h4><br> 
           <div class=\"row\">                        
                                <div class='col-md-12 '>
                                <input class='form-control' type='text' id='findExpertInput' name='userSearch' placeholder='Введите ФИО' oninput='changeExpert();'>
                                </div>
           </div>   
           
            <div class='row ' style='min-height: 300px; max-height: 300px; overflow-y: scroll;'>
            <div class=\" col-md-12 form-group \" id='divExpert'></div></div>
";
          /* <form class='form-inline'  method='post' action='admin_cabinet.php'>
           
           <div class=\"row \"style='min-height: 150px;' >                        
                                
                                                     
                                    
                                        <div class=\" col-md-3 form-group \">
                                            <p class='form-control-plaintext'>Исус Христосов Богович, jesus@world.god</p> 
                                        </div>
                                        <div class=\" col-md-5 form-group\">
                                            <select size=\"2\" style='width: 100%' name=\"UserRole\">
                                                <option disabled>Выберите роль</option>
                                                <option value=\"Эксперт\">Эксперт</option>
                                                <option selected value=\"Участник\">Участник</option>
                                                <option value=\"Слесарь\">Слесарь</option>
                                                <option value=\"Сварщик\">Сварщик</option>
                                            </select>  
                                        </div>
                                        <div class='col-md-4  form-group'>        
                                         <button class='btn btn-primary' type='submit'>Изменить роль</button> 
                                        </div>
                                    
                                
        </div>
        </form>
        </div>
        </div>
        
        </div>";
        
       echo " <div class='col-md-6'>
               <h4 class=\"page-title text-center\">Общая информация</h4><br>
               <div class=\"row\"> 
                <div class='col-md-12'>
                                       <ul class=\"list-group\">
                                        <li class=\"list-group-item\">Количество постов (значение с БД)</li>
                                        <li class=\"list-group-item\"> Количество лайков (значение с БД) </li>
                                        <li class=\"list-group-item\"> Количество дизлайков (значение с БД)</li>
                                        <li class=\"list-group-item\">Количество постов (значение с БД)</li>
                                        <li class=\"list-group-item\"> Количество лайков (значение с БД) </li>
                                        <li class=\"list-group-item\"> Количество дизлайков (значение с БД)</li>
                                    </ul>
               </div>
               </div>
               */;
               echo "
               <br><br><h4 class=\"page-title text-center\">Управление тегами</h4><br>
               <div class=\"row\">  
                    
                     <form class=\"form-inline\" style='width: 100%;' method='post'>
                 
                      <div class=\"col-md-8\">
                       <div class='input-group input-group-sm'>
                          <div class='input-group-prepend'>
                            <span class='input-group-text' id='inputGroup-sizing-sm'>Введите тег</span>
                          </div>
                          <input type='text' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-sm' name='nameTag'>
                        </div>
                      </div>
                      <div class='col-md-4  form-group'> 
                        <input type=\"submit\" class=\"btn btn-primary \" style='width: 100%;' value='Добавить' name='addTag'>
                      </div>  
                    
                    </form>
               </div>
               <br>
       </div>
    </div>

</div>
<br>
</section>
";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
