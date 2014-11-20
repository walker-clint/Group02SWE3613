/**
 * changeBox
 * Changes the information in the infobox and displays/plays its youtube video
 * 
 * @param String title the title of the song
 * @param String artist the artist(s) of the song
 * @param String genre the genre(s) of the song
 * @param String songLink the youtube key for the song ex: "hX3O5v-ylC4"
 */

function changeBox(id, title, artist, genre, songLink, flagged, focus) {
//alert("Playing " + songLink);
    changeInfo(id, title, artist, genre, flagged);
    changeVideo(songLink);
    if (focus) {
        location.href = "#vidWindow";
    }
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
                + songLink + '?autoplay=0" frameborder = "0" allowfullscreen> </iframe>';
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

function changeInfo(id, title, artist, genre, flagged) {
    var element = document.getElementById("songInfo");
    var info = 'Title: ' + title
            + '<br>Artist: ' + artist
            + '<br>Genre: ' + genre;

    info += '<br><a href="/php/toggleMixtape.php?songId=' + id + '">Add/remove this song from your Mixtape</a>';

    if (flagged != 1) {
        var color = 'red';
        var message = 'Flag image (incorrect information or inappropriate)';
        info += '<a1 class="well-2"><form method="POST" action = "./php/menu_functions.php">'
                + '<input type="hidden" name="actionType" value="toggleFlag">'
                + '<input type="hidden" name="songId" value="' + id + '">'
                + '<input type="image" src="./img/' + color + '_flag.png" height="20px" width="20px">'
                + message + '</form>' + '</a1>';
    }

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

function changeBox_admin(id, title, artist, genre, songLink, approved, flagged, focus) {
//alert("Playing " + songLink);
    changeInfo_admin(id, title, artist, genre, approved, flagged);
    changeVideo_admin(songLink);
    if (focus) {
        location.href = "#vidWindow_admin";
    }
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
            + '<br>Genre: ' + genre;
    //+ '<br>Approved: ' + approved
    //+ '<br>Flagged: ' + flagged;
    var thumbDirection = 'down';
    var message = 'Un-approve';
    if (approved == 0) {
        thumbDirection = 'up';
        message = 'Approve';
    }
    info += '<a1 class="well-2"><form method="POST" action = "./php/menu_functions.php">'
            + '<input type="hidden" name="actionType" value="toggleApproval">'
            + '<input type="hidden" name="songId" value="' + id + '">'
            + '<input type="image" src="./img/thumb' + thumbDirection + '.png" height="20px" width="20px">'
            + message + '</form>' + '</a1>';


    var color = 'red';
    var message = 'Flag image (incorrect information or inappropriate)';
    if (flagged == 1) {
        color = 'green';
        message = 'Unflag image';
    }
    info += '<a1 class="well-2"><form method="POST" action = "./php/menu_functions.php">'
            + '<input type="hidden" name="actionType" value="toggleFlag">'
            + '<input type="hidden" name="songId" value="' + id + '">'
            + '<input type="image" src="./img/' + color + '_flag.png" height="20px" width="20px">'
            + message + '</form>' + '</a1>';

    element.innerHTML = info;
}