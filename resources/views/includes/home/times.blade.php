<div class="h-50">
    @foreach($times as $name => $time)
        <div class="time-item row d-flex justify-content-center align-items-center flex-row border-top"
             data-time="{{ $name }}">

            <div class="time-name col-4 text-left">
                {{ ucfirst($name) }}
            </div>

            <div class="time-hour col-5 text-center">
                {{ \Carbon\Carbon::parse($times->$name->date, 'Europe/Paris')->format('H:i') }}
            </div>

            <div class="time-wait col-3 text-right arab">
                {{ \App\Helpers::translate($name) }}
            </div>
        </div>
    @endforeach
</div>