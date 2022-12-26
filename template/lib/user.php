<?php
require_once 'main.php';

class User extends Main_Class
{
    protected $tableName = "user";
    private $login, $password, $userName;
    public $isAdmin;


    public function read(string $sort): mixed
    {
        try {
            if ($sort == "") {
                $sort = "id";
            }

            $query = "SELECT $this->tableName.id, $this->tableName.name, $this->tableName.login FROM $this->tableName ORDER BY $sort";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            return false;
        }
    }

    function update()
    {
        try {
            $query = "UPDATE " . $this->tableName . " SET `login` = ?, `user_name` = ? WHERE " . $this->tableName . " .`id` = ?";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->login);
            $stmt->bindParam(2, $this->userName);
            $stmt->bindParam(3, $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            return false;
        }
    }

    public function registerUser(): bool
    {
        try {
            $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

            $query = "INSERT INTO $this->tableName (`login`, `password`, `user_name`) VALUES(?, ?, ?)";
            $stmt = $this->conn->prepare($query);

            if ($stmt->execute([$this->login, $passwordHash, $this->userName])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            return false;
        }
    }

    public function authorizeUser(): bool
    {
        try {
            $query = "SELECT * FROM $this->tableName WHERE login = '$this->login'";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetch();

            if (!empty($stmt)) {
                $passwordHash = $stmt['password'];

                if (password_verify($this->password, $passwordHash)) {
                    static::logout();
                    session_start();

                    $_SESSION["USER_NAME"] = $stmt["name"];
                    $_SESSION["USER_ID"] = $stmt["id"];

                    if ($stmt['is_admin']) {
                        $_SESSION['IS_ADMIN'] = true;
                    }
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $exception) {
            return false;
        }
    }

    public static function logout(): void
    {
        try {
            session_start();

            if ($_SESSION['USER_ID']) {
                unset($_SESSION['USER_ID']);
            }

            if ($_SESSION['IS_ADMIN']) {
                unset($_SESSION['IS_ADMIN']);
            }

        } catch (Exception $exception) {
        }
    }

    public function userExists(): bool
    {
        try {
            $query = "SELECT login FROM $this->tableName WHERE login LIKE '$this->login'";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->rowCount();

            if ($stmt) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            return false;
        }
    }
}