<?php
// pivot_table_calculator_submit.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Pivot Table Ratio Calculator</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f3f3;
    }
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 25px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 12px;
    }
    input[type="number"] {
        width: 90%;
        padding: 6px;
        font-size: 16px;
        text-align: right;
    }
    .btn-wrap {
        text-align: center;
        margin-top: 20px;
    }
    button {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 10px;
    }
    button:hover {
        background: #0056b3;
    }
</style>
</head>
<body>
<div class="container">
    <h1>ผู้ใช้กรอกได้ 1 ช่อง</h1>

    <!-- Pivot Table Layout: headers across the top, inputs beneath -->
    <table>
        <thead>
            <tr>
                <th>100</th>
                <th>7</th>
                <th>107</th>
                <th>3</th>
                <th>104</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="number" step="any" id="f1"></td>
                <td><input type="number" step="any" id="f2"></td>
                <td><input type="number" step="any" id="f3"></td>
                <td><input type="number" step="any" id="f4"></td>
                <td><input type="number" step="any" id="f5"></td>
            </tr>
        </tbody>
    </table>

    <div class="btn-wrap">
        <button type="button" onclick="calculate()">Go</button>
        <button type="button" onclick="clearAll()">Clear</button>
    </div>
</div>

<script>
// ---- Ratios relative to Field 1 (edit as needed) ----
const ratios = {
    f1: 1,
    f2: 0.07,
    f3: 1.07,
    f4: 0.03,
    f5: 1.04
};

function calculate() {
    // Find which field has a value
    let filled = null;
    for (const key in ratios) {
        const val = document.getElementById(key).value;
        if (val !== '') {
            filled = key;
            break;
        }
    }
    if (!filled) {
        alert('Please enter a value in one field.');
        return;
    }

    const base = parseFloat(document.getElementById(filled).value) / ratios[filled];

    // Update all other fields
    for (const key in ratios) {
        if (key !== filled) {
            document.getElementById(key).value = (base * ratios[key]).toFixed(2);
        }
    }
}

function clearAll() {
    document.querySelectorAll('input[type="number"]').forEach(el => el.value = '');
}
</script>
</body>
</html>
