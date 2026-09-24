<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PerformanceMetric;
class DatabaseSeeder extends Seeder { public function run(): void {
  PerformanceMetric::query()->delete();
  PerformanceMetric::create(['label'=>'Before optimization','device'=>'mobile','performance_score'=>48,'lcp_ms'=>4200,'fcp_ms'=>2800,'cls'=>0.18,'tbt_ms'=>690,'ttfb_ms'=>820,'transfer_kb'=>2840,'requests'=>92,'notes'=>'Illustrative placeholder only; not measured. Replace with a Lighthouse baseline.']);
  PerformanceMetric::create(['label'=>'After optimization','device'=>'mobile','performance_score'=>94,'lcp_ms'=>1900,'fcp_ms'=>1100,'cls'=>0.03,'tbt_ms'=>120,'ttfb_ms'=>310,'transfer_kb'=>910,'requests'=>46,'notes'=>'Illustrative placeholder only; not measured. Replace with the matching Lighthouse run.']);
  PerformanceMetric::create(['label'=>'Before optimization','device'=>'desktop','performance_score'=>61,'lcp_ms'=>3100,'fcp_ms'=>1900,'cls'=>0.12,'tbt_ms'=>410,'ttfb_ms'=>620,'transfer_kb'=>2840,'requests'=>92,'notes'=>'Illustrative placeholder only; not measured. Replace with a Lighthouse baseline.']);
  PerformanceMetric::create(['label'=>'After optimization','device'=>'desktop','performance_score'=>98,'lcp_ms'=>1300,'fcp_ms'=>800,'cls'=>0.01,'tbt_ms'=>70,'ttfb_ms'=>210,'transfer_kb'=>910,'requests'=>46,'notes'=>'Illustrative placeholder only; not measured. Replace with the matching Lighthouse run.']);
} }
