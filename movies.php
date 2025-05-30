<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Movies - Flix</title>
  <link rel="stylesheet" href="grid.css" />
  <link rel="stylesheet" href="app.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #111;
      color: #eee;
      font-family: 'Cairo', sans-serif;
      margin: 0;
      padding: 0;
    }
    .movies-container {
      max-width: 1200px;
      margin: 80px auto 40px auto;
      padding: 20px;
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
    }
    .movies-container h1 {
      color: rgb(243, 18, 18);
      margin-bottom: 30px;
      font-size: 2.5rem;
      text-align: center;
    }
    .movie-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0; /* No space between cards */
    }
    .movie-card {
      position: relative;
      width: 100%;
      height: 100%;
      overflow: hidden;
      background-color: #222;
      transition: 0.3s;
    }
    .movie-card:hover {
      transform: scale(1.03);
      z-index: 2;
    }
    .movie-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: brightness(65%);
      transition: filter 0.3s;
    }
    .movie-card:hover img {
      filter: brightness(85%);
    }
    .movie-card-title {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 15px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent);
      color: #fff;
      font-weight: bold;
      font-size: 1.1rem;
      text-align: center;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 1);
    }

    /* Responsive: 2 or 1 column on smaller screens */
    @media screen and (max-width: 768px) {
      .movie-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media screen and (max-width: 480px) {
      .movie-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="movies-container">
  <h1>Popular Movies</h1>
  <div class="movie-grid">
    <?php
    $movies = [
      'Inception', 'The Dark Knight', 'Interstellar', 'Tenet',
      'Dunkirk', 'The Prestige', 'Memento', 'Avatar',
      'Titanic', 'Avengers Endgame', 'Iron Man', 'Black Panther'
    ];
    foreach ($movies as $title) {
      $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $title);
      $filename = "$slug.jpg";
      $path = "images/movies/$filename";

      if (!file_exists($path)) {
        $path = "images/movies/default.jpg";
      }

      echo "<div class='movie-card'>";
      echo "<img src='$path' alt='$title' title='$title'>";
      echo "<div class='movie-card-title'>$title</div>";
      echo "</div>";
    }
    ?>
  </div>
</div>

</body>
</html>
