<!DOCTYPE html>
<html>
<head>
    <title>JPaaS Demo - US Election Vote</title>
</head>
<body>
    <h1>Vote for the US Election 2024</h1>
    <form action="process_vote.php" method="post">
        <label for="voter_name">Your Name:</label>
        <input type="text" name="voter_name" required><br>

        <label for="candidate">Choose a Candidate:</label>
        <select name="candidate">
            <option value="Joe Biden">Joe Biden</option>
            <option value="Donald Trump">Donald Trump</option>
            <option value="New Candidate">New Candidate</option>
        </select><br>

        <input type="submit" value="Vote">
    </form>
</body>
</html>
