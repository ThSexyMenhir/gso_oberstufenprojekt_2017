<?php

if (!class_exists("DatabaseController")) {
	include __DIR__ . "/DatabaseController.php";
}

abstract class AbstractController
{
	/** @var string */
	protected $tableName = '';

	/** @var DatabaseController */
	protected $dataBaseController;

	public function __construct()
	{
		$this->dataBaseController = new DatabaseController($this->tableName);
	}

	public function delete($id)
	{
		return $this->dataBaseController->delete($id);
	}

	public function getEntity($id)
	{
		return $this->dataBaseController->getEntityById($id);
	}

	public function getEntities(array $where = [], array $orderBy = [])
	{
		return $this->dataBaseController->getEntities($where, $orderBy);
	}
}
