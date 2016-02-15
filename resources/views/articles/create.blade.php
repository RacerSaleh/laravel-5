@extends('app')

@section('content')

  <h1>Write new article</h1>
  <hr/>
    {!! Form::open(['url' => 'articles']) !!}
      @include('articles.form', ['SubmitButtonText' => 'Add Article'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
