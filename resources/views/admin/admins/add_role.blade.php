@extends('admin.layouts.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="content-wrapper">


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('admin.role-add')}}" method="post" enctype="multipart/form-data" style="width: 100%;">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       class="form-control"
                                       name="role_name"
                                       placeholder="Nhập tên vai trò"
                                       value=""
                                >

                            </div>

                            <div class="form-group">
                                <label>Mô tả vai trò</label>

                                <textarea
                                    class="form-control"
                                    name="display_name" rows="4"></textarea>

                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        checkall
                                    </label>
                                </div>

                                    @foreach($permission as $item)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header" style="background-color: #00e765">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            {{$item->display_name}}
                                        </div>
                                        <div class="row">
                                                @foreach($item->permissionsChildrent as $itemchildrent)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                   class="checkbox_childrent"
                                                                   value="{{$itemchildrent->id}}">
                                                        </label>
                                                        {{$itemchildrent->permission_name}}
                                                    </h5>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach



                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection
