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
        $this->first_name=strtolower(htmlspecialchars(strip_tags($this->first_name)));
        $this->last_name=strtolower(htmlspecialchars(strip_tags($this->last_name)));
        $this->email=strtolower(htmlspecialchars(strip_tags($this->email)));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->city=strtolower(htmlspecialchars(strip_tags($this->city)));
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

function updateUser($uid, $first_name, $last_name, $mobile, $city){
    $query = "UPDATE
                    " . $this->table_name . "
                SET
                    first_name=:first_name,
                    last_name=:last_name,  
                    mobile=:mobile, 
                    city=:city WHERE uid=". $uid . "";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $first_name=htmlspecialchars(strip_tags($first_name));
        $last_name=htmlspecialchars(strip_tags($last_name));
        $mobile=htmlspecialchars(strip_tags($mobile));
        $city=htmlspecialchars(strip_tags($city));
        // bind values
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":mobile", $mobile);
        $stmt->bindParam(":city", $city);
        

        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

function getUserJobs($uid){
    $query = "SELECT jobs.id, jobs.job_title, apply.apply_date, apply.status FROM jobs INNER JOIN apply ON jobs.id = apply.job_id WHERE apply.uid = " . $uid . ";";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;

}

function getCountOfAppliedJobs($uid){
    $query = "SELECT count(jobs.id) FROM jobs INNER JOIN apply ON jobs.id = apply.job_id WHERE apply.uid = " . $uid . ";";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
}

function verifyPass($uid, $old_pass){
    $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                password='".$old_pass."' AND uid='".$uid."'";
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

function changePass($uid, $old_pass, $new_pass){
    $old_pass=htmlspecialchars(strip_tags($old_pass));
    $new_pass=htmlspecialchars(strip_tags($new_pass));

    $status = $this->verifyPass($uid, $old_pass);
    if($status){
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    password=:new_pass WHERE uid=". $uid ."";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":new_pass", $new_pass);
        if($stmt->execute()){
            return true;
        }
        
    return false;     
    }

}
}

