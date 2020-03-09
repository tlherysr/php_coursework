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
        return "$this->firstName $this->lastName";
    }

    function hash_user_password() {
        return password_hash("$this->password", PASSWORD_DEFAULT);
    }

}


class Matches {
    private $id;
    private $opponent;
    private $matchDate;
    private $price;
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


class Tickets {
    private $id;
    private $matchID;  // Foreign Key
    private $userID;   // Foreign Key
    private $orderID;  // Foreign Key
    private $seatingPosition;
    private $price;
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}


class SeasonTickets {
    private $id;
    private $userID; // Foreign Key
    private $seatingPosition;
    private $price;
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }
}


class Orders {
    private $id;
    private $fullName;
    private $email;
    private $address;
    private $city;
    private $state;
    private $zip;
    private $nameOnCard;
    private $creditCardNumber;
    private $expiryMonth;
    private $expiryYear;
    private $cvv;
    private $totalCost;
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name,$value) {
        $this->$name = $value;
    }

    function hash_cvv() {
        return password_hash("$this->cvv", PASSWORD_DEFAULT);
    }
}


?>