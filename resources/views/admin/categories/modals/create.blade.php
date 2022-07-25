<!-- Create category -->
<div class="modal fade" id="create-category">
    <div class="modal-dialog border-success">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="category" class="form-label fw-bold">Category</label>
                    <input type="text" name="category" id="category" class="form-control" autofocus required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>