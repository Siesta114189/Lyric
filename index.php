<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Letras de Canciones</title>
    <style>
        /* Estilos globales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        .container {
            background: #ffffff;
            color: #333;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 500px;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6a11cb;
        }
        p {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        input, button {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px auto;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd;
            display: block;
        }
        input:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0px 0px 5px rgba(106, 17, 203, 0.5);
        }
        button {
            background-color: #6a11cb;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #2575fc;
        }
        .suggestions {
            text-align: left;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-height: 100px;
            overflow-y: auto;
            position: absolute;
            width: calc(100% - 20px);
            z-index: 10;
            display: none;
        }
        .suggestions div {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .suggestions div:hover {
            background: #eaeaea;
        }
        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #aaa;
        }
        footer a {
            color: #6a11cb;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎵 Buscador de Letras de Canciones</h1>
        <p>¡Encuentra la letra de tus canciones favoritas!</p>
        <form method="POST" action="service.php">
            <div style="position: relative;">
                <input type="text" id="song" name="song" placeholder="Ingresa el nombre de la canción" required autocomplete="on">
                <div id="songSuggestions" class="suggestions"></div>
            </div>
            <div style="position: relative;">
                <input type="text" id="artist" name="artist" placeholder="Ingresa el nombre del artista" required autocomplete="on">
                <div id="artistSuggestions" class="suggestions"></div>
            </div>
            <button type="submit">Buscar Letra</button>
        </form>
        <footer>
            <p>Hecho con ❤️ por <a href="#">Mandujano Vázquez Diego</a></p>
        </footer>
    </div>

</body>
</html>

