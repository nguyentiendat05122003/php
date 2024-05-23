

@extends('layouts.defaultAdmin')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <div class="container-fluid">
          <form action="{{route('categories.postAdd')}}" method="POST">
            @csrf
            <div class="card-header mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Add a new Category</h4>
                      <p class="text-muted">Orders placed across your store</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <button class="btn btn-secondary">Discard</button>
                      <button class="btn btn-primary">Save draft</button>
                      <button type="submit" class="btn btn-primary">Publish category</button>
                    </div>
                
                  </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">                   
                    <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title mb-0">Category information</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-name">Name</label>
                            <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Category name" name="name" aria-label="Product title">
                          </div>
                          
                            <div>
                                <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                                <div class="form">
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>                
                </div>
               

          </form>
            <!-- Page Heading -->

        </div>
    </div>
    

  
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    
</div>

@stop