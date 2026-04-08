<?php
$baseDir = __DIR__ . '/albums';
$albums = array_filter(glob($baseDir . '/*'), 'is_dir');

function getImages($dir): false|array {
    return glob($dir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>wziumGallery</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<h1>
    <span class="colorful">gal</span><span class="normal">lery</span>
</h1>

<div id="gallery-grid">
    <?php foreach ($albums as $album):
        $name = basename($album);

        $thumb = "albums/$name/thumb.jpg";
        $descFile = "$album/description.txt";
        $desc = file_exists($descFile) ? trim(file_get_contents($descFile)) : "";
        ?>

        <a href="?album=<?php echo urlencode($name); ?>" class="album-card">

            <?php if (file_exists($thumb)): ?>
                <img src="<?php echo $thumb; ?>" class="album-thumb" alt="">
            <?php else: ?>
                <div class="album-no-thumb">∅</div>
            <?php endif; ?>

            <div class="album-label"><?php echo htmlspecialchars($name); ?></div>

            <?php if ($desc): ?>
                <div class="album-desc">
                    <?php echo htmlspecialchars($desc); ?>
                </div>
            <?php endif; ?>

        </a>

    <?php endforeach; ?>
</div>

<div id="gallery" class="<?php echo isset($_GET['album']) ? 'open' : ''; ?>">

    <button id="gallery-back" onclick="window.location='gallery.php'">← back</button>

    <?php if (isset($_GET['album'])):
        $albumName = basename($_GET['album']);
        $albumPath = $baseDir . '/' . $albumName;
        $images = is_dir($albumPath) ? getImages($albumPath) : [];
        ?>

        <div id="gallery-title"><?php echo htmlspecialchars($albumName); ?></div>

        <div id="gallery-grid">

            <?php if ($images): foreach ($images as $img): ?>
                <div class="photo-item">
                    <img src="<?php echo 'albums/' . $albumName . '/' . basename($img); ?>" alt="A picture">
                </div>
            <?php endforeach; else: ?>
                <div id="msg">This album is empty</div>
            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>
<script src="photo-view.js"></script>
</body>
</html>