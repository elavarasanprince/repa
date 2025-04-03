<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFee extends Model
{
    use HasFactory;

    protected $table = 'member_fees';

    protected $fillable = [
        'member_id',
        'fee_id',
        'amount',
    ];

    public function member()
    {
        return $this->belongsTo(MemberReg::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
