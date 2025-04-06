<?php
    $conn = new mysqli(hostname: "localhost",username: "root",password: "",database: "hodowla");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hodowla świnek morskich</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Hodowla świnek morskich - zamów świnkowe maluszk</h1>
        </header>

        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </nav>

        <div id="sidebar">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                    // Skrypt #1
                    $sql = "SELECT rasa FROM rasy;";
                    $result = $conn->query(query: $sql);
                    while($row = $result -> fetch_array()) {
                        echo "<li>$row[0]</li>";
                    }
                ?>
            </ol>
        </div>

        <main>
            <img src="american.jpg" alt="Świnka morska rasy american">
            <?php
                // Skrypt #2
                $sql = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON rasy_id = rasy.id WHERE rasy_id=6;";
                $result = $conn->query(query: $sql);
                while($row = $result -> fetch_array()) {
                    echo "<h2>Rasa: $row[2]</h2>";
                    echo "<p>Data urodzenia: $row[0]</p>";
                    echo "<p>Oznaczenie miotu: $row[1]</p>";
                }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
                // Skrypt #3
                $sql = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6;";
                $result = $conn->query(query: $sql);
                while($row = $result -> fetch_array()) {
                    echo "<h3>$row[0] - $row[1]</h3>";
                    echo "<p>$row[2]</p>";
                }
            ?>
        </main>

        <footer>
            <p>Stronę wykonał: <a href="https://ee-informatyk.pl/" target="_blank" style="text-decoration: none;color: unset;padding: unset;font-size: unset;">EE-Informatyk.pl</a></p>
        </footer>
    </body>
</html>

<?php
    $conn -> close();
?>