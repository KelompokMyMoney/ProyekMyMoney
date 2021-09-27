<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMode;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Balance extends Model
{
    use HasFactory;

    protected $table = 'balances';

    protected $fillable = ['mode_id', 'amount'];

    /**
     * Get the paymentMode associated with the Balance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMode(): BelongsTo
    {
        return $this->belongsTo(PaymentMode::class, 'id');
    }

    public function getPaymentModeName($id)
    {
        $name = PaymentMode::select('title')->where('id', $id)->first();
        return $name->title;
    }
}
