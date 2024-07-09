@php use NaeemAwan\PredefinedLists\Models\PredefinedList; @endphp
@extends(Theme::getThemeNamespace() . '::views.ecommerce.customers.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Saved Boat details') }}</h5>
        </div>
        <div class="card-body">
            <div class="customer-order-detail">
                <div class="row">
                    <div class="col-auto me-auto">
                        <div class="order-slogan">
                            @php
                                $logo = theme_option('logo_in_the_checkout_page') ?: theme_option('logo');
                            @endphp
                            @if ($logo)
                                <img width="100" src="{{ RvMedia::getImageUrl($logo) }}"
                                     alt="{{ theme_option('site_title') }}">
                                <br/>
                            @endif
                            {{ setting('contact_address') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="order-meta">
                            <span class="d-inline-block">{{ __('Time') }}:</span>
                            <strong class="order-detail-value">{{ $boat->created_at->format('h:m d/m/Y') }}</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 border-top pt-2">
                        <h4>{{ __('Boat information') }}</h4>
                        <div>
                            <div>
                                <span class="d-inline-block">{{ __('Boat Name') }}:</span>
                                <strong class="order-detail-value">{{ $boat->boat->ltitle }}</strong>
                            </div>
                            <div>
                                <span class="d-inline-block">{{ __('Boat Price') }}:</span>
                                <strong class="order-detail-value"> {{ format_price($boat->boat->price) }} </strong>
                            </div>
                        </div>

                        <h4 class="mt-3 mb-1">{{ __('Final Model') }}</h4>
                        @php
                            $modelPath = $boat->boat->file;
                        @endphp
                        <div class="row">
                            {{--3d model div starts --}}
                            <div id="3d-model" style="width: 100%; height: 500px;"></div>
                            {{--3d model div ends --}}

                            <h4 class="mt-3 mt-50">{{ __('Options Selected') }}</h4>
                            <div class="card-body summary-card justify-content-center d-flex flex-row flex-wrap">
                                @foreach($boat->details as $key=>$value)
                                    @php
                                        $data = PredefinedList::where('id',$value->option_id)
                                        /*->where('type',$value->subcat_slug)*/
                                        ->first();
                                        $parent = PredefinedList::where('id',$data->parent_id)->first();
                                    @endphp
                                    <div class="card m-1">
                                        <div class="card-body text-center">
                                            <p><b>{{$value->color_picker ? $parent->ltitle : ''}}</b>
                                            </p>
                                            <p>
                                                <b>
                                                    {{$value->slug->ltitle}}:
                                                </b>
                                                @if($value->slug->parent)
                                                    {{$value->ltitle}}
                                                @else
                                                    <span style="background-color: {{$value->color_picker}};">{{$value->color_picker}}</span>
                                                @endif
                                            </p>
                                            <p><b>Price</b> : {{ format_price($value->enquiry_option->price) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($boat->boat->detail->standard_options)
                                <div class="card-body list-style">
                                    <h4>Standard Options</h4>
                                    {!! $boat->boat->detail->standard_options !!}
                                </div>
                            @endif
                        </div>
                        <h4 class="mt-3 mb-1">{{ __('Total') }}</h4>
                        <div>
                            <div>
                                <span class="d-inline-block">{{ __('Total Price Included Vat') }}:</span>
                                <strong class="order-detail-value">{{ format_price($boat->vat_total) }}</strong>
                            </div>
                            @if($boat->is_finished)
                                <hr/>
                                <div>
                                    <span class="d-inline-block">{{ __('Paid') }}:</span>
                                    <strong class="order-detail-value">{{ format_price($boat->paid_amount) }}</strong>
                                </div>
                                <div>
                                    <span class="d-inline-block">{{ __('Remaining') }}:</span>
                                    <strong class="order-detail-value">{{ format_price($boat->vat_total - $boat->paid_amount) }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
