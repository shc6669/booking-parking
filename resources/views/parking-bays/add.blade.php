@extends('layouts.app')

@section('page-title', 'Manage Data')
@section('page-heading', 'Manage Data - Parking Bays')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('parking-bays.index') }}">
            @lang('Parking Bays')
        </a>
    </li>
    <li class="breadcrumb-item active">
        Create Data
    </li>
@stop

@section('content')

@include('partials.messages')

{!! Form::open(['route' => 'parking-bays.store', 'id' => 'parking-bays-form', 'enctype' => 'multipart/form-data']) !!}

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Back" onclick="window.location.href='{{ route('parking-bays.index') }}'">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="name">@lang('Bays Name')</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="@lang('Please input name')">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="cash_balance">@lang('Cash Balance')</label>
                    <input type="number" class="form-control" id="cash_balance"
                           name="cash_balance" placeholder="@lang('Please input cash balance')">
                </div>
            </div>
        </div>
        <div class="row lat-long">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="map_lat">@lang('Latitute')</label>
                    <input type="text" name="map_lat" 
                        id='lat' class="form-control input-solid" readonly>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="map_long">@lang('Longitude')</label>
                    <input type="text" name="map_long" 
                        id='long' class="form-control input-solid" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="address">@lang('Address')</label>
                    <span class="info">
                        <i class="fas fa-exclamation-circle"></i> Drag and Drop <font color="red">RED PIN</font> to search a location according to the map, or type a search in the Find Location input below.
                    </span>
                    <input type="text" class="form-control input-solid" 
                        id="pac-input" placeholder="@lang('Find Location')" name="address">
                </div>
                <div id="map"></div>
            </div>
        </div>
        <div class="row pt-sm-3">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_mon">@lang('Information Open Monday')</label>
                    <input type="text" class="form-control" id="working_hours_mon"
                           name="working_hours_mon" placeholder="@lang('Please input')">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_tue">@lang('Information Open Tuesday')</label>
                    <input type="text" class="form-control" id="working_hours_tue"
                           name="working_hours_tue" placeholder="@lang('Please input')">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_wed">@lang('Information Open Wednesday')</label>
                    <input type="text" class="form-control" id="working_hours_wed"
                           name="working_hours_wed" placeholder="@lang('Please input')">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_thurs">@lang('Information Open Thursday')</label>
                    <input type="text" class="form-control" id="working_hours_thurs"
                           name="working_hours_thurs" placeholder="@lang('Please input')">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_fri">@lang('Information Open Friday')</label>
                    <input type="text" class="form-control" id="working_hours_fri"
                           name="working_hours_fri" placeholder="@lang('Please input')">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_sat">@lang('Information Open Saturday')</label>
                    <input type="text" class="form-control" id="working_hours_sat"
                           name="working_hours_sat" placeholder="@lang('Please input')">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="working_hours_sun">@lang('Information Open Sunday')</label>
                    <input type="text" class="form-control" id="working_hours_sun"
                           name="working_hours_sun" placeholder="@lang('Please input')">
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="row pt-sm-3">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <div class="switch switch-sm">
                            <input type="checkbox" data-on="1" data-off="0" value="1" 
                                class="switch" id="open_fullday" name="open_fullday">
                            <label for="open_fullday">Open All Day</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-outline-success">
            Submit data
        </button>
    </div>
</div>

{!! Form::close() !!}

@stop

@section('scripts')
{!! JsValidator::formRequest('Vanguard\Http\Requests\Parking\CreateUpdateRequest', '#parking-bays-form') !!}
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
{!! HTML::script('assets/js/as/custom.js') !!}
<script type="text/javascript">
    /* Google Maps */
    var map,marker,cur_pos;
    $(document).ready(function(){
        initMap();
    
        $('#pac-input').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
    
        $("#btn-checkpos").click(function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    cur_pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
    
                    $("#lat").val(position.coords.latitude);
                    $("#long").val(position.coords.longitude);
    
                    map.setCenter(cur_pos);
                    marker.setPosition(cur_pos);
                });
            }
        });
    });
    
    function initMap() {
        var lat_ = $("#lat").val()?parseFloat($("#lat").val()):-8.603117;
        var lng_ = $("#long").val()?parseFloat($("#long").val()):115.178797;
        var myLatLng = {lat: lat_, lng: lng_}
    
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: myLatLng,
            styles: [
                {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#263c3f'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#6b9a76'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#38414e'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#212a37'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9ca5b3'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#746855'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#1f2835'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#f3d19c'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{color: '#2f3948'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#17263c'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#515c6d'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#17263c'}]
                }
            ],
        
            // Extra options
            mapTypeControl: false,
            panControl: false,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        });
    
        var image = '{{ asset("assets/img/marker-1.png") }}';
    
        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable:true,
            icon:image,
            title: "{{!empty($title)?$title:'Drag and Find Location'}}"
        });
    
        if(jQuery('#pac-input').length > 0) {
            var input = document.getElementById('pac-input');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                jQuery('#lat').val(place.geometry.location.lat());
                jQuery('#long').val(place.geometry.location.lng());
                marker.setPosition(place.geometry.location);
                map.setCenter(place.geometry.location);
                map.setZoom(15);
            });
        }
        google.maps.event.addListener(marker, 'dragend', function (event) {
            jQuery('#lat').val(event.latLng.lat());
            jQuery('#long').val(event.latLng.lng());
        });
    
        map.addListener('click', function(event) {
            cur_pos = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            };
    
            $("#lat").val(event.latLng.lat());
            $("#long").val(event.latLng.lng());
    
            marker.setPosition(cur_pos);
        });
    
        if(navigator.geolocation && (!$("#lat").val() || !$("#long").val())) {
            navigator.geolocation.getCurrentPosition(function(position) {
                cur_pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
        
                $("#lat").val(position.coords.latitude);
                $("#long").val(position.coords.longitude);
        
                map.setCenter(cur_pos);
                marker.setPosition(cur_pos);
            });
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop