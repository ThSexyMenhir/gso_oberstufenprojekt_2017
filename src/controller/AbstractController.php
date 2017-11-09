<?php

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

    public function get($id)
    {
        return $this->dataBaseController->getEntityById($id);
    }
}
