<?php

if (!class_exists("DatabaseController")) {
    include __DIR__ . "/DatabaseController.php";
	include __DIR__ . "/DatabaseController.php";
}

abstract class AbstractController
{
    /** @var string */
    protected $tableName = '';
	/** @var string */
	protected $tableName = '';

    /** @var DatabaseController */
    protected $dataBaseController;
	/** @var DatabaseController */
	protected $dataBaseController;

    public function __construct()
    {
        $this->dataBaseController = new DatabaseController($this->tableName);
    }
	public function __construct()
	{
		$this->dataBaseController = new DatabaseController($this->tableName);
	}

    public function delete($id)
    {
        return $this->dataBaseController->delete($id);
    }
	public function delete($id)
	{
		return $this->dataBaseController->delete($id);
	}

    public function getEntity($id)
    {
        return $this->dataBaseController->getEntityById($id);
    }
	public function getEntity($id)
	{
		return $this->dataBaseController->getEntityById($id);
	}

    public function getEntities()
    {
        return $this->dataBaseController->getEntities();
    }
	public function getEntities(array $where = [], array $orderBy = [])
	{
		return $this->dataBaseController->getEntities($where, $orderBy);
	}
}
