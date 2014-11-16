function changeBox(songLink) {
    alert("test");
    var element = document.getElementById("vidWindow")
    var link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/' + songLink + '?autoplay=1" frameborder = "0" allowfullscreen> </iframe>';
    //var link = songLink;
    element.innerHTML = link;
}