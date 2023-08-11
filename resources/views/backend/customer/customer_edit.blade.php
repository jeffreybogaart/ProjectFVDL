@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Klant bewerken - {{ $customer->name }}  </h4><br><br>
            
                <form class="row g-3" method="post" action="{{ route('customer.update') }}" id="myForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $klant->id }}">

                    <div class="form-group col-md-12">
                        <label for="email" class="form-label">Naam</label>
                        <input name="name" value="{{ $customer->name }}" class="form-control" type="text">
                      </div>
                      <div class="form-group col-6">
                        <label for="inputAddress" class="form-label">Adres</label>
                        <input name="address" value="{{ $customer->address }}" class="form-control" type="text"">
                      </div>
                      <div class="form-group col-md-2">
                          <label for="inputZip" class="form-label">Postcode</label>
                          <input name="postalcode" value="{{ $customer->postalcode }}" class="form-control" type="text">
                        </div>
                      <div class="form-group col-md-4">
                        <label for="inputCity" class="form-label">Plaats</label>
                        <input name="place" value="{{ $customer->place }}" class="form-control" type="text">
                      </div>    
                      <div class="form-group col-md-4">
                        <label for="email" class="form-label">E-mailadres contactpersoon</label>
                        <input name="email" value="{{ $customer->email }}" class="form-control" type="email">
                      </div>
                    <div class="form-group col-md-4">
                      <label for="email" class="form-label">E-mailadres rapportages</label>
                      <input name="emailcp" value="{{ $customer->emailcp }}" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email" class="form-label">Telefoonnummer</label>
                        <input name="phone" value="{{ $customer->phone }}" class="form-control" type="text">
                      </div>

                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                      </div>
                    </div>
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
                emailcp: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Voer de naam van de klant in',
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
                emailcp: {
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

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

<script type="text/javascript">
    
    $("#maintenancereport").on("change", function (changeEvent) {
  if (!window.FileReader) return; // not supported
  for (var i = 0; i < changeEvent.target.files.length; ++i) {
    (function (file) {
      // Give user some interface feedback before reading.
      $("<li/>").append($("<a/>", {href: "#"+file.name}).text(file.name)).appendTo("#toc");
      var loader = new FileReader();
      loader.onload = function (loadEvent) {
        if (loadEvent.target.readyState != 2)
          return;
        if (loadEvent.target.error) {
          alert("Fout bij lezen van bestand " + file.name + ": " + loadEvent.target.error);
          return;
        }
       
      };
      loader.readAsText(file);
    })(changeEvent.target.files[i]);
  }
});

</script>


 
@endsection 
