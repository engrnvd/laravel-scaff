<?php
/* @var $table \Naveed\Scaff\Helpers\Table */
/* @var $gen \Naveed\Scaff\Generators\ModelGenerator */
?>
<?='<?php
'?>

namespace {{config('naveed-scaff.model-namespace')}};

use Illuminate\Database\Eloquent\Model;

/**
 * App\{{$table->studly(true)}}
 *
@if ($table->idField)
 * {{'@'}}property string ${{$table->idField}}
@endif
@foreach ($table->fields as $field)
 * {{'@'}}property string ${{$field->name}}
@endforeach
@if ($table->timestamps)
 * {{'@'}}property string $created_at
 * {{'@'}}property string $updated_at
@endif
@foreach ( $table->fields as $field )
 * {{'@'}}method static \Illuminate\Database\Query\Builder|{{$table->studly(true)}} where{{$field->studly()}}($value)
@endforeach
 */
class {{$table->studly(true)}} extends Model
{
    protected $guarded = ["{{$table->idField}}", "created_at", "updated_at"];
    public static $bulkEditableFields = ['{{ join("', '", $gen->getBulkEditableFields($table)) }}'];
@if (!collect($table->fields)->where('name', 'created_at')->count())
    public $timestamps = false;
@endif

    public static function findRequested()
    {
        $query = {{$table->studly(true)}}::query();

        // search results based on user input
@foreach ($table->fields as $field)
        if (\Request::has('{{$field->name}}')) $query->where({!! $gen->getConditionStr($field) !!});
@endforeach

        // sort results
        if (\Request::has("sort")) $query->orderBy(request("sort"), request("sortType", "asc"));

        // paginate results
        if ($resPerPage = request("perPage"))
            return $query->paginate($resPerPage);
        return $query->get();
    }

    public function validationRules($attributes = null)
    {
        $rules = [
@foreach ($table->fields as $field)
@if($rule = $gen->getValidationRule($field))
            {!! $rule !!}
@endif
@endforeach
        ];

        // no list is provided
        if (!$attributes)
            return $rules;

        // a single attribute is provided
        if (!is_array($attributes))
            return [$attributes => $rules[$attributes]];

        // a list of attributes is provided
        $newRules = [];
        foreach ($attributes as $attr)
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

}
