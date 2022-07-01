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
      <div class="container mt-3">
        <h4>Delete a player</h4>
        <form action="/dbmsproj/dir/q15.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">Player ID</span>
            <input type="text" name="player_id" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <?php
        // condition
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // setting variables
          $player_id = $_POST['player_id'];

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

          $sql = "SELECT * FROM `player` WHERE `player`.`player_id` = $player_id";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if($num > 0){
            $sql = "DELETE FROM `player` WHERE `player`.`player_id` = $player_id";
            $result = mysqli_query($conn, $sql);
            echo "<br>Player with Player ID $player_id successfully deleted<br>";
          } else {
            echo "<br>No Player with Player ID $player_id Try Again!<br>";
          }

          $conn->close();
        }
      ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>