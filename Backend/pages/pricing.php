<?php include '../includes/header.php'; ?>

<h2>Manage Pricing Items</h2>

<!-- Add New -->
<div class="container my-5">
  <div class="card shadow-lg p-4">
    <h4 class="mb-4">Add New Pricing Plan</h4>
    <form id="pricingForm" method="POST" action="../forms/submit_pricing.php">

      <!-- Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>

      <!-- Price -->
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="E.g. Ksh 3,500 - 30,000 or Contact Us" required>
      </div>

      <!-- Icon Selection -->
      <div class="mb-3">
        <label for="icon" class="form-label">Icon</label>
        <select name="icon" id="icon" class="form-select" required>
          <option value="bi-box"><i class="bi bi-box"></i> 📦 Box</option>
          <option value="bi-send"><i class="bi bi-send"></i> ✉️ Send</option>
          <option value="bi-airplane"><i class="bi bi-airplane"></i> ✈️ Airplane</option>
          <option value="bi-rocket"><i class="bi bi-rocket"></i> 🚀 Rocket</option>
        </select>
      </div>

      <!-- Color Selection -->
      <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <select name="color" id="color" class="form-select" required>
          <option value="#20c997" style="color:#20c997;">🟩 Teal (#20c997)</option>
          <option value="#0dcaf0" style="color:#0dcaf0;">🔵 Cyan (#0dcaf0)</option>
          <option value="#fd7e14" style="color:#fd7e14;">🟧 Orange (#fd7e14)</option>
          <option value="#0d6efd" style="color:#0d6efd;">🔷 Blue (#0d6efd)</option>
        </select>
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">List Items (separated by semicolon)</label>
        <textarea name="description" id="description" class="form-control" rows="4" placeholder="E.g. Feature 1; Feature 2; Feature 3" required></textarea>
      </div>

    <div class="mb-3">
    <label for="cta_text" class="form-label">CTA Text</label>
    <input type="text" name="cta_text" id="cta_text" class="form-control" value="Get Started">
    </div>

    <div class="mb-3">
    <label for="cta_link" class="form-label">CTA Link</label>
    <input type="text" name="cta_link" id="cta_link" class="form-control" value="#contact">
    </div>


      <!-- Notes -->
      <div class="mb-3">
        <label for="note" class="form-label">Additional Notes</label>
        <textarea name="note" id="note" class="form-control" rows="3" placeholder="Extra information (optional)"></textarea>
      </div>

      <!-- Featured Checkbox -->
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="featured" id="featured">
        <label class="form-check-label" for="featured">Mark as Featured</label>
      </div>
      

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Submit</button>
      <div id="formStatus" class="mt-3"></div>
    </form>
  </div>
</div>



<!-- Existing Items -->
<?php
require_once '../includes/config.php'; // adjust if in same dir

$stmt = $pdo->query("SELECT * FROM pricing ORDER BY featured DESC, id ASC");
$pricingItems = $stmt->fetchAll();
?>

<div class="container mt-5">
  <h2 class="mb-4">Manage Pricing Items</h2>
  <div class="row gy-4">
    <?php foreach ($pricingItems as $item): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border rounded p-3 position-relative">
          <?php if ($item['featured']): ?>
            <span class="badge bg-warning position-absolute top-0 end-0 m-2">Featured</span>
          <?php endif; ?>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><?= htmlspecialchars($item['title']) ?></h5>
            <i class="<?= htmlspecialchars($item['icon_class']) ?> fs-4" style="color: <?= htmlspecialchars($item['icon_color']) ?>;"></i>
          </div>
          <div class="text-muted mb-2"><?= htmlspecialchars($item['price_label']) ?></div>
          <ul class="list-unstyled small">
            <?php foreach (explode("\n", $item['features']) as $feature): ?>
              <li><i class="bi bi-check-circle me-1 text-success"></i> <?= htmlspecialchars(trim($feature)) ?></li>
            <?php endforeach; ?>
          </ul>
          <p class="small text-muted"><?= nl2br(htmlspecialchars($item['notes'])) ?></p>
          <div class="d-flex justify-content-between mt-3">
            <a href="edit_pricing.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary">
              <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="../forms/delete.php" method="POST" onsubmit="return confirm('Are you sure?')">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i> Delete
              </button>
            </form>
            <form action="../forms/delete.php" method="POST">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-<?= $item['featured'] ? 'secondary' : 'success' ?>">
                <i class="bi bi-star<?= $item['featured'] ? '-fill' : '' ?>"></i>
                <?= $item['featured'] ? 'Unfeature' : 'Feature' ?>
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>



<?php include '../includes/footer.php'; ?>
