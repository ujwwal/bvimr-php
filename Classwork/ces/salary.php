<!DOCTYPE html>
<html>
<head>
    <title>Employee Salary Calculation</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<?php
$employeeName = "Ujjwal Gupta";
$basicSalary = 50000;

// Calculations
$hra = 0.20 * $basicSalary;          // 20% of Basic Salary
$da = 0.10 * $basicSalary;           // 10% of Basic Salary
$grossSalary = $basicSalary + $hra + $da;
$taxDeduction = 0.10 * $grossSalary; // 10% tax on Gross Salary
$netSalary = $grossSalary - $taxDeduction;

// Associative array
$salaryDetails = array(
    "Employee Name" => $employeeName,
    "Basic Salary" => $basicSalary,
    "HRA" => $hra,
    "DA" => $da,
    "Gross Salary" => $grossSalary,
    "Tax Deduction" => $taxDeduction,
    "Net Salary" => $netSalary
);

// Display in HTML table
echo "<h2>Employee Salary Breakdown</h2>";
echo "<table>";
echo "<tr><th>Component</th><th>Value</th></tr>";

foreach ($salaryDetails as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}

echo "</table>";
?>

</body>
</html>