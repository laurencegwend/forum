@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="row question-title form-group">
            <table>
                <tbody>
                    <tr>
                        <td>{{$question->title}}</td>
                    </tr>
                    <tr>
                        <td class="info-user"> Created {{$question->created_at->diffForHumans()}} by <a href="#">{{$question->user->first_name}} {{$question->user->last_name}}</a></td>
                        <td class="info-answers col-md-6">{{$question->answers()->count()}} Answers</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row question-content form-group">{{$question->content}}</div>

        @foreach($answers as $answer)
        <div class="row answer-content form-group"><p>{{$answer->content}}</p></div>
        @endforeach

        {!! Form::open(array('route' => array('answer.store', $question->id), 'method' => 'POST')) !!}

        <div class="row your-answer form-group">
            {!! Form::label('content', 'Your Answer') !!}
            {!! Form::textarea('content', null, array('class' => 'form-control')) !!}
        </div>
        <div class="row pull-right">
        {!! Form::submit('Send', array('class' => 'btn btn-primary')) !!}
            <br/>
            <br/>
        </div>
    </div>
</div>
@stop