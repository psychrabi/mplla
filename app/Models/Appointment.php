<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable= ['client_id','date','time','note','status'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query() :
            static::whereHas('client', function($query) use ($search){
                $query->where('clients.name', 'like', '%' . $search . '%');
            });
    }


}
