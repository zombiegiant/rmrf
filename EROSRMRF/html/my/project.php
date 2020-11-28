<?php require_once('unit/_header.php'); ?>
<?php
    $id = (int)$_GET['id'];
?>
<?php if(isset($id)):?>
    <?php
        $query ="SELECT * FROM projects WHERE id=\"$id\"";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result) {
            $result->data_seek(0);
            $row=null;
            $row = $result->fetch_assoc();
            if($row['id']) {
            ?>

<script>
    function Vote() {
        alert('Ваш голос учтен!');
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center project_header">
            <h2 class="text-center"><?=$row['name']?></h2>
            <span><i class="glyphicon glyphicon-map-marker"></i><?=$row['adress']?> <i class="glyphicon glyphicon-tag"></i>
                <?$idCategory=$row['category'];
                $queryCategory = "SELECT * FROM categories WHERE id=$idCategory";
                          $resultCategory = mysqli_query($link, $queryCategory) or die("Ошибка " . mysqli_error($link));
                          if ($resultCategory) {
                              $resultCategory->data_seek(0);
                              $rowCategory = $resultCategory->fetch_assoc();
                              echo $rowCategory['name'];
                          }
                ?>
            </span>
        </div>
        <div class="col-md-6">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->


  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?


      $queryPic = "SELECT * FROM project_pics WHERE id_project=\"$id\"";
      $resultPic = mysqli_query($link, $queryPic) or die("Ошибка " . mysqli_error($link));
      if ($resultPic) {
          $resultPic->data_seek(0);
          $i = 0;
          while ($rowPic = $resultPic->fetch_assoc()) {
              $pathPic=$rowPic['picture'];
              if($i==0)  echo "<div class=\"item active\">
                     <img src=\"$pathPic\" alt=\"...\">
              
                     </div>";
              else
              echo "<div class=\"item\">
                     <img src=\"$pathPic\" alt=\"...\">
                  
                     </div>";
              $i++;
          };

      }


    ?>




   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <div class="project_description">
                <?=$row['long_opic']?>
            </div>            
        </div>
        <div class="col-md-6">
            <div class="project_content">
                <div class="project_money">
                    <div>234 <span>руб</span></div>
                    <span>из <?echo $row['money_need'];?></span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="<?echo $row['money_need'];?>" style="width: <?echo 100/$row['money_need']*234;?>%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
                <p class="text-center">
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Пожертвовать</button>
                    <button type="button" class="btn btn-default btn-lg" onclick="Vote()">Проголосовать</button>
                </p>
                <hr>
                <div class="project_author">
                    <?
                          $id_autor=$row['id_author'];
                          $queryAutor = "SELECT * FROM accounts WHERE id=$id_autor";
                          $resultAutor = mysqli_query($link, $queryAutor) or die("Ошибка " . mysqli_error($link));
                          if ($resultAutor) {
                              $resultAutor->data_seek(0);
                              $rowAutor = $resultAutor->fetch_assoc();

                              foreach (glob("images/users_photo/" . $rowAutor['login'] . ".*") as $photo)



                              echo "<img src=\"$photo\" alt=\"...\" class=\"img-circle\" style=\"width: 40px; height: 40px; object-fit: cover;\"> Автор $rowAutor[first_name] $rowAutor[last_name]";
                          }
                             // <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNmQ3OWRkOWM5YSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2ZDc5ZGQ5YzlhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjI2NTYyNSIgeT0iNzQuNSI+MTQweDE0MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="..." class="img-circle"> Автор 1

                    ?>
                </div>
            </div>    
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Пожертвование</h4>
      </div>
      <div class="modal-body">
        <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=buyer&targets=&targets-hint=&default-sum=100&button-text=14&payment-type-choice=on&comment=on&hint=%D0%A3%D0%BA%D0%B0%D0%B6%D0%B8%D1%82%D0%B5%20%D1%82%D0%B5%D0%BC%D1%83%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0&successURL=https%3A%2F%2F%D0%BC%D1%8B%D0%B3%D0%BE%D1%80%D0%BE%D0%B4.%D1%80%D1%84&quickpay=shop&account=410018168184677" width="100%" height="306" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть форму</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

            <?php    
            } else {
                echo '<p>Ошибка 404 страница не найдена</p>';
            }
        }
        ?>
<?php else:?>
    <p>Ошибка 404 страница не найдена</p>
<?php endif; ?>

<?php require_once('unit/_footer.php'); ?>