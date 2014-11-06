#use swe3613_db02p2;

set foreign_key_checks=0;
TRUNCATE tbl_user;
TRUNCATE tbl_artist;
TRUNCATE tbl_genre;
TRUNCATE tbl_mixtape;
TRUNCATE tbl_song;
TRUNCATE tbl_song_artist;
TRUNCATE tbl_song_genre;
set foreign_key_checks=1;

INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user1', 'pass', 'fake@fake.com', '', 'Bob', 'Smith');

INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Symphonic Power Metal');
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Rock');
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Pop');
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Jazz');

INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Artist1');
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Artist2');
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Artist3');

INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`) VALUES ('A Rock Song');
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`) VALUES ('A Jazz Song');
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`) VALUES ('A Pop Song');
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`) VALUES ('A Rock, Pop Song');

INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('1', '1');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('2', '2');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('3', '3');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('4', '1');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('4', '3');

INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('1', '2');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('2', '4');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('3', '3');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('4', '1');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('4', '2');

INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '1', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '2', '4');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '3', '3');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '4', '1');