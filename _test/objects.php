<?php

class Song {

    public $id;
    public $title;
    public $approved;
    public $flagged;
    public $youtubeLink;
    public $youtubeApproved;
    public $genres;
    public $artist;

    public function __construct($id, $titl, $app, $flag, $you, $youApp, $gen, $art) {
        $this->id = $id;
        $this->title = $titl;
        $this->approved = $app;
        $this->flagged = $flag;
        $this->youtubeLink = $you;
        $this->youtubeApproved = $youApp;
        $this->genres = $gen;
        $this->artist = $art;
    }

    public function __toString() {
        return $this->title;
    }

    function printSong() {
        return $this->id . ' | ' . $this->title . ' | ' .
                $this->approved . ' | ' . $this->flagged . ' | ' .
                $this->youtubeLink . ' | ' . $this->youtubeApproved;
    }

}
