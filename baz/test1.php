<?php 
session_start();
$_SESSION[""];
?>
<?php
session_start();

// $file_path= '..\foo\bar\test1.php';

// echo realpath($file_path);
// echo '<br>';

/*$file_path2 = implode(DIRECTORY_SEPARATOR, [__DIR__,"..","foo","bar","my-file.json"]);

//$data = ['foo','bar','baz'];

//$json = json_encode($data);

//echo file_put_contents($file_path2."my-file.json",$json);
echo var_dump(is_file($file_path2));
echo '<br>';
if(is_file($file_path2)){
    $json = file_get_contents($file_path2);
    $jsonDec = json_decode($json);
    echo $jsonDec[1];
}
else{
    echo "pas top";
}*/

//$jsonarray = file($file_path2);

$file_path3 = implode(DIRECTORY_SEPARATOR, [__DIR__,"..","foo","bar","my-file.json"]);

$data = ["foo","bar","baz"];

$json1 = json_encode($data);
header("Content-Type: application/json");
echo $json1;
//header('Location: /baz/test2.php');