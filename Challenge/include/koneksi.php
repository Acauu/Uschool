<?php
  
    class database{
        public function __construct()
        {
            $host = "localhost";
            $dbname = "uschool";
            $username = "root";
            $password = "";
            $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        }
        public function grade(){
            $query = $this->db->prepare("select * from grade join user on grade.user_id= user.user_id ");
            $query->execute();
            $data = $query->fetchAll();
            return $data;
        }

        public function user(){
            $query = $this->db->prepare("select * from user join role on user.role_id = role.role_id");
            $query->execute();
            $user = $query->fetchAll();
            return $user;
        }

        


        public function createUser($user_id, $password, $first_name, $last_name, $role_id, $address){
            $query = $this->db->prepare("insert into `user` values (:user_id, :password, :first_name, :last_name, :role_id, :address)");
            $pass = md5($password);
            $query->bindParam(":user_id", $user_id);
            $query->bindParam(":first_name", $first_name);
            $query->bindParam(":last_name", $last_name);
            $query->bindParam(":role_id", $role_id);
            $query->bindParam(":password", $pass);
            $query->bindParam(":address", $address);
            $query->execute();
            while (!$query) {
                $query->bindParam(":user_id", $user_id);
                $query->bindParam(":first_name", $first_name);
                $query->bindParam(":last_name", $last_name);
                $query->bindParam(":role_id", $role_id);
                $query->bindParam(":password", $pass);
                $query->execute();
            }
        }
        public function login($user_id, $password, $role_id){
            $query = $this->db->prepare("select * from user where user_id=:user_id and password=:pass");
            $pass = md5($password);
            $query->bindParam(":user_id", $user_id);
            $query->bindParam(":pass", $pass);
            $query->execute();
            $data = $query->fetch();
            return $data;
        }
        
        public function checkEmail($user_id){
            $query = $this->db->prepare("select * from user where user_id=:user_id");
            $query->bindParam(":user_id", $user_id);
            
            $query->execute();
            $data = $query->fetch();
            return $data;
        }

        public function create($user_id, $first_name, $last_name, $role_id){
            $query = $this->db->prepare("insert into `user` values (:user_id,:first_name, :last_name, :role_id)");
            $query->bindParam(":user_id", $user_id);
            $query->bindParam(":first_name", $first_name);
            $query->bindParam(":last_name", $last_name);
            $query->bindParam(":role_id", $role_id);
            $query->execute();
            while (!$query) {
                $query = $this->db->prepare("insert into `user` values (:user_id,:first_name, :last_name, :role_id)");
                $query->bindParam(":user_id", $user_id);
                $query->bindParam(":first_name", $first_name);
                $query->bindParam(":last_name", $last_name);
                $query->bindParam(":role_id", $role_id);
                $query->execute();
            }
        }
        public function delete($user_id){
            $query = $this->db->prepare("delete from `user` where user_id=:user_id");
            $query->bindParam(":user_id", $user_id);
            $query->execute();
        }
        public function checkKodeExist($user_id){ //return rowCount
            $query = $this->db->prepare("Select * from `user` where user_id = :user_id");
            $query->bindParam(":user_id", $user_id);
            $query->execute();
            return $query->rowCount();
        }
        public function getByKode($user_id){
            $query = $this->db->prepare("Select * from `user` where user_id = :user_id");
            $query->bindParam(":user_id", $user_id);
            $query->execute();
            $data = $query->fetch();
            return $data;
        }
        public function getByCode($user_id){
            $query = $this->db->prepare("Select * from `grade` where user_id = :user_id");
            $query->bindParam(":user_id", $user_id);
            $query->execute();
            $data = $query->fetch();
            return $data;
        }
        public function edit($user_id, $nilai_tugas, $nilai_uts, $nilai_uas){
            $query = $this->db->prepare("update `grade` set `nilai_tugas`=:nilai_tugas, `nilai_uts`=:nilai_uts, `nilai_uas`=:nilai_uas where `user_id`=:user_id");
            $query->bindParam(":user_id", $user_id);
            $query->bindParam(":nilai_tugas", $nilai_tugas);
            $query->bindParam(":nilai_uts", $nilai_uts);
            $query->bindParam(":nilai_uas", $nilai_uas);
            $query->execute();
        }
        public function editAdmin($user_id, $first_name, $last_name, $role_id){
            $query = $this->db->prepare("update `user` set `first_name`=:first_name, `last_name`=:last_name, `role_id`=:role_id where `user_id`=:user_id");
            $query->bindParam(":user_id", $user_id);
            $query->bindParam(":first_name", $first_name);
            $query->bindParam(":last_name", $last_name);
            $query->bindParam(":role_id", $role_id);
            $query->execute();
        }
    }
