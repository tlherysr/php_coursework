<?php 

class Users {
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $phoneNo;
    private $email;
    private $isAdmin;
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }

    function get_full_name() {
        return "$this->firstName, $this->lastName";
    }
}


class Matches {
    private $id;
    private $matchDate;
    private $matchType;
    private $isHome;
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}


class Stadiums {
    private $id;
    private $location;
    private $stadiumName;
    private $noOfSeats;    
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}


class Tickets {
    private $id;
    private $matchID; // Foreign Key
    private $userID; // Foreign Key
    private $isSeason;
    private $seatingPosition;
    
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}


class Teams {
    private $id;
    private $teamName;
    private $stadiumID; // Foreign Key
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}

?>