<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include 'views/v_gabarit_entete.php';
include 'models/m_model.php';
include 'views/v_menu.php';

$pdo=PdoBridge::getPdoBridge();

$uc = 'gerer';
$action = 'accueil';
if (isset($_REQUEST['action'])) {
    $action=$_REQUEST['action'];
}

if (isset($_REQUEST['uc'])) {
    $uc=$_REQUEST['uc'];
}




include "controllers/c_$uc.php";


include("views/v_gabarit_pied.php");



