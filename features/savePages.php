<?php
require_once '../database/updateDataFromQuery.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$name = $data['name'];
$enabled = $data['enabled'] === true ? 1 : 0;


$query = "UPDATE pages SET name = :name, enabled = :enabled WHERE id = :id";
$params = ['name' => $name, 'enabled' => $enabled, 'id' => $id];

$rowsAffected = updateDataFromQuery($query, $params);

if ($$rowsAffected > 0) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
