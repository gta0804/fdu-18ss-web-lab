<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="post" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                require_once("login.php");
                $conn= new mysqli($hn,$un,$pw,$db);
                if($conn->connect_error) die($conn->connect_error);
                $query="SELECT * FROM continents";
                $result = $conn->query($query);

                //Fill this place

                //****** Hint ******
                //display the list of continents

                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                $query="SELECT * FROM countries";
                $result = $conn->query($query);

                //Fill this place

                //****** Hint ******
                //display the list of continents

                while($row = $result->fetch_assoc()) {
                    echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }

                //****** Hint ******
                /* display list of countries */ 
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php
            $conn= new mysqli($hn,$un,$pw,$db);
            $query="SELECT * FROM imagedetails";
            $continent=get_post($conn,"continent");
            $country=get_post($conn,"country");
            if($continent=="0"&&$country=="0"){
                $query="SELECT * FROM imagedetails";
            }
            else if($continent=="0"){
                $query ="SELECT * FROM imagedetails WHERE CountryCodeISO='$country'";
            }
            else if($country=="0"){
                $query ="SELECT * FROM imagedetails WHERE ContinentCode='$continent'";
            }
            else{
                $query ="SELECT * FROM imagedetails WHERE ContinentCode='$continent' AND CountryCodeISO='$country'";
            }
            $result = $conn->query($query);
            $rows =$result->num_rows;
            for($j=0;$j<$rows;++$j){
                $result->data_seek($j);
                $row=$result->fetch_array(MYSQLI_ASSOC);
                $imageID=$row["ImageID"];
                $imagePath=$row["Path"];
                $imageDescription=$row["Description"];
                echo '<li>';
                echo "<a href='details.php?id=$imageID' class='img-responsive'>";
                echo "<img src='images/square-medium/$imagePath' alt='$imageDescription'>";
                echo "<div class='caption'>";
                echo "<div class='blur'></div>";
                echo "<div class='caption-text'>";
                echo "<p>$imageDescription</p>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo '</li>';


            }
                //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */

            function findByContinentsAndCountries($query,$conn){

            }

            function get_post($conn,$var){
                return $conn->real_escape_string($_POST[$var]);
            }
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>