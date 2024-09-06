<style>
    /* Ensure the Select2 dropdown is above the modal */
    .select2-container {
        z-index: 9999;
    }

    .select2-dropdown {
        z-index: 1056;
    }

    /* Fix possible issues with modal overflow */
    .modal {
        overflow: visible;
    }
    #userChatModal .select2-container .select2-search--inline .select2-search__field {
        width: auto !important;
        margin: 0;
        line-height: 33px;
    }
    #userChatModal .select2-container--default .select2-search--inline .select2-search__field {
        background: transparent;
        border: none;
        outline: 0;
        box-shadow: none;
        -webkit-appearance: textfield;
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
            <div class="modal-body">
                <div class="container">
                    <form action="" method="POST" id="personal-chat-form">
                        <div class="personal-chat">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select name="user" id="user" class="user form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="group-chat mt-2">
                            <!-- Additional form elements can go here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
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
                dropdownParent: $('#userChatModal'), // Ensure Select2 dropdown appears inside the modal
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
    </script>
@endpush
