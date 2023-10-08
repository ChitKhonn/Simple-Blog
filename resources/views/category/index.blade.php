@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    Category List
                </h3>
                <hr>

                <div class="">
                    <a href=" {{ route("category.create") }}  " class="btn btn-outline-dark">Create</a>
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>Owner</td>
                            <td>Control</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    {{ $category->title }}
                                    <br>
                                    <span class="small text-black-50">
                                        {{ Str::limit($category->description, 30, '...') }}
                                    </span>
                                </td>
                                <td> {{ $category->user_id }} </td>
                                <td>
                                    <div>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-warning"> <i class="bi bi-pencil"></i> </a>
                                        <button form="categoryDeleteForm {{$category->id}}"  class=" btn btn-sm btn-outline-danger"> <i class="bi bi-trash3"></i> </button>
                                    </div>
                                    <form  id="categoryDeleteForm {{$category->id}}" class=" d-inline-block" action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>

                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $category->created_at->format("h:i a") }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->created_at->format("D M Y") }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $category->updated_at->format("h:i a") }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->updated_at->format("D M Y") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('category.create') }}">Create category</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="">
                    {{-- {{$categories->onEachside(1)->links()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
