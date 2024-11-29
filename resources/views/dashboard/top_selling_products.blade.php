@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Top 10 Selling Products (Last 2 Years)</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Product Name</th>
                    <th class="px-4 py-2 text-left">Total Quantity Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topSellingProducts as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2">{{ $product->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
