

<?php
require '../includes/config.php';

$sql = "SELECT page, action, COUNT(*) as count FROM user_activity GROUP BY page, action";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for Chart.js
$labels = [];
$counts = [];

foreach ($data as $row) {
    $labels[] = $row['page'] . ' (' . $row['action'] . ')';
    $counts[] = $row['count'];
}
?>


<?php include '../includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container my-5">
  <h1 class="mb-4">User Analytics</h1>

  <div class="mb-4">
    <canvas id="activityChart"></canvas>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Page</th>
        <th>Action</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['page']) ?></td>
          <td><?= htmlspecialchars($row['action']) ?></td>
          <td><?= $row['count'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  const ctx = document.getElementById('activityChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($labels) ?>,
      datasets: [{
        label: 'User Interactions',
        data: <?= json_encode($counts) ?>,
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>


<?php include '../includes/footer.php'; ?>
