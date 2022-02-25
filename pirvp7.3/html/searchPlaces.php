<?php
require_once '../connect.php';
$jsonAll = [];
$jsonRow = [];

$keyword = trim($_REQUEST['term']);
$keyword = preg_replace('/\s+/', ' ', $keyword);

$occupiedPlace = [];
$resOrders = checkResult($mysqli, "SELECT * FROM orders");
while ($rowOrders = mysqli_fetch_assoc($resOrders)) {
    $occupiedPlace[] = $rowOrders['place'];
}

$query = "SELECT * FROM places WHERE title LIKE CONCAT('%','$keyword','%') or area LIKE CONCAT('%','$keyword','%')";
$res = checkResult($mysqli, $query);

if ($res->{'num_rows'} > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (!in_array($row['id'], $occupiedPlace)) {
            $jsonRow["value"] = $row['title'] . " " . $row['area'];
            array_push($jsonAll, $jsonRow);
        }
    }
}

$jsonOutput = json_encode($jsonAll, JSON_UNESCAPED_SLASHES);
print $jsonOutput;