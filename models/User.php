<?php 
// require_once('database.php');

class User {
    
    private $email;
    private $id;

    public function __construct(string $email) {
        $this->email = strtolower(stripslashes(htmlspecialchars($email)));

        $user = $this->getUserFromIdentifier($email)[0];

        if( count($user) > 0 ) {
            $this->id = $user['id'];
        }
    }

    public function email() {
        return $this->email;
    }

    public function add($data) {
        global $conn;

        $username = $data["username"];
        $username = htmlspecialchars($username);
        $username = stripslashes($username);
        $username = strtolower($username);

        $name = $data['name'];
        $name = htmlspecialchars($name);
        $name = stripslashes($name);
        $name = strtolower($name);

        $email = $data['email'];
        $email = htmlspecialchars($email);
        $email = stripslashes($email);
        $email = strtolower($email);

        $password = $data['password'];
        $password = htmlspecialchars($password);
        $password = stripslashes($password);
        $password = strtolower($password);
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $gender = $data['gender'];
        $gender = htmlspecialchars($gender);
        $gender = stripslashes($gender);
        $gender = strtolower($gender);

        $role = $data['role'];

        $sql = "INSERT INTO tb_users(username, 
                                       name, 
                                       email, 
                                       password, 
                                       gender, 
                                       role) 
                  VALUES('{$username}',
                         '{$name}',
                         '{$email}',
                         '{$passwordHash}',
                         '{$gender}',
                         '{$role}')";

        $query = mysqli_query($conn, $sql);

        return $query;
    }
    
    public static function get( int $id_user = null) {
        global $conn;
        $sql = "SELECT * FROM tb_users";
        
        if( $id_user != null ) {
            $sql .= " WHERE tb_users.id = $id_user";
        }

        $query = mysqli_query($conn, $sql);

        $user_found = [];

        while($user = mysqli_fetch_assoc($query)) $user_found[] = $user;

        return $user_found;        
    }

    public function getId() {
        return $this->id;
    }

    public static function getUserFromIdentifier($identifier){
        global $conn;
        $identifier = strtolower(stripslashes(htmlspecialchars($identifier)));

        $sql = "SELECT * 
                FROM 
                    tb_users 
                WHERE 
                    tb_users.email = '{$identifier}' OR 
                    tb_users.username = '{$identifier}'";

        $query = mysqli_query($conn, $sql);

        $user_found = [];

        while($user = mysqli_fetch_assoc($query)) $user_found[] = $user;

        if( !count($user_found) > 0 ) {
            return false;
            die;
        }
        return $user_found;
    }

    public static function getUserFromUsername($email){
        global $conn;
        $email = strtolower(stripslashes(htmlspecialchars($email)));

        $sql = "SELECT * 
                FROM 
                    tb_users 
                WHERE 
                    tb_users.email = '{$email}'";

        $query = mysqli_query($conn, $sql);

        $user_found = [];

        while($user = mysqli_fetch_assoc($query)) $user_found[] = $user;

        if( !count($user_found) > 0 ) {
            return false;
            die;
        }
        return $user_found;
    }

    public function delete() {
        global $conn;

        $sql = "DELETE 
                FROM tb_users
                WHERE tb_users.id = {$this->id}";

        $query = mysqli_query($conn, $sql);
        
        if( mysqli_affected_rows($conn) > 0 ) {
            return true;
        }
        return false;
    }

    public function edit($data) {
        global $conn;

        $sql = "UPDATE tb_users
                SET
                 username='{$data['username']}',
                 name='{$data['name']}',
                 email='{$data['email']}', 
                 gender='{$data['gender']}', 
                 role='{$data['role']}'
                WHERE
                 tb_users.id={$this->id}";
        
        $query = mysqli_query($conn, $sql);

        return $query;
    }


    public function login($password) {
        $password = stripslashes(htmlspecialchars($password));
        $userStatus = $this->verifyPwd($password);

        return $userStatus;
    }

    public function verifyPwd($password) {
        $user_pwd = User::get($this->id)[0];

        return password_verify($password, $user_pwd["password"]);
    }
}





?>