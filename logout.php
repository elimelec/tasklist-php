<?php

include_once "session.php";
include_once "sql.php";

delete_session(get_session_token());
session_destroy();
session_commit();

header("Location: /");
