<?php
/* @var $table \Naveed\Scaff\Helpers\Table */
/* @var $gen \Naveed\Scaff\Generators\ModelGenerator */
?>
<?='<?php
'?>

namespace {{config('naveed-scaff.model-namespace')}};

use App\{{$table->studly(true)}};
use Illuminate\Http\Request;

class {{$table->studly(true)}}Controller extends Controller
{
    public $viewDir = "{{$table->slug(true)}}";

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return {{$table->studly(true)}}::findRequested();
        }
        return $this->view("index");
    }

    public function store(Request $request)
    {
        $this->validate($request, {{$table->studly(true)}}::validationRules());
        return {{$table->studly(true)}}::create($request->all());
    }

    public function update(Request $request, {{$table->studly(true)}} ${{$table->camel(true)}})
    {
        if ($request->wantsJson()) {
            $this->validateUpdatedRequest($request->name, $request->value);
            $data = [$request->name => $request->value];
            ${{$table->camel(true)}}->update($data);
            return ${{$table->camel(true)}};
        }

        $this->validate($request, {{$table->studly(true)}}::validationRules());
        ${{$table->camel(true)}}->update($request->all());
        return ${{$table->camel(true)}};
    }

    public function destroy(Request $request, {{$table->studly(true)}} ${{$table->camel(true)}})
    {
        ${{$table->camel(true)}}->delete();
        return "{{$table->title(true)}} deleted";
    }

    public function bulkDelete(Request $request)
    {
        $items = $request->items;
        if(!$items) {
            abort(403, "Please select some items.");
        }

        if(!$ids = collect($items)->pluck('id')->all()) {
            abort(403, "No ids provided.");
        }

        {{$table->studly(true)}}::whereIn('id', $ids)->delete();
        return response("Deleted");
    }

    public function bulkEdit(Request $request)
    {
        if (!$field = $request->field) {
            abort(403, "Invalid request. Please provide a field.");
        }

        if (!$fieldName = array_get($field, 'name')) {
            abort(403, "Invalid request. Please provide a field name.");
        }

        if (!in_array($fieldName, {{$table->studly(true)}}::$bulkEditableFields)) {
            abort(403, "Bulk editing the {$fieldName} is not allowed.");
        }

        if(!$items = $request->items) {
            abort(403, "Please select some items.");
        }

        if(!$ids = collect($items)->pluck('id')->all()) {
            abort(403, "No ids provided.");
        }

        $this->validateUpdatedRequest($fieldName, array_get($field, 'value'));

        {{$table->studly(true)}}::whereIn('id', $ids)->update([$fieldName => array_get($field, 'value')]);
        return response("Updated");
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir . "." . $view, $data);
    }

    protected function validateUpdatedRequest($field, $value)
    {
        $data = [$field => $value];
        $validator = \Validator::make($data, {{$table->studly(true)}}::validationRules($field));
        if ($validator->fails()) {
            abort(403, $validator->errors()->first($field));
        }
    }
}
