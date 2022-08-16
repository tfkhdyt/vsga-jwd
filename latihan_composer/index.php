<?php
require_once "vendor/autoload.php";
$factory = new RandomLib\Factory;
$generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Password</title>
</head>

<body>
  <h1>Random Password Generator</h1>

  <?php for ($i = 0; $i < 10; $i++) : ?>
    <ul>
      <li><?= $generator->generateString(32, 'abcdefg12345') . "\n"; ?></li>
    </ul>
  <?php endfor ?>
</body>

</html>