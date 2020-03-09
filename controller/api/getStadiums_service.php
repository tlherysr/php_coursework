<?php
header('Content-Type: application/json');

require_once '../../model/dataAccess.php';


if (!isset($_REQUEST["stadiumname"])) {
    echo json_encode([]); // send empty array
}
else {
    $stadiums = get_stadiums_by_start_of_name($_REQUEST["stadiumname"]);
    echo json_encode($stadiums);
}

?>
