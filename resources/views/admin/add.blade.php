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
    <h1 style="margin-left:20px">ADD Products</h1>
@if($errors->any())
    <div>Error add product</div>
@endif  
<div style="max-width:500px;margin-left:20px">
    <form action="" method="POST">
        <div class="mb-3">
            <label  class="form-label" for="">Name product</label>
            <input class="form-control" type="text" name="ProName" placeholder="name product" value="{{old('ProName')}}">
            @error('ProName')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Meta title</label>
            <input class="form-control" type="text" name="Metatitle" placeholder="Metatitle product" value="{{old('Metatitle')}}">
            @error('Metatitle')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Category</label>
            <select class="form-select" onselect="return "  name="CatID" id="">
                <option  value="0">Choose Category</option>
                @if(!empty($allCategory))
                    @foreach ($allCategory as $item)
                        <option value="{{$item->CatID}}" {{old('CatID') == $item->CatID ? 'selected':false}}>{{$item->CatName}}</option>
                    @endforeach
                @endif
            </select>
            @error('CatID')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
    
        <div class="mb-3">
            <label class="form-label"  for="">Status</label>
            <select class="form-select"  name="Status" id="">
                <option value="status">Choose Status</option>
                <option value="1"  {{old('Status')==1 ? 'selected':false}}>Active</option>
                <option value="0" {{old('Status')==0 ? 'selected':false}}>In active</option>
            </select>
           
        </div>
        <button class="btn btn-primary">Add</button>
        <button class="btn btn-danger"><a style="text-decoration: none;color:#fff" href="{{route('products.index')}}">Back</a></button>
        @csrf
    </form>
</div>
</body>
</html>