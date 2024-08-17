{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Pet Categories" icon="la la-file-alt" :link="backpack_url('pet-categories')" />
<x-backpack::menu-item title="Breeds" icon="la la-file-alt" :link="backpack_url('breeds')" />
<x-backpack::menu-item title="Users" icon="la la-file-alt" :link="backpack_url('users')" />
<x-backpack::menu-item title="Profile Ratings and Comments" icon="la la-file-alt" :link="backpack_url('profile-ratings-comments')" />
<x-backpack::menu-item title="Posts" icon="la la-file-alt" :link="backpack_url('posts')" />
<x-backpack::menu-item title="Pages" icon="la la-file-alt" :link="backpack_url('pages')" />
<x-backpack::menu-item title="States" icon="la la-file-alt" :link="backpack_url('states')" />
<x-backpack::menu-item title="Districts" icon="la la-file-alt" :link="backpack_url('districts')" />
<x-backpack::menu-item title="References" icon="la la-file-alt" :link="backpack_url('refer-a-friend')" />
<x-backpack::menu-item title="Feedbacks" icon="la la-file-alt" :link="backpack_url('feedbacks')" />
<x-backpack::menu-item title="Admins" icon="la la-file-alt" :link="backpack_url('admins')" />
<x-backpack::menu-item title="Site Settings" icon="la la-file-alt" :link="backpack_url('site-settings')" />
