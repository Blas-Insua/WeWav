"use strict";

window.onload = () => {
    
    if (window["menuBtn"]) {
        window["menuBtn"].addEventListener('click', () => {                        
            document.getElementById("menuBar").classList.toggle("active");
        });
    };

    if (window.location.pathname == "/WeWav/home/" || window.location.pathname == "/WeWav/") {
        document.title = "WeWav/home";   
        window["home"].classList.add("active");
    };

    if (window.location.pathname == "/WeWav/artists/") {
        document.title = "WeWav/artists";   
        window["artists"].classList.add("active");
    };

    if (window.location.pathname == "/WeWav/tracks/") {
        document.title = "WeWav/tracks";   
        window["tracks"].classList.add("active");
    };

    if (window.location.pathname == "/WeWav/genres/") {
        document.title = "WeWav/genres";   
        window["genres"].classList.add("active");
    };

    if (window.location.pathname == "/WeWav/upload/") {
        document.title = "WeWav/upload";   
        window["upload"].classList.add("active");
    };   

    document.querySelectorAll(".fileTitle").forEach(file => {
        file.addEventListener("click", (e) => {
            e.path[2].children[1].classList.toggle("hidden");
            e.path[2].children[2].classList.toggle("hidden");
            e.path[2].children[0].children[1].classList.toggle("hidden");
        })
    });
    

};
