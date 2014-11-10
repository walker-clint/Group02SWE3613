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

    public function getLink() {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "$1", $this->youtubeLink);//$post_details['description']);
    }
    
    public function getEmbedLink() {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>", $this->youtubeLink);//$post_details['description']);
    }

    private function getGenres() {
        $genreString = '';

        foreach ($this->genres as $genre) {
            $genreString.=$genre . ' ';
        }

        return $genreString;
    }

    private function getArtists() {
        $artistString = '';

        foreach ($this->artist as $art) {
            $artistString.=$art . ' ';
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
