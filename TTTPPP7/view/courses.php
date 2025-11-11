<?php
// view/courses.php
// expects $courseObj to be available (instance of Course)
$courses = $courseObj->getAll();
?>
<h2>Daftar Kursus</h2>

<!-- Add / Edit form -->
<?php
if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $course = $courseObj->getById($edit_id);
    if ($course) {
        ?>
        <h3>Ubah Kursus</h3>
        <form method="post" action="index.php?page=courses">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($course['id']); ?>">
            <label>Nama: <input type="text" name="name" required value="<?php echo htmlspecialchars($course['name']); ?>"></label><br>
            <label>Deskripsi:<br>
                <textarea name="description"><?php echo htmlspecialchars($course['description']); ?></textarea>
            </label><br>
            <button type="submit">Simpan Perubahan</button>
            <a href="index.php?page=courses">Batal</a>
        </form>
        <?php
    }
} else {
    ?>
    <h3>Tambah Kursus</h3>
    <form method="post" action="index.php?page=courses">
        <input type="hidden" name="action" value="create">
        <label>Nama: <input type="text" name="name" required></label><br>
        <label>Deskripsi:<br>
            <textarea name="description"></textarea>
        </label><br>
        <button type="submit">Tambah</button>
    </form>
    <?php
}
?>

<hr>

<table>
    <thead>
        <tr>
            <th>ID</th><th>Nama</th><th>Deskripsi</th><th>Created At</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $c): ?>
        <tr>
            <td><?php echo $c['id']; ?></td>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($c['description'])); ?></td>
            <td><?php echo $c['created_at']; ?></td>
            <td>
                <a href="index.php?page=courses&edit=<?php echo $c['id']; ?>">Edit</a> |
                <a href="index.php?page=courses&delete=<?php echo $c['id']; ?>" onclick="return confirm('Hapus kursus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
