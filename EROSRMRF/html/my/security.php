<?php
require_once('config/config.php');
if((!isset($_SESSION['auth']))||($_SESSION['auth']==false)) header('Location: https://мыгород.рф');
?>

<?php require_once('unit/_header.php'); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="/profile.php">Мой профиль</a></li>
                        <li role="presentation" class="active"><a href="#">Безопасность</a></li>
                    </ul>

                </div>

            </div>



            </div>


        </div>

    </section>

<?require_once('unit/_footer.php');