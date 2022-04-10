<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      <?php

      foreach ($menupontok as $key => $value) {
        $active = '';
        if ($_SERVER['REQUEST_URI'] == '/szakdolgozat/' . $key) $active = ' active';

        if ($key == 'felhasznalo') $key .= '&action=' . $action;
      ?>

        <li class="nav-item<?php echo $active; ?>">
          <a class="nav-link" href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a>
        </li>
      <?php

      }
      //keresés a telefonok közt
      echo "<div class='keres'><form action='index.php?page=kereses' method='POST'>
        <input type='text' name='kereses' placeholder='Telefon neve'>
        <button type='submit' name='submitKeres'>Keresés</button>
        </form></div>";
      ?>
    </ul>
  </div>
</nav>