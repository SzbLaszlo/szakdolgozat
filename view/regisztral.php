<html>

<head>

</head>

<body>
    <form action="index.php?page=regisztral" method="POST">
        <div class="row">
            <div class="col">
                Felhasználónév: <input type="text" name="felhasznalo" class="form-control" required>
            </div>
            <div class="col">
                Jelszó: <input type="password" name="jelszo" class="form-control" required>
            </div>
            <div class="col">
                Jelszó újra: <input type="password" name="jelszoujra" class="form-control" required>
            </div>
            <div class="col">
                Email: <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <br>
        <input value="Regisztráció" type="submit" name="submit" class="btn btn-success">
    </form>
</body>

</html>