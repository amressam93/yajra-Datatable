<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

{{--    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>All Product</title>
</head>
<body>


<div class="container">

    <a href="{{route('products.create')}}" class="btn btn-success btn-small" style="margin-top:15px"> Add Product</a>
    <h4>All Products</h4>



    <div class="form-group">
            <label for="lang" class="col-sm-3 control-label">Filter By Language</label>
            <div class="col-sm-3">
                <select name="lang_id" id="language" class="form-control select">
                    <option value="null">All</option>
                    @foreach($languages as $lang)
                        <option value="{{$lang->id}}">{{$lang->lang}}</option>
                    @endforeach
                </select>
            </div>
    </div>


    <div class="form-group">
        <label for="lang" class="col-sm-3 control-label">Filter By Category</label>
        <div class="col-sm-3">
            <select name="category_id" id="categories" class="form-control select">
                <option value="null">All</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>



    <div class="row">
        <table id="islam" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Language</th>
            </tr>
            </thead>
    <tbody></tbody>
        </table>
    </div>


</div>




<script>
    $(document).ready(function() {

        console.log($("#language").val());
       // console.log('start');
        var table=
            $('#islam').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('products.index') }}",
                    data: function(d){
                        d.lang=$("#language").val(),
                        d.category=$("#categories").val()
                    }
                },
                columns:[
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category.name',
                        name: 'category_id',

                    },
                    {
                        data:'lang.lang',
                        name:'lang_id'
                    }
                ]
            });



    var arrayodids=["#language","#categories"];
    arrayodids.forEach(function (e) {
        $(e).on('change',function () {
            console.log("we are here")
            table.draw();

        });
    })








    });

</script>
</body>
</html>

