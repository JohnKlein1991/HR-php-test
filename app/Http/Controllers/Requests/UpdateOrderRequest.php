<?php

namespace App\Http\Controllers\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;


/**
 * Class UpdateOrderRequest
 * @package App\Http\Controllers\Admin\Requests
 */
class UpdateOrderRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $allowedStatusValues = implode(',', $this->getAllowedValuesForStatuses());
        return [
            'client_email' => 'email|required',
            'partner_id' => 'integer|required|exists:partners,id',
            'status' => "integer|required|in:{$allowedStatusValues}",
        ];
    }


    /**
     * Возвращает нужные данные для обновления данных заказа
     *
     * @return array
     */
    public function getData()
    {
        return Arr::only($this->all(), [
            'client_email',
            'partner_id',
            'status'
        ]);
    }

    /**
     * @return array
     */
    public function getAllowedValuesForStatuses()
    {
        return [
            Order::STATUS_ID_FINISHED,
            Order::STATUS_ID_ACCEPTED,
            Order::STATUS_ID_NEW,
        ];
    }
}
