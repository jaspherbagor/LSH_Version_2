@extends('admin.layout.app')

@section('heading', $accommodation_type->name)

@section('right_top_button')
<a href="{{ route('admin_accommodation_add', $accommodation_type->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accommodations as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="accommodation_type_image" class="w_200"></td>
                                        <td>{{ $row->address }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_accommodation_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_accommodation_add',$row->id) }}" class="btn btn-success">See Rooms</a>
                                            <a href="{{ route('admin_accommodation_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete {{ $row->name }}?');">Delete</a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
