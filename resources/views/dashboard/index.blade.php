@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Sales Comparison - Current Year vs. Previous Year</h2>

        <!-- Chart Container -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <script>
        // Data passed from the controller
        const salesCurrentYear = @json($salesCurrentYear);
        const salesPreviousYear = @json($salesPreviousYear);

        // Chart.js configuration
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',  // Chart type (line, bar, etc.)
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],  // Labels for months
                datasets: [{
                    label: 'Current Year Sales',
                    data: salesCurrentYear,  // Data from the controller
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Previous Year Sales',
                    data: salesPreviousYear,  // Data from the controller
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return '$' + tooltipItem.raw.toFixed(2);  // Format sales numbers
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            beginAtZero: true
                        },
                        title: {
                            display: true,
                            text: 'Sales ($)'
                        }
                    }
                }
            }
        });
    </script>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <!-- Sales Overview Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Sales Overview</h3>
            <ul>
                <li class="flex justify-between py-2">
                    <span>Current Month Sales</span>
                    <span class="font-semibold text-green-500">{{ number_format($currentMonthSales, 2) }} USD</span>
                </li>
                <li class="flex justify-between py-2">
                    <span>Previous Month Sales</span>
                    <span class="font-semibold text-red-500">{{ number_format($previousMonthSales, 2) }} USD</span>
                </li>
                <li class="flex justify-between py-2">
                    <span>Current Year Sales</span>
                    <span class="font-semibold text-green-500">{{ number_format($currentYearSales, 2) }} USD</span>
                </li>
                <li class="flex justify-between py-2">
                    <span>Previous Year Sales</span>
                    <span class="font-semibold text-red-500">{{ number_format($previousYearSales, 2) }} USD</span>
                </li>
            </ul>
        </div>

        <!-- Sales Comparison Chart -->
        <div class="bg-white shadow-md rounded-lg p-6 col-span-2">
            <h3 class="text-xl font-semibold mb-4">Sales Comparison</h3>
            <canvas id="salesComparisonChart"></canvas>
        </div>

    </div>

    <!-- New Orders Section -->
    <div class="bg-white shadow-md rounded-lg p-6 mt-8">
        <h3 class="text-xl font-semibold mb-4">New Orders</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Order ID</th>
                    <th class="px-4 py-2 text-left">Customer</th>
                    <th class="px-4 py-2 text-left">Amount</th>
                    <th class="px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newOrders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->customer->name }}</td>
                        <td class="border px-4 py-2">{{ number_format($order->total_amount, 2) }} USD</td>
                        <td class="border px-4 py-2 text-red-500">{{ ucfirst($order->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    // Sales Comparison Chart
    var ctx = document.getElementById('salesComparisonChart').getContext('2d');
    var salesComparisonChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Current Year Sales',
                data: @json($currentYearSales),
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
            }, {
                label: 'Previous Year Sales',
                data: @json($previousYearSales),
                borderColor: 'rgba(255, 99, 132, 1)',
                fill: false,
            }]
        }
    });
</script>

@endsection --}}