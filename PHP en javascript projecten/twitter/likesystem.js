window.onload = function() {
    var anchors = document.getElementsByTagName('like');
    for(var i = 0; i < anchors.length; i++) {
        var anchor = anchors[i];
        anchor.onclick = function() {
            alert('ho ho ho');
        }
    }
}
