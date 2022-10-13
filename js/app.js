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

    if ((window.location.pathname == "/WeWav/login/") || (window.location.pathname == "/WeWav/loginSubmit/")) {
        document.title = "WeWav/login";   
    }; 
    

    document.querySelectorAll(".fileTitle").forEach(file => {
        
        file.addEventListener("click", (e) => {
            console.log(e.path[2].children);
            e.path[2].children[1].classList.toggle("hidden");
            e.path[2].children[2].classList.toggle("hidden");
            e.path[2].children[0].children[1].classList.toggle("hidden");
        })
    });

    console.log(window["userPhoto"]);
    
    if (window["errorDIV"]) {
        console.log(window["errorDIV"]);
        let errorDIV = window["errorDIV"];
        errorDIV.scrollIntoView({behavior:"smooth"});
        errorDIV.classList.add("active"); 
        setInterval(() => {
            errorDIV.classList.toggle("active"); 
            
        }, 1500); 

    };
};
