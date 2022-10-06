<!DOCTYPE html>
<html lang="es-AR">
<head>
    <base href="{BASE_URL}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body class="textwhite">

	<header>
        <nav>   
            <div id='nav1'>
                <a id="PageLogo" class="logo" href="home/">WeWav</a>                  
                <div id='menu'> 
                    {if $rol != 3}<p>{$user_name}</p>{/if}
                    <button class="menuBtn" id="menuBtn">
                        <span class="menuline"></span>
                        <span class="menuline"></span>
                        <span class="menuline"></span>
                    </button>
                    <div id="menuBar">                        
                        {if $rol != 3}                            
                            <a id="profile" href="about/{$user_name}/" class="menuRoute">My Profile</a>
                            {if $rol != 2}
                                <details class="menuRoute">
                                    <summary>System management</summary>
                                    <ul>
                                        <li><a class="managementRoute" href="management/tracks/">Tracks</a></li>
                                        <li><a class="managementRoute" href="management/accounts/">Accounts</a></li>
                                        <li><a class="managementRoute" href="management/genres/">Genres</a></li>
                                    </ul>
                                </details>
                            {/if}
                            <a id="logout" href="logout/" class="menuRoute">LogOut</a>                            
                        {else}
                            <a id="login" href="login/" class="menuRoute">Login</a>
                            <a id="signup" href="signup/" class="menuRoute">Signup</a>                            
                        {/if}    
                    </div>
                </div>
            </div>
            <div id='nav2'>
                <a id="home" href="home/" class="navRoute">Home</a>
                <a id="artists" href="artists/" class="navRoute">Artists</a>
                <a id="tracks" href="tracks/" class="navRoute">Tracks</a>
                <a id="genres" href="genres/" class="navRoute">Genres</a>
                {if $rol != 3}<a id="upload" href="upload/" class="navRoute">Upload</a>{/if}                   
            </div>
        </nav>        
    </header>
    <main>