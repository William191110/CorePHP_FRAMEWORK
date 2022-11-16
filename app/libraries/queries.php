<?php
declare(strict_types = 1);

namespace Libraries;

Class Queries {
	
	private $columnValues = [];

	public function select_Where_Limit(string $table, string $column, $limit, $offset)
	{
		return 'SELECT * FROM `'.$table.'` WHERE '.$column.' = ? LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function select(string $table, string $column1 = NULL , string $column2 = NULL, string $column3 = NULL):string
	{
			$select = 'SELECT * FROM `';
		
		if ($column1 == NULL && $column2 == NULL) {

			return $select.$table.'`';

		} elseif(!$column1 == NULL && $column2 == NULL) {
			
			return $select.$table.'` WHERE '.$column1.' = ?';

		} elseif(!$column1 == NULL && !$column2 == NULL && $column3 == NULL ) {

			return $select.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';

		} else {

			return $select.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ? AND '.$column3.' = ?';
		}
	}

	public function __limit(string $table, int $int)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$int;
	}

	public function __limit_Offset(string $table, int $limit, int $offset)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function __deleteAll(string $table, string $db)
	{
		return 'TRUNCATE '.$db.'.'.$table;
	}

	public function Delete(string $table, string $column)
	{
		return 'DELETE FROM `'.$table.'` WHERE '.$column.' = ?';
	} 

	public function Insert(string $table, array $columns)
	{
		return 'INSERT INTO `'.$table.'`('.implode(', ', $columns).') 
		        VALUES('.implode(', ', array_fill(intval(0), count($columns), "?")).')';
	}

	public function Update(string $table, array $columns, string $column)
	{
		foreach ($columns as $cols) {
                    array_push($this->columnValues, $cols.' = ?');
                }        
        return 'UPDATE `'.$table.'` SET '.implode(', ', $this->columnValues).' 
                  WHERE '.$column.' = ?';
	}

	public function countAll(string $table):string
	{
		return 'SELECT Count(*) AS num FROM `'.$table.'`';
	}

	public function find(string $table, string $column)
	{
		return "SELECT * FROM `.$table.` WHERE `.$column.` LIKE ?";
	}

	public function count_where(string $table, string $column):string
	{
		return 'SELECT Count(*) AS results FROM `'.$table.'` WHERE '.$column.' = ?';
	}

	public function count_where_and(string $table, string $column1, string $column2)
	{
		return 'SELECT Count(*) AS results FROM `'.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';
	}
		
	public function column_sum(string $column, string $table):string
	{
		return 'SELECT SUM('.$column.') AS columnSum FROM `'.$table.'`';
	}
}