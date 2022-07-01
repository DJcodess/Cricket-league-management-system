<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket League</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <img src="bgpic.PNG">
    <a href="http://localhost/dbmsproj/"><button type="button" class="btn btn-outline-light home-btn btn-lg">Home</button></a>
    <div class="main-container">
      <h1>Cricket League Management System</h1><br>
      <?php
        // condition
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // setting variables
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $matches_played = $_POST['matches_played'];
          $strike_rate = $_POST['strike_rate'];
          $runs_scored = $_POST['runs_scored'];
          $wickets_taken = $_POST['wickets_taken'];
          $economy = $_POST['economy'];
          $contract_amount = $_POST['contract_amount'];
          $dob = $_POST['dob'];
          $nationality = $_POST['nationality'];
          $batting = $_POST['batting'];
          $bowling = $_POST['bowling'];
          $keeping = $_POST['keeping'];

          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "cricket_league";
          // making connection to database
          $conn = mysqli_connect($servername, $username, $password, $database);
          if (!$conn){
              die("Sorry we failed to connect: ". mysqli_connect_error());
          }
          // SQL query
          $sql = "INSERT INTO `player` (`first_name`, `last_name`, `matches_played`, `strike_rate`, `runs_scored`, `wickets_taken`, `economy`, `contract_amount`, `dob`, `nationality`) VALUES ('$first_name', '$last_name', '$matches_played', '$strike_rate', '$runs_scored', '$wickets_taken', '$economy', '$contract_amount', '$dob', '$nationality');";
          $result = mysqli_query($conn, $sql);
          
          if ($result) {
            echo "<br>Successfully added<br>";

            $sql = "select max(player_id) as last from player;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $latest_id = $row['last'];
            echo $latest_id;

            if($batting == 'yes') {
              $sql = "INSERT INTO `player_roles` (`player_id`, `role`) VALUES ('$latest_id', 'bat');";
              $result = mysqli_query($conn, $sql);
            }
            if($bowling == 'yes') {
              $sql = "INSERT INTO `player_roles` (`player_id`, `role`) VALUES ('$latest_id', 'bowl');";
              $result = mysqli_query($conn, $sql);
            }
            if($keeping == 'yes') {
              $sql = "INSERT INTO `player_roles` (`player_id`, `role`) VALUES ('$latest_id', 'wk');";
              $result = mysqli_query($conn, $sql);
            }
          } else {
            echo "<br>Failed<br>";
          }
          $conn->close();
        }
      ?>
      <div class="container mt-3">
        <h4>Enter the player details</h4>
        <form action="/dbmsproj/dir/q3.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">First Name</span>
            <input type="text" name="first_name" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Last Name</span>
            <input type="text" name="last_name" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Matches Played</span>
            <input type="text" name="matches_played" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Strike Rate</span>
            <input type="text" name="strike_rate" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Runs Scored</span>
            <input type="text" name="runs_scored" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Wickets Taken</span>
            <input type="text" name="wickets_taken" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Economy</span>
            <input type="text" name="economy" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Contract Amount</span>
            <input type="text" name="contract_amount" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">DOB</span>
            <input type="text" name="dob" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Nationality</span>
            <input type="text" name="nationality" class="form-control">
          </div>
          <h6>Player roles ('yes' or 'no' only)</h6>
          <div class="input-group mb-3">
            <span class="input-group-text">Batting</span>
            <input type="text" name="batting" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Bowling</span>
            <input type="text" name="bowling" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Wicket-keeping</span>
            <input type="text" name="keeping" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>