CREATE DATABASE tuyensinh
CREATE TABLE Students (
  student_id INT PRIMARY KEY,
  student_name VARCHAR(50),
  student_email VARCHAR(100),
  student_date_of_birth DATE,
  student_gender ENUM('Male', 'Female'),
  student_address VARCHAR(100)
);

CREATE TABLE Exams (
  exam_id INT PRIMARY KEY,
  exam_name VARCHAR(50),
  exam_date DATE
);

CREATE TABLE Results (
  result_id INT PRIMARY KEY,
  result_student_id INT,
  result_exam_id INT,
  result_score FLOAT,
  FOREIGN KEY (result_student_id) REFERENCES Students(student_id),
  FOREIGN KEY (result_exam_id) REFERENCES Exams(exam_id)
);

CREATE TABLE Appeals (
  appeal_student_id INT,
  appeal_exam_id INT,
  appeal_reason TEXT,
  PRIMARY kEY(appeal_student_id,appeal_exam_id),
  FOREIGN KEY (appeal_student_id) REFERENCES Students(student_id),
  FOREIGN KEY (appeal_exam_id) REFERENCES Exams(exam_id)
); --appeal_status ENUM('Chờ xử lý', 'Đã xử lý'),
CREATE TABLE feedbacks (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    --info_edit VARCHAR(50),
    content TEXT,
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

DROP TABLE Appeals;
DROP TABLE Results;
DROP TABLE Exams;
DROP TABLE feedbacks;
DROP TABLE Students;

INSERT INTO Exams (exam_id,exam_name,exam_date) VALUES
(1,'Math','2021-7-2'),
(2,'Physics','2021-7-3'),
(3,'Chemistry','2021-7-3'),
(4,'English','2021-7-1'),
(5,'Viterature','2021-7-1');

INSERT INTO Students (student_id, student_name, student_email, student_date_of_birth, student_gender, student_address)
VALUES
(1, 'John Doe', 'john.doe@example.com', '2000-01-01', 'Male', '123 Main Street'),
(2, 'Jane Smith', 'jane.smith@example.com', '2000-02-02', 'Female', '456 Elm Street'),
(3, 'David Johnson', 'david.johnson@example.com', '2000-03-03', 'Male', '789 Oak Street'),
(4, 'Emily Brown', 'emily.brown@example.com', '2000-04-04', 'Female', '321 Pine Street'),
(5, 'Michael Wilson', 'michael.wilson@example.com', '2000-05-05', 'Male', '654 Maple Avenue'),
(6, 'Olivia Taylor', 'olivia.taylor@example.com', '2000-06-06', 'Female', '987 Cedar Lane'),
(7, 'Daniel Anderson', 'daniel.anderson@example.com', '2000-07-07', 'Male', '135 Walnut Drive'),
(8, 'Sophia Martinez', 'sophia.martinez@example.com', '2000-08-08', 'Female', '246 Birch Road'),
(9, 'Matthew Thomas', 'matthew.thomas@example.com', '2000-09-09', 'Male', '357 Willow Lane'),
(10, 'Ava Hernandez', 'ava.hernandez@example.com', '2000-10-10', 'Female', '468 Pinecone Avenue');

INSERT INTO Results (result_id, result_student_id, result_exam_id, result_score)
VALUES
(1, 1, 1, 8.6),
(2, 1, 2, 7.5),
(3, 1, 3, 9),
(4, 1, 4, 8),
(5, 1, 5, 5),
(6, 2, 1, 8.8),
(7, 2, 2, 8),
(8, 2, 3, 6),
(9, 2, 4, 7),
(10, 2, 5, 8.5),
(11, 3, 1, 9.8),
(12, 3, 2, 9),
(13, 3, 3, 9.25),
(14, 3, 4, 6.6),
(15, 3, 5, 5.5),
(16, 4, 1, 7.8),
(17, 4, 2, 8),
(18, 4, 3, 7.75),
(19, 4, 4, 7.8),
(20, 4, 5, 6),
(21, 5, 1, 4.8),
(22, 5, 2, 5.23),
(23, 5, 3, 4.25),
(24, 5, 4, 9),
(25, 5, 5, 2),
(26, 6, 1, 6.6),
(27, 6, 2, 8.25),
(28, 6, 3, 9.5),
(29, 6, 4, 7),
(30, 6, 5, 6.5),
(31, 7, 1, 8.2),
(32, 7, 2, 8.75),
(33, 7, 3, 9.25),
(34, 7, 4, 1.8),
(35, 7, 5, 6.5),
(36, 8, 1, 7.8),
(37, 8, 2, 8.5),
(38, 8, 3, 7),
(39, 8, 4, 8.2),
(40, 8, 5, 4.5),
(41, 9, 1, 1.4),
(42, 9, 2, 8.5),
(43, 9, 3, 7.75),
(44, 9, 4, 9.0),
(45, 9, 5, 3.5),
(46, 10, 1, 8.8),
(47, 10, 2, 8.5),
(48, 10, 3, 8.0),
(49, 10, 4, 6.2),
(50, 10, 5, 8.25);






