"use strict";

window.onload = () => {
    
    if (window["menuBtn"]) {
        window["menuBtn"].addEventListener('click', () => {                        
            document.getElementById("menuBar").classList.toggle("active");
        });
    }


    console.log(window.location.pathname);

    if (window.location.pathname == "/WeWav/artists/") {
        document.title = "WeWav/artists";   
        window["artists"].classList.add("active");
    };

    if (window.location.pathname == "/WeWav/tracks/") {
        document.title = "WeWav/tracks";   
        window["tracks"].classList.add("active");
    };

};
