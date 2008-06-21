<?php
class Base extends PDO {

	// table
	protected $table;
	
	public function __construct() {
		parent::__construct('sqlite:../db/inspire.sqlite3', '', '', array(
		    PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		));
	}
	
	public function now() {
		return strftime("%Y-%m-%d %H:%M:%S");
	}
	
	public function findById($id) {
		$result = $this->runQuery("SELECT * from $this->table WHERE id = ?", array($id));
		if(count($result) > 0) return($result[0]);
	}
	
	public function runQuery($query, $params = array()) {
		$q = $this->prepare($query);
		$q->execute($params);
		return $q->fetchAll();
	}
	
}
