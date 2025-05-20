<?php include '../config/db.php'; ?>
<?php include '../partials/header.php'; ?>

<h2>Add Lead</h2>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
    <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
    <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Add Lead</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $conn->query("INSERT INTO leads (name, email, phone) VALUES ('$name', '$email', '$phone')");
    echo "<div class='alert alert-success mt-2'>Lead added successfully.</div>";
}
?>

<?php include '../partials/footer.php'; ?>
