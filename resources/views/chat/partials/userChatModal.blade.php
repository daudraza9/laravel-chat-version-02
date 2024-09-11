<style>
    /* Ensure the Select2 dropdown is above the modal */
    .select2-container {
        z-index: 1000;
        /* Adjust the value as needed */
    }
</style>

<!-- Modal -->
<div class="modal fade modal-dialog modal-dialog-centered modal-lg" id="userChatModal" tabindex="-1" role="dialog"
    aria-labelledby="userChatModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userChatModalTitle">Modal title</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 800px">
                <div class="container">
                    <form action="{{ route('chat.store') }}" method="POST" id="chat-form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="chat_type" id="chat-type-input">
                        <div class="personal-chat">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select name="user" id="user" class="user form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="group-chat mt-2 d-none" id="group-chat">
                            <!-- Additional form elements can go here -->
                            please upload Group photo
                            <input type="file" class="form-control" name="group_image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-submit"
                                onclick="ajaxFormSubmissionChat()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
@push('scripts')
    <script>
        $(document).ready(function() {

            $('#user').select2({
                placeholder: 'Select Employee',
                allowClear: true,
                dropdownParent: $('#chat-form'),
                ajax: {
                    url: "{{ route('user.select2') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                console.log(item);
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            }),
                            pagination: {
                                more: (data.current_page < data.last_page)
                            }
                        };
                    },
                    cache: true
                }
            });

        });

        function ajaxFormSubmissionChat() {
            event.preventDefault();
            let form_action = $('#chat-form').attr('action');
            let formData = new FormData($('#chat-form')[0]);
            let fileInput = $('input[name="group_image"]');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                processData: false,
                contentType: false,
                url: form_action,
                data: formData,
                success: function(data) {
                    if (data.status) {
                        console.log
                    } else {

                    }

                },
                error: function(response) {

                },
            });
        }
    </script>
@endpush
