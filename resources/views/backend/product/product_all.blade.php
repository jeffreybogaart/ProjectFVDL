@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Alle producten</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    

   @can('add-products')
       
   <a href="{{ route('product.add') }}" class="btn btn-success " style="float:right;"><i class="ri-user-add-line align-middle font-size-20"></i></a> <br>  <br>               
   @endcan 
                    <h4 class="card-title">Alle producten </h4>


                    <table id="datatable" class="table table-borderless dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="table-light">
                        <tr>
                            
                            <th>Naam</th> 
                            <th>Leverancier </th>
                            <th>Artikelnummer leverancier</th>
                            <th>Categorie</th>
                            <th>Verkoopprijs</th> 
                            
                            <th></th>

                        </thead>


                        <tbody>

                        	@foreach($product as $key => $item)
                        <tr>
                            
                            <td> {{ $item->name }} </td> 
                            <td> {{ $item['supplier']['name']}} </td> 
                            <td> {{ $item->article_no }}</td>
                            <td> {{ $item['category']['name'] }} </td>
                            <td> € {{ $item->s_price }}</td> 
                            
                            
                            <td>
   <a href=" {{ route('product.edit', $item->id) }} "  class="btn btn-success editable-submit btn-sm waves-effect waves-light" title="Bewerken">  <i class="ri-edit-line font-size-16"></i> </a>

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