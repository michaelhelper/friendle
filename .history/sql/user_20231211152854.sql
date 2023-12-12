CREATE TABLE IF NOT EXISTS `friendle_words` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `wordle_number` INT,
    `score` INT,
    `wordle` VARCHAR(255)
);


//Create a table in mysql that has an auto increment key, an int named "wordle number", an int named "score", and a varchar 255 named "wordle"

CREATE TABLE IF NOT EXISTS `test_user`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `wordle_number` INT,
    `score` INT,
    `wordle` VARCHAR(255)
    );