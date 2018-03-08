@extends('theme.app.app')

@section('actived')
{{'active'}}
@endsection
@section('main-content')


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               

                <tbody><tr>
                  <th>ID</th>
                  <th>User_Id</th>
                  <th>Name</th>
                  <th>Desc.</th>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>

@foreach($products as $product)




                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->user_id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{substr($product->desc,0,50)}}{{'....'}}</td>
                  <td>{{$product->category}}</td>
                  <td><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                  <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
 <i class="fa fa-trash" aria-hidden="true"></i>
</button></td>
                </tr>




<!-- //delete model --> 
<div class="modal modal-danger fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 350px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-book"></i> Delete Product Data </h4>
          </div>
          <div class="modal-body">
            <div class="box-body table-responsive">
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <input type="hidden" id="delete-id" name="delete-id" />
                    <input type="hidden" id="delete-title" name="delete-title" />
                    <p>Are you sure to delete this data ?</p>
                    <!-- <div class="callout callout-danger">
                      <p>Title: <span class="delete-title"> </span></p>
                      <p>Author: <span class="delete-author"> </span></p>
                    </div> -->
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>


           
           


 <form method="POST" action="/product/{{$product->id}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            
             <button id="btn-delete" type="submit" class="btn btn-primary delete-use"><i class="fa fa-check"></i> Yes</button>
        </div>
    </form>


          </div>
            
          </div>
        </div>
      </div>
    </div>



                @endforeach
               

              </tbody>
                

              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing {{$products->count()}} of {{$products->total()}} entries</div></div><div class="col-sm-7"> {{$products->links()}}</div></div>
            </div>
            <!-- /.box-body -->
          </div>

</div> 





@endsection