<div class="leads-chart">
    <div class="leads-header">
        <h2>Total Leads by Day</h2>
        <div class="leads-filters">
            <select class="filter-select">
                <option>Canada</option>
                <option>USA</option>
                <option>UK</option>
            </select>
            <select class="filter-select">
                <option>This month</option>
                <option>Last month</option>
                <option>Last 3 months</option>
            </select>
        </div>
    </div>
    
    <div class="chart-container">
        <?php foreach ($leadsData as $index => $value): ?>
        <div class="chart-bar" style="height: <?php echo $value * 2; ?>px;"></div>
        <?php endforeach; ?>
    </div>
    
    <div class="chart-labels">
        <span>1 May</span>
        <span>5 May</span>
        <span>10 May</span>
        <span>15 May</span>
        <span>20 May</span>
        <span>25 May</span>
        <span>31 May</span>
    </div>
    
    <div class="leads-total">
        <span><?php echo $dashboardData['totalLeads']; ?> leads</span>
    </div>
</div>
