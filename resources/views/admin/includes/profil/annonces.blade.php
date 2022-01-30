<style type="text/css">
	.prj-item .project-icon img {
    display: block;
    margin: 0px auto 0px;
    float: none;
    max-width: 159px;
    height: 112px;
}
</style>
	<div class="col-md-12 col-xs-12">
		
		<div class="prj-list row">
			@isset($user->annonces)
                @foreach($user->annonces as $key => $annonce)
					<div class="col-lg-4 col-md-6 col-xs-12 margin-bottom-30">
						<a href="{{route('users.annonces.show',$annonce -> uuid)}}" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="{{asset('AnnonceDz/public/Annonces/'.$annonce->id.'/'.$annonce->attachements[0]->file_name)}}" alt="NeedClic">
								</div>
								<h3>{{$annonce ->titre}}</h3>
								
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<div class="points">
										@if($annonce ->status==1)  <span class="text-success">{{__('admin/annonces.active')}} </span> @else <span class="text-danger"> {{__('admin/annonces.notActive')}} </span> @endif
									</div>
									<div class="views">
										<i class="fa fa-eye"></i> {{$annonce ->count_viewed}}
									</div>
									<span class="feedable-time timeago">{{date_format($annonce->created_at,'d-M-Y')}}</span>
								</div>
							</div>
						</a>
					</div>
			    @endforeach
            @endisset
			<!-- .col-lg-4 col-md-6 project-item -->
		</div>
		
	</div>
