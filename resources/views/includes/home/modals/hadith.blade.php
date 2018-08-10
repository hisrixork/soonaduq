<!-- Button trigger modal -->
<button type="button" id="btnModalHadith" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalHadith">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade top" id="modalHadith" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-top modal-fluid w-100 h-100" role="document">
        <div class="modal-content modal-bg h-100 black">
            <div class="modal-overlay"></div>
            <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                <button type="button" class="close d-none" data-dismiss="modal" id="btnCloseHadith"
                        aria-label="Close"></button>
                <div id="modalHadithTitle">
                    <div class="row my-5 d-flex justify-content-center align-items-center w-100">
                        <h2 class="text-center mx-auto" id="modalHadithTitleValue">
                        </h2>
                    </div>
                </div>
                <div id="modalHadithMain">
                    <div class="row ayah-arb my-5 fa-4x d-flex justify-content-center align-items-center w-100">
                        <label class="text-center mx-auto">
                        </label>
                    </div>
                </div>
                <div id="modalHadithReport" class="w-100 px-3">
                    <div class="row my-5 w-100">
                        <h4 class="text-right font-italic w-100" id="modalHadithReportValue">
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>