<?php
    include_once('../vendor/autoload.php');
    $id = $_POST['id'];
    AdoModeloCertificado::deleteModeloCertificado($id);