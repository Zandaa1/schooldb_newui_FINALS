ALTER TABLE student_answers
ADD COLUMN isCorrect TINYINT(1) NOT NULL DEFAULT 0;

ALTER TABLE answered_tests
ADD COLUMN totalCorrectAnswers INT NOT NULL DEFAULT 0;
