/**
 * changeBox
 * Changes the information in the infobox and displays/plays its youtube video
 * 
 * @param String title the title of the song
 * @param String artist the artist(s) of the song
 * @param String genre the genre(s) of the song
 * @param String songLink the youtube key for the song ex: "hX3O5v-ylC4"
 */

function changeBox(title, artist, genre, songLink) {
    //alert("Playing " + songLink);
    changeInfo(title, artist, genre);
    changeVideo(songLink);
}

/**
 * changeVideo
 * displays and autoplays a youtube video in the HTML element with id="vidWindow"
 * @param {type} songLink
 */

function changeVideo(songLink) {
    var element = document.getElementById("vidWindow");
    var link = 'No Youtube video for this song! :(';

    if (songLink.length > 0) {
        link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/'
                + songLink + '?autoplay=1" frameborder = "0" allowfullscreen> </iframe>';

    }
    element.innerHTML = link;
}

/**
 * changeInfo
 * changes the song info in the HTML element with id="songInfo"
 * @param {type} title
 * @param {type} artist
 * @param {type} genre
 */

function changeInfo(title, artist, genre) {
    var element = document.getElementById("songInfo");
    var info = 'Title: ' + title
            + '<br>Artist: ' + artist
            + '<br>Genre: ' + genre;
    element.innerHTML = info;
}

/**
 * Changes the information in the infobox and displays/plays its youtube video
 * 
 * @param String title the title of the song
 * @param String artist the artist(s) of the song
 * @param String genre the genre(s) of the song
 * @param String songLink the youtube key for the song ex: "hX3O5v-ylC4"
 */

function changeBox_admin(id, title, artist, genre, songLink, approved, flagged) {
    //alert("Playing " + songLink);
    changeInfo_admin(id, title, artist, genre, approved, flagged);
    changeVideo_admin(songLink);
}

/**
 * displays and autoplays a youtube video in the HTML element with id="vidWindow_admin"
 * @param {type} songLink
 */

function changeVideo_admin(songLink) {
    var element = document.getElementById("vidWindow_admin");
    var link = 'No Youtube video for this song! :(';

    if (songLink.length > 0) {
        link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/'
                + songLink + '?autoplay=0" frameborder = "0" allowfullscreen> </iframe>';

    }
    element.innerHTML = link;
}

/**
 * changes the song info in the HTML element with id="songInfo_admin"
 * @param {type} title
 * @param {type} artist
 * @param {type} genre
 */

function changeInfo_admin(id, title, artist, genre, approved, flagged) {
    var element = document.getElementById("songInfo_admin");
    var info = '<br>Song ID: ' + id
            + '<br>Title: ' + title
            + '<br>Artist: ' + artist
            + '<br>Genre: ' + genre
            + '<br>Approved: ' + approved
            + '<br>Flagged: ' + flagged;
    if (approved != 1) {
        info += '<br>Waiting on approval';
        info += '';
    }
    if (flagged == 1) {
        info += '<br>Flagged';
    }
    element.innerHTML = info;
}