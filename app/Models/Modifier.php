<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Scopes\TenantScope;

class Modifier extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'type',
        'is_required'
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
