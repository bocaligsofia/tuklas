<?php

  require_once('config/database.php');
  require_once('config/result.php');

  // Function to get names based on search query
  function getNamesBySearch($conn, $searchQuery) {
  $escapedSearchQuery = mysqli_real_escape_string($conn, $searchQuery);
  $query = "SELECT * FROM names WHERE username LIKE '%$searchQuery%'";
  $result = mysqli_query($conn, $query);
  return $result;

  if(isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    $result = getNamesBySearch($conn, $searchQuery);

    while ($row = mysqli_fetch_assoc($result)) {
        // Generate table rows using the retrieved data
    }
} else {
    $query = "SELECT * FROM names";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Generate table rows using the retrieved data
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,600,0,200" />
    <link rel="stylesheet" href="css/Qtable.css">
    <title>Pagsusulit</title>
    <link rel="icon" type="image/x-icon" href="./pics/logo.png">

    <script src="js/search.js"></script>

  

</head>
<div class="toggle">
        <a href="home.php" class="material-symbols-outlined">
arrow_back
</a>
<body class ="bg" style="margin: 50px;">
<br>

</div>
<h1><span>T</span><span>A</span><span>L</span><span>A</span><span>A</span><span>N</span><span> </span><span>N</span><span>G</span><span> </span>
<span>N</span><span>A</span><span>N</span><span>G</span><span>U</span><span>N</span><span>G</span><span>U</span><span>N</span><span>A</span></h1>

    <form action="deleteQresult.php" method="post">
  <div class="input-group mb-3">
  <input type="text" name ="search" id="search"<?php echo isset($searchQuery) ? $searchQuery : ''; ?> class="form-control" placeholder="Search">
      </div>
      <div class="container">
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Tanggalin </button>
      
      <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th> alisin </th>
            <th>Pangalan</th>
            <th> Petsa </th>
            <th> Bilang ng Tanong </th>
            <th> Tamang sagot </th>
            <th> Maling sagot </th>
            <th> Percentage </th>
            <th> Puntos </th>
       

        </tr>
        </thead>
            <tbody id="myTable">
        </tr> 
      <tr>
    <?php
      $query = "SELECT * FROM names ORDER BY puntos DESC"; // Ordering by 'puntos' column in descending order
      $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) 
        {
      ?>
<td> <input type="checkbox" value="<?php echo $row['id']; ?>" name="id[]"> </td>
    <td > <?php echo $row['username'];?> </td>
    <td> <?php echo $row['petsa'];?> </td>
    <td> <?php echo $row['total_tanong'];?> </td>
    <td> <?php echo $row['total_correct'];?> </td>
    <td> <?php echo $row['total_wrong'];?> </td>
    <td> <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $row['percentage']; ?>%;" aria-valuenow="<?php echo $row['percentage']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['percentage']; ?>%</div>
            </div> </td>
    <td> <?php echo $row['puntos'];?> </td>
    
    
  
                  
    </tr>  
    <?php                    
    }
            
  ?> 
</table>
</form>


</div>
            
</body>
</html>



