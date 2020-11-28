<?php 
require_once('config/config.php');
if((!isset($_SESSION['auth']))||($_SESSION['auth']==false)) header('Location: https://мыгород.рф/auth.php?need');
	$name=$_POST['name'];
	$short_about=$_POST['short_about'];
	$full_about=$_POST['full_about'];
	$category=$_POST['category'];
	$adress=$_POST['adress'];
	$r_time=$_POST['r_time'];
	$sum=$_POST['sum'];

/*	$sql="insert into projects (`name`,`main_icon`,`short_opic`,`long_opic`,`category`,`adress`,`r_time`,`money_need`,`id_author`) values ($name,
	$destination_dir,$short_about,$full_about,$category,$adress,$r_time,$sum,$_SESSION[user_id])";
	$result=mysqli_query($link,$sql);


*/
//header('Location:index.php');
//echo "<pre>";

if(isset($_POST['add_project'])) {
    //echo "add";
    $sql = "insert into `projects` (`name`,`short_opic`,`long_opic`,`category`,`adress`,`r_time`,`money_need`,`id_author`) values ('$name','$short_about','$full_about','$category','$adress','$r_time','$sum','$_SESSION[user_id]')";
    //$result = mysqli_query($link, $sql);
    $link->query($sql);
    $id_project=$link->insert_id;
    //printf ("ID новой записи: %d.\n",$id_project );
/*
    mysqli_insert_id($link);
    $id_project = $link->lastInsertId();
    echo $id_project;*/

    mkdir("images/projects_images/" . $id_project);
    $destMain="images/projects_images/" . $id_project . "/main_picture.".end(explode(".", $_FILES['main_picture']['name']));
    if(copy($_FILES['main_picture']['tmp_name'],$destMain)) ;

    $sql = "UPDATE `projects` SET main_icon = '$destMain' WHERE id=$id_project";
    $result = mysqli_query($link, $sql);
    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $dest = "images/projects_images/" . $id_project . "/$i" . "." . end(explode(".", $_FILES['images']['name'][$i]));

        if (copy($_FILES['images']['tmp_name'][$i], $dest)) {

            $sql = "insert into `project_pics` (`id_project`,`picture`) values ('$id_project','$dest')";
            $link->query($sql);
            

        }


    }
    header('Location: https://мыгород.рф/project.php?id='.$id_project);
}
//echo "<br><br>";
//print_r($_FILES);
//echo "</pre>";

 require_once('unit/_header.php');
 ?>
 <div class="container">
    <div class="row"> 
        <div class="col-md-8">
            <h3>Добавление проекта</h3>
<form action="add-project.php"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="test">Название проекта</label>
                        <input type="text" value="<?php if(isset($_POST['name'])) echo "$_POST[name]"; ?>"" name="name" class="form-control" id="test">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Обложка</label>

                        <input type="file" name="main_picture" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Короткое описание проекта</label>
                        <textarea class="form-control" name="short_about" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Полное описание проекта</label>
                        <textarea class="form-control" name="full_about" id="exampleFormControlTextarea2" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберете категорию</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                            <?php  
                           	$result=mysqli_query($link,"select * from categories");
                           	 $data=mysqli_fetch_object($result);
                           	 while($data)
                           	{
                           		echo "<option value=".$data->id.">".$data->name."</option>";
                           		$data=mysqli_fetch_object($result);
                           	}


                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="test">Место реализации проекта</label>
                        <input type="text" name="adress" class="form-control" id="mesto">
                    </div>

                    <div class="form-group">
                        <label for="test">Время выполнения после сбора</label>
                        <div class="form-row">
                            <div class="col-4">
                                <input type="number" name="r_time" class="form-control" id="timer">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="test">Необходимая сумма</label>
                        <div class="form-row">
                            <div class="col-4">
                                <input type="number" name="sum" class="form-control" id="sum">
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                          <label for="exampleFormControlFile1">Изображения</label>

                          <input type="file"   name="images[]"  class="form-control-file" multiple >

                      </div>

                    <button type="submit" name="add_project" class="btn btn-primary">Отправить</button>
                </form>
        </div>
        </div>
        </div>
<?php 
//$result=mysqli_query($link,"select name from projects");
//                           	 $data=mysqli_fetch_object($result);
//                           	 while($data)
//                           	{
//                           		echo $data->name."<br>";
//                           		$data=mysqli_fetch_object($result);
//                           	}

require_once('unit/_footer.php'); ?>