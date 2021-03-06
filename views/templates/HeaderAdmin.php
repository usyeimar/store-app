<?php
require_once'models/usermodel.php';
$url = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($url, '/');
$url = explode('/', $url);

$title  = $url[0];

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="Public/Libraries/datatables.min.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>/Public/css/default.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>/Public/css/user.css">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">
  <!--Favicon Icon-->
  <link  rel="icon"    href="./assets/img/usuario.png" type="image/png" />

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title><?php echo constant('COMPANY_NAME')?> App -
    <?php echo ucfirst($title); ?>
  </title>
</head>