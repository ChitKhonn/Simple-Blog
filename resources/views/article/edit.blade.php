@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    Update Article
                </h3>
                <hr>
                <form action=" {{ route('article.update',$article->id) }} " method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="">Article Title</label>
                        <input type="text" value="{{old('title', $article->title)}}" class="form-control @error('title') is-invalid @enderror " name="title">
                        @error('title')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea type="text"  class="form-control @error('description') is-invalid @enderror " name="description" rows="7">
                            {{old('description', $article->description)}}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Update Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
