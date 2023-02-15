 @extends('product.layout')

 @section('content')
     <div class="jumbotron jumbotron-fluid">
         <div class="container">
             <h1 class="display-6">Laravel Application CRUD</h1>
             <p class="lead">Sameh Mashhrawi 120200110 , UCAS</p>
         </div>
     </div>

     @if ($msg = Session::get('Success'))
         <div class="alert alert-success">
             <p>{{ $msg }} </p>
         </div>
     @endif

<?php $i=0 ?>
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">Name</th>
                 <th scope="col">Ditails</th>

             </tr>
         </thead>
         <tbody>
            @foreach ($products as $product)
             <tr>
                 <th>{{++$i}} </th>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->detaills }}</td>
                 <td>
                     <form action="{{ route('product.destroy', $product->id) }}" method="POST">

                         <a class="btn btn-info" href="{{ route('product.show', $product->id) }}">Show</a>

                         <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>

                         @csrf
                         @method('DELETE')

                         <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                 </td>
             </tr>
              @endforeach
         </tbody>
     </table>


     <div class="pull-right">
         <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
     </div>
 @endsection
