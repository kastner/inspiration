<?php
class User extends Base {
	public function __construct() {
		$this->table = "users";
		parent::__construct();
	}

	public function migrate() {
		die("here");
		$userSql = <<<SQL
		CREATE TABLE IF NOT EXISTS users (
			"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			"email" varchar(255),
			"password" varchar(255),
			"admin" integer DEFAULT 0,
			"created_at" datetime,
			"updated_at" datetime
		)
SQL;

		$this->runQuery($userSql);
	}
	
	public function newUser($email, $password, $admin) {
		$this->runQuery("INSERT INTO $this->table (email, password, admin, created_at, updated_at) VALUES (?, ?, ?, ?, ?)", array($email, sha1($password), $admin, $this->now(), $this->now()));
	}
}