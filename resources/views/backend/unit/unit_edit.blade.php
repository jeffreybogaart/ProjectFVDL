@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Eenheid bewerken - {{ $unit->name }}  </h4><br><br>
            

            <form method="post" action="{{ route('unit.update') }}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{ $unit->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Eenheid</label>
                <div class="form-group col-sm-4">
                    <input name="name" value ={{ $unit->name }} class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->        
            
 


        
<input type="submit" class="btn btn-primary waves-effect waves-light" value="Eenheid opslaan">
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
            },
            messages :{
                name: {
                    required : 'Voer hierboven de juiste eenheid in',
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
