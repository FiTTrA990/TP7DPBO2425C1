<?php
// view/students.php
$students = $studentObj->getAll();
?>
<h2>Daftar Peserta (Students)</h2>

<?php
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $s = $studentObj->getById($id);
    if ($s) {
        ?>
        <h3>Ubah Peserta</h3>
        <form method="post" action="index.php?page=students">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
            <label>Nama: <input type="text" name="name" required value="<?php echo htmlspecialchars($s['name']); ?>"></label><br>
            <label>Email: <input type="email" name="email" required value="<?php echo htmlspecialchars($s['email']); ?>"></label><br>
            <button type="submit">Simpan</button>
            <a href="index.php?page=students">Batal</a>
        </form>
        <?php
    }
} else {
    ?>
    <h3>Tambah Peserta</h3>
    <form method="post" action="index.php?page=students">
        <input type="hidden" name="action" value="create">
        <label>Nama: <input type="text" name="name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit">Tambah</button>
    </form>
    <?php
}
?>

<hr />

<table>
    <thead>
        <tr><th>ID</th><th>Nama</th><th>Email</th><th>Created</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php foreach ($students as $st): ?>
        <tr>
            <td><?php echo $st['id']; ?></td>
            <td><?php echo htmlspecialchars($st['name']); ?></td>
            <td><?php echo htmlspecialchars($st['email']); ?></td>
            <td><?php echo $st['created_at']; ?></td>
            <td>
                <a href="index.php?page=students&edit=<?php echo $st['id']; ?>">Edit</a> |
                <a href="index.php?page=students&delete=<?php echo $st['id']; ?>" onclick="return confirm('Hapus peserta?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
