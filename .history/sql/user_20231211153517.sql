CREATE TABLE IF NOT EXISTS `test_user`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `wordle_number` INT,
    `score` INT,
    `wordle` VARCHAR(255)
    );
/* Insert a wordle */
INSERT INTO `test_user` (`id`, `wordle_number`, `score`, `wordle`) VALUES (NULL, '904', '3', '🟨⬛⬛🟩⬛\r\n⬛⬛🟩🟩🟩\r\n🟩🟩🟩🟩🟩');