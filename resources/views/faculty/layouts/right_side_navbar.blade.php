<div class="page-container btn-group-vertical col-md-2">
    <button type="button" class="btn btn-danger btn-lg btn-info" data-toggle="modal" data-target="#search">Search</button>
    <button type="button" class="btn btn-danger btn-lg" onclick="location.href = 'staff/book';">Book Event</button>
    <button type="button" class="btn btn-danger btn-lg">My Events</button>
    <button type="button" class="btn btn-danger btn-lg">Calendar</button>
    <!--<button type="button" class="btn btn-danger"></button>-->
</div>

<!-- Modal -->
  <div class="modal fade" id="search" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Search</h4>
        </div>
        <div class="modal-body">
            <input type="text" name="search-bar" placeholder="Enter text to Search">
          <span><p></p></span>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>