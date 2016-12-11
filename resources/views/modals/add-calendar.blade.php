<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ Request::url() }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $date }}" name="date" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title Event</label>
                        <input type="text" class="form-control" name="title" value="" placeholder="Title Calendar"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="all_day" value="1" id="all_day" placeholder=""/>
                        <labe>All day event</labe>
                    </div>
                    <div id="normal_event">
                        <div class="form-group">
                            <label>Time start event</label>
                            <select name="start_time_event" class="form-control">
                                @foreach($hours as $hour)
                                    <option value="{{ $hour }}" @if($hour == $time) selected @endif>{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Time end event</label>
                            <select name="end_time_event" class="form-control">
                                <?php $k=0; ?>
                                @foreach($hours as $key=>$hour)
                                    @if($hour == $time) <?php $k=$key+1; ?> @endif
                                    <option value="{{ $hour }}" @if($k == $key) selected @endif>{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
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