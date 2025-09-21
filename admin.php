<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h2>📋 All Orders</h2>
  <table class="table table-bordered">
    <tr><th>ID</th><th>Table</th><th>Items</th><th>Total</th><th>Time</th></tr>
    <?php
    $res = $conn->query("SELECT * FROM orders ORDER BY id DESC");
    while($row = $res->fetch_assoc()){
        echo "<tr>
          <td>{$row['id']}</td>
          <td>Table {$row['table_no']}</td>
          <td>{$row['items']}</td>
          <td>₹{$row['total']}</td>
          <td>{$row['created_at']}</td>
        </tr>";
    }
    ?>
  </table>
</body>
</html>