<?php


require 'config.php';

class Employee
{


    public function getAllEmployees()
    {
        global $db;
        $query = $db->query("SELECT * FROM Employee");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Employee WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployee($id, $name, $email, $age, $designation, $created)
    {
            global $db;
            $query = $db->prepare("INSERT INTO Employee (id, name, email, age, designation, created) VALUES (:id, :name, :email, :age, :designation, :created)");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':age', $age, PDO::PARAM_INT);
            $query->bindParam(':designation', $designation, PDO::PARAM_STR);
            $createdFormatted = (new DateTime($created))->format('Y-m-d H:i:s');
            $query->bindParam(':created', $createdFormatted, PDO::PARAM_STR);
            return $query->execute();

    }

    public function updateEmployee($id, $name, $email, $age, $designation, $created)
    {
            global $db;
            $query = $db->prepare("UPDATE Employee SET name = :name, email = :email, age = :age, designation = :designation, created = :created WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':age', $age, PDO::PARAM_INT);
            $query->bindParam(':designation', $designation, PDO::PARAM_STR);
            $createdFormatted = (new DateTime($created))->format('Y-m-d H:i:s');
            $query->bindParam(':created', $createdFormatted, PDO::PARAM_STR);
            return $query->execute();
            return false;
    }

    public function deleteEmployee($id)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Employee WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
