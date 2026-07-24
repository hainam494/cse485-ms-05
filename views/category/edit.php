<form method="post">

Tên

<input
type="text"
name="name"
value="<?=htmlspecialchars($category['name'])?>">

<br><br>

Mô tả

<input
type="text"
name="description"
value="<?=htmlspecialchars($category['description'])?>">

<br><br>

<button>Cập nhật</button>

</form>