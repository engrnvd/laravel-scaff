<?php
/* @var $table \Naveed\Scaff\Helpers\Table */
/* @var $field \Naveed\Scaff\Helpers\TableField */
?>
<?="<?php\n"
?>

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create{{$table->studly()}}Table extends Migration
{
    public function up()
    {
        Schema::create('{{$table->name}}', function (Blueprint $table) {
@if ($table->idField)
            $table->bigIncrements('id');
@endif
@foreach($table->fields as $field)
            {!! $field->getMigrationLine() !!}
@if($field->unique)
            $table->unique('{{$field->name}}');
@elseif($field->index)
            $table->index('{{$field->name}}');
@endif
@endforeach
@if ($table->idField)
            $table->timestamps();
@endif
        });
    }

    public function down()
    {
        Schema::dropIfExists('{{$table->name}}');
    }
}
