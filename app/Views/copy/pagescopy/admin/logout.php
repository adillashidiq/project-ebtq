<?php
session_start();
session_unset();
session_destroy();
$msg = "<p class= 'alert alert-success'>Berhasil Logout</p>";
header("location: /pages/login?msg=$msg");
