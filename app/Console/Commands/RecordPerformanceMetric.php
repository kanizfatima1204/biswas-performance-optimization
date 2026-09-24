<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\PerformanceMetric;
class RecordPerformanceMetric extends Command
{
    protected $signature = 'performance:record
        {label : Before optimization or After optimization}
        {device : mobile or desktop}
        {score : Lighthouse performance score from 0 to 100}
        {lcp_ms : Largest Contentful Paint in milliseconds}
        {fcp_ms : First Contentful Paint in milliseconds}
        {cls : Cumulative Layout Shift score}
        {tbt_ms : Total Blocking Time in milliseconds}
        {ttfb_ms : Time to First Byte in milliseconds}
        {transfer_kb : Transferred page size in kilobytes}
        {requests : Number of network requests}
        {--notes= : URL, date, Lighthouse version, and test conditions}';

    protected $description = 'Record a measured Lighthouse performance result';

    public function handle(): int
    {
        $device = $this->argument('device');
        $score = filter_var($this->argument('score'), FILTER_VALIDATE_INT);

        if (! in_array($device, ['mobile', 'desktop'], true)) {
            $this->error('Device must be mobile or desktop.');
            return self::INVALID;
        }

        if ($score === false || $score < 0 || $score > 100) {
            $this->error('Performance score must be an integer from 0 to 100.');
            return self::INVALID;
        }

        foreach (['lcp_ms', 'fcp_ms', 'tbt_ms', 'ttfb_ms', 'transfer_kb', 'requests'] as $field) {
            if (filter_var($this->argument($field), FILTER_VALIDATE_INT) === false || (int) $this->argument($field) < 0) {
                $this->error("{$field} must be a non-negative integer.");
                return self::INVALID;
            }
        }

        if (! is_numeric($this->argument('cls')) || (float) $this->argument('cls') < 0) {
            $this->error('CLS must be a non-negative number.');
            return self::INVALID;
        }

        if (! in_array($this->argument('label'), ['Before optimization', 'After optimization'], true)) {
            $this->error('Label must be Before optimization or After optimization.');
            return self::INVALID;
        }

        PerformanceMetric::updateOrCreate(
            ['label' => $this->argument('label'), 'device' => $device],
            [
                'performance_score' => $score,
                'lcp_ms' => (int) $this->argument('lcp_ms'),
                'fcp_ms' => (int) $this->argument('fcp_ms'),
                'cls' => (float) $this->argument('cls'),
                'tbt_ms' => (int) $this->argument('tbt_ms'),
                'ttfb_ms' => (int) $this->argument('ttfb_ms'),
                'transfer_kb' => (int) $this->argument('transfer_kb'),
                'requests' => (int) $this->argument('requests'),
                'notes' => $this->option('notes'),
            ]
        );

        $this->info('Performance metric saved.');
        return self::SUCCESS;
    }
}
