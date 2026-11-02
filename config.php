<?php
/**
 * config.php
 * ទិន្នន័យគំរូ (mock data) សម្រាប់ផ្ទាំងគ្រប់គ្រង Restaurant Management System
 * នៅពេលភ្ជាប់ជាមួយ database ពិត សូមជំនួសអារេទាំងនេះដោយលទ្ធផល query
 */

date_default_timezone_set('Asia/Phnom_Penh');

// ព័ត៌មានសង្ខេបខាងលើ (Summary cards)
$summaryCards = [
    ['label' => 'Total Menu Items',   'sub' => 'Items',        'value' => 120, 'icon' => 'fa-utensils',        'color' => '#3b82f6'],
    ['label' => 'Total Categories',   'sub' => 'Categories',   'value' => 12,  'icon' => 'fa-list',             'color' => '#22c55e'],
    ['label' => 'Total Customers',    'sub' => 'Customers',    'value' => 568, 'icon' => 'fa-user-friends',     'color' => '#8b5cf6'],
    ['label' => "Today's Orders",     'sub' => 'Orders',       'value' => 42,  'icon' => 'fa-receipt',          'color' => '#f97316'],
    ['label' => "Today's Reservations",'sub' => 'Reservations','value' => 18,  'icon' => 'fa-calendar-check',   'color' => '#ec4899'],
    ['label' => 'Available Tables',   'sub' => 'Tables',       'value' => 15,  'icon' => 'fa-chair',            'color' => '#06b6d4'],
];

// ចំណូល
$revenueCards = [
    ['label' => "Today's Revenue",   'value' => 1320.00,  'growth' => '+12.5% vs yesterday', 'icon' => 'fa-dollar-sign', 'color' => '#22c55e'],
    ['label' => 'Monthly Revenue',   'value' => 24500.00, 'growth' => '+18.7% vs last month', 'icon' => 'fa-wallet',      'color' => '#3b82f6'],
];

// តុកំពុងប្រើប្រាស់ (Occupied tables donut)
$tableStatus = [
    'total'    => 25,
    'occupied' => 10,
    'segments' => [
        ['label' => 'Available', 'value' => 15, 'color' => '#22c55e'],
        ['label' => 'Occupied',  'value' => 10, 'color' => '#f97316'],
        ['label' => 'Reserved',  'value' => 3,  'color' => '#3b82f6'],
        ['label' => 'Cleaning',  'value' => 2,  'color' => '#94a3b8'],
    ],
];

// ចំណូលប្រចាំថ្ងៃ (Daily revenue line chart) - ម៉ោង -> ចំណូល
$dailyRevenue = [
    'labels' => ['12 AM','3 AM','6 AM','9 AM','12 PM','3 PM','6 PM','9 PM'],
    'data'   => [150, 90, 60, 420, 980, 1320, 700, 300],
    'peak'   => ['label' => '$1,320', 'time' => '2:00 PM'],
];

// ចំណូលប្រចាំខែ (Monthly revenue bar chart)
$monthlyRevenue = [
    'labels' => ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    'data'   => [12000, 14500, 13800, 24500, 15200, 16800, 17400, 15600, 16200, 17800, 16500, 18200],
    'highlight' => 3, // index for April (0-based)
];

// ស្ថានភាពការកម្ម៉ង់ (Order status donut)
$orderStatus = [
    'total' => 42,
    'segments' => [
        ['label' => 'Pending',   'value' => 10, 'color' => '#f97316'],
        ['label' => 'Preparing', 'value' => 15, 'color' => '#8b5cf6'],
        ['label' => 'Ready',     'value' => 8,  'color' => '#3b82f6'],
        ['label' => 'Served',    'value' => 7,  'color' => '#22c55e'],
        ['label' => 'Completed', 'value' => 2,  'color' => '#06b6d4'],
        ['label' => 'Cancelled', 'value' => 0,  'color' => '#ef4444'],
    ],
];

