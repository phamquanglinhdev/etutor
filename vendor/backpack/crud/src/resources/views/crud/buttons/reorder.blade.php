@if ($crud->get('reorder.enabled') && $crud->hasAccess('reorder'))
  <a href="{{ url($crud->route.'/reorder') }}" class="btn btn-outline-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-arrows"></i> Sắp xếp lại {{ $crud->entity_name_plural }}</span></a>
@endif