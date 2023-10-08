@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    Create  New Article
                </h3>
                <hr>
                <form action=" {{ route('article.store') }} " method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">Article Title</label>
                        <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror " name="title">
                        @error('title')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Select Category</label>
                        <select type="text"  class="form-select @error('category') is-invalid @enderror " name="category">
                            @foreach (App\Models\Category::all() as $category)
                            <option {{old('category') == $category->id ? 'selected' : ''}} value=" {{ $category->id }} "> {{ $category->title }} </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea type="text"  class="form-control @error('description') is-invalid @enderror " name="description" rows="7">
                            {{old('description')}}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Save Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
