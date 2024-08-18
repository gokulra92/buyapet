<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Prologue\Alerts\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::pluck('value', 'key')->all();
        return view('admin.setting', compact('setting'));
    }

    public function fetchSetting(Request $request)
    {
        $response = [
            'code' => 422,
            'message' => __('messages.setting_fetch_failed'),
            'data' => []
        ];
        try {
            $select = ['key', 'value'];
            $setting = Setting::select($select)->get();
            $allowedSetting = [
                'site_name',
                'site_logo',
                'support_email',
                'contact_number',
                'social_media_facebook',
                'social_media_twitter',
                'social_media_instagram',
                'site_primary_color',
                'site_secondary_color',
                'currency',
                'records_per_page',
                'cache_lifetime',
            ];
            $nonSensitiveSettings = [];
            foreach ($setting as $setting) {
                $key = $setting['key'];
                $value = $setting['value'];

                if (!in_array($key, $allowedSetting)) {
                    continue;
                }

                if ($key === 'site_logo' && Storage::exists($value)) {
                    $value = Storage::url($value);
                }

                if (strpos($key, 'social_media') !== false) {
                    $nonSensitiveSetting['social_media'][$key] = $value;
                } else {
                    $nonSensitiveSetting[$key] = $value;
                }
            }
            $response = [
                'code' => 201,
                'message' => __('messages.setting_fetch_success'),
                'data' => $nonSensitiveSetting
            ];
        } catch (\Exception $e) {
            Log::error('fetchSetting(): ' . $e->getMessage());
            $response['message'] = $e->getMessage();
        }
        $response['success'] = $response['code'] < 400;
        return response()->json($response, $response['code']);
    }

    public function update(Request $request)
    {
        try {
            $keys = [
                'site_name',
                'site_logo',
                'send_info_via',
                'support_email',
                'contact_number',
                'social_media_facebook',
                'social_media_twitter',
                'social_media_instagram',
                'site_primary_color',
                'site_secondary_color',
                'currency',
                'api_auth_key',
                'records_per_page',
                'cache_lifetime',
                'aws_access_key_id',
                'aws_secret_access_key',
                'aws_default_sms_region',
                'approver_name',
                'approver_email'
            ];

            foreach ($keys as $key) {
                if ($request->has($key)) {
                    $value = $request->input($key);
                    if (
                        $key === 'site_logo'
                        && $request->hasFile('site_logo')
                        && $request->file('site_logo')->isValid()
                    ) {
                        $path = 'uploads/general';
                        if (!Storage::exists($path)) {
                            Storage::makeDirectory($path, 0755, true);
                        }
                        $value = $request->file('site_logo')->store($path);
                    }
                    Setting::updateOrCreate(['key' => $key], ['value' => $value]);
                }
            }
            Alert::success('Setting updated successfully')->flash();
            return redirect()->route('admin.setting.index');
        } catch (Exception $e) {
            Log::error('page store(): ' . $e->getMessage());
            Alert::error($e->getMessage())->flash();
        }
    }
}
