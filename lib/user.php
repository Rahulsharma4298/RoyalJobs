<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $uid;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $city;
    public $mobile;
    public $created;
    public $ip;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    first_name=:first_name,
                    last_name=:last_name, 
                    email=:email,  
                    password=:password,
                    city=:city,
                    mobile=:mobile,   
                    created=:created,
                    ip=:ip";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->ip=htmlspecialchars(strip_tags($this->ip));
    
        // bind values
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":ip", $this->ip);

    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
    // login user
    function login(){
        // select all query
        $query = "SELECT
                    `uid`, `email`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    email='".$this->email."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function getUserDetails($uid){
        $query = "SELECT
                    `uid`, `first_name`, `last_name`, `email`, `city`, `mobile`
                FROM
                    " . $this->table_name . " 
                WHERE
                    uid='".$uid."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_details=array(
        "uid" => $row['uid'],
        "first_name" => $row['first_name'],
        "last_name" => $row['last_name'],
        "email" => $row['email'],
        "city" => $row['city'],
        "mobile" => $row['mobile']
    );

        return $user_details;


        
    }
    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                email='".$this->email."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function getUserIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
}