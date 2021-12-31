<style type="text/css">
    #succ{
        color: white;
         background-color: DodgerBlue;
    }
</style>
<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('users/menu.search_annonce')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('annonces.search') }}" method="get" >
                   
                    <input type="text" name="title" value="" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('users/menu.close')}}</button>
                <button type="submit" class="btn " id="succ"> {{__('users/menu.search')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
