<?php

require 'Employee.php';

$employee = new Employee();

$table = "employee";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Afficher la liste de tous les employés
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $employeeData = $employee->getEmployeeById($id);
        echo json_encode($employeeData, JSON_PRETTY_PRINT);
    } else {
        $employees = $employee->getAllEmployees();
        echo json_encode($employees, JSON_PRETTY_PRINT);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Créer un nouvel employé
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $age = $data['age'];
    $designation = $data['designation'];
    $created = $data['created'];
    $result = $employee->createEmployee($id, $name, $email, $age, $designation, $created);
    if ($result) {
        echo "Nouvel employé créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'employé.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Modifier un employé existant
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['name'];
        $email = $data['email'];
        $age = $data['age'];
        $designation = $data['designation'];
        $created = $data['created'];
        $result = $employee->updateEmployee($id, $name, $email, $age, $designation, $created);
        if ($result) {
            echo " l'Employé  à été  mis à jour avec succès";
        } else {
            echo "Erreur lors de la mise à jour de l'employé.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Supprimer un employé existant
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $employee->deleteEmployee($id);
        if ($result) {
            echo "Employé supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'employé.";
        }
    }
}


