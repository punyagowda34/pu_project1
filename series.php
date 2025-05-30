<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Series - Flix</title>
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
        .series-container {
            max-width: 1200px;
            margin: 80px auto 40px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
        }
        .series-container h1 {
            color: #f33;
            margin-bottom: 30px;
            font-size: 2.5rem;
            text-align: center;
        }
        .series-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0; /* No space between cards */
        }
        .series-card {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #222;
            transition: 0.3s;
        }
        .series-card:hover {
            transform: scale(1.03);
            z-index: 2;
        }
        .series-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: brightness(65%);
            transition: filter 0.3s;
        }
        .series-card:hover img {
            filter: brightness(85%);
        }
        .series-title {
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

        @media screen and (max-width: 768px) {
            .series-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media screen and (max-width: 480px) {
            .series-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="series-container">
    <h1>Popular Series</h1>
    <div class="series-grid">
        <?php
        $seriesList = [
            'Stranger Things', 'Breaking Bad', 'Game of Thrones', 'The Witcher',
            'The Boys', 'Money Heist', 'The Mandalorian', 'Loki',
            'Wednesday', 'Peaky Blinders', 'The Crown', 'The Umbrella Academy',
            'Ozark', 'The Office', 'Friends', 'House of the Dragon',
            'Daredevil', 'Squid Game', 'Dark', 'Narcos'
        ];

        foreach ($seriesList as $title) {
            $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $title); // Keep capitalization
            $filename = "$slug.jpg";
            $path = "images/series/$filename";

            if (!file_exists($path)) {
                $path = "images/series/default.jpg";
            }

            echo "<div class='series-card'>";
            echo "<img src='$path' alt='$title'>";
            echo "<div class='series-title'>$title</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
