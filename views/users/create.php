<html lang="en">
<head>
    <?php require_once 'header.php'; ?>
    <title>
        Create User
    </title>
</head>
<body>
    <?php
        require_once 'menu.php';
    ?>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h4>CREATE USER</h4>
            </div>
            <div class="col-md-6 text-end">
                <a class="btn btn-sm btn-info" href="../User/index">< Back</a>
            </div>
        </div>
    </div>  

    <div class="container">
        <form action="./create" method="post">

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Enter your first name" required />
                <label for="firstname">First name</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Enter your last name" required />
                <label for="lastname">Last name</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email" required />
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="role" name="role" type="text" placeholder="Enter your role" required />
                <label for="role">Role</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="avatar" name="avatar" type="text" placeholder="Enter your avatar" required />
                <label for="avatar">Avatar</label>
            </div>
            
            <input class="btn btn-primary" type="submit" value="Create">

        </form>
    </div>

    <?php
        require_once 'footer.php';
    ?>
</body>
</html>