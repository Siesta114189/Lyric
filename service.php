<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $song = urlencode($_POST['song']);
    $artist = urlencode($_POST['artist']);
    $apiUrl = "https://api.lyrics.ovh/v1/$artist/$song";

    // Llamada a la API
    $response = @file_get_contents($apiUrl);
    if ($response) {
        $data = json_decode($response, true);
        $lyrics = $data['lyrics'] ?? 'Letra no encontrada.';
    } else {
        $lyrics = 'Error al conectar con el servicio de letras.';
    }
    // Mostrar pantalla con letra
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Letra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .lyrics-container {
            width: 80%;
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            height: 60vh;
        }
        button {
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            border: none;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="lyrics-container">
        <pre style="white-space: pre-wrap;">$lyrics</pre>
    </div>
    <button onclick="downloadPDF()">Descargar como PDF</button>
    <button onclick="location.href='index.php';">Volver a Buscar</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const lyrics = document.querySelector('pre').textContent;
            doc.text(lyrics, 10, 10);
            doc.save('letra.pdf');
        }
    </script>
</body>
</html>
HTML;
}
?>
