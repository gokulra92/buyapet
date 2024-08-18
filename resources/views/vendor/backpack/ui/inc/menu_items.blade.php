{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Pet Categories" icon="la la-question" :link="backpack_url('pet-category')" />
<x-backpack::menu-item title="Breeds" icon="la la-question" :link="backpack_url('breed')" />
<x-backpack::menu-item title="Pet shops" icon="la la-question" :link="backpack_url('pet-shop')" />
<x-backpack::menu-item title="Customers" icon="la la-question" :link="backpack_url('customer')" />
<x-backpack::menu-item title="Customer ratings" icon="la la-question" :link="backpack_url('customer-rating')" />
<x-backpack::menu-item title="Posts" icon="la la-question" :link="backpack_url('post')" />
<x-backpack::menu-item title="Pages" icon="la la-question" :link="backpack_url('page')" />
<x-backpack::menu-item title="Countries" icon="la la-question" :link="backpack_url('country')" />
<x-backpack::menu-item title="States" icon="la la-question" :link="backpack_url('state')" />
<x-backpack::menu-item title="Districts" icon="la la-question" :link="backpack_url('district')" />
<x-backpack::menu-item title="Referred profiles" icon="la la-question" :link="backpack_url('referred-profile')" />
<x-backpack::menu-item title="Feedback" icon="la la-question" :link="backpack_url('feedback')" />
<x-backpack::menu-item title="Admins" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Setting" icon="la la-question" :link="backpack_url('setting')" />

