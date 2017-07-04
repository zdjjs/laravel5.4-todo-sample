@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <h2>エラー</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>タスク編集(ID:{{$task->id}})</h2>

    <form action="{{ url('task/' . $task->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="text" name="task" value="{{old('task', $task->task)}}">
        <button type="submit">編集</button>
    </form>
    <p>
        作成日：{{$task->created_at}}<br>
        更新日：{{$task->updated_at}}<br>
    </p>
@endsection