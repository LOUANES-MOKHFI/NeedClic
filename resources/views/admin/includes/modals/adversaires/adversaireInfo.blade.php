<div class="modal fade" id="getAdversaire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel-1" ><span id="fname"></span> <span id="lname"></span></h4>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.email')}}:</label></div>
                            <div class="col-xs-7" id="email"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.phone')}}:</label></div>
                            <div class="col-xs-7" id="phone"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.fax')}}:</label></div>
                            <div class="col-xs-7" id="fax"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.date_nais')}}:</label></div>
                            <div class="col-xs-7" id="date_nais"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.lieu_nais')}}:</label></div>
                            <div class="col-xs-7" id="lieu_nais"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-3"><label>{{__('admin/adversaire.commune')}}:</label></div>
                            <div class="col-xs-9" id="commune"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-3"><label>{{__('admin/adversaire.adress')}}:</label></div>
                            <div class="col-xs-9" id="adress"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.num_carte_id')}}:</label></div>
                            <div class="col-xs-7" id="numId"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.agree_par')}}:</label></div>
                            <div class="col-xs-7" id="agree"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-5"><label>{{__('admin/adversaire.date_sortie')}}:</label></div>
                            <div class="col-xs-7" id="date_sortie"></div>
                        </div>
                    </div>
                </div>



			</div>
			<div class="modal-footer">
				<button type="button"
                class="btn btn-default btn-sm waves-effect waves-light"
                data-dismiss="modal">{{__('admin/adversaire.close')}}</button>
			</div>
		</div>
	</div>
</div>
