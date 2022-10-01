<!DOCTYPE html>
<html lang="es-AR">
<head>
    <base href="<?php echo BASE_URL ;?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body class="textwhite">

	<header id="header">
        <nav>   
            <a id="PageLogo" class="logo" href="home">WeWav</a>                  
            <div id='menu'> 
                <button class="menuBtn" id="menuBtn">
                    <span class="menuline"></span>
                    <span class="menuline"></span>
                    <span class="menuline"></span>
                </button>
                <div class="menuBar">                        
                    <a id="profile" href="about/me" class="menuRoute">My Profile</a>
                    <a id="logout" href="logout/" class="menuRoute">LogOut</a>
                </div>
            </div>
            <div id='nav'>
                <a id="home" href="home/" class="navRoute">Home</a>
                <a id="artists" href="artists/" class="navRoute">Artists</a>
                <a id="tracks" href="tracks/" class="navRoute">Tracks</a>
                <a id="upload" href="upload/" class="navRoute">Upload</a>  
            </div>
        </nav>        
    </header>