<?php
class Quote extends Base {
	public function __construct() {
		$this->table = "quotes";
		parent::__construct();
	}
	
	public function migrate() {
		$quoteSql = <<<SQL
		CREATE TABLE IF NOT EXISTS quotes (
			"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			"who" varchar(255),
			"quote" text,
			"verified" integer DEFAULT 0,
			"created_at" datetime,
			"updated_at" datetime
		)
SQL;

		$this->runQuery($quoteSql);
	}

	public function findByQuote($quote) {
		$quotes = $this->runQuery("SELECT * FROM $this->table WHERE quote = ?", array($quote));
		if(count($quotes) > 0) return($quotes[0]);
	}
	
	public function findAll() {
	  return $this->runQuery("SELECT * FROM $this->table WHERE verified=1");
	}
	
	public function findUnverified() {
	  return $this->runQuery("SELECT * FROM $this->table WHERE verified=0");
	}
	
	public function newQuote($who, $quote, $verified = 0) {
		$this->runQuery("INSERT INTO $this->table (who, quote, verified, created_at, updated_at) VALUES (?, ?, ?, ?, ?)", array($who, $quote, $verified, $this->now(), $this->now()));
	}
}