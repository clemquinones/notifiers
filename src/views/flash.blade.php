@if (Flash::hasMessage())
    @if (! Flash::is('overlay'))
        <div class="alert alert-{{ Flash::level() }}{{ Flash::is('important') ? ' alert-important' : '' }}">
            <p>{!! Flash::body() !!}</p>
        </div>
    @else
        <div class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ Flash::title() }}</h4>
              </div>
              <div class="modal-body">
                <p>{!! Flash::body() !!}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    @endif
@endif