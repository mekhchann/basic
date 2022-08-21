@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blogs Page </h4> <br>

                <form method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                            @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                              <select class="form-select" name="blog_category_id" aria-label="Default select example">
                                    <option selected="">Select Category Name</option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->blog_category}}</option>
                                    @endforeach
                              </select>
                                @error('blog_category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                          </div>
                        </div>
                        <!-- end row -->

                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input name="blog_title" class="form-control" type="text" value=""  id="example-text-input">
                                @error('blog_title')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- end row -->
                        <div class="row mb-3">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                          <div class="col-sm-10">
                              <input name="blog_tags" class="form-control" type="text" value="" data-role="tagsinput">
                          </div>
                      </div>

                      <!-- end row -->


                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Descriptio</label>
                            <div class="col-sm-10">
                              <textarea name="blog_description" id="elm1">

                              </textarea>
                            </div>
                        </div>
                        <!-- end row -->

                      <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-sm-10">
                            <input name="blog_image" class="form-control" type="file" value="  "  id="image">
                        </div>
                      </div>
                      <!-- end row -->

                        <div class="row mb-3">
                             <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutpage->about_image))? url( $aboutpage->about_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                            </div>
                        </div>
                    <!-- end row -->
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
                </form>



                    </div>
                </div>
            </div> <!-- end col -->
            </div>


    </div>
</div>
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
@endsection
