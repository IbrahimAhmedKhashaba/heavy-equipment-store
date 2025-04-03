<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.edit_user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- validations error --}}
                <div class="alert alert-danger" id="error_div_edit" style="display: none;">
                    <ul id="error_list_edit"></ul>
                </div>


                <form action="" id="updateUser" class="form" method="POST" >
                    @csrf
                    @method('PUT')
                    <input id="user_id" hidden name="id" value="">
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name') }}</label>
                        <input id="name" type="text" name="name" class="form-control"
                            value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('dashboard.email') }}</label>
                        <input id="email" type="email" name="email" class="form-control"
                        value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('dashboard.password') }}</label>
                        <input id="password" type="password" name="password" class="form-control"
                            placeholder="{{ __('dashboard.password') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">{{ __('dashboard.password_confirmation') }}</label>
                        <input id="password_confirmation" type="password_confirmation" name="password_confirmation" class="form-control"
                            placeholder="{{ __('dashboard.password_confirmation') }}">
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
