<?php

class Song {

    public $id;
    public $title;
    public $approved;
    public $flagged;
    public $youtubeLink;
    public $youtubeApproved;
    public $genresArray;
    public $artistArray;

    public function __construct($id, $titl, $app, $flag, $you, $youApp, $gen, $art) {
        $this->id = $id;
        $this->title = $titl;
        $this->approved = $app;
        $this->flagged = $flag;
        $this->youtubeLink = $you;
        $this->youtubeApproved = $youApp;
        $this->genresArray = $gen;
        $this->artistArray = $art;
    }

    public function getInfoBox() {
        return '<span onclick="changeBox(\'' . $this->title . '\''
                . ',\'' . $this->getArtists() . '\''
                . ',\'' . $this->getGenres() . '\''
                . ',\'' . $this->getLink() . '\')">' . $this->title . '</span>';
    }

    public function getLink() {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "$1", $this->youtubeLink);
    }

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

    function printSong() {
        return $this->id . ' | ' . $this->title . ' | ' .
                $this->approved . ' | ' . $this->flagged . ' | ' .
                $this->youtubeLink . ' | ' . $this->youtubeApproved;
    }

}

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

    public function __construct($id, $log, $email, $first_name, $last_name) {
        $this->id = $id;
        $this->login = $log;
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
        return getSong($this->song)->title;
    }

}
