<?php
/**
 * Formateador y Validador de JSON
 * Procesa JSON server-side con PHP y embellece el resultado.
 */
header('Content-Type: text/html; charset=utf-8');

$resultado = '';
$error     = '';
$entrada   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['json'])) {
    $entrada = $_POST['json'];
    $decoded = json_decode($entrada, true);

    if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
        $error = '❌ JSON inválido: ' . json_last_error_msg();
    } else {
        // Embellecer con 2 espacios
        $resultado = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formateador y Validador de JSON Online Gratis | ConfiguroWeb</title>
    <meta name="description" content="Formatea, valida y embellece código JSON online gratis. Detecta errores de sintaxis instantly. Herramienta para desarrolladores de ConfiguroWeb.">
    <meta name="keywords" content="formateador json, validar json, embellecer json, json pretty print, json formatter español">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Formateador y Validador de JSON Online Gratis">
    <meta property="og:description" content="Formatea, valida y embellece código JSON online. Herramienta gratuita para desarrolladores.">
    <meta property="og:url" content="https://demoscweb.com/github/php-json-formateador/">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Formateador y Validador de JSON Online Gratis">
    <meta name="twitter:description" content="Formatea, valida y embellece código JSON online.">

    <!-- JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "Formateador y Validador de JSON",
      "applicationCategory": "DeveloperApplication",
      "operatingSystem": "Any",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
      "author": { "@type": "Person", "name": "ConfiguroWeb", "url": "https://configuroweb.com" }
    }
    </script>

    <link rel="canonical" href="https://demoscweb.com/github/php-json-formateador/">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>🔧 Formateador y Validador de JSON</h1>
        <p class="subtitle">Pega tu JSON para validarlo, formatearlo y embellecerlo. Procesamiento PHP server-side.</p>
    </header>

    <main>
        <form method="POST" id="form-json">
            <label for="json">Pega tu JSON aquí:</label>
            <textarea name="json" id="json" placeholder='{"ejemplo": "valor", "numero": 42}' rows="10"><?php echo htmlspecialchars($entrada, ENT_QUOTES); ?></textarea>

            <div class="botones">
                <button type="submit" class="btn-primary">Validar y Formatear</button>
                <button type="button" id="btn-copiar" class="btn-secundario">📋 Copiar resultado</button>
                <button type="button" id="btn-limpiar" class="btn-secundario">🗑️ Limpiar</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="resultado error"><?php echo htmlspecialchars($error); ?></div>
        <?php elseif ($resultado): ?>
            <label>Resultado formateado:</label>
            <div class="resultado ok"><pre><code id="resultado"><?php echo htmlspecialchars($resultado); ?></code></pre></div>
        <?php endif; ?>

        <section class="info">
            <h2>¿Para qué sirve un Formateador de JSON?</h2>
            <p>JSON (JavaScript Object Notation) es el formato estándar para intercambio de datos en la web. Esta herramienta te permite:</p>
            <ul>
                <li><strong>Validar sintaxis:</strong> detecta comas faltantes, llaves sin cerrar, etc.</li>
                <li><strong>Embellecer:</strong> convierte JSON compacto en formato legible.</li>
                <li><strong>Minificar:</strong> elimina espacios para reducir tamaño.</li>
                <li><strong>Depurar APIs:</strong> revisa respuestas de servicios REST.</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>Desarrollado por <a href="https://configuroweb.com" target="_blank">ConfiguroWeb</a> ·
           <a href="https://appscweb.com/citas/" target="_blank">Sistema de Citas</a> ·
           <a href="https://appscweb.com/negocios/" target="_blank">Gestión de Negocios</a></p>
        <p>&copy; <?php echo date('Y'); ?> ConfiguroWeb</p>
    </footer>

    <script src="assets/script.js"></script>
</body>
</html>