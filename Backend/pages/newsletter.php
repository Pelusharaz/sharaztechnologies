<?php
require_once '../includes/config.php';

$limit = 10;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Count total records
$totalStmt = $pdo->query("SELECT COUNT(*) FROM newsletter_subscribers");
$totalSubscribers = $totalStmt->fetchColumn();
$totalPages = ceil($totalSubscribers / $limit);

// Fetch paginated results
$stmt = $pdo->prepare("SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<div class="container my-4">
  <h3>Newsletter Subscribers</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Subscribed At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($subscribers as $i => $sub): ?>
        <tr>
          <td><?= $offset + $i + 1 ?></td>
          <td><?= htmlspecialchars($sub['email']) ?></td>
          <td><?= date('d M Y, H:i', strtotime($sub['subscribed_at'])) ?></td>
          <td>
            <a href="mailto:<?= $sub['email'] ?>" class="btn btn-sm btn-success">Email</a>
            <a href="../forms/delete.php?id=<?= $sub['id'] ?>&type=newsletter" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subscriber?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (count($subscribers) === 0): ?>
        <tr><td colspan="4" class="text-center text-muted">No subscribers yet.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination Controls -->
  <?php if ($totalPages > 1): ?>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php if ($page > 1): ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
      <?php endif; ?>

      <?php for ($p = 1; $p <= $totalPages; $p++): ?>
        <li class="page-item <?= $p == $page ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $p ?>"><?= $p ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <?php endif; ?>

  <!-- send bulk mails -->
  <h4 class="mt-5">Send Bulk Email</h4>
  <form id="bulk-email-form" action="../forms/sendbulkemails.php" class="mb-4">
  <div class="mb-3">
    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
  </div>
  <div class="mb-3">
    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send to All Subscribers</button>
  <div class="loading mt-2" style="display: none;">Sending...</div>
  <div class="error-message text-danger mt-2" style="display: none;"></div>
  <div class="sent-message text-success mt-2" style="display: none;"></div>
  </form>

  <button class="btn btn-primary mt-3" onclick="alert('Bulk mailing feature coming soon!')">Send Bulk Email</button>
</div>






<?php include '../includes/footer.php'; ?>
