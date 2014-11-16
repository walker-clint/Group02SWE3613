function changeBox(title, artist, genre, songLink) {
    //alert("Playing " + songLink);
    changeInfo(title, artist, genre);
    changeVideo(songLink);
}

function changeVideo(songLink) {
    var element = document.getElementById("vidWindow");
    var link = 'No Youtube video for this song! :(';

    if (songLink.length > 0) {
        link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/'
                + songLink + '?autoplay=1" frameborder = "0" allowfullscreen> </iframe>';

    }
    element.innerHTML = link;
}

function changeInfo(title, artist, genre) {
    var element = document.getElementById("songInfo");
    var info = 'Title: ' + title
            + '<br>Artist: ' + artist
            + '<br>Genre: ' + genre;
    element.innerHTML = info;
}