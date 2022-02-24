<?php
require_once '../connect.php';
$sugg_json = [];
$json_row = [];

$keyword = trim($_REQUEST['term']);
$keyword = preg_replace('/\s+/', ' ', $keyword);

$query = "SELECT * FROM owners WHERE name LIKE CONCAT('%','$keyword','%') 
                        or lastname LIKE CONCAT('%','$keyword','%') or phone_number LIKE CONCAT('%','$keyword','%')";

$row = checkResult($mysqli, $query);
if ($row->{'num_rows'} > 0) {
    while ($recResult = mysqli_fetch_assoc($row)) {
        $json_row["value"] = $recResult['name'] . " " . $recResult['lastname'] . " " . $recResult['phone_number'];
        array_push($sugg_json, $json_row);
    }
}

$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES);
print $jsonOutput;