@extends('layouts.app')

@section('title', 'Slider')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Slider</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td><img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="" style="height: 80px; width: 120px;"></td>
                                            <td>
                                                <a href="{{route('slider.edit', $slider->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{route('slider.destroy', $slider->id)}}" id="delete-form-{{$slider->id}}" method="post" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are You Want to Delete This'))
                                                {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$slider->id}}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }
                                                "><i class="material-icons"></i>Delete</button>
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
    </div>

@endsection

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush

