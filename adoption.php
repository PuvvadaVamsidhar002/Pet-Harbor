<?php
// Database connection

// Create connection
$connection = new mysqli('localhost', 'root', '', 'project');;

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch pet information from the database
$query = "SELECT * FROM petsinfo";
$result = mysqli_query($connection, $query);
$pets = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pets[] = $row;
    }
}

// Close database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Adoption</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      height: 100%;
      background-color: #ffdd0093;
      background-repeat: no-repeat;
      color: azure;
      background-size: cover;
      background-position: center center;
      height: 100vh;
      background-blend-mode: hard-light;
      position: relative;
    }
    .container .containerinner {
      width: 100%;
      height: 75px;
      margin: auto;
      z-index: 1000;
      display: flex;
      position: absolute;
      top:0%;
      align-items: center;
      justify-content: space-between;
      padding: 0px 25px;
      position: fixed;
      background-color: #333;
    }
    .container .containerinner ul {
      list-style-type: none;
      display: flex;
      padding: 50px;
    }
    .container .containerinner ul li {
      margin-right: 60px;
      transition: background-color 0.3s ease;
      font-size: 18px;
      padding: 7px 7px;
      border-radius: 5px;
      cursor: pointer;
    }
    .container .containerinner ul li:hover {
      background-color: rgba(236, 183, 24, 0.671);
    }   
    .container .containerinner ul li:last-child {
      margin-right: 0;
    }
    .container .containerinner .signup:hover {
      background-color: #d7c00f;
    }
    .container .containerinner button.signup {
      color: #fff;
      background-color: transparent;
      border: none;
      transition: background-color 0.3s;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 40px; 
      font-size: larger;
    }
    .container .containerinner button.harbor {
      background-color: transparent;
      border: none;
      color: rgba(255, 255, 255, 0.8);
      cursor: pointer;
      font-size: x-large;
    }
    .container .containerinner button ion-icon {
      color: rgba(213, 8, 38, 0.8);
      background-color: transparent;
      border: none;
    }
    .container .containerinner ul li a {
      color: inherit;
      text-decoration: none;
    }
    .containers {
      max-width: 1000px;
      margin: 20px auto;
      padding: 0 20px;
      text-align: center;
      position: absolute;
      top:20%;
      position: relative;
      z-index: 999;
    }
    .search-container {
      text-align: center;
      margin-bottom: 20px;
    }
    .filter-container {
      display: flex;
      justify-content: flex-start; /* Align content to the left */
      align-items: center;
      margin-bottom: 20px;
    }
    .filter-container h1 {
      margin-right: 10px; /* Adjust margin between h1 and select elements */
    }
    .filter-container select, .filter-container button {
      margin: 0 10px;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .filter-btn {
      background-color: #4CAF50;
      color: white;
      transition: background-color 0.3s ease;
    }
    .filter-btn:hover {
      background-color: #45a049;
    }
    .filter-btn:focus {
      outline: none;
    }
    .filter-container select {
      background-color: #f2f2f2;
    }
    .pet-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 5px;
      margin: 10px 5px;
      width: calc(33.33% - 20px);
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
      display: inline-block;
      position: relative;
    }
    .pet-card:hover {
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    }
    .pet-card img {
      width: 100%;
      height: 200px; /* Adjust height as needed */
      object-fit: cover; /* Maintain aspect ratio and cover the container */
      border-radius: 5px;
    }
    .pet-info {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: black;
      border-radius: 5px;
      padding: 5px;
      display: none;
      text-align: center;
    }
    .pet-card:hover .pet-info {
      display: block;
    }
    .adopt-btn {
      background-color: #4CAF50;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }
    .adopt-btn:hover {
      background-color: #45a049;
    }
    .pagination {
      margin-top: 20px;
      display: flex;
      justify-content: center;
    }
    .pagination button {
      margin: 0 0px;
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .pagination button:hover {
      background-color: #45a049;
    }
    .pagination button.active {
      background-color: #45a049;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="containerinner">
      <a href="title 2.html"><button class="harbor"><ion-icon name="paw-outline"></ion-icon> Pet Harbor</button></a>
      <ul>
        <li><a href="title 2.html">Home</a></li>
        <li><a href="achive.html">Achievements</a></li>
        <li><a href="adoption.html">Adoption</a></li>
        <li><a href="new.html">Donation</a></li>
        <li><a href="faq.html">FAQs</a></li>
        <li><a href="about.html">About</a></li>
      </ul> 
      <a href="login.php"><button class="signup">Login/Sign-Up</button></a>
    </div>


  <div class="containers">
    <div class="search-container">
      <div class="filter-container">
        <h1 style="margin-left: 8%;margin-bottom:0px;color: #333;">Find Your New Furry Friend</h1>
        <select id="type">
          <option value="all">All Types</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="rabbit">Rabbit</option>
          <option value="parrot">Parrot</option>
          <!-- Add more options for other types -->
        </select>

        <select id="breed">
          <option value="all">All Breeds</option>
          <option value="labrador">Labrador</option>
          <option value="poodle">Poodle</option>
          <option value="beagle">Beagle</option>
          <option value="persian">Persian</option>
          <option value="maine">Maine Coon</option>
          <option value="dutch">Dutch</option>
          <option value="MiniLop">Mini Lop</option>
          <option value="Dwarf">Netherland Dwarf</option>
          <option value="LionHead">LionHead Rabbit</option>
          <option value="german">German Shepherd</option>
          <option value="parakeet">Parakeet Parrot</option>
          <option value="grey">Grey parrot</option>
          <option value="bobtail">American Bobtail cat</option>
          <!-- Add more options for other breeds -->
        </select>

        <button class="filter-btn" onclick="filterPets()">Filter</button>
      </div>
    </div>

    <div id="pet-list">
      <?php
      foreach ($pets as $pet) {
        echo '<div class="pet-card">';
        echo '<img src="' . $pet['image_path'] . '" alt="' . $pet['name'] . '">';
        echo '<div class="pet-info">';
        echo '<h2>' . $pet['name'] . '</h2>';
        echo '<p><strong>Type:</strong> ' . $pet['type'] . '</p>';
        echo '<p><strong>Breed:</strong> ' . $pet['breed'] . '</p>';
        echo '<p><strong>Shelter:</strong> ' . $pet['shelter'] . '</p>';
        echo '<a href="https://docs.google.com/forms/d/e/1FAIpQLScBvY-7rtfTYXciwLgxkWpSvn5SSW_d34ogZZUswMJKo49Fhg/viewform?usp=sf_link" target="_blank"><button class="adopt-btn">Adopt</button></a>';
        echo '</div>'; // Close pet-info div
        echo '</div>'; // Close pet-card div
      }
      ?>
    </div>
    <div class="pagination" id="pagination"></div>
  </div>
    </div>

  <script>
    // Your existing JavaScript code
  </script>
</body>
</html>
