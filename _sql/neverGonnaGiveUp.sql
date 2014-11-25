INSERT INTO tbl_mixtape(`user_id`, `song_id`, `position`)
SELECT tbl_mixtape.user_id , 71, 1
FROM tbl_mixtape
WHERE tbl_mixtape.user_id NOT IN
	(
	SELECT mx.user_id
	FROM tbl_mixtape mx
	WHERE mx.song_id = 71
	)
GROUP BY user_id