-- database/db_course.sql
CREATE DATABASE IF NOT EXISTS db_course_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_course_management;

-- Table courses
CREATE TABLE IF NOT EXISTS courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table students
CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  email VARCHAR(200) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table enrollments (relasi)
CREATE TABLE IF NOT EXISTS enrollments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  course_id INT NOT NULL,
  enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- sample data
INSERT INTO courses (name, description) VALUES
('Pemrograman Web', 'Dasar-dasar HTML, CSS, PHP dan MySQL'),
('Basis Data', 'Konsep ERD, Normalisasi, SQL');

INSERT INTO students (name, email) VALUES
('Budi Santoso', 'budi@example.com'),
('Sari Nur', 'sari@example.com');

INSERT INTO enrollments (student_id, course_id) VALUES
(1, 1),
(2, 1);
