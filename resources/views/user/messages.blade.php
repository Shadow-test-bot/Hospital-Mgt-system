<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Messages</h1>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <h3>Doctors</h3>
                @foreach(\App\Models\User::where('usertype', 2)->get() as $doc)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5>{{ $doc->name }}</h5>
                            <a href="#chat-{{ $doc->id }}" class="btn btn-primary">Chat</a>
                        </div>
                    </div>
                @endforeach
                <h3>Conversations</h3>
                @foreach($messages as $otherId => $msgs)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5>{{ \App\Models\User::find($otherId)->name }}</h5>
                            <a href="#chat-{{ $otherId }}" class="btn btn-primary">Chat</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-8">
                @foreach($messages as $otherId => $msgs)
                    <div id="chat-{{ $otherId }}" class="chat-section" style="display: none;">
                        <h4>Chat with {{ \App\Models\User::find($otherId)->name }}</h4>
                        <div class="chat-messages" style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                            @foreach($msgs->sortBy('created_at') as $msg)
                                <div class="message {{ $msg->sender_id == Auth::id() ? 'sent' : 'received' }}">
                                    <strong>{{ $msg->sender_id == Auth::id() ? 'You' : \App\Models\User::find($msg->sender_id)->name }}:</strong> {{ $msg->message }}
                                    <small>{{ $msg->created_at->format('M d, H:i') }}</small>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ url('send_message') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $otherId }}">
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="3" placeholder="Type your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Send</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Simple show/hide for chats
        document.querySelectorAll('.card-body a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('href').substring(1);
                document.querySelectorAll('.chat-section').forEach(section => section.style.display = 'none');
                document.getElementById(target).style.display = 'block';
            });
        });
    </script>
</body>
</html>