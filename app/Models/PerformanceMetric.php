<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PerformanceMetric extends Model { protected $fillable=['label','device','performance_score','lcp_ms','fcp_ms','cls','tbt_ms','ttfb_ms','transfer_kb','requests','notes']; protected $casts=['cls'=>'float','performance_score'=>'integer']; }
