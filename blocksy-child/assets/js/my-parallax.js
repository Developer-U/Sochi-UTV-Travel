window.addEventListener('DOMContentLoaded', function(){
    var scenes = document.querySelectorAll('.scene');
    scenes.forEach(function(scene){
        var parallaxInstance = new Parallax(scene);
    })
    
});