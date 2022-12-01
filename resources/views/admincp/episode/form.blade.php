@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-primary">Liệt Kê Danh Sách Episode</a>
                    <div class="card-header">Quản Lý Episode</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('movie', 'Movie', []) !!}
                            {!! Form::select(
                                'movie_id',
                                ['0' => 'Chon phim', 'Phim moi nhat' => $list_movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control select-movie',
                                ],
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'http://www...',
                            ]) !!}
                        </div>
                        @if (isset($episode))
                            <div class="form-group">
                                {!! Form::label('tapphim', 'Tap phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', [
                                    'class' => 'form-control',
                                    'id' => 'episode',
                                    isset($episode) ? 'readonly' : '',
                                ]) !!}
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tap phim', []) !!}
                                <select name="episode" id="episode" class="form-control">

                                </select>
                            </div>
                        @endif

                        @if (!isset($episode))
                            {!! Form::submit('Thêm Episode', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Episode', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
