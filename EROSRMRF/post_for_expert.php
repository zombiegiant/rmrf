<?php

echo '<!doctype html>
<html lang="ru">
  <head>
  	<style>
	.bs .row .col, .bs .row > [class^="col-"] {
		padding-top: .75rem;
		padding-bottom: .75rem;
		background-color: #5a6268;
		border: 1px solid #000;
		color: #fff;
	}
	.spick{
    /*border: 1px solid red;*/
    margin-bottom: 5px;
    overflow: auto;
}
  
.block {
  position: sticky;
  top: 0px;
  z-index: 1;
    padding: 1em;
  max-width: 23em;
  background: hsla(0, 0%, 100%, .25) border-box;
  overflow: hidden;
  border-radius: .3em;
      opacity: 0.9; /* Полупрозрачный фон */
} 

#body{}::-webkit-scrollbar{width: 0px;height: 0px;}
/* Кастомизация скрола
-webkit-scrollbar-track-piece{background-color: }::
-webkit-scrollbar-thumb:vertical{height: 5px;background-color: #096BAA;}::-webkit-scrollbar-thumb:horizontal{width: 5px;background-color: #096BAA;}
 Прочее:
     .col{
    width: 85px;
    overflow: hidden;
}
 */
	
	</style>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии


echo "<section style='background-color: cadetblue'>
<br>
<div class='container' style='min-height: 50px;'>
</div>

";

echo "<section>
<br>
<div class='container-fluid' style='min-height: 800px'>

<br>
    <div class='row '>
        <div class='col-md-4 order-first '>
            <div class=\"spick row form-control\" style=\"min-height: 250px; max-height: 500px;\">
                <div class='col'>
                <div class='block row-md-12 form-control justify-content-end'>
                    <div class='row' >
                        <button type='button' class='btn btn-outline-secondary'>Применить</button>
                    </div>
                </div><br>
                        <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERTEXPERTEXPERTEXPERTEXPERTEXP:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-12' placeholder='Score' >
                                    </div>
                                </div>
                               
                                <br>              
                            </div>       
                        </div>
                        
                        <br>
                        
                <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                               
                                <br>              
                            </div>       
                        </div>
                        
                        <br>
                        
                        
                <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                               
                                <br>              
                            </div>       
                        </div>
                        
                        <br>        
                
                <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                               
                                <br>              
                            </div>       
                        </div>
                        
                        <br>
                
                        <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                   <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                   </div>
                                </div>
                                <br>              
                            </div>       
                        </div>
                        
                        <br>
                      
                <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                                <br>              
                            </div>       
                        </div>
                        
                        <br>        
                                       
                 <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                   <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                   </div>
                                </div>
                               
                                <br>              
                            </div>       
                        </div>
                        
                        <br>
                        
                 <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                                <br>              
                            </div>       
                        </div>
                        <br>
                        
                 <div class='col-md form-control text-justify' style=\"min-height: 100px;\">
                            <div class='col1-md-4'
                                    <br>
                                <h6>EXPERT:</h6>
                                <div class='row justify-content-end'>
                                    <div class='col-md-5'>
                                         <input type='text' class='col-md-12' placeholder='Score' >
                                    </div>
                                </div>
                                <br>              
                            </div>       
                        </div>
                        <br>
                </div> 
            </div>       
        </div>";


echo"              
        <div class='parent col-md-8 order-4'>
            <div class=\"spick row form-control\" style=\"min-height: 250px; max-height: 500px; \"> 
            <div class='block row-md-12 '>
                 <div class='row'>
                     <input type='text' name='find' id='find' class='form-control' style='max-width: 300px;  ' placeholder='Поиск по тегам' oninput='changeFind()'>
                 </div> 
            </div>
            <br>
                <div class=\"row form-control\" style=\"min-height: 200px; \"> 
                    <div class='col-md-3'>
                        <br>
                        <img src='my/images/bg_dark.png' class=\"img-fluid img-thumbnail\" alt=\"...\">
                        <br>
                    </div>
                
                    <div class='col-md-6' >
                        <div class='row' >
                            <div class='spick col' style='max-height: 200px;'>
                                <br>
                               <h4 style='max-height: 250px;'>Заголовок:</h4>  
                               <p>Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...Типо тута ОПЫСАНИЕ! КРАТКОЕ...</p> 
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col'>
                                <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                                <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                                <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                                <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                                <span class=\"badge badge-pill badge-primary\">Отличная</span>
                            </div>
                              
                        </div>";


