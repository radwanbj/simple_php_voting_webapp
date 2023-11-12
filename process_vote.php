<?php
// Database configuration
$db_host = 'node6478-taqnya-expo-demo.fin.libyanspider.cloud';
$db_user = 'root';
$db_password = 'VEGqcb43669';
$db_name = 'election';


// Connect to the database
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_name = $_POST['voter_name'];
    $candidate = $_POST['candidate'];

    try {
        $sql = "INSERT INTO votes (voter_name, candidate) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$voter_name, $candidate]);
        // echo "Vote recorded successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_name = $_POST['voter_name'];
    $candidate = $_POST['candidate'];

    try {
        $sql = "INSERT INTO votes (voter_name, candidate) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$voter_name, $candidate]);
        echo "Vote recorded successfully!<br>";

        // Count the votes for each candidate
        $sql = "SELECT candidate, COUNT(*) AS vote_count FROM votes GROUP BY candidate";
        $stmt = $pdo->query($sql);
        $totalVotes = 0;

        while ($row = $stmt->fetch()) {
            $candidate = $row['candidate'];
            $voteCount = $row['vote_count'];
            $totalVotes += $voteCount;
            echo "$candidate received $voteCount votes<br>";
        }

        // Calculate and display the percentage
        if ($totalVotes > 0) {
            $burgerPercentage = ($voteCount / $totalVotes) * 100;
            $pizzaPercentage = (100 - $burgerPercentage);
            echo "Burger: $burgerPercentage%<br>";
            echo "Pizza: $pizzaPercentage%";
        } else {
            echo "No votes recorded yet.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
// Close the database connection (PDO does this automatically when the script ends).
?>
