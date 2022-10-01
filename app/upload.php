<?php 
    require_once("DBconection.php");

    function uploadFile() {
        if (($_GET)) {
            
            session_start();
            $userID = $_SESSION["userName"];
            $trackName = $_GET["uploadFileName"];
            $trackGenre = $_GET["uploadFileGenre"];
            $trackDate = $_GET["uploadFileDate"];

            try {
                $tracksDB = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
                $tracksDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $tracksDB->prepare("INSERT INTO `useruploadedtracks`(`trackName`, `trackGenre`, `trackDate`, `userID`) VALUES (?, ?, ?, ?)"); 
                $query->execute(array($trackName, $trackGenre, $trackDate, $userID));
                
                header("location:".BASE_URL."upload/");
            } catch(PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }

            
        }
    };
    
    function editFile($trackID, $trackName, $trackGenre, $trackDate) {
        
        if ($_GET) {
        session_start();       
        $userID = $_SESSION['userName']; 
            try {
                $tracksDB = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');           
                $tracksDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query= $tracksDB->prepare("UPDATE `useruploadedtracks` SET `trackName` = ?, `trackGenre` = ?, `trackDate` = ? WHERE `useruploadedtracks`.`id` = ?"); 
                $query->execute(array($trackName, $trackGenre, $trackDate ,$trackID));

            } catch(PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }
        }
    };

    function deleteFile($trackID) {

        if($_GET) {
        session_start();                    
            try {
                $tracksDB = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');           
                $tracksDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                $query= $tracksDB->prepare("DELETE FROM useruploadedtracks WHERE `useruploadedtracks`.`id` = ?"); 
                $query->execute(array($trackID));

            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
            
    };

    function showUploadSection() {
        require ("../templates/header.php");           
        
        ?>

        <div id="content">                
    
            <div id="uploadDIV">
    
                <h1>Upload</h1>
                <form id="uploadFileForm" action="uploadFile" method="get" enctype="multipart/form-data">
                    <fieldset id="uploadFileFormDIV">
                        <legend>File Data</legend>
                            <input type="file" name=""></label><br>
    
                        <label>Name of track:</label>
                            <input type="text" id="uploadFileName" name="uploadFileName" required><br>
    
                        <label>Genre:</label>
                            <input type="text" id="uploadFileGenre" name="uploadFileGenre" required><br>
    
                        <label>Date of creation:</label>
                            <input type="date" id="uploadFileDate" name="uploadFileDate" required><br>
    
                        <button class="yellowBox" id="uploadButton">Upload</button>
                    </fieldset>

                </form>

                <div id="userUploadedDiv"> 
                    <h2 class="tableName">Uploaded tracks</h2>
                                    
                    <?php printUploadedTable();?>
                </div>
                
            </div>      
                
        </div>

        <?php require_once("../templates/footer.php");
    };   
    
    function printUploadedTable() {
            
        require_once("DBconection.php");
        $userName = $_SESSION["userName"];
                    
        $tracksDB = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        $query= $tracksDB->prepare("SELECT * FROM useruploadedtracks WHERE userID='$userName'");
        $query->execute(array());
        $TRACKS = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            echo "<p id='infoMSG'>Total tracks uploaded: ".$query->rowCount()."</p>";
            echo "<div id='uploadedTracksFilters'><input type='search' placeholder='Filter by name' id='tracksFilterName'>
                    <input type='search' placeholder='Filter by genre' id='tracksFilterGenre'></div>";
            echo "<table id='userUploadedTracks'><tr><th>Edit</th><th>Name</th><th>Genre</th><th>Date</th><th>Delete</th></tr>";
            foreach ($TRACKS as $track) {
                echo "<tr class='track'>
                        <td><button class='yellowBox editFile' name='".$track['id']."'>edit</button></td>
                        <td class='tdTrackCellName'>".$track['trackName']."</td>
                        <td class='tdTrackCellGenre'>".$track["trackGenre"]."</td>
                        <td>".$track["trackDate"]."</td>
                        <td><button value='Delete' class='yellowBox deleteFile' name='".$track["id"]."'>del</button></td>
                    </tr>";
                
            };
            
            echo "</table>";
        };
        
    };

    


    




