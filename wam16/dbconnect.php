<?php 
  class db {

        public $dbCon;
        public $server = 'mlwiki.analytics.db.svc.wikimedia.cloud';
        public $dbname = 'mlwiki_p';


        public function __construct(){
                $config = parse_ini_file( __DIR__ . '/../../replica.my.cnf' );
                if ( !$config || !$config['user'] || !$config['password'] ) {
                    throw new Exception( "Login Data not found!" );
                }
                $this->dbCon = mysqli_connect($this->server, $config['user'], $config['password'], $this->dbname);
                if ($this->dbCon->connect_error){
                    //printf("DB Connection failed: %s\n", mysqli_connect_error());
                    //exit();
		    die("Connection failed: " . $this->dbCon->connect_error);
                }
        }

        public function __destruct(){
            //mysqli_close($this->dbCon);
	    $this->dbCon->close();
        }

        public function query($sql){
            $result = $this->dbCon->query($sql);
            if (!$result) {
            	die("Query failed: " . $this->dbCon->error);
        	}

	    return $result;

        }
        public function result($result){
            $row[] = $result->fetch_all();
            $result->close();
            return $row;
        }


 }

