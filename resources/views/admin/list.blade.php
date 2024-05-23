<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/js/app.js'])
</head>
<body>
  <h1>Products</h1>
@if(session('msg'))
    <div>{{session('msg')}}</div>
@endif
<a href="{{route('products.add')}}" class="btn btn-primary">Add product</a>
<a href="{{route('logout')}}" class="btn btn-primary">Logout</a>

<form action="" method="get">
  <div class="row mt-3">
    <div class="col-3">
      <select class="form-select"  name="Status" id="">
        <option value="0">Tat ca trang thai</option>
        <option value="active" {{request()->Status === 'active' ? 'selected': false}}>Active</option>
        <option value="inactive" {{request()->Status === 'inactive' ? 'selected': false}}>InActive</option>
      </select>
    </div>
    <div class="col-3">
      <select class="form-select"  name="catID" id="">
        <option value="0">Chon nhom</option>
        @if(!empty(getAllCategories()))
          @foreach (getAllCategories() as $item)
            <option value="{{$item->CatID}}" {{request()->catID == $item->CatID ? 'selected': false}}>{{$item->CatName}}</option>
          @endforeach
        @endif
      </select>
    </div>
    <div class="col-4">
      <input class="form-control"  type="search" name="keywords" placeholder="Search..." value="{{request()->keywords}}">
    </div>
    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
  </div>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col"><a href="?sort-by=ProName&sort-type={{$sortType}}">ProName</a></th>
        <th scope="col">Metatitle</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
       @if (!@empty($productList))
       @foreach ($productList as $key =>$item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->ProName}}</td>
            <td>{{$item->Metatitle}}</td>
            <td>{{$item->categoryName}}</td>
            <td>{!!$item->Status == 0 ? '<button class="btn btn-danger">InActive</button>' : '<button class="btn btn-success">Active</button>'!!}</td>
            <td>
                <button class="btn btn-warning"><a style="text-decoration: none;color:#000;" href="{{route('products.edit',['id'=> $item->ProID])}}">Edit</a></button>
            </td>
            <td>
                <button class="btn btn-dark"><a style="text-decoration: none;color:#fff;" onclick="return confirm('Ban co muon xoa ko')" href="{{route('products.delete',['id'=> $item->ProID])}}">Delete</a></button>
            </td>   
        </tr>  
       @endforeach
       @else
        <td colspan="4">No one product</td>
        @endif
    </tbody>
  </table>

<div style="display: flex;justify-content: center;">{{$productList->appends($_GET)->links()}}</div>

</body>
</html>