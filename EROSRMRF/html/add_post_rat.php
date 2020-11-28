<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo "<style>
        .form-width {max-width: 25rem;}
        .has-float-label {
            position: relative;
        }
        .has-float-label label {
            position: absolute;
            left: 0;
            top: 0;
            cursor: text;
            font-size: 75%;
            opacity: 1;
            top: -.5em;
            left: 0.75rem;
            z-index: 3;
            line-height: 1;
            padding: 0 1px; }
        .has-float-label label::after {
            content: \" \";
            display: block;
            position: absolute;
            background: white;
            height: 2px;
            top: 50%;
            left: -.2em;
            right: -.2em;
            z-index: -1; }
        .has-float-label .form-control::-webkit-input-placeholder{
            opacity: 1;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -o-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
        }
        .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
            opacity: 0; }

        .input-group .has-float-label {
            display: table-cell; }
        .input-group .has-float-label .form-control {
            border-radius: 0.25rem; }
        .input-group .has-float-label:not(:last-child) .form-control {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0; }
        .input-group .has-float-label:not(:first-child) .form-control {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            margin-left: -1px; }
    </style>";

echo '<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        var countTags=0;
        var added = [];
        added[0]=-1;
        function changeFind(){
            var obj = document.getElementById("findTags");
            var str = obj.value;     
           
            $.ajax({
                type: "POST",
                url: "findTagsForAddPostRat.php",
                data: {str:str,added:added}
            }).done(function( result )
            {

                $("#tagsFind").html( result );
            });
        }
        function addTag(obj){
            obj.disabled=true;
            
            var tags = document.getElementById("tags");
            var span = document.createElement("span");
            span.className="badge badge-pill badge-primary";
            span.innerText=obj.value;
            tags.appendChild(span);
            var input=document.createElement("input");
            input.type="hidden";
            input.name="tags["+countTags+"]";
            input.value=obj.id;
            tags.appendChild(input);
            added[countTags]=obj.id;
            countTags++;
            obj.innerText="Добавлено";
            
            
        }
        
    </script>';
echo ' </head>
  <body onload="changeFind()">';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<div>
<br>
<div class='container' style='min-height: 800px'>
    <div class='row'>
      
        <div class='col-md-6 offset-md-3'>
        
    <form class=\"form-control\" enctype=\"multipart/form-data\" method='post' action='$domain/create_add_post_rat.php'>
    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"300000\" />
        <br>
        <legend class=\"m-b-1 text-xs-center\"><b>Добавление предложения</b></legend>
        <br>
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"name\" type=\"text\" required=\"\" placeholder=\"Название\" name='name'/>
            <label for=\"name\">Название</label>
        </div>
         
        <div class=\"form-group has-float-label\">
            <button class=\"form-control\"  required=\"\" data-toggle=\"modal\" data-target=\"#divTags\">Добавить тег</button>
             <br>
            <div id='tags'>

            </div>
            <br>
            <label for=\"tags\">Теги</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <textarea class=\"form-control\" id=\"short_text\" name=\"short_text\" rows=\"3\" required></textarea>
            <label for=\"middle\">Краткое описание</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <textarea class=\"form-control\" id=\"text\" name=\"long_text\" rows=\"6\" required></textarea>
            <label for=\"middle\">Полное описание</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" accept='image/*' id=\"img\" type=\"file\" required=\"\" placeholder=\"Изображение\" name='file'/>
            <label for=\"img\">Изображение</label>
        </div>
        
        
        

        <div class=\"text-xs-center\">
            <input class=\"btn btn-block btn-primary\" type=\"submit\" name='add_post_rat' value='Добавить пост'>
        </div>
    </form>
</div>
        
        
        
        

    </div>


</div>
<div  class=\"modal fade\"  id=\"divTags\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"divTagsLabel\" aria-hidden=\"true\">';
<div class=\"modal-dialog\">
    <div class=\"modal-content\" style=\"max-height: 700px;\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"divTagsLabel\">Добавить тег</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\" style=\"\">
        <div class=\"form-group\">
             <label for=\"exampleInputEmail1\">Поиск тегов </label>
             <input type=\"text\" class=\"form-control\" id='findTags' oninput='changeFind();'>
             <small id=\"emailRat\" class=\"form-text text-muted\"> </small>
        <div id='tagsFind' style=\"max-height: 400px; 
  height: 400px;
  overflow: auto;\">
            
        </div>
            
       </div>
       </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Завершить</button>
      </div>
    </div>
  </div>
</div>
<br>

";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
