<?php
session_start();
session_reset();
session_destroy();
header('Location: http://servidor-php-nla.azurewebsites.net');
?>