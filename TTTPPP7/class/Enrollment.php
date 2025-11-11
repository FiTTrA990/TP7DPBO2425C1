<?php
class Enrollment {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    //menambahkan relasi student ke course
    public function create($student_id, $course_id) {
        $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':student_id' => $student_id,
            ':course_id' => $course_id
        ]);
    }

    //mengambil semua data dari enrollment dengan join
    public function getAll() {
        $sql = "SELECT e.id, 
                       s.id AS student_id, 
                       s.name AS student_name, 
                       c.id AS course_id, 
                       c.name AS course_name, 
                       e.enrolled_at
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                JOIN courses c ON e.course_id = c.id
                ORDER BY e.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //mengambil data enrollment berdasarkan ID
    public function getById($id) {
        $sql = "SELECT id, student_id, course_id FROM enrollments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //mengupdate data enrollment
    public function update($id, $student_id, $course_id) {
        $sql = "UPDATE enrollments 
                SET student_id = :student_id, course_id = :course_id 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':student_id' => $student_id,
            ':course_id' => $course_id,
            ':id' => $id
        ]);
    }

    //menghapus data enrollment
    public function delete($id) {
        $sql = "DELETE FROM enrollments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    //mendapatkan daftar student yang belum terdaftar di course tertentu
    public function getStudentsNotInCourse($course_id) {
        $sql = "SELECT id, name, email 
                FROM students 
                WHERE id NOT IN (
                    SELECT student_id FROM enrollments WHERE course_id = :course_id
                )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':course_id' => $course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
