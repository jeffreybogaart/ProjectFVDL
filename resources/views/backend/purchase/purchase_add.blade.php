@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Opdracht aanmaken </h4><br><br>

    <div class ="row">

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="col-sm-8 col-form-label">
                    Inkoop- / opdrachtnummer
                </label>
                <div class="form-group col-sm-10">
                    <input class="form-control" name="purchase_no" type="text" id="purchase_no">
                </div>
            </div>

        </div>
        
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">
                    Datum
                </label>
                <div class="form-group col-sm-10">
                    <input class="form-control example-date-input" name="date" type="date" id="date">
                </div>
            </div>
        </div>

        

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="col-sm-4 col-form-label">
                    Leverancier
                </label>
                <div class="form-group col-sm-10">
                    <select id="supplier_id" name="supplier_id" class="form-select" aria-label="Default select example">
                        <option selected="">Kies hieronder een leverancier</option>
                        @foreach ($supplier as $supp )
                        <option value="{{ $supp->id }}">{{ $supp->name }}</option> 
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">
                    Categorie
                </label>
                <div class="form-group col-sm-10">
                    <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                        <option selected="">Kies hieronder een categorie</option>
                       
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">
                    Product
                </label>
                <div class="form-group col-sm-10">
                    <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                        <option selected="">Kies hieronder een product</option>
                    </select>
                </div>
            </div>
        </div>

<div class="col-md-4">
    <div class="md-3">
        <label for="example-text-input" class="form-label" style="margin-top:50px;"> </label>                 
        <button class="btn btn-success waves-effect waves-light addeventmore">
            <i class="ri-add-line align-middle me-2"></i> Toevoegen
        </button>
        
    </div>
</div>


        
    </div> <!-- end row -->
    
    

           
        </div> <!-- End card body -->
{{-- --------------------------------------- --}}
        <div class="card-body">
            <form method="" action="">
                @csrf
                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Product naam</th>
                            <th>Omschrijving</th>
                            <th>Aantal</th>
                            <th>Prijs per stuk</th>
                            <th>Totaal prijs</th>
                            <th>Actie</th>
                        </tr>
                    </thead>

                    <tbody id="addRow" class="addRow">

                    </tbody>

                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td><input type ="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                            </td>
                            <td></td>
                        </tr>
                    </tbody>

                </table><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="storeButton">Opslaan</button>
                </div>

            </form>




        </div> <!-- End card body -->






    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>





<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{ date }}">
        <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
        <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">
    
        <td>
           <input type="hidden" name="category_id[]" value="@{{ category_id }}"> @{{ category_name }}
        </td>
    
        <td>
            <input type="hidden" name="product_id[]" value="@{{ product_id }}"> @{{ product_name }}
        </td>

        <td>
            <input type="text" class="form-control" name="description">
        </td>
    
         <td>
            <input type="number"  min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
        </td>
    
         <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
        </td>
    
         <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
        </td>
    
         <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click", ".addeventmore", function(){
            var purchase_no = $('#purchase_no').val();
            var date = $('#date').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();


            if (date == ''){
                $.notify("Datum is vereist", {globalPosition: 'top right', className: 'error'});
                return false
            }

            if (purchase_no == ''){
            $.notify("Inkoop- /opdrachtnummer is vereist", {globalPosition: 'top right', className: 'error'});
            return false
            }

            if (supplier_id == ''){
            $.notify("Leverancier is vereist", {globalPosition: 'top right', className: 'error'});
            return false
            }

            if (category_id == ''){
            $.notify("Categorie is vereist", {globalPosition: 'top right', className: 'error'});
            return false
            }

            if (product_id == ''){
            $.notify("Product is vereist", {globalPosition: 'top right', className: 'error'});
            return false
            }


            var source = $("document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date:date,
                purchase_no:purchase_no,
                supplier_id:supplier_id,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name,
            };
            
            var html = template(data);
            $("#addRow").append(html);
            
        });
        
    })

</script>



<script type="text/javascript">
    $(function(){
        $(document).on('change', '#supplier_id', function(){
                var supplier_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-category') }}",
                    type:"GET",
                    data: {supplier_id:supplier_id},
                    success:function(data){
                        var html = '<option value ="">Selecteer categorie</option>';
                        $.each(data,function(key, v){
                            html += '<option value =" '+v.category_id+' ">'+v.category.name+'</option>';
                        });
                        $('#category_id').html(html);
                    }
                })
        });
    });

</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change', '#category_id', function(){
                var category_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-product') }}",
                    type:"GET",
                    data: {category_id:category_id},
                    success:function(data){
                        var html = '<option value ="">Selecteer product</option>';
                        $.each(data,function(key, v){
                            html += '<option value =" '+v.id+' ">'+v.name+'</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
        });
    });

</script>

 
@endsection 
