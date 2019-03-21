<?php 
  class db {

        public $dbCon;
        public $server = 'aswiki.labsdb';
        public $dbname = 'aswiki_p';


        public function __construct(){
                $config = parse_ini_file( __DIR__ . '/../../replica.my.cnf' );
                if ( !$config || !$config['user'] || !$config['password'] ) {
                    throw new Exception( "Login Data not found!" );
                }
                $this->dbCon = mysqli_connect($this->server, $config['user'], $config['password'], $this->dbname);
                if (mysqli_connect_errno()){
                    printf("DB Connection failed: %s\n", mysqli_connect_error());
                    exit();
                }
        }

        public function __destruct(){
            mysqli_close($this->dbCon);
        }

        public function query($sql){
            $result = $this->dbCon->query($sql);
            return $result;

        }
        public function result($result){
            $row[] = $result->fetch_all();
            $result->close();
            return $row;
        }


 }

