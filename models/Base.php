<?php
class Base {
	// db handle
	private $dbh;
	
	// table
	protected $table;
	
	public function __construct() {
		$this->dbh = new PDO('sqlite:../db/inspire.sqlite3', '', '', array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		));
	}
	
	public function now() {
		return strftime("%Y-%m-%d %H:%M:%S");
	}
	
	public function findById($id) {
		$result = $this->dbh->runQuery("SELECT * from $this->table WHERE id = ?", array($id));
		if(count($result) > 0) return($result[0]);
	}
	
	public function runQuery($query, $params = array()) {
		$q = $this->dbh->prepare($query);
		$q->execute($params);
		return $q->fetchAll();
	}
	
}
