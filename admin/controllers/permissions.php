<?php

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

if(empty($url_parts[3])) {
    require("views/permissions.php");
} else {
    require("views/permissions-user.php");
}
