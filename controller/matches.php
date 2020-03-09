<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once '../model/dataAccess.php';


if ( !empty($_POST['search_by_date']) ) {
	$date = !empty($_POST['search-date']) ? trim($_POST['search-date']) : null;
	$matches = search_match_by_date($date);
}   

elseif ( !empty($_POST['search-opponent'] ) ) {
	$opponent = !empty($_POST['search-opponent']) ? trim($_POST['search-opponent']) : null;
	$matches = search_match_by_opponent($opponent);
}

elseif ( !empty($_POST['search_type_position']) ) {
    $location = isset($_POST['match_type']) ? trim($_POST['match_type']) : null;
	$position = !empty($_POST['position']) ? trim($_POST['position']) : null;
	$matches = search_type_position($location);
}

else {
    $matches = get_all_matches();
}

if ( isset($_POST['add_cart']) ) {
    $matchID = !empty($_POST['matchID']) ? trim($_POST['matchID']) : null;
    $match = get_specific_match($matchID);
    $seatingPosition = !empty($_POST['seatingPosition']) ? trim($_POST['seatingPosition']) : null;
    $isBusTicketBooked = !empty($_POST['busTicket']) ? trim($_POST['busTicket']) : null;
    
    if ( empty($_SESSION['cart']) ) {
        $_SESSION['cart'] = array();
    }
    
    if ( $match ) {
    
        // if this ticket has already been bought, just increase the quantity
        foreach ($_SESSION['cart'] as $key => $value) {
            if( $_SESSION['cart'][$key]['matchID'] == $matchID && $_SESSION['cart'][$key]['busTicketBooked'] == $isBusTicketBooked && $_SESSION['cart'][$key]['seatingPosition'] == $seatingPosition) {
                    $_SESSION['cart'][$key]['quantity'] += 1;
                    header ('Location: matches.php');
                    exit;
                }
        }

        $item = array(
            'matchID'   => $matchID,
            'userID'    => $_SESSION['userID'],
            'isHome'    => $match->isHome,
            'price'     => $match->price,
            'opponent'  => $match->teamName,
            'matchType' => $match->matchType,
            'seatingPosition' => $seatingPosition,
            'quantity'  => 1,
            'busTicketBooked' => $isBusTicketBooked
        );        
        array_push($_SESSION['cart'], $item);

    }
    else {
        die('something wrong');
    }

}


if ( isset($_POST['addMatch']) ) {
    $opponent = !empty($_POST['teamID']) ? trim($_POST['teamID']) : null;
    $match_date = !empty($_POST['match_date']) ? trim($_POST['match_date']) : null;
    $price = !empty($_POST['price']) ? trim($_POST['price']) : null;
    $match_type = !empty($_POST['match_type']) ? trim($_POST['match_type']) : null;
    $isHome = isset($_POST['location']) ? trim($_POST['location']) : null;
    
    $new_match = new Matches();
    $new_match->opponent = $opponent;
    $new_match->matchDate = $match_date;
    $new_match->price = $price;
    $new_match->matchType = $match_type;
    $new_match->isHome = $isHome;
    
    $result = insert_match($new_match);

    if ( $result ) {
        echo 'SUCCESSFUL';
        header('Location: matches.php');
        exit;
    }
    else {
        die('something wrong!!');
    }
}


if ( isset($_POST['addTeam']) ) {
    $teamName = !empty($_POST['teamName']) ? trim($_POST['teamName']) : null;
    $stadiumID = !empty($_POST['stadiumID']) ? trim($_POST['stadiumID']) : null;
    
    $new_team = new Teams();
    $new_team->teamName = $teamName;
    $new_team->stadiumID = $stadiumID;
    
    $result = insert_team($new_team);

    if ( $result ) {
        echo 'SUCCESSFUL';
        header('Location: matches.php');
        exit;
    }
    else {
        die('something wrong!!');
    }
}


if ( isset($_POST['addStadium']) ) {
    $stadiumName = !empty($_POST['stadiumName']) ? trim($_POST['stadiumName']) : null;
    $stadiumAddress = !empty($_POST['stadiumAddress']) ? trim($_POST['stadiumAddress']) : null;
    $noOfSeats = !empty($_POST['noOfSeats']) ? trim($_POST['noOfSeats']) : null;
    
    $new_stadium = new Stadiums();
    $new_stadium->stadiumName = $stadiumName;
    $new_stadium->location = $stadiumAddress;
    $new_stadium->noOfSeats = $noOfSeats;
    
    $result = insert_stadium($new_stadium);

    if ( $result ) {
        echo 'SUCCESSFUL';
        header('Location: matches.php');
        exit;
    }
    else {
        die('something wrong!!');
    }
}


require_once '../view/includes/a_config.php';
require_once '../view/main/matches_view.php';

?>