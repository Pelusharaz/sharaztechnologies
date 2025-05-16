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
            <a href="../forms/actions.php?id=<?= $sub['id'] ?> &type=newsletter&action=delete" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subscriber?')">Delete</a>
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
  <form id="bulk-email-form" action="../forms/sendbulkemails.php" method="POST" class="mb-4 php-email-form">
    <div class="mb-3">
      <input type="text" class="form-control" name="subject" placeholder="Subject" required>
    </div>
    <div class="mb-3">
      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send to All Subscribers</button>

    <div class="loading" >Loading</div>
    <div class="error-message"></div>
    <div class="sent-message">Your message has been sent. Thank you!</div>
  </form>
  <!-- <button class="btn btn-primary mt-3" onclick="alert('Bulk mailing feature coming soon!')">Send Bulk Email</button> -->
</div>

<script>
  // send bulk messages
  document.getElementById('bulk-email-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const loading = form.querySelector('.loading');
    const errorMsg = form.querySelector('.error-message');
    const sentMsg = form.querySelector('.sent-message');

    // Reset messages
    [loading, errorMsg, sentMsg].forEach(el => {
      el.classList.remove('show');
      el.style.display = 'none';
    });

    // Show loading
    loading.style.display = 'block';
    requestAnimationFrame(() => loading.classList.add('show')); // smoother trigger

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      // Stop loading
      loading.classList.remove('show');
      setTimeout(() => loading.style.display = 'none', 300);

      if (result.status === 'success') {
        sentMsg.textContent = result.message;
        sentMsg.style.display = 'block';
        requestAnimationFrame(() => sentMsg.classList.add('show'));
        form.reset();

        setTimeout(() => {
          sentMsg.classList.remove('show');
          setTimeout(() => sentMsg.style.display = 'none', 300);
        }, 5000);
      } else {
        errorMsg.textContent = result.message;
        errorMsg.style.display = 'block';
        requestAnimationFrame(() => errorMsg.classList.add('show'));

        setTimeout(() => {
          errorMsg.classList.remove('show');
          setTimeout(() => errorMsg.style.display = 'none', 300);
        }, 5000);
      }

    } catch (err) {
      loading.classList.remove('show');
      setTimeout(() => loading.style.display = 'none', 300);

      errorMsg.textContent = 'An unexpected error occurred.';
      errorMsg.style.display = 'block';
      requestAnimationFrame(() => errorMsg.classList.add('show'));

      setTimeout(() => {
        errorMsg.classList.remove('show');
        setTimeout(() => errorMsg.style.display = 'none', 300);
      }, 5000);
    }
  });
</script>


<?php include '../includes/footer.php'; ?>
