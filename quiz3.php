<?php
// ---------- Array Data ----------
$array1 = [
    ['code' => '101', 'name' => 'AAA'],
    ['code' => '102', 'name' => 'BBB'],
    ['code' => '103', 'name' => 'CCC'],
];

$array2 = [
    ['code' => '103', 'city' => 'Singapore'],
    ['code' => '102', 'city' => 'Tokyo'],
    ['code' => '101', 'city' => 'Bangkok'],
];

// ---------- Map Array2 by code for quick lookup ----------
$cityMap = [];
foreach ($array2 as $row) {
    $cityMap[$row['code']] = $row['city'];
}

// ---------- Merge arrays similar to Excel VLOOKUP ----------
$output = [];
foreach ($array1 as $row) {
    $code = $row['code'];
    $output[] = [
        'code' => $code,
        'name' => $row['name'],
        'city' => isset($cityMap[$code]) ? $cityMap[$code] : '' // empty if no match
    ];
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Array Mapping (VLOOKUP)</title></head>
<body>
<b>Array1</b>
<table border="1">
<thead>
<tr><th>Code</th><th>Name</th></tr>
</thead>
<tbody>
<?php foreach ($array1 as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['code']) ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<br><b>Array2</b>
<table border="1">
<thead>
<tr><th>Code</th><th>City</th></tr>
</thead>
<tbody>
<?php foreach ($array2 as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['code']) ?></td>
    <td><?= htmlspecialchars($row['city']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<br><hr><br>
<b>Output</b>
<table border="1">
<thead>
<tr><th>Code</th><th>Name</th><th>City</th></tr>
</thead>
<tbody>
<?php foreach ($output as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['code']) ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['city']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</body>
</html>
