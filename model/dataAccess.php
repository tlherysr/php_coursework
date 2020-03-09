<?php 

require_once "db_classes.php";
require_once "connect.php";


function is_user($username) {
    global $pdo;
    $sql = "SELECT username, password, isAdmin FROM Users WHERE username = :username";
    $statement = $pdo->prepare($sql);
    
    //Bind value.
    $statement->bindValue(':username', $username);

    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Users'); 

    //Execute
    $statement->execute();
    $user = $statement->fetch();
    
    return $user;
}


function insert_user($new_user) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();
    
    // Hash the password
    $hashedPassword = $new_user->hash_user_password();

    $sql = "INSERT INTO Users (id, username, password, firstName, lastName, address, phoneNo, email) VALUES (:id, :username, :password, :firstName, :lastName, :address, :phoneNo, :email)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':username', $new_user->username);
    $statement->bindValue(':password', $hashedPassword);
    $statement->bindValue(':firstName', $new_user->firstName);
    $statement->bindValue(':lastName', $new_user->lastName);
    $statement->bindValue(':address', $new_user->address);
    $statement->bindValue(':phoneNo', $new_user->phoneNo);
    $statement->bindValue(':email', $new_user->email);

    //Execute the statement and insert the new account.
    $result = $statement->execute();
    return $result;
}


function fetch_user_profile($username) {
    global $pdo;
    $sql = "SELECT id, username, password, email, firstName, lastName, address, phoneNo FROM Users WHERE username = :username";
    // $sql = "SELECT u.id, u.username, u.password, u.email, u.firstName, u.lastName, u.address, u.phoneNo, m.matchDate, m.opponent, m.isHome, m.matchType FROM Tickets t, Users u, Matches m WHERE u.id = t.userID and t.matchID = m.id and u.username = :username";
    
    $statement = $pdo->prepare($sql);
    
    //Bind value.
    $statement->bindValue(':username', $username);

    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Users'); 

    //Execute
    $statement->execute();
    $user = $statement->fetch();
    
    return $user;
}


function get_all_matches() {
    global $pdo;
    $sql = "SELECT m.id, m.opponent, m.matchDate, m.matchType, m.isHome, m.price, t.teamName FROM Matches m INNER JOIN Teams t ON m.opponent = t.id";
    $statement = $pdo->prepare($sql);
    
    $statement->execute();
    
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Matches");
    return $results;
}


function get_specific_match($id) {
    global $pdo;
    $sql = "SELECT m.isHome, m.price, m.matchType, t.teamName FROM Matches m INNER JOIN Teams t ON m.opponent = t.id WHERE m.id = :id";
    $statement = $pdo->prepare($sql);
    
    //Bind value.
    $statement->bindValue(':id', $id);

    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Matches');

    //Execute
    $statement->execute();
    
    $match = $statement->fetch();
    return $match;
}


function is_full($seatingPosition, $matchID) {
    global $pdo;
    $sql = "SELECT * FROM Tickets WHERE seatingPosition = :seatingPosition AND matchID = :matchID";

    $statement = $pdo->prepare($sql);

    //Bind value.
    $statement->bindValue(':seatingPosition', $seatingPosition);
    $statement->bindValue(':matchID', $matchID);
    
    //Set Fetch Mode 
    $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Tickets'); 

    //Execute
    $statement->execute();
    $result = $statement->fetch();

    return $result;

}


function add_ticket($new_ticket) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();

    $sql = "INSERT INTO Tickets (id, matchID, userID, seatingPosition) VALUES (:id, :matchID, :userID, :seatingPosition)";
    $statement = $pdo->prepare($sql);

    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':matchID', $new_ticket->matchID);
    $statement->bindValue(':userID', $new_ticket->userID);
    $statement->bindValue(':seatingPosition', $new_ticket->seatingPosition);
    
    //Execute the statement and insert the new account.
    $result = $statement->execute();
    return $result;
}


function get_empty_seats($match) {
    global $pdo;
    $sql = "SELECT seatingPosition FROM Tickets WHERE matchID = :matchID";
    $statement = $pdo->prepare($sql);
    $full_seats = [];
    
    $statement->bindValue(':matchID', $match->id);

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Tickets");
    
    foreach ($results as $result) {
        array_push($full_seats, $result->seatingPosition);
    }

    $all_seats = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "A10", 
                  "B1", "B2", "B3", "B4", "B5", "B6", "B7", "B8", "B9", "B10", 
                  "C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9", "C10", 
    ];
    
    $empty_seats = array_diff($all_seats, $full_seats);

    return $empty_seats;
}


function search_match_by_date($date) {
    global $pdo;
    $sql = "SELECT m.id, m.opponent, m.matchDate, m.matchType, m.isHome, m.price, t.teamName FROM Matches m INNER JOIN Teams t ON m.opponent = t.id WHERE m.matchDate = :matchDate";
    $statement = $pdo->prepare($sql);

    //Bind value.
    $statement->bindValue(':matchDate', $date);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Matches");
    return $results;
}


function search_match_by_opponent($opponent) {
    global $pdo;
    $sql = "SELECT m.id, m.opponent, m.matchDate, m.matchType, m.isHome, m.price, t.teamName FROM Matches m INNER JOIN Teams t ON m.opponent = t.id WHERE t.teamName = :opponent";
    $statement = $pdo->prepare($sql);

    //Bind value.
    $statement->bindValue(':opponent', $opponent);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Matches");
    return $results;
}


