<div class="col-md-12 panelTop">
    <div class="col-md-10">
        <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Comments</h3>
            </div>
            <div class="box-body" style="">
                <div class="direct-chat-messages">

                    @if (!empty($film->comments))
                        @foreach($film->comments as $comment)
                            @if (!auth()->guest() && auth()->user()->id == $comment->user->id)
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">{{$comment->user->name}}</span>
                                        <span class="direct-chat-timestamp pull-left">{{$comment->created_at}}</span>
                                    </div>
                                    <div class="direct-chat-text">
                                        {{$comment->message}}
                                    </div>
                                </div>
                            @else
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">{{$comment->user->name}}</span>
                                        <span class="direct-chat-timestamp pull-right">{{$comment->created_at}}</span>
                                    </div>
                                    <div class="direct-chat-text">
                                        {{$comment->message}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="box-footer" style="">
                @if(auth()->guest())
                    <p>
                        <a href="{{ route('register') }}" class="carrot">Sign Up</a> or
                        <a href="{{ route('login') }}" class="carrot">Log In</a> for commenting
                    </p>
                @else
                    <form action="{!! url('comments') !!}" method="post">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input type="text" name="message" placeholder="{{auth()->user()->name}}, type your comment here..." class="form-control">
                            <input type="hidden" name="film_id" value="{{$film->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-flat">Send</button>
                            </span>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>