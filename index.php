<?php

include_once "session.php";
include_once "page.php";
include_once "controller.php";

page_header();
controller_print_page($_SERVER['REQUEST_URI']);
page_footer();
