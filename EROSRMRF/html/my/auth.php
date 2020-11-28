<?php
    require_once('config/config.php');
if(isset($_GET['out'])) { $_SESSION = array(); session_destroy(); header('Location: https://мыгород.рф');}
if($_SESSION['auth']==true) header('Location: https://мыгород.рф');
if(isset($_POST['pass'])) {
    
    $md5=md5($_POST['password'].$CONFIG['moresalt']);
    $query ="SELECT * FROM accounts WHERE login=\"$_POST[login]\" AND password=\"$md5\"";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


    if($result)
    {

        $result->data_seek(0);
        $row=null;
        $row = $result->fetch_assoc();

        if($row['id']) {

            $_SESSION['auth']=true;
            $_SESSION['user_id']=$row['id'];
            $_SESSION['login']=$row['login'];
            $_SESSION['first_name']=$row['first_name'];
            $_SESSION['last_name']=$row['last_name'];
            $_SESSION['photo']=$row['photo'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            header('Location: http://мыгород.рф');
            echo " Авторизация успешно ";
        }
        else {
            $_SESSION['auth']=false;
        }
    }


    mysqli_close($link);
}

?>
<?php require_once('unit/_header.php'); ?>



    <section>
    <div class="container">
        <div class="row"></div>
            <div class="col-md-4"></div>
        <div class="col-md-4">
            <? if(isset($_GET['need'])) echo "
            <div class=\"form-group\">
                        <div class=\"col\">
                            <label >Для добавления проекта необходимо авторизоваться</label>
                            
                        </div>
                </div>
            "?>

            <form method="post" class="form-horizontal">
                <div class="form-group">
                        <div class="col">
                            <label for="test">Логин</label>
                            <input type="text" class="form-control" name="login" required >
                        </div>
                </div>


                <div class="form-group">
                        <div class="col">
                            <label for="test">Пароль</label>
                            <input type="password" class="form-control" name="password" required >
                        </div>
                </div>

                <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-primary" name="pass">Отправить</button>
                        </div>
                </div>


            </form>
        </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <?php

    if(isset($_POST['pass'])&&$_SESSION['auth']==false) {

        echo "Неверный логин или пароль";
    }


    ?>
</section>


<?php require_once('unit/_footer.php'); ?>