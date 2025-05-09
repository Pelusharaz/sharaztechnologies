<?php include '../includes/header.php'; ?>
<h1>User Analytics</h1>

<?php
require '../includes/db.php';

$sql = "SELECT page, action, COUNT(*) as count FROM user_activity GROUP BY page, action";
$stmt = $pdo->query($sql);
$activities = $stmt->fetchAll();
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Page</th>
      <th>Action</th>
      <th>Count</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($activities as $activity): ?>
      <tr>
        <td><?php echo $activity['page']; ?></td>
        <td><?php echo $activity['action']; ?></td>
        <td><?php echo $activity['count']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../includes/footer.php'; ?>
