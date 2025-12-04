<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'users_details';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'status',
        'rejection_reason',
        'approved_by',
        'approved_at',
        'rejected_at'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    // Scope for pending users
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for approved users
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope for rejected users
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    // Relationship with admin who approved
    public function approvedBy()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }
}