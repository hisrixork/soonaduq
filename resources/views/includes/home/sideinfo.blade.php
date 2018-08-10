<div class="logo-side d-flex justify-content-center align-items-center">
    <img src="/img/logo-g.svg" alt="" height="200" width="200">
</div>

@if(($today = \Carbon\Carbon::now('Europe/Paris')) !== null)
    <div class="h-50 d-flex justify-content-center align-items-center flex-column position-relative">
        <div class="info-weather text-right px-2 w-100">
            <img src="" alt="" height="24" width="24" id="wIcon">
            <span id="temp">--</span>
        </div>
        <div class="info-hour fa-5x align-self-center">{{ $today->format('H:i') }}</div>
        <div class="info-date-french text-success">{{ $today->formatLocalized('%A %e %B %Y') }}</div>
        {{--<div class="info-date-arabic text-success">{{ $data->hijri }}</div>--}}
    </div>
@endif