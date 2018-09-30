@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('images/' . $post->image) }}" alt="Post Image">
            <h1>{{$post->title}}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top:50px;">
                <h3>Comments <small>{{$post->comments()->count()}} total</small></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th width="90"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td class="text-justify">{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="offset-md-1 col-md-3">
            <div>
                <dl class="row">
                    <label>Url:&nbsp;</label>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{ url($post->slug) }}</a></p>
                </dl>
                <dl class="row">
                    <label>Category:&nbsp;</label>
                    <p>{{$post->category->name}}</p>
                </dl>
                <dl class="row">
                    <label>Created At:&nbsp;</label>
                    <p>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="row">
                    <label>Last Updated:&nbsp;</label>
                    <p>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection