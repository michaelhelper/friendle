/* Create a new user wordle table */
CREATE TABLE IF NOT EXISTS `user_id`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `wordle_number` INT,
    `score` INT,
    `wordle` VARCHAR(255)
    );
/* Insert a wordle */
INSERT INTO `test_user` (`id`, `wordle_number`, `score`, `wordle`) VALUES (NULL, '904', '3', '🟨⬛⬛🟩⬛\r\n⬛⬛🟩🟩🟩\r\n🟩🟩🟩🟩🟩');

/* Create a user table */
CREATE TABLE IF NOT EXISTS `user`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255),
    `password` VARCHAR(255),
    `email` VARCHAR(255),
    );
/* Insert a user */
INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES (NULL, 'test', 'test'