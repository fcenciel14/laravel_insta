<!-- Deactivate -->
<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog border-danger">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Deactivate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to deactivate "{{ $user->name }}"</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.users.deactivate', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Activate -->
<div class="modal fade" id="activate-user-{{ $user->id }}">
    <div class="modal-dialog border-success">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Activate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to activate "{{ $user->name }}"</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.users.activate', $user->id) }}" method="post">
                    @csrf

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>