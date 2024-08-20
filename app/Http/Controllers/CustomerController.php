<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    public function getCustomerById($id) {
        $response = [
            'code' => 422,
            'message' => __('messages.customer_fetch_failed'),
            'data' => []
        ];

        try {
            $select = ['id', 'name'];
            $conditions = [
                ['id', $id],
                ['is_active', true]
            ];
            $query = Customer::query();
            foreach ($conditions as $condition) {
                $query->where($condition[0], $condition[1]);
            }
            $customerData = $query->select($select)->orderBy('id', 'asc')->get();
            $response = [
                'code' => 201,
                'message' => __('messages.customer_fetch_success'),
                'data' => $customerData
            ];
        } catch (\Exception $e) {
            Log::error('getCustomerById(): ' . $e->getMessage());
            $response['message'] = $e->getMessage();
        }
        $response['success'] = $response['code'] < 400;
        return response()->json($response, $response['code']);
    }
}
