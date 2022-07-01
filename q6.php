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
      <h4>Setting a player's team</h4>
      <?php
        // condition
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // setting variables
          $player_id = $_POST['player_id'];
          $team_name = $_POST['team_name'];
          $jersey_no = $_POST['jersey_no'];
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
          $sql = "INSERT INTO `plays_for` (`player_id`, `team_name`, `jersey_no`) VALUES ('$player_id', '$team_name', '$jersey_no')";
          $result = mysqli_query($conn, $sql);
          
          if ($result) {
            echo "<br>Successfully added<br>";
          } else {
            echo "<br>Failed<br>";
          }
          
          $conn->close();
        }
      ?>
      <div class="container mt-3">
        <form action="/dbmsproj/dir/q6.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">Player ID</span>
            <input type="text" name="player_id" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Team Name</span>
            <input type="text" name="team_name" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Jersey Number</span>
            <input type="text" name="jersey_no" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>