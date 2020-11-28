<?php
require_once('config/config.php');

if((!isset($_SESSION['auth']))||($_SESSION['auth']==false)) header('Location: https://мыгород.рф');


if (file_exists($_FILES['main_pic']['tmp_name'])) {
    foreach (glob("images/users_photo/" . $_SESSION['login'] . ".*") as $photo) {
        unlink($photo);
    }
    if (copy($_FILES['main_pic']['tmp_name'], "images/users_photo/" . $_SESSION['login'] . "." . end(explode(".", $_FILES['main_pic']['name'])))) ;
}

?>

<?php require_once('unit/_header.php'); ?>

<section>
    <div class="container" style="width: 100%; ">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Мой профиль</a></li>
                    <li role="presentation"><a href="/security.php">Безопасность</a></li>
                </ul>

            </div>

        </div>

        <br><br>
        <link rel="stylesheet" href="progrescircle.css">
        <div class="row" style="width: 50%; height: 50%; float: left;">
            <div class="col-md-3">
                <div class="radial" >
                    <div class="circle left rotate"><span></span></div>
                    <div class="circle right rotate"><span></span></div>

                <img src="<? foreach (glob("images/users_photo/".$_SESSION['login'].".*") as $photo) {
                   echo $photo;
                }?>" alt="..." class="img-circle" style="width: 200px; height: 200px; object-fit: cover;">
                    <div class="loop" data-val="1  2  3  4  5"></div>
                </div>
            </div>

            <br><br>
            <div class="col-md-6" style="font-family: 'Times New Roman'; font-size: 16px; margin-top: 6%; margin-left: 20%;">
                <label><?php echo $_SESSION["first_name"];?></label>
                <label><?php echo $_SESSION["last_name"];?></label><br>
                <label><?php echo 'Логин: ',$_SESSION["login"];?></label><br>
                <label><?php echo 'Почта: ',$_SESSION["email"];?></label><br>
                <label><?php echo 'Номер: ',$_SESSION["phone"];?></label>
            </div>
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <br>
                    <label for="exampleFormControlFile1">Изменить картинку...</label>
                    <input type="file" name="main_pic" class="form-control-file" id="exampleFormControlFile1">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>

        <div class="row" style="width: 50%; height: 315px; overflow: auto; float: right; margin-left: 10px; ">
                <section class="">
                    <legend><h2 style="margin-left: 20px;">Отзывы</h2></legend>
                    <div class="alert alert-info" role="alert">
                        <img class="img-circle" style=" float: left; width: 40px; height: 40px; object-fit: cover;" src="images/thumb1.jpg" alt="desc" />
                        <a href="#"><h4 style="float: left; margin-left: 10px; margin-top: 11px;">Артур Корнев</h4></a>
                        <p style="text-align: right;">19.04.2014</p>
                        <br><br>
                        <p style="font-size: 14px; color: black;">Очень ответственный человек. Всем рекомендую...</p>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <img class="img-circle" style=" float: left; width: 40px; height: 40px; object-fit: cover;" src="images/thumb2.jpg" alt="desc" />
                        <a href="#"><h4 style="float: left; margin-left: 10px; margin-top: 11px;">Михаил Уваров</h4></a>
                        <p style="text-align: right;">25.05.2015</p>
                        <br><br>
                        <p style="font-size: 14px; color: black;">Довольно оперативно решил поставленные задачи, спасибо.</p>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <img class="img-circle" style=" float: left; width: 40px; height: 40px; object-fit: cover;" src="images/thumb3.jpg" alt="desc" />
                        <a href="#"><h4 style="float: left; margin-left: 10px; margin-top: 11px;">Мила Сандер</h4></a>
                        <p style="text-align: right;">11.12.2015</p>
                        <br><br>
                        <p style="font-size: 14px; color: black;">Благодоря этому человеку возле нашего участка всё прибрано, красиво и чисто, по больше бы таких людей!</p>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <img class="img-circle" style=" float: left; width: 40px; height: 40px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                        <a href="#"><h4 style="float: left; margin-left: 10px; margin-top: 11px;">Роман Приходько</h4></a>
                        <p style="text-align: right;">24.01.2016</p>
                        <br><br>
                        <p style="font-size: 14px; color: black;">Благодарю за помощь пожилым людям, они как никто другой нуждаются в помощи.</p>
                    </div>
        </div>

        <div class="row" style="width: 100%; height: 1000px; overflow: auto; float: center; border-radius: 5px; border: 1px solid #C0C0C0;">

                <legend><h2 style="margin-left: 20px;">Лента активности</h2></legend>


            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Тестовая тема!</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">НУ ооочень крутое описание темы, ну прям просто топ из топа, я вам отвечаю, лучше не придумать, да я заткнусь когда-нибудь? Да оторвите мне пальцы, мне надоело печатать!!! Я хочу Спааатььь!!! Но тема все равно топ!</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Уже топовая тема!</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">НУ началось опять, снова топовая тема, почему одни топы, от топов роются копы в окопах, а я в рифомплёты пошёл, но тема среди топов.</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Ждун</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">Хочу сделать костюм жднуа, нужны финансы, будет круто!</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Тестовая тема!</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">НУ ооочень крутое описание темы, ну прям просто топ из топа, я вам отвечаю, лучше не придумать, да я заткнусь когда-нибудь? Да оторвите мне пальцы, мне надоело печатать!!! Я хочу Спааатььь!!! Но тема все равно топ!</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Уже топовая тема!</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">НУ началось опять, снова топовая тема, почему одни топы, от топов роются копы в окопах, а я в рифомплёты пошёл, но тема среди топов.</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

            <div class="jumbotron" style="width: 100%; float: center;">
                <legend><h2>Ждун</h2></legend>
                <img class="img-thumbnail" style=" float: left; width: 150px; height: 150px; object-fit: cover;" src="images/thumb4.jpg" alt="desc" />
                <p style="margin-left: 30px;">Хочу сделать костюм жднуа, нужны финансы, будет круто!</p>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="#" role="button">Подробнее...</a></p>
            </div>

        </div>
    </div>

</section>



<?require_once('unit/_footer.php');