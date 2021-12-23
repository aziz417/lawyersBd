<style>
    .hireNowModal input{
        border: 2px solid #dddddd;
    }
    .hireNowModal select{
        border: 2px solid #dddddd;
    }
    .hireNowModal textarea{
        border: 2px solid #dddddd;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="exampleModalLongTitle">Submit Your Case</h5>
                <button type="button" style="font-size: 50px; margin-top: -43px" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-6">
                <form class="hireNowModal" id="caseSubmit" enctype="multipart/form-data" method="post" action="{{ route('case.store') }}">
                    @csrf

                    <input name="lawyer_id" type="hidden" id="lawyer_id">
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" required placeholder="Money Loss">
                    </div>
                    <div class="form-group">
                        <label for="caseType">Case Type<span class="text-danger">*</span></label>
                        <select id="caseType" class="form-control" name="caseTypeId">
                            <option selected>Choose...</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"> {{ ucwords($type->title) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding-left: 0 !important;">
                            <label for="caseDate">Case Date<span class="text-danger">*</span></label>
                            <input name="caseDate" type="text" class="form-control" id="caseDate">
                        </div>
                        <div class="form-group col-md-6" style="padding-right: 0 !important;">
                            <label for="coteDate">Cote Date<span class="text-danger">*</span></label>
                            <input name="coteDate" type="text" class="form-control" id="coteDate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" type="text" class="form-control" id="description" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="documentation">Documentation</label>
                        <input name="documentation" type="file" class="form-control" id="documentation" placeholder="1234 Main St">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="submit" class="btn btn-primary" id="caseSubmit" onclick="fromSubmit()">Case Submit</button>
            </div>
        </div>
    </div>
</div>
