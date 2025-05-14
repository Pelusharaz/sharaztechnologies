
<!-- Get contact messages -->
<?php
require_once '../includes/config.php'; // PDO connection

// Pagination setup
$limit = 10; // Messages per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total messages count
$totalStmt = $pdo->query("SELECT COUNT(*) FROM contact_messages");
$totalMessages = $totalStmt->fetchColumn();
$totalPages = ceil($totalMessages / $limit);

// Fetch paginated messages
$stmt = $pdo->prepare("SELECT * FROM contact_messages ORDER BY submitted_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
  <h2>Contact Messages</h2>

  <!-- Responsive wrapper -->
  <div class="table-responsive">
    <table class="table table-bordered table-hover mt-4">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($messages): ?>
          <?php foreach ($messages as $index => $msg): ?>
            <tr>
              <td><?= ($offset + $index + 1) ?></td>
              <td><?= htmlspecialchars($msg['name']) ?></td>
              <td><?= htmlspecialchars($msg['email']) ?></td>
              <td><?= htmlspecialchars($msg['subject']) ?></td>
              <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
              <td><?= date('d M Y, H:i', strtotime($msg['submitted_at'])) ?></td>
              <td>
                <a href="mailto:<?= $msg['email'] ?>?subject=RE: <?= urlencode($msg['subject']) ?>" class="btn btn-sm btn-primary">Reply</a>
                <a href="../forms/delete.php?id=<?= $msg['id'] ?>&type=contact" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center text-muted">No messages found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination controls -->
  <nav aria-label="Message pagination">
    <ul class="pagination justify-content-center mt-3">
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
        </li>
      <?php else: ?>
        <li class="page-item disabled">
          <span class="page-link">Previous</span>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
        </li>
      <?php else: ?>
        <li class="page-item disabled">
          <span class="page-link">Next</span>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>


<!-- end Getting contact messages -->


<?php include '../includes/footer.php'; ?>


