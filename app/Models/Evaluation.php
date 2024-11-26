<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function complaint() {
        return $this->belongsTo(Complaint::class);
    }
    
    public function auditor() {
        return $this->belongsTo(User::class, 'auditor_id');
    }
}
