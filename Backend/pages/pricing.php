<?php include '../includes/header.php'; ?>

<?php
require_once '../includes/config.php';

// Fetch item if in edit mode
$isEdit = isset($_GET['edit']) && is_numeric($_GET['edit']);
$editItem = null;

if ($isEdit) {
    $stmt = $pdo->prepare("SELECT * FROM pricing WHERE id = ?");
    $stmt->execute([$_GET['edit']]);
    $editItem = $stmt->fetch();
}

// Status messages
$status = $_GET['status'] ?? '';
$messages = [
    'success' => 'Pricing item saved successfully.',
    'deleted' => 'Pricing item deleted.',
    'updated' => 'Pricing item updated.',
    'error' => 'An error occurred. Please try again.',
];
?>

<div class="container mt-4">
  <h2><?= $isEdit ? 'Edit' : 'Add New' ?> Pricing Plan</h2>

  <?php if (isset($messages[$status])): ?>
    <div class="alert alert-<?= $status === 'error' ? 'danger' : 'success' ?>"><?= $messages[$status] ?></div>
  <?php endif; ?>

  <div class="card shadow p-4 my-4">
    <form method="POST" action="../forms/submit_pricing.php">
      <?php if ($isEdit): ?>
        <input type="hidden" name="id" value="<?= $editItem['id'] ?>">
        <input type="hidden" name="action" value="update">
      <?php else: ?>
        <input type="hidden" name="action" value="add">
      <?php endif; ?>

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required value="<?= $editItem['title'] ?? '' ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" required placeholder="E.g. Ksh 3,500 - 30,000 or Contact Us" value="<?= $editItem['price_label'] ?? '' ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Icon</label>
        <select name="icon" class="form-select" required>
          <?php
          $icons = ['bi-box' => '📦 Box', 'bi-send' => '✉️ Send', 'bi-airplane' => '✈️ Airplane', 'bi-rocket' => '🚀 Rocket'];
          foreach ($icons as $val => $label) {
              $selected = ($editItem['icon_class'] ?? '') === $val ? 'selected' : '';
              echo "<option value='$val' $selected>$label</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Color</label>
        <select name="color" class="form-select" required>
          <?php
          $colors = [
              '#20c997' => '🟩 Teal',
              '#0dcaf0' => '🔵 Cyan',
              '#fd7e14' => '🟧 Orange',
              '#0d6efd' => '🔷 Blue'
          ];
          foreach ($colors as $val => $label) {
              $selected = ($editItem['icon_color'] ?? '') === $val ? 'selected' : '';
              echo "<option value='$val' style='color:$val' $selected>$label ($val)</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">List Items (separated by semicolon)</label>
        <textarea name="description" rows="4" class="form-control" required><?= isset($editItem['features']) ? str_replace("\n", "; ", $editItem['features']) : '' ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">CTA Text</label>
        <input type="text" name="cta_text" class="form-control" value="<?= $editItem['cta_text'] ?? 'Get Started' ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">CTA Link</label>
        <input type="text" name="cta_link" class="form-control" value="<?= $editItem['cta_link'] ?? '#contact' ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Notes (optional)</label>
        <textarea name="note" class="form-control" rows="3"><?= $editItem['notes'] ?? '' ?></textarea>
      </div>

      <div class="form-check mb-3">
        <input type="checkbox" name="featured" class="form-check-input" <?= !empty($editItem['featured']) ? 'checked' : '' ?>>
        <label class="form-check-label">Mark as Featured</label>
      </div>

      <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update' : 'Submit' ?></button>
    </form>
  </div>
</div>

<!-- Existing Items -->
<?php
$stmt = $pdo->query("SELECT * FROM pricing ORDER BY featured DESC, id ASC");
$pricingItems = $stmt->fetchAll();
?>

<div class="container mt-5">
  <h3>Manage Existing Pricing Items</h3>
  <div class="row gy-4">
    <?php foreach ($pricingItems as $item): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-3 position-relative">
          <?php if ($item['featured']): ?>
            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Featured</span>
          <?php endif; ?>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><?= htmlspecialchars($item['title']) ?></h5>
            <i class="<?= $item['icon_class'] ?> fs-4" style="color: <?= $item['icon_color'] ?>"></i>
          </div>
          <div class="text-muted mb-2"><?= htmlspecialchars($item['price_label']) ?></div>
          <ul class="small list-unstyled">
            <?php foreach (explode("\n", $item['features']) as $feature): ?>
              <li><i class="bi bi-check-circle text-success me-1"></i> <?= htmlspecialchars($feature) ?></li>
            <?php endforeach; ?>
          </ul>
          <p class="small text-muted"><?= nl2br(htmlspecialchars($item['notes'])) ?></p>
          <div class="d-flex justify-content-between">
            <a href="?edit=<?= $item['id'] ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
            <a href="../forms/actions.php?id=<?= $item['id'] ?>&type=pricing&action=delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to Delete this item?')"><i class="bi bi-trash"></i> Delete</a>
            <form method="POST" action="../forms/actions.php">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <input type="hidden" name="action" value="feature">
              <button class="btn btn-sm btn-outline-<?= $item['featured'] ? 'secondary' : 'success' ?>"><i class="bi bi-star<?= $item['featured'] ? '-fill' : '' ?>"></i> <?= $item['featured'] ? 'Unfeature' : 'Feature' ?></button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
