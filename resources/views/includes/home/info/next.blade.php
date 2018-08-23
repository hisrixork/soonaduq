<div class="info-next-time text-center fa-3x w-100">
    <div class="info-next-time-label align-self-start">
        <div class="row">
            <label for="label" class="mx-auto">Prochaine prière :</label>
        </div>
        <div class="row">
            <span id="label" class="text-uppercase mx-auto">
                <span id="phonetic"></span>
                <span id="arab" class="arab"></span>
            </span>
        </div>
    </div>
    <div class="info-next-time-value mx-auto text-center fa-2x">
        <label id="next-hour">{{ \App\Helpers::nextTime($times)->format('H') }}</label>
        <label class="">:</label>
        <label id="next-minute">{{ \App\Helpers::nextTime($times)->format('i') }}</label>
        <label class="">:</label>
        <label id="next-second">{{ \App\Helpers::nextTime($times)->format('s') }}</label>
    </div>
</div>