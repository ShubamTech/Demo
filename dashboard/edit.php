<?php include '../config/db.php'; ?>
<?php include '../partials/header.php'; ?>

<?php
// Validate and sanitize ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid ID.</div>";
    include '../partials/footer.php';
    exit;
}

$id = (int) $_GET['id'];

// Handle POST (Update logic)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE leads SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-2'>Updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger mt-2'>Update failed: " . $conn->error . "</div>";
    }
}

// Fetch current data to show in the form
$result = $conn->query("SELECT * FROM leads WHERE id=$id");
if ($result->num_rows !== 1) {
    echo "<div class='alert alert-danger'>Lead not found.</div>";
    include '../partials/footer.php';
    exit;
}
$row = $result->fetch_assoc();
?>

<h2>Edit Lead</h2>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" class="form-control mb-2" required>
    <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" class="form-control mb-2" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" class="form-control mb-2" required>
    <button type="submit" class="btn btn-warning">Update</button>
</form>

<?php include '../partials/footer.php'; ?>
