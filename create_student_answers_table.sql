CREATE TABLE student_answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentId INT NOT NULL,
    questionId INT NOT NULL,
    answer TEXT NOT NULL,
    answeredAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (studentId) REFERENCES users(id),
    FOREIGN KEY (questionId) REFERENCES test_questions(id)
);
