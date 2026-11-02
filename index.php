<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="km">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | Restaurant Management System</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="layout">

    <?php include __DIR__ . '/includes/sidebar.php'; ?>

    <div class="main">
        <?php include __DIR__ . '/includes/header.php'; ?>

        <div class="content">

            <!-- ១. កាតសង្ខេប (Summary cards) -->
            <div class="grid grid-6" style="margin-bottom:18px;">
                <?php foreach ($summaryCards as $c): ?>
                    <div class="card stat-card">
                        <div class="stat-top">
                            <div class="stat-icon" style="background:<?= $c['color'] ?>">
                                <i class="fa-solid <?= $c['icon'] ?>"></i>
                            </div>
                            <div>
                                <div class="stat-label"><?= htmlspecialchars($c['label']) ?></div>
                                <div class="stat-value"><?= $c['value'] ?></div>
                            </div>
                        </div>
                        <div class="stat-link">
                            <span><?= htmlspecialchars($c['sub']) ?></span>
                            <span>View all <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- ២. ចំណូល និង តុកំពុងប្រើ -->
            <div class="grid grid-3" style="margin-bottom:18px;">
                <?php foreach ($revenueCards as $r): ?>
                    <div class="card revenue-card">
                        <div class="stat-icon" style="background:<?= $r['color'] ?>">
                            <i class="fa-solid <?= $r['icon'] ?>"></i>
                        </div>
                        <div class="revenue-body">
                            <span class="revenue-label"><?= htmlspecialchars($r['label']) ?></span>
                            <span class="revenue-value"><?= money($r['value']) ?></span>
                            <span class="revenue-growth"><i class="fa-solid fa-arrow-trend-up"></i> <?= htmlspecialchars($r['growth']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="card occupied-card">
                    <div class="occupied-info">
                        <div class="stat-icon" style="background:#6366f1;"><i class="fa-solid fa-chair"></i></div>
                        <div class="revenue-body">
                            <span class="revenue-label">Occupied Tables</span>
                            <span class="revenue-value"><?= $tableStatus['occupied'] ?></span>
                            <span class="revenue-growth" style="color:var(--muted);">Occupied</span>
                        </div>
                    </div>
                    <?php
                        // ស្មើតម្លៃដុនណត់ (build conic-gradient string)
                        $offset = 0; $stops = [];
                        foreach ($tableStatus['segments'] as $seg) {
                            $pct = $seg['value'] / $tableStatus['total'] * 100;
                            $stops[] = "{$seg['color']} {$offset}% " . ($offset + $pct) . "%";
                            $offset += $pct;
                        }
                        $gradient = implode(', ', $stops);
                    ?>
                    <div class="donut-wrap">
                        <div style="width:70px;height:70px;border-radius:50%;
                            background:conic-gradient(<?= $gradient ?>);
                            display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <div style="width:42px;height:42px;border-radius:50%;background:#fff;
                                display:flex;flex-direction:column;align-items:center;justify-content:center;">
                                <strong style="font-size:13px;"><?= $tableStatus['total'] ?></strong>
                                <span style="font-size:8px;color:var(--muted);">Total</span>
                            </div>
                        </div>
                        <div class="donut-legend">
                            <?php foreach ($tableStatus['segments'] as $seg): ?>
                                <div class="legend-row">
                                    <span class="legend-dot" style="background:<?= $seg['color'] ?>"></span>
                                    <strong><?= $seg['value'] ?></strong> <?= htmlspecialchars($seg['label']) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ៣. ក្រាហ្វ (Charts) -->
            <div class="grid grid-2-1" style="margin-bottom:18px;">
                <div class="card chart-card">
                    <div class="card-head">
                        <h3>Daily Revenue Overview</h3>
                        <select><option>Today</option><option>Yesterday</option></select>
                    </div>
                    <canvas id="dailyRevenueChart" height="180"></canvas>
                </div>

                <div class="card chart-card">
                    <div class="card-head">
                        <h3>Monthly Revenue Overview</h3>
                        <select><option>This Year</option><option>Last Year</option></select>
                    </div>
                    <canvas id="monthlyRevenueChart" height="180"></canvas>
                </div>

                <div class="card chart-card">
                    <div class="card-head">
                        <h3>Order Status Overview</h3>
                    </div>
                    <?php
                        $offset2 = 0; $stops2 = [];
                        foreach ($orderStatus['segments'] as $seg) {
                            if ($seg['value'] == 0) continue;
                            $pct = $seg['value'] / $orderStatus['total'] * 100;
                            $stops2[] = "{$seg['color']} {$offset2}% " . ($offset2 + $pct) . "%";
                            $offset2 += $pct;
                        }
                        $gradient2 = implode(', ', $stops2);
                    ?>
                    <div class="donut-wrap">
                        <div style="width:90px;height:90px;border-radius:50%;
                            background:conic-gradient(<?= $gradient2 ?>);
                            display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <div style="width:56px;height:56px;border-radius:50%;background:#fff;
                                display:flex;flex-direction:column;align-items:center;justify-content:center;">
                                <strong style="font-size:16px;"><?= $orderStatus['total'] ?></strong>
                                <span style="font-size:9px;color:var(--muted);">Total Orders</span>
                            </div>
                        </div>
                        <div class="donut-legend">
                            <?php foreach ($orderStatus['segments'] as $seg): ?>
                                <div class="legend-row">
                                    <span class="legend-dot" style="background:<?= $seg['color'] ?>"></span>
                                    <strong><?= $seg['value'] ?></strong> <?= htmlspecialchars($seg['label']) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ៤. តារាង និង សកម្មភាពរហ័ស -->
            <div class="grid bottom-row">
                <div class="card">
                    <div class="card-head">
                        <h3>Recent Orders</h3>
                        <a href="#" class="link">View all</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order No.</th><th>Table</th><th>Customer</th>
                                <th>Items</th><th>Amount</th><th>Status</th><th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($recentOrders as $o): $sc = statusColor($o['status']); ?>
                            <tr>
                                <td><?= htmlspecialchars($o['order']) ?></td>
                                <td><?= htmlspecialchars($o['table']) ?></td>
                                <td><?= htmlspecialchars($o['customer']) ?></td>
                                <td><?= $o['items'] ?></td>
                                <td><?= money($o['amount']) ?></td>
                                <td><span class="badge" style="background:<?= $sc['bg'] ?>;color:<?= $sc['text'] ?>;"><?= htmlspecialchars($o['status']) ?></span></td>
                                <td style="color:var(--muted);"><?= htmlspecialchars($o['time']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card">
                    <div class="card-head">
                        <h3>Best Selling Menu</h3>
                        <a href="#" class="link">View all</a>
                    </div>
                    <table>
                        <thead>
                            <tr><th>#</th><th>Menu</th><th>Orders</th><th>Revenue</th></tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bestSellingMenu as $i => $m): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td>
                                    <div class="order-item">
                                        <span class="food-thumb"><i class="fa-solid fa-bowl-food"></i></span>
                                        <?= htmlspecialchars($m['name']) ?>
                                    </div>
                                </td>
                                <td><?= $m['orders'] ?></td>
                                <td><?= money($m['revenue']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card">
                    <div class="card-head"><h3>Quick Actions</h3></div>
                    <div class="quick-actions">
                        <div class="quick-action"><i class="fa-solid fa-plus" style="color:#3b82f6;"></i>New Order</div>
                        <div class="quick-action"><i class="fa-solid fa-calendar-plus" style="color:#f97316;"></i>New Reservation</div>
                        <div class="quick-action"><i class="fa-solid fa-bowl-food" style="color:#22c55e;"></i>Add Menu</div>
                        <div class="quick-action"><i class="fa-solid fa-chair" style="color:#ec4899;"></i>Add Table</div>
                        <div class="quick-action"><i class="fa-solid fa-user-plus" style="color:#8b5cf6;"></i>Add Customer</div>
                        <div class="quick-action"><i class="fa-solid fa-file-lines" style="color:#06b6d4;"></i>Generate Report</div>
                    </div>
                </div>
            </div>

            <footer class="copyright">© <?= date('Y') ?> Restaurant Management System. All rights reserved.</footer>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.4/chart.umd.min.js"></script>
<script>
    // ទិន្នន័យត្រូវបានផ្ញើពី PHP ទៅ JavaScript
    const dailyLabels = <?= json_encode($dailyRevenue['labels']) ?>;
    const dailyData   = <?= json_encode($dailyRevenue['data']) ?>;
    const monthlyLabels = <?= json_encode($monthlyRevenue['labels']) ?>;
    const monthlyData   = <?= json_encode($monthlyRevenue['data']) ?>;
    const monthlyHighlight = <?= json_encode($monthlyRevenue['highlight']) ?>;
</script>
<script src="assets/js/dashboard.js"></script>
</body>
</html>
