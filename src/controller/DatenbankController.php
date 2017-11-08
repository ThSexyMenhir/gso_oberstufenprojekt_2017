<?php

//TODO Kommentare
//TODO Sicherheitschecks
class DatenbankController
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
        $query = "SELECT * FROM `{$this->table}` WHERE ";

        foreach ($where as $key => $condition) {
            $query .= " `$key` $condition[0] '$condition[1]'";
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

        return $result;
    }

    public function update(array $values, $id)
    {
        $query = "UPDATE {$this->table} SET";

        foreach ($values as $field => $value) {
            $query .= " $field='$value'";
        }

        $query .= " WHERE id=$id";
        $result = $this->pdo->query($query);

        if ($result instanceof PDOStatement) {
            return true;
        }

        return $result;
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

        return $result;
    }

    public function delete($primaryKey)
    {
        $query = "DELETE FROM {$this->table} WHERE id=$primaryKey";
        $result = $this->pdo->query($query);

        if ($result instanceof PDOStatement) {
            return true;
        }

        return $result;
    }
}