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
		<div class="">
			<a href="{{route('users.albums.create')}}" class="btn btn-info btn-submit-prj btn-sm waves-effect waves-light">{{__('users/albums.add_album')}}</a>
		</div>

		<div class="prj-list row">
			@isset($albums)
                @foreach($albums as $key => $album)
					<div class="col-lg-4 col-md-6 col-xs-12 margin-bottom-30">
						<a href="{{route('users.albums.show',$album -> uuid)}}" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$album->attachements[0]->file_name)}}" alt="NeedClic">
								</div>
								<h3>{{$album ->title}}</h3>
								
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<span class="feedable-time timeago">{{date_format($album->created_at,'d-M-Y')}}</span>
								</div>
							</div>
						</a>
					</div>
			    @endforeach
            @endisset
			<!-- .col-lg-4 col-md-6 project-item -->
		</div>
		
	</div>
