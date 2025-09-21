<?php include "db.php"; 
$table = $_GET['table'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Unique Food - Table <?= $table ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }
    header {
      text-align: center;
      margin-bottom: 20px;
    }
    header img {
      max-width: 150px;
      margin: 10px auto;
    }
    .category {
      margin-top: 30px;
    }
    .menu-item {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .menu-item h6 {
      margin: 0;
      font-weight: 600;
    }
    .price {
      font-weight: bold;
      color: #28a745;
    }
    .qty-box {
      width: 60px;
      text-align: center;
    }
    .btn-order {
      width: 100%;
      margin-top: 30px;
      font-size: 18px;
      padding: 12px;
      border-radius: 8px;
    }
  </style>
</head>
<body class="container py-4">

  <header>
    <img src="logo.png" alt="Unique Food Logo">
    <h2>🍽️ Unique Food - Table <?= $table ?></h2>
  </header>

  <form action="place_order.php" method="POST">
    <input type="hidden" name="table_no" value="<?= $table ?>">

    <!-- Pani Puri -->
    <div class="category">
      <h4>🥙 Pani Puri</h4>
      <div class="menu-item">
        <h6>Sadi Pani Puri</h6>
        <span class="price">₹30</span>
        <input type="number" name="Sadi_Pani_Puri" min="0" value="0" class="form-control qty-box">
      </div>
      <div class="menu-item">
        <h6>Dahi Puri</h6>
        <span class="price">₹50</span>
        <input type="number" name="Dahi_Puri" min="0" value="0" class="form-control qty-box">
      </div>
      <div class="menu-item">
        <h6>Sev Puri</h6>
        <span class="price">₹50</span>
        <input type="number" name="Sev_Puri" min="0" value="0" class="form-control qty-box">
      </div>
      <div class="menu-item">
        <h6>Cheese Pani Puri</h6>
        <span class="price">₹60</span>
        <input type="number" name="Cheese_Pani_Puri" min="0" value="0" class="form-control qty-box">
      </div>
    </div>

    <!-- Chinese -->
    <div class="category">
      <h4>🥡 Chinese</h4>
      <div class="menu-item">
        <h6>Manchurian</h6>
        <span class="price">₹50</span>
        <input type="number" name="Manchurian" min="0" value="0" class="form-control qty-box">
      </div>
      <div class="menu-item">
        <h6>Manchurian Nudelsee</h6>
        <span class="price">₹60</span>
        <input type="number" name="Manchurian_Nudelsee" min="0" value="0" class="form-control qty-box">
      </div>
    </div>

    <!-- Other -->
    <div class="category">
      <h4>🍛 Other</h4>
      <div class="menu-item"><h6>Pav Bhaji</h6><span class="price">₹80</span><input type="number" name="Pav_Bhaji" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Pulav</h6><span class="price">₹70</span><input type="number" name="Pulav" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Butter Pav Bhaji</h6><span class="price">₹100</span><input type="number" name="Butter_Pav_Bhaji" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Cheese Pav Bhaji</h6><span class="price">₹120</span><input type="number" name="Cheese_Pav_Bhaji" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Vadapav</h6><span class="price">₹20</span><input type="number" name="Vadapav" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Cheese Vadapav</h6><span class="price">₹35</span><input type="number" name="Cheese_Vadapav" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Dabeli</h6><span class="price">₹20</span><input type="number" name="Dabeli" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Puff</h6><span class="price">₹20</span><input type="number" name="Puff" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Cheese Puff</h6><span class="price">₹35</span><input type="number" name="Cheese_Puff" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Patti Sada Samosa (4 pcs)</h6><span class="price">₹30</span><input type="number" name="Patti_Sada_Samosa" min="0" value="0" class="form-control qty-box"></div>
      <div class="menu-item"><h6>Cheese Patti Samosa (4 pcs)</h6><span class="price">₹40</span><input type="number" name="Cheese_Patti_Samosa" min="0" value="0" class="form-control qty-box"></div>
    </div>

    <!-- Beverages -->
    <div class="category">
      <h4>🥤 Beverages</h4>
      <?php
      $drinks = [
        "Sprite"=>20,"Coca_Cola"=>20,"Fanta"=>20,"Thumbs_Up"=>20,"Charged"=>20,
        "Limca"=>20,"Maza"=>20,"Rim_Zim"=>20,"Water_Bottle"=>20,"Pepsi"=>20,"Fruti"=>10
      ];
      foreach ($drinks as $d => $p) {
        echo "<div class='menu-item'>
                <h6>".str_replace('_',' ',$d)."</h6>
                <span class='price'>₹$p</span>
                <input type='number' name='$d' min='0' value='0' class='form-control qty-box'>
              </div>";
      }
      ?>
    </div>

    <button type="submit" class="btn btn-success btn-order">✅ Place Order</button>
  </form>
</body>
</html>
