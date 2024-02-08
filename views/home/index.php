<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a href="<?= url('/') ?>" class="navbar-brand">Logo</a>
      <ul class="nav navbar-nav ms-auto">
        <li><a class="nav-link" href="<?php echo url('/'); ?>">Home</a></li>
        <li><a class="nav-link" href="<?php echo url('/about'); ?>">About</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Home Page</h1>
  </div>

</body>

</html>