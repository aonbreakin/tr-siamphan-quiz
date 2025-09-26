<!DOCTYPE html>
<html>
<head>
    <title>Bar & Pie Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>City Population Bar Chart</h2>
    <canvas id="barChart" width="600" height="400"></canvas>

    <h2>City Population Pie Chart</h2>
    <canvas id="pieChart" width="600" height="400"></canvas>

    <script>
        // Fetch data from API
        fetch("https://www.trcloud.co/test/api.php")
        .then(response => response.json())
        .then(data => {
            const cities = data.map(item => item.City);
            const populations = data.map(item => parseInt(item.Population));

            // Bar Chart
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                    labels: cities,
                    datasets: [{
                        label: 'Population',
                        data: populations,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // Pie Chart
            new Chart(document.getElementById("pieChart"), {
                type: 'pie',
                data: {
                    labels: cities,
                    datasets: [{
                        label: 'Population',
                        data: populations,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(199, 199, 199, 0.7)',
                            'rgba(83, 102, 255, 0.7)',
                            'rgba(255, 102, 255, 0.7)',
                            'rgba(102, 255, 102, 0.7)'
                        ]
                    }]
                }
            });
        })
        .catch(error => console.error("Error fetching data:", error));
    </script>
</body>
</html>
