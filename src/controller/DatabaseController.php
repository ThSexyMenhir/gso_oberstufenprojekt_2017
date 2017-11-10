<?php

//TODO implement validation
//TODO implement security checks
class DatabaseController
{
	const HOST = 'localhost';

	const DATABASE_NAME = 'lehrerkalender';

	const USER = 'lehrerkalender';

	const PASSWORD = 'f8m6YseoWarYCRYt';

	/** @var PDO */
	private $pdo;

	/** @var string */
	private $table;

	/**
	 * @param string $table
	 */
	public function __construct($table)
	{
		$this->table = $table;

		try {
			$this->pdo = new PDO(
				"mysql:host=" . self::HOST . ";dbname=" . self::DATABASE_NAME,
				self::USER,
				self::PASSWORD
			);
		} catch (PDOException $e) {
			echo "Es konnte keine Verbindung zur Datenbank aufgebaut werden<br>";
			echo "Fehler: " . $e->getMessage();
		} catch (Exception $e) {
			echo "Es ist ein Fehler beim Verbinden zur Datenbank aufgetreten<br>";
			echo "Fehler: " . $e->getMessage();
		}
	}

	public function __destruct()
	{
		$this->pdo = null;
	}

	/**
	 * @param array $where
	 * @param array $orderBy
	 * @return array|null
	 */
	public function getEntities(array $where = [], array $orderBy = [])
	{
		$query = "SELECT * FROM `{$this->table}`";

		if (count($where) > 0) {
			$query .= " WHERE ";
			foreach ($where as $key => $condition) {
				$value = $condition[1];
				if (!is_numeric($value) && !in_array($condition[0], ["BETWEEN", "IN"])) {
					$value = "'$value'";
				}
				$query .= " `$key` $condition[0] $value AND";
			}
			$query = substr($query, 0, (strlen($query) - 4));
		}

		if (count($orderBy) > 0) {
			$orderByString = implode(',', $orderBy);
			$query .= " ORDER BY $orderByString";
		}

		$result = $this->pdo->query($query)->fetchAll();

		if ($result === false) {
			return null;
		}

		return $result;
	}

	/**
	 * @param int $primaryKey
	 * @return null
	 */
	public function getEntityById($primaryKey)
	{
		$query = "SELECT * FROM `{$this->table}` WHERE id=$primaryKey";
		$result = $this->pdo->query($query)->fetchAll();

		if ($result === false || count($result) != 1) {
			return null;
		}

		return $result[0];
	}

	/**
	 * @param int $id
	 * @param array $values
	 * @return bool
	 */
	public function update($id, array $values)
	{
		$query = "UPDATE {$this->table} SET";

		foreach ($values as $field => $value) {
			if (!is_numeric($value)) {
				$value = "'$value'";
			}
			$query .= " $field=$value,";
		}

		$query = substr($query, 0, (strlen($query) - 1));
		$query .= " WHERE id=$id";
		$result = $this->pdo->query($query);

		if ($result instanceof PDOStatement) {
			return true;
		}
		return false;
	}

	/**
	 * @param array $values
	 * @return bool
	 */
	public function insert(array $values)
	{
		$query = "INSERT INTO {$this->table} (";
		$valueQuery = "(";

		foreach ($values as $field => $value) {
			if (!is_numeric($value)) {
				$value = "'$value'";
			}
			$query .= "`$field`, ";
			$valueQuery .= "$value, ";
		}

		$query = substr($query, 0, (strlen($query) - 2));
		$valueQuery = substr($valueQuery, 0, (strlen($valueQuery) - 2));

		$valueQuery .= ")";
		$query .= ") VALUES $valueQuery";

		$result = $this->pdo->query($query);

		if ($result instanceof PDOStatement) {
			return true;
		}
		return false;
	}

	/**
	 * @param int $primaryKey
	 * @return bool
	 */
	public function delete($primaryKey)
	{
		$query = "DELETE FROM {$this->table} WHERE id=$primaryKey";
		$result = $this->pdo->query($query);

		if ($result instanceof PDOStatement) {
			return true;
		}
		return false;
	}
}