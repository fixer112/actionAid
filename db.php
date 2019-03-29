<?php
class db{
	public $username;
	public $password;
	public $host;
	public $database;
	public $db;

	public function __construct($file)
    {
        $config = json_decode(file_get_contents($file),true);
        $this->username = $config['db']['username'];
        $this->password = $config['db']['password'];
        $this->host = $config['db']['host'];
        $this->database = $config['db']['database'];

        $dsn = "mysql:host=$this->host;dbname=$this->database";

        try {
             $this->db = new PDO($dsn, $this->username,  $this->password);
             $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
             exit();
        }

        $sql_user = 'CREATE TABLE IF NOT EXISTS users (
				    id int AUTO_INCREMENT,
				    firstname varchar(255) NOT NULL,
				    lastname varchar(255) NOT NULL,
				    email varchar(255) NOT NULL,
				    password varchar(255) NOT NULL,
				    created_at date NOT NULL,
				    PRIMARY KEY (id),
				    UNIQUE (email)
				);';

		$sql_donate = 'CREATE TABLE IF NOT EXISTS donations (
				    id int AUTO_INCREMENT,
				    cat varchar(255) NOT NULL,
				    user_id int NOT NULL,
				    amount int NOT NULL,
				    created_at date NOT NULL,
				    PRIMARY KEY (id),
				    FOREIGN KEY (user_id) REFERENCES users(id)
				);';
        

        $this->create($sql_user);
        $this->create($sql_donate);
    }
	

	public function create($sql){
		$create = $this->db->prepare($sql);
		$create->execute();
	}

	public function insert($sql){
		try{
		$stmt = $this->db->query($sql);
		    
		return true;
		}catch(\PDOException $e){
			return ['error'=>$e->getMessage()];
		}
	}

	public function select($sql){
		
		$stmt = $this->db->query($sql);
		    
		//$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}