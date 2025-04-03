<div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('dashboard.users.index') }}">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{ __('dashboard.users') }}</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('dashboard.categories.index') }}">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ __('dashboard.categories') }}</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('dashboard.products.index') }}">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    {{ __('dashboard.products') }}</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('dashboard.contacts.index') }}">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    {{ __('dashboard.contacts') }}
                                </div>
                            </a>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $contacts_count }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-phone fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
