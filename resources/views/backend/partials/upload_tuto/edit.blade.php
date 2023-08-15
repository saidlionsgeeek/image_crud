<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$image->id}}">
    Edit Image
</button>

<!-- Modal -->
<div class="modal fade" id="{{$image->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{$image->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{$image->id}}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{route("image.update",$image->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">name : </label>
                        <input type="text" name="name" id="name" value="{{old("name", $image->name)}}">
                    </div>
                    <div>
                        <label for="image">name : </label>
                        <input type="file" name="image" id="image">
                    </div>
                    <button class="btn btn-danger" type="submit">send</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
