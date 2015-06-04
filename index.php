<?php

include_once "session.php";
include_once "page.php";
include_once "controller.php";

controller_print_page($_SERVER['REQUEST_URI']);
