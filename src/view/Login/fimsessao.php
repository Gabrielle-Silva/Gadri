<?php


include_once('../../../lib/config.php');
session_start();

session_destroy();

header('location: ../../../index.php');
