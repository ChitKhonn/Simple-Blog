@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    User List
                </h3>
                <hr>

                <div class="">
                    <a href=" {{ route('article.create') }}  " class="btn btn-outline-dark">Create</a>
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Information</td>
                            <td>Control</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td>
                                    {{ $user->name }}
                                    <br>
                                    <span class="small text-black-50">
                                        {{ $user->email }}
                                    </span>
                                </td>
                                <td></td>

                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $user->created_at->format('h:i a') }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $user->created_at->format('D M Y') }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $user->updated_at->format('h:i a') }}
                                    </p>
                                    <p class="small mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $user->updated_at->format('D M Y') }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>

                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="">
                    {{$users->onEachside(1)->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
