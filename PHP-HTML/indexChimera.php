<!DOCTYPE html>
<html>

<head>
    <title>
        Chimera Creator
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
</head>

<body style = "text-align: center; background-color: #5C5D5C;">

    <!-- All Bootstrap content must be enclosed in a container div -->
    <div class="container" style = "color: #DEDEDE;">
        
        <!-- The container must contain one or more row divs -->
        <!-- Title Row -->
        <div class="row">
        
            <div class="col-12">

                <h1 style = "color: #AEE577;">
                    Chimera Creator
                </h1>

                <br>

                <img src="https://clipart-library.com/images_k/lion-head-transparent/lion-head-transparent-2.png" style="display: block; margin-left: auto; margin-right: auto; width: 25%;">

                <br>

            </div>   <!-- /col-12 -->  
            
        </div> <!-- /row -->

        <!-- PHP Row -->
        <div class="row" >
        
            <div class="col-12" style="box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; background: #d9dbda; color: #1D1D1D; border: 5px solid #000000;">

                <br>

                <?php

                if (array_key_exists('buttonConnect', $_POST)) {
                    buttonConnect();
                }

                if (array_key_exists('randomAnimal', $_POST)) {
                    buttonRandomAnimal();
                }

                if (array_key_exists('search', $_GET)) {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());
                    
                    $searchTerm = $_GET['search'];
                    $sql = "SELECT * from animal where species_name='$searchTerm'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<h4 style = \"color: green;\">Your Searched Animal is:</h4>Species Name: <b>" . $row["species_name"]. "</b> - Color: <b>" . $row["color"]. "</b> - Texture: <b>" . $row["texture"]. "</b> - Head Shape: <b>" . $row["head_shape"]. "</b> - Body Shape: <b>" . $row["body_shape"]. "</b> - Limb Shape: <b>" . $row["limb_shape"]. "</b> - Tail Shape: <b>" . $row["tail_shape"]. "</b><br>";
                        }
                    } else {
                        echo "0 results";
                    }

                    $connection->close();

                }

                if (array_key_exists('update', $_GET)) {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());
                    
                    // Create an array of the string entry
                    $searchTerm = $_GET['update'];
                    $updateArray = explode(' ', $searchTerm);

                    try {
                        $sql = "update animal set color = '$updateArray[1]', texture = '$updateArray[2]', head_shape = '$updateArray[3]', body_shape = '$updateArray[4]', limb_shape = '$updateArray[5]', tail_shape = '$updateArray[6]' where species_name='$updateArray[0]'";
                        $result = $connection->query($sql);
                    }
                    catch (Exception $e) {
                        echo 'Message: ' .$e->getMessage();
                    }

                    $connection->close();

                }

                if (array_key_exists('insert', $_GET)) {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());
                    
                    $searchTerm = $_GET['insert'];
                    $updateArray = explode(' ', $searchTerm);

                    try {
                        $sql = "insert into animal values ('$updateArray[0]', '$updateArray[1]', '$updateArray[2]', '$updateArray[3]', '$updateArray[4]', '$updateArray[5]', '$updateArray[6]')";
                        $result = $connection->query($sql);
                    }
                    catch (Exception $e) {
                        echo 'Message: ' .$e->getMessage();
                    }

                    $connection->close();

                }

                if (array_key_exists('delete', $_GET)) {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());
                    
                    $searchTerm = $_GET['delete'];

                    try {
                        $sql = "delete from animal where species_name='$searchTerm'";
                        $result = $connection->query($sql);
                    }
                    catch (Exception $e) {
                        echo 'Message: ' .$e->getMessage();
                    }

                    $connection->close();

                }

                function buttonConnect() {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());

                    $sql = "select * from animal";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "Species Name: " . $row["species_name"]. " - Color: " . $row["color"]. " - Texture: " . $row["texture"]. " - Head Shape: " . $row["head_shape"]. " - Body Shape: " . $row["body_shape"]. " - Limb Shape: " . $row["limb_shape"]. " - Tail Shape: " . $row["tail_shape"]. "<br>";
                        }
                    } else {
                        echo "0 results";
                    }

                    $connection->close();

                }

                function buttonRandomAnimal() {

                    $servername = "localhost";
                    $username = "root";
                    $password = "0808";
                    $dbname = "chimera";

                    // create connection

                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$connection)
                        die ("couldn't connect".mysqli_connect_error());

                    $sql = "select * from animal";
                    $result = $connection->query($sql);

                    // Tracking variable for current row number
                    $rowNumber = 1;

                    // Alphabet array
                    $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
                    $alphabetCapital = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
                    $ranStartingLetter = rand(0, 25);
                    $chimeraName = "" . $alphabetCapital[$ranStartingLetter];

                    // Random numbers to decide which attribute to take from which row
                    $randSpeciesNumber = rand(1, $result->num_rows);
                    $randColorNumber = rand(1, $result->num_rows);
                    $randTextureNumber = rand(1, $result->num_rows);
                    $randHeadNumber = rand(1, $result->num_rows);
                    $randBodyNumber = rand(1, $result->num_rows);
                    $randLimbNumber = rand(1, $result->num_rows);
                    $randTailNumber = rand(1, $result->num_rows);

                    // Variables to store the randomly selected attributes
                    $randSpecies = "";
                    $randColor = "";
                    $randTexture = "";
                    $randHead = "";
                    $randBody = "";
                    $randLimb = "";
                    $randTail = "";

                    if ($result->num_rows > 0) {
                        // Assign every random variable
                        while ($row = $result->fetch_assoc()) {
                            $tempLetterNum = rand(0, 25);
                            $chimeraName = $chimeraName . $alphabet[$tempLetterNum];

                            if ($rowNumber == $randSpeciesNumber) {
                                $randSpecies = $row["species_name"];
                            }
                            if ($rowNumber == $randColorNumber) {
                                $randColor = $row["color"];
                            }
                            if ($rowNumber == $randTextureNumber) {
                                $randTexture = $row["texture"];
                            }
                            if ($rowNumber == $randHeadNumber) {
                                $randHead = $row["head_shape"];
                            }
                            if ($rowNumber == $randBodyNumber) {
                                $randBody = $row["body_shape"];
                            }
                            if ($rowNumber == $randLimbNumber) {
                                $randLimb = $row["limb_shape"];
                            }
                            if ($rowNumber == $randTailNumber) {
                                $randTail = $row["tail_shape"];
                            }

                            $rowNumber = $rowNumber + 1;
                        }

                        // Print the result
                        echo "<h4 style = \"color: green;\">Your Chimera is:</h4>Chimera Name: <b>" . $chimeraName. "</b> - Color: <b>" . $randColor. "</b> - Texture: <b>" . $randTexture. "</b> - Head Shape: <b>" . $randHead. "</b> - Body Shape: <b>" . $randBody. "</b> - Limb Shape: <b>" . $randLimb. "</b> - Tail Shape: <b>" . $randTail. "</b><br><br>";
                    } else {
                        echo "0 results";
                    }

                    $connection->close();

                }

                ?>

                <br>
                
            </div>   <!-- /col-12 -->  
            
        </div> <!-- /row -->

        <!-- Input Row 1 -->
        <div class="row">
        
            <div class="col-3">

                <br>

                <h4 style = "color: #AEE577;">Search</h4>

                <form method="GET">
                    <label for="search">Enter species name:</label>
                    <input type="text" id="search" name="search">
                    <br>
                    <button type="submit">Search</button>
                </form>

            </div>   <!-- /col-3 -->

            <div class="col-3">

                <br>

                <h4 style = "color: #AEE577;">Update</h4>

                <form method="GET">
                    <label for="update">Enter updated species:</label>
                    <input type="text" id="update" name="update">
                    <br>
                    <button type="submit">Update</button>
                </form>

            </div>   <!-- /col-3 -->  

            <div class="col-3">

                <br>

                <h4 style = "color: #AEE577;">Insert</h4>

                <form method="GET">
                    <label for="insert">Enter inserted species:</label>
                    <input type="text" id="insert" name="insert">
                    <br>
                    <button type="submit">Insert</button>
                </form>

            </div>   <!-- /col-3 -->  

            <div class="col-3">

                <br>

                <h4 style = "color: #AEE577;">Delete</h4>

                <form method="GET">
                    <label for="delete">Enter species name:</label>
                    <input type="text" id="delete" name="delete">
                    <br>
                    <button type="submit">Delete</button>
                </form>

            </div>   <!-- /col-3 -->  
            
        </div> <!-- /row -->

        <!-- Button Row 1 -->
        <div class="row">
        
            <div class="col-12">

                <br>
                <br>

                <form method="post">
                    <input type = "submit" name = "randomAnimal"
                            class = "button" value = "Create a Chimera" />
                </form>

                <br>

                <form method="post">
                    <input type = "submit" name = "buttonConnect"
                            class = "button" value = "Show All Animals" />
                </form>

                <br>

            </div>   <!-- /col-12 -->  
            
        </div> <!-- /row -->
        
    </div> <!-- /container -->
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

    

</body>

</html>