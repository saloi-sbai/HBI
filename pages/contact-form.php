    <?php
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/styles.css" />
      <link rel="stylesheet" href="../css/contact.css" />
      <script src="https://kit.fontawesome.com/f748fcced4.js" crossorigin="anonymous"></script>

      <title>contact</title>
    </head>

    <body>
      <nav>
        <div class="logo">
          <img src="../img/unnamed.png" alt="logo-hbi" />
        </div>
        <ul class="menu">
          <li class="item"><a href="../index.html">Acceuil</a></li>
          <li class="item"><a href="./depannage.html">Dépannages</a></li>
          <li class="item"><a href="./tarifs.html">Tarifs</a></li>
          <li class="item"><a class="active" href="./contact-form.php">Contact</a></li>
        </ul>
        <div class="toggle">
          <span class="burger"></span>
        </div>
      </nav>

      <section class="contact">
        <!-- info contact -->
        <div class="contact-info">
          <div class="contact-item">
            <h4 class="contact-title"><i class="fa-solid fa-house"></i></h4>
            <p>104, Rue Louise Michel - 59290 Wasquehal</p>
          </div>
          <div class="contact-item">
            <h4 class="contact-title"><i class="fa-solid fa-envelope"></i></h4>
            <p>g.besoin.daide@myhbi.fr</p>
          </div>
          <div class="contact-item">
            <h4 class="contact-title"><i class="fa-solid fa-phone"></i></h4>
            <p>06.87.79.27.79</p>
          </div>
        </div>

        <!-- formulaire -->

        <div class="contact-form">
          <h3>Contactez-nous</h3>
          <?php
          //afficher le message d'erreur
          if (isset($_SESSION['error'])) { ?>
            <p style="color:red;text-align:center;padding:10px;">
              <?= $_SESSION['error'] ?>
            </p>
          <?php
            unset($_SESSION['error']);
          }
          ?>
          <?php
          //afficher le message de succes
          if (isset($_SESSION['succes_message'])) { ?>
            <p style="color:green;text-align:center;padding:10px;">
              <?= $_SESSION['succes_message'] ?>
            </p>
          <?php
            unset($_SESSION['succes_message']);
          }
          ?>
          <form action="./contact.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="nom" id="name" placeholder="Nom" />
              <br />
              <input type="email" class="form-control" name="email" id="email" placeholder="email" />
              <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
            </div>
            <button name="envoyer" type="submit" class="submit-btn">
              Envoyer
            </button>
          </form>
        </div>
      </section>

      <footer>
        <div class="footer">
          <p>&copy;All Rights Reserved. www.myhbi.fr - Siret n° : 79759284700017</p>
        </div>
      </footer>

      <script src="./toggle.js"></script>
    </body>

    </html>