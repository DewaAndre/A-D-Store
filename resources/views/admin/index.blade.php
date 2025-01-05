<x-layouts>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold my-4">Checkout Statistik Bulanan</h1>
        <div class="flex justify-between items-start">
            <!-- Pie Chart -->
            <div class="bg-white shadow-md rounded-lg p-4 mt-5 max-w-[500px] h-auto m-4">
                <div class="flex justify-center items-center">
                    <canvas id="pieChart" class="h-[500px]"></canvas>
                </div>
            </div>
            
            <!-- Column Chart -->
            <div class="bg-white shadow-md rounded-lg p-4 mt-5 w-full max-w-[600px] h-auto">
                <div class="flex justify-center items-center">
                    <canvas id="checkoutChart" class="w-full h-[300px]"></canvas>
                </div>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Column Chart (formerly Line Chart)
        const ctx = document.getElementById('checkoutChart').getContext('2d');
        const checkoutChart = new Chart(ctx, {
            type: 'bar', // Mengubah dari 'line' ke 'bar' untuk Column Chart
            data: {
                labels: @json($months->map(fn($m) => DateTime::createFromFormat('!m', $m)->format('F'))),
                datasets: [{
                    label: 'Jumlah Checkout',
                    data: @json($totals),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie', // Jenis chart pie
            data: {
                labels: @json($months->map(fn($m) => DateTime::createFromFormat('!m', $m)->format('F'))),
                datasets: [{
                    label: 'Distribusi Checkout',
                    data: @json($totals), // Data yang sama digunakan untuk pie chart
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</x-layouts>
