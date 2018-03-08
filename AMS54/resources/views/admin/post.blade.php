@extends('theme.app.app')

@section('activep')
{{'active'}}
@endsection
@section('main-content')

 <!-- quick email widget -->
 
@if (session('success'))
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>  {{ session('success') }}!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    @endif

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Post</h3>
            </div>
            <div class="box-body">
              <form action="/post" method="post" enctype="multipart/form-data">

              	{{csrf_field()}}
                <div class="form-group">
                	<label for="title">Post Title:</label>
                	 
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title Here">
                </div>
                <div class="form-group">
                	<label for="title">Post Category:</label>
                	 
                  <input type="text" class="form-control" name="category" id="category" placeholder="Enter Catgory Here">
                </div>
                <div class="form-group">
                  <label for="subtitle">Slug:</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug Here">
                </div>
                 <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" class="form-control" name="image" id="image">
                </div>
                <div>
                	<label for="body">Post Body:</label>
                  <textarea class="textarea" placeholder="Post Body" name="body" id="body" 
                            style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
                <div class="box-footer clearfix">
                 
                  <label>
                    <input type="checkbox" class="pull-left" name="publish"> Publish
                  </label>
              <button type="submit" class="pull-right btn btn-default" id="savePost">Save
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
              </form>
            </div>
            
          </div>
@endsection