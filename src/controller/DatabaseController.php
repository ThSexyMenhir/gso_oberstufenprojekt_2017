<?php

//TODO Kommentare
//TODO Sicherheitschecks
class DatabaseController
{
    const HOST = 'localhost';
    const DATABASE_NAME = 'lehrerkalender';

    const USER = 'root';
    const PASSWORD = 'root';

    private $pdo;

    private $table;

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

    public function getEntities(array $where = [])
    {
        $query = "SELECT * FROM `{$this->table}`";

        if (count($where) > 0) {
            $query.= " WHERE ";
            foreach ($where as $key => $condition) {
                $value = $condition[1];
                if (!is_int($value)) {
                    $value = "'$value'";
                }
                $query .= " `$key` $condition[0] $value AND";
            }
            $query = substr($query, 0, (strlen($query) - 4));
        }

        $query.= " ORDER BY 'nachname'";

        $result = $this->pdo->query($query)->fetchAll();

        if ($result === false) {
            return null;
        }

        return $result;
    }

    public function getEntityById($primaryKey)
    {
        $query = "SELECT * FROM `{$this->table}` WHERE id=$primaryKey";
        $result = $this->pdo->query($query)->fetchAll();

        if ($result === false || count($result) != 1) {
            return null;
        }

        return $result[0];
    }

    public function update($id, array $values)
    {
        $query = "UPDATE {$this->table} SET";

        foreach ($values as $field => $value) {
            if (!is_int($value)) {
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

    public function insert(array $values)
    {
        $query = "INSERT INTO {$this->table} (";
        $valueQuery = "(";

        foreach ($values as $field => $value) {
            $query .= "`$field`, ";
            $valueQuery .= "'$value', ";
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

    public function delete($primaryKey)
    {
        $query = "DELETE FROM {$this->table} WHERE id=$primaryKey";
        $result = $this->pdo->query($query);

        if ($result instanceof PDOStatement) {
            return true;
        }
        return false;
    }
	const HOST = 'localhost';
	const DATABASE_NAME = 'lehrerkalender';

	const USER = 'root';
	const PASSWORD = 'root';

	private $pdo;

	private $table;

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

	public function getEntities(array $where = [], array $orderBy = [])
	{
		$query = "SELECT * FROM `{$this->table}`";

		if (count($where) > 0) {
			$query .= " WHERE ";
			foreach ($where as $key => $condition) {
				$value = $condition[1];
				if (!is_int($value)) {
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

	public function getEntityById($primaryKey)
	{
		$query = "SELECT * FROM `{$this->table}` WHERE id=$primaryKey";
		$result = $this->pdo->query($query)->fetchAll();

		if ($result === false || count($result) != 1) {
			return null;
		}

		return $result[0];
	}

	public function update($id, array $values)
	{
		$query = "UPDATE {$this->table} SET";

		foreach ($values as $field => $value) {
			if (!is_int($value)) {
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

	public function insert(array $values)
	{
		$query = "INSERT INTO {$this->table} (";
		$valueQuery = "(";

		foreach ($values as $field => $value) {
			$query .= "`$field`, ";
			$valueQuery .= "'$value', ";
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