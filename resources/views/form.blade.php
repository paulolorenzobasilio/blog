@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $blog->id ? 'Edit Blog' : 'Create Blog'}}</div>
                    <div class="card-body">

                        <form method="POST" action="{{ $blog->id ? action('BlogController@update', ['id' => $blog->id]) : action('BlogController@store') }}" novalidate>
                            {{ csrf_field() }}
                            {{ method_field($blog->id ? "PUT" : "POST") }}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                    @php
                                        Session::forget('error');
                                    @endphp
                                </div>
                        @endif
                        <!-- start: title -->
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           id="title" name="title" maxlength="150"
                                           required
                                           value="{{ old('title') ? old('title') : $blog->id ? $blog->title : ''}}">
                                    @if($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- end: title -->

                            <!-- start: description -->
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                              name="description" id="description"
                                              required>{{ old('description') ? old('description') : $blog->id ? $blog->description : ''}}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <!-- end: description -->
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="button"
                                    onclick="window.location='{{ action('HomeController@index') }}'">Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
