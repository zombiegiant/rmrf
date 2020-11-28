<?php require_once('unit/_header.php'); ?>
<?php
    $id = (int)$_GET['id'];
?>
<?php if(isset($id)):?>
<div class="container">
    <div class="row"> 
        <div class="col-md-8">
            <?php
                $query ="SELECT * FROM categories WHERE id=\"$id\"";
                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                $result->data_seek(0);
                $row=null;
                $row = $result->fetch_assoc();
                if($row['id']) {
                    echo '<h4>Категория: '.$row['name'].'</h4>';
                }
            ?>
    <?php
        $query ="SELECT * FROM projects WHERE category=\"$id\" ORDER BY id DESC";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="short_story">
                <div class="media">
                    <div class="media-left">
                        <a href="/project.php?id='.$row["id"].'" class="short_story_cover_img">
                            <img class="media-object" src='.$row['main_icon'].'>
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="/project.php?id='.$row["id"].'" class="">
                          <h3 class="media-heading">'.$row['name'].'</h3>
                        </a>
                        <p>'.$row['short_opic'].'</p>   
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="/project.php?id='.$row["id"].'" class="btn btn-default" role="button">Подробнее</a>
                    </div>  
                </div>
            </div>';
            }
        } else {
            echo '<p>Страницы не найдены</p>';
        }
        
        ?>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php else:?>
    <p>Ошибка 404 страница не найдена</p>
<?php endif; ?>

<?php require_once('unit/_footer.php'); ?>