<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Categories</title>
</head>

<body>

<?php

if(isset($_SESSION['flash'])){
    echo "<p style='color:green'>".$_SESSION['flash']."</p>";
    unset($_SESSION['flash']);
}

?>

<a href="index.php?controller=category&action=create">
Thêm mới
</a>

<table border="1">

<tr>

<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Action</th>

</tr>

<?php foreach($categories as $c): ?>

<tr>

<td><?= htmlspecialchars($c['id']) ?></td>

<td><?= htmlspecialchars($c['name']) ?></td>

<td><?= htmlspecialchars($c['description']) ?></td>

<td>

<a href="index.php?controller=category&action=edit&id=<?=$c['id']?>">

Sửa

</a>

<form method="post"
action="index.php?controller=category&action=delete"
style="display:inline">

<input type="hidden"
name="id"
value="<?=$c['id']?>">

<button onclick="return confirm('Delete?')">

Xóa

</button>

</form>

</td>

</tr>

<?php endforeach; ?>

</table>

</body>

</html>