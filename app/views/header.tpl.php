<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sonic</title>
</head>
<body>
  <header>
    <h1>Sonic</h1>

    <nav>
      <ul>
        <li>
          <a href="<?= $router->generate('home') ?>">Accueil</a>
        </li>
      </ul>
      <ul>
        <li><a href="<?= $router->generate('developers_developers') ?>">Créateurs</a>
        </li>
      </ul>
    </nav>

  </header>
