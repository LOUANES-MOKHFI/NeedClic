<div class="modal fade" id="getMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1" ><span id="name"></span> </h4>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/members.email')}}:</label></div>
                            <div class="col-xs-7" id="email"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/members.phone')}}:</label></div>
                            <div class="col-xs-7" id="phone"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/members.date_nais')}}:</label></div>
                            <div class="col-xs-7" id="date_nais"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-3"><label>{{__('admin/members.adress')}}:</label></div>
                            <div class="col-xs-9" id="adress"></div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-3"><label>{{__('admin/members.role')}}:</label></div>
                            <div class="col-xs-9" id="role">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-3"><label>{{__('admin/members.cabinet_name')}}:</label></div>
                            <div class="col-xs-9" id="cabinet">

                            </div>
                        </div>
                    </div>
                </div>


			</div>
			<div class="modal-footer">
				<button type="button"
                class="btn btn-default btn-sm waves-effect waves-light"
                data-dismiss="modal">{{__('admin/members.close')}}</button>
			</div>
		</div>
	</div>
</div>
