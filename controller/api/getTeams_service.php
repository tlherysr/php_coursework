<?php
header('Content-Type: application/json');

require_once '../../model/dataAccess.php';


if (!isset($_REQUEST["teamname"])) {
    echo json_encode([]); // send empty array
}
else {
    $teams = get_teams_by_start_of_name($_REQUEST["teamname"]);
    echo json_encode($teams);
}

?>
