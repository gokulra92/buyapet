<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\CustomerDetail;
use App\Models\PetShop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\DB;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CustomerRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.
        // CRUD::orderFields(['profile_picture', 'name', 'email', 'phone_number']);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

        $customer = !empty(CRUD::getCurrentEntry()) ? CRUD::getCurrentEntry() : null;
        $business_days = !empty($customer->petShops->business_days)
            ? json_decode($customer->petShops->business_days)
            : [];
        $business_hours = '';
        if (!empty($customer->petShops->business_hours)) {
            $hours = json_decode($customer->petShops->business_hours, true);
            $business_hours = $hours[$business_days[1]]; // TODO: Currently showing the first time
        }
        $shopName = !empty($customer->petShops->shop_name) ? $customer->petShops->shop_name : '';
        $shop_ph_number = !empty($customer->petShops->shop_ph_number) ? $customer->petShops->shop_ph_number : '';

        $dob = !empty($customer->customerDetail->dob) ? $customer->customerDetail->dob : '';
        $gender = !empty($customer->customerDetail->gender) ? $customer->customerDetail->gender : '';
        $subscribe_newsletter = !empty($customer->customerDetail->subscribe_newsletter)
            ? $customer->customerDetail->subscribe_newsletter
            : 0;
        $show_followers_count = !empty($customer->customerDetail->show_followers_count)
            ? $customer->customerDetail->show_followers_count
            : 0;
        $send_contact_detail_to_email = !empty($customer->customerDetail->send_contact_detail_to_email)
            ? $customer->customerDetail->send_contact_detail_to_email
            : 0;
        $countryId = !empty($customer->customerDetail->country)
            ? $customer->customerDetail->country
            : '';
        $stateId = !empty($customer->customerDetail->state)
            ? $customer->customerDetail->state
            : '';
        $districtId = !empty($customer->customerDetail->district)
            ? $customer->customerDetail->district
            : '';
        CRUD::addField([
            'name' => 'profile_picture',
            'label' => 'Profile Picture',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
        ]);
        CRUD::field('name')->type('text');
        CRUD::field('email')->type('email');
        CRUD::field('phone_number')->type('number');
        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'select_from_array',
            'options' => [
                'male' => 'Male',
                'female' => 'Female',
                'not_specified' => 'Other'
            ],
            'allows_null' => true,
            'value' => $gender
        ]);
        CRUD::addField([
            'name' => 'dob',
            'label' => 'Date Of Birth',
            'type' => 'date',
            'value' => $dob
        ]);
        // CRUD::field('dob')->type('date')->label('Date Of Birth')->value($dob);
        CRUD::field('shop_name')->type('text')->label('Shop Name')->value($shopName);
        CRUD::field('shop_ph_number')->type('number')->label('Shop Phone Number')->value($shop_ph_number);
        CRUD::addField([
            'name' => 'business_days[]',
            'label' => 'Business Days',
            'type' => 'select_from_array',
            'options' => [
                '1' => 'Sunday',
                '2' => 'Monday',
                '3' => 'Tuesday',
                '4' => 'Wednesday',
                '5' => 'Thursday',
                '6' => 'Friday',
                '7' => 'Saturday'
            ],
            'allows_null' => false,
            'attributes' => [
                'multiple' => 'multiple',
            ],
            'value' => $business_days
        ]);
        CRUD::addField([
            'name' => "business_hours",
            'label' => 'Business Hours (From - To)',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'e.g., 09:00 - 17:00',
            ],
            'value' => $business_hours
        ]);
        CRUD::addField([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'select',
            'entity' => 'getCountry',
            'attribute' => 'name',
            'model' => "App\\Models\\Country",
            'allows_null' => false,
            'options' => (function ($query) {
                return $query->where('is_active', 1)->get();
            }),
            'value' => $countryId
        ]);
        CRUD::addField([
            'name' => 'state',
            'label' => 'State',
            'type' => 'select',
            'entity' => 'getState',
            'attribute' => 'name',
            'model' => "App\\Models\\State",
            'allows_null' => false,
            'options' => (function ($query) {
                return $query->where('is_active', 1)->get();
            }),
            'value' => $stateId
        ]);
        CRUD::addField([
            'name' => 'district',
            'label' => 'District',
            'type' => 'select',
            'entity' => 'getDistrict',
            'attribute' => 'name',
            'model' => "App\\Models\\District",
            'allows_null' => false,
            'options' => (function ($query) {
                return $query->where('is_active', 1)->get();
            }),
            'value' => $districtId
        ]);
        CRUD::field('subscribe_newsletter')->type('checkbox')->value($subscribe_newsletter);
        CRUD::field('show_followers_count')->type('checkbox')->value($show_followers_count);
        CRUD::field('send_contact_detail_to_email')->type('checkbox')->value($send_contact_detail_to_email);
        CRUD::addField([
            'name' => 'is_active',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                1 => 'Active',
                0 => 'Inactive'
            ],
            'allows_null' => false,
            'default' => 1
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:500',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:customers',
                'phone_number' => ['required', 'regex:/^[0-9]{10}$/'],
                'gender' => 'nullable|string|in:male,female,not_specified',
                'dob' => [
                    'nullable',
                    'date',
                    'before:' . now()->subYears(18)->format('Y-m-d'),
                    'after:1900-01-01'
                ],
                'shop_name' => 'nullable|string|max:255',
                'shop_ph_number' => ['nullable', 'regex:/^[0-9]{10}$/'],
                'business_days' => 'nullable|array',
                'business_days.*' => 'in:1,2,3,4,5,6,7',
                'business_hours' => 'nullable|regex:/^\d{2}:\d{2} - \d{2}:\d{2}$/',
                'country' => 'nullable|numeric',
                'state' => 'nullable|numeric',
                'district' => 'nullable|numeric',
                'subscribe_newsletter' => 'nullable|boolean',
                'show_followers_count' => 'nullable|boolean',
                'send_contact_detail_to_email' => 'nullable|boolean',
                'is_active' => 'required',
            ], [
                'dob.date' => 'Please enter a valid date.',
                'dob.before' => 'Customer must be at least 18 years old.',
                'dob.after' => 'The date of birth must be after January 1, 1900.',
                'business_hours.regex' => 'The business hours must be in the format HH:MM - HH:MM.',
            ]);

            if (
                $request->hasFile('profile_picture')
                && $request->file('profile_picture')->isValid()
            ) {
                $path = 'uploads/customers';
                if (!Storage::exists($path)) {
                    Storage::makeDirectory($path, 0755, true);
                }
                $profilePicturePath = $request->file('profile_picture')->store($path);
            }
            $customer = Customer::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'profile_picture' => $profilePicturePath,
                'is_active' => $validatedData['is_active']
            ]);

            $customerId = $customer->id;
            if ($customerId) {
                CustomerDetail::create([
                    'customer_id' => $customerId,
                    'gender' => $validatedData['gender'],
                    'dob' => $validatedData['dob'],
                    'country' => $validatedData['country'],
                    'state' => $validatedData['state'],
                    'district' => $validatedData['district'],
                    'subscribe_newsletter' => $validatedData['subscribe_newsletter'] ?? 0,
                    'show_followers_count' => $validatedData['show_followers_count'] ?? 0,
                    'send_contact_detail_to_email' => $validatedData['send_contact_detail_to_email'] ?? 0,
                ]);
            }

            $shopName = $validatedData['shop_name'] ?? '';
            if ($customerId && $shopName) {
                $business_days = !empty($validatedData['business_days'])
                    ? $validatedData['business_days']
                    : [];
                $business_hours = [];
                if ($business_days && !empty($validatedData['business_hours'])) {
                    foreach ($business_days as $day) {
                        $business_hours[$day] = $validatedData['business_hours'];
                    }
                }
                PetShop::create([
                    'customer_id' => $customerId,
                    'shop_name' => $validatedData['shop_name'],
                    'shop_ph_number' => $validatedData['shop_ph_number'],
                    'business_days' => json_encode($business_days),
                    'business_hours' => json_encode($business_hours)
                ]);
            }

            Alert::success('Profile inserted successfully!')->flash();
        } catch (\Exception $e) {
            Alert::error('Customer details insert failed')->flash();
            Log::error('Customer store(): ' . $e->getMessage());
        }
        return Redirect::to('admin/customer');
    }
}
