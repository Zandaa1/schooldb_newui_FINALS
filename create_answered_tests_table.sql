CREATE TABLE answered_tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentId INT NOT NULL,
    testId INT NOT NULL,
    answeredAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (studentId) REFERENCES users(id),
    FOREIGN KEY (testId) REFERENCES tests(id)
);
