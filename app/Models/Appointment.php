<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table ='appointments';
    protected $fillable = ['name','user_id','room_id','client_id','status','date'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
