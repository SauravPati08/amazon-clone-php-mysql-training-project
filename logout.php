<?php

session_start();
session_destroy();

// Redirecting to the index.php

header('Location:index.php');

?>