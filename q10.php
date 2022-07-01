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
      <h4>Wicket-keepers born after 1990</h4>
      <?php
        // condition
        if(true) {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "cricket_league";
          // making connection to database
          $conn = mysqli_connect($servername, $username, $password, $database);
          // die on connection failure
          if (!$conn){
              die("Sorry we failed to connect: ". mysqli_connect_error());
          }
          // SQL query
          $sql = "SELECT * FROM player INNER JOIN player_roles ON player.player_id=player_roles.player_id WHERE player_roles.role='wk' AND player.dob > '1990-12-31';";
          $result = mysqli_query($conn, $sql);
          // number of records returned
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
            echo "<th>Role</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>". $row['player_id']. "</td>";
              echo "<td>". $row['first_name']. "</td>";
              echo "<td>". $row['last_name']. "</td>";
              echo "<td>". $row['dob']. "</td>";
              echo "<td>". $row['role']. "</td>";
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