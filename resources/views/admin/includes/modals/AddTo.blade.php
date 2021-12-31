<div class="modal fade" id="AddTo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter la publicité au : </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.publicite.changeStatus')}}" method="post" >
                    {{ csrf_field() }}
                    <input type="hidden" name="uuid" id="uuid" value="">
                    <div class="form-group row">
                        <label for="employe" class="col-sm-12 col-form-label">
                            Ajouter la publicité au :
                        </label>
                        <select class="form-control" name="in_home">
                        	<option value="1">Haut d'accueill</option>
                        	<option value="5">bas d'accueil</option>
                        	<option value="2">Tout les categories</option>
                        	<option value="3">Annonces</option>
                        	<option value="4">Comptes</option>	
                        </select>
                           
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" id="submit"> Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
