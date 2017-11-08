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
        $result = $this->dataBaseController->update($id, ['ist_geloescht' => 1]);

        if ($result !== true) {
            return false;
        }
        return $result;
    }

    public function get($id)
    {
        return $this->dataBaseController->getEntityById($id);
    }
}
