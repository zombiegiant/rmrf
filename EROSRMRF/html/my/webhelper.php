<?php
session_start();
$con=mysqli_connect("localhost","a0214888_hackaton","qAYHWhpv","a0214888_hackaton");
if(!$con){
	print "Fail";}
if(isset($_POST['exit'])) {unset($_SESSION['name']);session_destroy();}
 
 function viewSelect($zapr)
{
$time_start=microtime(true);
$con=mysqli_connect("localhost","root","","test");
$result=mysqli_query($con,$zapr);
$time_end=microtime(true);
$extime=$time_end-$time_start;

if($result) { 
$str="Время выполнения ".$extime." секунд";
$str.="<div style=\"overflow:auto; height:100%; \">
<table border=1; style=\"font-size:14 width:100%; \">";
$row = mysqli_fetch_array($result);
$keys = array_keys($row);
$str.= "<tr>";
$i=1;
while ($keys[$i]) {$str.="<td><b>".$keys[$i]."</b></td>"; $i+=2;}
$str.= "</tr>";
do {
$i=0;
$str.="<tr>";
 while($row[$i]) {
$str.= "<td>".$row["$i"]."</td>";
$i++;
 };
$str.= "</tr>";
} while ($row = mysqli_fetch_array($result));
$str.= "</table></div>";
return $str;} else {
print mysqli_error($con);
exit();}
}

 function zapr()
 {	
	 print "<p><input type='submit' name='start' form='data' value='Старт!'> </p>";
	if(isset($_POST['zapr'])) {$zapros=$_POST['zapr'];} else {$zapros="# Поле для SQL запроса";}
	print "<div style='position:relative;bottom:2px;'><textarea form='data'  style='font-family:monospace; font-size:$_SESSION[sz];' name='zapr' cols='$_SESSION[col]'rows='$_SESSION[row]'>$zapros</textarea>";
	print "<p><input type='submit' name='start1' value='Старт!' form='data'> </p></div>";

	 }
 
 function entryfunc($status)
{
print "<html>";
print "<head><meta charset='utf-8'>";
print "<title>";
print "SQL помощник";
print "</title>";
print "<body>";
print $status;
print "<form action='webhelper.php' method='POST'>
<p><input type='text' name='log' required placeholder='Логин'></p>
<p><input type='text' name='pas' required placeholder='Пароль'></p>
<p><input type='submit'  value='Вход'></p>
</form>";
mysqli_close($con);
print "</body>";
print "</html>";

	}
function showsettings($con,$log,$pas)
{
	print "<div style='position:relative; width:600px; height:200px;'>";
print "<div style='position:absolute; left:2px;'><p><input type='submit' name='save' value='Сохранить' form='data'> </p><br>";
print "<a href=\"#openModal\" class=\"bhz\">Загрузить</a>";
print "<div id=\"openModal\" class=\"modalDialog\">
<div><a href=\"#close\" title=\"Закрыть\" class=\"close\">X</a>";
$sql="select * from settings where user='$log'";
$result=mysqli_query($con,$sql);
print "<form action='webhelper.php' method='post'>";
print "<select name='nastrid'>";
print "<option value='0'>Выбор настроек</option>";
while ($object=mysqli_fetch_object($result)){
$id=$object->id;
$col=$object->col;
$row=$object->row1;
$sz=$object->sz;
print "<option value = '$id' >$col $row $sz</option>";}
print "</select>";
print "<input type='text' name='log' hidden value='$log' >";
print "<input type='text' name='pas' hidden value='$pas' >";
print "<input type='submit' value='Загрузить' > <br>";
print "</form>";
if(isset($_POST['nastrid'])){
	$_SESSION['nid']=$_POST['nastrid'];}
if(isset($_SESSION['nid'])) {
	$sql="select * from settings where id=".$_SESSION['nid'];
	$result=mysqli_query($con,$sql);
	$obj=mysqli_fetch_object($result);
	$col=$obj->col;
	$row=$obj->row1;
	$sz=$obj->sz;
	$_SESSION['col']=$col;
	$_SESSION['row']=$row;
	$_SESSION['sz']=$sz;
}
print "</div></div></div>
<div style='position:absolute; right:2px;'>
<form action='webhelper.php' id='data' method='POST'>
<p>Столбцов:      <input type='text' name='col' value='$_SESSION[col]'></p>
<p>Строк:         <input type='text' name='row' value='$_SESSION[row]'></p>
<p>Размер шрифта: <input type='text' name='sz' value='$_SESSION[sz]'></p>
<input type='text' name='log' hidden value='$log'>
<input type='text' name='pas' hidden value='$pas'>
</form></div>
</div>
<div style='position:absolute; right:2px; top:2px;'>
<form action='webhelper.php' method='POST'>
<input type='submit' name='exit' value='Выход'>
</form>
</div> ";
	
	}	
 
	
	
	
	
