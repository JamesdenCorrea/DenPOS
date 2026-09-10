<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Scopes\TenantScope;

class Product extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'sku',
        'price',
        'cost',
        'stock',
        'is_active'
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
    protected static function booted(): void
{
    static::addGlobalScope(new TenantScope);
}


}

