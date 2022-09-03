<!-- Hide -->
<div class="modal fade" id="hide-post-{{ $post->id }}">
    <div class="modal-dialog border-secondary">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary">Hide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to hide "Post-{{ $post->id }}"</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.hide', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Display -->
<div class="modal fade" id="display-post-{{ $post->id }}">
    <div class="modal-dialog border-primary">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Display</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to display "Post-{{ $post->id }}"</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.display', $post->id) }}" method="post">
                    @csrf

                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>