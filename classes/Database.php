<?php

class Database {
	
	public static function establishConnection() {
		$retVal = mysql_connect('localhost', 'root', 'root');
		if (!$retVal) {
			die ("Attempt to make connection failed " . mysql_error());
		}
		
		return $retVal;
	}
	
	public static function selectDatabase($database, $link) {
		if (! mysql_select_db($database, $link) ) {
			echo "<p> Error in selecting the database " . mysql_error() . " </p>";
			die ("Could not select database " . $database . " Error: " . mysql_error());
		}
	}
	
	public static function createDatabase($databaseName) {
		$link = Database::establishConnection();
		
		$query = "CREATE DATABASE $databaseName";
		echo "<p> " . $query . " </p>";
		if (!mysql_query($query, $link)) {
			echo "<p> Database creation failed " . mysql_error() . " </p>";
			return 0;
		}
		
		return 1;
	}
	
	public static function createTable($db, $table, $attributes) {
		// for attributes, comma separate your attributes
		$link = Database::establishConnection();
		Database::selectDatabase($db, $link);
		
		echo "<p>  GOT HERE </p>";
		
		$query = "CREATE TABLE $table
		(
		$attributes
		)";
		
		echo "<p> $query </p>";
		
		if (! mysql_query($query, $link)) {
			echo "<p> Table creation failed " . mysql_error() . " </p>";
		} 
	}
	
	public static function insertIntoTable($db, $table, $values, $columns) {
		#values must be surrounded by single quotes
		$link = Database::establishConnection();
		Database::selectDatabase($db, $link);
		
		$query = "INSERT INTO $table ($columns)
		VALUES ($values)";
		
		echo "<p> $query </p>";
		
		if (! mysql_query($query, $link)) {
			echo "<p> Table put failed " . mysql_error() . " </p>";
		}
	}
	
	public static function getRows($db, $table, $whereClause = "NONE_WAS_PROVIDED") {
		$link = Database::establishConnection();
		Database::selectDatabase($db, $link);
		
		$query;
		if ($whereClause === "NONE_WAS_PROVIDED") {
			$query = "SELECT * FROM $table";
		} else {
			$query = "SELECT * FROM $table
			WHERE $whereClause";
		}
		
		$result = mysql_query($query, $link);
		
		if (!$result) {
			echo "<p> Table get failed " . mysql_error() . " </p>";
		} 
		
		return $result; // this result still needs to be fetched, fyi
	}
	
	public static function update($db, $table, $updateInfo, $whereClause) {
		$link = Database::establishConnection();
		Database::selectDatabase($db, $link);
		
		$query = "UPDATE $table SET $updateInfo
		WHERE $whereClause";
		
		$result = mysql_query($query, $link);
		
		if (!$result) {
			echo "<p> Table update failed " . mysql_error() . " </p>";
		} 
	}
	
	public static function deleteFromTable($db, $table, $whereClause = "DELETE_ALL") {
		$link = Database::establishConnection();
		Database::selectDatabase($db, $link);
		
		$query;
		if ($whereClause === "DELETE_ALL") {
			$query = "DELETE FROM $table";
		} else {
			$query = "DELETE FROM $table
			WHERE $whereClause";
		}
		
		$result = mysql_query($query, $link);
	
		if (!$result) {
			echo "<p> Table delete failed " . mysql_error() . " </p>";
		} 
	}
}


?>