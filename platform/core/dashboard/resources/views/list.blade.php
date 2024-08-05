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
{{-- <div class="col-md-12">
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
</div> --}}
<div class="col-12">
    <div id="main-view">
        <h6>Boat Views</h6>
        <ul class="list-group boat-list">
            <li class="list-group-item d-flex justify-content-between align-items-center boat-item"
                onclick="showDetails('boat1')">
                <span>38CC Boat</span>
                <span class="badge bg-primary rounded-pill">1,234 views</span>

            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center boat-item"
                onclick="showDetails('boat2')">
                <span>28SF Boat</span>
                <span class="badge bg-primary rounded-pill">987 views</span>

            </li>
        </ul>
    </div>

    <div id="boat1" class="boat-details">
        <h6>38CC Accessories</h6>
        <div onclick="toggleSuboptions(this)">
            <div class="boat-option">
                <div>Top Options</div>
                <i class="opt fas fa-chevron-down float-end"></i>
            </div>

            <div class="suboptions">
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Hard Top</div>
                    <span class="badge bg-primary rounded-pill">987 views</span>

                </div>
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Soft Top</div>
                    <span class="badge bg-primary rounded-pill">223 views</span>

                </div>
            </div>


        </div>
        <div onclick="toggleSuboptions(this)">
            <div class="boat-option">
                <span>Seating Options</span>
                <i class="fas fa-chevron-down float-end"></i>
            </div>
            <div class="suboptions">
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Standard Seats</div>
                    <span class="badge bg-primary rounded-pill">987 views</span>

                </div>
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Sports Seats</div>
                    <span class="badge bg-primary rounded-pill">223 views</span>

                </div>
            </div>
        </div>
        <div onclick="toggleSuboptions(this)">
            <div class="boat-option">
                <span>Engine Options</span>
                <i class="fas fa-chevron-down float-end"></i>
            </div>
            <div class="suboptions">
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Engine</div>
                    <span class="badge bg-primary rounded-pill">987 views</span>

                </div>
                <div class="boat-sub-item justify-content-between align-items-center">
                    <div>Suboption 2</div>
                    <span class="badge bg-primary rounded-pill">223 views</span>

                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3" onclick="showMainView()">Back</button>
    </div>
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

<style>
    .boat-list {
        list-style-type: none;
        padding: 0;
        background: white;
        border: 1px solid #ccc;
    }

    .boat-item {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }

    .boat-item:hover {
        background-color: #f0f0f0;
    }

    .boat-details {
        display: none;
    }

    .boat-option {
        padding: 10px;
        background: white;

        justify-content: space-between;
        border: 1px solid #ccc;
    }

    .back-button {
        margin-top: 20px;
        color: white;
        background: black;
        margin-bottom: 20px;
        padding: 5px 10px;
        cursor: pointer;
        border: none;
    }

    .suboptions {
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        display: none;
        background: #f8f7f7;
    }

    .boat-sub-item {
        display: flex;
        padding: 10px 30px 10px 30px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }

    .opt {
        position: relative;
        top: -15px
    }
</style>
<script>
    function showDetails(boatId) {
            document.getElementById('main-view').style.display = 'none';
            document.getElementById(boatId).style.display = 'block';
        }

        function showMainView() {
            document.getElementById('main-view').style.display = 'block';
            var boatDetails = document.getElementsByClassName('boat-details');
            for (var i = 0; i < boatDetails.length; i++) {
                boatDetails[i].style.display = 'none';
            }
        }
        function toggleSuboptions(element) {
    var suboptions = element.querySelector('.suboptions');
    var chevronIcon = element.querySelector('.fa-chevron-down, .fa-chevron-up');
    
    if (suboptions.style.display === 'block') {
        suboptions.style.display = 'none';
        chevronIcon.classList.remove('fa-chevron-up');
        chevronIcon.classList.add('fa-chevron-down');
    } else {
        suboptions.style.display = 'block';
        chevronIcon.classList.remove('fa-chevron-down');
        chevronIcon.classList.add('fa-chevron-up');
    }
}

</script>