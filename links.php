<?php
$links = [
    [
        "title" => "last.fm",
        "description" => "@workonfire",
        "image" => "assets/lastfm.png",
        "url" => "https://www.last.fm/user/workonfire"
    ],
    [
        "title" => "Steam",
        "description" => "@workonfire",
        "image" => "assets/steam.svg",
        "url" => "https://steamcommunity.com/id/workonfire"
    ],
    [
        "title" => "Discord",
        "description" => "@wzium",
        "image" => "assets/discord.svg"
    ],
    [
        "title" => "Instagram",
        "description" => "@workonfi.re",
        "image" => "assets/instagram.svg",
        "url" => "https://www.instagram.com/workonfi.re/"
    ],
    [
        "title" => "Spotify",
        "description" => "@workonfire",
        "image" => "assets/spotify.svg",
        "url" => "https://open.spotify.com/user/21qaqdbsysarbn54vlmpnzmcq"
    ],
    [
        "title" => "YouTube",
        "description" => "@workonfire",
        "image" => "assets/youtube.svg",
        "url" => "https://www.youtube.com/@workonfire"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Links</title>
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
        <span class="colorful">lin</span><span class="normal">ks</span>
    </h1>

    <section id="projects-grid" aria-label="Links">

        <?php foreach ($links as $link): ?>
            <article class="project-card">

                <?php if (!empty($link["image"])): ?>
                    <img
                        src="<?= htmlspecialchars($link["image"], ENT_QUOTES, "UTF-8") ?>"
                        class="project-thumb"
                        alt=""
                    />
                <?php endif; ?>

                <div class="project-content">

                    <div class="project-header">
                        <h2 class="project-label">
                            <?= htmlspecialchars($link["title"], ENT_QUOTES, "UTF-8") ?>
                        </h2>
                    </div>

                    <p class="project-desc">
                        <?= htmlspecialchars($link["description"], ENT_QUOTES, "UTF-8") ?>
                    </p>

                    <?php if (!empty($link["url"])): ?>
                        <div class="project-actions">
                            <a
                                href="<?= htmlspecialchars($link["url"], ENT_QUOTES, "UTF-8") ?>"
                                class="action-btn"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Check out
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </article>
        <?php endforeach; ?>

    </section>
</body>
</html>
