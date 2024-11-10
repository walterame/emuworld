<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos de <?php echo htmlspecialchars($console); ?> - <?php echo htmlspecialchars($current_letter); ?></title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Juegos de <?php echo htmlspecialchars($console); ?> - <?php echo htmlspecialchars($current_letter); ?></h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <?php foreach ($letters as $letter): ?>
                <a href="?console=<?php echo urlencode($console); ?>&letra=<?php echo urlencode($letter); ?>" 
                   class="<?php echo ($letter === $current_letter) ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($letter); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <main class="container">
        <div class="games-grid">
            <?php foreach ($games as $game): ?>
                <div class="game-card">
                    <div class="image-container">
                        <img src="<?php echo htmlspecialchars($game['cover_url']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" />
                    </div>
                    <h3><?php echo htmlspecialchars($game['title']); ?></h3>
                    <a href="<?php echo htmlspecialchars($game['download_url']); ?>">Descargar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
