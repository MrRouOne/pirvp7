<?php
require_once '../connect.php';
$sugg_json = [];
$json_row = [];

$keyword = trim($_REQUEST['term']);
$keyword = preg_replace('/\s+/', ' ', $keyword);

$query = "SELECT * FROM cars WHERE brand LIKE CONCAT('%','$keyword','%') 
              or model LIKE CONCAT('%','$keyword','%') or number LIKE CONCAT('%','$keyword','%')";

$res = checkResult($mysqli, $query);
if ($res->{'num_rows'} > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $json_row["value"] = $row['brand'] . " " . $row['model'] . " " . $row['number'];
        array_push($sugg_json, $json_row);
    }
}

$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES);
print $jsonOutput;