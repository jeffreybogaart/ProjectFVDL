@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Alle leveranciers</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    

    <a href="{{ route('supplier.add') }}" class="btn btn-success " style="float:right;"><i class="ri-user-add-line align-middle font-size-20"></i></a> <br>  <br>               

                    <h4 class="card-title">Alle leveranciers </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="table-light">
                        <tr>
                            
                            <th>Naam</th> 
                            <th>Adres </th>
                            <th>Postcode</th> 
                            <th>Plaats</th>
                            <th>E-mailadres</th> 
                            <th>Telefoonnummer</th>
                            <th>Actie</th>

                        </thead>


                        <tbody>

                        	@foreach($suppliers as $key => $item)
                        <tr>
                            
                            <td> {{ $item->name }} </td> 
                             <td> {{ $item->address }} </td> 
                              <td> {{ $item->postalcode }} </td> 
                               <td> {{ $item->place }} </td>
                               <td> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a> </td> 
                               <td> {{ $item->phone }} </td>  
                            <td>
   <a href=" {{ route('supplier.edit', $item->id) }} " class="btn btn-success editable-submit btn-sm waves-effect waves-light" title="Bewerken">  <i class="ri-edit-line font-size-16"></i> </a>

     <a href=" {{ route('supplier.delete', $item->id) }}  " class="btn btn-danger editable-cancel btn-sm waves-effect waves-light" title="Verwijderen" id="delete">  <i class="ri-delete-bin-line font-size-16"></i> </a>

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