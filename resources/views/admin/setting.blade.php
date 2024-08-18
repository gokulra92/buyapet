@extends(backpack_view('blank'))

@section('header')
<section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none" bp-section="page-header">
    <h1 class="text-capitalize mb-0" bp-section="page-heading">Settings</h1>
    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">Site Settings</p>
</section>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 bold-labels">
        <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-sm-12 mb-3 required">
                        <label for="support_email">Support Email:</label>
                        <input type="text" name="support_email" id="support_email" class="form-control" value="{{ $settings['support_email'] ?? '' }}">
                    </div>

                    <div class="form-group col-sm-12 mb-3 required">
                        <label for="contact_number">Support Number:</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $settings['contact_number'] ?? '' }}">
                    </div>

                    <div class="form-group col-sm-12 mb-3">
                        <label for="social_media_facebook">Facebook Link:</label>
                        <input type="text" name="social_media_facebook" id="social_media_facebook" class="form-control" value="{{ $settings['social_media_facebook'] ?? '' }}">
                    </div>
                    <div class="form-group col-sm-12 mb-3">
                        <label for="social_media_twitter">Twitter Link:</label>
                        <input type="text" name="social_media_twitter" id="social_media_twitter" class="form-control" value="{{ $settings['social_media_twitter'] ?? '' }}">
                    </div>
                    <div class="form-group col-sm-12 mb-3">
                        <label for="social_media_instagram">Instagram Link:</label>
                        <input type="text" name="social_media_instagram" id="social_media_instagram" class="form-control" value="{{ $settings['social_media_instagram'] ?? '' }}">
                    </div>
                    <div class="form-group col-sm-12 mb-3 required">
                        <label for="api_auth_key">API Auth Key:</label>
                        <input type="text" name="api_auth_key" id="api_auth_key" class="form-control" value="{{ $settings['api_auth_key'] ?? '' }}">
                    </div>
                    <div class="form-group col-sm-12 mb-3 required">
                        <label for="records_per_page">Records Per page:</label>
                        <input type="number" name="records_per_page" id="records_per_page" class="form-control" value="{{ $settings['records_per_page'] ?? '' }}">
                    </div>
                    <div class="form-group col-sm-12 mb-3 required">
                        <label for="cache_lifetime">Cache Lifetime(in minutes):</label>
                        <input type="number" name="cache_lifetime" id="cache_lifetime" class="form-control" value="{{ $settings['cache_lifetime'] ?? '' }}">
                    </div>
                </div>
            </div>
            <div id="saveActions" class="form-group my-3">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success text-white">
                        <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                        <span data-value="save_and_back">Save</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection