<?php
session_start();

// end session
session_destroy();


header("Location: ../index.php");
