@extends('admin.layout.master')
@push('title') Edit Product
@endpush
@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection
{{--brand,opera,camAfter,camBefore,sim,display,category,ram,cpu,memory,pin--}}
@section('main-panel')
    <div class="">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4><br>
                @if (\Session::has('parent'))
                    <div class="alert text-danger">
                        {{\Session::get('parent')}}
                    </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{route('submitEdit-product')}}"
                      class="forms-sample">
                    @csrf
                    <div class="product-thumbnail">
                        <img height="550px" width="550px" src="{{asset('storage/thumbnail/'.$product->thumbnail)}}"
                             alt="image">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail upload</label><br>
                        <input type="file" id="thumbnail" name="thumbnail">
                    </div>
                    @error('thumbnail')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="is_edit" value="1">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product info</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" value="{{old('name',$product->name)}}" type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Slug</label>
                                        <div class="col-sm-9">
                                            <input name="slug" value="{{old('slug',$product->slug)}}" type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @error('slug')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input name="price" value="{{old('price',$product->price)}}" type="number"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @error('price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" cols="70"
                                                      rows="5">{{old('description',$product->description)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Qty</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="qty"></input>
                                        </div>
                                    </div>
                                </div>
                                @error('qty')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">title</label>
                                        <div class="col-sm-9">
                                            <input value="{{old('title',$product->title)}}" name="title" type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        {{ old('category_id',$product->category_id) == $category->id ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Time Of Launch</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-9">
                                                <input value="{{old('time_of_launch',$product->time_of_launch)}}"
                                                       name="time_of_launch" type="date"
                                                       class="form-control"
                                                       placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                    </div>
                                    @error('time_of_launch')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">
                                            <select name="brand_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($brands as $brand)
                                                    <option
                                                        {{ old('brand_id',$product->brand_id) == $brand->id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('brand_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">operator</label>
                                        <div class="col-sm-9">
                                            <select name="operator_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($operas as $opera)
                                                    <option
                                                        {{ old('operator_id',$product->operator_id) == $opera->id ? 'selected' : '' }} value="{{$opera->id}}">{{$opera->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('operator_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">cpu</label>
                                        <div class="col-sm-9">
                                            <select name="cpu_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($cpus as $cpu)
                                                    <option
                                                        {{ old('cpu_id',$product->cpu_id) == $cpu->id ? 'selected' : '' }}  value="{{$cpu->id}}">{{$cpu->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('cpu_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">camera_after</label>
                                        <div class="col-sm-9">
                                            <select name="camera_after_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($camAfters as $camAfter)
                                                    <option
                                                        {{ old('camera_after_id',$product->camera_after_id) == $camAfter->id ? 'selected' : '' }}  value="{{$camAfter->id}}">{{$camAfter->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('camera_after_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">ram</label>
                                        <div class="col-sm-9">
                                            <select name="ram_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($rams as $ram)
                                                    <option
                                                        {{ old('ram_id',$product->ram_id) == $ram->id ? 'selected' : '' }} value="{{$ram->id}}">{{$ram->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('ram_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">camera_befor</label>
                                        <div class="col-sm-9">
                                            <select name="camera_before_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($camBefores  as $camBefore)
                                                    <option
                                                        {{ old('camera_before_id',$product->camera_before_id) == $camBefore->id ? 'selected' : '' }}  value="{{$camBefore->id}}">{{$camBefore->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('camera_before_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">memory</label>
                                        <div class="col-sm-9">
                                            <select name="memory_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($memorys as $memory)
                                                    <option
                                                        {{ old('memory_id',$product->memory_id) == $memory->id ? 'selected' : '' }} value="{{$memory->id}}">{{$memory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('memory_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">sim</label>
                                        <div class="col-sm-9">
                                            <select name="sim_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($sims as $sim)
                                                    <option
                                                        {{ old('sim_id',$product->sim_id) == $sim->id ? 'selected' : '' }}  value="{{$sim->id}}">{{$sim->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('sim_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">pin</label>
                                        <div class="col-sm-9">
                                            <select name="pin_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($pins as $pin)
                                                    <option
                                                        {{ old('pin_id',$product->pin_id) == $pin->id ? 'selected' : '' }} value="{{$pin->id}}">{{$pin->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('pin_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Parent</label>
                                        <div class="col-sm-9">
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($products as $product_s)
                                                    <option
                                                        {{ old('parent_id',$product->parent_id) == $product_s->id ? 'selected' : '' }}
                                                        value="{{$product_s->id}}">{{$product_s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('parent_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            Is Default
                                            <input name="is_default" type="checkbox" class="form-check-input"
                                                {{$product->is_default == 1 ? 'checked' : ''}}>
                                        </label>
                                    </div>
                                    @error('is_default')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">display</label>
                                        <div class="col-sm-9">
                                            <select name="display_id" class="form-control">
                                                <option>Select</option>
                                                @foreach($displays as $display)
                                                    <option
                                                        {{ request()->input('display_id',$product->display_id) == $display->id ? 'selected' : '' }}  value="{{$display->id}}">{{$display->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('display_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h4 class="card-title">Content</h4>
                    <div class="row">
                        <div class="col-md-12  mt-12">
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea class="ckeditor form-control" name="content">{{old('content',$product->content)}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        @error('content')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.ckeditor').ckeditor();
                        });
                    </script>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
