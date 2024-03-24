<?php
// require_once '../database.helper.php';
class UserController {

    // initialize the database connection
    private $db;

    public function __construct() {
        $this->db = DatabaseHelper::connect();
    }

    // Get All Users
    public function index() {
        // Get all users from the database
        $sql = "SELECT * FROM users WHERE status = '1'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Load the view
        require_once 'views/users/index.php';
        // echo "<pre>";
        // print_r($users);
        // echo "</pre>";
    }

    // Get User by ID
    public function show() {

        $id = $_GET['id'];
        // Get the user by ID
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Load the view
        require_once 'views/users/show.php';
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    }

    // Create User
    public function create() {

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // รับค่าจาก form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $avatar = $_POST['avatar'];
            $status = 1;

            // Validate the form
            if(empty($firstname) || empty($lastname) || empty($email) || empty($role))
            {
                echo "Please fill out the form";
                exit;
            }

            // Create the user
            $sql = 'INSERT INTO users (firstname, lastname, email, role, avatar, status) VALUES (:firstname, :lastname, :email, :role, :avatar, :status)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

            // Redirect to the index page
            header('Location: index');
        }

        // Load the view
        require_once 'views/users/create.php';
    }

    // Edit User
    public function edit() {

        // Retrieve the user by ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // รับค่าจาก form
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $avatar = $_POST['avatar'];

            // Validate the form
            if(empty($firstname) || empty($lastname) || empty($email) || empty($role))
            {
                echo "Please fill out the form";
                exit;
            }

            // Update the user
            $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, role = :role, avatar = :avatar WHERE id = :id';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->execute();

            // Redirect to the index page
            header('Location: index');
        }

        // Load the view
        require_once 'views/users/edit.php';
    }

    // Delete User
    public function delete() {
        // Retrieve the user by ID
        $id = $_GET['id'];
        // $sql = "DELETE FROM users WHERE id = :id";
        $sql = "UPDATE users SET status = '0' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect to the index page
        header('Location:index');
    }

}

// Get the action from the URL
$action = $_GET['action'];

// Create an instance of the UserController
$controller = new UserController();

// Switch the action
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}