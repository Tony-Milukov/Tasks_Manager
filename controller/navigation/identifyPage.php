<?php
$page = $_SERVER['REQUEST_URI'] == "/" ? $page = "home" : ($_GET["page"] ?? "error");

require_once  "pagesRoutes.php";

require_once $routes[$page] ?? $routes["error"];

