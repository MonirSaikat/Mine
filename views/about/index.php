<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a href="<?= url('/') ?>" class="navbar-brand">Logo</a>
      <ul class="nav navbar-nav ms-auto">
        <li><a class="nav-link" href="<?= url('/') ?>">Home</a></li>
        <li><a class="nav-link" href="<?= url('/about') ?>">About</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>This is your about page</h1>
  </div>
</body>

</html>