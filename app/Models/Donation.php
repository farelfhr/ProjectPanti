<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'panti_id',
        'amount',
        'type',
        'status',
        'notes',
        'donation_items',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Get the user that made the donation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the panti that received the donation.
     */
    public function panti(): BelongsTo
    {
        return $this->belongsTo(Panti::class, 'panti_id', 'id_panti');
    }

    /**
     * Check if donation is cash type
     */
    public function isCash(): bool
    {
        return $this->type === 'tunai';
    }

    /**
     * Check if donation is non-cash type
     */
    public function isNonCash(): bool
    {
        return $this->type === 'non-tunai';
    }

    /**
     * Check if donation is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if donation is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if donation is cancelled
     */
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    /**
     * Get formatted amount
     */
    public function getFormattedAmountAttribute(): string
    {
        if ($this->amount) {
            return 'Rp ' . number_format($this->amount, 0, ',', '.');
        }
        return 'Non-tunai';
    }
}
