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
        <h4>Age of all players in team</h4>
        <form action="/dbmsproj/dir/q14.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">Team Name</span>
            <input type="text" name="team_name" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <?php
        // condition
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // setting variables
          $team_name = $_POST['team_name'];

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
          $sql = "SELECT player_id, first_name, last_name, dob, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM player WHERE player_id IN (SELECT plays_for.player_id FROM plays_for WHERE plays_for.team_name='$team_name');";
          $result = mysqli_query($conn, $sql);
          // number of rows
          $num = mysqli_num_rows($result);

          // Display the rows returned by the sql query
          if($num> 0){
            echo "Showing $num records <br><br>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Player ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>DOB</th>";
            echo "<th>Age (current)</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>". $row['player_id']. "</td>";
              echo "<td>". $row['first_name']. "</td>";
              echo "<td>". $row['last_name']. "</td>";
              echo "<td>". $row['dob']. "</td>";
              echo "<td>". $row['age']. "</td>";
              echo "</tr>";
            }
            echo "</table><br>";
          } else {
            echo "<br>No records found in database<br>";
          }
          $conn->close();
        }
      ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>