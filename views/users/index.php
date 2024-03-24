<html lang="en">
<head>
    <?php require_once 'header.php'; ?>
    <title>Users</title>
</head>
<body>
    <?php
        require_once 'menu.php';
    ?>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h4>USER LIST</h4>
            </div>
            <div class="col-md-6 text-end">
                <a class="btn btn-sm btn-success" href="./create">+ Create User</a>
            </div>
        </div>
    </div>    

    <div class="container">
        <table class="table table-bordered table-striped table-hover">
            
            <thead>
                <tr class="table-info">
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['id']}</td>";
                    echo "<td>{$user['firstname']}</td>";
                    echo "<td>{$user['lastname']}</td>";
                    echo "<td>{$user['email']}</td>";
                    echo "<td>{$user['role']}</td>";
                    echo "<td>{$user['avatar']}</td>";
                    echo "<td>{$user['status']}</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-info' href='show/{$user['id']}'>Show</a>
                        <a class='btn btn-sm btn-warning' href='edit/{$user['id']}'>Edit</a>
                        <a class='btn btn-sm btn-danger' href='delete/{$user['id']}'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
    </div>

    <?php
        require_once 'footer.php';
    ?>
</body>
</html>
