<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Create Product</title>
</head>
<body>


<div class="container">

   <div class="row">
       <section class="panel panel-default">
           <div class="panel-heading" style="margin-top:20px">
               <a href="{{route('products.index')}}" class=" btn btn-secondary btn-sm">Back To List</a>
           </div>
           <div class="panel-heading">
               <h3 class="panel-title">Add product</h3>
           </div>
           <div class="panel-body">

               <form action="{{route('products.store')}}" method="POST" class="form-horizontal" role="form">
                   @csrf


                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                       <label for="name" class="col-sm-3 control-label">Product Name</label>
                       <div class="col-sm-9">
                           <input type="text" class="form-control" name="name" id="name" placeholder="product name">
                           @if ($errors->has('name'))
                               <span style="color:red">
                               <strong>{{ $errors->first('name') }}</strong>
                              </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group {{ $errors->has('category_id') ? ' has-danger' : '' }}">
                       <label for="lang" class="col-sm-3 control-label">Product Category</label>
                       <div class="col-sm-3">
                           <select name="category_id" class="form-control select" >
                               <option value="">Select Category</option>
                               @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                           </select>
                           @if ($errors->has('category_id'))
                               <span style="color:red">
                               <strong>{{ $errors->first('category_id') }}</strong>
                              </span>
                           @endif
                       </div>
                   </div>



                   <div class="form-group {{ $errors->has('lang_id') ? ' has-danger' : '' }}">
                       <label for="lang" class="col-sm-3 control-label">Product Language</label>
                       <div class="col-sm-3">
                           <select name="lang_id" class="form-control select">
                               <option value="">Select language</option>
                               @foreach($languages as $lang)
                               <option value="{{$lang->id}}">{{$lang->lang}}</option>
                               @endforeach
                           </select>
                           @if ($errors->has('lang_id'))
                               <span style="color:red">
                               <strong>{{ $errors->first('lang_id') }}</strong>
                              </span>
                           @endif
                       </div>
                   </div>

                   <hr>
                   <div class="form-group">
                       <div class="col-sm-offset-3 col-sm-9">
                           <button type="submit" class="btn btn-primary">Add product</button>
                       </div>
                   </div>
               </form>

           </div>
       </section>
   </div>


</div>




<script>
    $( document ).ready(function() {
        $('.select').select2({

        });
    });
</script>


</body>
</html>
