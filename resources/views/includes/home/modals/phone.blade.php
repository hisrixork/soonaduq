<!-- Button trigger modal -->
<button type="button" id="btnModalPhone" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalPhone"
        style="top: 50px">
    Launch phone modal
</button>

<!-- Modal -->
<div class="modal fade left" id="modalPhone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-left modal-fluid w-100" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="close d-none" data-dismiss="modal" id="btnClosePhone"
                        aria-label="Close"></button>
                <div class="row">
                    <div class="part col-6" id="part-1"></div>
                    <div class="part col-6" id="part-2"></div>
                    <div class="part col-6" id="part-3"></div>
                    <div class="part col-6" id="part-4"></div>
                </div>
                <div class="no-phone bg-white rounded-circle d-block m-auto">
                    <img src="/img/no-phone/no-phone-w.svg" alt="No phone" class="animated">
                </div>
            </div>
        </div>
    </div>
</div>

@section('stylesheet')

    <style>




    </style>

@endsection