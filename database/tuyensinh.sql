CREATE DATABASE tuyensinh
CREATE TABLE Students (
  student_id INT PRIMARY KEY,
  student_name VARCHAR(255),
  student_email VARCHAR(255),
  student_date_of_birth DATE,
  student_gender ENUM('Nam', 'Nữ'),
  student_address VARCHAR(255)
);
--student_gender VARCHAR(5) CHECK( student_gender IN ('Nam', 'Nữ')),
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
    info_edit VARCHAR(50),
    content TEXT,
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

DROP TABLE Appeals;
DROP TABLE Results;
DROP TABLE Exams;
DROP TABLE feedbacks;
DROP TABLE Students;

INSERT INTO Exams (exam_id,exam_name,exam_date) VALUES
(1,'Math','2021-7-1'),
(2,'Physics','2021-7-1'),
(3,'Chemistry','2021-7-1');

INSERT INTO Students (student_id, student_name, student_email, student_date_of_birth, student_gender, student_address)
VALUES
(1, 'John Doe', 'johndoe@example.com', '2003-08-10', 'Nam', '123 Main St, City A'),
(2, 'Jane Smith', 'janesmith@example.com', '2003-03-15', 'Nữ', '456 Elm St, City B'),
(3, 'Michael Lee', 'michaellee@example.com', '2003-11-20', 'Nam', '789 Oak St, City C');
(4, 'Bùi Tá Đức', 'Ducbt@example.com', '2003-11-20', 'Nam', '789 Oak St, lò chum');

INSERT INTO Results (result_id, result_student_id, result_exam_id, result_score)
VALUES
(1, 1, 1,9),
(2, 1, 2,8.5),
(3, 1, 3,7),
(4, 2, 1,4),
(5, 2, 2,6),
(6, 2, 3,3),
(7, 3, 1,7),
(8, 3, 2,1),
(9, 3, 3,6.5);