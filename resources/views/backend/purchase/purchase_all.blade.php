@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Alle opdrachten</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    

   @can('add-products')
       
   <a href="{{ route('purchase.add') }}" class="btn btn-success " style="float:right;"><i class="ri-user-add-line align-middle font-size-20"></i> Opdracht toevoegen</a> <br>  <br>               
   @endcan 
                    <h4 class="card-title">Alle opdrachten </h4>


                    <table id="datatable" class="table table-borderless dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="table-light">
                        <tr>
                            
                            <th>Opdrachtnummer</th> 
                            <th>Datum </th>
                            <th>Leverancier</th>
                            <th>Categorie</th>
                            <th>Aantal</th> 
                            <th>Productnaam</th>
                            <th>Status</th>
                            <th></th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
                        <tr>
                            
                            <td> {{ $item->purchase_no }} </td> 
                            <td> {{ $item->date }} </td> 
                            <td> {{ $item->supplier_id}} </td> 
                            <td> {{ $item->category_id }} </td>
                            <td> {{ $item->buying_qty }}</td>
                            <td> {{ $item->product_id }} </td>
                            <td> <span class="btn btn-warning">In te plannen</span></td> 
                            
                            
                            <td>
   <a href=" {{ route('product.delete', $item->id) }}  " class="btn btn-danger editable-cancel btn-sm waves-effect waves-light" title="Verwijderen" id="delete">  <i class="ri-delete-bin-line font-size-16"></i> </a>
                            </td>
                            
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection