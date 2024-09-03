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
<div class="container-fluid">
    <div class="row chat-container">
        <!-- Left side: Chat list and search -->
        <div class="col-md-4 p-0">
            <div class="chat-list d-flex flex-column">
                <!-- Search bar -->
                <div class="p-3 bg-light">
                    <input type="text" class="form-control" placeholder="Search chat...">
                </div>
                <!-- Chat list -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Chat 1</li>
                    <li class="list-group-item">Chat 2</li>
                    <li class="list-group-item">Chat 3</li>
                    <li class="list-group-item">Chat 4</li>
                    <li class="list-group-item">Chat 5</li>
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
