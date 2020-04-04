<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/css/style" /> 
        <!--responsive meta tag-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="">
		<meta name="keywords" content="" />
		<!--Google font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<!--Bootstrap css compilé-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<!--CDN jquery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!--Bootstrap js compilé-->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/8692d3a619.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/jtoheklq5t6f90kwzh7wixgxawh8tno3w15xlqtdfgtpcthb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: '#mytextarea'
        });
        </script>
    </head>
        
    <body>
    	<?php require("menu.php"); ?>

    	<div class="container-fluid">
        	<?= $content ?>
    	</div>
    	<?php require('footer.php'); ?>
    </body>
</html>
