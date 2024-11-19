<?php
$loginx=$_POST["usuario"];
$senhax=$_POST["senha"];

//$loginx="sergio@gmail.com";
//$senhax="123456";


$con=mysqli_connect("localhost","id22128108_voluntaria_bd","Senha:123","id22128108_voluntaria_bd");  // o usuario e a senha do banco e o nome do banco de dados

$comando= "select * from Voluntario where email='$loginx' and 
senha='$senhax'";
$resulta = mysqli_query($con,$comando);
 $dados=array("status"=>"-");
while($r = mysqli_fetch_array($resulta)){
 $dados=array("status"=>"ok","email"=>$r[2],"senha"=>$r[6],"nome"=>$r[1], "bio"=>[3]);
}
$close = mysqli_close($con);
echo json_encode($dados);
?>