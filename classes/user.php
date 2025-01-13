<?php
class User extends Database {
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            // Verify the password
            if ($user && password_verify($password, $user->password_hash)) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error logging in: " . $e->getMessage();
            return false;
        }
    }

    public function register($username, $password_hash, $role) {
        $query = "INSERT INTO users (username, password_hash, role) VALUES (:username, :password_hash, :role)";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'username' => $username,
                'password_hash' => $password_hash,
                'role' => $role
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
            return false;
        }
    }
}
?>