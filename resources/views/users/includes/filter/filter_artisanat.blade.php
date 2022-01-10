<style type="text/css">
    #succ{
        color: white;
         background-color: DodgerBlue;
    }
</style>
<div class="modal fade" id="filter_artisanat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="advanced_search" action="{{route('comptes.filtre.artisanat')}}" class="clearfix row" name="advanced_search" method="get">
                    @csrf
                    @isset($category)
                        <input type="hidden" name="category" value="{{$category->id}}">
                    @endisset
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <label for="keyword">Mot clé</label>
                        <input type="text" name="keyword" class="show-menu-arrow form-control">
                        <!-- <select id="category_id" class="show-menu-arrow form-control" name="category">
                            @isset($category)
                            <option value="{{$category->id}}">-- categorie --</option>
                            @else
                            <option value="">-- categorie --</option>
                            @endisset
                        	@if(count(CategoriesArtisanat())>0)
                            @foreach(CategoriesArtisanat() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            @endif
                            
                        </select> -->
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <label for="location">{{__('users/annonce.wilaya')}}</label>
                        <select id="" name="wilaya" class="wilaya_id show-menu-arrow form-control">
                        	<option value="" > -- {{__('users/annonce.wilaya')}} -- </option>
                        	@if(count(Wilayas())>0)
                        	@foreach(Wilayas() as $wilaya)
                            	<option value="{{$wilaya->id}}">{{$wilaya->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 commune">
                       <label for="location">{{__('users/annonce.commune')}}</label>
                        <select id="" class=" show-menu-arrow form-control" name="commune">
                        	<option value="" >-- {{__('users/annonce.commune')}} --</option>
                            <optgroup class="commune_id">
                                
                            </optgroup>
                        </select>
                    </div>

                   
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block"><i class="icofont icofont-home-search"></i> {{__('users/annonce.search')}}</button>
                    </div>
                </form>
        	</div>
    	</div>
	</div>
</div>
