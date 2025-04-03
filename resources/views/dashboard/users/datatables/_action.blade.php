<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <button class="edit_user btn btn-outline-success" user-id="{{ $user->id }}"
            user-name="{{ $user->name }}"
            >
            {{ __('dashboard.edit') }} <i class="la la-edit"></i>
        </button>

        <button id="btnGroupDrop2" type="button" user-id={{ $user->id }}
            class="delete_confirm_btn btn btn-outline-danger">
            {{ __('dashboard.delete') }}<i class="la la-trash"></i>
        </button>


    </div>
</div>
@include('dashboard.users._edit')