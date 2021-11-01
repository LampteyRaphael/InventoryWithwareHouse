@extends('users::layouts.pointOfSale', [
   'class' => '',
    'elementActive' => ''
])

@section('content1')

<div class='bg-white' style='height:900px;'>
   <div class="row mt-2">
  @foreach($pointOfSale as $key => $value)
    <div class="col-sm-2">
            <div class="card shadow wow fadeInUp">
                <div class="card-body">
                    <p class="card-text">
                        <img class="img-rounded" height="50" width="50" src="/images/{{$value->item_image}}" alt="">
                    </p>
                    <h5 class="card-title">
                    <a href="" id="setPos">
                          {{$value->name??''}}
                    </a>
                    </h5>
                </div>
            </div>
    </div>
   @endforeach
   </div>
</div>
@endsection

@section('content2')
<div class='bg-white'>
    <ul class="list-group list-group-horizontal mb-2">
        <a class="list-group-item list-group-item-action active bg-primary" href="#">Creditors</a>
        <a class="list-group-item list-group-item-action active bg-warning" href="#">Dues</a>
        <a class="list-group-item list-group-item-action active bg-danger" href="#">Text</a>
        <a class="list-group-item list-group-item-action bg-success" data-toggle='modal' data-target='#sales' href="#" tabindex="-1"><span class='font-size:20px'>+Add</span></a>
    </ul>
    <div class='col-md-12' style='height:700px; max-height:700px; min-height:700px;'>
    <table class="table table-dark">
     <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Charges</th>
                <th>U.Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>

<div style='background-color:200px; height:150px' class='bg-success'>

<div>

<div id="sales" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header shadow bg-primary">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                 {!! Form::open(['method'=>'POST','action'=>'Modules\Users\Http\Controllers\PointOfSaleController@store' ]) !!}
                <div class="row form-group">
                    <div class="col-md-2">
                       {!! Form::label('item_id', 'Item', ['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-8">
                       {!! Form::select('item_id',$item,null, ['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                    {!! Form::label('qty', 'Quanntity', ['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::number('qty',0, ['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
               
                <div class="row form-group">
                    <div class="col-md-2">
                    {!! Form::label('charges', 'Charges', ['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::number('charges',0, ['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>

                 <div class="row form-group">
                    <div class="col-md-2">
                    {!! Form::label('discount', 'Discount', ['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::number('discount',0, ['class'=>'form-control form-control-sm col-md-12']) !!}
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-2">
                    {!! Form::label('sub_total', 'Sub total', ['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::number('sub_total',0, ['class'=>'form-control form-control-sm']) !!}
                    </div>
                </div>
                 <div class="row form-group float-right mr-lg-5">
                    {!! Form::submit('Pay And Print', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
                </p>
            </div>
               <div class="modal-footer bg-primary">
                Point Of Sale
            </div>
        </div>
    </div>
</div>

@endsection