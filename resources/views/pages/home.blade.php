@extends('layouts.app')

@section('content')

    <div class="all-hour position-absolute">
        @if(($today = \Carbon\Carbon::now('Europe/Paris')) !== null)
            <div class="h-50 d-flex justify-content-center align-items-center flex-column position-relative">
                <div class="info-hour fa-3x align-self-center">{{ $today->format('H:i') }}</div>
            </div>
        @endif
    </div>

    <div class="row">

        <div class="col-md-8 col-lg-8 col-xl-9">
            @include('includes.home.data', ['data' => $data])

            <div class="info-container h-100 d-flex justify-content-center align-items-center flex-column">

                @include('includes.home.infoheader')

                <div class="h-5 d-flex justify-content-start align-items-center flex-column w-100">

                    @include('includes.home.infonext', [
                    'times' => $data->times
                    ])

                </div>

                {{--@include('includes.home.infonew')--}}

            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3 px-0 border-righ bg-white text-dark">

            <div class="time-container h-100">

                @include('includes.home.sideinfo')

                @include('includes.home.times', [
                'times' => $data->times
                ])
            </div>
        </div>

        @include('includes.home.modals.phone')
        @include('includes.home.modals.adhan', [
        'adhan' => $data->adhan
        ])
        @include('includes.home.modals.duaa',[
        'duaa' => \App\Helpers::getAdhanDuaa()
        ])
        @include('includes.home.modals.ayah')
        @include('includes.home.modals.hadith')
        @include('includes.home.modals.iqama',[
        'iqama' => $data->adhan
        ])

        @include('includes.home.tone')
        @include('includes.transition')
        @include('includes.preload')

    </div>

@endsection

@section('javascript')

    <script type="application/javascript" src="{{ asset('js/home/adhan.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/home/phone.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/home/duaa.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/home/ayah.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/home/hadith.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/home/iqama.js') }}"></script>

@endsection
