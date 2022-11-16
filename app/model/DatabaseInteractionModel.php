<?php 
declare(strict_types = 1);

namespace Model;

use Connection\Connection;
use PDO;
use Libraries\Queries;

class DatabaseInteractionModel extends Queries {
	
	public function Conn()
	{
		return new Connection();
	}
	
	/**
	 * runQuery - provides a flexible way to run executeQuery()
	 *
	 */
	public function runQuery(string $query, array|int $mixed = NULL, int $fetchMode = PDO::FETCH_OBJ)
	{
		if($mixed == NULL) {

			return $this->executeQuery($query, NULL, $fetchMode);

		} elseif (gettype($mixed) == 'array') {

			return $this->executeQuery($query, $mixed, $fetchMode);

		} elseif (gettype($mixed) == 'integer') {

			return $this->executeQuery($query, NULL, $mixed);
		}
	}
	
	/**
	 * executeQuery
	 *
	 * @return Array
	 */
	public function executeQuery(string $query, ?array $data, int $fetchMode):Array
	{
		$sql = $this->Conn()->connect()->prepare($query);

		if (!empty($data)) {

			$sql->execute($data);
			return $sql->fetchAll($fetchMode);
		
		} else {

		    $sql->execute();
		    return $sql->fetchAll($fetchMode);
		}
	}

	/**
	 * execute queries - it's purpose is to insert data into database without return anything
	 *
	 * @return void
	 */
	public function execute(string $query, array $data = NULL)
	{
		$sql = $this->Conn()->connect()->prepare($query);

		if (!empty($data)) {

			$sql->execute($data);

			// if ($sql->execute($data) == true) {

			// 	return true;	

			// } else {

			// 	return false;
			// }
			
		
		} else {

			$sql->execute();

			// if ($sql->execute() == true) {

			// 	return true;	

			// } else {

			// 	return false;
			// }
		}
	}
}