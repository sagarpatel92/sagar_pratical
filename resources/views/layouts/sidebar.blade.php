<!-- Sidebar -->
<div class="w-64 bg-gray-800 text-white p-6">
    <h2 class="text-2xl font-semibold text-center mb-8">Admin Dashboard</h2>
    <ul>
        <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 {{ request()->is('dashboard') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Dashboard</a></li>
        <li><a href="{{ route('dashboard.sales') }}" class="block py-2 px-4 {{ request()->is('dashboard/sales') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Sales Overview</a></li>
        <li><a href="{{ route('dashboard.sales.comparison') }}" class="block py-2 px-4 {{ request()->is('dashboard/sales-comparison') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Sales Comparison</a></li>
        <li><a href="{{ route('dashboard.new_orders') }}" class="block py-2 px-4 {{ request()->is('dashboard/new-orders') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">New Orders</a></li>
        <li><a href="{{ route('dashboard.top_selling_products') }}" class="block py-2 px-4 {{ request()->is('dashboard/top-selling-products') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Top Selling Products</a></li>
        <li><a href="{{ route('dashboard.top_users') }}" class="block py-2 px-4 {{ request()->is('dashboard/top-users') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Top Users</a></li>
        <li><a href="{{ route('dashboard.new_users') }}" class="block py-2 px-4 {{ request()->is('dashboard/new-users') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">New Users</a></li>
    </ul>
</div>

<!-- Sidebar -->
<div class="w-64 bg-gray-800 text-white p-6">
    <h2 class="text-2xl font-semibold text-center mb-8">Admin Dashboard</h2>
    <ul>
        <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 {{ request()->is('dashboard') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Dashboard</a></li>
        <li><a href="{{ route('dashboard.sales') }}" class="block py-2 px-4 {{ request()->is('dashboard/sales') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Sales Overview</a></li>
        <li><a href="{{ route('dashboard.sales.comparison') }}" class="block py-2 px-4 {{ request()->is('dashboard/sales-comparison') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Sales Comparison</a></li>
        <li><a href="{{ route('dashboard.new_orders') }}" class="block py-2 px-4 {{ request()->is('dashboard/new-orders') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">New Orders</a></li>
        <li><a href="{{ route('dashboard.top_selling_products') }}" class="block py-2 px-4 {{ request()->is('dashboard/top-selling-products') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Top Selling Products</a></li>
        <li><a href="{{ route('dashboard.top_users') }}" class="block py-2 px-4 {{ request()->is('dashboard/top-users') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">Top Users</a></li>
        <li><a href="{{ route('dashboard.new_users') }}" class="block py-2 px-4 {{ request()->is('dashboard/new-users') ? 'bg-gray-700' : 'text-gray-300 hover:bg-gray-700' }} rounded">New Users</a></li>
    </ul>
</div>

<!-- Sidebar Toggle Button (visible on mobile) -->
<div class="lg:hidden p-4">
    <button @click="sidebarOpen = !sidebarOpen" class="text-white">☰</button>
</div>

<!-- Sidebar -->
<div class="w-64 bg-gray-800 text-white p-6 fixed inset-0 lg:relative lg:block transition-all" :class="{'lg:w-64 w-48': sidebarOpen, 'lg:w-64': !sidebarOpen}">
    <h2 class="text-2xl font-semibold text-center mb-8">Admin Dashboard</h2>
    <ul>
        <!-- Sidebar links here -->
    </ul>
</div>