"use strict";

window.onload = () => {

    const tracksAPI = "https://62ab6db3bd0e5d29af104f6c.mockapi.io/api/uploadedContent";
    const usersAPI = "https://62ab6db3bd0e5d29af104f6c.mockapi.io/api/usersData";

    console.log(window.location);

    if (window.location.pathname == "/WeWav/app/login/" || window.location.pathname == "/PaginaXAMPP/html/signup/") {        

        function constructBody() {
            let constructor = new XMLHttpRequest();
            constructor.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    
                    let loginDIV = document.getElementById("loginDIV");
                    
                    if (document.getElementById("login-form")) {
                        window["haveAcc"].classList.add("hidden");
                        document.title = "WeWav - login";
                        loginDIV.appendChild(document.getElementById("login-form"));
                    };
                    if (document.getElementById("signup-form")) {
                        window["createAcc"].classList.add("hidden");
                        document.title = "WeWav - signup";                     
                        loginDIV.appendChild(document.getElementById("signup-form"));
                    };
                    
                    document.querySelector(".reCaptcha").addEventListener("click", ()=>{  
                                                
                        printCaptcha();
                    });                 
                }
            }
            constructor.open("post", "index.php", true);
            constructor.send(); 
        };
        constructBody();
        
        function printCaptcha() { 
            let reqXMLHttp = new XMLHttpRequest();
            reqXMLHttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {     
                    if (document.getElementsByClassName("captcha").length >= 1) {
                        document.getElementsByClassName("captcha").parentNode.removeChild();
                    }
                    let captcha = document.createElement("p");
                    captcha.classList.add("captcha");
                    document.querySelector(".captchaDIV").appendChild(captcha);                                          
                    captcha.innerText = '';        
                    let characters = ['A','B','C','D','E','F','G','H','I','J','K','L','M',
                    'N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                    'a','b','c','d','e','f','g','h','i','j','k','l','m',
                    'n','o','p','q','r','s','t','u','v','w','x','y','z',
                    '0','1','2','3','4','5','6','7','8','9'];

                    for (let i=0; i<5; i++) {
                        let randomChar = characters[Math.floor(Math.random() * characters.length)];
                        
                        captcha.innerText += randomChar;                            
                    } 
                    
                }
            }
            reqXMLHttp.open("post", "index.php", true);
            reqXMLHttp.send();                       
        };
        printCaptcha();              
        
        /*
        let indexSubmit = new XMLHttpRequest();
        indexSubmit.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) { 
                
                let yellowBlock = window["loginYellowBlock"];
                yellowBlock.classList.remove("hidden");
                
                document.querySelector(".indexSubmit").addEventListener("click", function(event) { 
                    let id = this.name;
                    console.log(id);
                    fetch(id, {
                    method: 'get',
                    }).then( ()=>{

                        if (document.querySelector(".captcha").innerText == document.querySelector(".captchaUser").value) {
                        
                            location = window.location.origin+"/PaginaXAMPP/html/home";
                            
                        } else {                
                            event.preventDefault();
                            alert("Wrong captcha");
                            location = window.location.origin+"/PaginaXAMPP/html/login";
                        }  
                    }
                    )
                    .catch(error => window["infoMSG"].innerHTML = `Delete error (${error})`); 

                             
                    
                });
            }
        }
        indexSubmit.open("get", "index.php", true);
        indexSubmit.send();
        */
        
    } else {
        let menuBtn = new XMLHttpRequest();
        menuBtn.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {   
                    
                    window["menuBtn"].addEventListener('click', () => {
                        
                        document.getElementById("nav").classList.toggle("active");
                        document.getElementById("header").classList.toggle("active");
                    });
                }
            }
        menuBtn.open("post", "header.php", true);
        menuBtn.send();
    };

    if (window.location.pathname == "/WeWav/app/upload/") {

        document.title = "WeWav - upload";   
        //Delete file   //////////////////////////////////////////////////////////////////////////////////////////////////////
        
        let deleteButtons = document.querySelectorAll(".deleteFile");                            
                
        for (const buttonDelete of deleteButtons) {
            buttonDelete.addEventListener("click", function() {
                                                       
                let id = this.name;

                let deleteReq = new XMLHttpRequest();                
                deleteReq.open("get", 'deleteFile/'+id+'/', true);
                deleteReq.send(); 
                location.reload(); 
            }); 
        }

       //Edit file     //////////////////////////////////////////////////////////////////////////////////////////////////////
        
        let editButtons = document.querySelectorAll(".editFile");                            
                
        for (const buttonEdit of editButtons) {
            buttonEdit.addEventListener("click", function(e) {
                let trackName = window["uploadFileName"].value;
                let trackGenre = window["uploadFileGenre"].value;
                let trackDate = window["uploadFileDate"].value;                                        
                let id = e.target.name;
                
                if (!trackName) {
                    trackName = e.target.parentNode.parentNode.childNodes[3].textContent;
                };
                if (!trackGenre) {
                    trackGenre = e.target.parentNode.parentNode.childNodes[5].textContent;
                };
                if (!trackDate) {
                    trackDate = e.target.parentNode.parentNode.childNodes[7].textContent;
                };                                                                          
                
                let editReq = new XMLHttpRequest();                
                editReq.open("get", 'editFile/'+id+'/'+trackName+'/'+trackGenre+'/'+trackDate+'/', true);
                editReq.send();  
                location.reload();
            }); 
        }

    };

    if (window.location.pathname == "/WeWav/app/home/") {
        document.title = "WeWav - home";   
    };

};

    /**
    if (window["sessionForm"]) {

        function printCaptcha() {      
            let reqXMLHttp = new XMLHttpRequest();
            reqXMLHttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {                
                    let captcha = document.querySelector("#Captcha");  
                    function createCaptcha () {
                        
                        captcha.innerHTML = '';        
                        let characters = ['A','B','C','D','E','F','G','H','I','J','K','L','M',
                        'N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                        'a','b','c','d','e','f','g','h','i','j','k','l','m',
                        'n','o','p','q','r','s','t','u','v','w','x','y','z',
                        '0','1','2','3','4','5','6','7','8','9'];

                        for (let i=0; i<5; i++) {
                            let randomChar = characters[Math.floor(Math.random() * characters.length)];
                            
                            captcha = document.getElementById("Captcha").innerHTML += randomChar;                            
                        }
                        console.log(captcha);               
                    };
                    createCaptcha(); 
                }
            }
            reqXMLHttp.open("post", "login.php", true);
            reqXMLHttp.send();                       
        };

        let reCaptcha = new XMLHttpRequest();
        reCaptcha.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {                
                        
                document.querySelector("#reCaptcha").addEventListener("click", ()=>{ 
                                
                    printCaptcha();
                });
                document.querySelector("#reCaptcha").addEventListener("mouseover", () => {
                    this.classList.toggle("rotate");
                });   
            }
        }
        reCaptcha.open("post", "login.php", true);
        reCaptcha.send();

        function printLoginForm() {
            let reqXMLHttp = new XMLHttpRequest();
            reqXMLHttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {                
                    window["sessionForm"].innerHTML = reqXMLHttp.responseText;                            
                }
            }
            reqXMLHttp.open("post", "loginForm.php", true);
            reqXMLHttp.send();
            window["haveAcc"].classList.add("hidden");
            
        }   
        printLoginForm();
        window["createAcc"].addEventListener("click", (event) => {
            event.target.classList.toggle("hidden");
            window["haveAcc"].classList.toggle("hidden");
            passwordRecovery.classList.toggle("hidden");
            printSignupForm();             
        });

        function printSignupForm() {
            let reqXMLHttp = new XMLHttpRequest();
            reqXMLHttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {                
                    window["sessionForm"].innerHTML = reqXMLHttp.responseText;    
                    
                    let isArtist = window["createUserisArtist"];
                    isArtist.parentElement.nextElementSibling.classList.add("hidden");
                    isArtist.onchange = () => {
                        let isArtistValue = isArtist.options[isArtist.selectedIndex].value
                        if (isArtistValue == "artistNO") {
                            isArtist.parentElement.nextElementSibling.classList.add("hidden");
                        } else {
                            isArtist.parentElement.nextElementSibling.classList.remove("hidden");
                        };
                    }
                }
            }
            reqXMLHttp.open("post", "signupForm.php", true);
            reqXMLHttp.send();
            printCaptcha();
            window["createAcc"].classList.add("hidden");
            
        };
        window["haveAcc"].addEventListener("click", (event) => {
             
            event.target.classList.toggle("hidden");
            window["createAcc"].classList.toggle("hidden");
            
            passwordRecovery.classList.toggle("hidden");
            printLoginForm();
        });

        let reqXMLHttp = new XMLHttpRequest();
        reqXMLHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {                
                window['loginSubmit'].addEventListener("click", (e)=>{
                    
                    let captchaInput = document.querySelector("#captchaUser").value;
                    let captchaVal = document.querySelector("#Captcha").textContent;
                                                        
                    if(captchaInput == captchaVal) {                                                 
                        setTimeout(function(){                        
                            window.location.href="index.php"
                        },1000);
                    
                    } else {
                        e.preventDefault();
                        document.querySelector("#captchaUser").value = "";
                        alert("Wrong captcha");
                        window.location.reload();
                    }  
                });
            }
        }
        reqXMLHttp.open("post", "login.php", true);
        reqXMLHttp.send();
    }
};

async function load_content(idWindow) {

    let divContent = document.getElementById("content");
    try {
        
        let res = await fetch(`${window.location.origin}/PaginaXAMPP/html/${idWindow}.html`)
        if (res.ok) {

            let content = await res.text();
////UPLOAD  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if (idWindow == "upload") {
                setTimeout( function() {

                    function printUserTracksTable() {
                        let reqXMLHttp = new XMLHttpRequest();
                        reqXMLHttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {                
                                document.getElementById("UploadedTableContainer").innerHTML = reqXMLHttp.responseText;                            
                            }
                        }
                        reqXMLHttp.open("post", "tracksDBconection.php", true);
                        reqXMLHttp.send();                        
                    }
                    printUserTracksTable();

                    window["infoMSG"].innerHTML = 'Total uploaded tracks: loading...';
                    function totalTracks() {                                              
                        fetch('uploadFile.php', {
                            method: 'post',
                        }).then( function() {
                            setTimeout( () => {
                                let Tracks = document.getElementsByClassName("track").length;

                                window["infoMSG"].innerHTML = 'Total uploaded tracks: '+`${Tracks}`;
                            }, 500)
                        })
                        .catch(error => window["infoMSG"].innerHTML = error);
                    }
                    totalTracks();
    //Table filters //////////////////////////////////////////////////////////////////////////////////////////////////////                                    
                    
                    async function FilterByGenre(){
                        let reqXMLHttp = new XMLHttpRequest();
                        reqXMLHttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {                
                                window["tracksFilterGenre"].addEventListener("input", (e) => {
                                    let search = e.target.value.toLowerCase();

                                    let tdTrackCellGenre = document.getElementsByClassName("tdTrackCellGenre");
                                    for (let index = 0; index < tdTrackCellGenre.length; index++) {
                                        let element = tdTrackCellGenre[index];
                                        if (element.innerText.toLowerCase().includes(search)) {     
                                            element.parentElement.classList.remove("hidden");
                                        } else {
                                            element.parentElement.classList.add("hidden");
                                        }
                                    }   
                                });    
                            }
                        }
                        reqXMLHttp.open("post", "upload.php", true);
                        reqXMLHttp.send();
                    };                    
                    FilterByGenre();

                    async function FilterByName(){
                        let reqXMLHttp = new XMLHttpRequest();
                        reqXMLHttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {                
                                window["tracksFilterName"].addEventListener("input", (e) => {
                                    let search = e.target.value.toLowerCase();
                                    let tdTrackCellName = document.getElementsByClassName("tdTrackCellName");
                                    for (let index = 0; index < tdTrackCellName.length; index++) {
                                        let element = tdTrackCellName[index];
                                                            
                                        
                                        if ((element.innerText.toLowerCase().indexOf(search) != -1)) {
                                            element.parentElement.classList.remove("hidden"); 
                                                                        
                                        } else {
                                            element.parentElement.classList.add("hidden");

                                            let length = search.length;
                                            if (length = 0) {
                                                element.parentElement.classList.remove("hidden");
                                            }
                                        }                                
                                    }   
                                });    
                            }
                        }
                        reqXMLHttp.open("post", "upload.php", true);
                        reqXMLHttp.send();
                    };                    
                    FilterByName();

    //Upload file   //////////////////////////////////////////////////////////////////////////////////////////////////////
                    document.getElementById("uploadButton").addEventListener("click", function() {                        
                        window["infoMSG"].innerHTML = "Uploading file...";                       
                        fetch('uploadFile.php', {
                            method: 'post', 
                        }).then(window["infoMSG"].innerHTML = "File uploaded successfully")
                        .catch(error => window["infoMSG"].innerHTML = `Upload error (${error})`);    
                    });
    //Delete file   //////////////////////////////////////////////////////////////////////////////////////////////////////
                    async function DeleteTrack() {
                        let reqXMLHttp = new XMLHttpRequest();
                        reqXMLHttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {                
                                let deleteButtons = document.querySelectorAll(".deleteFile");
                                
                                for (const buttonDel of deleteButtons) {
                                    buttonDel.addEventListener("click", function() {
                                        let id = this.name;
                                        let dataRow = this.parentElement.parentElement;
                                        dataRow.remove()
                                        window["infoMSG"].innerHTML = "Deleting file...";                       
                                        fetch('deleteFile.php?id='+ id, {
                                        method: 'get',
                                        }).then(window["infoMSG"].innerHTML = "File deleted successfully")
                                        .catch(error => window["infoMSG"].innerHTML = `Delete error (${error})`);                                        
                                    }); 
                                }
                            }
                        }
                        reqXMLHttp.open("post", "upload.php", true);
                        reqXMLHttp.send();
                    }
                    DeleteTrack();
    //Edit file     //////////////////////////////////////////////////////////////////////////////////////////////////////
                    async function EditTrack() {
                        
                        let reqXMLHttp = new XMLHttpRequest();
                        reqXMLHttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {                
                                let editButtons = document.querySelectorAll(".editFile");                            
                                
                                for (const buttonEdit of editButtons) {
                                    buttonEdit.addEventListener("click", function() {
                                        let trackName = window["uploadFileName"].value;
                                        let trackGenre = window["uploadFileGenre"].value;
                                        let trackDate = window["uploadFileDate"].value;                                        
                                        let id = this.name;

                                        if (!trackName) {
                                            trackName = this.parentNode.parentNode.childNodes[3].textContent;
                                        }
                                        if (!trackGenre) {
                                            trackGenre = this.parentNode.parentNode.childNodes[5].textContent;
                                        }
                                        if (!trackDate) {
                                            trackDate = this.parentNode.parentNode.childNodes[7].textContent;
                                        }                                        
                                        
                                        this.parentNode.parentNode.childNodes[3].innerText = trackName;
                                        this.parentNode.parentNode.childNodes[5].innerText = trackGenre;
                                        this.parentNode.parentNode.childNodes[7].innerText = trackDate;                                        
                                                                               
                                        window["infoMSG"].innerHTML = "Updating file...";                       
                                        fetch('upload.php?id='+id+'&trackName='+trackName+'&trackGenre='+trackGenre+'&trackDate='+trackDate, {
                                        method: 'get',
                                        }).then(window["infoMSG"].innerHTML = "File updated successfully")
                                        .catch(error => window["infoMSG"].innerHTML = `Update error (${error})`);   
                                    }); 
                                }
                            }
                        }
                        reqXMLHttp.open("post", "upload.php", true);
                        reqXMLHttp.send();
                    }
                    EditTrack();
                    
                }, 500);
            } else 
////PROFILE //////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if (idWindow == "profile") {
            } else 
////HOME    //////////////////////////////////////////////////////////////////////////////////////////////////////////////            
            {
                setTimeout( function() {
                    let reqXMLHttp = new XMLHttpRequest();
                    reqXMLHttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if(document.getElementById("followingListContainer")) {
                                fetch('usersDBconection.php', {
                                    method: 'post',
                                    data: {functionname: 'printFollowingList'},
                                })
                                .then(response => {console.log(response)})
                                .catch(error => console.log(error));
                                document.getElementById("followingListContainer").innerHTML = reqXMLHttp.responseText;
                            }                
                            
                        }
                    }
                    reqXMLHttp.open("post", "usersDBconection.php", true);
                    reqXMLHttp.send();
                }, 500);
            }
            
            divContent.innerHTML = content;
           
        } else {
            divContent.innerHTML = "Error loading for /" + idWindow + "...";
        }
    } catch (error) {
        divContent.innerHTML = "Error"
    }
    buttonsHover();
}
 
function buttonsHover() {

    let buttons = document.querySelectorAll(".yellowBox");
    for (const elements of buttons) {
        elements.addEventListener("mouseover", (event) => {
            event.target.classList.add("buttonsHover");
        });
        elements.addEventListener("mouseout", (event) => {
            event.target.classList.remove("buttonsHover");
        });
    }

};

buttonsHover();
*/
