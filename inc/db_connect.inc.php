<?php
// db_connect.inc.php

$db = new mysqli("34.83.46.55", 'root', 'Tampax187', 'tracking');

if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

$db->set_charset('utf8');