echo"                       
                        <div class='row'>
                            <div class='col'>
                                <hr class=\"my-4\" />
                                <div class='row'>
                                    <div class='col-6'>
                                    <div style=\"float: right\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                        <span class=\"badge badge-pill badge-success\">Лайк: 1</span> 
                                    </div>
                                    
                                    <div style=\"float: right\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Администратор Лайк: 1</span>    
                                    </div>
                                    
                                    <div style=\"float: right\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Бухгалтерия Лайк: 1</span>  
                                    </div>
                                    
                                    <div style=\"float: right\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Экономист Лайк: 1</span>    
                                    </div>
                                    
                                    <div style=\"float: right\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Электро Лайк: 1</span> 
                                    </div>
                                    </div>
                                    
                                    <div class='col-6''>
                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                        <span class=\"badge badge-pill badge-danger\">Дизлайк: 1</span> 
                                    </div>
                                    
                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-danger\">Администратор Дизлайк: 1</span>    
                                    </div>
                                    
                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-danger\">Бухгалтерия Дизлайк: 1</span>  
                                    </div>
                                    
                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-danger\">Экономист Дизлайк: 1</span>    
                                    </div>
                                    
                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-danger\">Электро Дизлайк: 1</span> 
                                    </div>
                                    </div>
                                    
                                </div> 
                            </div>
                        </div>
                        
                             
                    </div>
                    
                    <div class='col-md-3'>
                        <div class='row' style='min-height: 150px;'>
                            <div class='col-md-6 text-justify'>
                                                       
                            </div>
                            <div class='col-md-6 text-justify'>
                                    <br>   
                                    <p>28.11.20 07:24</p>                     
                            </div>
                        </div>
                        <div class='row justify-content-end'>
                            <div class='col-md-10'>
                                <a href='' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                            </div>
                        </div>
                    </div>
                   
                    
                    
                </div>
                
                <br>
            
           <div class=\"row form-control\" style=\"min-height: 200px; \"> 
                    <div class='col-md-3'>
                        <br>
                       <img src='my/images/bg_dark.png' class=\"img-fluid img-thumbnail\" alt=\"...\" style='max-height: 200px'>
                        <br>
                    </div>
                
                    <div class='col-md-6'>
                        <div class='row'>
                            <div class='spick col' style='max-height: 200px;'>
                                <br>
                               <h4 style='max-height: 250px;'>Заголовок:</h4>  
                               <p>gjsdkjkdshgfjsdklgjflghjdasljkghnjsdf gjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdf</p> 
                            </div>
                        </div>
                        
                       
                    </div>
                    
                    <div class='col-md-3'>
                        <div class='row' style='min-height: 150px;'>
                            <div class='col-md-6 text-justify'>
                                <br>
                           
                                <br>                           
                            </div>
                            <div class='col-md-6 text-justify'>
                                    <br>   
                                    <p>28.11.20 07:30</p>                     
                            </div>
                        </div>
                        <div class='row justify-content-end'>
                            <div class='col-md-10'>
                                <a href='' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
                
           <div class=\"row form-control\" style=\"min-height: 200px; \"> 
                    <div class='col-md-3'>
                        <br>
                        <img src='my/images/bg_dark.png' class=\"img-fluid img-thumbnail\" alt=\"...\" style='max-height: 200px'>
                        <br>
                    </div>
                
                    <div class='col-md-6'>
                        <div class='row'>
                            <div class='spick col' style='max-height: 200px;'>
                                <br>
                               <h4 style='max-height: 250px;'>Заголовок:</h4>  
                               <p>gjsdkjkdshgfjsdklgjflghjdasljkghnjsdf gjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdfgjsdkjkdshgfjsdklgjflghjdasljkghnjsdf</p> 
                            </div>
                        </div>
                        
                       
                    </div>
                    
                    <div class='col-md-3'>
                        <div class='row' style='min-height: 150px;'>
                            <div class='col-md-6 text-justify'>
                                <br>
                           
                                <br>                           
                            </div>
                            <div class='col-md-6 text-justify'>
                                    <br>   
                                    <p>28.11.20 07:33</p>                     
                            </div>
                        </div>
                        <div class='row justify-content-end'>
                            <div class='col-md-10'>
                                <a href='' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<br>    
</section>
";
echo '
</body>
</html>';
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать

/*<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-hand-thumbs-up' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule=\"evenodd\" d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'>

                                </svg>



<div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                        <span class=\"badge badge-pill badge-success\">Лайк: 1</span>
                                        <span class=\"badge badge-pill badge-danger\">Дизлайк: 1</span>
                                    </div>

                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Администратор Лайк: 1</span>
                                          <span class=\"badge badge-pill badge-danger\">Администратор Дизлайк: 1</span>
                                    </div>

                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Бухгалтерия Лайк: 1</span>
                                          <span class=\"badge badge-pill badge-danger\">Бухгалтерия Дизлайк: 1</span>
                                    </div>

                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Экономист Лайк: 1</span>
                                          <span class=\"badge badge-pill badge-danger\">Экономист Дизлайк: 1</span>
                                    </div>

                                    <div style=\"float: left\" class=\"btn-group mr-1 mb-1\" aria-label=\"Basic example\">
                                          <span class=\"badge badge-pill badge-success\">Электро Лайк: 1</span>
                                          <span class=\"badge badge-pill badge-danger\">Электро Дизлайк: 1</span>
                                    </div>
*/