// TODO: This function is not working as it should be. Position search should be fixed.
function search_type_position($type=NULL, $position=NULL) {
    global $pdo;
    $sql = "SELECT m.id, m.opponent, m.matchDate, m.matchType, m.isHome, m.price, t.teamName FROM Matches m INNER JOIN Teams t ON m.opponent = t.id WHERE m.isHome = :type";
    $statement = $pdo->prepare($sql);

    //Bind value.
    $statement->bindValue(':type', $type);
    // $statement->bindValue(':position', $position);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Matches");
    return $results;
}


function get_user_tickets($id){
    global $pdo;
    $sql = "SELECT m.matchDate, m.opponent, m.isHome, m.matchType FROM Tickets t, Users u, Matches m WHERE u.id = t.userID and t.matchID = m.id and u.id = :id";
    $statement = $pdo->prepare($sql);

    //Bind value.
    $statement->bindValue(':id', $id);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_CLASS,"Matches");
    return $results;

}


function insert_match($new_match) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();
    $sql = "INSERT INTO Matches (id, opponent, matchDate, price, matchType, isHome) VALUES (:id, :opponent, :matchDate, :price, :matchType, :isHome)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':opponent',  $new_match->opponent);
    $statement->bindValue(':matchDate', $new_match->matchDate);
    $statement->bindValue(':price',     $new_match->price);
    $statement->bindValue(':matchType', $new_match->matchType);
    $statement->bindValue(':isHome',    $new_match->isHome);

    //Execute the statement and insert the new match.
    $result = $statement->execute();
    return $result;
}


function insert_order_and_tickets($new_order, $tickets) {
    global $pdo;
    
    // Get Order Uniq ID
    $order_id = uniqid();

    // Insert tickets first
    foreach ($tickets as $key => $value) {
        $ticket_id = uniqid();
        $sql = "INSERT INTO Tickets (id, matchID, userID, orderID, seatingPosition) VALUES (:id, :matchID, :userID, :orderID, :seatingPosition)";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':id', $ticket_id);
        $statement->bindValue(':matchID', $tickets[$key]['matchID']);
        $statement->bindValue(':userID', $tickets[$key]['userID']);
        $statement->bindValue(':orderID', $order_id);
        $statement->bindValue(':seatingPosition', $tickets[$key]['seatingPosition']);

        $result = $statement->execute();
    }

    
    // Hash the password
    $hashedCvv = $new_order->hash_cvv();

    $sql = "INSERT INTO Orders (id, fullName, email, address, city, state, zip, nameOnCard, creditCardNumber, expiryMonth, expiryYear, cvv, totalCost) VALUES (:id, :fullName, :email, :address, :city, :state, :zip, :nameOnCard, :creditCardNumber, :expiryMonth, :expiryYear, :cvv, :totalCost)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':fullName',          $new_order->fullName);
    $statement->bindValue(':email',             $new_order->email);
    $statement->bindValue(':address',           $new_order->address);
    $statement->bindValue(':city',              $new_order->city);
    $statement->bindValue(':state',             $new_order->state);
    $statement->bindValue(':zip',               $new_order->zip);
    $statement->bindValue(':nameOnCard',        $new_order->nameOnCard);
    $statement->bindValue(':creditCardNumber',  $new_order->creditCardNumber);
    $statement->bindValue(':expiryMonth',       $new_order->expiryMonth);
    $statement->bindValue(':expiryYear',        $new_order->expiryYear);
    $statement->bindValue(':cvv',               $hashedCvv);
    $statement->bindValue(':totalCost',         $new_order->totalCost);
    

    //Execute the statement and insert the new account.
    $result = $statement->execute();
    return $result;
}


function get_teams_by_start_of_name($partialName) {
    global $pdo;
    $sql = "SELECT DISTINCT id, teamName FROM Teams WHERE teamName like :teamName";
    $statement = $pdo->prepare($sql);
  
    // Bind the variable
    $statement->bindValue(':teamName', $partialName."%");
  
    // Execute the statement
    $statement->execute();

    $teams = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $teams;
}


function get_stadiums_by_start_of_name($partialName) {
    global $pdo;
    $sql = "SELECT DISTINCT id, stadiumName FROM Stadiums WHERE stadiumName like :stadiumName";
    $statement = $pdo->prepare($sql);
  
    // Bind the variable
    $statement->bindValue(':stadiumName', $partialName."%");
  
    // Execute the statement
    $statement->execute();

    $teams = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $teams;
}


function insert_team($new_team) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();
    $sql = "INSERT INTO Teams (id, teamName, stadiumID) VALUES (:id, :teamName, :stadiumID)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':teamName',  $new_team->teamName);
    $statement->bindValue(':stadiumID',  $new_team->stadiumID);

    //Execute the statement and insert the new match.
    $result = $statement->execute();
    return $result;
}


function insert_stadium($new_stadium) {
    global $pdo;
    
    //Get Uniq ID
    $id = uniqid();
    $sql = "INSERT INTO Stadiums (id, location, stadiumName, noOfSeats) VALUES (:id, :location, :stadiumName, :noOfSeats)";
    $statement = $pdo->prepare($sql);
    
    //Bind the variables.
    $statement->bindValue(':id', $id);
    $statement->bindValue(':location',  $new_stadium->location);
    $statement->bindValue(':stadiumName',  $new_stadium->stadiumName);
    $statement->bindValue(':noOfSeats',  $new_stadium->noOfSeats);

    //Execute the statement and insert the new match.
    $result = $statement->execute();
    return $result;
}

?>
