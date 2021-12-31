<style type="text/css">
    #succ{
        color: white;
         background-color: DodgerBlue;
    }
</style>
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="advanced_search" action="{{route('comptes.filtre')}}" class="clearfix row" name="advanced_search" method="get">
                    @csrf
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="type">{{__('users/annonce.type_annonce')}}</label>
                                    <select id="type" class="show-menu-arrow form-control" name="type">
                                    	<option value="" > -- {{__('users/annonce.type_annonce')}} -- </option>
                                        <option value="0">Boutique</option>
                                        <option value="1">Particulier</option>
                                        <option value="3">Artiant créateur</option>
                                        <option value="2">Artisant</option>
                                        <option value="4">Ingénieur</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="category" style="display: none">
                                    <label for="categories">{{__('users/annonce.categorie')}}</label>
                                    <select id="category_id" class="show-menu-arrow form-control" name="category">
                                    	<option value="" > -- {{__('users/annonce.categorie')}} -- </option>
                                        
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="service" style="display: none">
                                    <label for="services">{{__('users/annonce.service')}}</label>
                                    <select id="services" class="show-menu-arrow form-control" name="service">
                                    	<option value="" > -- {{__('users/annonce.service')}} -- </option>
                                        @if(count(Services())>0)
                                    	@foreach(Services() as $service)
                                       	    <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <label for="location">{{__('users/annonce.wilaya')}}</label>
                                    <select id="wilaya_id" name="wilaya" class="show-menu-arrow form-control">
                                    	<option value="" > -- {{__('users/annonce.wilaya')}} -- </option>
                                    	@if(count(Wilayas())>0)
                                    	@foreach(Wilayas() as $wilaya)
                                        	<option value="{{$wilaya->id}}">{{$wilaya->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 commune" style="display: none">
                                   <label for="location">{{__('users/annonce.commune')}}</label>
                                    <select id="commune_id" class="show-menu-arrow form-control" name="commune">
                                    	<option value="" >-- {{__('users/annonce.commune')}} --</option>
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
