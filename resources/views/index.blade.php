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

    @if (count($tasks) > 0)
        <h2>タスクリスト</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->task }}</li>
            @endforeach
        </ul>
    @endif

    <h2>タスク追加</h2>
    <form action="{{ url('task') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="task">
        <button type="submit">追加</button>
    </form>
@endsection