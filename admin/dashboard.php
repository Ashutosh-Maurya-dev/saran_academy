<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->query('SELECT id, student_name, parent_name, phone, email, class_applied, message, created_at FROM admission_queries ORDER BY created_at DESC');
$queries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Queries | Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <section>
            <div class="top-actions">
                <a href="logout.php" class="admin-link" style="color:#1e3a8a;border-color:#1e3a8a;">Logout</a>
            </div>
            <h3>Admission Queries</h3>
            <p>Total Queries: <strong><?php echo count($queries); ?></strong></p>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Parent Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($queries) === 0): ?>
                            <tr><td colspan="8">No admission queries yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($queries as $row): ?>
                                <tr>
                                    <td><?php echo (int) $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['parent_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['class_applied']); ?></td>
                                    <td><?php echo htmlspecialchars($row['message'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
