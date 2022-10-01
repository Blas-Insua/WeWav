<?php 
    

    function showHomeSection() {

        require_once("DBconection.php");
        require_once("templates/header.php");

        function printFollowingList() {            
            $ACCOUNTS = getUsers();
            echo "<ul>";
            foreach ($ACCOUNTS as $user) {
                echo "<li>".$user->userName." (".$user->userAKA.")</li>";
            }
            echo "</ul>";
        };

        ?>

        <div id="content">
                        
            <div id="indexDIV">
                <div class="centerContent">
                    
                    
                    <div class="file">
                        <img src="../images/file.png"> 
                        <p> Track 2</p>
                        <audio controls src="" alt="" type="audio/wav"></audio>                         	
                    </div>
                    <div class="file">
                        <img src="../images/file.png"> 
                        <p> Track 3</p>
                        <audio controls src="" alt="" type="audio/wav"></audio>                         	
                    </div>
                </div>

                <div class="leftContent">
                    <h1>Artists you follow</h1>
                        <?php printFollowingList();?> 
                    <section>
                        <button id="followingPrevious" class="yellowBox">Prev</button>
                        <button id="followingNext" class="yellowBox">Next</button>
                    </section>
                </div>

                <div class="rigthContent">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis distinctio vero quam aliquam dolore temporibus nesciunt explicabo expedita, beatae numquam repellat in itaque ab labore velit repudiandae. Repellendus, voluptatibus est?</p>
                </div>
            </div>
                        
        </div>

        <?php require_once("../templates/footer.php");
    }
    