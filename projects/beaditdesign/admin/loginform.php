<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

    <h2>Login Form</h2>

    <form method="POST" action="http://localhost/admin/login_action.php">

        <?php if (isset($_GET['error'])): ?>

            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>

        <?php endif; ?>


        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>

            <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter email"
                name="email"
                required
            >
        </div>


        <!-- Password -->
        <div class="form-group">
            <label for="pwd">Password:</label>

            <input
                type="password"
                class="form-control"
                id="pwd"
                placeholder="Enter password"
                name="password"
                required
            >
        </div>


        <!-- Submit -->
        <div class="form-group">

            <button type="submit" class="btn btn-primary">
                Login
            </button>

        </div>

    </form>

</div>

</body>
</html>