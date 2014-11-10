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