//error_reporting (0);
if(!isset($_POST['log']) && !isset($_POST['pas']) && !$_SESSION['name']) {$status='Введите логин и пароль';entryfunc($status);} else {
if(($_POST['log']!='') && ($_POST['pas']!=''))
{
	$_SESSION['name']=$_POST['log'];
	$_SESSION['col']=20;
	$_SESSION['row']=20;
	$_SESSION['sz']=15;
$pas=$_POST['pas'];}
$log=$_SESSION['name'];
$sql="select log from entry where log='$log' and pass='$pas'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_object($result);
if($row->log != '')
{ 
print "<html>";
print "<head><meta charset='utf-8'>";
print "<title>";
print "SQL помощник";
print "</title>";
print "<style type='text/css'>
    .modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	display: none;
	pointer-events: none;
}
.modalDialog:target {
	display: block;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
}
.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #00d9ff; }

.bhz {
 text-align:center;
	color: black;
        font-size:14px;
        text-decoration: none;
        padding: 6px;
        background: #eaeef1;
        display:block;
        width:10vw;
        margin: 20px auto;

        border-radius: 3px;
        text-shadow: 0 1px 1px rgba(255,255,255,.7);
        box-shadow: 0 0 0 1px rgba(0,0,0,.2), 0 1px 2px rgba(0,0,0,.2), inset 0 1px 2px rgba(255,255,255,.7);

}
.bhz:hover, .bhz.hover {
        background: #fff;
}
.bhz:active, .bhz.active {
        background: #d0d3d6;
        background-image: linear-gradient(rgba(0,0,0,.1), rgba(0,0,0,0));
        box-shadow: inset 0 0 2px rgba(0,0,0,.2), inset 0 2px 5px rgba(0,0,0,.2), 0 1px rgba(255,255,255,.2);
}
</style>
</head>";
print "<body>";
//if(($_POST['col']!=NULL)&&($_POST['row']!=NULL)&&($_POST['sz']!=NULL)){
//	mysqli_query($con,"select from save_settings(col,row,sz)");}
if(isset($_POST['save'])&& isset($_POST['col'])&& isset($_POST['row'])&& isset($_POST['sz'])) 
{(int)$col=$_POST['col'];
 (int)$row=$_POST['row'];
 (int)$sz=$_POST['sz'];
 //print $log;

 $stat=mysqli_query($con,"CALL save_settings($col,$row,$sz,'$log')");
 if($stat) print "saved";
	}
//отсюда все в функцию для настроек
showsettings($con,$log,$pas);
//вот до этого момента

//отсюда в функцию запросов
zapr();
//вот до этого момента

if(isset($_POST['start'])||isset($_POST['start1'])){
if($_POST['zapr']) 
//print $_POST['zapr'];
//print $_POST['zapr'];
print viewSelect($_POST['zapr']);}
print "</body>";

mysqli_close($con);
print "</html>";} else {$status='Не правильный логин или пароль!'; entryfunc($status);}}
?>

