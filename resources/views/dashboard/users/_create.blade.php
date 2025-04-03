<!-- Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.create_user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- validations error --}}
                <div class="alert alert-danger" id="error_div" style="display: none;">
                    <ul id="error_list"></ul>
                </div>


                <form action="" id="createUser" class="form" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="{{ __('dashboard.name') }}">
                        <strong class="text-danger" id="error_name"></strong>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('dashboard.email') }}</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="{{ __('dashboard.email') }}">
                        <strong class="text-danger" id="error_email"></strong>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('dashboard.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="{{ __('dashboard.password') }}">
                        <strong class="text-danger" id="error_password"></strong>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('dashboard.password_confirmation') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="{{ __('dashboard.password_confirmation') }}">
                        <strong class="text-danger" id="error_password_confirmation"></strong>
                    </div>
                    
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><i class="ft-x"></i>{{ __('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-primary">  <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
