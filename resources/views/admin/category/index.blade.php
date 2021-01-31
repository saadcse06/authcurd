@extends('layouts.app')

@section('title', 'Category')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key=>$category)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="{{route('category.update', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{route('category.destroy', $category->id)}}" id="delete-form-{{$category->id}}" method="post" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are You Want to Delete This'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$category->id}}').submit();
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

