<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare "{{$post->name}}"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" title="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
