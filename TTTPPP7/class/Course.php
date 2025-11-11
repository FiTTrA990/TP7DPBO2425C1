<?php
class Course {
    private $conn;

    
    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    //fungsi untuk menambah data
    public function create($name, $description) {
        $sql = "INSERT INTO courses (name, description) VALUES (:name, :description)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description
        ]);
    }

    //fungsi untuk mengambil semua data
    public function getAll() {
        $sql = "SELECT id, name, description, created_at FROM courses ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengganti get_result()
    }

    //fungsi untuk mengambil data berdasarkan ID
    public function getById($id) {
        $sql = "SELECT id, name, description FROM courses WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengganti get_result()->fetch_assoc()
    }

    //fungsi untuk mengupdate data atau mengubah data
    public function update($id, $name, $description) {
        $sql = "UPDATE courses SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':id' => $id
        ]);
    }

    //fungsi untuk menghapus data, 1 baris data
    public function delete($id) {
        $sql = "DELETE FROM courses WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
