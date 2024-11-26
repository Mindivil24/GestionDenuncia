<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'action', 'user_id', 'complaint_id', 'details', 'timestamp',
    ];

    // Relación con el usuario que realizó la acción
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relación con la denuncia afectada
    public function complaint() {
        return $this->belongsTo(Complaint::class);
    }
}
