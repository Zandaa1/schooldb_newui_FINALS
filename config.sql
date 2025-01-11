-- Create the 'tests' table
CREATE TABLE tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    testName VARCHAR(255) NOT NULL,
    dueDate DATE NOT NULL,
    description TEXT NOT NULL,
    classCode VARCHAR(50) NOT NULL
);

-- Create the 'test_questions' table
CREATE TABLE test_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    testId INT NOT NULL,
    question TEXT NOT NULL,
    answer1 VARCHAR(255),
    answer2 VARCHAR(255),
    answer3 VARCHAR(255),
    answer4 VARCHAR(255),
    answer5 VARCHAR(255),
    FOREIGN KEY (testId) REFERENCES tests(id)
);

-- Insert sample data into 'tests' table
INSERT INTO tests (testName, dueDate, description, classCode) VALUES
('Activity 1 - Test', '2023-12-09', 'This activity covers chapters 1-3 of the textbook and includes multiple-choice and short-answer questions.', 'BSIT 244');

-- Insert sample data into 'test_questions' table
INSERT INTO test_questions (testId, question, answer1, answer2, answer3, answer4, answer5) VALUES
(1, 'What is a database?', 'A collection of data', 'A type of software', 'A programming language', 'A hardware device', 'None of the above'),
(1, 'What is SQL?', 'Structured Query Language', 'Simple Query Language', 'Sequential Query Language', 'Standard Query Language', 'None of the above');
