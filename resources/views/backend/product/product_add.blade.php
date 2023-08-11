@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Product toevoegen </h4><br><br>
            

            <form class="row g-3" method="post" action="{{ route('product.store') }}" id="myForm" >
                @csrf
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="naam" class="form-label">Productnaam</label>
                        <input name="name" class="form-control" type="text">
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputAddress" class="form-label">Omschrijving</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="form-label">Leverancier</label>
                        <select name="leverancier_id" class="form-select" aria-label="Default select example">
                            <option selected="">Kies hieronder een leverancier</option>
                            @foreach ($supplier as $supp )
                            <option value="{{ $supp->id }}">{{ $supp->name }}</option> 
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="article_no" class="form-label">Artikelnummer leverancier</label>
                        <input name="article_no" class="form-control" type="text">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Categorie</label>
                        <select name="categorie_id" class="form-select" aria-label="Default select example">
                            <option selected="">Kies hieronder een categorie</option>
                            @foreach ($category as $ctg )
                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option> 
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Eenheid <- nog niet zeker?</label>
                        <select name="eenheid_id" class="form-select" aria-label="Default select example">
                            <option selected="">Kies hieronder een eenheid</option>
                            @foreach ($unit as $eh )
                            <option value="{{ $eh->id }}">{{ $eh->name }}</option> 
                            @endforeach
                        </select>
                  </div>

                </div>
                
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="p_price" class="form-label">Inkoopprijs</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                            </div>
                            <input name="p_price" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="s_price" class="form-label">Verkoopprijs excl. BTW</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                            </div>
                            <input name="s_price" class="form-control" type="text">
                        </div>
                    </div>

                    

                </div> 

            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Product toevoegen</button>
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
                 description: {
                    required : false,
                },
                 leverancier_id: {
                    required : true,
                },
                 categorie_id: {
                    required : true,
                },
                eenheid_id: {
                    required : true,
                },
                price: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Voer productnaam in',
                },
                description: {
                    required : 'Voer een omschrijving in',
                },
                leverancier_id: {
                    required : 'Leverancier verplicht',
                },
                categorie_id: {
                    required : 'Categorie verplicht',
                },
                eenheid_id: {
                    required : 'Kies een eenheid',
                },
                price: {
                    required : 'Prijs verplicht',
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
