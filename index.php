<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Pokedex</h1>
        <form method="POST" action="procesa.php">
            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero" required>
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" required>
            
            <label for="foto">Foto (URL):</label>
            <input type="text" name="foto" id="foto" placeholder="nombrepokemon.png" required>
            
            <button type="submit" name="accion" value="insert">Agregar Pokémon</button>
        </form>
        <h2>Lista de Pokémon</h2>
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
		 include_once 'pokemon.php';
		 $pokemonList = Pokemon::getPokedex();
		 foreach ($pokemonList as $pokemon): ?>
                <tr>
                    <td><?= htmlspecialchars($pokemon->get_numero()) ?></td>
                    <td><?= htmlspecialchars($pokemon->get_nombre()) ?></td>
                    <td><?= htmlspecialchars($pokemon->get_tipo()) ?></td>
                    <td><img src="img/<?= htmlspecialchars($pokemon->get_foto()) ?>" alt="Foto de <?= htmlspecialchars($pokemon->get_nombre()) ?>" height="50"></td>
                    <td>
			<form method="POST" action="procesa.php">
				<input type="hidden" name="numero" value="<?= htmlspecialchars($pokemon->get_numero()) ?>">
				<button type="submit" name="accion" value="delete">Eliminar Pokemon </button>
		   	</form> 
		    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
