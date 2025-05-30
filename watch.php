<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Watch Movie Trailer</title>
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background-color: #000; color: #fff; }
    .video-section {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    .video-section video {
      position: absolute;
      top: 50%; left: 50%;
      min-width: 100%;
      min-height: 100%;
      transform: translate(-50%, -50%);
      object-fit: cover;
      filter: brightness(0.5);
    }
    .overlay-content {
      position: absolute;
      bottom: 60px;
      left: 60px;
      z-index: 2;
      max-width: 600px;
    }
    .movie-title {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .info-bar {
      font-size: 0.9rem;
      color: #ccc;
      margin-bottom: 10px;
    }
    .highlight {
      font-size: 1rem;
      color: #e50914;
      margin-bottom: 15px;
    }
    .description {
      font-size: 1rem;
      line-height: 1.5;
      margin-bottom: 20px;
    }
    .extra-info {
      font-size: 0.9rem;
      color: #aaa;
      margin-bottom: 20px;
    }
    .controls {
      position: absolute;
      bottom: 20px;
      left: 60px;
      z-index: 2;
    }
    .control-button {
      background: rgba(255,255,255,0.2);
      border: none;
      color: #fff;
      font-size: 1.5rem;
      padding: 10px 15px;
      margin-right: 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    #volumeSlider {
      vertical-align: middle;
      width: 100px;
    }
    @media (max-width: 768px) {
      .overlay-content, .controls {
        left: 20px;
        right: 20px;
        bottom: 30px;
      }
      .movie-title {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

<div class="video-section">
  <video id="trailer" autoplay loop playsinline>
    <source id="videoSource" src="" type="video/mp4" />
    Your browser does not support the video tag.
  </video>

  <div class="overlay-content">
    <div class="movie-title" id="movieTitle">Loading...</div>
    <div class="info-bar" id="infoBar"></div>
    <div class="highlight" id="highlight"></div>
    <div class="description" id="description"></div>
    <div class="extra-info" id="extraInfo"></div>
  </div>

  <div class="controls">
    <button id="playBtn" class="control-button"><i class='bx bx-pause'></i></button>
    <button id="volumeBtn" class="control-button"><i class='bx bx-volume-full'></i></button>
    <input type="range" id="volumeSlider" min="0" max="1" step="0.01" value="0.5" />
  </div>
</div>

<script>
  const videosData = {
    swidgame: {
      src: 'trailer/swidgame.mp4',
      title: 'Swid Game',
      infoBar: '2025 • Thriller • HD • U/A 16+ | Suspense, Drama, Action',
      highlight: 'Top #1 in TV Shows Today',
      description: 'In a high-stakes survival game, contestants risk everything to win a mysterious prize, but the true cost of the game is far deadlier than anyone expects.',
      extraInfo: `<strong>Cast:</strong> Lee Jung-jae, Park Hae-soo, Jung Ho-yeon<br>
                  <strong>Genres:</strong> Thriller, Drama, Action<br>
                  <strong>This Show Is:</strong> Intense, Gripping, Thought-Provoking`
    },
    mydemon: {
      src: 'trailer/mydemon.mp4',
      title: 'My Demon',
      infoBar: '2024 • Horror • HD • R | Dark Fantasy, Thriller',
      highlight: 'A Chilling Tale of Survival',
      description: 'A young woman battles inner demons and supernatural forces in a gripping fight for her soul.',
      extraInfo: `<strong>Cast:</strong> Jane Doe, John Smith<br>
                  <strong>Genres:</strong> Horror, Dark Fantasy, Thriller<br>
                  <strong>This Movie Is:</strong> Scary, Suspenseful, Emotional`
    },
    kanthara: {
      src: 'trailer/kantara.mp4',
      title: 'Kanthara',
      infoBar: '2022 • Action/Drama • HD • U/A 16+',
      highlight: 'Myth Meets Reality',
      description: 'A conflict between tradition and modernity erupts in a remote village where a forest deity is both protector and punisher.',
      extraInfo: `<strong>Cast:</strong> Rishab Shetty<br>
                  <strong>Genres:</strong> Action, Mythology, Drama<br>
                  <strong>This Movie Is:</strong> Raw, Cultural, Intense`
    },
    schoolforgoodandevil: {
      src: 'trailer/schoolforgood&evil.mp4',
      title: 'The School for Good and Evil',
      infoBar: '2022 • Fantasy/Adventure • HD • PG-13',
      highlight: 'When Legends Are Born, Good and Evil Collide',
      description: 'Best friends Sophie and Agatha find themselves on opposing sides of an enchanted school that trains heroes and villains — testing their friendship and destiny.',
      extraInfo: `<strong>Cast:</strong> Sophia Anne Caruso, Sofia Wylie, Charlize Theron, Kerry Washington<br>
                  <strong>Genres:</strong> Fantasy, Adventure, Family<br>
                  <strong>This Movie Is:</strong> Magical, Whimsical, Visually Stunning`
    }
  };

  const urlParams = new URLSearchParams(window.location.search);
  let movieKey = urlParams.get('movie');
  if (!movieKey || !videosData[movieKey]) {
    movieKey = 'schoolforgoodandevil'; // default
  }

  const video = document.getElementById('trailer');
  const videoSource = document.getElementById('videoSource');
  const movieTitle = document.getElementById('movieTitle');
  const infoBar = document.getElementById('infoBar');
  const highlight = document.getElementById('highlight');
  const description = document.getElementById('description');
  const extraInfo = document.getElementById('extraInfo');

  const videoData = videosData[movieKey];
  videoSource.src = videoData.src;
  video.load();

  movieTitle.textContent = videoData.title;
  infoBar.textContent = videoData.infoBar;
  highlight.textContent = videoData.highlight;
  description.textContent = videoData.description;
  extraInfo.innerHTML = videoData.extraInfo;

  const playBtn = document.getElementById('playBtn');
  const volumeBtn = document.getElementById('volumeBtn');
  const volumeSlider = document.getElementById('volumeSlider');

  playBtn.addEventListener('click', () => {
    if (video.paused) {
      video.play();
      playBtn.innerHTML = "<i class='bx bx-pause'></i>";
    } else {
      video.pause();
      playBtn.innerHTML = "<i class='bx bx-play'></i>";
    }
  });

  volumeBtn.addEventListener('click', () => {
    video.muted = !video.muted;
    updateVolumeIcon();
  });

  volumeSlider.addEventListener('input', () => {
    video.volume = volumeSlider.value;
    video.muted = volumeSlider.value == 0;
    updateVolumeIcon();
  });

  function updateVolumeIcon() {
    if (video.muted || video.volume === 0) {
      volumeBtn.innerHTML = "<i class='bx bx-volume-mute'></i>";
    } else if (video.volume <= 0.5) {
      volumeBtn.innerHTML = "<i class='bx bx-volume-low'></i>";
    } else {
      volumeBtn.innerHTML = "<i class='bx bx-volume-full'></i>";
    }
  }

  updateVolumeIcon();
  video.volume = 0.5;
</script>

</body>
</html>
