<?php

if (!class_exists("DatabaseController")) {
	include __DIR__ . "/DatabaseController.php";
}

//TODO implement validation
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

	/**
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		return $this->dataBaseController->delete($id);
	}

	/**
	 * @param int $id
	 * @return null
	 */
	public function getEntity($id)
	{
		return $this->dataBaseController->getEntityById($id);
	}

	/**
	 * @param array $where
	 * @param array $orderBy
	 * @return array|null
	 */
	public function getEntities(array $where = [], array $orderBy = [])
	{
		return $this->dataBaseController->getEntities($where, $orderBy);
	}
}
