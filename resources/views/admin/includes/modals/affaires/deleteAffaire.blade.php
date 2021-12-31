<div class="modal fade" id="delete_affaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('admin/affaires.delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.affaires.delete') }}" method="post" >
                    {{ csrf_field() }}
                    <input type="hidden" name="uuid" id="uuid" value="">
                    <div class="form-group row">
                        <label for="employe" class="col-sm-12 col-form-label">
                            Etes-vous sur de supprimer cette affaire ?
                        </label>
                           
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-danger" id="submit"><i class="fa fa-trash"></i> Supprimer</button>
            </div>
            </form>
        </div>
    </div>
</div>
