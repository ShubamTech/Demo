<?php
session_start();
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == '123') {
        $_SESSION['loggedin'] = true;
        header('Location: ../dashboard/index.php');
    } else {
        $error = "Invalid login!";
    }
}
?>

<?php include '../partials/header.php'; ?>

<div class="container mt-5">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <input class="form-control mb-2" name="username" placeholder="Username" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
        <button class="btn btn-primary">Login</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
