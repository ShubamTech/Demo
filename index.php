<?php
include 'config/db.php';
include 'partials/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Leads</h2>
    <a href="dashboard/create.php" class="btn btn-success">+ Add Lead</a>
</div>

<?php
$result = $conn->query("SELECT * FROM leads ORDER BY id DESC");

if ($result->num_rows > 0): ?>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td>
                        <a href="dashboard/edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="dashboard/delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lead?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info">No leads found. Click "Add Lead" to create your first entry.</div>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>
