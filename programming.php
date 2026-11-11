<?php
$projects = [
    [
        "title" => "stackslib",
        "description" => "A Python implementation of the UNO card game + a multiplayer server.",
        "image" => "assets/projects/uno.png",
        "language" => "Python",
        "language_class" => "python",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/stackslib"
            ]
        ]
    ],
    [
        "title" => "stacksTUI",
        "description" => "A beautiful terminal interface for the UNO game based on stackslib.",
        "image" => "assets/projects/terminal.png",
        "language" => "Python",
        "language_class" => "python",
        "status" => "ALPHA",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/stacksTUI"
            ]
        ]
    ],
    [
        "title" => "BucikGenerators",
        "description" => "A customizable Minecraft plugin for creating custom block generators.",
        "image" => "assets/projects/bucikgenerators.png",
        "language" => "Java",
        "language_class" => "java",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/BucikGenerators"
            ]
        ]
    ],
    [
        "title" => "WziumDio",
        "description" => "A simple radio playlist client for Polish radio stations.",
        "image" => "assets/projects/wziumdio.png",
        "language" => "PHP",
        "language_class" => "php",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/WziumDio"
            ],
            [
                "label" => "Live demo",
                "url" => "https://wzium.eu/wziumdio"
            ]
        ]
    ],
    [
        "title" => "Stacks",
        "description" => "A GTK4 + libadwaita Linux client for the UNO card game.",
        "image" => "assets/projects/stacks.svg",
        "language" => "Python",
        "language_class" => "python",
        "status" => "ALPHA",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/Stacks"
            ]
        ]
    ],
    [
        "title" => "firechat",
        "description" => "A simple chat server for a proprietary Polish communicator (Gadu-Gadu).",
        "image" => "assets/projects/firechat.png",
        "language" => "PHP",
        "language_class" => "php",
        "status" => "ALPHA",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/firechat"
            ]
        ]
    ],
    [
        "title" => "VanishSee",
        "description" => "An app used for checking hidden online administrators (/vanish) on a Polish Minecraft server (GC2.PL).",
        "image" => "assets/projects/vanishsee.png",
        "language" => "Python",
        "language_class" => "python",
        "status" => "OUTDATED",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/VanishSee"
            ]
        ]
    ],
    [
        "title" => "InventoryLogs",
        "description" => "A Minecraft plugin for logging players' inventory activities.",
        "image" => "assets/projects/inventorylogs.png",
        "language" => "Java",
        "language_class" => "java",
        "links" => [
            [
                "label" => "Check out",
                "url" => "https://github.com/workonfire/InventoryLogs"
            ]
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Programming</title>
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
        <span class="colorful">pro</span><span class="normal">jects</span>
    </h1>

    <p class="page-note">Some of my projects are currently work-in-progress.</p>

    <section id="projects-grid" aria-label="Programming projects">

        <?php foreach ($projects as $project): ?>
            <article class="project-card">
                <img
                    src="<?= htmlspecialchars($project["image"], ENT_QUOTES, "UTF-8") ?>"
                    class="project-thumb"
                    alt=""
                />
                <div class="project-content">
                    <div class="project-header">

                        <h2 class="project-label">
                            <?= htmlspecialchars($project["title"], ENT_QUOTES, "UTF-8") ?>
                        </h2>
                        <?php if (!empty($project["status"])): ?>
                            <span class="alpha-badge">
                                <?= htmlspecialchars($project["status"], ENT_QUOTES, "UTF-8") ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <p class="project-desc">
                        <?= htmlspecialchars($project["description"], ENT_QUOTES, "UTF-8") ?>
                    </p>

                    <span class="badge badge-<?= htmlspecialchars($project["language_class"], ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($project["language"], ENT_QUOTES, "UTF-8") ?>
                    </span>

                    <div class="project-actions">
                        <?php foreach ($project["links"] as $link): ?>
                            <a
                                href="<?= htmlspecialchars($link["url"], ENT_QUOTES, "UTF-8") ?>"
                                class="action-btn"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= htmlspecialchars($link["label"], ENT_QUOTES, "UTF-8") ?>
                            </a>

                        <?php endforeach; ?>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>

        <article class="project-card project-card-more">
            <div class="project-content">
                <div class="project-header">
                    <h2 class="project-label">More coming soon...</h2>
                </div>

                <div class="project-actions">
                    <a
                        href="https://github.com/workonfire"
                        class="action-btn action-btn-icon"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            src="assets/github.svg"
                            class="github-icon"
                            alt=""
                        />
                        View Github
                    </a>
                </div>
            </div>
        </article>
    </section>
    <p>Icons by <a href="https://icons8.com">Icons8</a></p>
</body>
</html>
