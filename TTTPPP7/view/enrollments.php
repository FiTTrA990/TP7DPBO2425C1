<?php
// view/enrollments.php
$enrollments = $enrollmentObj->getAll();
$coursesAll = $courseObj->getAll();
$studentsAll = $studentObj->getAll();
?>
<h2>Daftar Enrollment</h2>

<?php
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $e = $enrollmentObj->getById($id);
    if ($e) {
        ?>
        <h3>Ubah Enrollment</h3>
        <form method="post" action="index.php?page=enrollments">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $e['id']; ?>">
            <label>Peserta:
                <select name="student_id" required>
                    <?php foreach ($studentsAll as $s): ?>
                        <option value="<?php echo $s['id']; ?>" <?php if($s['id']==$e['student_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($s['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br>
            <label>Kursus:
                <select name="course_id" required>
                    <?php foreach ($coursesAll as $c): ?>
                        <option value="<?php echo $c['id']; ?>" <?php if($c['id']==$e['course_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($c['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br>
            <button type="submit">Simpan</button>
            <a href="index.php?page=enrollments">Batal</a>
        </form>
        <?php
    }
} else {
    ?>
    <h3>Tambah Enrollment</h3>
    <form method="post" action="index.php?page=enrollments">
        <input type="hidden" name="action" value="create">
        <label>Peserta:
            <select name="student_id" required>
                <?php foreach ($studentsAll as $s): ?>
                    <option value="<?php echo $s['id']; ?>"><?php echo htmlspecialchars($s['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <label>Kursus:
            <select name="course_id" required>
                <?php foreach ($coursesAll as $c): ?>
                    <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit">Enroll</button>
    </form>
    <?php
}
?>

<hr />

<table>
    <thead>
        <tr><th>ID</th><th>Peserta</th><th>Kursus</th><th>Enrolled At</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php foreach ($enrollments as $en): ?>
        <tr>
            <td><?php echo $en['id']; ?></td>
            <td><?php echo htmlspecialchars($en['student_name']); ?></td>
            <td><?php echo htmlspecialchars($en['course_name']); ?></td>
            <td><?php echo $en['enrolled_at']; ?></td>
            <td>
                <a href="index.php?page=enrollments&edit=<?php echo $en['id']; ?>">Edit</a> |
                <a href="index.php?page=enrollments&delete=<?php echo $en['id']; ?>" onclick="return confirm('Hapus enrollment?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
