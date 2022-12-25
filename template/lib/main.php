<?php

abstract class Main_Class
{
    public $id;
    protected $tableName;
    protected $conn;

    function __construct($db)
    {
        $this->conn = $db;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    function delete()
    {
        try {
            $query = "DELETE FROM " . $this->tableName . " WHERE id = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);

            if ($result = $stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $error) {
            $caughtError = $error->getMessage();
            echo "Что-то пошло не так, обновите страницу и попробуйте еще раз";

            return false;
        }
    }
}