<?php
require_once '../connect.php';
$jsonAll = [];
$jsonRow = [];

$keyword = trim($_REQUEST['term']);
$keyword = preg_replace('/\s+/', ' ', $keyword);

$query = "SELECT * FROM cars WHERE brand LIKE CONCAT('%','$keyword','%') 
              or model LIKE CONCAT('%','$keyword','%') or number LIKE CONCAT('%','$keyword','%')";
$res = checkResult($mysqli, $query);

if ($res->{'num_rows'} > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $jsonRow["value"] = $row['brand'] . " " . $row['model'] . " " . $row['number'];
        array_push($jsonAll, $jsonRow);
    }
}

$jsonOutput = json_encode($jsonAll, JSON_UNESCAPED_SLASHES);
print $jsonOutput;