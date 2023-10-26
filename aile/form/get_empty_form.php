<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'] ?? 1;
    $data = ['html' => require_once 'form_element.php'];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die();
}
die();