<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'calendars';

    /**
     * Run the migrations.
     *
     * @table calendars
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('date_calendar');
            $table->string('location')->nullable();
            $table->string('person')->nullable();
            $table->string('comment')->nullable();
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->index(['users_id'], 'fk_calendars_users_idx');

            $table->foreign('users_id', 'fk_calendars_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
