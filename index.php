<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('structure/links.php') ?>
</head>
<body>
<?php include('structure/header.php') ?>
<?php include('structure/banner.php') ?>
<?php
session_start();
if (!isset($_SESSION['login'])) {
    include('structure/form-login-subscription.php');
}
?>
<?php include('structure/newsletter.php') ?>
<?php include('structure/footer.php') ?>
<?php include('structure/import-javascript.php') ?>
</body>
</html>
