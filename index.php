<!DOCTYPE html>
<html>
<head>
    <title>Food Choice - JPaaS Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Media query for smartphones */
        @media (max-width: 480px) {
            form {
                max-width: 90%;
            }
        }

        .results {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Burger vs Pizza</h1>
    <div>
        <img src="burger.jpg" alt="Burger" width="200">
        <img src="pizza.jpg" alt="Pizza" width="200">
    </div>
   <form action="process_vote.php" method="post">
        <label for="voter_name">Your Name:</label>
        <input type="text" name="voter_name" required><br>

        <label for="candidate">Choose an Option:</label>
        <select name="candidate">
            <option value="Burger">Burger</option>
            <option value="Pizza">Pizza</option>
        </select><br>

        <input type="submit" value="Vote">
    </form>
    <div class="results">
        <h2>Results</h2>
        <?php
           <div class="results">
    <h2>Results</h2>
    <table>
        <tr>
            <th>Candidate</th>
            <th>Votes</th>
            <th>Percentage</th>
        </tr>
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
            // Query to count votes for each candidate
            $sql = "SELECT candidate, COUNT(*) AS vote_count FROM votes GROUP BY candidate";
            $stmt = $pdo->query($sql);
            $totalVotes = 0;

            while ($row = $stmt->fetch()) {
                $candidate = $row['candidate'];
                $voteCount = $row['vote_count'];
                $totalVotes += $voteCount;

                // Calculate the percentage
                $percentage = ($voteCount / $totalVotes) * 100;

                echo "<tr>";
                echo "<td>$candidate</td>";
                echo "<td>$voteCount</td>";
                echo "<td>$percentage%</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

        ?>
    </div>
</body>
</html>
