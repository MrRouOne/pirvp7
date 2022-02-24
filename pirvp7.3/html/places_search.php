<?php
require_once '../connect.php';
$sugg_json = [];
$json_row = [];

$keyword = trim($_REQUEST['term']);
$keyword = preg_replace('/\s+/', ' ', $keyword);

$closePlace = [];
$resOrders = checkResult($mysqli, "SELECT * FROM orders");

while ($rowOrders = mysqli_fetch_assoc($resOrders)) {
    $closePlace[] = $rowOrders['place'];
}


$query = "SELECT * FROM places WHERE title LIKE CONCAT('%','$keyword','%') or area LIKE CONCAT('%','$keyword','%')";

$res = checkResult($mysqli, $query);
if ($res->{'num_rows'} > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (!in_array($row['id'], $closePlace)) {
            $json_row["value"] = $row['title'] . " " . $row['area'];
            array_push($sugg_json, $json_row);
        }
    }
}

$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES);
print $jsonOutput;