<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ Request::url() }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Calendar</h4>
                </div>
                <div class="modal-body">

                       <div class="form-group">
                           <label>Title Calendar</label>
                           <input type="text" class="form-control" name="title" value="{{ $calendar?$calendar->title:'' }}" placeholder="Title Calendar"/>
                       </div>
                       <div class="form-group">
                           <label>Color Calendar</label>
                           <select name="color" class="form-control">
                               <option value="default" @if($calendar&&$calendar->color == 'default') selected @endif>default</option>
                               <option value="blue"  @if($calendar&&$calendar->color == 'blue') selected @endif>blue</option>
                               <option value="red"  @if($calendar&&$calendar->color == 'red') selected @endif>red</option>
                           </select>
                       </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>