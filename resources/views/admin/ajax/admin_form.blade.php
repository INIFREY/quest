
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">{{$target?"Red":"Dod"}} Horizontal form</h5>
            </div>

            <form action="#" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">First name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Eugene" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Last name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Kopyov" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="eugene@kopyov.com" class="form-control">
                            <span class="help-block">name@domain.com</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone #</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
                            <span class="help-block">+99-99-9999-9999</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Address line 1</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">City</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Munich" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">State/Province</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Bayern" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">ZIP code</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="1031" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit form</button>
                </div>
            </form>
        </div>
    </div>
