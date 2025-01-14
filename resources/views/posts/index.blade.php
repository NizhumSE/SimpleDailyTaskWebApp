@extends('layouts.app')

@section('content')
    <h1>Post Your Personal Tasks List Here :</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Tasks</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <section>

    </section>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.N :</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('posts.toggleStatus', $post) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $post->status ? 'btn-success' : 'btn-warning' }}">
                                {{ $post->status ? 'Done' : 'Pending' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
