<?php
class Student {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    //fungsi untuk menambah data mahasiswa
    public function create($name, $email) {
        $sql = "INSERT INTO students (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email
        ]);
    }

    //fungsi untuk mengambil semua data mahasiswa
    public function getAll() {
        $sql = "SELECT id, name, email, created_at FROM students ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Ganti get_result()
    }

    //fungsi untuk mengambil data berdasarkan ID
    public function getById($id) {
        $sql = "SELECT id, name, email FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //fungsi untuk mengupdate data mahasiswa
    public function update($id, $name, $email) {
        $sql = "UPDATE students SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':id' => $id
        ]);
    }

    //fungsi untuk menghapus data mahasiswa
    public function delete($id) {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
