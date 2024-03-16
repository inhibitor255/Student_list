<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    // In the UsersTable class insert method
    public function insert($data)
    {
        try {
            $query = "
            INSERT INTO users (
                name, email, phone, address, password, role_id, gender, created_at, class_id, subject_id, age
            ) VALUES (
                :name, :email, :phone, :address, :password, :role_id, :gender, NOW(), :class_id, :subject_id, :age
            )
        ";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Log or display the error message
            error_log($e->getMessage());
            // Return false to indicate that the insertion failed
            return false;
        }
    }

    public function findByEmailAndPasword($email, $password)
    {
        $statement = $this->db->prepare("
                                            SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                                            FROM users 
                                            LEFT JOIN roles ON users.role_id = roles.id
                                            LEFT JOIN classes ON users.class_id = classes.id
                                            LEFT JOIN subjects ON users.subject_id = subjects.id
                                            WHERE users.email = :email
                                            AND users.password = :password
                                        ");
        $statement->execute([
            'email' => $email,
            'password' => $password
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }

    public function getStudents($classFilter = null, $subjectFilter = null)
    {
        if ($classFilter  && $subjectFilter || empty($classFilter) && $subjectFilter  || $classFilter && empty($subjectFilter)) {
            $query = "SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                    FROM users 
                    LEFT JOIN roles ON users.role_id = roles.id
                    LEFT JOIN classes ON users.class_id = classes.id
                    LEFT JOIN subjects ON users.subject_id = subjects.id
                    WHERE (roles.id = 1 OR roles.id = 2)";
            if ($classFilter !== "") {
                $query .= " AND class_id = :class_id";
            }

            if ($subjectFilter !== "") {
                $query .= " AND subject_id = :subject_id";
            }

            $query .= " ORDER BY users.updated_at DESC";
            $statement = $this->db->prepare($query);
            if ($classFilter !== "") {
                $statement->bindParam(':class_id', $classFilter);
            }

            if ($subjectFilter !== "") {
                $statement->bindParam(':subject_id', $subjectFilter);
            }
            $statement->execute();
        } else {
            $statement = $this->db->query("
                                        SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                                        FROM users 
                                        LEFT JOIN roles ON users.role_id = roles.id
                                        LEFT JOIN classes ON users.class_id = classes.id
                                        LEFT JOIN subjects ON users.subject_id = subjects.id
                                        WHERE roles.id = 1
                                        ORDER BY users.updated_at DESC
                                    ");
        }

        return $statement->fetchAll();
    }
    public function getStudentsAndAdmins($classFilter = null, $subjectFilter = null)
    {

        if ($classFilter  && $subjectFilter || empty($classFilter) && $subjectFilter  || $classFilter && empty($subjectFilter)) {
            $query = "SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                    FROM users 
                    LEFT JOIN roles ON users.role_id = roles.id
                    LEFT JOIN classes ON users.class_id = classes.id
                    LEFT JOIN subjects ON users.subject_id = subjects.id
                    WHERE (roles.id = 1 OR roles.id = 2)";
            if ($classFilter !== "") {
                $query .= " AND class_id = :class_id";
            }

            if ($subjectFilter !== "") {
                $query .= " AND subject_id = :subject_id";
            }

            $query .= " ORDER BY users.updated_at DESC";
            $statement = $this->db->prepare($query);
            if ($classFilter !== "") {
                $statement->bindParam(':class_id', $classFilter);
            }

            if ($subjectFilter !== "") {
                $statement->bindParam(':subject_id', $subjectFilter);
            }
            $statement->execute();
        } else {
            $statement = $this->db->query("
                                        SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                                        FROM users 
                                        LEFT JOIN roles ON users.role_id = roles.id
                                        LEFT JOIN classes ON users.class_id = classes.id
                                        LEFT JOIN subjects ON users.subject_id = subjects.id
                                        WHERE roles.id = 1 OR roles.id = 2
                                        ORDER BY users.updated_at DESC
                                    ");
        }

        return $statement->fetchAll();
    }

    public function userProfile($id)
    {
        $statement = $this->db->prepare("
                                        SELECT users.*, roles.name AS role, roles.value, classes.name AS class, subjects.name AS subject
                                        FROM users 
                                        LEFT JOIN roles ON users.role_id = roles.id
                                        LEFT JOIN classes ON users.class_id = classes.id
                                        LEFT JOIN subjects ON users.subject_id = subjects.id
                                        WHERE users.id = :id        
                                        ");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        return $row ?? false;
    }

    public function updatePhoto($id, $name)
    {
        $statement = $this->db->prepare(
            "
                                        UPDATE users SET photo=:name WHERE id = :id"
        );
        $statement->execute(['name' => $name, 'id' => $id]);
        return $statement->rowCount();
    }

    public function suspend($id)
    {
        $statement = $this->db->prepare("
        UPDATE users SET suspended = 1, updated_at = NOW() WHERE id = :id
    ");
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }

    public function unsuspend($id)
    {
        $statement = $this->db->prepare("
        UPDATE users SET suspended = 0, updated_at = NOW() WHERE id = :id
    ");
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }

    public function changeRole($id, $role)
    {
        $statement = $this->db->prepare("
        UPDATE users SET role_id = :role, updated_at = NOW() WHERE id = :id
    ");
        $statement->execute(['id' => $id, 'role' => $role]);
        return $statement->rowCount();
    }


    public function delete($id)
    {
        $statement = $this->db->prepare("
                                            DELETE FROM users WHERE id = :id
                                        ");
        $statement->execute(['id' => $id]);
        return $statement->rowCount();
    }
}
