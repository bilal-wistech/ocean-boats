@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')
    <div class="d-none" id="dashboard-alerts">
        <verify-license-component verify-url="{{ route('settings.license.verify') }}"
            setting-url="{{ route('settings.options') }}"></verify-license-component>
        @if (config('core.base.general.enable_system_updater') && Auth::user()->isSuperUser())
            <check-update-component check-update-url="{{ route('system.check-update') }}"
                setting-url="{{ route('system.updater') }}"></check-update-component>
        @endif
    </div>
    {!! apply_filters(DASHBOARD_FILTER_ADMIN_NOTIFICATIONS, null) !!}
    <div class="row">
        {!! apply_filters(DASHBOARD_FILTER_TOP_BLOCKS, null) !!}
    </div>
    <div class="row">
        @foreach ($statWidgets as $widget)
            {!! $widget !!}
        @endforeach
    </div>
    <div class="col-md-12">
        <h6>Boat Views</h6>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($boatViews as $item)
                        <tr>
                            <td>{{ $item->option->ltitle ?? '' }}</td>
                            <td>{{ $item->entity_type ?? '' }}</td>
                            <td>{{ $item->total_count ?? 0 }}</td </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $boatViews->links() }}
        </div>
    </div>
    <div id="list_widgets" class="row">
        @foreach ($userWidgets as $widget)
            {!! $widget !!}
        @endforeach
    </div>

    @if (count($widgets) > 0)
        <a href="#" class="manage-widget">
            <i class="fa fa-plus"></i>
            {{ trans('core/dashboard::dashboard.manage_widgets') }}
        </a>
        @include('core/dashboard::partials.modals', compact('widgets'))
    @endif
@stop
