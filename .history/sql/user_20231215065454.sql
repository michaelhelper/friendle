-- /* Create a new user wordle table */
-- CREATE TABLE IF NOT EXISTS `1_wordles`(
--     `id` INT AUTO_INCREMENT PRIMARY KEY,
--     `wordle_number` INT,
--     `score` INT,
--     `wordle` VARCHAR(255)
--     );
-- /* Insert a wordle */
-- INSERT INTO `1_wordles` (`id`, `wordle_number`, `score`, `wordle`) VALUES (NULL, '904', '3', '🟨⬛⬛🟩⬛\r\n⬛⬛🟩🟩🟩\r\n🟩🟩🟩🟩🟩');


-- /* Insert a user */
-- INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, 'test', 'password', 'test@gmail.com');

-- /* Create a user table for all friends */
-- CREATE TABLE IF NOT EXISTS `1_friends`(
--     `id` INT AUTO_INCREMENT PRIMARY KEY,
--     `friend_id` INT,
--     accepted BOOLEAN
--     );
-- /* Insert a friend */
-- INSERT INTO `1_friends` (`id`, `friend_id`, `accepted`) VALUES (NULL, '1', '1');


/* Create a user table */
CREATE TABLE IF NOT EXISTS `users`(
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255),
    `password` VARCHAR(255),
    `email` VARCHAR(255)
    );

CREATE TABLE wordles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    wordle_number INT NOT NULL,
    wordle_score CHAR NOT NULL,
    wordle VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
)


CREATE TABLE friends (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    friend_id INT UNSIGNED,
    is_friend BOOLEAN NOT NULL DEFAULT FALSE,
    email_
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (friend_id) REFERENCES users(id)
)
