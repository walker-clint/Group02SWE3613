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

#users
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user01', 'pass', 'fake1@fake.com', '0', 'Bob1', 'Smith1');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user02', 'pass', 'fake2@fake.com', '1', 'Bob2', 'Smith2');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user03', 'pass', 'fake3@fake.com', '0', 'Bob3', 'Smith3');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user04', 'pass', 'fake@4fake.com', '0', 'Bob4', 'Smith4');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user05', 'pass', 'fake5@fake.com', '0', 'Bob5', 'Smith5');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user06', 'pass', 'fake6@fake.com', '0', 'Bob6', 'Smith6');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user07', 'pass', 'fake7@fake.com', '0', 'Bob7', 'Smith7');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user08', 'pass', 'fake8@fake.com', '0', 'Bob8', 'Smith8');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user09', 'pass', 'fake9@fake.com', '0', 'Bob9', 'Smith9');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user10', 'pass', 'fake10@fake.com', '0', 'Bob10', 'Smith10');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user11', 'pass', 'fake11@fake.com', '0', 'Bob11', 'Smith11');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user12', 'pass', 'fake12@fake.com', '0', 'Bob12', 'Smith12');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user13', 'pass', 'fake13@fake.com', '0', 'Bob13', 'Smith13');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user14', 'pass', 'fake14@fake.com', '0', 'Bob14', 'Smith14');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `first_name`, `last_name`) VALUES ('user15', 'pass', 'fake15@fake.com', '0', 'Bob15', 'Smith15');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `secret_question`,`secret_answer`,`first_name`, `last_name`) VALUES ('exampleuser', 'examplepassword', 'example@email.com', '0', 'whatisthis', 'anexample', 'examplefirst', 'examplelast');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `secret_question`,`secret_answer`,`first_name`, `last_name`) VALUES ('clint', 'password', 'cwalker6@spsu.edu', '0', 'nicknae', 'tiger', 'Clinton', 'Walker');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `secret_question`,`secret_answer`,`first_name`, `last_name`) VALUES ('dpark', 'password', 'dpark@spsu.edu', '0', 'fruit', 'apple', 'Daniel', 'Park');
INSERT INTO `swe3613_db02p2`.`tbl_user` (`login`, `password`, `email`, `admin`, `secret_question`,`secret_answer`,`first_name`, `last_name`) VALUES ('bill', 'password', 'bg@ms.com', '0', 'companyname', 'microsoft', 'bill', 'gates');


#genres
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Symphonic Power Metal');#1
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Rock');#2
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Pop');#3
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Jazz');#4
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Kpop');#5
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Classical');#6
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Opera');#7
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Swing');#8
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Dubstep');#9
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Other');#10
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Metal');#11
INSERT INTO `swe3613_db02p2`.`tbl_genre` (`name`) VALUES ('Alternative');#12

#songs, artists and their relations
#1
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Wild Horse',1,0,'https://www.youtube.com/watch?v=hX3O5v-ylC4',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Norazo');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('1', '1');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('1', '5');

#2
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Chick Chick',1,0,'https://www.youtube.com/watch?v=mxzgwJ8tSE0',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Wang Rong Rollin');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('2', '2');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('2', '10');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('2', '3');

#3
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Gargoyles, Angels of Darkness',1,0,'https://www.youtube.com/watch?v=TC5FMDjG6Mg',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Rhapsody of Fire');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('3', '3');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('3', '1');

#4
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Con te Partiro',1,0,'https://www.youtube.com/watch?v=tcrfvP11Hbo',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Andrea Bocelli');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('4', '4');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('4', '7');

#5
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Peroxide Swing',1,0,'https://www.youtube.com/watch?v=vqvMA46XYZI',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Michael Buble');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('5', '5');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('5', '8');

#6
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Rock and Rock (Will Take You to the Mountain)',1,0,'https://www.youtube.com/watch?v=eOofWzI3flA',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Skrillex');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('6', '6');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('6', '9');

#7
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Party Rock Anthem',1,0,'https://www.youtube.com/watch?v=KQ6zr6kCPj8',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('LMFAO');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('7', '7');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('7', '2');

#8
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Grosse Fuge',1,0,'https://www.youtube.com/watch?v=lxzHQrFuDkk',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Beethoven');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('8', '8');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('8', '6');

#9
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('True',1,0,'https://www.youtube.com/watch?v=PTC3zoXMrIg',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('exist trace');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('9', '9');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('9', '11');

#10
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Tengaku',1,0,'https://www.youtube.com/watch?v=Q2meWkWqc-I',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('WagakkiBand');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('10', '10');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('10', '2');

#11
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('Scrash',1,0,'https://www.youtube.com/watch?v=vtWBan30c30',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Aldious');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('11', '11');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('11', '11');

#12
INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('My Drive Thru',1,0,'www.youtube.com/watch?v=GPZ5fnYFI4Q',1);
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Santogold');#12
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('Julian Casablancas');#13
INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('N.E.R.D');#14
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('12', '12');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('12', '13');
INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('12', '14');
INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('12', '12');


#
#INSERT INTO `swe3613_db02p2`.`tbl_song` (`title`,`approved`,`flagged`,`youtube`,`youtube_approved`) VALUES ('',1,0,'',1);
#INSERT INTO `swe3613_db02p2`.`tbl_artist` (`name`) VALUES ('');
#INSERT INTO `swe3613_db02p2`.`tbl_song_artist` (`song_id`, `artist_id`) VALUES ('', '');
#INSERT INTO `swe3613_db02p2`.`tbl_song_genre` (`song_id`, `genre_id`) VALUES ('', '');


#person mixtape
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '1', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '2', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '9', '3');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '10', '4');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '11', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('1', '12', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('2', '3', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('2', '2', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('3', '4', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('3', '2', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('4', '2', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('4', '6', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('5', '8', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('5', '3', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('6', '2', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('6', '1', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('7', '6', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('7', '1', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('8', '3', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('8', '4', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('9', '2', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('9', '1', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('10', '2', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('10', '8', '2');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('11', '6', '1');
INSERT INTO `swe3613_db02p2`.`tbl_mixtape` (`user_id`, `song_id`, `position`) VALUES ('11', '3', '2');