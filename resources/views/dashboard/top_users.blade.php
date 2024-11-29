@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Top Users with the Most Orders</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Customer Name</th>
                    <th class="px-4 py-2 text-left">Total Orders</th>
                    <th class="px-4 py-2 text-left">Total Amount Spent</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topUsers as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->orders_count }}</td>
                        <td class="border px-4 py-2">{{ number_format($user->total_spent, 2) }} USD</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
