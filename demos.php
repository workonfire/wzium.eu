<?php
$tracks = [
    [
        "title" => "Invasion",
        "artist" => "Wzium",
        "file" => "assets/songs/Invasion.flac"
    ],
    [
        "title" => "Resurrection",
        "artist" => "Wzium",
        "file" => "assets/songs/Resurrection.flac"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Demos</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link type="image/png" sizes="16x16" rel="icon" href="assets/favicon/icons8-rainbow-3d-fluency-16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="assets/favicon/icons8-rainbow-3d-fluency-32.png">
    <link type="image/png" sizes="96x96" rel="icon" href="assets/favicon/icons8-rainbow-3d-fluency-96.png">
</head>

<body>
    <div class="ambient-background" aria-hidden="true">
        <div class="ambient-glow ambient-glow-1"></div>
        <div class="ambient-glow ambient-glow-2"></div>
        <div class="ambient-glow ambient-glow-3"></div>
    </div>
    <h1>
        <span class="colorful">de</span><span class="normal">mos</span>
    </h1>

    <p class="page-note">
        These are my song demos that are subject to change.
        Keep in mind I'm just a beginner.
    </p>

    <section id="projects-grid" aria-label="Song demos">

        <?php foreach ($tracks as $index => $track): ?>

            <div class="audio-player">
                <div class="player-top">
                    <span class="player-format">FLAC · LOSSLESS</span>
                </div>

                <div class="player-info">
                    <div class="track-title">
                        <?= htmlspecialchars($track["title"], ENT_QUOTES, "UTF-8") ?>
                    </div>

                    <div class="track-artist">
                        <?= htmlspecialchars($track["artist"], ENT_QUOTES, "UTF-8") ?>
                    </div>
                </div>

                <div class="player-progress">
                    <input
                        type="range"
                        class="progress"
                        min="0"
                        max="100"
                        value="0"
                        aria-label="Progress"
                    >

                    <div class="time-display">
                        <span class="current-time">0:00</span>
                        <span class="duration">0:00</span>
                    </div>
                </div>

                <div class="player-controls">
                    <div class="player-buttons">
                        <button class="play-btn" aria-label="Play">
                            <span class="play-icon">▶</span>
                        </button>

                        <a
                            class="download-btn"
                            href="<?= htmlspecialchars($track["file"], ENT_QUOTES, "UTF-8") ?>"
                            download
                            aria-label="Download <?= htmlspecialchars($track["title"], ENT_QUOTES, "UTF-8") ?>"
                            title="Download"
                        >⤓</a>
                    </div>

                    <div class="volume-control">
                        <span>VOL</span>

                        <input
                            type="range"
                            class="volume"
                            min="0"
                            max="1"
                            step="0.01"
                            value="0.8"
                            aria-label="Volume"
                         >
                    </div>
                </div>

                <audio class="audio" preload="metadata">
                    <source
                        src="<?= htmlspecialchars($track["file"], ENT_QUOTES, "UTF-8") ?>"
                        type="audio/flac"
                    >
                </audio>
            </div>

        <?php endforeach; ?>

    </section>

    <script src="scripts/player.js" defer></script>
</body>
</html>
