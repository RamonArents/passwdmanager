<!--modal for deleting a password-->
<div class="modal fade" id="myModal{{ $id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure you want to delete this password?</p>
                <form action="{{ action('PassWordController@deletePass', ['id' => $id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger submitbutton" value="Delete">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>