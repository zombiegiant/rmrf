<?php require_once('unit/_header.php'); ?>
    
<header class="header_image">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <img src="/images/Logo.png">
            </div>
            <div class="col-md-7">
                <h1>Платформа для поддержки на добровольной основе общественной деятельности</h1>
                <h2>Управляй своим городом вместе с нами!</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</header>

<div class="header_info">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="glyphicon glyphicon-check"></i>
                <h3>Выбери интересующий проект</h3>
            </div>    
            <div class="col-md-4">
                <i class="glyphicon glyphicon-ruble"></i>
                <h3>Поддержи его материально</h3>
            </div>    
            <div class="col-md-4">
                <i class="glyphicon glyphicon-eye-open"></i> 
                <h3>Следи за ходом событий</h3>
            </div>        
        </div>
    </div>
</div>  

<div class="list_prjects">
<div class="container">
    <div class="row">
        <?php
            $query = "SELECT * FROM projects ORDER BY id DESC LIMIT 6";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if($result) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <div class="thumbnail-cover"><a href="/project.php?id='.$row["id"].'"><img src="'.$row["main_icon"].'"></a></div>
                          <div class="caption">
                            <h3>'.$row["name"].'</h3>
                            <p>'.$row["short_opic"].'</p>
                            <p><a href="/project.php?id='.$row["id"].'" class="btn btn-default" role="button">Подробнее</a></p>
                          </div>
                        </div>
                      </div>';
                }
            } 
        ?>
        <div class="col-md-12 text-center">
            <p>
                <?php 
                    $query = "SELECT COUNT(*) FROM projects";
                    $res = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    $res->data_seek(0);
                    $r=null;
                    $r = $res->fetch_assoc();
                    $count = $r['COUNT(*)'];
                ?>
                <a href="/project-list.php" class="btn btn-default list-all-projects" role="button">Список всех проектов <span class="badge"><?= $count ?></span></a>
            </p>
        </div>
    </div>
    </div>
</div>

<div class="footer_info_block">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="title_info_footer">Как это работает</h2>
        </div>
        <div class="col-md-6">
            <article>
                <div class="panel">
                    <h2 class="text-right">Как поддержать проект </h2>
                    <p class="text-right">1. Перейти на страницу "Проекты"</p>
                    <p class="text-right">2. Выбрать заинтересовавший вас проект</p>
                    <p class="text-right">3. Пожертвовать средства</p>
                    <div class="text-right">
                      <a href="#" class="btn btn-default">Подробнее</a>
                    </div>
                </div>
          </article>
        </div>
        <div class="col-md-6">
           <article>
                <div class="panel">
                    <h2>Как предложить проект</h2>
                    <p>1. Зарегистрировать аккаунт</p>
                    <p>2. Перейти на страницу "Предложить проект"</p>
                    <p>3. Заполнить форму и отправить на модерацию</p>
                    <div>
                      <a href="#" class="btn btn-default">Подробнее</a>
                    </div>
                </div>
          </article> 
        </div>
    </div>   
    </div>   
    </div>   
<div class="footer_category_block">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="title_category_footer">Категории для проектов</h2>
        </div>
        <div class="col-md-12">
            <ul>
                <?php
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    if($result) {
                        while($row = $result->fetch_assoc()) {
                            $id_cat = $row['id'];
                            $query = "SELECT COUNT(*) FROM projects WHERE category=$id_cat";
                            $res = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                            $res->data_seek(0);
                            $r=null;
                            $r = $res->fetch_assoc();
                            $count = $r['COUNT(*)'];
                            echo '<li><a href="/category.php?id='.$row["id"].'">'.$row["name"].' '.($count==0?'':' <span class="badge">'.$count.'</span>')."</a><li>";
                        }
                    } 
                ?>
            </ul>
        </div>
    </div>
</div>
</div>

<?php require_once('unit/_footer.php'); ?>