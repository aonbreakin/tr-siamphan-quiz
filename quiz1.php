<?php
// triangle.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num = intval($_POST['number']);

    if ($num <= 0) {
        $output = "<p>Please enter a positive integer.</p>";
    } else {
        $output = "<pre>";
        if ($num % 2 === 0) {
            // Even number: head-up triangle
            for ($i = 1; $i <= $num; $i++) {
                $output .= str_repeat("*", $i) . "\n";
            }
        } else {
            // Odd number: upside-down triangle
            for ($i = $num; $i >= 1; $i--) {
                $output .= str_repeat("*", $i) . "\n";
            }
        }
        $output .= "</pre>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Triangle Generator</title>
</head>
<body>
    <h1>Triangle of *</h1>
    <form method="post">
        <label>Enter an integer:</label>
        <input type="number" name="number" required>
        <button type="submit">Generate</button>
    </form>
    <?php if (!empty($output)) echo $output; ?>
</body>
</html>
