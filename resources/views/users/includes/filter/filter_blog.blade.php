<style type="text/css">
    #succ{
        color: white;
         background-color: DodgerBlue;
    }
</style>
<div class="modal fade" id="filter_blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('users/blog.search_blog')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="widget clearfix">
                    <div class="search_widget">
                        <form action="{{route('blogs.search')}}" method="get">
                            <input type="text" name="title" class="form-control" placeholder="{{__('users/blog.search_blog')}}">     
                        </form><!-- end search form -->
                    </div><!-- end search_widget -->
                </div><!-- end widget -->

                <div class="widget clearfix">
                    <div class="title"><h3>{{__('users/blog.categorie')}}</h3></div>
                    <ul class="list">
                        @isset($categories)
                        	@foreach($categories as $category)
                        		<li><a title="" href="{{route('blogs.category',$category->slug)}}">{{$category->name}}</a></li>
                        	@endforeach
                        @endisset
                        
                    </ul>
                </div>
        	</div>
    	</div>
	</div>
</div>
