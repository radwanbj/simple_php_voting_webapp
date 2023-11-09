<!DOCTYPE html>
<html>
<head>
    <title>Food Choice - JPaaS Demo</title>
</head>
<body>
    <h1>Burger vs Pizza</h1>
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
</body>
</html>
