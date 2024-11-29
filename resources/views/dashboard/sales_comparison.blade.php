@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Sales Comparison: Current Year vs Previous Year</h3>
        <canvas id="salesComparisonChart"></canvas>
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

@endsection
