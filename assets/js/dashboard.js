// ===== Sidebar toggle (mobile) =====
document.getElementById('menuToggle')?.addEventListener('click', () => {
    document.querySelector('.sidebar').classList.toggle('open');
});

// ===== Daily Revenue: Line chart =====
const dailyCtx = document.getElementById('dailyRevenueChart');
if (dailyCtx) {
    const gradient = dailyCtx.getContext('2d').createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, 'rgba(59,130,246,0.25)');
    gradient.addColorStop(1, 'rgba(59,130,246,0)');

    new Chart(dailyCtx, {
        type: 'line',
        data: {
            labels: dailyLabels,
            datasets: [{
                data: dailyData,
                borderColor: '#3b82f6',
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#3b82f6',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { ticks: { callback: v => '$' + v }, grid: { color: '#f1f3f9' } },
                x: { grid: { display: false } }
            }
        }
    });
}

// ===== Monthly Revenue: Bar chart =====
const monthlyCtx = document.getElementById('monthlyRevenueChart');
if (monthlyCtx) {
    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                data: monthlyData,
                backgroundColor: monthlyLabels.map((_, i) => i === monthlyHighlight ? '#22c55e' : '#bbf7d0'),
                borderRadius: 6,
                maxBarThickness: 22,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { ticks: { callback: v => '$' + (v / 1000) + 'k' }, grid: { color: '#f1f3f9' } },
                x: { grid: { display: false } }
            }
        }
    });
}