// បញ្ជីការកម្ម៉ង់ថ្មីៗ (Recent orders table)
$recentOrders = [
    ['order' => '#ORD-00045', 'table' => 'Table 05', 'customer' => 'John Doe',    'items' => 2, 'amount' => 25.00, 'status' => 'Preparing', 'time' => '3 min ago'],
    ['order' => '#ORD-00044', 'table' => 'Table 02', 'customer' => 'Mery Jane',   'items' => 3, 'amount' => 32.50, 'status' => 'Pending',   'time' => '15 min ago'],
    ['order' => '#ORD-00043', 'table' => 'Table 01', 'customer' => 'David Smith','items' => 1, 'amount' => 18.00, 'status' => 'Ready',     'time' => '25 min ago'],
    ['order' => '#ORD-00042', 'table' => 'Table 03', 'customer' => 'Sophia Brown','items' => 4, 'amount' => 45.00, 'status' => 'Served',    'time' => '35 min ago'],
    ['order' => '#ORD-00041', 'table' => 'Table 07', 'customer' => 'Michael Lee','items' => 1, 'amount' => 12.00, 'status' => 'Completed', 'time' => '1 hour ago'],
];

// ម្ហូបលក់ដាច់បំផុត (Best selling menu)
$bestSellingMenu = [
    ['name' => 'Fried Rice',    'orders' => 120, 'revenue' => 240.00],
    ['name' => 'Grilled Chicken','orders' => 98,  'revenue' => 196.00],
    ['name' => 'Beef Steak',    'orders' => 75,  'revenue' => 187.50],
    ['name' => 'Caesar Salad',  'orders' => 64,  'revenue' => 128.00],
    ['name' => 'Spaghetti',     'orders' => 60,  'revenue' => 120.00],
];

// ម៉ឺនុយផ្នែកម្ខាង (Sidebar menu)
$sidebarMenu = [
    ['label' => 'Dashboard',       'icon' => 'fa-th-large',      'href' => 'index.php',       'active' => true],
    ['label' => 'User Management', 'icon' => 'fa-users-cog',     'href' => '#'],
    ['label' => 'Categories',      'icon' => 'fa-layer-group',   'href' => '#'],
    ['label' => 'Menu',            'icon' => 'fa-book-open',     'href' => '#'],
    ['label' => 'Tables',          'icon' => 'fa-chair',         'href' => '#'],
    ['label' => 'Customers',       'icon' => 'fa-user-friends',  'href' => '#'],
    ['label' => 'Reservations',    'icon' => 'fa-calendar-alt',  'href' => '#'],
    ['label' => 'Orders',          'icon' => 'fa-receipt',       'href' => '#'],
    ['label' => 'Kitchen',         'icon' => 'fa-fire',          'href' => '#'],
    ['label' => 'Billing',         'icon' => 'fa-file-invoice-dollar', 'href' => '#'],
    ['label' => 'Inventory',       'icon' => 'fa-boxes',         'href' => '#'],
    ['label' => 'Suppliers',       'icon' => 'fa-truck',         'href' => '#'],
    ['label' => 'Reports',         'icon' => 'fa-chart-line',    'href' => '#'],
    ['label' => 'Settings',        'icon' => 'fa-cog',           'href' => '#'],
];

/** Helper: បំលែងលេខទៅជាទ្រង់ទ្រាយលុយ */
function money($num) {
    return '$' . number_format($num, 2);
}

/** Helper: ពណ៌ badge តាមស្ថានភាព */
function statusColor($status) {
    $map = [
        'Pending'   => ['bg' => '#fff7ed', 'text' => '#f97316'],
        'Preparing' => ['bg' => '#eef2ff', 'text' => '#6366f1'],
        'Ready'     => ['bg' => '#eff6ff', 'text' => '#3b82f6'],
        'Served'    => ['bg' => '#f0fdf4', 'text' => '#22c55e'],
        'Completed' => ['bg' => '#ecfeff', 'text' => '#06b6d4'],
        'Cancelled' => ['bg' => '#fef2f2', 'text' => '#ef4444'],
    ];
    return $map[$status] ?? ['bg' => '#f1f5f9', 'text' => '#64748b'];
}
