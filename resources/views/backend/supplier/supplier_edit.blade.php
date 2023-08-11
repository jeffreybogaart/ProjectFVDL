@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Leverancier bewerken - {{ $supplier->name }} </h4><br><br>
            

            <form method="post" action="{{ route('supplier.update') }}" id="myForm" >
                @csrf

            <input type="hidden" name="id" value="{{ $supplier->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Naam leverancier</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" value="{{ $supplier->name }}" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" value="{{ $supplier->address }}" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Postcode</label>
                <div class="form-group col-sm-10">
                    <input name="postalcode" class="form-control" value="{{ $supplier->postalcode }}" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Plaats</label>
                <div class="form-group col-sm-10">
                    <input name="place" class="form-control" value="{{ $supplier->place }}" type="text">
                </div>
            </div>
            <!-- end row -->
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telefoonnummer</label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" value="{{ $supplier->phone }}" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">E-mailadres</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" value="{{ $supplier->email }}" type="email">
                </div>
            </div>
            <!-- end row -->
            
 


        
<input type="submit" class="btn btn-primary" value="Opslaan">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 address: {
                    required : true,
                },
                 postalcode: {
                    required : true,
                },
                 place: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                email: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Voer de naam van de leverancier in',
                },
                address: {
                    required : 'Voer het adres in',
                },
                postalcode: {
                    required : 'Voer de postcode in',
                },
                place: {
                    required : 'Voer de plaatsnaam in',
                },
                phone: {
                    required : 'Voer het telefoonnummer in',
                },
                email: {
                    required : 'Voer het e-mailadres in',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


 
@endsection 
