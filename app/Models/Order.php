<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    /**
     *
     */
    const STATUS_ID_NEW = 0;
    /**
     *
     */
    const STATUS_ID_ACCEPTED = 10;
    /**
     *
     */
    const STATUS_ID_FINISHED = 20;
    /**
     *
     */
    const STATUS_TITLE_NEW = 'Новый';
    /**
     *
     */
    const STATUS_TITLE_ACCEPTED = 'Подтвержден';
    /**
     *
     */
    const STATUS_TITLE_FINISHED = 'Завершен';

    /**
     * @var array
     */
    protected $appends = [
        'status_title'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot(['quantity']);
    }

    /**
     * @return string
     */
    public function getStatusTitleAttribute()
    {
        $statusId = $this->status;
        switch ($statusId) {
            case self::STATUS_ID_NEW:
                return self::STATUS_TITLE_NEW;
            case self::STATUS_ID_ACCEPTED:
                return self::STATUS_TITLE_ACCEPTED;
            case self::STATUS_ID_FINISHED:
                return self::STATUS_TITLE_FINISHED;
            default:
                return '';
        }
    }
}
