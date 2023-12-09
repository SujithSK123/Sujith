<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <title>Adminpage</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <header>
        <div class="nav-item">
          <div class="admin">
            <div class="row">
                <div class="col-5"></div>
                <div class="col-2">
                  <h1>Admin User Panel</h1>
                </div>
                <div class="col-5"></div>
            </div>
          </div>
        </div>
    </header>
  </div>

  <nav>
    <ul>
      <li><a href="Adminpage.html">Dashboard</a></li>
      <li><a href="Adminuserpage.html">Users</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>

  <div class="content">
    <div class="container mt-4">
        <h2>User Information</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sk mobiles";
  
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
  
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
  
            $sql = "SELECT id, username, phone_number, email, password FROM users";
            $result = $conn->query($sql);
  
            if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["phone_number"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["password"] . "</td>  
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
            ?>
            <!-- You can add more rows with user information here -->
          </tbody>
        </table>
      </div>
  </div>

</body>
</html>