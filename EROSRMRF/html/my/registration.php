<?php
require_once('config/config.php');

if($_SESSION['auth']==true) header('Location: https://мыгород.рф');


if(isset($_POST['registration'])) {
    $log=$_POST['login'];
    $pas=md5($_POST['password'].$CONFIG['moresalt']);
    $fn=$_POST['first_name'];
    $ln=$_POST['last_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    { //Проверка
        $query = "SELECT * FROM accounts WHERE login=\"$log\"";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {

            $result->data_seek(0);
            $row = null;
            $row = $result->fetch_assoc();

            if ($row['id']) {
                $_SESSION['errReg'] = "Логин " . $log . " уже зарегистрирован";
            }
        }

        $query = "SELECT * FROM accounts WHERE email=\"$email\"";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {

            $result->data_seek(0);
            $row = null;
            $row = $result->fetch_assoc();

            if ($row['id']) {
                $_SESSION['errReg'] = "Email " . $email . " уже зарегистрирован";
            }
        }

        $query = "SELECT * FROM accounts WHERE phone=\"$phone\"";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {

            $result->data_seek(0);
            $row = null;
            $row = $result->fetch_assoc();

            if ($row['id']) {
                $_SESSION['errReg'] = "Телефон " . $phone . " уже зарегистрирован";
            }
        }

    }
if(!isset($_SESSION['errReg'])) {
    $sql = "INSERT INTO `accounts` (`login`, `password`, `first_name`, `last_name`, `email`, `phone` ) VALUES (
    '$log','$pas', '$fn', '$ln','$email','$phone')";

    if ($result = mysqli_query($link, $sql)) header('Location: https://мыгород.рф/registrationComplete.php');
    }
}

?>
<?php require_once('unit/_header.php'); ?>



<section>
    <div class="container">
        <div class="row"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">


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
                        <label for="test">E-mail</label>
                        <input type="text" class="form-control" name="email" required >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <label for="test">Фамилия</label>
                        <input type="text" class="form-control" name="last_name" required >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <label for="test">Имя</label>
                        <input type="text" class="form-control" name="first_name" required >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <label for="test">Телефон</label>
                        <input type="number" class="form-control" name="phone" required >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="registration">Отправить</button>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col">
                        
                        <?if(isset($_SESSION['errReg'])) echo "<label for=\"test\">".$_SESSION['errReg']."</label>"; $_SESSION['errReg']=null;?>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="col-md-4"></div>
    </div>

    <?php



    ?>
</section>






<?
/*
if($result=mysqli_query($link,"select * from `accounts`"))
{
	$data=mysqli_fetch_object($result);
	while($data){
		print $data->login." ";
		$data=mysqli_fetch_object($result);
	}
	}
//echo $_POST['log']." ".$_POST['pas'];*/
?>


<?php require_once('unit/_footer.php'); ?>

