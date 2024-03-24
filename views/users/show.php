<html lang="en">
<head>
    <?php require_once 'header.php'; ?>
    <title>
        <?php echo $user['firstname']." ". $user['lastname'];?>
    </title>
</head>
<body>
    <?php
        require_once 'menu.php';
    ?>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h2><?php echo $user['firstname']." ". $user['lastname'];?></h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div>
            <p>
                <strong>Email:</strong> <?php echo $user['email'];?>
            </p>
            <p>
                <strong>Role:</strong> <?php echo $user['role'];?>
            </p>
            <p>
                <strong>Avatar:</strong> <?php echo $user['avatar'];?>
            </p>
            <p>
                <a class="btn btn-sm btn-info" href="../index">Back to home</a>
            </p>
        </div>
    </div>

    <?php
        require_once 'footer.php';
    ?>
</body>
</html>
    
        