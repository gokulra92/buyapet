<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Name'
        ]);

        CRUD::addField([
            'name' => 'email',
            'type' => 'email',
            'label' => 'Email'
        ]);
        
        CRUD::addField([
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password'
        ]);

        CRUD::addField([
            'name' => 'confirm_password',
            'type' => 'password',
            'label' => 'Confirm Password'
        ]);

        CRUD::addField([
            'name' => 'phone_number',
            'type' => 'number',
            'label' => 'Phone Number'
        ]);

        CRUD::addField([
            'name' => 'is_ph_verified',
            'label' => 'Phone Number Verification Status',
            'type' => 'select_from_array',
            'options' => [
                1 => 'Verified',
                0 => 'Not Verified'
            ],
            'allows_null' => false,
            'default' => 0,
            'value' => ''
        ]);

        CRUD::addField([
            'name' => 'is_email_verified',
            'label' => 'Email Id Verification Status',
            'type' => 'select_from_array',
            'options' => [
                1 => 'Verified',
                0 => 'Not Verified'
            ],
            'allows_null' => false,
            'default' => 0,
            'value' => ''
        ]);

        CRUD::addField([
            'name' => 'is_active',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                1 => 'Enable',
                0 => 'Disable'
            ],
            'allows_null' => false,
            'default' => 1
        ]);

        CRUD::addField([
            'name' => 'customerDetail.profile_picture',
            'type' => 'upload',
            'label' => 'Profile Picture',
            'upload' => true,
            'disk' => 'public'
        ]);

        $this->crud->addField([
            'name' => 'reference_key', 
            'label' => 'Reference Key',
            'type' => 'text'
        ]);

        CRUD::addField([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'select_from_array',
            'options' => [
                'male' => 'Male',
                'female' => 'Female',
                'not_specified' => 'Not Specified'
            ],
            'allows_null' => false,
            'default' => 'not_specified'
        ]);

        $this->crud->addField([
            'name' => 'dob', 
            'label' => 'Date Of Birth',
            'type' => 'date'
        ]);

        $this->crud->addField([
            'name' => 'shop_name', 
            'label' => 'Pet Shop',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'shop_ph_number', 
            'label' => 'Shop Phone Number',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'business_hours', 
            'label' => 'Business Hours',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'subscribe_newsletter', 
            'label' => 'Subscribe Newsletter',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([
            'name' => 'show_followers_count', 
            'label' => 'Show Followers Count',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([
            'name' => 'send_contact_detail_to_email', 
            'label' => 'Send Contact Detail To Email',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([
            'name' => 'default_search_range', 
            'label' => 'Default Search Range(in Kms)',
            'type' => 'number'
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
            })
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
            })
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
            })
        ]);
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
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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
}
