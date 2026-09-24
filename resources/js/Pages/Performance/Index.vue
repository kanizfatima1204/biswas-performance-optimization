<script setup>
import { Head } from '@inertiajs/vue3';
import { AlertTriangle, ArrowLeft, ArrowDownRight, ArrowUpRight, CheckCircle2, Monitor, Smartphone } from 'lucide-vue-next';

const props = defineProps({ metrics: { type: Array, default: () => [] } });
const groups = ['mobile', 'desktop'];
const rows = (device) => {
    const before = props.metrics.find((metric) => metric.device === device && metric.label === 'Before optimization');
    const after = props.metrics.find((metric) => metric.device === device && metric.label === 'After optimization');
    if (!before || !after) return [];

    return [
        { key: 'performance_score', label: 'Performance score', unit: '', higherIsBetter: true },
        { key: 'lcp_ms', label: 'LCP', unit: 'ms' },
        { key: 'fcp_ms', label: 'FCP', unit: 'ms' },
        { key: 'cls', label: 'CLS', unit: '' },
        { key: 'tbt_ms', label: 'TBT', unit: 'ms' },
        { key: 'ttfb_ms', label: 'TTFB', unit: 'ms' },
        { key: 'transfer_kb', label: 'Transfer', unit: 'KB' },
        { key: 'requests', label: 'Requests', unit: '' },
    ].map((definition) => {
        const beforeValue = Number(before[definition.key]);
        const afterValue = Number(after[definition.key]);
        const change = beforeValue === 0 ? null : Math.round(((afterValue - beforeValue) / Math.abs(beforeValue)) * 100);
        const improved = change === null ? null : definition.higherIsBetter ? change >= 0 : change <= 0;

        return { ...definition, beforeValue, afterValue, change, improved };
    });
};

const checks = [
    'Critical hero asset is preloaded and dimensioned',
    'Reusable lazy-image component supports responsive sources',
    'Vite builds split, fingerprinted production assets',
    'Application data and versioned assets are cached',
    'Responsive layouts support small screens',
    'Image sizes reserve space to reduce layout shift',
];
</script>

<template>
    <Head>
        <title>Performance audit | Biswas IT Firm</title>
        <meta name="description" content="Review mobile and desktop performance measurements for the Biswas IT Firm demo." />
    </Head>
    <div class="report-shell">
        <header class="report-header"><div class="wrap report-nav"><a href="/" class="report-home"><ArrowLeft :size="16" /> Back to Biswas IT</a><a href="/" class="wordmark"><span class="wordmark-symbol">b.</span><span>BISWAS <i>IT FIRM</i></span></a></div></header>
        <main class="wrap report-main">
            <div class="report-intro"><span class="section-kicker">TECHNICAL AUDIT <span class="eyebrow-divider">/</span> BEFORE &amp; AFTER</span><h1>Measure what <span class="text-gradient">got better.</span></h1><p>Compare repeatable Lighthouse runs on mobile and desktop. Keep the same URL, browser, Lighthouse version, and test conditions for both measurements.</p><div class="report-source-note"><AlertTriangle :size="15" /><span>The seeded figures below are illustrative placeholders, not measured Lighthouse results. Replace them with your own runs before presenting this page as performance evidence.</span></div></div>

            <div class="report-grid">
                <section v-for="device in groups" :key="device" class="report-card">
                    <div class="report-card-head"><div class="report-device"><Smartphone v-if="device === 'mobile'" :size="17" /><Monitor v-else :size="17" />{{ device }} results</div><span class="demo-pill">Illustrative data</span></div>
                    <div v-if="rows(device).length" class="report-table-wrap"><table class="report-table"><thead><tr><th>Metric</th><th>Before</th><th>After</th><th>Change</th></tr></thead><tbody><tr v-for="row in rows(device)" :key="row.key"><td>{{ row.label }}</td><td class="metric">{{ row.beforeValue }}{{ row.unit ? ` ${row.unit}` : '' }}</td><td class="metric">{{ row.afterValue }}{{ row.unit ? ` ${row.unit}` : '' }}</td><td><span v-if="row.change !== null" class="report-change" :class="row.improved ? 'improved' : 'declined'"><ArrowUpRight v-if="row.improved" :size="13" /><ArrowDownRight v-else :size="13" />{{ row.change > 0 ? '+' : '' }}{{ row.change }}%</span><span v-else>-</span></td></tr></tbody></table></div>
                    <p v-else class="report-empty">No complete before and after runs are recorded for this device yet.</p>
                </section>
            </div>

            <section class="report-panel"><h2>Changes in this demo</h2><div class="report-checks"><div v-for="item in checks" :key="item" class="report-check"><CheckCircle2 :size="14" />{{ item }}</div></div></section>
            <section class="report-panel"><h2>Record real results</h2><p class="report-command">Run the command once for each before/after and mobile/desktop measurement. Re-running a label/device pair updates the row. Include the test URL, date, Lighthouse version, and conditions in the notes.</p><p class="report-command"><code>php artisan performance:record "Before optimization" mobile SCORE LCP_MS FCP_MS CLS TBT_MS TTFB_MS TRANSFER_KB REQUESTS --notes="URL, date, version, conditions"</code></p><p class="report-command">Use <code>desktop</code> for desktop runs and change the label to <code>After optimization</code> for the second run. The change column is percentage change; performance score improves upward while the timing, CLS, transfer, and request metrics improve downward.</p></section>
        </main>
    </div>
</template>
