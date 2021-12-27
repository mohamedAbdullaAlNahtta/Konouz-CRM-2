<?php

class User {

    public $id;
    public $name;
    public $username;
    public $password;
    public $password_H;
    public $type;
    public $group_id;
    public $company_id;
    public $status;
    public $creation_date;
    public $created_by;
    
    
    public function initiate_user($username, $password)
    {
        
        $validate_user_login = $this->validate_user_login($username, $password);
        
        if ($validate_user_login !== true) {
            
            return $validate_user_login;
            
        } else {
            
            $userdb = new DB('10.144.120.27', 'root', 'admin', '');
            
            $lower_case_username = $this->lower_case_username($username);
            
            $sql = "SELECT * FROM `users` WHERE `username`='$lower_case_username'";
            
            $result    = $userdb->query($sql);
            $user_data = mysqli_fetch_array($result);
            
            if ($user_data > 0) {
                
                $this->id         = $user_data["userId"];
                $this->name       = $user_data["name"];
                $this->username   = $user_data["username"];
                $this->password   = $user_data["password"];
                $this->password_H = $user_data["secureH"];
                
                $this->type     = $user_data["userType"];
                $this->group_id = $user_data["groupId"];
                
                $this->status = $user_data["Status"];
                
                $this->creation_date = $user_data["creationDate"];
                $this->created_by    = $user_data["createdBy"];
                
                return true;
                
            } else {
                
                return false;
            }
            
            $userdb->close_db_connection();
            
            
        }
        
        
        
    }

    protected function lower_case_username($username)
    {
        
        $userdb              = new DB('10.144.120.27', 'root', 'admin', '');
        $username_escaped    = $userdb->escape_string("$username");
        $lower_case_username = strtolower($username_escaped);
        return $lower_case_username;
        
    }
    
    protected function encyript_password($password)
    {
        
        $userdb              = new DB('10.144.120.27', 'root', 'admin', '');
        $password_escaped    = $userdb->escape_string("$password");
        $encyripted_password = md5($password_escaped);
        return $encyripted_password;
        
    }
    
    protected function hashing_password($password)
    {
        
        $userdb           = new DB('10.144.120.27', 'root', 'admin', '');
        $password_escaped = $userdb->escape_string("$password");
        $hashed_password  = sha1($password_escaped);
        return $hashed_password;
        
    }
    
    protected function validate_user_login($username, $password)
    {
        
        $validate_user_status = $this->validate_user_status($username);
        $validate_password    = $this->validate_password($username, $password);
        
        if ($validate_user_status !== true) {
            
            return $validate_user_status;
            
        } else if ($validate_password !== true) {
            
            return $validate_password;
            
        } else {
            
            return true;
            
        }
        
        
    }
    
    protected function validate_user_status($username)
    {
        
        $userdb = new DB('10.144.120.27', 'root', 'admin', '');
        
        $lower_case_username = $this->lower_case_username($username);

            $sql = "SELECT * FROM `security`.`privileges`.`user` WHERE `username`='$lower_case_username'";
            
            $result    = $userdb->query($sql);
            $user_data = mysqli_fetch_array($result);
            $userdb->close_db_connection();
            
            if ($user_data <= 0) {
                
                return "Your Account has been deactivated.!!! Please contact your Sales Account Manager. Thanks for trusting US.......  Software Development Team";
                
            } else {
                
                return true;
            }
            
        
        
        
    }
    
  
    
    protected function validate_password($login_username, $login_password)
    {
        
        $userdb = new DB('10.144.120.27', 'root', 'admin', '');
        
        $password      = $this->encyript_password($login_password);
        $password_hash = $this->hashing_password($login_password);
        
        
        $lower_case_username = $this->lower_case_username($login_username);
        
        
        $sql = "SELECT * FROM `users` WHERE `username`='$lower_case_username' AND `password` ='$password' AND `secureH` ='$password_hash'";
        
        $result    = $userdb->query($sql);
        $user_data = mysqli_fetch_array($result);
        
        if ($user_data <= 0) {
            
            return "Incorrect password.!!! Please check your password, and if still the same problem please contact your Administrator. Thanks for trusting US.......  Software Development Team";
            
        } else {
            
            return true;
        }
        
        
    }
    
}

?>