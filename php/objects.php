<?php

/**
 * represents a Song in the DB
 */
class Song {

    public $id;
    public $title;
    public $approved;
    public $flagged;
    public $youtubeLink;
    public $youtubeApproved;
    public $genresArray;
    public $artistArray;

    /**
     * 
     * @param int $id the primary key of the song
     * @param String $title the title of the song
     * @param boolean $approved whether the song has been approved or not
     * @param boolean $flagged whether the song has been flagged by users
     * @param boolean $youtubeLink the song's youtube link
     * @param boolean $youtubeApproved whether the song's youtube link has been approved
     * @param String[] $genres the genre(s) of the song
     * @param String[] $artists the artist(s) of the song
     */
    public function __construct($id, $title, $approved, $flagged, $youtubeLink, $youtubeApproved, $genres, $artists) {
        $this->id = $id;
        $this->title = $title;
        $this->approved = $approved;
        $this->flagged = $flagged;
        $this->youtubeLink = $youtubeLink;
        $this->youtubeApproved = $youtubeApproved;
        $this->genresArray = $genres;
        $this->artistArray = $artists;
    }

    /**
     * returns HTML to generate changeBox() javascript with the song's info
     * @return String formatted HTML
     */
    public function js_changeBox($focus) {
        return 'changeBox(\'' . $this->id . '\''
                . ',\'' . $this->title . '\''
                . ',\'' . $this->getArtists() . '\''
                . ',\'' . $this->getGenres() . '\''
                . ',\'' . $this->getLink() . '\''
                . ',\'' . $this->flagged . '\''
                . ',\'' . $focus . '\')';
    }

    /**
     * returns HTML to generate changeBox() javascript with the song's info
     * @return String formatted HTML
     */
    public function js_changeBox_admin($focus) {
        return 'changeBox_admin(\'' . $this->id . '\''
                . ',\'' . $this->title . '\''
                . ',\'' . $this->getArtists() . '\''
                . ',\'' . $this->getGenres() . '\''
                . ',\'' . $this->getLink() . '\''
                . ',\'' . $this->approved . '\''
                . ',\'' . $this->flagged . '\''
                . ',\'' . $focus . '\')';
    }

    /**
     * returns HTML to make a clickable title that updates the infobox
     * @return String formatted HTML
     */
    public function js_title_infoBox($focus) {
        return '<span onclick="' . $this->js_changeBox($focus) . '" '
                . 'onmouseover="" style="cursor: pointer;">'
                . $this->title . '</span>';
    }

    /**
     * Returns HTML to make a clickable span that updates the infobox.  Lists the title and artists.
     * @return String formatted HTML
     */
    public function js_infoBox($focus) {
        return '<span onclick="' . $this->js_changeBox($focus) . '" '
                . 'onmouseover="" style="cursor: pointer;">'
                . $this->title . ' by ' . $this->getArtists() . '</span>';
    }

    /**
     * Returns HTML to make a clickable span that updates the admin infobox.  Lists the title and artists.
     * @return String formatted HTML
     */
    public function js_infoBox_admin($focus) {
        return '<span onclick="' . $this->js_changeBox_admin($focus) . '" '
                . 'onmouseover="" style="cursor: pointer;">'
                . $this->title . ' by ' . $this->getArtists() . '</span>';
    }

    /**
     * @return String the youtube key for the song
     */
    public function getLink() {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "$1", $this->youtubeLink);
    }

    /**
     * @param boolean $autoPlay true to autoplay the embedded video
     * @return String HTML for an embedded youtube video
     */
    public function getEmbedLink($autoPlay) {
        if (empty($autoPlay)) {
            $autoPlay = false;
        }

        if (empty($this->youtubeLink) || empty($this->youtubeApproved) || $this->youtubeApproved == 0) {//if no link, or approved not set, or approved is 0
            return 'This song does not have a video';
        }

        if (!empty($autoPlay) && $autoPlay == true) {
            return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"350\" height=\"280\" src=\"//www.youtube.com/embed/$1?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>", $this->youtubeLink);
        } else {
            return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"350\" height=\"280\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $this->youtubeLink);
        }
    }

    /**
     * @return string the genres of the song, formatted with commas
     */
    function getGenres() {
        $genreString = '';

        for ($i = 0; $i < count($this->genresArray); $i++) {
            $genre = $this->genresArray[$i];
            $genreString.=$genre;
            if ($i + 1 < count($this->genresArray)) {
                $genreString.=', ';
            }
        }

        return $genreString;
    }

    /**
     * @return string the artists of the song, formatted with commas
     */
    function getArtists() {
        $artistString = '';

        for ($i = 0; $i < count($this->artistArray); $i++) {
            $artist = $this->artistArray[$i];
            $artistString.=$artist;
            if ($i + 1 < count($this->artistArray)) {
                $artistString.=', ';
            }
        }

        return $artistString;
    }

    public function __toString() {
        return $this->title . '| Genre: ' . $this->getGenres() . '| Artist: ' . $this->getArtists();
    }

    /**
     * @deprecated since version number
     * @return String a string with all the fields of the song
     */
    function printSong() {
        return $this->id . ' | ' . $this->title . ' | ' .
                $this->approved . ' | ' . $this->flagged . ' | ' .
                $this->youtubeLink . ' | ' . $this->youtubeApproved;
    }

}

/**
 * represents a user in the DB
 * @deprecated user info is stored in session data or loaded as needed
 */
class User {

    public $id;
    public $login;
    public $password;
    public $email;
    public $admin;
    public $secret_question;
    public $secret_answer;
    public $first_name;
    public $last_name;

    /**
     * 
     * @param int $id the user's primary key
     * @param String $login the user's login name
     * @param String $email the user's email address
     * @param String $first_name the user's first name
     * @param String $last_name the user's last name
     */
    public function __construct($id, $login, $email, $first_name, $last_name) {
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

}

class MixSong {

    public $song;
    public $position;

    public function __construct($s, $pos) {
        $this->song = $s;
        $this->position = $pos;
    }

    public function compare($a, $b) {
        if ($a instanceof MixSong && $b instanceof MixSong) {
            return $a->song - $b->song;
        }
    }

    public function __toString() {
        return getSongById($this->song)->title;
    }

}
