<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pets"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch leaderboard data
$sql = "SELECT user_name, completion_time FROM puzzle_results ORDER BY completion_time ASC LIMIT 10";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Puzzle</title>
    <link rel="stylesheet" href="style.css"> <!-- Updated Path -->
</head>
<body>
    <!-- Wrapper for Background and Content -->
    <div class="background-container">
        <!-- Cat Image for Light Theme -->
        <img src="cat.webp" alt="Cat" class="side-image cat">
        <!-- Dog Image for Dark Theme -->
        <img src="dog.webp" alt="Dog" class="side-image dog">

        <!-- Main Content Wrapper -->
        <div class="content-wrapper">
            <!-- Theme Toggle -->
            <header>
                <button id="theme-toggle">Toggle Theme</button>
            </header>

            <!-- 6 Reasons Section -->
<section id="reasons">
    <h2>6 iemesli, kāpēc nepamest mājdzīvnieku:</h2>
    <div class="reasons-container">
        <div class="reason">
            <div class="reason-icon"></div>
            <p>1. Mājas mīlulis ir ģimenes loceklis.</p>
        </div>
        <div class="reason">
            <div class="reason-icon"></div>
            <p>2. Mājdzīvnieks dod mīlestību un prieku.</p>
        </div>
        <div class="reason">
            <div class="reason-icon"></div>
            <p>3. Mājdzīvnieka pamešana ir necilvēcīga rīcība.</p>
        </div>
        <div class="reason">
            <div class="reason-icon"></div>
            <p>4. Dzīvnieka veselība pasliktinās bez rūpēm.</p>
        </div>
        <div class="reason">
            <div class="reason-icon"></div>
            <p>5. Patversmēm bieži trūkst vietu.</p>
        </div>
        <div class="reason">
            <div class="reason-icon"></div>
            <p>6. Jūsu piemērs var ietekmēt citus atbildīgi rīkoties.</p>
        </div>
    </div>
</section>

            <!-- Accordion Section -->
            <section id="questions">
    <h2>Būtiskie jautājumi</h2>
    <div class="accordion">
        <div class="accordion-item">
            <h3>
                <span class="square"></span> Ko apsvērt, pirms mājdzīvnieka iegādes?
            </h3>
            <div class="content">
                <p>Pirms iegādes jāapsver, vai jums ir pietiekami daudz laika, līdzekļu un mīlestības, lai parūpētos par dzīvnieku. Nepieciešams pārdomāt arī mājas piemērotību un ģimenes locekļu saskaņu.</p>
            </div>
        </div>
        <div class="accordion-item">
            <h3>
                <span class="square"></span> Ko iesākt, ja tomēr nevarat vairs parūpēties?
            </h3>
            <div class="content">
                <p>Ja nevarat parūpēties, meklējiet atbalstu dzīvnieku patversmēs vai pie draugiem. Nekad neatstājiet dzīvnieku bezpalīdzīgā situācijā. Konsultējieties ar veterinārārstu par iespējām.</p>
            </div>
        </div>
        <div class="accordion-item">
            <h3>
                <span class="square"></span> Kā rīkoties, ja pamanat pamestu mājdzīvnieku?
            </h3>
            <div class="content">
                <p>Sazinieties ar vietējo dzīvnieku patversmi vai pašvaldību. Mēģiniet nodrošināt dzīvniekam pagaidu drošību. Nekavējoties informējiet kompetentas iestādes.</p>
            </div>
        </div>
    </div>
</section>

           <!-- Puzzle Section -->
<section id="puzzle">
    <h2>Saliec puzli!</h2>
    <div id="puzzle-container">
        <img src="puzzle.jpg" alt="Puzzle Guideline" class="puzzle-guideline">
        <!-- Puzzle pieces will be dynamically loaded -->
    </div>
    <form id="result-form">
        <input type="text" id="user-name" placeholder="Ievadiet savu vārdu">
        <button type="button" id="save-result">Saglabāt rezultātu</button>
    </form>
</section>
             <!-- Leaderboard Section -->
        <section id="leaderboard">
            <h2>Labākie rezultāti</h2>
            <ul id="leaderboard-list">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row['user_name']) . ": " . htmlspecialchars($row['completion_time']) . " sekundes</li>";
                    }
                } else {
                    echo "<li>Nav pieejamu rezultātu</li>";
                }
                ?>
            </ul>
        </section>
    </div>

    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>

    <script src="script.js"></script> <!-- Updated Path -->
</body>
</html>