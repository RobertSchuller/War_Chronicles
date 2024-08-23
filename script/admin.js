document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: JSON.parse(document.getElementById('chartData').dataset.dates),
            datasets: [{
                label: 'New Users',
                data: JSON.parse(document.getElementById('chartData').dataset.counts),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'New Users'
                    },
                    beginAtZero: true
                }
            }
        }
    });
});
