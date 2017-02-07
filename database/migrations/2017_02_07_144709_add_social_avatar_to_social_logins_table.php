<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialAvatarToSocialLoginsTable extends Migration
{

    public function up()
    {
        Schema::table('social_logins', function (Blueprint $table) {

            $table->string('title')->after('social_id')->nullable();
            $table->string('avatar_32')->after('title')->nullable();
            $table->string('avatar_192')->after('avatar_32')->nullable();

        });
    }

    public function down()
    {
        Schema::table('social_logins', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('avatar_32');
            $table->dropColumn('avatar_192');
        });
    }
}
