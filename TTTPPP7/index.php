<?php
// =============================================
// index.php — Sistem Manajemen Kursus (Versi PDO)
// =============================================

// Import semua file konfigurasi dan class
require_once 'config/db.php';
require_once 'class/Course.php';
require_once 'class/Student.php';
require_once 'class/Enrollment.php';

// Buat objek
$courseObj = new Course($pdo);
$studentObj = new Student($pdo);
$enrollmentObj = new Enrollment($pdo);

// Pesan & logika form
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_GET['page'] ?? 'courses';

    // CRUD Kursus
    if ($page === 'courses') {
        $action = $_POST['action'] ?? '';
        if ($action === 'create') {
            $name = trim($_POST['name']);
            $desc = trim($_POST['description'] ?? '');
            $message = $courseObj->create($name, $desc) ? 'Kursus ditambahkan.' : 'Gagal menambahkan kursus.';
        } elseif ($action === 'update') {
            $id = (int)$_POST['id'];
            $name = trim($_POST['name']);
            $desc = trim($_POST['description'] ?? '');
            $message = $courseObj->update($id, $name, $desc) ? 'Kursus diperbarui.' : 'Gagal memperbarui kursus.';
        }
        header('Location: index.php?page=courses&msg='.urlencode($message));
        exit;
    }

    // CRUD Peserta
    if ($page === 'students') {
        $action = $_POST['action'] ?? '';
        if ($action === 'create') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = $studentObj->create($name, $email) ? 'Peserta ditambahkan.' : 'Gagal menambahkan peserta (cek email unik).';
        } elseif ($action === 'update') {
            $id = (int)$_POST['id'];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = $studentObj->update($id, $name, $email) ? 'Peserta diperbarui.' : 'Gagal memperbarui peserta.';
        }
        header('Location: index.php?page=students&msg='.urlencode($message));
        exit;
    }

    // CRUD Enrollment
    if ($page === 'enrollments') {
        $action = $_POST['action'] ?? '';
        if ($action === 'create') {
            $student_id = (int)$_POST['student_id'];
            $course_id = (int)$_POST['course_id'];
            $message = $enrollmentObj->create($student_id, $course_id) ? 'Enrollment dibuat.' : 'Gagal membuat enrollment.';
        } elseif ($action === 'update') {
            $id = (int)$_POST['id'];
            $student_id = (int)$_POST['student_id'];
            $course_id = (int)$_POST['course_id'];
            $message = $enrollmentObj->update($id, $student_id, $course_id) ? 'Enrollment diperbarui.' : 'Gagal memperbarui enrollment.';
        }
        header('Location: index.php?page=enrollments&msg='.urlencode($message));
        exit;
    }
}

// handle delete
if (isset($_GET['delete'])) {
    $page = $_GET['page'] ?? 'courses';
    $id = (int)$_GET['delete'];
    $message = '';
    if ($page === 'courses') {
        $message = $courseObj->delete($id) ? 'Kursus dihapus.' : 'Gagal menghapus kursus.';
    } elseif ($page === 'students') {
        $message = $studentObj->delete($id) ? 'Peserta dihapus.' : 'Gagal menghapus peserta.';
    } elseif ($page === 'enrollments') {
        $message = $enrollmentObj->delete($id) ? 'Enrollment dihapus.' : 'Gagal menghapus enrollment.';
    }
    header('Location: index.php?page='.$page.'&msg='.urlencode($message));
    exit;
}

// Tentukan halaman
$page = $_GET['page'] ?? 'home';
$msg = $_GET['msg'] ?? '';

// ====== MULAI RENDER HTML ======
include 'view/header.php';

if ($page === 'home'): ?>
    <section class="intro">
        <h2>Selamat Datang di Sistem Manajemen Kursus</h2>
        <div class="cards">
            <div class="card">
                <h3>Kursus</h3>
                <p>Kelola daftar kursus dan deskripsinya.</p>
                <a href="index.php?page=courses" class="btn">Kelola Kursus</a>
            </div>
            <div class="card">
                <h3>Peserta</h3>
                <p>Atur daftar peserta dan email mereka.</p>
                <a href="index.php?page=students" class="btn">Kelola Peserta</a>
            </div>
            <div class="card">
                <h3>Enrollment</h3>
                <p>Hubungkan peserta dengan kursus.</p>
                <a href="index.php?page=enrollments" class="btn">Kelola Enrollment</a>
            </div>
        </div>
    </section>
<?php
elseif ($page === 'courses'):
    include 'view/courses.php';
elseif ($page === 'students'):
    include 'view/students.php';
elseif ($page === 'enrollments'):
    include 'view/enrollments.php';
else:
    echo '<p>Halaman tidak ditemukan.</p>';
endif;

include 'view/footer.php';
