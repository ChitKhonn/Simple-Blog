@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    Article List
                </h3>
                <hr>

                <table class=" table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Control</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ Str::limit($article->description, 30, '...') }}</td>
                                <td>
                                    <div>
                                        <a class=" btn btn-sm btn-outline-primary" href="{{ route('article.show', $article->id) }}">
                                            <i class="bi bi-info"></i>
                                        </a>
                                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-warning"> <i class="bi bi-pencil"></i> </a>
                                        <button form="articleDeleteForm {{$article->id}}"  class=" btn btn-sm btn-outline-danger"> <i class="bi bi-trash3"></i> </button>
                                    </div>
                                    <form  id="articleDeleteForm {{$article->id}}" class=" d-inline-block" action="{{ route('article.destroy', $article->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>

                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $article->created_at->format("h:i a") }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->created_at->format("D M Y") }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $article->updated_at->format("h:i a") }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->updated_at->format("D M Y") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('article.create') }}">Create Item</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
