<html lang="en">
<head>
    <?php require_once 'header.php'; ?> 
    <title>
        Edit User
    </title>
</head>
<body>

    <?php
        require_once 'menu.php';
    ?>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h4>EDIT USER</h4>
            </div>
            <div class="col-md-6 text-end">
                <a class="btn btn-sm btn-info" href="../index">< Back</a>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="../edit" method="post">

            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="firstname" name="firstname" type="text" value="<?php echo $user['firstname']; ?>" />
                <label for="firstname">First name</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="lastname" name="lastname" type="text" value="<?php echo $user['lastname']; ?>" />
                <label for="lastname">Last name</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="email" name="email" type="email" value="<?php echo $user['email']; ?>" />
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="role" name="role" type="text" value="<?php echo $user['role']; ?>" />
                <label for="role">Role</label>
            </div>

            <div class="form-floating mb-3 mb-md-2">
                <input class="form-control" id="avatar" name="avatar" type="text" value="<?php echo $user['avatar']; ?>" />
                <label for="avatar">Avatar</label>
            </div>
            
            <input class="btn btn-primary" type="submit" value="Update">
        </form>

    </div>

    <?php
        require_once 'footer.php';
    ?>

</body>
</html>