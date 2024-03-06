<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="phpstyles.css">
</head>
<body>
    <form>
    <header class="title-bar">
        <h1>Keywords and Abilities</h1>
    </header>
    <nav class="navbar">
        <a href="index.html">Home</a>
        <a href="page2.html">How To Play</a>
        <a href="page3.html">Basic Deckbuilding</a>
        <a href="page4.php">Keywords and Abilities</a>
        <!--<a href="test.html">Test Page for Assignments</a>-->
    </nav>
    <div class="sidebar">
        <ul>
        <h3 class="sidebar-heading">Links</h3>
        <p class="sidebar-text">Download MTG Arena today:<a target="_blank" href="https://play.google.com/store/apps/details?id=com.wizards.mtga&hl=en_IE&gl=DE">
            <u class="side-links">Android</u></a><a target="_blank" href="https://apps.apple.com/us/app/magic-the-gathering-arena/id1496227521"><u class="side-links">iOS</u></a>
            <a target="_blank" href="https://store.steampowered.com/app/2141910/Magic_The_Gathering_Arena/"><u class="side-links">Steam</u></a></p>
        <p class="sidebar-text">Learn even more beyond this website, and further your knowledge even more:<a href="https://magic.wizards.com/en/formats" target="_blank">
            <u class="side-links">Official Formats and How To Play</u></a></p>
        <p class="sidebar-text">Get in depth info on all the keywords and abilities on cards and creatures:<a href="https://magic.wizards.com/en/keyword-glossary" target="_blank">
            <u class="side-links">Keyword Glossary</u></a></p>
        <p class="sidebar-text">Get the latest news and info about all things Magic:<a href="https://magic.wizards.com/en/news" target="_blank">
            <u class="side-links">News</u></a></p>
        </ul>
    </div>
    <main class="content">
    <?php
        echo "<h2 class='errorMessage'>Welcome to the Keyword and Ability Search Tool</h2>";
        echo "<p class='errorMessage'>Search for abilities, keywords and more by using the searchbox below. (Ignore the warning below, if opening page for first)</p>";
    ?>

    <input type="text" name="q" placeholder="Search for keywords/abilities..." id="search">
    <button type="submit" id="submit">Search</button>
    </main>
    <?php
        $searchTerm = strtolower($_GET['q']);  

        $info = file_get_contents('info/keywordsAbilities.txt');
        $infoArray = explode("\n", $info);
        
        $foundMatches = false;
        if ($searchTerm) {
            echo "<h2 id='resultHeader'>Search Results for: $searchTerm</h2>";
            foreach ($infoArray as $card) {
                if (strpos(strtolower($card), $searchTerm) !== false) { 
                    echo "<span class='cardResult'>";
                    echo $card;
                    echo "</span><br>";
                    $foundMatches = true;
                }
            }
            if (!$foundMatches) {
                echo "<span class='errorMessage'>No keywords or abilities found matching your search.</span>";
            }
        }
    ?>
    <footer>
        <p id="phpFooter">&copy;2024 williamodavis</p>
    </footer>
</form>
</body>
</html>
