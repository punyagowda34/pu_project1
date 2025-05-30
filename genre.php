<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Genre - Flix</title>
  <link rel="stylesheet" href="grid.css">
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #eee;
      font-family: 'Cairo', sans-serif;
      margin: 0;
      padding: 0;
    }
    .genre-container {
      max-width: 1200px;
      margin: 80px auto 40px auto;
      padding: 20px;
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
    }
    .genre-container h1 {
      color: rgb(243, 18, 18);
      margin-bottom: 30px;
      font-size: 2.5rem;
      text-align: center;
    }
    .genre-list {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }
    .genre-card {
      background-color: #292929;
      border-radius: 10px;
      overflow: hidden;
      text-align: center;
      transition: 0.3s;
      box-shadow: 0 0 20px #1f83ed;
      position: relative;
    }
    .genre-card:hover {
      background-color: #383838;
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
    }
    .genre-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
      filter: brightness(70%);
    }
    .genre-card a {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 15px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
      color: rgba(255, 255, 255, 0.9);
      font-weight: bold;
      font-size: 1.3rem;
      text-decoration: none;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 1);
      transition: background 0.3s ease;
    }
    .genre-card a:hover {
      color: #fff;
    }
    @media screen and (max-width: 768px) {
      .genre-list {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media screen and (max-width: 480px) {
      .genre-list {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="genre-container">
  <h1>Browse by Genre</h1>
  <div class="genre-list">
    <div class="genre-card">
      <img src="images/genre/action.jpg" alt="Action">
      <a href="#">Action</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/drama.jpg" alt="Drama">
      <a href="#">Drama</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/comedy.jpg" alt="Comedy">
      <a href="#">Comedy</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/thriller.jpg" alt="Thriller">
      <a href="#">Thriller</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/horror.jpg" alt="Horror">
      <a href="#">Horror</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/romance.jpg" alt="Romance">
      <a href="#">Romance</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/scifi.jpg" alt="Sci-Fi">
      <a href="#">Sci-Fi</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/fantasy.jpg" alt="Fantasy">
      <a href="#">Fantasy</a>
    </div>
    <div class="genre-card">
      <img src="images/genre/toprated.jpg" alt="Top Rated">
      <a href="#">Top Rated</a>
    </div>
  </div>
</div>

</body>
</html>
