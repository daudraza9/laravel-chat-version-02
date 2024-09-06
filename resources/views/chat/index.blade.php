@extends('layouts.app')
<style>
    body,
    html {
        height: 90%;
        margin: 0;
    }

    .chat-container {
        height: 90vh;
    }

    .chat-list {
        height: 100%;
        overflow-y: auto;
        border-right: 1px solid #dee2e6;
    }

    .chat-messages {
        height: calc(80vh - 80px);
        overflow-y: auto;
    }

    .message-input {
        height: 80px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row chat-container">
            <!-- Left side: Chat list and search -->
            <div class="col-md-4 p-0">
                <div class="chat-list d-flex flex-column">
                    <!-- Search bar -->
                    <div class="p-3 bg-light">
                        <div class="row">
                            <div class="col-10 p-0">
                                <input type="text" class="form-control" placeholder="Search chat...">
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end position-relative">
                                <!-- Ellipsis icon with dropdown -->
                                <i class="fa-solid fa-ellipsis-vertical" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>

                                <!-- Dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li data-toggle="modal" data-target="#exampleModalScrollable"><a class="dropdown-item"
                                            href="#"
                                            onclick="selectChatOption('{{ ChatType::PERSONAL_CHAT }}')">Personal Chat</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="selectChatOption('{{ ChatType::GROUP_CHAT }}')">Group
                                            Chat</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Chat list -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Chat 1</li>
                    </ul>
                </div>
            </div>

            <!-- Right side: Chat display -->
            <div class="col-md-8 d-flex flex-column p-0">
                <!-- Chat messages -->
                <div class="chat-messages p-3 bg-white flex-grow-1">
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <strong>User 1:</strong>
                        </div>
                        <div>
                            <p class="m-0">Hello! How are you?</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <strong>You:</strong>
                        </div>
                        <div>
                            <p class="m-0">I'm good, thanks! How about you?</p>
                        </div>
                    </div>
                    <!-- Add more messages here -->
                </div>

                <!-- Message input -->
                <div class="message-input bg-light p-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type a message...">
                        <button class="btn btn-primary" type="button">Send</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('chat.partials.userChatModal')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
          
        });

        function selectChatOption(chatType) {
            if (chatType == '{{ ChatType::PERSONAL_CHAT }}') {
                console.log('personal');
                $('#userChatModalTitle').html('Personal Chat')
                $('#userChatModal').modal('show');
            } else if (chatType == '{{ ChatType::GROUP_CHAT }}') {
                console.log('group chat');
                $('#userChatModalTitle').html('Group Chat')
                $('#userChatModal').modal('show');
            } else {
                alert('slection not valid');
            }
        }
    </script>
@endpush
